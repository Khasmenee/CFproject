<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reject extends Model
{
    protected $table = 'reject';
    protected $primaryKey = 'id';
    protected $fillable = ['orderID','title','des'];
}
