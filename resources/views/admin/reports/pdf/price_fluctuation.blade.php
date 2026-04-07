<!DOCTYPE html>
<html>

<head>
    <title>Fluktuasi Harga Material</title>
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
        padding: 8px;
    }

    th {
        background-color: #e8eaf6;
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
        <h2>Laporan Fluktuasi & Rata-Rata Harga Material Aktual</h2>
        <p>Berdasarkan harga realita lapangan yang diinput oleh Pengguna</p>
    </div>

    <table>
        <tr>
            <th width="5%">No</th>
            <th>Nama Material / Barang</th>
            <th>Satuan</th>
            <th class="text-right">Harga Terendah (Min)</th>
            <th class="text-right">Harga Tertinggi (Max)</th>
            <th class="text-right" style="background-color: #fff9c4;">Harga Rata-Rata (Avg)</th>
        </tr>
        @foreach($fluctuations as $index => $item)
        <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td><strong>{{ $item->masterMaterial->name }}</strong></td>
            <td class="text-center">{{ $item->masterMaterial->unit }}</td>
            <td class="text-right" style="color: green;">Rp {{ number_format($item->min_price, 0, ',', '.') }}</td>
            <td class="text-right" style="color: red;">Rp {{ number_format($item->max_price, 0, ',', '.') }}</td>
            <td class="text-right" style="background-color: #fffde7; font-weight:bold;">
                Rp {{ number_format($item->avg_price, 0, ',', '.') }}
            </td>
        </tr>
        @endforeach
    </table>

    <p style="font-size: 10px; color: #666; margin-top:20px;">*Catatan untuk Admin: Kolom Harga Rata-Rata dapat
        dijadikan acuan untuk memperbarui Master Data Harga (Rule-Based) di bulan berikutnya agar perhitungan sistem
        semakin akurat.</p>
</body>

</html>