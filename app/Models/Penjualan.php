<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function faktur()
    {
        return $this->belongsTo(Faktur::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
