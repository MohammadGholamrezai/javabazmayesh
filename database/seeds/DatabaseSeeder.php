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
        DB::table('languages')->insert([
            0=>['name' => 'English', 'iso_code' => 'en', 'language_code' => 'en-US', 'date_format' => 'Y-m-d',
                'date_format_full' => 'Y-m-d H:i:s', 'active' => 1, 'is_rtl' => 0, 'status' => 1]

            ,
            1=>['name' => 'Farsi', 'iso_code' => 'fa', 'language_code' => 'fa', 'date_format' => 'Y-m-d',
                'date_format_full' => 'Y-m-d H:i:s', 'active' => 1, 'is_rtl' => 1, 'status' => 1]
        ]);
    }
}
