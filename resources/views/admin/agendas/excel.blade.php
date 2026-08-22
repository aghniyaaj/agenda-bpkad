<table>
    <tr>
        <th colspan="7" style="text-align: center; font-size: 14px; font-weight: bold;">LAPORAN AGENDA KEGIATAN</th>
    </tr>
    <tr>
        <th colspan="7" style="text-align: center; font-size: 12px; font-weight: bold;">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH (BPKAD) GARUT</th>
    </tr>
    <tr>
        <th colspan="7" style="text-align: center; font-size: 11px;">Periode: {{ \Carbon\Carbon::parse($start)->translatedFormat('d F Y') }} s/d {{ \Carbon\Carbon::parse($end)->translatedFormat('d F Y') }}</th>
    </tr>
    <tr>
        <th colspan="7"></th>
    </tr>
    <tr>
        <th style="border: 1px solid #000000; font-weight: bold; background-color: #f1f5f9; text-align: center;">No</th>
        <th style="border: 1px solid #000000; font-weight: bold; background-color: #f1f5f9; text-align: center;">Tanggal</th>
        <th style="border: 1px solid #000000; font-weight: bold; background-color: #f1f5f9; text-align: center;">Waktu</th>
        <th style="border: 1px solid #000000; font-weight: bold; background-color: #f1f5f9; text-align: center;">Nama Kegiatan</th>
        <th style="border: 1px solid #000000; font-weight: bold; background-color: #f1f5f9; text-align: center;">Lokasi</th>
        <th style="border: 1px solid #000000; font-weight: bold; background-color: #f1f5f9; text-align: center;">Kategori</th>
        <th style="border: 1px solid #000000; font-weight: bold; background-color: #f1f5f9; text-align: center;">Status</th>
    </tr>
    @forelse($agendas as $index => $a)
    <tr>
        <td style="border: 1px solid #000000; text-align: center;">{{ $index + 1 }}</td>
        <td style="border: 1px solid #000000; text-align: center;">{{ \Carbon\Carbon::parse($a->date)->translatedFormat('d M Y') }}</td>
        <td style="border: 1px solid #000000; text-align: center;">
            {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }} @if($a->end_time)- {{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}@endif
        </td>
        <td style="border: 1px solid #000000;">{{ $a->title }}</td>
        <td style="border: 1px solid #000000;">{{ $a->location }}</td>
        <td style="border: 1px solid #000000;">{{ ucfirst($a->category) }} @if($a->tipe_kegiatan) - {{ ucfirst($a->tipe_kegiatan) }} @endif</td>
        <td style="border: 1px solid #000000; text-align: center;">{{ ucfirst($a->status) }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="7" style="border: 1px solid #000000; text-align: center;">Tidak ada agenda pada periode ini.</td>
    </tr>
    @endforelse
</table>
