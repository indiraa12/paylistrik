<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf-token() }}">
    <title>CETAK LAPORAN PEMBAYARAN</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Pembayaran</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No.</th>
                <th>Tagihan</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pembayaran</th>
                <th>Bulan Bayar</th>
                <th>Biaya Admin</th>
                <th>Total Bayar</th>
                <th>Nama Admin</th>
            </tr>
        </table>
    </div>
</body>
</html>