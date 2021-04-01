<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['cat_id','name','show','detail','image','price','instock','status','star'];
    public function category(){
        return $this->belongsTo('App\Category','cat_id','id');
    }
    public function orders(){
        return $this->belongsToMany('App\Order','orderdetails','productID','orderID');
    }
}
