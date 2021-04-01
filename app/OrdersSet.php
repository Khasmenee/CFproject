<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersSet extends Model
{
    protected $table = 'orders_set';
    protected $primaryKey = 'id';
    protected $fillable = ['userID','paymentID','orderItemsID','total_price','number_list']; 
}
