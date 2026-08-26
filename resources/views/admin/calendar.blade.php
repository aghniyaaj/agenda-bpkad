@extends('admin.layout')

@section('title', 'Agenda Mingguan & Bulanan')

@section('content')
<!-- Include FullCalendar CSS & JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px;">
    <div>
        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--text-dark); margin-bottom: 5px;">Agenda Mingguan & Bulanan</h2>
        <p style="color: var(--text-light); font-size: 0.9rem;">Tampilan kalender terpadu seluruh agenda dinas</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <button id="btn-export-pdf" style="background: white; color: var(--text-dark); border: 1px solid var(--border); padding: 10px 15px; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Export PDF
        </button>
        <button id="btn-export-excel" style="background: #10b981; color: white; border: none; padding: 10px 15px; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg> Export Excel
        </button>
        <button onclick="document.getElementById('tambahAgendaModal').style.display='flex'" style="background: var(--primary); border: none; cursor: pointer; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">
            <span>+</span> Tambah Agenda
        </button>
    </div>
</div>

<div style="background: white; border-radius: 12px; border: 1px solid var(--border); padding: 25px; min-height: 700px;">
    
    <!-- Custom Toolbar yang mirip desain -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
        <div style="display: flex; align-items: center; gap: 15px;">
            <div style="display: flex; gap: 5px;">
                <button id="btn-prev" style="background: white; border: 1px solid var(--border); border-radius: 6px; padding: 5px 10px; cursor: pointer;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button id="btn-next" style="background: white; border: 1px solid var(--border); border-radius: 6px; padding: 5px 10px; cursor: pointer;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
            <h3 id="calendar-title" style="font-size: 1.3rem; margin: 0; font-weight: 700; color: var(--text-dark);">Agustus 2026</h3>
            <button id="btn-today" style="background: white; border: 1px solid var(--border); border-radius: 20px; padding: 5px 15px; font-size: 0.8rem; cursor: pointer; color: var(--text-dark);">Hari Ini</button>
        </div>

        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
            <!-- Legend -->
            <div style="display: flex; gap: 10px; font-size: 0.8rem; color: var(--text-light); margin-right: 15px;">
                <div style="display: flex; align-items: center; gap: 4px;"><div style="width: 8px; height: 8px; border-radius: 2px; background: #3b82f6;"></div> Rapat</div>
                <div style="display: flex; align-items: center; gap: 4px;"><div style="width: 8px; height: 8px; border-radius: 2px; background: #a855f7;"></div> Audiensi</div>
                <div style="display: flex; align-items: center; gap: 4px;"><div style="width: 8px; height: 8px; border-radius: 2px; background: #f97316;"></div> Upacara</div>
                <div style="display: flex; align-items: center; gap: 4px;"><div style="width: 8px; height: 8px; border-radius: 2px; background: #14b8a6;"></div> Pelayanan</div>
                <div style="display: flex; align-items: center; gap: 4px;"><div style="width: 8px; height: 8px; border-radius: 2px; background: #ef4444;"></div> Pelatihan</div>
            </div>

            <!-- View Toggles -->
            <div style="display: flex; background: #f1f5f9; padding: 4px; border-radius: 8px;">
                <button id="btn-month" style="background: white; border: 1px solid var(--border); box-shadow: 0 1px 2px rgba(0,0,0,0.05); border-radius: 6px; padding: 8px 15px; font-weight: 600; font-size: 0.85rem; color: var(--primary); cursor: pointer;">Tampilan Bulan</button>
                <button id="btn-week" style="background: transparent; border: none; border-radius: 6px; padding: 8px 15px; font-weight: 500; font-size: 0.85rem; color: var(--text-light); cursor: pointer;">Tampilan Minggu</button>
            </div>
        </div>
    </div>

    <!-- Calendar Container -->
    <div id="calendar"></div>
</div>

