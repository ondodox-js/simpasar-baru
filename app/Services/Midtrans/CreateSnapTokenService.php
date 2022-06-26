<?php
 
namespace App\Services\Midtrans;
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => 'ondodox-id-' . time(),
                'gross_amount' => 210000,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => '150000',
                    'quantity' => 1,
                    'name' => 'Flashdisk Toshiba 32GB',
                ],
                [
                    'id' => 2,
                    'price' => '60000',
                    'quantity' => 2,
                    'name' => 'Memory Card VGEN 4GB',
                ],
            ],
            'customer_details' => [
                'first_name' => 'Martin Mulyo Syahidin',
                'email' => 'mulyosyahidin95@gmail.com',
                'phone' => '081234567890',
            ]
        ];
 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
    public function getSnapTokenPenyewaan()
    {
        $id_transaksi = 'ondodox-id-' . time();
        $params = [
            'transaction_details' => [
                'order_id' => $id_transaksi,
                'gross_amount' => $this->order['harga_sewa'] + $this->order['periode_sewa'],
            ],
            'item_details' => [
                [
                    'id' => $this->order['id_lapak'],
                    'price' => $this->order['harga_sewa'],
                    'quantity' => $this->order['periode_sewa'],
                    'name' => 'Lapak posisi ' . $this->order['posisi_lapak']
                ]
            ],
            'customer_details' => [
                'first_name' => $this->order['nama_lengkap'],
                'email' => $this->order['email'],
                'phone' => $this->order['no_hp'],
            ]
        ];
 
        $snapToken = Snap::getSnapToken($params);
 
        return ['snap_token' => $snapToken, 'kode_pembayaran' => $id_transaksi];
    }
}