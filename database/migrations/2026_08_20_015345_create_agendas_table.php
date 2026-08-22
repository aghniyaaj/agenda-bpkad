<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('location');
            $table->enum('category', ['pimpinan', 'umum']);
            $table->enum('status', ['selesai', 'aktif', 'batal'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
