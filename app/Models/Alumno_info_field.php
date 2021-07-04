<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno_info_field extends Model
{
    use HasFactory;
    protected $fillable = ['alumno_info_category_id', 'shortname', 'name', 'descripcion', 'param1', 'param2', 'param3', 'param4', 'param5', 'defaultdata', 'datatype', 'descripcionformat', 'required', 'locked', 'forceunique', 'signup', 'defaultdataformat', 'orden', 'visible'];

    public function alumno_info_categorie()
    {
        return $this->belongsTo(Alumno_info_category::class);
    }

    public function alumno_info_data()
    {
        return $this->hasMany(Alumno_info_data::class);
    }
}
