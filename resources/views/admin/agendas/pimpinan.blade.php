@extends('admin.layout')

@section('title', 'Kelola Agenda Pimpinan')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px;">
    <div>
        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--text-dark); margin-bottom: 5px;">Kelola Agenda Harian Pimpinan</h2>
        <p style="color: var(--text-light); font-size: 0.9rem;">Manajemen dan pembaruan jadwal harian pimpinan</p>
    </div>
    <button onclick="document.getElementById('tambahAgendaModal').style.display='flex'" style="background: var(--primary); border: none; cursor: pointer; color: white; padding: 10px 20px; border-radius: 8px; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">
        <span>+</span> Tambah Agenda Baru
    </button>
</div>

<div style="background: white; border-radius: 12px; border: 1px solid var(--border); padding: 20px; margin-bottom: 25px;">
    <form action="{{ route('admin.agendas.pimpinan') }}" method="GET" style="display: flex; gap: 15px; flex-wrap: wrap;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kegiatan atau lokasi..." style="flex: 1; min-width: 250px; padding: 12px 15px; border: 1px solid var(--border); border-radius: 8px; outline: none;">
        
        <select name="tipe_kegiatan" style="padding: 12px 15px; border: 1px solid var(--border); border-radius: 8px; outline: none; background: white; min-width: 150px;">
            <option value="">Pilih Kategori</option>
            <option value="Rapat" {{ request('tipe_kegiatan') == 'Rapat' ? 'selected' : '' }}>Rapat</option>
            <option value="Audiensi" {{ request('tipe_kegiatan') == 'Audiensi' ? 'selected' : '' }}>Audiensi</option>
            <option value="Upacara" {{ request('tipe_kegiatan') == 'Upacara' ? 'selected' : '' }}>Upacara</option>
            <option value="Pelayanan" {{ request('tipe_kegiatan') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
            <option value="Pelatihan" {{ request('tipe_kegiatan') == 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
        </select>
        
        <select name="status" style="padding: 12px 15px; border: 1px solid var(--border); border-radius: 8px; outline: none; background: white; min-width: 150px;">
            <option value="">Status Agenda</option>
            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="ditunda" {{ request('status') == 'ditunda' ? 'selected' : '' }}>Ditunda</option>
            <option value="batal" {{ request('status') == 'batal' ? 'selected' : '' }}>Batal</option>
        </select>
        
        <button type="submit" style="background: #f1f5f9; color: var(--text-dark); border: 1px solid var(--border); border-radius: 8px; padding: 0 20px; font-weight: 600; cursor: pointer;">Cari</button>
    </form>
</div>

<div style="background: white; border-radius: 12px; border: 1px solid var(--border); padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <h3 style="font-size: 1.1rem; color: var(--text-dark);">Daftar Agenda</h3>
            <span style="background: #fee2e2; color: var(--primary); padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">{{ count($agendas) }} agenda</span>
        </div>
        <div style="font-size: 0.85rem; color: var(--text-light);">
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 2px solid var(--border);">
                <th style="text-align: left; padding: 12px 10px; color: var(--text-light); font-size: 0.8rem; font-weight: 600;">WAKTU</th>
                <th style="text-align: left; padding: 12px 10px; color: var(--text-light); font-size: 0.8rem; font-weight: 600;">KATEGORI</th>
                <th style="text-align: left; padding: 12px 10px; color: var(--text-light); font-size: 0.8rem; font-weight: 600;">NAMA KEGIATAN</th>
                <th style="text-align: left; padding: 12px 10px; color: var(--text-light); font-size: 0.8rem; font-weight: 600;">LOKASI</th>
                <th style="text-align: left; padding: 12px 10px; color: var(--text-light); font-size: 0.8rem; font-weight: 600;">STATUS</th>
                <th style="text-align: left; padding: 12px 10px; color: var(--text-light); font-size: 0.8rem; font-weight: 600;">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
            <tr style="border-bottom: 1px solid var(--border);">
                <td style="padding: 15px 10px; font-weight: 600; color: var(--primary);">
                    {{ \Carbon\Carbon::parse($agenda->start_time)->format('H.i') }}
                </td>
                <td style="padding: 15px 10px;">
                    @php
                        $tipe = strtolower($agenda->tipe_kegiatan);
                        $bg = '#f1f5f9'; $color = '#64748b';
                        if ($tipe == 'rapat') { $bg = '#eff6ff'; $color = '#3b82f6'; }
                        elseif ($tipe == 'audiensi') { $bg = '#faf5ff'; $color = '#a855f7'; }
                        elseif ($tipe == 'upacara') { $bg = '#fff7ed'; $color = '#f97316'; }
                        elseif ($tipe == 'pelayanan') { $bg = '#f0fdfa'; $color = '#14b8a6'; }
                        elseif ($tipe == 'pelatihan') { $bg = '#fef2f2'; $color = '#ef4444'; }
                    @endphp
                    @if($agenda->tipe_kegiatan)
                    <span style="background: {{ $bg }}; color: {{ $color }}; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">
                        {{ $agenda->tipe_kegiatan }}
                    </span>
                    @else
                    -
                    @endif
                </td>
                <td style="padding: 15px 10px; font-weight: 600; color: var(--text-dark);">
                    {{ $agenda->title }}
                </td>
                <td style="padding: 15px 10px; color: var(--text-light); font-size: 0.9rem; display: flex; align-items: center; gap: 5px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    {{ $agenda->location }}
                </td>
                <td style="padding: 15px 10px;">
                    @php
                        $st = strtolower($agenda->status);
                        $sColor = '#94a3b8';
                        if($st == 'selesai') $sColor = '#3b82f6'; // Blue
                        elseif($st == 'aktif') $sColor = '#10b981'; // Green
                        elseif($st == 'ditunda') $sColor = '#eab308'; // Yellow
                    @endphp
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 0.85rem; font-weight: 600; color: {{ $sColor }}">
                        <div style="width: 6px; height: 6px; border-radius: 50%; background: {{ $sColor }};"></div>
                        {{ ucfirst($agenda->status) }}
                    </div>
                </td>
                <td style="padding: 15px 10px;">
                    <div style="display: flex; gap: 8px;">
                        <button type="button" onclick="openEditModal('{{ $agenda->id }}', '{{ addslashes($agenda->title) }}', '{{ $agenda->date }}', '{{ $agenda->start_time }}', '{{ $agenda->end_time }}', '{{ addslashes($agenda->location) }}', '{{ $agenda->category }}', '{{ $agenda->tipe_kegiatan }}', '{{ $agenda->status }}')" style="background: transparent; color: var(--text-light); border: 1px solid var(--border); padding: 5px; border-radius: 6px; cursor: pointer; display: inline-flex;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </button>
                        <button type="button" onclick="openDeleteModal('{{ $agenda->id }}')" style="background: #fee2e2; color: #ef4444; border: 1px solid #fca5a5; padding: 5px; border-radius: 6px; cursor: pointer; display: inline-flex;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            
            @if(count($agendas) == 0)
            <tr>
                <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-light);">Tidak ada agenda yang ditemukan.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
