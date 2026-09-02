@extends('admin.layout')

@section('title', 'Dashboard Ringkasan Agenda')

@section('content')
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; margin-bottom: 35px;">
    <!-- Card 1 -->
    <div style="background: white; padding: 25px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
            <h4 style="color: var(--text-light); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.4; width: 60%;">AGENDA PIMPINAN HARI INI</h4>
            <div style="background: #fce7f3; color: #9f1239; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 2.8rem; color: var(--text-dark); margin-bottom: 5px; font-weight: 700; line-height: 1;">{{ $countPimpinanHariIni }}</h2>
            <div style="display: flex; align-items: center; gap: 4px; color: #16a34a; font-size: 0.85rem; font-weight: 500;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                +2 dari kemarin
            </div>
        </div>
        <div style="border-top: 1px solid #f1f5f9; padding-top: 15px; margin-top: auto;">
            <a href="{{ route('admin.agendas.pimpinan') }}" style="color: #9f1239; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 5px;">
                Kelola Agenda <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>

    <!-- Card 2 -->
    <div style="background: white; padding: 25px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
            <h4 style="color: var(--text-light); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.4; width: 60%;">AGENDA UMUM HARI INI</h4>
            <div style="background: #e0f2fe; color: #0369a1; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 2.8rem; color: var(--text-dark); margin-bottom: 5px; font-weight: 700; line-height: 1;">{{ $countUmumHariIni }}</h2>
            <div style="display: flex; align-items: center; gap: 4px; color: #16a34a; font-size: 0.85rem; font-weight: 500;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                +4 dari kemarin
            </div>
        </div>
        <div style="border-top: 1px solid #f1f5f9; padding-top: 15px; margin-top: auto;">
            <a href="{{ route('admin.agendas.umum') }}" style="color: #0369a1; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 5px;">
                Kelola Agenda <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>

    <!-- Card 3 -->
    <div style="background: white; padding: 25px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
            <h4 style="color: var(--text-light); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.4; width: 65%;">AGENDA SEMINGGU MENDATANG</h4>
            <div style="background: #dcfce7; color: #15803d; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 2.8rem; color: var(--text-dark); margin-bottom: 5px; font-weight: 700; line-height: 1;">{{ $countSeminggu }}</h2>
            <div style="height: 19px;"></div> <!-- Placeholder for alignment -->
        </div>
        <div style="border-top: 1px solid #f1f5f9; padding-top: 15px; margin-top: auto;">
            <a href="{{ route('admin.calendar') }}" style="color: #15803d; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 5px;">
                Lihat Agenda <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>

    <!-- Card 4 -->
    <div style="background: white; padding: 25px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
            <h4 style="color: var(--text-light); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.4; width: 60%;">EVENT BULAN INI</h4>
            <div style="background: #f3e8ff; color: #7e22ce; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line><rect x="8" y="14" width="8" height="4" rx="1"></rect></svg>
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 2.8rem; color: var(--text-dark); margin-bottom: 5px; font-weight: 700; line-height: 1;">{{ $countSebulan }}</h2>
            <div style="height: 19px;"></div> <!-- Placeholder for alignment -->
        </div>
        <div style="border-top: 1px solid #f1f5f9; padding-top: 15px; margin-top: auto;">
            <a href="{{ route('admin.calendar') }}" style="color: #7e22ce; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 5px;">
                Lihat Kalender <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>
</div>

{{-- Flash Messages (auto-dismiss 4 detik) --}}
@if(session('success'))
<div id="flash-success" style="background:#d1fae5; border:1px solid #6ee7b7; color:#065f46; padding:14px 20px; border-radius:10px; margin-bottom:20px; display:flex; align-items:center; gap:10px; font-size:0.9rem; font-weight:500; transition: opacity 0.5s ease;">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
    {{ session('success') }}
</div>
@endif
@if(session('warning'))
<div id="flash-warning" style="background:#fef3c7; border:1px solid #fcd34d; color:#92400e; padding:14px 20px; border-radius:10px; margin-bottom:20px; display:flex; align-items:center; gap:10px; font-size:0.9rem; font-weight:500; transition: opacity 0.5s ease;">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
    {{ session('warning') }}
