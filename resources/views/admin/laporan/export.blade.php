<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            padding: 1rem;
            border: 1px solid #9c9ca1;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .head{
            text-align: center;
        }
        table{
            width: 100%;
        }
        .text-right{
            text-align: right
        }
        th{
            padding: 1rem;
        }
        td{
            
            padding: .5rem;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="head">
                <h3>Laporan transaksi</h3>
            </div>
            <div style="text-align: left">
                <h5>Nomor laporan : {{ 'banjar-' . time() }}</h5>
            </div>
            <div class="text-right">
                <h6>Mulai : {{ $date ? $date['start'] : now() }}</h6>
                <h6>Akhir : {{ $date ? $date['end'] : now() }}</h6>
            </div>
        @if (count($transaksis) > 0)
            <table cellspacing="0" cellpadding="1" class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>TANGGAL TRANSAKSI</th>
                    <th>KETERANGAN</th>
                    <th style="text-align: right">POSISI</th>
                    <th style="text-align: right">JUMLAH BAYAR</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($transaksis as $item)
                    <tr>
                        <td><center>{{ $loop->iteration }}</center></td>
                        <td>{{ date('d-m-Y h:m:s', strtotime($item->tanggal_transaksi)) }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->posisi }}</td>
                        <td style="text-align: right">Rp {{ number_format($item->jumlah_bayar,0,',','.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" rowspan="1"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td colspan="3" rowspan="4">
                    </td>
                    <td><strong>Total</strong></td>
                    <td style="text-align: right">Rp {{ number_format($total,0,',','.') }}</td>
                </tr>
                </tbody>
            </table>
        @else
            <h3 class="mt">Transaksi tidak ada!</h3>
        @endif
    </div>
</body>
</html>
