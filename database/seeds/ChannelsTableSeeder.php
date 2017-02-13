<?php


use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{

    public function run()
    {
        factory('App\Models\Channel', 3)->create();
    }

}