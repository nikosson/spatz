<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'users',
        'questions',
        'subscriptions',
        'mailing',
        'channels',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0;');

        foreach($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET foreign_key_checks = 1;');

        //$this->call(ChannelsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
    }
}