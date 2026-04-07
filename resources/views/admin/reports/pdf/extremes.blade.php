<!DOCTYPE html>
<html>

<head>
    <title>Anggaran Tertinggi & Terendah</title>
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

    .highest-bg {
        background-color: #ffebee;
    }

    .lowest-bg {
        background-color: #e8f5e9;
    }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan 5 Anggaran Proyek Tertinggi & Terendah</h2>
        <p>Dicetak pada: {{ date('d M Y H:i') }}</p>
    </div>

    <h3 style="color: #c62828;">A. Top 5 Proyek dengan Anggaran Tertinggi</h3>
    <table>
        <tr class="highest-bg">
            <th width="5%">Rank</th>
            <th>Nama Proyek</th>
            <th>Pemilik</th>
            <th>Spesifikasi</th>
            <th class="text-right">Total Anggaran (Rp)</th>
        </tr>
        @foreach($highest as $index => $est)
        <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td>{{ $est->project_name }}</td>
            <td>{{ $est->user->name ?? 'Anonim' }}</td>
            <td>{{ ucfirst($est->house_type) }} ({{ $est->building_area }} m²)</td>
            <td class="text-right font-bold">Rp {{ number_format($est->grand_total, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>

    <h3 style="color: #2e7d32;">B. Top 5 Proyek dengan Anggaran Terendah</h3>
    <table>
        <tr class="lowest-bg">
            <th width="5%">Rank</th>
            <th>Nama Proyek</th>
            <th>Pemilik</th>
            <th>Spesifikasi</th>
            <th class="text-right">Total Anggaran (Rp)</th>
        </tr>
        @foreach($lowest as $index => $est)
        <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td>{{ $est->project_name }}</td>
            <td>{{ $est->user->name ?? 'Anonim' }}</td>
            <td>{{ ucfirst($est->house_type) }} ({{ $est->building_area }} m²)</td>
            <td class="text-right font-bold">Rp {{ number_format($est->grand_total, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>