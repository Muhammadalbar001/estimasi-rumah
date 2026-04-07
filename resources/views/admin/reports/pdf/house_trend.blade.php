<!DOCTYPE html>
<html>

<head>
    <title>Tren Tipe Rumah</title>
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
        margin-top: 20px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #f3e5f5;
        text-transform: uppercase;
    }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Statistik Tren Tipe Rumah</h2>
        <p>Minat masyarakat berdasarkan pembuatan RAB di Sistem</p>
    </div>

    <table>
        <tr>
            <th>Tipe Rumah</th>
            <th>Total RAB Dibuat</th>
            <th>Persentase Keminatan</th>
        </tr>
        @php $totalSemua = $trends->sum('total'); @endphp
        @foreach($trends as $trend)
        @php $persen = $totalSemua > 0 ? ($trend->total / $totalSemua) * 100 : 0; @endphp
        <tr>
            <td style="font-weight:bold; text-transform:uppercase;">{{ $trend->house_type }}</td>
            <td>{{ $trend->total }} Proyek</td>
            <td>{{ number_format($persen, 2) }}%</td>
        </tr>
        @endforeach
        <tr style="background-color: #eee; font-weight: bold;">
            <td>TOTAL KESELURUHAN</td>
            <td>{{ $totalSemua }} Proyek</td>
            <td>100%</td>
        </tr>
    </table>
</body>

</html>