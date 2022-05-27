<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Kim Hoang',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Kim Long',
                'email' => 'admin123@gmail.com',
                'password' => bcrypt('123456'),
            ],

        ];
        \Illuminate\Support\Facades\DB::table('admin')->insert($data);
    }
}
