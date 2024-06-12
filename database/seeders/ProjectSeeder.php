<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Technology;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all(); //collection con vari metodi (guardare documentazione)
        $ids = $types->pluck('id')->all(); //array di id

        $technology_ids = Technology::all()->pluck('id')->all(); //array con id delle tecnologie
        // var_dump($technology_ids);
        //
        for($i = 0; $i < 50; $i++){
            $project = new Project();

            $title = $faker->sentence(6);
            $project->title = $title;
            $project->slug = Str::slug($title);
            $project->content = $faker->optional()->text(500);
            $project->link = $faker->url();
            $project->type_id = $faker->optional()->randomElement($ids);

            $project->save();

            $random_technology_ids = $faker->randomElements($technology_ids, null);

            $project->technologies()->attach($random_technology_ids);
        }
    }
}
