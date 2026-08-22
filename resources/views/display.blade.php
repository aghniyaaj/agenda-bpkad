<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Agenda BPKAD</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #800000; /* Maroon */
            --primary-light: #990000;
            --bg-color: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --white: #ffffff;
            --border: #e2e8f0;
            --blue: #0284c7;
            --green: #16a34a;
            --purple: #8b5cf6;
            --purple-light: #f3e8ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-dark);
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* Prevent scroll on display */
        }

        /* Header */
        header {
            background: var(--white);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--primary);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo-container img {
            height: 50px;
            object-fit: contain;
        }

        .header-title {
            border-left: 2px solid #ccc;
            padding-left: 20px;
        }

        .header-title h1 {
            font-size: 1.2rem;
            color: var(--text-dark);
            font-weight: 700;
        }

        .header-title p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .header-time {
            text-align: right;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .time-box h2 {
            font-size: 1.8rem;
            color: var(--primary);
            font-weight: 700;
        }

        .time-box p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .profile-icon {
            background: var(--primary);
            color: var(--white);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Sub Header / Banner */
        .banner {
            background: var(--primary);
            color: var(--white);
            padding: 20px 40px;
        }

        .banner h3 {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ffcccc;
            margin-bottom: 5px;
            border-left: 3px solid #ffcccc;
            padding-left: 10px;
        }

        .banner h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .banner p {
            font-size: 0.95rem;
            color: #ffcccc;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            height: calc(100vh - 250px);
        }

        .card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            padding: 25px;
            display: flex;
            flex-direction: column;
            border-top: 4px solid var(--primary);
        }

        .card.video-card {
            border-top: 4px solid var(--blue);
        }
        
        .card.purple-border {
            border-top: 4px solid var(--purple);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .icon-box {
            width: 45px;
            height: 45px;
            background: #f1f5f9;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .video-card .icon-box {
            color: var(--blue);
        }
        
        .purple-border .icon-box {
            color: var(--purple);
            background: var(--purple-light);
        }

        .card-header-text h2 {
            font-size: 1.3rem;
            color: var(--text-dark);
        }

        .card-header-text p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* Agenda Items */
        .agenda-list {
            flex: 1;
            overflow-y: hidden;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .agenda-item {
            display: flex;
            gap: 20px;
            padding-bottom: 15px;
            border-bottom: 1px dashed var(--border);
        }
        
        .agenda-item:last-child {
            border-bottom: none;
        }

        .agenda-time {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            min-width: 60px;
        }

        .agenda-details h4 {
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-bottom: 5px;
            font-weight: 600;
        }

        .agenda-details p {
            font-size: 0.9rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Status Badges */
        .status-badge {
            padding: 4px 10px; 
            border-radius: 20px; 
            font-size: 0.75rem; 
            font-weight: 600; 
            text-transform: uppercase;
        }
        .status-aktif { background: #dcfce7; color: #166534; }
        .status-selesai { background: #f1f5f9; color: #475569; }
        .status-batal { background: #fee2e2; color: #991b1b; }
        .status-ditunda { background: #fef3c7; color: #92400e; }

        /* Carousel Slides */
        .carousel-container {
            position: relative;
            flex: 1;
            overflow: hidden;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease-in-out;
            display: flex;
            flex-direction: column;
        }

        .carousel-slide.active {
            opacity: 1;
            visibility: visible;
        }

        /* Video Player */
        .video-container {
            flex: 1;
            background: #0f172a;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Footer Marquee */
        footer {
            background: var(--primary);
            color: var(--white);
            padding: 10px 0;
            overflow: hidden;
            white-space: nowrap;
            display: flex;
            align-items: center;
        }

        .marquee {
            display: inline-block;
            animation: marquee 70s linear infinite;
            font-size: 0.9rem;
        }

        @keyframes marquee {
            0% { transform: translateX(100vw); }
            100% { transform: translateX(-100%); }
        }
        
        /* Bulanan / Mingguan specific */
        .agenda-date-box {
            background: #f1f5f9;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            min-width: 70px;
        }
        .agenda-date-box .date-num {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--green);
        }
        .agenda-date-box .date-month {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-light);
            font-weight: 600;
        }
        
        /* Calendar UI */
        .calendar-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px 5px;
            text-align: center;
        }
        
        .calendar-header {
            font-size: 0.75rem;
            color: var(--text-light);
            font-weight: 600;
            text-transform: uppercase;
            padding-bottom: 10px;
        }
        
        .calendar-day {
            padding: 8px 0;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-dark);
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .calendar-day.empty {
            color: transparent;
        }
        
        .calendar-day.highlight {
            background: var(--purple-light);
            color: var(--purple);
            font-weight: 700;
        }
        
        .calendar-day .event-dot {
            width: 4px;
            height: 4px;
            background: var(--primary); /* Red/Orange dot as requested */
            border-radius: 50%;
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Sorotan Agenda */
        .sorotan-agenda {
            border-top: 1px dashed var(--border);
            padding-top: 15px;
        }
        
        .sorotan-title {
            font-size: 0.75rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .sorotan-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        
        .sorotan-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: var(--text-dark);
            font-weight: 500;
        }
        
        .sorotan-date {
            background: var(--purple-light);
            color: var(--purple);
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.75rem;
        }
        
        /* Carousel Dots */
        .dot {
            width: 10px !important;
            border-radius: 50% !important;
        }
        .dot.active {
            width: 25px !important;
            border-radius: 5px !important;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo-container">
            <!-- Menambahkan logo dinas dan logo bpkad sesuai permintaan -->
            <!-- Pastikan Anda telah meletakkan file logo-dinas.png dan logo-bpkad.png di dalam folder public/images/ -->
            <img src="{{ asset('images/logo-dinas.png') }}" alt="Logo Dinas" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'50\' height=\'50\'><rect width=\'50\' height=\'50\' fill=\'%23e2e8f0\'/></svg>'">
            <img src="{{ asset('images/logo-bpkad.png') }}" alt="Logo BPKAD" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'40\'><rect width=\'100\' height=\'40\' fill=\'%23e2e8f0\'/></svg>'">
            
            <div class="header-title">
                <h1>BPKAD</h1>
                <p>Badan Pengelola Keuangan & Aset Daerah</p>
            </div>
        </div>
        <div class="header-time">
            <div class="time-box">
                <h2 id="clock">00.00.00</h2>
                <p id="current-date-full">Senin, 17 Agustus 2026</p>
            </div>
            <a href="{{ route('login') }}" class="profile-icon" style="text-decoration: none; cursor: pointer;" title="Login Admin">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
        </div>
    </header>

    <div class="banner">
        <h3>Sistem Informasi Agenda Dinas</h3>
        <h1 id="banner-date">Senin, 17 Agustus 2026</h1>
        <p>Selamat Datang di Website Agenda Kegiatan Dinas BPKAD Garut.</p>
    </div>

    <div class="main-content">
        <!-- Left Side: Agenda Carousel -->
        <div class="card" id="cardContainer" style="position: relative;">
            
            <!-- Carousel Navigation Dots -->
            <div style="position: absolute; top: 25px; right: 25px; display: flex; gap: 8px; z-index: 10;">
                <div class="dot active" onclick="goToSlide(0)" style="width: 25px; height: 10px; border-radius: 5px; background: var(--primary); cursor: pointer; transition: all 0.3s ease;"></div>
                <div class="dot" onclick="goToSlide(1)" style="width: 10px; height: 10px; border-radius: 50%; background: #cbd5e1; cursor: pointer; transition: all 0.3s ease;"></div>
                <div class="dot" onclick="goToSlide(2)" style="width: 10px; height: 10px; border-radius: 50%; background: #cbd5e1; cursor: pointer; transition: all 0.3s ease;"></div>
                <div class="dot" onclick="goToSlide(3)" style="width: 10px; height: 10px; border-radius: 50%; background: #cbd5e1; cursor: pointer; transition: all 0.3s ease;"></div>
            </div>

            <div class="carousel-container" id="agendaCarousel">
                
                <!-- Slide 1: Agenda Pimpinan -->
                <div class="carousel-slide active" data-border="var(--primary)">
                    <div class="card-header">
                        <div class="icon-box" style="color: var(--primary); background: #f1f5f9;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                        <div class="card-header-text">
                            <h2>Agenda Harian Pimpinan</h2>
                            <p>{{ count($agendaPimpinan) }} kegiatan terjadwal hari ini</p>
                        </div>
                    </div>
                    <div class="agenda-list">
                        @forelse($agendaPimpinan as $a)
                        <div class="agenda-item">
                            <div class="agenda-time">{{ \Carbon\Carbon::parse($a->start_time)->format('H.i') }}</div>
                            <div class="agenda-details" style="flex: 1;">
                                <h4>{{ $a->title }}</h4>
                                <p><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> {{ $a->location }}</p>
                            </div>
                            <div style="display: flex; align-items: flex-start;">
                                <span class="status-badge status-{{ strtolower($a->status) }}">
                                    {{ $a->status }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <p style="color: var(--text-light); text-align:center; margin-top:20px;">Tidak ada agenda pimpinan hari ini.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Slide 2: Agenda Umum -->
                <div class="carousel-slide" data-border="var(--blue)">
                    <div class="card-header">
                        <div class="icon-box" style="color: var(--blue); background: #e0f2fe;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <div class="card-header-text">
                            <h2>Agenda Harian Umum</h2>
                            <p>{{ count($agendaUmum) }} kegiatan terjadwal hari ini</p>
                        </div>
                    </div>
                    <div class="agenda-list">
                        @forelse($agendaUmum as $a)
                        <div class="agenda-item">
                            <div class="agenda-time" style="color: var(--blue);">{{ \Carbon\Carbon::parse($a->start_time)->format('H.i') }}</div>
                            <div class="agenda-details" style="flex: 1;">
                                <h4>{{ $a->title }}</h4>
                                <p><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> {{ $a->location }}</p>
                            </div>
                            <div style="display: flex; align-items: flex-start;">
                                <span class="status-badge status-{{ strtolower($a->status) }}">
                                    {{ $a->status }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <p style="color: var(--text-light); text-align:center; margin-top:20px;">Tidak ada agenda umum hari ini.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Slide 3: Agenda Mingguan -->
                <div class="carousel-slide" data-border="var(--green)">
                    <div class="card-header">
                        <div class="icon-box" style="color: var(--green); background: #dcfce7;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <div class="card-header-text">
                            <h2>Agenda Seminggu ke Depan</h2>
                            <p>Menampilkan agenda terdekat</p>
                        </div>
                    </div>
                    <div class="agenda-list">
                        @forelse($agendaMingguan->take(5) as $a)
                        <div class="agenda-item">
                            <div class="agenda-date-box">
                                <div class="date-num">{{ \Carbon\Carbon::parse($a->date)->format('d') }}</div>
                                <div class="date-month">{{ \Carbon\Carbon::parse($a->date)->translatedFormat('M') }}</div>
                            </div>
                            <div class="agenda-details" style="flex: 1; padding-top: 5px;">
                                <p style="font-weight: bold; color:var(--text-light); margin-bottom:0;">{{ \Carbon\Carbon::parse($a->date)->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }}</p>
                                <h4>{{ $a->title }}</h4>
                            </div>
                            <div style="display: flex; align-items: flex-start;">
                                <span class="status-badge status-{{ strtolower($a->status) }}">
                                    {{ $a->status }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <p style="color: var(--text-light); text-align:center; margin-top:20px;">Tidak ada agenda minggu ini.</p>
                        @endforelse
                    </div>
                </div>
                
                <!-- Slide 4: Agenda Bulanan (Kalender) -->
                <div class="carousel-slide" data-border="var(--purple)">
                    <div class="card-header">
                        <div class="icon-box" style="color: var(--purple); background: var(--purple-light);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <div class="card-header-text">
                            <h2>Agenda Bulan Ini</h2>
                            <p>{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
                        </div>
                    </div>
                    
                    @php
                        $startOfMonth = \Carbon\Carbon::now()->startOfMonth();
                        $daysInMonth = $startOfMonth->daysInMonth;
                        // Kita gunakan hari Minggu (0) sebagai awal minggu di kalender
                        $firstDayOfWeek = $startOfMonth->dayOfWeek;
                        
                        // Menyiapkan array tanggal yang memiliki agenda bulan ini
                        $eventDates = [];
                        foreach($agendaBulanan as $ab) {
                            $day = \Carbon\Carbon::parse($ab->date)->format('j');
                            if(!in_array($day, $eventDates)) {
                                $eventDates[] = $day;
                            }
                        }
                    @endphp
                    
                    <div class="calendar-wrapper">
                        <div>
                            <div class="calendar-grid">
                                <div class="calendar-header">Min</div>
                                <div class="calendar-header">Sen</div>
                                <div class="calendar-header">Sel</div>
                                <div class="calendar-header">Rab</div>
                                <div class="calendar-header">Kam</div>
                                <div class="calendar-header">Jum</div>
                                <div class="calendar-header">Sab</div>
                                
                                <!-- Empty slots before the 1st of month -->
                                @for($i = 0; $i < $firstDayOfWeek; $i++)
                                    <div class="calendar-day empty"></div>
                                @endfor
                                
                                <!-- Days of the month -->
                                @for($day = 1; $day <= $daysInMonth; $day++)
                                    @php
                                        $hasEvent = in_array($day, $eventDates);
                                    @endphp
                                    <div class="calendar-day {{ $hasEvent ? 'highlight' : '' }}">
                                        {{ $day }}
                                        @if($hasEvent)
                                            <div class="event-dot"></div>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        </div>
                        
                        <!-- Sorotan Agenda -->
                        <div class="sorotan-agenda">
                            <div class="sorotan-title">Sorotan Agenda</div>
                            <div class="sorotan-grid">
                                @forelse($agendaBulanan->take(4) as $a)
                                <div class="sorotan-item">
                                    <div class="sorotan-date">{{ \Carbon\Carbon::parse($a->date)->format('d') }}</div>
                                    <div class="sorotan-text">{{ \Illuminate\Support\Str::limit($a->title, 20) }}</div>
                                </div>
                                @empty
                                <div style="color: var(--text-light); font-size: 0.85rem;">Tidak ada sorotan bulan ini.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Side: Video -->
        <div class="card video-card">
            <div class="card-header">
                <div class="icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                </div>
                <div class="card-header-text">
                    <h2>Video Informasi</h2>
                    <p>Tayangan Otomatis</p>
                </div>
            </div>
            <div class="video-container">
                <!-- Ganti nama file video-informasi.mp4 dengan nama video Anda yang diletakkan di folder public/videos/ -->
                <video autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
                    <source src="{{ asset('videos/video-informasi.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
        </div>
    </div>

    <footer>
        <div class="marquee">
            <span>🔴 Instagram: bpkad.garutkab &bull; Tiktok: bpkad.garutkab &bull; Website Resmi: bpkad.go.id &bull; Badan Pengelolaan Keuangan dan Aset Daerah &bull; Melayani dengan Transparan, Akuntabel, dan Profesional &bull; </span>
            <span>🔴 Instagram: bpkad.garutkab &bull; Tiktok: bpkad.garutkab &bull; Website Resmi: bpkad.go.id &bull; Badan Pengelolaan Keuangan dan Aset Daerah &bull; Melayani dengan Transparan, Akuntabel, dan Profesional &bull; </span>
        </div>
    </footer>

    <script>
        // Clock functionality
        function updateClock() {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }).replace(/:/g, '.');
            document.getElementById('clock').textContent = timeStr;

            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateStr = now.toLocaleDateString('id-ID', options);
            document.getElementById('current-date-full').textContent = dateStr;
            document.getElementById('banner-date').textContent = dateStr;
        }

        setInterval(updateClock, 1000);
        updateClock();

        // Carousel Logic
        const slides = document.querySelectorAll('.carousel-slide');
        const dots = document.querySelectorAll('.dot');
        const cardContainer = document.getElementById('cardContainer');
        let currentSlide = 0;
        const slideDelay = 10000; // 10 seconds

        function updateSlide(index) {
            // Sembunyikan slide lama
            slides[currentSlide].classList.remove('active');
            dots[currentSlide].classList.remove('active');
            dots[currentSlide].style.background = '#cbd5e1';

            // Pindah ke slide baru
            currentSlide = index;
            
            const nextBorderColor = slides[currentSlide].getAttribute('data-border');
            cardContainer.style.borderTopColor = nextBorderColor;
            
            // Tampilkan slide baru
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
            dots[currentSlide].style.background = nextBorderColor;
        }

        function nextSlide() {
            let nextIndex = (currentSlide + 1) % slides.length;
            updateSlide(nextIndex);
        }

        let slideInterval = setInterval(nextSlide, slideDelay);

        function goToSlide(index) {
            updateSlide(index);
            // Reset interval agar tidak langsung loncat saat baru di-klik
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, slideDelay);
        }

        // Auto Refresh page every 5 minutes to get new data
        setInterval(() => {
            window.location.reload();
        }, 300000);
    </script>
</body>
</html>
