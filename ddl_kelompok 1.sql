CREATE SCHEMA IF NOT EXISTS `db_pbl` DEFAULT CHARACTER SET utf8;
USE `db_pbl`;

CREATE TABLE IF NOT EXISTS `db_pbl`.`pegawai` (
  `id_pegawai` INT NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `no_hp` VARCHAR(45) NOT NULL,
  `alamat` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
);

CREATE TABLE IF NOT EXISTS `db_pbl`.`transaksi` (
  `id_transaksi` INT NOT NULL,
  `subtotal` INT NOT NULL,
  `tanggal` DATETIME NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `db_pbl`.`transaksi_penjualan` (
  `id_transaksi_penjualan` INT NOT NULL,
  `penjualan_retail` DECIMAL(10,2) NOT NULL,
  `penjualan_grosir` DECIMAL(10,2) NOT NULL,
  `penjualan_aksesoris` DECIMAL(10,2) NOT NULL,
  `pegawai_id_pegawai` INT NOT NULL,
  `transaksi_id_transaksi` INT NOT NULL,
  PRIMARY KEY (`id_transaksi_penjualan`, `transaksi_id_transaksi`),
  CONSTRAINT `fk_transaksi_penjualan_pegawai1`
    FOREIGN KEY (`pegawai_id_pegawai`)
    REFERENCES `db_pbl`.`pegawai` (`id_pegawai`),
  CONSTRAINT `fk_transaksi_penjualan_transaksi1`
    FOREIGN KEY (`transaksi_id_transaksi`)
    REFERENCES `db_pbl`.`transaksi` (`id_transaksi`)
);

CREATE TABLE IF NOT EXISTS `db_pbl`.`produk` (
  `id_produk` INT NULL DEFAULT NULL,
  `nama_produk` VARCHAR(255) NOT NULL,
  `harga_produk` DECIMAL(10,2) NOT NULL,
  `supplier` INT NOT NULL,
  PRIMARY KEY (`id_produk`)
);

CREATE TABLE IF NOT EXISTS `db_pbl`.`transaksi_perkulakan` (
  `id_transaksi_perkulakan` INT NOT NULL,
  `kuantitas` INT NOT NULL,
  `produk_id_produk` INT NOT NULL,
  `transaksi_id_transaksi` INT NOT NULL,
  PRIMARY KEY (`id_transaksi_perkulakan`, `transaksi_id_transaksi`),
  CONSTRAINT `fk_transaksi_perkulakan_produk1`
    FOREIGN KEY (`produk_id_produk`)
    REFERENCES `db_pbl`.`produk` (`id_produk`),
  CONSTRAINT `fk_transaksi_perkulakan_transaksi1`
    FOREIGN KEY (`transaksi_id_transaksi`)
    REFERENCES `db_pbl`.`transaksi` (`id_transaksi`)
);

CREATE TABLE IF NOT EXISTS `db_pbl`.`transaksi_lainnya` (
  `id_transaksi_lainnya` INT NOT NULL,
  `deskripsi` VARCHAR(255) NULL DEFAULT NULL,
  `transaksi_id_transaksi` INT NOT NULL,
  PRIMARY KEY (`id_transaksi_lainnya`, `transaksi_id_transaksi`),
  CONSTRAINT `fk_transaksi_lainnya_transaksi1`
    FOREIGN KEY (`transaksi_id_transaksi`)
    REFERENCES `db_pbl`.`transaksi` (`id_transaksi`)
);
