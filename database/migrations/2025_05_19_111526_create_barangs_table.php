<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->foreignId('tipe_id')->nullable()->constrained('tipes')->nullOnDelete();
            $table->foreignId('kategori_id')->nullable()->constrained('kategoris')->nullOnDelete();
            $table->string('pelapor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('waktu')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('kontak')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('status_id')->nullable()->constrained('statuses')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
}
