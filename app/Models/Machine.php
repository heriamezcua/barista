<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function colors()
    {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }
}
