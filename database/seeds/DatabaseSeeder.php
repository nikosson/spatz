<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0;');
        DB::table('users')->truncate();
        DB::table('questions')->truncate();
        DB::statement('SET foreign_key_checks = 1;');

        $this->call(QuestionsTableSeeder::class);
    }
}