-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2025 at 01:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prakbasdat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_kota` (IN `p_nama_kota` VARCHAR(50), IN `p_zona_kota` VARCHAR(10))   BEGIN
  INSERT INTO kota (nama_kota, zona_kota)
  VALUES (p_nama_kota, p_zona_kota);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_kurir` (IN `p_nama_kurir` VARCHAR(100), IN `p_telepon_kurir` VARCHAR(20))   BEGIN
  INSERT INTO kurir (nama_kurir, telepon_kurir)
  VALUES (p_nama_kurir, p_telepon_kurir);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_layanan` (IN `p_nama_layanan` VARCHAR(50), IN `p_deskripsi_layanan` TEXT)   BEGIN
  INSERT INTO layanan (nama_layanan, deskripsi_layanan)
  VALUES (p_nama_layanan, p_deskripsi_layanan);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_paket` (IN `p_id_paket` VARCHAR(50), IN `p_id_pengirim` INT, IN `p_id_penerima` INT, IN `p_id_layanan` INT, IN `p_berat_paket` DECIMAL(10,2), IN `p_tanggal_pengiriman` TIMESTAMP, IN `p_ongkos_kirim` DECIMAL(10,2), IN `p_status_paket` VARCHAR(50), IN `p_estimasi_tiba` DATE, IN `p_catatan_paket` TEXT)   BEGIN
  INSERT INTO paket (id_paket, id_pengirim, id_penerima, id_layanan, berat_paket, tanggal_pengiriman, ongkos_kirim, status_paket, estimasi_tiba, catatan_paket)
  VALUES (p_id_paket, p_id_pengirim, p_id_penerima, p_id_layanan, p_berat_paket, p_tanggal_pengiriman, p_ongkos_kirim, p_status_paket, p_estimasi_tiba, p_catatan_paket);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_pelacakan` (IN `p_id_paket` VARCHAR(50), IN `p_tanggal_update` TIMESTAMP, IN `p_lokasi_update` VARCHAR(100), IN `p_status_saat_ini` VARCHAR(50), IN `p_id_kurir` INT, IN `p_keterangan` TEXT)   BEGIN
  INSERT INTO pelacakan (id_paket, tanggal_update, lokasi_update, status_saat_ini, id_kurir, keterangan)
  VALUES (p_id_paket, p_tanggal_update, p_lokasi_update, p_status_saat_ini, p_id_kurir, p_keterangan);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_penerima` (IN `p_nama_penerima` VARCHAR(100), IN `p_alamat_penerima` VARCHAR(255), IN `p_kota_penerima` VARCHAR(50), IN `p_telepon_penerima` VARCHAR(20), IN `p_email_penerima` VARCHAR(100))   BEGIN
  INSERT INTO penerima (nama_penerima, alamat_penerima, kota_penerima, telepon_penerima, email_penerima)
  VALUES (p_nama_penerima, p_alamat_penerima, p_kota_penerima, p_telepon_penerima, p_email_penerima);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_pengirim` (IN `p_nama_pengirim` VARCHAR(100), IN `p_alamat_pengirim` VARCHAR(255), IN `p_kota_pengirim` VARCHAR(50), IN `p_telepon_pengirim` VARCHAR(20), IN `p_email_pengirim` VARCHAR(100), IN `p_tanggal_daftar` TIMESTAMP)   BEGIN
  INSERT INTO pengirim (nama_pengirim, alamat_pengirim, kota_pengirim, telepon_pengirim, email_pengirim, tanggal_daftar)
  VALUES (p_nama_pengirim, p_alamat_pengirim, p_kota_pengirim, p_telepon_pengirim, p_email_pengirim, p_tanggal_daftar);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_tarif` (IN `p_id_kota_asal` INT, IN `p_id_kota_tujuan` INT, IN `p_id_layanan` INT, IN `p_tarif_per_kg` DECIMAL(10,2))   BEGIN
  INSERT INTO tarif (id_kota_asal, id_kota_tujuan, id_layanan, tarif_per_kg)
  VALUES (p_id_kota_asal, p_id_kota_tujuan, p_id_layanan, p_tarif_per_kg);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kota` (IN `p_id_kota` INT)   BEGIN
  DELETE FROM kota WHERE id_kota = p_id_kota;
  INSERT INTO log_kota (aksi, status) VALUES ('DELETE', CONCAT('Data kota dihapus ID: ', p_id_kota));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kurir` (IN `p_id_kurir` INT)   BEGIN
  DELETE FROM kurir WHERE id_kurir = p_id_kurir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_layanan` (IN `p_id_layanan` INT)   BEGIN
  DELETE FROM layanan WHERE id_layanan = p_id_layanan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_paket` (IN `p_id_paket` VARCHAR(50))   BEGIN
  DELETE FROM paket WHERE id_paket = p_id_paket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pelacakan` (IN `p_id_pelacakan` INT)   BEGIN
  DELETE FROM pelacakan WHERE id_pelacakan = p_id_pelacakan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_penerima` (IN `p_id_penerima` INT)   BEGIN
  DELETE FROM penerima WHERE id_penerima = p_id_penerima;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pengirim` (IN `p_id_pengirim` INT)   BEGIN
  DELETE FROM pengirim WHERE id_pengirim = p_id_pengirim;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_tarif` (IN `p_id_tarif` INT)   BEGIN
  DELETE FROM tarif WHERE id_tarif = p_id_tarif;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_kota` ()   BEGIN
  SELECT * FROM kota;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_kurir` ()   BEGIN
  SELECT * FROM kurir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_layanan` ()   BEGIN
  SELECT * FROM layanan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_paket` ()   BEGIN
  SELECT * FROM paket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_pelacakan` ()   BEGIN
  SELECT * FROM pelacakan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_penerima` ()   BEGIN
  SELECT * FROM penerima;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_pengirim` ()   BEGIN
  SELECT * FROM pengirim;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `read_tarif` ()   BEGIN
  SELECT * FROM tarif;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kota` (IN `p_id_kota` INT, IN `p_nama_kota` VARCHAR(50), IN `p_zona_kota` VARCHAR(10))   BEGIN
  UPDATE kota SET
    nama_kota = p_nama_kota,
    zona_kota = p_zona_kota
  WHERE id_kota = p_id_kota;
  INSERT INTO log_kota (aksi, status) VALUES ('UPDATE', CONCAT('Data kota diperbarui: ', p_nama_kota));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kurir` (IN `p_id_kurir` INT, IN `p_nama_kurir` VARCHAR(100), IN `p_telepon_kurir` VARCHAR(20))   BEGIN
  UPDATE kurir SET
    nama_kurir = p_nama_kurir,
    telepon_kurir = p_telepon_kurir
  WHERE id_kurir = p_id_kurir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_layanan` (IN `p_id_layanan` INT, IN `p_nama_layanan` VARCHAR(50), IN `p_deskripsi_layanan` TEXT)   BEGIN
  UPDATE layanan SET
    nama_layanan = p_nama_layanan,
    deskripsi_layanan = p_deskripsi_layanan
  WHERE id_layanan = p_id_layanan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_paket` (IN `p_id_paket` VARCHAR(50), IN `p_id_pengirim` INT, IN `p_id_penerima` INT, IN `p_id_layanan` INT, IN `p_berat_paket` DECIMAL(10,2), IN `p_tanggal_pengiriman` TIMESTAMP, IN `p_ongkos_kirim` DECIMAL(10,2), IN `p_status_paket` VARCHAR(50), IN `p_estimasi_tiba` DATE, IN `p_catatan_paket` TEXT)   BEGIN
  UPDATE paket SET
    berat_paket = p_berat_paket,
    tanggal_pengiriman = p_tanggal_pengiriman,
    ongkos_kirim = p_ongkos_kirim,
    status_paket = p_status_paket,
    estimasi_tiba = p_estimasi_tiba,
    catatan_paket = p_catatan_paket
  WHERE id_paket = p_id_paket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pelacakan` (IN `p_id_pelacakan` INT, IN `p_id_paket` VARCHAR(50), IN `p_tanggal_update` TIMESTAMP, IN `p_lokasi_update` VARCHAR(100), IN `p_status_saat_ini` VARCHAR(50), IN `p_id_kurir` INT, IN `p_keterangan` TEXT)   BEGIN
  UPDATE pelacakan SET
    tanggal_update = p_tanggal_update,
    lokasi_update = p_lokasi_update,
    status_saat_ini = p_status_saat_ini,
    keterangan = p_keterangan
  WHERE id_pelacakan = p_id_pelacakan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_penerima` (IN `p_id_penerima` INT, IN `p_nama_penerima` VARCHAR(100), IN `p_alamat_penerima` VARCHAR(255), IN `p_kota_penerima` VARCHAR(50), IN `p_telepon_penerima` VARCHAR(20), IN `p_email_penerima` VARCHAR(100))   BEGIN
  UPDATE penerima SET
    nama_penerima = p_nama_penerima,
    alamat_penerima = p_alamat_penerima,
    kota_penerima = p_kota_penerima,
    telepon_penerima = p_telepon_penerima,
    email_penerima = p_email_penerima
  WHERE id_penerima = p_id_penerima;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pengirim` (IN `p_id_pengirim` INT, IN `p_nama_pengirim` VARCHAR(100), IN `p_alamat_pengirim` VARCHAR(255), IN `p_kota_pengirim` VARCHAR(50), IN `p_telepon_pengirim` VARCHAR(20), IN `p_email_pengirim` VARCHAR(100), IN `p_tanggal_daftar` TIMESTAMP)   BEGIN
  UPDATE pengirim SET
    nama_pengirim = p_nama_pengirim,
    alamat_pengirim = p_alamat_pengirim,
    kota_pengirim = p_kota_pengirim,
    telepon_pengirim = p_telepon_pengirim,
    email_pengirim = p_email_pengirim,
    tanggal_daftar = p_tanggal_daftar
  WHERE id_pengirim = p_id_pengirim;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_tarif` (IN `p_id_tarif` INT, IN `p_id_kota_asal` INT, IN `p_id_kota_tujuan` INT, IN `p_id_layanan` INT, IN `p_tarif_per_kg` DECIMAL(10,2))   BEGIN
  UPDATE tarif SET
    tarif_per_kg = p_tarif_per_kg
  WHERE id_tarif = p_id_tarif;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `zona_kota` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `zona_kota`) VALUES
(1, 'Bandung', 'WIB');

--
-- Triggers `kota`
--
DELIMITER $$
CREATE TRIGGER `trg_after_delete_kota` AFTER DELETE ON `kota` FOR EACH ROW BEGIN
    INSERT INTO log_kota (aksi, status)
    VALUES ('DELETE', CONCAT('Data kota dengan ID: ', OLD.id_kota, ' dan Nama: ', OLD.nama_kota, ' telah dihapus.'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_insert_kota` AFTER INSERT ON `kota` FOR EACH ROW BEGIN
    INSERT INTO log_kota (aksi, status)
    VALUES ('CREATE', CONCAT('Data kota baru ditambahkan dengan ID: ', NEW.id_kota, ' dan Nama: ', NEW.nama_kota));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_update_kota` AFTER UPDATE ON `kota` FOR EACH ROW BEGIN
    INSERT INTO log_kota (aksi, status)
    VALUES ('UPDATE', CONCAT('Data kota dengan ID: ', OLD.id_kota, ' diperbarui. Nama lama: ', OLD.nama_kota, ', Nama baru: ', NEW.nama_kota));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `telepon_kurir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `telepon_kurir`) VALUES
