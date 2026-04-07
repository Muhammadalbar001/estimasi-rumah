<!DOCTYPE html>
<html>

<head>
    <title>RAB - {{ $estimation->project_name }}</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 1.5;
    }

    .header {
        text-align: center;
        border-bottom: 2px solid #333;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .header h2 {
        margin: 0;
        text-transform: uppercase;
    }

    .info-table {
        width: 100%;
        margin-bottom: 20px;
    }

    .info-table td {
        padding: 3px 0;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .data-table th,
    .data-table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .data-table th {
        background-color: #f0f0f0;
        font-size: 11px;
        text-transform: uppercase;
    }

    .text-right {
        text-align: right;
    }

    .footer {
        margin-top: 30px;
        text-align: center;
        font-size: 10px;
        color: #777;
        font-style: italic;
    }

    .section-title {
        font-weight: bold;
        background: #eee;
        padding: 5px;
        margin-top: 15px;
        border: 1px solid #ccc;
    }
    </style>
</head>

<body>
    <div class="header">
        <h2>Rencana Anggaran Biaya (RAB)</h2>
        <p>Aplikasi Estimasi Pembangunan Rumah - SPK Rule-Based</p>
    </div>

    <table class="info-table">
        <tr>
            <td width="20%">Nama Proyek</td>
            <td width="30%">: <strong>{{ $estimation->project_name }}</strong></td>
            <td width="20%">Tipe Rumah</td>
            <td width="30%">: {{ strtoupper($estimation->house_type) }}</td>
        </tr>
        <tr>
            <td>Pemilik</td>
            <td>: {{ $estimation->user->name }}</td>
            <td>Luas Bangunan</td>
            <td>: {{ $estimation->building_area }} m²</td>
        </tr>
        <tr>
            <td>Tanggal Cetak</td>
            <td>: {{ date('d F Y') }}</td>
            <td>Status</td>
            <td>: {{ strtoupper($estimation->status) }}</td>
        </tr>
    </table>

    <div class="section-title">I. ESTIMASI SISTEM (RULE-BASED)</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Deskripsi Pekerjaan</th>
                <th class="text-right">Volume</th>
                <th class="text-right">Harga Satuan</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Struktur Utama & Atap (Dasar)</td>
                <td class="text-right">{{ $estimation->building_area }} m²</td>
                <td class="text-right">Rp {{ number_format($estimation->price_per_m2_used, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($estimation->total_base_cost, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Kamar Tidur ({{ $estimation->bed_count }} Ruang)</td>
                <td class="text-right">{{ $estimation->bed_count }} Unit</td>
                <td class="text-right">Rp {{ number_format($estimation->bed_price_used, 0, ',', '.') }}</td>
                <td class="text-right">Rp
                    {{ number_format($estimation->bed_count * $estimation->bed_price_used, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Kamar Mandi ({{ $estimation->bath_count }} Ruang)</td>
                <td class="text-right">{{ $estimation->bath_count }} Unit</td>
                <td class="text-right">Rp {{ number_format($estimation->bath_price_used, 0, ',', '.') }}</td>
                <td class="text-right">Rp
                    {{ number_format($estimation->bath_count * $estimation->bath_price_used, 0, ',', '.') }}</td>
            </tr>
            <tr style="background: #f9f9f9; font-weight: bold;">
                <td colspan="3" class="text-right">TOTAL ESTIMASI RAB SISTEM</td>
                <td class="text-right">Rp {{ number_format($estimation->grand_total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    @if($estimation->actualMaterials->count() > 0)
    <div class="section-title">II. REALISASI BELANJA AKTUAL (MATERIAL)</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Nama Material</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Diskon</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estimation->actualMaterials as $mat)
            <tr>
                <td>{{ $mat->masterMaterial->name }}</td>
                <td class="text-right">{{ $mat->qty }} {{ $mat->masterMaterial->unit }}</td>
                <td class="text-right">{{ number_format($mat->price, 0, ',', '.') }}</td>
                <td class="text-right">{{ number_format($mat->discount, 0, ',', '.') }}</td>
                <td class="text-right">{{ number_format($mat->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr style="background: #f9f9f9; font-weight: bold;">
                <td colspan="4" class="text-right">TOTAL BELANJA AKTUAL</td>
                <td class="text-right">Rp
                    {{ number_format($estimation->actualMaterials->sum('subtotal'), 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
    @endif

    <div class="footer">
        * Dokumen ini adalah estimasi digital dan digunakan sebagai acuan perencanaan anggaran biaya pembangunan.
    </div>
</body>

</html>