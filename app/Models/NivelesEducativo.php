<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelesEducativo extends Model
{
    use HasFactory;

    public function escuela()
    {
        return $this->hasMany(Escuela::class);
    }
}