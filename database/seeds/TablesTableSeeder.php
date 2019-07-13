<?php

use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Table::query()->truncate();
        //
        \App\Table::create(
            [
                'name'=>'A',
                'seats'=> 4
            ]
        );
        \App\Table::create(
            ['name'=>'B',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'C',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'D',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'E',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'F',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'G',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'H',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'I',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'J',
                'seats'=> 4]
        );
        \App\Table::create(
            ['name'=>'K',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'L',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'M',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'N',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'O',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'P',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'Q',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'R',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'S',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'T',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'U',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'V',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'W',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'X',
                'seats'=> 2]
        );
        \App\Table::create(
            ['name'=>'Y',
                'seats'=> 2]
        );
    }
}
