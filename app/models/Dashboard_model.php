<?php

class Dashboard_model {
    private $table = 'dashboard';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllDashboard() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDashboardById($id) {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}

?>