<!-- Export Modal -->
<div id="exportModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
    <div style="background: white; width: 450px; border-radius: 16px; padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); padding-bottom: 15px; margin-bottom: 20px;">
            <h2 id="exportModalTitle" style="font-size: 1.3rem; color: var(--text-dark); font-weight: 700;">Export Agenda</h2>
            <button type="button" onclick="document.getElementById('exportModal').style.display='none'" style="background: transparent; border: none; font-size: 1.5rem; cursor: pointer; color: var(--text-light);">&times;</button>
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 500; margin-bottom: 8px;">Pilih Rentang Waktu</label>
            <select id="exportPeriod" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: 8px; outline: none;">
                <option value="0">Bulan Ini</option>
                <option value="1">1 Bulan Lalu</option>
                <option value="2">2 Bulan Lalu</option>
                <option value="3">3 Bulan Lalu</option>
            </select>
        </div>

        <input type="hidden" id="exportFormat" value="">

        <div style="margin-top: 25px; display: flex; justify-content: flex-end; gap: 10px;">
            <button type="button" onclick="document.getElementById('exportModal').style.display='none'" style="padding: 10px 20px; background: white; border: 1px solid var(--border); border-radius: 8px; color: var(--text-dark); cursor: pointer;">Batal</button>
            <button type="button" id="btn-confirm-export" style="padding: 10px 20px; background: var(--primary); border: none; border-radius: 8px; color: white; font-weight: 600; cursor: pointer;">Download</button>
        </div>
    </div>
</div>

