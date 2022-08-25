<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = "materiales";
    protected $fillable=['Nombre_Material','Link_Material','ID_Asignatura'];
    public function unidad(){
        return $this->belongsTo('App\Models\Unidad');
    }

}
