@extends('admin.layout')

@section('title', 'Kelola Agenda')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Daftar Agenda</h2>
    <a href="{{ route('admin.agendas.create') }}" class="btn btn-primary">+ Tambah Agenda</a>
</div>

<table>
    <thead>
        <tr>
            <th>Tanggal & Waktu</th>
            <th>Kategori</th>
            <th>Nama Kegiatan</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agendas as $agenda)
        <tr>
            <td>
                {{ \Carbon\Carbon::parse($agenda->date)->format('d M Y') }}<br>
                <small style="color: var(--text-light)">{{ \Carbon\Carbon::parse($agenda->start_time)->format('H.i') }}</small>
            </td>
            <td style="text-transform: capitalize;">{{ $agenda->category }}</td>
            <td style="font-weight: 500;">{{ $agenda->title }}</td>
            <td>{{ $agenda->location }}</td>
            <td style="text-transform: capitalize;">{{ $agenda->status }}</td>
            <td>
                <a href="{{ route('admin.agendas.edit', $agenda->id) }}" style="color: var(--blue); text-decoration: none; margin-right: 10px;">Edit</a>
                <form action="{{ route('admin.agendas.destroy', $agenda->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus agenda ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: #dc2626; cursor: pointer; text-decoration: underline;">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        @if(count($agendas) == 0)
        <tr>
            <td colspan="6" style="text-align: center; color: var(--text-light);">Belum ada data agenda.</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