<style>
    /* Customizing FullCalendar to match the design */
    .fc-theme-standard .fc-scrollgrid {
        border-color: var(--border);
        border-radius: 12px;
        overflow: hidden;
    }
    .fc-theme-standard th, .fc-theme-standard td, .fc-theme-standard .fc-scrollgrid {
        border-color: var(--border);
    }
    .fc-col-header-cell-cushion {
        color: var(--text-dark);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        padding: 15px 0 !important;
    }
    .fc-daygrid-day-number {
        color: var(--text-light);
        font-weight: 500;
        padding: 10px !important;
    }
    .fc-day-today {
        background-color: #f8fafc !important;
    }
    .fc-daygrid-event {
        border-radius: 4px;
        padding: 2px 4px;
        font-size: 0.75rem;
        margin: 2px 4px;
        border: none;
    }
    .fc-v-event {
        border-radius: 4px;
        border: none;
    }
    .fc-event-main, .fc-event-title, .fc-event-time {
        font-weight: 600 !important;
        white-space: normal !important;
    }
    .fc-daygrid-event .fc-event-main, .fc-daygrid-event .fc-event-title, .fc-daygrid-event .fc-event-time {
        color: var(--text-dark) !important;
    }
    .fc-timegrid-event .fc-event-main, .fc-timegrid-event .fc-event-title, .fc-timegrid-event .fc-event-time {
        color: white !important;
    }
    .fc-timegrid-event {
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        padding: 4px 6px !important;
        line-height: 1.3 !important;
    }
    .fc-timegrid-axis-frame {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .fc-timegrid-axis-frame::after {
        content: "WAKTU";
        font-weight: 700;
        font-size: 0.75rem;
        color: var(--text-light);
    }
    .fc-timegrid-event-harness > .fc-timegrid-event {
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    /* Hide default toolbar since we made a custom one */
    .fc-header-toolbar {
        display: none !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id', // Bahasa Indonesia
            height: 700,
            firstDay: 1, // Senin
            slotMinTime: '06:00:00', // Mulai lebih pagi
            slotMaxTime: '23:00:00', // Diperpanjang sampai malam untuk agenda lembur
            allDaySlot: false,
            headerToolbar: false, // Kita sembunyikan bawaannya
            displayEventEnd: true, // Tampilkan jam selesai di semua tampilan (termasuk bulan)
            events: '{{ route('admin.api.events') }}',
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                separator: ' - ',
                meridiem: false,
                hour12: false
            },
            slotLabelFormat: {
                hour: '2-digit',
                minute: '2-digit',
                omitZeroMinute: false,
                meridiem: false,
                hour12: false
            },
            datesSet: function(info) {
                // Update judul bulan
                document.getElementById('calendar-title').innerText = info.view.title;
            },
            eventDidMount: function(info) {
                if (info.event.extendedProps.is_conflict) {
                    info.el.style.border = '2px solid red';
                    info.el.title = 'Jadwal Bentrok!';
                }
            },
            eventClick: function(info) {
                var props = info.event.extendedProps;
                openEditModal(
                    info.event.id,
                    info.event.title,
                    props.date,
                    props.start_time,
                    props.end_time,
                    props.location,
                    props.category,
                    props.tipe_kegiatan,
                    props.status
                );
            }
        });
        calendar.render();

        // Custom Buttons Logic
        document.getElementById('btn-prev').addEventListener('click', function() {
            calendar.prev();
        });
        document.getElementById('btn-next').addEventListener('click', function() {
            calendar.next();
        });
        document.getElementById('btn-today').addEventListener('click', function() {
            calendar.today();
        });

        // View Switchers
        var btnMonth = document.getElementById('btn-month');
        var btnWeek = document.getElementById('btn-week');

        btnMonth.addEventListener('click', function() {
            calendar.changeView('dayGridMonth');
            
            // Update UI styles
            btnMonth.style.background = 'white';
            btnMonth.style.border = '1px solid var(--border)';
            btnMonth.style.boxShadow = '0 1px 2px rgba(0,0,0,0.05)';
            btnMonth.style.color = 'var(--primary)';
            btnMonth.style.fontWeight = '600';
            
            btnWeek.style.background = 'transparent';
            btnWeek.style.border = 'none';
            btnWeek.style.boxShadow = 'none';
            btnWeek.style.color = 'var(--text-light)';
            btnWeek.style.fontWeight = '500';
        });

        btnWeek.addEventListener('click', function() {
            calendar.changeView('timeGridWeek');
            
            // Update UI styles
            btnWeek.style.background = 'white';
            btnWeek.style.border = '1px solid var(--border)';
            btnWeek.style.boxShadow = '0 1px 2px rgba(0,0,0,0.05)';
            btnWeek.style.color = 'var(--primary)';
            btnWeek.style.fontWeight = '600';
            
            btnMonth.style.background = 'transparent';
            btnMonth.style.border = 'none';
            btnMonth.style.boxShadow = 'none';
            btnMonth.style.color = 'var(--text-light)';
            btnMonth.style.fontWeight = '500';
        });

        // Export Logic
        document.getElementById('btn-export-pdf').addEventListener('click', function() {
            document.getElementById('exportModalTitle').innerText = 'Export ke PDF';
            document.getElementById('exportFormat').value = 'pdf';
            document.getElementById('exportModal').style.display = 'flex';
        });

        document.getElementById('btn-export-excel').addEventListener('click', function() {
            document.getElementById('exportModalTitle').innerText = 'Export ke Excel';
            document.getElementById('exportFormat').value = 'excel';
            document.getElementById('exportModal').style.display = 'flex';
        });
        
        document.getElementById('btn-confirm-export').addEventListener('click', function() {
            var periodOffset = parseInt(document.getElementById('exportPeriod').value);
            var format = document.getElementById('exportFormat').value;
            
            // Hitung tanggal mulai dan akhir berdasarkan bulan lalu
            var date = new Date();
            date.setMonth(date.getMonth() - periodOffset);
            
            // Set ke tanggal 1 bulan tersebut
            var start = new Date(date.getFullYear(), date.getMonth(), 1);
            // Set ke tanggal terakhir bulan tersebut
            var end = new Date(date.getFullYear(), date.getMonth() + 1, 0);
            
            var startStr = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2, '0') + '-01';
            var endStr = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2, '0') + '-' + String(end.getDate()).padStart(2, '0');
            
            var url = format === 'pdf' ? "{{ route('admin.calendar.export.pdf') }}" : "{{ route('admin.calendar.export.excel') }}";
            
            window.location.href = url + "?start=" + startStr + "&end=" + endStr;
            document.getElementById('exportModal').style.display = 'none';
        });
    });
</script>
@endsection
