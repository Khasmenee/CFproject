<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workings extends Model
{
    protected $table = 'workings';
    protected $fillable = ['name','academy','image', 'detail'];
}
