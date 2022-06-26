PEMBAYARAN RETRIBUSI

Pedagang (pedagangs)

-   id_pedagang
-   nama lengkap
-   no.telepon
-   NIK
-   alamat lengkap

Lahan/Lapak (lapaks)

-   kode lapak
-   posisi
-   luas
-   status

penyewaan (sewas)

-   id sewa
-   tgl sewa
-   harga sewa awal
-   Kenaikan sewa
-   id pedagang
-   kode lapak
-   periode sewa (bulan)

transaksi_penyewaan (transaksi-sewa)

-   invoice
-   id sewa
-   tgl_bayar
-   jumlah bayar
-   status

produk komoditas (produks)

-   kode produk
-   nama produk
-   harga awal
-   harga akhir
-   gambar

artikel (artikels)

-   kode artikel
-   judul
-   deskripsi
-   link

retribusi (retribusis)

-   id_retribusi
-   Jenis retribusi
-   Biaya awal
-   Biaya kenaikan

pembayaran retribusi (transaksi_retribusis)

-   invoice/id pembayaran
<!-- ganti ke id_sewa -->
-   id pedagang
-   id lapak
<!-- -- -->
-   id_sewa
-   jumlah bayar
-   tgl bayar
-   status
-   keterangan
