<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_id');

        for ($i=0; $i < 100; $i++) { 
            $model = new Customer();
            $model->nama = $faker->name;
            $model->alamat = $faker->address;
            $model->tanggal_lahir = $faker->date();
            $model->longitude = random_int(10000, 999999);
            $model->latitude = random_int(10000, 999999);
            $model->customer_type_id = random_int(1, 10);
            $model->save();
        }
    }
}
