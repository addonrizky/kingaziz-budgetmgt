-- kingaziz_budget.activity_log definition

CREATE TABLE `activity_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(100) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `client_ip_address` varchar(50) DEFAULT NULL,
  `access_timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.cashflow definition

CREATE TABLE `cashflow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cash_code` varchar(12) NOT NULL,
  `spk_code` varchar(100) DEFAULT NULL,
  `nomor_kwitansi` varchar(100) DEFAULT NULL,
  `nomor_faktur_pajak` varchar(100) DEFAULT NULL,
  `cashflow_category_code` int DEFAULT NULL,
  `week_code` int DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `planned_amount` int DEFAULT NULL,
  `actual_amount` int DEFAULT NULL,
  `bank_code` varchar(20) DEFAULT NULL,
  `transaction_refnum` varchar(19) DEFAULT NULL,
  `cashflow_type` varchar(1) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `desc` varchar(200) DEFAULT '',
  `tag` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.developer definition

CREATE TABLE `developer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `developer_code` varchar(20) NOT NULL,
  `developer_name` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.item_pekerjaan definition

CREATE TABLE `item_pekerjaan` (
  `kode_item_pekerjaan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_pekerjaan` varchar(20) DEFAULT NULL,
  `kode_paket_pekerjaan_rap` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `volume_bq` decimal(20,2) DEFAULT NULL,
  `subtotal` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`kode_item_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.item_pekerjaan_deleted definition

CREATE TABLE `item_pekerjaan_deleted` (
  `kode_item_pekerjaan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_pekerjaan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `kode_paket_pekerjaan_rap` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `volume_bq` decimal(20,2) DEFAULT NULL,
  `subtotal` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`kode_item_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.item_pekerjaan_rab definition

CREATE TABLE `item_pekerjaan_rab` (
  `kode_item_pekerjaan_rab` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_pekerjaan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `kode_paket_pekerjaan_rab` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `volume_bq` decimal(20,2) DEFAULT NULL,
  `subtotal` decimal(20,2) DEFAULT '0.00',
  `margin` decimal(5,2) NOT NULL DEFAULT '0.00',
  `subtotal_ori` decimal(20,2) NOT NULL,
  PRIMARY KEY (`kode_item_pekerjaan_rab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.item_pekerjaan_sumberdaya definition

CREATE TABLE `item_pekerjaan_sumberdaya` (
  `kode_item_pekerjaan_sumberdaya` varchar(30) NOT NULL,
  `kode_sumberdaya_supplier` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_item_pekerjaan` varchar(40) NOT NULL,
  `koefisien` decimal(20,4) DEFAULT NULL,
  `subtotal` int DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`kode_item_pekerjaan_sumberdaya`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.item_pekerjaan_sumberdaya_deleted definition

CREATE TABLE `item_pekerjaan_sumberdaya_deleted` (
  `kode_item_pekerjaan_sumberdaya` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_sumberdaya_supplier` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_item_pekerjaan` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `koefisien` decimal(20,4) DEFAULT NULL,
  `subtotal` int DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`kode_item_pekerjaan_sumberdaya`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.item_pekerjaan_sumberdaya_rab definition

CREATE TABLE `item_pekerjaan_sumberdaya_rab` (
  `kode_item_pekerjaan_sumberdaya_rab` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_sumberdaya_supplier` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_item_pekerjaan_rab` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `koefisien` decimal(20,4) DEFAULT NULL,
  `subtotal` int DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `margin` decimal(5,2) NOT NULL DEFAULT '0.00',
  `subtotal_ori` int NOT NULL,
  PRIMARY KEY (`kode_item_pekerjaan_sumberdaya_rab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.m_paket_pekerjaan definition

CREATE TABLE `m_paket_pekerjaan` (
  `coa` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `paket_pekerjaan` varchar(500) DEFAULT NULL,
  `satuan` varchar(15) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`coa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.m_pekerjaan definition

CREATE TABLE `m_pekerjaan` (
  `kode_pekerjaan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pekerjaan` varchar(250) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`kode_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.m_status definition

CREATE TABLE `m_status` (
  `kode_status` int NOT NULL,
  `status_desc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO m_status (kode_status,status_desc,satuan,created_on,created_by) VALUES
	 (0,'penyusunan rap',NULL,'2023-05-21 02:29:45',NULL),
	 (1,'penyusunan rab',NULL,'2023-06-28 02:15:10',NULL);



-- kingaziz_budget.m_sumberdaya definition

CREATE TABLE `m_sumberdaya` (
  `kode_sumberdaya` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sumberdaya` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`kode_sumberdaya`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.m_supplier definition

CREATE TABLE `m_supplier` (
  `kode_supplier` varchar(30) NOT NULL,
  `supplier` varchar(300) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.paket_pekerjaan_rab definition

CREATE TABLE `paket_pekerjaan_rab` (
  `kode_paket_pekerjaan_rab` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coa` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rab_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subtotal_ori` int NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `margin` decimal(5,2) DEFAULT '0.00',
  `subtotal` int NOT NULL,
  PRIMARY KEY (`kode_paket_pekerjaan_rab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.paket_pekerjaan_rap definition

CREATE TABLE `paket_pekerjaan_rap` (
  `kode_paket_pekerjaan_rap` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coa` varchar(15) DEFAULT NULL,
  `rap_code` varchar(100) DEFAULT NULL,
  `subtotal` int NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`kode_paket_pekerjaan_rap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.paket_pekerjaan_rap_deleted definition

CREATE TABLE `paket_pekerjaan_rap_deleted` (
  `kode_paket_pekerjaan_rap` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coa` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rap_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subtotal` int NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`kode_paket_pekerjaan_rap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.rab definition

CREATE TABLE `rab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `developer_code` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rab_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `total_biaya` bigint NOT NULL DEFAULT '0',
  `margin` decimal(5,2) NOT NULL DEFAULT '0.00',
  `total_biaya_ori` bigint NOT NULL DEFAULT '0',
  `project_group` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rap_UN_code` (`rab_code`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.rap definition

CREATE TABLE `rap` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `developer_code` varchar(30) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `rap_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rap_UN_code` (`rap_code`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.rap_deleted definition

CREATE TABLE `rap_deleted` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `developer_code` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rap_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rap_UN_code` (`rap_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.sumberdaya_supplier definition

CREATE TABLE `sumberdaya_supplier` (
  `kode_sumberdaya_supplier` varchar(40) NOT NULL,
  `kode_sumberdaya` varchar(30) DEFAULT NULL,
  `kode_supplier` varchar(30) DEFAULT NULL,
  `harga_supplier` int DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) DEFAULT NULL,
  `status` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`kode_sumberdaya_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- kingaziz_budget.week_2023 definition

CREATE TABLE `week_2023` (
  `week_code` int NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `planned_balance_start` bigint DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actual_balance` bigint DEFAULT NULL,
  `bri_balance` bigint NOT NULL DEFAULT '0',
  `bni_balance` bigint NOT NULL DEFAULT '0',
  `btn_balance` bigint NOT NULL DEFAULT '0',
  `mandiri_balance` bigint NOT NULL DEFAULT '0',
  `bsi_bisnis_balance` bigint NOT NULL DEFAULT '0',
  `bsi_giro_balance` bigint NOT NULL DEFAULT '0',
  `planned_balance_end` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`week_code`)
) ENGINE=InnoDB AUTO_INCREMENT=667 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;