(1, 'Kurir A', '081234567890');

--
-- Triggers `kurir`
--
DELIMITER $$
CREATE TRIGGER `trg_after_delete_kurir` AFTER DELETE ON `kurir` FOR EACH ROW BEGIN
    INSERT INTO log_kurir (aksi, status)
    VALUES ('DELETE', CONCAT('Data kurir dengan ID: ', OLD.id_kurir, ' dan Nama: ', OLD.nama_kurir, ' telah dihapus.'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_insert_kurir` AFTER INSERT ON `kurir` FOR EACH ROW BEGIN
    INSERT INTO log_kurir (aksi, status)
    VALUES ('CREATE', CONCAT('Data kurir baru ditambahkan dengan ID: ', NEW.id_kurir, ' dan Nama: ', NEW.nama_kurir));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_update_kurir` AFTER UPDATE ON `kurir` FOR EACH ROW BEGIN
    INSERT INTO log_kurir (aksi, status)
    VALUES ('UPDATE', CONCAT('Data kurir dengan ID: ', OLD.id_kurir, ' diperbarui. Nama lama: ', OLD.nama_kurir, ', Nama baru: ', NEW.nama_kurir));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `deskripsi_layanan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `deskripsi_layanan`) VALUES
(1, 'Reguler', 'Pengiriman reguler 2-3 hari.');

--
-- Triggers `layanan`
--
DELIMITER $$
CREATE TRIGGER `trg_after_delete_layanan` AFTER DELETE ON `layanan` FOR EACH ROW BEGIN
    INSERT INTO log_layanan (aksi, status)
    VALUES ('DELETE', CONCAT('Data layanan dengan ID: ', OLD.id_layanan, ' dan Nama: ', OLD.nama_layanan, ' telah dihapus.'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_insert_layanan` AFTER INSERT ON `layanan` FOR EACH ROW BEGIN
    INSERT INTO log_layanan (aksi, status)
    VALUES ('CREATE', CONCAT('Data layanan baru ditambahkan dengan ID: ', NEW.id_layanan, ' dan Nama: ', NEW.nama_layanan));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_update_layanan` AFTER UPDATE ON `layanan` FOR EACH ROW BEGIN
    INSERT INTO log_layanan (aksi, status)
    VALUES ('UPDATE', CONCAT('Data layanan dengan ID: ', OLD.id_layanan, ' diperbarui. Nama lama: ', OLD.nama_layanan, ', Nama baru: ', NEW.nama_layanan));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_kota`
--

CREATE TABLE `log_kota` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_kota`
--

INSERT INTO `log_kota` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:26', 'Data kota baru ditambahkan dengan ID: 1 dan Nama: Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `log_kurir`
--

CREATE TABLE `log_kurir` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_kurir`
--

INSERT INTO `log_kurir` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:26', 'Data kurir baru ditambahkan dengan ID: 1 dan Nama: Kurir A');

-- --------------------------------------------------------

--
-- Table structure for table `log_layanan`
--

CREATE TABLE `log_layanan` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_layanan`
--

INSERT INTO `log_layanan` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:26', 'Data layanan baru ditambahkan dengan ID: 1 dan Nama: Reguler');

-- --------------------------------------------------------

--
-- Table structure for table `log_paket`
--

CREATE TABLE `log_paket` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_paket`
--

INSERT INTO `log_paket` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:27', 'Paket baru ditambahkan dengan ID: PKT001. Pengirim: 1, Penerima: 1');

-- --------------------------------------------------------

--
-- Table structure for table `log_pelacakan`
--

CREATE TABLE `log_pelacakan` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_pelacakan`
--

INSERT INTO `log_pelacakan` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:27', 'Data pelacakan baru ditambahkan: 1');

-- --------------------------------------------------------

--
-- Table structure for table `log_penerima`
--

CREATE TABLE `log_penerima` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_penerima`
--

INSERT INTO `log_penerima` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:26', 'Data penerima ditambahkan: Siti Aminah');

-- --------------------------------------------------------

--
-- Table structure for table `log_pengirim`
--

CREATE TABLE `log_pengirim` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_pengirim`
--

INSERT INTO `log_pengirim` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:26', 'Data pengirim ditambahkan: Budi Santoso');

-- --------------------------------------------------------

--
-- Table structure for table `log_tarif`
--

CREATE TABLE `log_tarif` (
  `id_log` int NOT NULL,
  `aksi` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_tarif`
--

INSERT INTO `log_tarif` (`id_log`, `aksi`, `tanggal`, `status`) VALUES
(1, 'CREATE', '2025-06-13 15:45:27', 'Tarif baru ditambahkan dari kota 1 ke 1');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(50) NOT NULL,
  `id_pengirim` int NOT NULL,
  `id_penerima` int NOT NULL,
  `id_layanan` int NOT NULL,
  `berat_paket` decimal(10,2) NOT NULL,
  `tanggal_pengiriman` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ongkos_kirim` decimal(10,2) NOT NULL,
  `status_paket` varchar(50) DEFAULT 'Pickup',
  `estimasi_tiba` date DEFAULT NULL,
  `catatan_paket` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_pengirim`, `id_penerima`, `id_layanan`, `berat_paket`, `tanggal_pengiriman`, `ongkos_kirim`, `status_paket`, `estimasi_tiba`, `catatan_paket`) VALUES
('PKT001', 1, 1, 1, '5.00', '2025-06-13 15:45:27', '25000.00', 'Dalam Perjalanan', '2025-06-15', 'Jangan dibanting');

--
-- Triggers `paket`
--
DELIMITER $$
CREATE TRIGGER `trg_after_delete_paket` AFTER DELETE ON `paket` FOR EACH ROW BEGIN
    INSERT INTO log_paket (aksi, status)
    VALUES ('DELETE', CONCAT('Paket dengan ID: ', OLD.id_paket, ' telah dihapus.'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_insert_paket` AFTER INSERT ON `paket` FOR EACH ROW BEGIN
    INSERT INTO log_paket (aksi, status)
    VALUES ('CREATE', CONCAT('Paket baru ditambahkan dengan ID: ', NEW.id_paket, '. Pengirim: ', NEW.id_pengirim, ', Penerima: ', NEW.id_penerima));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_update_paket` AFTER UPDATE ON `paket` FOR EACH ROW BEGIN
    INSERT INTO log_paket (aksi, status)
    VALUES ('UPDATE', CONCAT('Paket dengan ID: ', OLD.id_paket, ' diperbarui. Status lama: ', OLD.status_paket, ', Status baru: ', NEW.status_paket));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelacakan`
--

CREATE TABLE `pelacakan` (
  `id_pelacakan` int NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `tanggal_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lokasi_update` varchar(100) DEFAULT NULL,
  `status_saat_ini` varchar(50) NOT NULL,
  `id_kurir` int DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelacakan`
--

INSERT INTO `pelacakan` (`id_pelacakan`, `id_paket`, `tanggal_update`, `lokasi_update`, `status_saat_ini`, `id_kurir`, `keterangan`) VALUES
(1, 'PKT001', '2025-06-13 15:45:27', 'Gudang Bandung', 'Dalam Perjalanan', 1, 'Paket sedang diproses');

--
-- Triggers `pelacakan`
--
DELIMITER $$
CREATE TRIGGER `trg_pelacakan_create` AFTER INSERT ON `pelacakan` FOR EACH ROW INSERT INTO log_pelacakan (aksi, status)
VALUES ('CREATE', CONCAT('Data pelacakan baru ditambahkan: ', NEW.id_pelacakan))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_pelacakan_delete` AFTER DELETE ON `pelacakan` FOR EACH ROW INSERT INTO log_pelacakan (aksi, status)
VALUES ('DELETE', CONCAT('Data pelacakan dihapus: ', OLD.id_pelacakan))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_pelacakan_update` AFTER UPDATE ON `pelacakan` FOR EACH ROW INSERT INTO log_pelacakan (aksi, status)
VALUES ('UPDATE', CONCAT('Data pelacakan diperbarui: ', NEW.id_pelacakan))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `kota_penerima` varchar(50) NOT NULL,
  `telepon_penerima` varchar(20) NOT NULL,
  `email_penerima` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `nama_penerima`, `alamat_penerima`, `kota_penerima`, `telepon_penerima`, `email_penerima`) VALUES
(1, 'Siti Aminah', 'Jl. Sudirman No. 25', 'Jakarta', '081234567892', 'siti@example.com');

--
-- Triggers `penerima`
--
DELIMITER $$
CREATE TRIGGER `trg_penerima_create` AFTER INSERT ON `penerima` FOR EACH ROW INSERT INTO log_penerima (aksi, status)
VALUES ('CREATE', CONCAT('Data penerima ditambahkan: ', NEW.nama_penerima))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_penerima_delete` AFTER DELETE ON `penerima` FOR EACH ROW INSERT INTO log_penerima (aksi, status)
VALUES ('DELETE', CONCAT('Data penerima dihapus: ', OLD.nama_penerima))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_penerima_update` AFTER UPDATE ON `penerima` FOR EACH ROW INSERT INTO log_penerima (aksi, status)
VALUES ('UPDATE', CONCAT('Data penerima diperbarui: ', NEW.nama_penerima))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `id_pengirim` int NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `kota_pengirim` varchar(50) NOT NULL,
  `telepon_pengirim` varchar(20) NOT NULL,
  `email_pengirim` varchar(100) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`id_pengirim`, `nama_pengirim`, `alamat_pengirim`, `kota_pengirim`, `telepon_pengirim`, `email_pengirim`, `tanggal_daftar`) VALUES
(1, 'Budi Santoso', 'Jl. Merdeka No. 10', 'Bandung', '081234567891', 'budi@example.com', '2025-06-13 15:45:26');

--
-- Triggers `pengirim`
--
DELIMITER $$
CREATE TRIGGER `trg_pengirim_create` AFTER INSERT ON `pengirim` FOR EACH ROW INSERT INTO log_pengirim (aksi, status)
VALUES ('CREATE', CONCAT('Data pengirim ditambahkan: ', NEW.nama_pengirim))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_pengirim_delete` AFTER DELETE ON `pengirim` FOR EACH ROW INSERT INTO log_pengirim (aksi, status)
VALUES ('DELETE', CONCAT('Data pengirim dihapus: ', OLD.nama_pengirim))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_pengirim_update` AFTER UPDATE ON `pengirim` FOR EACH ROW INSERT INTO log_pengirim (aksi, status)
VALUES ('UPDATE', CONCAT('Data pengirim diperbarui: ', NEW.nama_pengirim))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int NOT NULL,
  `id_kota_asal` int NOT NULL,
  `id_kota_tujuan` int NOT NULL,
  `id_layanan` int NOT NULL,
  `tarif_per_kg` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `id_kota_asal`, `id_kota_tujuan`, `id_layanan`, `tarif_per_kg`) VALUES
