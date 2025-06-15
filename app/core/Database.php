<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_prakbasdat";

    private $dbh;
    private $stmt;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }

    public function query($query) {
        try {
            $this->stmt = $this->dbh->prepare($query);
        } catch (PDOException $e) {
            error_log("SQL Query Prepare Error: " . $e->getMessage() . " Query: " . $query);
            throw new Exception("Error preparing query: " . $e->getMessage());
        }
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        if (!$this->stmt) {
            throw new Exception("No statement prepared. Call query() first.");
        }
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            error_log("SQL Execution Error: " . $e->getMessage() . " Query: " . $this->stmt->queryString);
            throw new Exception("Error executing query: " . $e->getMessage());
        }
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch();
    }

    public function rowCount() {
        if (!$this->stmt) {
            return 0; // Or handle error appropriately
        }
        return $this->stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }
}