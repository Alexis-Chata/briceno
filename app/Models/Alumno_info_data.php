<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno_info_data extends Model
{
    use HasFactory;
    protected $fillable = ['alumno_id', 'alumno_info_field_id', 'data', 'dataformat'];

    public function alumno_info_field()
    {
        return $this->belongsTo(Alumno_info_field::class);
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
