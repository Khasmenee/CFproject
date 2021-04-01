<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'orderdetails';
    protected $primaryKey = 'id';
    protected $fillable = ['orderID','productID','quantity','list','detail'];
    public function orders(){
        return $this->belongsTo('App\Order','orderID','id');
    }
}
