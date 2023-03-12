<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = "Nightsheep";
        $user->email = "andrew9416@live.it";
        $user->password = bcrypt('Andreagar94@');

        $user->save();
    }
}
