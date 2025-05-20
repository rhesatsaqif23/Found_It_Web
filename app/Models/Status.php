<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = ['nama'];

    public function barangs(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
