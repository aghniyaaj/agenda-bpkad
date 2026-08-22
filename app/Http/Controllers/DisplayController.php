<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DisplayController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $nextWeek = Carbon::today()->addDays(7);
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Agenda Harian
        $agendaPimpinan = Agenda::whereDate('date', $today)
            ->where('category', 'pimpinan')
            ->where('status', '!=', 'batal')
            ->orderBy('start_time', 'asc')
            ->get();

        $agendaUmum = Agenda::whereDate('date', $today)
            ->where('category', 'umum')
            ->where('status', '!=', 'batal')
            ->orderBy('start_time', 'asc')
            ->get();

        // Agenda Mingguan
        $agendaMingguan = Agenda::whereBetween('date', [$today, $nextWeek])
            ->where('status', '!=', 'batal')
            ->orderBy('date', 'asc')
            ->orderBy('start_time', 'asc')
            ->get();

        // Agenda Bulanan (Untuk highlight di kalender)
        $agendaBulanan = Agenda::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->where('status', '!=', 'batal')
            ->orderBy('date', 'asc')
            ->orderBy('start_time', 'asc')
            ->get();

        return view('display', compact(
            'today', 
            'agendaPimpinan', 
            'agendaUmum', 
            'agendaMingguan', 
            'agendaBulanan'
        ));
    }
}
