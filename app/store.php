<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    protected $table = 'store';
    protected $fillable = ['slide_image1','slide_image2','slide_image3','store_name','detail','manager_name',
    'Admin_name','image','address','telephone','line_id','facebook_page',
    'topic_homepage','topic_workings','payment_show','payment_topic','payment_detail','bank_image'];
}
