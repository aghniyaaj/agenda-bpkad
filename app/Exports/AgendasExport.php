<?php

namespace App\Exports;

use App\Models\Agenda;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Carbon\Carbon;

class AgendasExport implements FromView, WithStyles, WithColumnWidths
{
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = Carbon::parse($start)->format('Y-m-d');
        $this->end = Carbon::parse($end)->format('Y-m-d');
    }

    public function view(): View
    {
        return view('admin.agendas.excel', [
            'agendas' => Agenda::whereBetween('date', [$this->start, $this->end])
                ->orderBy('date', 'asc')
                ->orderBy('start_time', 'asc')
                ->get(),
            'start' => $this->start,
            'end' => $this->end
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,   // No
            'B' => 16,  // Tanggal
            'C' => 16,  // Waktu
            'D' => 45,  // Nama Kegiatan
            'E' => 35,  // Lokasi
            'F' => 25,  // Kategori
            'G' => 15,  // Status
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Wrap text agar tulisan panjang (seperti judul dan lokasi) otomatis turun ke bawah
        $sheet->getStyle('A1:G1000')->getAlignment()->setWrapText(true);
        // Posisikan text di tengah secara vertikal
        $sheet->getStyle('A1:G1000')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        
        return [];
    }
}
