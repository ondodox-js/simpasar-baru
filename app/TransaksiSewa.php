<?php

namespace App;

use App\Services\Midtrans\TransactionService;
use Illuminate\Database\Eloquent\Model;

class TransaksiSewa extends Model
{
    protected $table = 'transaksi_sewa';
    protected $primaryKey = 'kode_pembayaran';
    public $incrementing = false;

    protected $fillable = ['kode_pembayaran', 'id_sewa', 'jumlah_bayar'];

    const CREATED_AT = 'tanggal_transaksi';
    const UPDATED_AT = null;

    public static function simpanDataTransaksi(Sewa $sewa, $data){
        $lapak = $data->lapak;
        
        $transaksi = new TransaksiSewa();
        $transaksi->kode_pembayaran = $data->kode_pembayaran;
        $transaksi->token = $data->snap_token;
        $transaksi->id_sewa = $sewa->id_sewa;
        $transaksi->jumlah_bayar = $data->periode * $lapak->harga_sewa;

        $transaksi->save();
    }

    public static function dataPemesanan(){
        self::updatedStatusTransaksi();

        $transaksi = TransaksiSewa::join('sewas', 'sewas.id_sewa', '=', 'transaksi_sewa.id_sewa')
        ->join('pedagangs', 'sewas.id_pedagang', '=', 'pedagangs.id_pedagang')
        ->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')
        ->get(['transaksi_sewa.*', 'pedagangs.nama_lengkap', 'lapaks.posisi']);

        return $transaksi;
    }

    public static function status(TransaksiSewa $transaksi){
        $data = new TransactionService($transaksi->kode_pembayaran);
        return $data->getStatus();
    }

    public static function updatedStatusTransaksi(){
        $status_false = TransaksiSewa::where('status', '=', false)->get();

        foreach($status_false as $transaksi){
            try {
                $status = TransaksiSewa::status($transaksi);
                if(object_get($status, 'transaction_status') === 'settlement'){
                    $sewa = Sewa::find($transaksi->id_sewa);
                    if(!$sewa->status){
                        $sewa->status = true;
                        $sewa->save();
                    }                    
                    $transaksi->status = true;
                    $transaksi->keterangan = 'berhasil';
                    $transaksi->save();
                }elseif(object_get($status, 'transaction_status') === 'expire'){
                    $data_sewa = Sewa::find($transaksi->id_sewa);
                    $lapak = Lapak::find($data_sewa->id_lapak);
                    $lapak->status = true;
                    $lapak->save();

                    $transaksi->status = false;
                    $transaksi->keterangan = 'gagal';
                    $transaksi->save();
                }
            } catch (\Throwable $th) {
                continue;
            }
        }
    }

}
