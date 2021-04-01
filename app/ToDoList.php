<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $table = '_to_do_list';
    protected $primaryKey = 'id';
    protected $fillable = ['list'];
}