</div>
@endif
@if(session('error'))
<div id="flash-error" style="background:#fee2e2; border:1px solid #fca5a5; color:#991b1b; padding:14px 20px; border-radius:10px; margin-bottom:20px; display:flex; align-items:center; gap:10px; font-size:0.9rem; font-weight:500; transition: opacity 0.5s ease;">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
    {{ session('error') }}
</div>
@endif

{{-- Tombol Kirim Notifikasi Email Harian --}}
<div style="background: linear-gradient(135deg, #800000 0%, #b91c1c 100%); border-radius: 12px; padding: 20px 24px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;">
    <div>
        <p style="margin:0; color:#ffffff; font-size:1rem; font-weight:700;">📧 Kirim Notifikasi Agenda Hari Ini</p>
        <p style="margin:4px 0 0; color:#fecaca; font-size:0.82rem;">
            Kirim ringkasan semua agenda hari ini ke penerima yang terdaftar dalam satu email.
        </p>
    </div>
    <form method="POST" action="{{ route('admin.notifikasi.kirim') }}" id="form-notif-harian">
        @csrf
        <div style="display: flex; gap: 10px;">
            <button type="button" onclick="document.getElementById('modal-email-setting').style.display='flex'" style="background: rgba(255,255,255,0.2); color: white; border: none; padding: 10px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.3)'" onmouseout="this.style.background='rgba(255,255,255,0.2)'" title="Pengaturan Email">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </button>
            <button type="button" id="btn-kirim-notif" onclick="document.getElementById('modal-notif').style.display='flex'" style="background:#ffffff; color:#800000; border:none; padding:10px 22px; border-radius:8px; font-size:0.88rem; font-weight:700; cursor:pointer; display:flex; align-items:center; gap:8px; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                Kirim Sekarang
            </button>
        </div>
    </form>
</div>

<div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
    <h3 style="margin-bottom: 20px;">Jadwal Agenda Terdekat</h3>

    <table>
        <thead>
            <tr>
                <th>Waktu</th>
                <th>Kategori</th>
                <th>Nama Kegiatan</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
            <tr>
                <td style="font-weight: bold; color: var(--primary);">
                    {{ \Carbon\Carbon::parse($agenda->date)->format('d M') }}<br>
                    {{ \Carbon\Carbon::parse($agenda->start_time)->format('H.i') }}
                </td>
                <td>
                    <span style="background: {{ $agenda->category == 'pimpinan' ? '#fecaca' : '#bfdbfe' }}; color: {{ $agenda->category == 'pimpinan' ? '#991b1b' : '#1e3a8a' }}; padding: 3px 8px; border-radius: 12px; font-size: 0.8rem; text-transform: capitalize;">
                        {{ $agenda->category }}
                    </span>
                </td>
                <td>{{ $agenda->title }}</td>
                <td>{{ $agenda->location }}</td>
                <td>
                    @php
                        $st = strtolower($agenda->status);
                        $bg = '#dcfce7'; $color = '#166534'; // aktif = hijau
                        if ($st == 'selesai') { $bg = '#fee2e2'; $color = '#991b1b'; } // selesai = MERAH
                        elseif ($st == 'ditunda') { $bg = '#fef3c7'; $color = '#92400e'; } // ditunda = kuning
                        elseif ($st == 'batal') { $bg = '#f3f4f6'; $color = '#4b5563'; } // batal = abu
                    @endphp
                    <span style="background: {{ $bg }}; color: {{ $color }}; padding: 4px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: 600; text-transform: capitalize;">
                        {{ $agenda->status }}
                    </span>
                </td>
            </tr>
            @endforeach
            @if(count($agendas) == 0)
            <tr>
                <td colspan="5" style="text-align: center; color: var(--text-light);">Belum ada agenda terdekat.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
{{-- Custom Modal Konfirmasi Kirim Notifikasi --}}
<div id="modal-notif" style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center;">
    <div onclick="document.getElementById('modal-notif').style.display='none'" style="position:absolute; inset:0; background:rgba(15,23,42,0.55); backdrop-filter:blur(4px);"></div>
    <div style="position:relative; background:#ffffff; border-radius:16px; padding:36px 32px; width:100%; max-width:420px; margin:16px; box-shadow:0 25px 60px rgba(0,0,0,0.2); text-align:center; animation: modalIn 0.2s ease;">
        <div style="width:64px; height:64px; background:linear-gradient(135deg,#800000,#b91c1c); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px;">
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        </div>
        <h3 style="margin:0 0 8px; color:#0f172a; font-size:1.15rem; font-weight:700;">Kirim Notifikasi Sekarang?</h3>
        <p style="margin:0 0 28px; color:#64748b; font-size:0.9rem; line-height:1.6;">
            Sistem akan mengirimkan <strong>1 email ringkasan</strong> berisi seluruh agenda hari ini ke semua penerima yang terdaftar.
        </p>
        <div style="display:flex; gap:12px; justify-content:center;">
            <button onclick="document.getElementById('modal-notif').style.display='none'"
                style="flex:1; padding:11px 0; border-radius:8px; border:1.5px solid #e2e8f0; background:#f8fafc; color:#475569; font-size:0.9rem; font-weight:600; cursor:pointer;"
                onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='#f8fafc'">
                Batal
            </button>
            <button onclick="document.getElementById('form-notif-harian').submit()"
                style="flex:1; padding:11px 0; border-radius:8px; border:none; background:linear-gradient(135deg,#800000,#b91c1c); color:#ffffff; font-size:0.9rem; font-weight:700; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;"
                onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                <svg width="15" height="15" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                Ya, Kirim!
            </button>
        </div>
    </div>
