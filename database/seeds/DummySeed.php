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
                'nama_produk' => 'Garam Halus',
                'harga_terbaru' => 13000,
                'url_gambar' => '000001.jpg'
            ],
            [
                'nama_produk' => 'Gula merah',
                'harga_terbaru' => 9000,
                'url_gambar' => '000002.jpg'
            ],
            [
                'nama_produk' => 'Cabe merah giling',
                'harga_terbaru' => 16000,
                'url_gambar' => '000003.jpg'
            ],
            [
                'nama_produk' => 'Santan',
                'harga_terbaru' => 15000,
                'url_gambar' => '000004.jpg'
            ],
            [
                'nama_produk' => 'Ayam potong',
                'harga_terbaru' => 28000,
                'url_gambar' => '000005.jpg'
            ]
        ];
        $retribusis = [
            [
                'layanan' => 'Keamanan',
                'biaya_awal' => 20000
            ],
            [
                'layanan' => 'Kebersihan',
                'biaya_awal' => 50000
            ]
        ];

        Lapak::insert($lapaks);
        Produk::insert($produks);
        Retribusi::insert($retribusis);
    }
}
