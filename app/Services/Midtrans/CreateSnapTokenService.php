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
        $lapak = $this->order->lapak;
        $pedagang = $this->order->pedagang;
        $periode = $this->order->periode;

        $params = [
            'transaction_details' => [
                'order_id' => $id_transaksi,
                'gross_amount' => $lapak->harga_sewa * $periode,
            ],
            'item_details' => [
                [
                    'id' => $lapak->id_lapak,
                    'price' => $lapak->harga_sewa,
                    'quantity' => $periode,
                    'name' => 'Lapak posisi ' . $lapak->posisi
                ]
            ],
            'customer_details' => [
                'first_name' => $pedagang->namaLengkap,
                'email' => $pedagang->email,
                'phone' => $pedagang->noHp,
            ]
        ];
 
        $snap_token = Snap::getSnapToken($params);

        
        $this->order->snap_token = $snap_token;
        $this->order->kode_pembayaran = $id_transaksi;
 
        return $this->order;
    }
}