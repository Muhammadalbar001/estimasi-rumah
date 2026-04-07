<!DOCTYPE html>
<html>

<head>
    <title>Laporan Status Proyek</title>
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
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 6px;
    }

    th {
        background-color: #f2f2f2;
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
        <h2>Laporan Pemantauan Status Proyek</h2>
        <p>Dicetak pada: {{ date('d M Y H:i') }}</p>
    </div>

    <h3>1. Rekapitulasi Status</h3>
    <table>
        <tr>
            <th>Status</th>
            <th class="text-center">Total Proyek</th>
            <th class="text-right">Total Estimasi Anggaran</th>
        </tr>
        @foreach($estimations as $est)
        <tr>
            <td>{{ strtoupper($est->status) }}</td>
            <td class="text-center">{{ $est->total }}</td>
            <td class="text-right">Rp {{ number_format($est->total_budget, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>

    <h3>2. Detail Proyek</h3>
    <table>
        <tr>
            <th width="5%">No</th>
            <th>Nama Proyek</th>
            <th>Pemilik</th>
            <th>Status</th>
        </tr>
        @foreach($details as $index => $d)
        <tr>
            <td class="text-center">{{ $index+1 }}</td>
            <td>{{ $d->project_name }}</td>
            <td>{{ $d->user->name ?? 'Anonim' }}</td>
            <td class="text-center">{{ strtoupper($d->status) }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>