(1, 1, 1, 1, '5000.00');

--
-- Triggers `tarif`
--
DELIMITER $$
CREATE TRIGGER `trg_tarif_create` AFTER INSERT ON `tarif` FOR EACH ROW INSERT INTO log_tarif (aksi, status)
VALUES ('CREATE', CONCAT('Tarif baru ditambahkan dari kota ', NEW.id_kota_asal, ' ke ', NEW.id_kota_tujuan))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_tarif_delete` AFTER DELETE ON `tarif` FOR EACH ROW INSERT INTO log_tarif (aksi, status)
VALUES ('DELETE', CONCAT('Tarif dihapus dari kota ', OLD.id_kota_asal, ' ke ', OLD.id_kota_tujuan))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_tarif_update` AFTER UPDATE ON `tarif` FOR EACH ROW INSERT INTO log_tarif (aksi, status)
VALUES ('UPDATE', CONCAT('Tarif diperbarui dari kota ', NEW.id_kota_asal, ' ke ', NEW.id_kota_tujuan))
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `nama_kota` (`nama_kota`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD UNIQUE KEY `nama_layanan` (`nama_layanan`);

--
-- Indexes for table `log_kota`
--
ALTER TABLE `log_kota`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_kurir`
--
ALTER TABLE `log_kurir`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_layanan`
--
ALTER TABLE `log_layanan`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_paket`
--
ALTER TABLE `log_paket`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_pelacakan`
--
ALTER TABLE `log_pelacakan`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_penerima`
--
ALTER TABLE `log_penerima`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_pengirim`
--
ALTER TABLE `log_pengirim`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_tarif`
--
ALTER TABLE `log_tarif`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `pelacakan`
--
ALTER TABLE `pelacakan`
  ADD PRIMARY KEY (`id_pelacakan`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_kurir` (`id_kurir`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD UNIQUE KEY `id_kota_asal` (`id_kota_asal`,`id_kota_tujuan`,`id_layanan`),
  ADD KEY `id_kota_tujuan` (`id_kota_tujuan`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_kota`
--
ALTER TABLE `log_kota`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_kurir`
--
ALTER TABLE `log_kurir`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_layanan`
--
ALTER TABLE `log_layanan`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_paket`
--
ALTER TABLE `log_paket`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_pelacakan`
--
ALTER TABLE `log_pelacakan`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_penerima`
--
ALTER TABLE `log_penerima`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_pengirim`
--
ALTER TABLE `log_pengirim`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_tarif`
--
ALTER TABLE `log_tarif`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelacakan`
--
ALTER TABLE `pelacakan`
  MODIFY `id_pelacakan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengirim`
--
ALTER TABLE `pengirim`
  MODIFY `id_pengirim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirim` (`id_pengirim`),
  ADD CONSTRAINT `paket_ibfk_2` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id_penerima`),
  ADD CONSTRAINT `paket_ibfk_3` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Constraints for table `pelacakan`
--
ALTER TABLE `pelacakan`
  ADD CONSTRAINT `pelacakan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `pelacakan_ibfk_2` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`);

--
-- Constraints for table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `tarif_ibfk_1` FOREIGN KEY (`id_kota_asal`) REFERENCES `kota` (`id_kota`),
  ADD CONSTRAINT `tarif_ibfk_2` FOREIGN KEY (`id_kota_tujuan`) REFERENCES `kota` (`id_kota`),
  ADD CONSTRAINT `tarif_ibfk_3` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
