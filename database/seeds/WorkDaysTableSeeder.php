<?php

use Illuminate\Database\Seeder;

class WorkDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\WorkDay::query()->truncate();
        //
        \App\WorkDay::create(
            [
                'name'=>'Luni',
                'from'=>'9:00',
                'to'=>'22:00',
            ]
        );
        \App\WorkDay::create(
            [
                'name'=>'Marti',
                'from'=>'9:00',
                'to'=>'22:00',
            ]
        );
        \App\WorkDay::create(
            [
                'name'=>'Miercuri',
                'from'=>'9:00',
                'to'=>'22:00',
            ]
        );
        \App\WorkDay::create(
            [
                'name'=>'Joi',
                'from'=>'9:00',
                'to'=>'22:00',
            ]
        );
        \App\WorkDay::create(
            [
                'name'=>'Vineri',
                'from'=>'9:00',
                'to'=>'22:00',
            ]
        );
        \App\WorkDay::create(
            [
                'name'=>'Sambata',
                'from'=>'9:00',
                'to'=>'22:00',
            ]
        );
        \App\WorkDay::create(
            [
                'name'=>'Duminica',
                'from'=>'9:00',
                'to'=>'22:00',
            ]
        );
    }
}
