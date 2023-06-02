-- -----------------------------------------------------
-- Schema db_aldyz
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_aldyz`;

-- -----------------------------------------------------
-- Schema db_aldyz
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_aldyz` DEFAULT CHARACTER SET utf8;
USE `db_aldyz`;

-- -----------------------------------------------------
-- Table `db_aldyz`.`pegawai`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_aldyz`.`pegawai` (
  `id_pegawai` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(255) NOT NULL,
  `no_hp` VARCHAR(45) NOT NULL,
  `alamat` VARCHAR(45) NOT NULL,
  `username` VARCHAR(20) NULL,
  `password` VARCHAR(255) NULL,
  `jabatan` ENUM('manajer', 'pegawai') NOT NULL,
  PRIMARY KEY (`id_pegawai`)
);


-- -----------------------------------------------------
-- Table `db_aldyz`.`transaksi_penjualan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_aldyz`.`transaksi_penjualan` (
  `id_transaksi_penjualan` INT NOT NULL AUTO_INCREMENT,
  `penjualan_retail` INT NOT NULL,
  `penjualan_grosir` INT NOT NULL,
  `penjualan_aksesoris` INT NOT NULL,
  `pegawai_id_pegawai` INT NOT NULL,
  `pegawai_id_manajer` INT NOT NULL,
  `tanggal` DATETIME NOT NULL,
  PRIMARY KEY (`id_transaksi_penjualan`),
  CONSTRAINT `fk_transaksi_penjualan_pegawai1`
    FOREIGN KEY (`pegawai_id_pegawai`)
    REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaksi_penjualan_pegawai2`
    FOREIGN KEY (`pegawai_id_manajer`)
    REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `db_aldyz`.`produk`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_aldyz`.`produk` (
  `id_produk` INT NOT NULL AUTO_INCREMENT,
  `nama_produk` VARCHAR(255) NOT NULL,
  `harga_produk` DECIMAL(10,2) NOT NULL,
  `supplier` INT NOT NULL,
  PRIMARY KEY (`id_produk`)
);


-- -----------------------------------------------------
-- Table `db_aldyz`.`transaksi_perkulakan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_aldyz`.`transaksi_perkulakan` (
  `id_transaksi_perkulakan` INT NOT NULL AUTO_INCREMENT,
  `pegawai_id_pegawai` INT NOT NULL,
  `tanggal` DATETIME NOT NULL,
  PRIMARY KEY (`id_transaksi_perkulakan`),
  CONSTRAINT `fk_transaksi_perkulakan_pegawai1`
    FOREIGN KEY (`pegawai_id_pegawai`)
    REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `db_aldyz`.`transaksi_lainnya`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_aldyz`.`transaksi_lainnya` (
  `id_transaksi_lainnya` INT NOT NULL AUTO_INCREMENT,
  `deskripsi` VARCHAR(255) NULL DEFAULT NULL,
  `nominal` INT NOT NULL,
  `pegawai_id_pegawai` INT NOT NULL,
  `tanggal` DATETIME NOT NULL,
  PRIMARY KEY (`id_transaksi_lainnya`),
  CONSTRAINT `fk_transaksi_lainnya_pegawai1`
    FOREIGN KEY (`pegawai_id_pegawai`)
    REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `db_aldyz`.`perkulakan_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_aldyz`.`perkulakan_detail` (
  `produk_id_produk` INT NOT NULL,
  `transaksi_perkulakan_id_transaksi_perkulakan` INT NOT NULL,
  `kuantitas` INT NOT NULL,
  PRIMARY KEY (`produk_id_produk`, `transaksi_perkulakan_id_transaksi_perkulakan`),
  CONSTRAINT `fk_produk_has_transaksi_perkulakan_produk1`
    FOREIGN KEY (`produk_id_produk`)
    REFERENCES `db_aldyz`.`produk` (`id_produk`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produk_has_transaksi_perkulakan_transaksi_perkulakan1`
    FOREIGN KEY (`transaksi_perkulakan_id_transaksi_perkulakan`)
    REFERENCES `db_aldyz`.`transaksi_perkulakan` (`id_transaksi_perkulakan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
