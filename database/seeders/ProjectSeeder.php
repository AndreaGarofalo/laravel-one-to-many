<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 5; $i++) {
            $project = new Project();
            
            $project->title = $faker->text(20);
            $project->description = $faker->paragraphs(2, true);
            // $project->screen = $faker->imageUrl(250, 250);
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
