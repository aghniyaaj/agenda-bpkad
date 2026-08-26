<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Agenda Hari Ini – BPKAD</title>
</head>
<body style="margin:0; padding:0; background-color:#f0f4f8; font-family: 'Segoe UI', Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f4f8; padding: 40px 0;">
    <tr>
        <td align="center">
            <table width="620" cellpadding="0" cellspacing="0" style="max-width:620px; width:100%;">

                @php
                    $statusStyle = [
                        'aktif'   => ['bg' => '#d1fae5', 'text' => '#065f46'],
                        'selesai' => ['bg' => '#dbeafe', 'text' => '#1e3a5f'],
                        'batal'   => ['bg' => '#fee2e2', 'text' => '#991b1b'],
                        'ditunda' => ['bg' => '#fef3c7', 'text' => '#92400e'],
                    ];
                    $tipeColors = [
                        'rapat'     => '#3b82f6',
                        'audiensi'  => '#a855f7',
                        'upacara'   => '#f97316',
                        'pelayanan' => '#14b8a6',
                        'pelatihan' => '#ef4444',
                    ];
                    $pimpinanList = $agendaHariIni->where('category', 'pimpinan')->values();
                    $umumList     = $agendaHariIni->where('category', 'umum')->values();
                @endphp

                {{-- ===== HEADER ===== --}}
                <tr>
                    <td style="background: linear-gradient(135deg, #1e3a5f 0%, #2563eb 100%); border-radius: 16px 16px 0 0; padding: 32px 40px; text-align: center;">
                        <p style="margin:0; color:#93c5fd; font-size:11px; letter-spacing:3px; text-transform:uppercase; font-weight:600;">Sistem Manajemen Agenda</p>
                        <h1 style="margin:8px 0 0; color:#ffffff; font-size:26px; font-weight:700;">BPKAD</h1>
                        <p style="margin:4px 0 0; color:#93c5fd; font-size:12px;">Badan Pengelola Keuangan dan Aset Daerah</p>
                        <div style="margin-top:16px; background:rgba(255,255,255,0.15); border-radius:20px; padding:7px 20px; display:inline-block;">
                            <p style="margin:0; color:#ffffff; font-size:13px; font-weight:600;">📅 {{ $tanggalHariIni }}</p>
                        </div>
                    </td>
                </tr>

                {{-- ===== RINGKASAN COUNT ===== --}}
                <tr>
                    <td style="background:#1d4ed8; padding: 0;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="33%" style="padding:14px 0; text-align:center; border-right:1px solid rgba(255,255,255,0.2);">
                                    <p style="margin:0; color:#ffffff; font-size:24px; font-weight:700;">{{ $agendaHariIni->count() }}</p>
                                    <p style="margin:2px 0 0; color:#bfdbfe; font-size:11px; font-weight:600;">Total Agenda</p>
                                </td>
                                <td width="33%" style="padding:14px 0; text-align:center; border-right:1px solid rgba(255,255,255,0.2);">
                                    <p style="margin:0; color:#ffffff; font-size:24px; font-weight:700;">{{ $jumlahPimpinan }}</p>
                                    <p style="margin:2px 0 0; color:#bfdbfe; font-size:11px; font-weight:600;">Agenda Pimpinan</p>
                                </td>
                                <td width="33%" style="padding:14px 0; text-align:center;">
                                    <p style="margin:0; color:#ffffff; font-size:24px; font-weight:700;">{{ $jumlahUmum }}</p>
                                    <p style="margin:2px 0 0; color:#bfdbfe; font-size:11px; font-weight:600;">Agenda Umum</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                {{-- ===== BODY ===== --}}
                <tr>
                    <td style="background-color:#ffffff; padding: 32px 40px 0;">

                        {{-- Salam --}}
                        <p style="margin:0 0 4px; color:#374151; font-size:15px; font-weight:700;">Assalamu'alaikum Wr. Wb.</p>
                        <p style="margin:0 0 28px; color:#6b7280; font-size:14px; line-height:1.7;">
                            Berikut adalah ringkasan seluruh kegiatan yang terjadwal untuk hari ini.
                            Harap dipersiapkan segala kebutuhan yang berkaitan dengan agenda di bawah ini.
                        </p>

                        {{-- ===== AGENDA PIMPINAN ===== --}}
                        @if($pimpinanList->isNotEmpty())
                        <div style="margin-bottom: 28px;">
                            <div style="background: linear-gradient(90deg, #1e3a5f, #2563eb); border-radius:8px 8px 0 0; padding:10px 16px;">
                                <p style="margin:0; color:#ffffff; font-size:13px; font-weight:700; letter-spacing:0.5px;">
                                    👤 AGENDA PIMPINAN &nbsp;·&nbsp; {{ $pimpinanList->count() }} Kegiatan
                                </p>
                            </div>
                            @foreach($pimpinanList as $index => $item)
                                @php
                                    $ss = $statusStyle[$item->status] ?? ['bg' => '#f3f4f6', 'text' => '#374151'];
                                    $tc = $tipeColors[strtolower($item->tipe_kegiatan ?? '')] ?? '#6b7280';
                                    $isLast = $index === $pimpinanList->count() - 1;
                                @endphp
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="background:#f8faff; border: 1px solid #dbeafe; border-top: none; {{ $isLast ? 'border-radius: 0 0 8px 8px;' : '' }} padding:14px 16px;">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="vertical-align:top;">
                                                        <p style="margin:0 0 4px; color:#1e3a5f; font-size:14px; font-weight:700;">
                                                            {{ $index + 1 }}. {{ $item->title }}
                                                        </p>
                                                        <p style="margin:0; color:#6b7280; font-size:12px; line-height:1.8;">
                                                            🕐 {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }}@if($item->end_time) – {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}@endif WIB
                                                            &nbsp;&nbsp;📍 {{ $item->location }}
                                                        </p>
                                                    </td>
                                                    <td style="text-align:right; vertical-align:top; white-space:nowrap; padding-left:12px;">
                                                        <span style="display:inline-block; background:{{ $ss['bg'] }}; color:{{ $ss['text'] }}; font-size:11px; font-weight:700; padding:3px 10px; border-radius:20px;">
                                                            {{ ucfirst($item->status) }}
                                                        </span><br>
                                                        @if($item->tipe_kegiatan)
                                                        <span style="display:inline-block; margin-top:4px; background:{{ $tc }}20; color:{{ $tc }}; font-size:11px; font-weight:600; padding:2px 8px; border-radius:20px;">
                                                            {{ ucfirst($item->tipe_kegiatan) }}
                                                        </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                        @endif

                        {{-- ===== AGENDA UMUM ===== --}}
                        @if($umumList->isNotEmpty())
                        <div style="margin-bottom: 28px;">
                            <div style="background: linear-gradient(90deg, #065f46, #10b981); border-radius:8px 8px 0 0; padding:10px 16px;">
                                <p style="margin:0; color:#ffffff; font-size:13px; font-weight:700; letter-spacing:0.5px;">
                                    👥 AGENDA UMUM &nbsp;·&nbsp; {{ $umumList->count() }} Kegiatan
                                </p>
                            </div>
                            @foreach($umumList as $index => $item)
                                @php
                                    $ss = $statusStyle[$item->status] ?? ['bg' => '#f3f4f6', 'text' => '#374151'];
                                    $tc = $tipeColors[strtolower($item->tipe_kegiatan ?? '')] ?? '#6b7280';
                                    $isLast = $index === $umumList->count() - 1;
                                @endphp
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="background:#f0fdf8; border: 1px solid #a7f3d0; border-top: none; {{ $isLast ? 'border-radius: 0 0 8px 8px;' : '' }} padding:14px 16px;">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="vertical-align:top;">
                                                        <p style="margin:0 0 4px; color:#065f46; font-size:14px; font-weight:700;">
                                                            {{ $index + 1 }}. {{ $item->title }}
                                                        </p>
                                                        <p style="margin:0; color:#6b7280; font-size:12px; line-height:1.8;">
                                                            🕐 {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }}@if($item->end_time) – {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}@endif WIB
                                                            &nbsp;&nbsp;📍 {{ $item->location }}
                                                        </p>
                                                    </td>
                                                    <td style="text-align:right; vertical-align:top; white-space:nowrap; padding-left:12px;">
                                                        <span style="display:inline-block; background:{{ $ss['bg'] }}; color:{{ $ss['text'] }}; font-size:11px; font-weight:700; padding:3px 10px; border-radius:20px;">
                                                            {{ ucfirst($item->status) }}
                                                        </span><br>
                                                        @if($item->tipe_kegiatan)
                                                        <span style="display:inline-block; margin-top:4px; background:{{ $tc }}20; color:{{ $tc }}; font-size:11px; font-weight:600; padding:2px 8px; border-radius:20px;">
                                                            {{ ucfirst($item->tipe_kegiatan) }}
                                                        </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                        @endif

                        {{-- Penutup --}}
                        <p style="margin:0 0 4px; color:#374151; font-size:14px; line-height:1.8;">
                            Demikian ringkasan agenda kegiatan hari ini. Mohon mempersiapkan segala keperluan
                            yang berkaitan dengan kegiatan tersebut dengan sebaik-baiknya.
                        </p>
                        <p style="margin:0 0 24px; color:#374151; font-size:14px;">
                            Wassalamu'alaikum Wr. Wb.<br>
                            <strong>Sistem Agenda BPKAD</strong>
                        </p>

                        <p style="margin:0; color:#d1d5db; font-size:11px; text-align:center; border-top:1px solid #f3f4f6; padding-top:16px;">
                            Dikirim pada {{ now()->translatedFormat('d F Y, H:i') }} WIB
                        </p>
                    </td>
                </tr>

                {{-- ===== FOOTER ===== --}}
                <tr>
                    <td style="background-color:#1e3a5f; border-radius: 0 0 16px 16px; padding: 22px 40px; text-align:center;">
                        <p style="margin:0; color:#93c5fd; font-size:12px; line-height:1.7;">
                            Email ini dikirim otomatis oleh <strong style="color:#ffffff;">Sistem Agenda BPKAD</strong>.<br>
                            Mohon tidak membalas email ini.
                        </p>
                        <p style="margin:10px 0 0; color:#4b6b8a; font-size:11px;">
                            &copy; {{ date('Y') }} BPKAD &mdash; Badan Pengelola Keuangan dan Aset Daerah
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
