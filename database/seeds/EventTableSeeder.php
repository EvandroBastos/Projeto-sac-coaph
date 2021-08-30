<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('events')->insert([
            [
                
                'title' => 'Reunião',
                'start' => '2020-06-11 21:30:00',
                'end' => '2020-06-12 21:30:00',
                'color' => '#c40233',
                'description' => 'Reunião com cliente'
            ],
            [
                'title' => 'Ligar p/cliente',
                'start' => '2020-06-22',
                'end' => '2020-06-23',
                'color' => '#29fdf2',
                'description' => 'Falar com cliente'
            ]
        ]);
    }
}
