<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::updateOrCreate(
            [
                "id" => 1,
                "email" => "admin@admin.admin",
                "name" => "admin"
            ], [
                "password" => "YouHaveToMoveForward",
                "is_admin" => 1
            ]
        );
    }
}
