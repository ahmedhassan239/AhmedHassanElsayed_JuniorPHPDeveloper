<?php

use Illuminate\Database\Seeder;

class channelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            'channel_name' => 'Facebook',
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Twitter',
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Instagram',
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Youtube',
        ]);
    }
}
