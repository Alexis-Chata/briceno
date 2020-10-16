<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = ['nombres','apellidos','dni','campus1','campus2','campus3','campus4','campus5','campus6'];
}
