<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->client_id = rand(1, 100);
            $project->name = $faker->company;
            $project->description = $faker->text(300);
            $project->statuses = rand(0, 4);

            $project->save();
        }
    }
}
