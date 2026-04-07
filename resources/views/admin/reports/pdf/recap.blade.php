<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekapitulasi Proyek</title>
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

    .header h2 {
        margin: 0;
        padding: 0;
        font-size: 18px;
        text-transform: uppercase;
    }

    .header p {
        margin: 5px 0 0 0;
        font-size: 12px;
        color: #555;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 11px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .status-badge {
        padding: 3px 6px;
        border-radius: 3px;
        font-size: 10px;
        font-weight: bold;
        text-transform: uppercase;
    }
    </style>
</head>

<body>

    <div class="header">
        <h2>Laporan Rekapitulasi Proyek Pembangunan</h2>
        <p>EstimasiApp - Sistem Pendukung Keputusan Rule-Based</p>
        <p>Dicetak pada: {{ date('d F Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Nama Proyek</th>
                <th width="15%">Pemilik</th>
                <th width="15%">Spesifikasi</th>
                <th width="15%" class="text-center">Status</th>
                <th width="15%" class="text-right">Total Anggaran (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php $totalSemua = 0; @endphp
            @forelse($estimations as $index => $est)
            @php $totalSemua += $est->grand_total; @endphp
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $est->created_at->format('d/m/Y H:i') }}</td>
                <td><strong>{{ $est->project_name }}</strong></td>
                <td>{{ $est->user->name ?? 'Anonim' }}</td>
                <td>
                    Tipe: {{ ucfirst($est->house_type) }}<br>
                    Luas: {{ $est->building_area }} m²
                </td>
                <td class="text-center">
                    {{ strtoupper($est->status) }}
                </td>
                <td class="text-right">{{ number_format($est->grand_total, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data proyek.</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right" style="font-weight: bold; background-color: #e6f2ff;">GRAND TOTAL
                    KESELURUHAN:</td>
                <td class="text-right" style="font-weight: bold; background-color: #e6f2ff;">Rp
                    {{ number_format($totalSemua, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>