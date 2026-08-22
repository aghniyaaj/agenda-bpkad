<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE agendas MODIFY COLUMN status ENUM('aktif', 'selesai', 'batal', 'ditunda') NOT NULL DEFAULT 'aktif'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE agendas MODIFY COLUMN status ENUM('aktif', 'selesai', 'batal') NOT NULL DEFAULT 'aktif'");
    }
};
