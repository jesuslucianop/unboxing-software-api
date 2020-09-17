<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";
    protected $primarykey = 'idStatus';

    protected $filable = ['name', 'active'];
}
