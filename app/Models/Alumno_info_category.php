<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno_info_category extends Model
{
    use HasFactory;

    public function alumno_info_field()
    {
        return $this->hasMany(Alumno_info_field::class);
    }
}
