INSERT INTO `pegawai` (`id_pegawai`, `nama`, `no_hp`, `alamat`, `username`, `password`, `jabatan`) VALUES
(1, 'root', 'root', 'root', 'root', '$2y$10$AaBNNCvBMa7ydrKpRCOhTeNDbNxoDD9mDutPZYVKpJSEplQiM.Gvi', 'manajer');

SELECT date,
       SUM(total_harian_lainnya) AS lainnya,
       SUM(total_harian_penjualan) AS penjualan,
       SUM(total_harian_perkulakan) AS perkulakan,
       SUM(total_harian_lainnya + total_harian_penjualan + total_harian_perkulakan) AS total_harian
FROM (
    SELECT DATE(tl.tanggal) AS date,
           SUM(tl.nominal) AS total_harian_lainnya,
           0 AS total_harian_penjualan,
           0 AS total_harian_perkulakan
    FROM transaksi_lainnya tl
    GROUP BY DATE(tl.tanggal)

    UNION

    SELECT DATE(tp.tanggal) AS date,
           0 AS total_harian_lainnya,
           SUM(tp.penjualan_retail + tp.penjualan_grosir + tp.penjualan_aksesoris) AS total_harian_penjualan,
           0 AS total_harian_perkulakan
    FROM transaksi_penjualan tp
    GROUP BY DATE(tp.tanggal)

    UNION

    SELECT DATE(tpk.tanggal) AS date,
           0 AS total_harian_lainnya,
           0 AS total_harian_penjualan,
           SUM(tpk.kuantitas * pr.harga_produk) AS total_harian_perkulakan
    FROM transaksi_perkulakan tpk
    INNER JOIN produk pr ON tpk.produk_id_produk = pr.id_produk
    GROUP BY DATE(tpk.tanggal)
) AS combined_data
GROUP BY date;
