<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    protected $fillable = ['user_id', 'answer_notifications', 'news_notifications'];

    protected $table = 'mailing';
}
