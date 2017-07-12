<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('local')->put('flag.php', 'flag{rock_and_roll_fellow_hacker_rock_and_roll}');
    }
}
