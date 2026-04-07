<!DOCTYPE html>
<html>

<head>
    <title>Popularitas Material</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    .header {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 6px;
    }

    th {
        background-color: #f3e8ff;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Popularitas Material Aktual</h2>
        <p>Data diambil berdasarkan riwayat belanja masyarakat</p>
    </div>

    <table>
        <tr>
            <th width="10%">Peringkat</th>
            <th>Nama Material / Barang</th>
            <th width="15%">Satuan</th>
            <th width="20%" class="text-center">Total Kuantitas (Terjual/Dipakai)</th>
            <th width="25%" class="text-right">Estimasi Perputaran Uang</th>
        </tr>
        @foreach($materials as $index => $mat)
        <tr>
            <td class="text-center">#{{ $index+1 }}</td>
            <td>{{ $mat->masterMaterial->name }}</td>
            <td>{{ $mat->masterMaterial->unit }}</td>
            <td class="text-center" style="font-weight: bold;">{{ $mat->total_qty }}</td>
            <td class="text-right">Rp {{ number_format($mat->total_spent, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>