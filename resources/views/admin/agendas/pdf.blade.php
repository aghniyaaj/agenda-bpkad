<!DOCTYPE html>
<html>
<head>
    <title>Laporan Agenda BPKAD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #800000;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            color: #800000;
            font-size: 18px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 12px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f8fafc;
            font-weight: bold;
            color: #1e293b;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <table style="width: 100%; border: none; margin-top: 0; padding: 0;">
            <tr>
                <td style="width: 15%; text-align: left; border: none; padding: 0;">
                    <img src="{{ public_path('images/logo-dinas.png') }}" style="height: 65px; width: auto;" alt="Logo Dinas">
                </td>
                <td style="width: 70%; text-align: center; border: none; padding: 0;">
                    <h2>Laporan Agenda Kegiatan</h2>
                    <p>Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD) Garut</p>
                    <p>Periode: {{ \Carbon\Carbon::parse($start)->translatedFormat('d F Y') }} s/d {{ \Carbon\Carbon::parse($end)->translatedFormat('d F Y') }}</p>
                </td>
                <td style="width: 15%; text-align: right; border: none; padding: 0;">
                    <img src="{{ public_path('images/logo-bpkad.png') }}" style="height: 45px; width: auto;" alt="Logo BPKAD">
                </td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="10%">Waktu</th>
                <th width="25%">Nama Kegiatan</th>
                <th width="20%">Lokasi</th>
                <th width="15%">Kategori</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($agendas as $index => $a)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($a->date)->translatedFormat('d M Y') }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }}
                    @if($a->end_time) - {{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }} @endif
                </td>
                <td>{{ $a->title }}</td>
                <td>{{ $a->location }}</td>
                <td>{{ ucfirst($a->category) }} @if($a->tipe_kegiatan) - {{ ucfirst($a->tipe_kegiatan) }} @endif</td>
                <td class="text-center">{{ ucfirst($a->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada agenda pada periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
