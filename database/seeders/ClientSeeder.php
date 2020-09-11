<?php

namespace Database\Seeders;

use App\Models\Client;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
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
            $client = new Client();
            $client->first_name = $faker->firstName;
            $client->last_name = $faker->lastName;
            $client->email = $faker->email;
            $client->password = bcrypt('demo');

            $client->save();
        }
    }
}
