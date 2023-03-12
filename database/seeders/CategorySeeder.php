<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $labels = ['FrontEnd', 'BackEnd', 'UI/UX', 'Design']; 

        foreach($labels as $label){
            $category = new Category();
            $category->label = $label;
            $category->color = $faker->hexColor();
            $category->save();
        }
    }
}
