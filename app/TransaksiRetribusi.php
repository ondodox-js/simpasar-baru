<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use stdClass;

class TransaksiRetribusi extends Model
{
    protected $table = 'transaksi_retribusi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_sewa', 'jumlah_bayar', 'jumlah_periode'];

    const CREATED_AT = 'tanggal_transaksi';
    const UPDATED_AT = null;

    public static function joinSewaLapak(){
        return TransaksiRetribusi::join('sewas', 'transaksi_retribusi.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->get();
    }

    public function bayarSewa($request){
        $lapak = Lapak::find($this->id_lapak);

        $transaksi = new TransaksiSewa();
        $transaksi->id_sewa = $this->id_sewa;
        $transaksi->jumlah_bayar = $lapak->biayaSewa($request->jumlahPeriode);
        if($request->keterangan){
            $transaksi->keterangan = $request->keterangan;
        }
        $transaksi->jumlah_periode = $request->jumlahPeriode;

        return $transaksi;
    }

    public static function transaksiBaru($request, Sewa $sewa){
        $periode = $request->jumlahPeriode;

        $transaksi = new TransaksiRetribusi();
        $transaksi->id_sewa = $sewa->id_sewa;
        $transaksi->jumlah_periode = $periode;
        
        $lapak = Lapak::find($sewa->id_lapak);


        $transaksi->jumlah_bayar = $lapak->biayaRetribusi() * $periode;

        if($request->keterangan){
            $transaksi->keterangan = $request->keterangan;
        }

        return $transaksi;
    }

    public function findData(){
        return $this->where('id_transaksi', '=', $this->id_transaksi)->join('sewas', 'transaksi_retribusi.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->first();
    }

    public function updateTransaksi($request){
        $periode = $request->jumlahPeriode;
        
        $this->jumlah_periode = $request->jumlahPeriode;
        $this->jumlah_bayar = Retribusi::biayaSeluruh() * $periode;
        if($request->keterangan){
            $this->keterangan = $request->keterangan;
        };

        $this->save();
    }

    public static function getIncomeAYear(){
        $items = TransaksiRetribusi::select([DB::raw('extract(month from tanggal_transaksi) as month'), DB::raw('sum(jumlah_bayar) as total')])->groupBy('month')->whereYear('tanggal_transaksi', '=', now())->get();
        
        $income1 = new stdClass();
        foreach($items as $item){
            $month = $item->month;
            $income1->$month = $item->total;
        }
        return $income1;
    }

    public static function getAllRetribusi(){
        $keamanan = new stdClass();
        $keamanan->layanan = "Keamanan";
        $keamanan->biaya = 50000;

        $kebersihan = new stdClass();
        $kebersihan->layanan = "Kebersihan";
        $kebersihan->biaya = 30000;

        $data = [
            $keamanan,
            $kebersihan
        ];
        return $data;
    }
}
