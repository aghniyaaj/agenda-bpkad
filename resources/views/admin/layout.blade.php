<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Agenda BPKAD</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #800000;
            --bg-color: #f8fafc;
            --sidebar-bg: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sidebar-header h2 {
            color: var(--primary);
            font-size: 1.2rem;
        }

        .sidebar-menu {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            border-left: 4px solid transparent;
            transition: all 0.2s;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: #fff0f0;
            color: var(--primary);
            border-left-color: var(--primary);
        }

        /* Main Content */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .topbar {
            background: var(--sidebar-bg);
            padding: 15px 30px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content {
            padding: 30px;
            flex: 1;
            overflow-y: auto;
        }

        /* Utility */
        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            border: none;
        }
        .btn-primary { background: var(--primary); color: white; }
        .btn-danger { background: #dc2626; color: white; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }
        th { background: #f1f5f9; font-weight: 600; color: var(--text-dark); }
        
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header" style="justify-content: center;">
            <img src="{{ asset('images/logo-bpkad.png') }}" alt="Logo BPKAD" style="height: 40px; object-fit: contain;" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'40\'><rect width=\'100\' height=\'40\' fill=\'%23e2e8f0\'/></svg>'">
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.agendas.pimpinan') }}">Kelola Agenda Pimpinan</a>
            <a href="{{ route('admin.agendas.umum') }}">Kelola Agenda Umum</a>
            <a href="{{ route('admin.calendar') }}">Agenda Mingguan / Bulanan</a>
            <a href="{{ route('display') }}" target="_blank">Lihat Public Display</a>
        </div>
        <div style="padding: 20px; border-top: 1px solid var(--border);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
                <div style="background: var(--primary); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div style="font-weight: 600; font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.75rem; color: var(--text-light);">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <button type="button" onclick="document.getElementById('logoutModal').style.display='flex'" style="width: 100%; background: #fee2e2; color: #dc2626; border: none; padding: 10px; border-radius: 8px; font-weight: 500; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Logout
            </button>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <h3>@yield('title', 'Dashboard')</h3>
            <div style="font-weight: 700; color: var(--primary);">Admin BPKAD</div>
        </header>
        
        <div class="content">

            
            @if($errors->any())
                <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Logout Modal -->
    <div id="logoutModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
        <div style="background: white; width: 450px; border-radius: 16px; padding: 40px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            
            <div style="background: #fff0f0; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            </div>
            
            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 10px; font-weight: 700;">Konfirmasi Keluar</h2>
            <p style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 30px; line-height: 1.5;">Apakah Anda yakin ingin keluar dari portal admin? Anda harus login kembali untuk mengelola agenda.</p>
            
            <div style="display: flex; gap: 15px; margin-bottom: 25px;">
                <button type="button" onclick="document.getElementById('logoutModal').style.display='none'" style="flex: 1; padding: 12px; background: white; border: 1px solid var(--border); border-radius: 8px; color: var(--text-dark); font-weight: 600; cursor: pointer; transition: background 0.2s;">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" style="flex: 1;">
                    @csrf
                    <button type="submit" style="width: 100%; padding: 12px; background: var(--primary); border: none; border-radius: 8px; color: white; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background 0.2s;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        Ya, Keluar
                    </button>
                </form>
            </div>
            
            <p style="font-size: 0.75rem; color: #94a3b8;">Data Anda tersimpan dan aman. Anda dapat kembali kapan saja.</p>
        </div>
    </div>

    <!-- Tambah Agenda Modal -->
    <div id="tambahAgendaModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
        <div style="background: white; width: 600px; max-height: 90vh; overflow-y: auto; border-radius: 16px; padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); padding-bottom: 15px; margin-bottom: 20px;">
                <h2 style="font-size: 1.3rem; color: var(--text-dark); font-weight: 700;">Tambah Agenda Baru</h2>
                <button type="button" onclick="document.getElementById('tambahAgendaModal').style.display='none'" style="background: transparent; border: none; font-size: 1.5rem; cursor: pointer; color: var(--text-light);">&times;</button>
            </div>
            
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
                        <option value="pimpinan" {{ (old('category') ?? (request()->routeIs('admin.agendas.pimpinan') ? 'pimpinan' : '')) == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                        <option value="umum" {{ (old('category') ?? (request()->routeIs('admin.agendas.umum') ? 'umum' : '')) == 'umum' ? 'selected' : '' }}>Umum</option>
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

                <div style="margin-top: 25px; display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" onclick="document.getElementById('tambahAgendaModal').style.display='none'" class="btn" style="background: white; border: 1px solid var(--border); color: var(--text-dark);">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Agenda</button>
                </div>
            </form>
        </div>
    </div>

    @if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tambahAgendaModal').style.display = 'flex';
        });
    </script>
    @endif

    <!-- Edit Agenda Modal -->
    <div id="editAgendaModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
        <div style="background: white; width: 600px; max-height: 90vh; overflow-y: auto; border-radius: 16px; padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); padding-bottom: 15px; margin-bottom: 20px;">
                <h2 style="font-size: 1.3rem; color: var(--text-dark); font-weight: 700;">Edit Agenda</h2>
                <button type="button" onclick="document.getElementById('editAgendaModal').style.display='none'" style="background: transparent; border: none; font-size: 1.5rem; cursor: pointer; color: var(--text-light);">&times;</button>
            </div>
            
            <form id="editAgendaForm" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Judul Kegiatan</label>
                    <input type="text" name="title" id="edit_title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="date" id="edit_date" class="form-control" required>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="form-group">
                        <label>Waktu Mulai</label>
                        <input type="time" name="start_time" id="edit_start_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Selesai (Opsional)</label>
                        <input type="time" name="end_time" id="edit_end_time" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="location" id="edit_location" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Grup Agenda</label>
                    <select name="category" id="edit_category" class="form-control" required>
                        <option value="pimpinan">Pimpinan</option>
                        <option value="umum">Umum</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Tipe Kegiatan</label>
                    <select name="tipe_kegiatan" id="edit_tipe_kegiatan" class="form-control">
                        <option value="">Pilih Tipe Kegiatan</option>
                        <option value="Rapat">Rapat</option>
                        <option value="Audiensi">Audiensi</option>
                        <option value="Upacara">Upacara</option>
                        <option value="Pelayanan">Pelayanan</option>
                        <option value="Pelatihan">Pelatihan</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="edit_status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                        <option value="ditunda">Ditunda</option>
                        <option value="batal">Batal</option>
                    </select>
                </div>

                <div style="margin-top: 25px; display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" onclick="document.getElementById('editAgendaModal').style.display='none'" class="btn" style="background: white; border: 1px solid var(--border); color: var(--text-dark);">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteAgendaModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
        <div style="background: white; width: 450px; border-radius: 16px; padding: 40px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            
            <div style="background: #fee2e2; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
            </div>
            
            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 10px; font-weight: 700;">Hapus Agenda?</h2>
            <p style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 30px; line-height: 1.5;">Apakah Anda yakin ingin menghapus agenda ini? Tindakan ini tidak dapat dibatalkan.</p>
            
            <div style="display: flex; gap: 15px; margin-bottom: 25px;">
                <button type="button" onclick="document.getElementById('deleteAgendaModal').style.display='none'" style="flex: 1; padding: 12px; background: white; border: 1px solid var(--border); border-radius: 8px; color: var(--text-dark); font-weight: 600; cursor: pointer; transition: background 0.2s;">
                    Batal
                </button>
                <form id="deleteAgendaForm" method="POST" style="flex: 1;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="width: 100%; padding: 12px; background: #ef4444; border: none; border-radius: 8px; color: white; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background 0.2s;">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notif = document.getElementById('successNotification');
            if (notif) {
                setTimeout(function() {
                    notif.style.opacity = '0';
                    setTimeout(function() {
                        notif.style.display = 'none';
                    }, 500);
                }, 3000);
            }
        });

        function openEditModal(id, title, date, startTime, endTime, location, category, tipeKegiatan, status) {
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_start_time').value = startTime;
            document.getElementById('edit_end_time').value = endTime || '';
            document.getElementById('edit_location').value = location;
            document.getElementById('edit_category').value = category;
            document.getElementById('edit_tipe_kegiatan').value = tipeKegiatan || '';
            document.getElementById('edit_status').value = status;
            
            document.getElementById('editAgendaForm').action = '/admin/agendas/' + id;
            document.getElementById('editAgendaModal').style.display = 'flex';
        }

        function openDeleteModal(id) {
            document.getElementById('deleteAgendaForm').action = '/admin/agendas/' + id;
            document.getElementById('deleteAgendaModal').style.display = 'flex';
        }
    </script>
    @stack('scripts')
</body>
</html>
