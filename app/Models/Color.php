<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function machines()
    {
        return $this->belongsToMany(Machine::class)->withTimestamps();
    }
}
