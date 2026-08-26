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
        // 1. Update yang hari-hari sebelumnya
        static::where('status', 'aktif')
            ->whereDate('date', '<', \Carbon\Carbon::today())
            ->update(['status' => 'selesai']);
            
        // 2. Update hari ini yang sudah lewat jamnya
        $agendasHariIni = static::where('status', 'aktif')
            ->whereDate('date', \Carbon\Carbon::today())
            ->get();
            
        foreach ($agendasHariIni as $agenda) {
            // Jika tidak ada end_time, kita anggap selesai 2 jam setelah start_time
            $end = $agenda->end_time 
                ? \Carbon\Carbon::parse($agenda->end_time) 
                : \Carbon\Carbon::parse($agenda->start_time)->addHours(2);
                
            if (\Carbon\Carbon::now()->format('H:i:s') > $end->format('H:i:s')) {
                $agenda->update(['status' => 'selesai']);
            }
        }
    }
}
