<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detailfaktur()
    {
        return $this->hasMany(DetailFaktur::class);
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
    
    public function setoran()
    {
        return $this->hasMany(Setoran::class);
    }

    public function faktur()
    {
        return $this->hasMany(Faktur::class);
    }
    public function pajak()
    {
        return $this->hasMany(Pajak::class);
    }
}
