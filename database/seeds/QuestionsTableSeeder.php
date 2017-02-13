<?php


use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{

    public function run()
    {
        factory('App\Models\Question', 25)->create();
    }

}