<?php


use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{

    public function run()
    {
        factory('App\Channel', 3)->create();
    }

}