</div>

{{-- Modal Pengaturan Email --}}
<div id="modal-email-setting" style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center;">
    <div onclick="document.getElementById('modal-email-setting').style.display='none'" style="position:absolute; inset:0; background:rgba(15,23,42,0.55); backdrop-filter:blur(4px);"></div>
    <div style="position:relative; background:#ffffff; border-radius:16px; padding:32px; width:100%; max-width:520px; margin:16px; box-shadow:0 25px 60px rgba(0,0,0,0.2); text-align:left; animation: modalIn 0.2s ease;">
        <h3 style="margin:0 0 16px; color:#0f172a; font-size:1.15rem; font-weight:700;">Pengaturan Email Notifikasi</h3>
        
        {{-- Daftar Email Tersimpan --}}
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600; color:#334155; font-size:0.9rem;">Daftar Email Tersimpan (Tabel: emails):</label>
            @if(isset($emailRows) && $emailRows->count() > 0)
                <div style="display:flex; flex-direction:column; gap:8px; max-height:160px; overflow-y:auto; padding-right:4px;">
                    @foreach($emailRows as $item)
                        <div style="display:flex; align-items:center; justify-content:space-between; background:#f8fafc; border:1px solid #e2e8f0; padding:8px 14px; border-radius:8px; font-size:0.9rem; color:#1e293b;">
                            <span style="display:flex; align-items:center; gap:8px;">
                                <svg width="16" height="16" fill="none" stroke="#800000" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                <strong>{{ $item->email }}</strong>
                            </span>
                            <button type="button" onclick="confirmDeleteEmail('{{ route('admin.emails.destroy', $item->id) }}', '{{ $item->email }}')" style="background:none; border:none; color:#dc2626; font-size:0.85rem; font-weight:600; cursor:pointer; padding:4px 8px; border-radius:6px;" onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='none'">
                                Hapus
                            </button>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="background:#f1f5f9; padding:12px; border-radius:8px; font-size:0.85rem; color:#64748b; text-align:center;">
                    Belum ada email tersimpan khusus di database.
                    @if(!empty($emailList))
                        <br><span style="font-size:0.8rem; color:#475569;">Saat ini menggunakan email default dari .env: {{ implode(', ', $emailList) }}</span>
                    @endif
                </div>
            @endif
        </div>

        {{-- Form Tambah Email Baru --}}
        <form method="POST" action="{{ route('admin.emails.store') }}">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#334155; font-size:0.9rem;">Tambah Email Baru</label>
                <input type="text" name="notification_email" value="" placeholder="Contoh: email1@example.com, email2@example.com" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.95rem;">
                <p style="margin:8px 0 0; color:#64748b; font-size:0.8rem;">Setiap email yang dimasukkan akan disimpan sebagai 1 baris di tabel <code>emails</code>. Bisa memasukkan lebih dari satu dipisahkan koma (,).</p>
            </div>
            <div style="display:flex; gap:12px; justify-content:flex-end;">
                <button type="button" onclick="document.getElementById('modal-email-setting').style.display='none'"
                    style="padding:10px 20px; border-radius:8px; border:1.5px solid #e2e8f0; background:#f8fafc; color:#475569; font-size:0.9rem; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='#f8fafc'">
                    Tutup
                </button>
                <button type="submit"
                    style="padding:10px 20px; border-radius:8px; border:none; background:var(--primary); color:#ffffff; font-size:0.9rem; font-weight:700; cursor:pointer;"
                    onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    + Simpan Email
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Custom Modal Konfirmasi Hapus Email --}}
<div id="modal-confirm-delete-email" style="display:none; position:fixed; inset:0; z-index:10000; align-items:center; justify-content:center;">
    <div onclick="closeDeleteEmailModal()" style="position:absolute; inset:0; background:rgba(15,23,42,0.55); backdrop-filter:blur(4px);"></div>
    <div style="position:relative; background:#ffffff; border-radius:16px; padding:36px 32px; width:100%; max-width:420px; margin:16px; box-shadow:0 25px 60px rgba(0,0,0,0.25); text-align:center; animation: modalIn 0.2s ease;">
        <div style="width:64px; height:64px; background:linear-gradient(135deg,#800000,#dc2626); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; box-shadow:0 8px 20px rgba(128,0,0,0.25);">
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
        </div>
        <h3 style="margin:0 0 8px; color:#0f172a; font-size:1.15rem; font-weight:700;">Hapus Email Notifikasi?</h3>
        <p style="margin:0 0 24px; color:#64748b; font-size:0.9rem; line-height:1.6;">
            Apakah Anda yakin ingin menghapus email <strong id="delete-email-target" style="color:#800000; word-break:break-all;">email@example.com</strong> dari daftar notifikasi?
        </p>
        <form id="form-delete-email" method="POST" action="">
            @csrf
            @method('DELETE')
            <div style="display:flex; gap:12px; justify-content:center;">
                <button type="button" onclick="closeDeleteEmailModal()"
                    style="flex:1; padding:11px 0; border-radius:8px; border:1.5px solid #e2e8f0; background:#f8fafc; color:#475569; font-size:0.9rem; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='#f8fafc'">
                    Batal
                </button>
                <button type="submit"
                    style="flex:1; padding:11px 0; border-radius:8px; border:none; background:linear-gradient(135deg,#800000,#dc2626); color:#ffffff; font-size:0.9rem; font-weight:700; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; box-shadow:0 4px 12px rgba(128,0,0,0.3);"
                    onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    <svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    Ya, Hapus!
                </button>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes modalIn {
    from { opacity: 0; transform: scale(0.93) translateY(12px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
}
</style>
<script>
function confirmDeleteEmail(actionUrl, emailAddress) {
    document.getElementById('form-delete-email').action = actionUrl;
    document.getElementById('delete-email-target').textContent = emailAddress;
    document.getElementById('modal-confirm-delete-email').style.display = 'flex';
}

function closeDeleteEmailModal() {
    document.getElementById('modal-confirm-delete-email').style.display = 'none';
}

(function() {
    var ids = ['flash-success', 'flash-warning', 'flash-error'];
    ids.forEach(function(id) {
        var el = document.getElementById(id);
        if (!el) return;
        setTimeout(function() {
            el.style.opacity = '0';
            el.style.transform = 'translateY(-8px)';
            el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            setTimeout(function() { el.style.display = 'none'; }, 500);
        }, 4000);
    });
})();
</script>
@endpush

