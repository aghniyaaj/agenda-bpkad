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
}
