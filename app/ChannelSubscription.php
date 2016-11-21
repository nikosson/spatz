<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelSubscription extends Model
{
    protected $table = 'channels_subscriptions';

    protected $fillable = ['user_id', 'channel_id'];

}
