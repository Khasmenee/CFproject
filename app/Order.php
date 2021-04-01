<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['userID','status','list','paymentID','date'];
    public function products(){
        return $this->belongsToMany('App\Product','orderdetails','orderID','productID');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
