-- Schema db_aldyz
DROP SCHEMA `db_aldyz`;
CREATE SCHEMA `db_aldyz` DEFAULT CHARACTER SET utf8;
USE `db_aldyz`;

-- Table pegawai
CREATE TABLE `db_aldyz`.`pegawai` (
  `id_pegawai` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(45) NOT NULL,
  `no_hp` VARCHAR(45) NOT NULL,
  `alamat` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(255) NULL,
  `jabatan` ENUM('manajer', 'pegawai') NOT NULL,
  PRIMARY KEY (`id_pegawai`)
);

-- Table produk
CREATE TABLE `db_aldyz`.`produk` (
  `id_produk` INT NOT NULL AUTO_INCREMENT,
  `nama_produk` VARCHAR(45) NOT NULL,
  `harga_produk` INT NOT NULL,
  PRIMARY KEY (`id_produk`)
);

-- Table supplier
CREATE TABLE `db_aldyz`.`supplier` (
  `id_supplier` INT NOT NULL AUTO_INCREMENT,
  `nama_supplier` VARCHAR(45) NOT NULL,
  `alamat_supplier` VARCHAR(45) NOT NULL,
  `no_telepon` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_supplier`)
);

-- Table transaksi_perkulakan
CREATE TABLE `db_aldyz`.`transaksi_perkulakan` (
  `id_transaksi_perkulakan` INT NOT NULL AUTO_INCREMENT,
  `tanggal` DATETIME NOT NULL,
  `kuantitas` INT NOT NULL,
  `pegawai_id_pencatat` INT NOT NULL,
  `produk_id_produk` INT NOT NULL,
  `supplier_id_supplier` INT NOT NULL,
  PRIMARY KEY (`id_transaksi_perkulakan`),
  FOREIGN KEY (`pegawai_id_pencatat`) REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`produk_id_produk`) REFERENCES `db_aldyz`.`produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`supplier_id_supplier`) REFERENCES `db_aldyz`.`supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

-- Table transaksi_penjualan
CREATE TABLE `db_aldyz`.`transaksi_penjualan` (
  `id_transaksi_penjualan` INT NOT NULL AUTO_INCREMENT,
  `penjualan_retail` INT NULL,
  `penjualan_grosir` INT NULL,
  `penjualan_aksesoris` INT NULL,
  `tanggal` DATETIME NOT NULL,
  `pegawai_id_pencatat` INT NOT NULL,
  `pegawai_id_pegawai` INT NOT NULL,
  PRIMARY KEY (`id_transaksi_penjualan`),
  FOREIGN KEY (`pegawai_id_pencatat`) REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`pegawai_id_pegawai`) REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

-- Table transaksi_lainnya
CREATE TABLE `db_aldyz`.`transaksi_lainnya` (
  `id_transaksi_lainnya` INT NOT NULL AUTO_INCREMENT,
  `deskripsi` VARCHAR(45) NOT NULL,
  `nominal` INT NOT NULL,
  `tanggal` DATETIME NOT NULL,
  `pegawai_id_pencatat` INT NOT NULL,
  PRIMARY KEY (`id_transaksi_lainnya`),
  FOREIGN KEY (`pegawai_id_pencatat`) REFERENCES `db_aldyz`.`pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION
);