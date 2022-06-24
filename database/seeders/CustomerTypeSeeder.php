<?php

namespace Database\Seeders;

use App\Models\CustomerType;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_id');

        for ($i=0; $i < 10; $i++) { 
            $model = new CustomerType();
            $model->name = $faker->jobTitle;
            $model->keterangan = $faker->text();
            $model->save();
        }
    }
}
