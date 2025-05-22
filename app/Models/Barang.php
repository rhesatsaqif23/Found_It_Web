<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $fillable = [
        'nama',
        'tipe_id',
        'kategori_id',
        'pelapor_id',
        'waktu',
        'lokasi',
        'kontak',
        'deskripsi',
        'foto',
        'status_id',
    ];

    public function tipe(): BelongsTo
    {
        return $this->belongsTo(Tipe::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    protected $casts = [
        'waktu' => 'datetime',
    ];
}
