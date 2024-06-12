<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
// use Database\Seeders\TechnologySeeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $technologies = ['React', 'PHP', 'Three.js', 'JavaScript'];

        foreach($technologies as $technology_name) {
            $new_technology = new Technology();
            $new_technology->name = $technology_name;
            $new_technology->slug = Str::slug($technology_name);

            $new_technology->save();
        }
    }
}
