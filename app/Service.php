<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "service";
    protected $primarykey = 'idService';

    protected $fillable = ['idService','name', 'description', 'idStatus'];
}
