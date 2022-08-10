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
        return TransaksiRetribusi::join('sewas', 'transaksi_retribusi.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->join('pedagangs', 'sewas.id_pedagang', '=', 'pedagangs.id_pedagang')->get();
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
        $data_sum_periode = TransaksiRetribusi::sumTotalPeriodeRightJoinSewas($sewa->id_sewa);
        $sewa->getStatusRetribusi($data_sum_periode->total_periode); 
        $periode = $sewa->interval + 1;

        $transaksi = new TransaksiRetribusi();
        $transaksi->id_sewa = $sewa->id_sewa;
        $transaksi->jumlah_periode = $periode;

        $transaksi->jumlah_bayar = 150000 * $periode;

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

    public static function sumTotalPeriodeRightJoinSewas($id_sewa = 0){
        if($id_sewa == 0){
            $query = 'SELECT sewas.id_sewa, COALESCE(SUM(jumlah_periode), 0) as total_periode, MAX(tanggal_transaksi) as transaksi_terbaru FROM transaksi_retribusi RIGHT JOIN sewas ON sewas.id_sewa = transaksi_retribusi.id_sewa GROUP BY sewas.id_sewa ORDER BY sewas.id_sewa ASC;';
            
            $items = DB::select($query);
            return collect($items);
        }else{
            $query = 'SELECT sewas.id_sewa, COALESCE(SUM(jumlah_periode), 0) as total_periode, MAX(tanggal_transaksi) as transaksi_terbaru FROM transaksi_retribusi RIGHT JOIN sewas ON sewas.id_sewa = transaksi_retribusi.id_sewa WHERE sewas.id_sewa = ' . $id_sewa . ' GROUP BY sewas.id_sewa ORDER BY sewas.id_sewa ASC;';
            $item = DB::selectOne($query);
            return $item;
        }
    }

    public static function statusBayarRetribusi(bool $status){
        $data = [
        ];

        $data_sum = TransaksiRetribusi::sumTotalPeriodeRightJoinSewas();
        foreach($data_sum as $item){

            $sewa = Sewa::find($item->id_sewa);

            $sewa->transaksi_terbaru = $item->transaksi_terbaru;
            $sewa->getStatusRetribusi($item->total_periode);
            if($sewa->aktif == $status){
                array_push($data, $sewa);
            }
        }
        return $data;
    }
}
