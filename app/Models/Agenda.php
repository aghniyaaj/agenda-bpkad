<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'start_time',
        'end_time',
        'location',
        'category',
        'tipe_kegiatan',
        'status',
    ];
    
    protected $appends = ['is_conflict'];

    public function getIsConflictAttribute()
    {
        $conflicts = static::where('date', $this->date)
            ->where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->where('status', '!=', 'batal')
            ->get();
            
        foreach ($conflicts as $other) {
            $start1 = \Carbon\Carbon::parse($this->start_time);
            $end1 = $this->end_time ? \Carbon\Carbon::parse($this->end_time) : $start1->copy()->addHours(2);
            
            $start2 = \Carbon\Carbon::parse($other->start_time);
            $end2 = $other->end_time ? \Carbon\Carbon::parse($other->end_time) : $start2->copy()->addHours(2);
            
            // Logika bentrok (overlap)
            if ($start1 < $end2 && $start2 < $end1) {
                return true;
            }
        }
        return false;
    }

    public static function autoUpdateSelesai()
    {
        $now = \Carbon\Carbon::now();
        $todayStr = $now->format('Y-m-d');

        // 1. Update agenda dari hari-hari sebelum hari ini yang masih 'aktif' -> 'selesai'
        static::where('status', 'aktif')
            ->whereDate('date', '<', $now->toDateString())
            ->update(['status' => 'selesai']);

        // 2. Update agenda hari ini yang sudah benar-benar melewati jam selesainya
        $agendasHariIni = static::where('status', 'aktif')
            ->whereDate('date', $now->toDateString())
            ->get();

        foreach ($agendasHariIni as $agenda) {
            if (!$agenda->start_time) continue;

            $dateStr = \Carbon\Carbon::parse($agenda->date)->format('Y-m-d');
            $startDateTime = \Carbon\Carbon::parse($dateStr . ' ' . $agenda->start_time);

            if (!empty($agenda->end_time)) {
                $endDateTime = \Carbon\Carbon::parse($dateStr . ' ' . $agenda->end_time);

                // Jika end_time lebih kecil atau sama dengan start_time (umpamanya input jam 00:04 saat start 10:00),
                // maka anggap durasi 2 jam setelah start_time
                if ($endDateTime <= $startDateTime) {
                    $endDateTime = $startDateTime->copy()->addHours(2);
                }
            } else {
                // Default durasi 2 jam jika end_time kosong
                $endDateTime = $startDateTime->copy()->addHours(2);
            }

            // HANYA update ke 'selesai' jika waktu SEKARANG sudah melewati endDateTime
            if ($now > $endDateTime) {
                $agenda->update(['status' => 'selesai']);
            }
        }
    }
}

