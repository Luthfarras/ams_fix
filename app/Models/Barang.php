<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }

    public function detailfaktur()
    {
        return $this->hasMany(DetailFaktur::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
