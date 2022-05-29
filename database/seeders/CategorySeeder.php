<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
        
    }

    public function getData() {

        $data = [];

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++)
        {
            $data[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100)
            ];
        }

        return $data;
    }
}
