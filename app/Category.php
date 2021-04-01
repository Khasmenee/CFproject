<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Caticon;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['caticon_id','name','detail','type','status'];
    
    public function caticon(){
        return $this->hasOne('App\Caticon','id','caticon_id');
    }
    public function products(){
        return $this->hasMany('App\Product','cat_id','id');
    }
}
