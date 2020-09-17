<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table= "rol";
    protected $primarykey = 'idRol';

    protected $fillable = ['idRol','name','description','idStatus'];
}
