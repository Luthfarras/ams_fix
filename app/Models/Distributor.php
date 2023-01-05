<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}
