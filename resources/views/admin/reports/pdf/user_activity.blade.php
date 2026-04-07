<!DOCTYPE html>
<html>

<head>
    <title>Aktivitas Pengguna</title>
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
        padding: 8px;
    }

    th {
        background-color: #fff3e0;
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Aktivitas & Leaderboard Pengguna</h2>
        <p>Rekapitulasi jumlah estimasi yang dibuat oleh masing-masing pengguna</p>
    </div>

    <table>
        <tr>
            <th width="10%">Peringkat</th>
            <th>Nama Pengguna</th>
            <th>Email</th>
            <th class="text-center">Total Proyek Dibuat</th>
            <th class="text-right">Total Nilai Estimasi (Rp)</th>
        </tr>
        @foreach($users as $index => $u)
        @if($u->estimations_count > 0)
        <tr>
            <td class="text-center">#{{ $index + 1 }}</td>
            <td><strong>{{ $u->name }}</strong></td>
            <td>{{ $u->email }}</td>
            <td class="text-center">{{ $u->estimations_count }} RAB</td>
            <td class="text-right">Rp {{ number_format($u->estimations_sum_grand_total, 0, ',', '.') }}</td>
        </tr>
        @endif
        @endforeach
    </table>
</body>

</html>