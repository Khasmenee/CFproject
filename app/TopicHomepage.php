<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicHomepage extends Model
{
    protected $table = 'topic_homepage';
    protected $fillable = ['topic', 'detail'];
}
