<?php

use App\Lapak;
use App\Produk;
use App\Retribusi;
use Illuminate\Database\Seeder;

class DummySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lapaks = [
            [
                'posisi' => 'L001',
                'luas' => 6,
                'harga_sewa' => 9000,
                'id_retribusi' => 1
            ],
            [
                'posisi' => 'L002',
                'luas' => 7,
                'harga_sewa' => 11000,
                'id_retribusi' => 2
            ],
            [
                'posisi' => 'L003',
                'luas' => 3,
                'harga_sewa' => 13000,
                'id_retribusi' => 3
            ],
            [
                'posisi' => 8,
                'luas' => '5200',
                'harga_sewa' => 15000,
                'id_retribusi' => 1
            ],
            [
                'posisi' => 'L005',
                'luas' => 4,
                'harga_sewa' => 17000,
                'id_retribusi' => 2
            ],
        ];
        $produks = [
            [
                'nama_produk' => 'Bawang merah',
                'harga_terbaru' => 13000,
                'url_gambar' => 'storage/produk/bawang-merah.jpg'
            ],
            [
                'nama_produk' => 'Bawang putih',
                'harga_terbaru' => 9000,
                'url_gambar' => 'storage/produk/bawang-putih.jpg'
            ],
            [
                'nama_produk' => 'Beras',
                'harga_terbaru' => 16000,
                'url_gambar' => 'storage/produk/beras.jpg'
            ],
            [
                'nama_produk' => 'Brokoli',
                'harga_terbaru' => 15000,
                'url_gambar' => 'storage/produk/brokoli.jpg'
            ],
            [
                'nama_produk' => 'Cabai',
                'harga_terbaru' => 28000,
                'url_gambar' => 'storage/produk/cabai.jpg'
            ],
            [
                'nama_produk' => 'Telur',
                'harga_terbaru' => 28000,
                'url_gambar' => 'storage/produk/telur.jpg'
            ],
            [
                'nama_produk' => 'Tepung terigu',
                'harga_terbaru' => 28000,
                'url_gambar' => 'storage/produk/tepung-terigu.jpg'
            ],
            [
                'nama_produk' => 'Tomat',
                'harga_terbaru' => 28000,
                'url_gambar' => 'storage/produk/tomat.jpg'
            ],
        ];
        $retribusis = [
            [
                'kelas' => 'A',
                'harga_m' => 350
            ],
            [
                'kelas' => 'B',
                'harga_m' => 200
            ],
            [
                'kelas' => 'C',
                'harga_m' => 150
            ],
        ];

        Retribusi::insert($retribusis);
        Lapak::insert($lapaks);
        Produk::insert($produks);
    }
}
