<!DOCTYPE html>
<html>

<head>
    <title>Gap Analysis</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 11px;
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
        background-color: #e6f2ff;
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .underbudget {
        color: green;
        font-weight: bold;
    }

    .overbudget {
        color: red;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Analisis Komparasi (Gap Analysis)</h2>
        <p>Hanya mencakup proyek dalam Pembangunan / Selesai</p>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Proyek</th>
            <th>Pemilik</th>
            <th>Estimasi Sistem (RAB)</th>
            <th>Pengeluaran Aktual</th>
            <th>Selisih (Deviasi)</th>
            <th>Kesimpulan</th>
        </tr>
        @foreach($estimations as $index => $est)
        @php
        $aktual = $est->actualMaterials->sum('subtotal');
        $selisih = $est->grand_total - $aktual;
        $status = $selisih >= 0 ? 'Underbudget' : 'Overbudget';
        $class = $selisih >= 0 ? 'underbudget' : 'overbudget';
        @endphp
        <tr>
            <td style="text-align:center;">{{ $index+1 }}</td>
            <td>{{ $est->project_name }}</td>
            <td>{{ $est->user->name ?? '-' }}</td>
            <td class="text-right">Rp {{ number_format($est->grand_total, 0, ',', '.') }}</td>
            <td class="text-right">Rp {{ number_format($aktual, 0, ',', '.') }}</td>
            <td class="text-right {{ $class }}">Rp {{ number_format(abs($selisih), 0, ',', '.') }}</td>
            <td style="text-align:center;" class="{{ $class }}">{{ strtoupper($status) }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>