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
                'luas' => '3300',
                'harga_sewa' => 9000
            ],
            [
                'posisi' => 'L002',
                'luas' => '4300',
                'harga_sewa' => 11000
            ],
            [
                'posisi' => 'L003',
                'luas' => '2300',
                'harga_sewa' => 13000
            ],
            [
                'posisi' => 'L004',
                'luas' => '5200',
                'harga_sewa' => 15000
            ],
            [
                'posisi' => 'L005',
                'luas' => '6100',
                'harga_sewa' => 17000
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
                'layanan' => 'Keamanan',
                'biaya' => 20000
            ],
            [
                'layanan' => 'Kebersihan',
                'biaya' => 50000
            ]
        ];

        Lapak::insert($lapaks);
        Produk::insert($produks);
        Retribusi::insert($retribusis);
    }
}
