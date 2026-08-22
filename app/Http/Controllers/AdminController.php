<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::today();
        $nextWeek = Carbon::today()->addDays(7);
        $currentMonth = Carbon::now()->month;

        $countPimpinanHariIni = Agenda::whereDate('date', $today)->where('category', 'pimpinan')->count();
        $countUmumHariIni = Agenda::whereDate('date', $today)->where('category', 'umum')->count();
        $countSeminggu = Agenda::whereBetween('date', [$today, $nextWeek])->count();
        $countSebulan = Agenda::whereMonth('date', $currentMonth)->count();

        $agendas = Agenda::whereDate('date', '>=', $today)
            ->orderBy('date', 'asc')
            ->orderBy('start_time', 'asc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'countPimpinanHariIni',
            'countUmumHariIni',
            'countSeminggu',
            'countSebulan',
            'agendas'
        ));
    }

    public function pimpinanIndex(Request $request)
    {
        $query = Agenda::where('category', 'pimpinan')->whereDate('date', Carbon::today());
        
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('location', 'like', '%'.$request->search.'%');
            });
        }
        
        if ($request->has('tipe_kegiatan') && $request->tipe_kegiatan != '') {
            $query->where('tipe_kegiatan', $request->tipe_kegiatan);
        }
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $agendas = $query->orderBy('start_time', 'asc')->get();
        return view('admin.agendas.pimpinan', compact('agendas'));
    }

    public function umumIndex(Request $request)
    {
        $query = Agenda::where('category', 'umum')->whereDate('date', Carbon::today());
        
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('location', 'like', '%'.$request->search.'%');
            });
        }
        
        if ($request->has('tipe_kegiatan') && $request->tipe_kegiatan != '') {
            $query->where('tipe_kegiatan', $request->tipe_kegiatan);
        }
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $agendas = $query->orderBy('start_time', 'asc')->get();
        return view('admin.agendas.umum', compact('agendas'));
    }
    
    public function calendarIndex()
    {
        return view('admin.calendar');
    }
    
    // API for FullCalendar
    public function apiEvents(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $agendas = Agenda::whereBetween('date', [
            Carbon::parse($start)->format('Y-m-d'), 
            Carbon::parse($end)->format('Y-m-d')
        ])->get();

        $events = [];
        foreach ($agendas as $agenda) {
            // Tentukan warna berdasarkan tipe_kegiatan
            $color = '#8b5cf6'; // default ungu
            if (strtolower($agenda->tipe_kegiatan) == 'rapat') $color = '#3b82f6';
            if (strtolower($agenda->tipe_kegiatan) == 'audiensi') $color = '#a855f7';
            if (strtolower($agenda->tipe_kegiatan) == 'upacara') $color = '#f97316';
            if (strtolower($agenda->tipe_kegiatan) == 'pelayanan') $color = '#14b8a6';
            if (strtolower($agenda->tipe_kegiatan) == 'pelatihan') $color = '#ef4444';
            
            $events[] = [
                'id' => $agenda->id,
                'title' => $agenda->title,
                'start' => $agenda->date . 'T' . $agenda->start_time,
                'end' => $agenda->end_time ? ($agenda->date . 'T' . $agenda->end_time) : null,
                'backgroundColor' => $color,
                'borderColor' => $color,
                'extendedProps' => [
                    'category' => $agenda->category,
                    'location' => $agenda->location,
                    'tipe_kegiatan' => $agenda->tipe_kegiatan,
                    'status' => $agenda->status,
                    'start_time' => $agenda->start_time,
                    'end_time' => $agenda->end_time,
                    'date' => $agenda->date
                ]
            ];
        }

        return response()->json($events);
    }

    public function exportExcel(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        return \Excel::download(new \App\Exports\AgendasExport($start, $end), 'agenda_' . $start . '_to_' . $end . '.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $agendas = Agenda::whereBetween('date', [
            Carbon::parse($start)->format('Y-m-d'), 
            Carbon::parse($end)->format('Y-m-d')
        ])->orderBy('date', 'asc')->orderBy('start_time', 'asc')->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.agendas.pdf', compact('agendas', 'start', 'end'));
        
        return $pdf->download('agenda_' . $start . '_to_' . $end . '.pdf');
    }

    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'location' => 'required|string|max:255',
            'category' => 'required|in:pimpinan,umum',
            'tipe_kegiatan' => 'nullable|string|max:100',
            'status' => 'required|in:selesai,aktif,batal,ditunda',
        ]);

        Agenda::create($request->all());

        return redirect()->back()->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'location' => 'required|string|max:255',
            'category' => 'required|in:pimpinan,umum',
            'tipe_kegiatan' => 'nullable|string|max:100',
            'status' => 'required|in:selesai,aktif,batal,ditunda',
        ]);

        $agenda->update($request->all());
        
        return redirect()->back()->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->back()->with('success', 'Agenda berhasil dihapus.');
    }
}
