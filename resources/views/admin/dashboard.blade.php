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
                    <span style="background: #dcfce7; color: #166534; padding: 3px 8px; border-radius: 12px; font-size: 0.8rem; text-transform: capitalize;">
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
