@extends('admin.layout')

@section('title', 'Tambah Agenda')

@section('content')
<div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 600px;">
    <form action="{{ route('admin.agendas.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Judul Kegiatan</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" required value="{{ old('date') }}">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="form-group">
                <label>Waktu Mulai</label>
                <input type="time" name="start_time" class="form-control" required value="{{ old('start_time') }}">
            </div>
            <div class="form-group">
                <label>Waktu Selesai (Opsional)</label>
                <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
            </div>
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control" required value="{{ old('location') }}">
        </div>

        <div class="form-group">
            <label>Grup Agenda</label>
            <select name="category" class="form-control" required>
                <option value="pimpinan" {{ (old('category') ?? request('cat')) == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                <option value="umum" {{ (old('category') ?? request('cat')) == 'umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Tipe Kegiatan</label>
            <select name="tipe_kegiatan" class="form-control">
                <option value="">Pilih Tipe Kegiatan</option>
                <option value="Rapat" {{ old('tipe_kegiatan') == 'Rapat' ? 'selected' : '' }}>Rapat</option>
                <option value="Audiensi" {{ old('tipe_kegiatan') == 'Audiensi' ? 'selected' : '' }}>Audiensi</option>
                <option value="Upacara" {{ old('tipe_kegiatan') == 'Upacara' ? 'selected' : '' }}>Upacara</option>
                <option value="Pelayanan" {{ old('tipe_kegiatan') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                <option value="Pelatihan" {{ old('tipe_kegiatan') == 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="ditunda" {{ old('status') == 'ditunda' ? 'selected' : '' }}>Ditunda</option>
                <option value="batal" {{ old('status') == 'batal' ? 'selected' : '' }}>Batal</option>
            </select>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Simpan Agenda</button>
            <a href="javascript:history.back()" style="margin-left: 10px; color: var(--text-light); text-decoration: none;">Batal</a>
        </div>
    </form>
</div>
@endsection
