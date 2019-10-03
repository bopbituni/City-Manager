<?php

use App\City;
use Illuminate\Database\Seeder;

class CreateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->id = 5;
        $city->name = 'Hà Nội';
        $city->save();

        $city = new City();
        $city->id = 6;
        $city->name = 'Hồ Chí Minh';
        $city->save();

        $city = new City();
        $city->id = 7;
        $city->name = 'Hải Phòng';
        $city->save();

        $city = new City();
        $city->id = 8;
        $city->name = 'Hải Dương';
        $city->save();
    }
}
