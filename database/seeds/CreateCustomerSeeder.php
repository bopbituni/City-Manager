<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CreateCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->id = 1;
        $customer->name = "customer 1";
        $customer->phone = "2018-09-26";
        $customer->email = "customer1@codegym.vn";
        $customer->city_id = 5;
        $customer->save();
        $customer = new Customer();
        $customer->id = 2;
        $customer->name = "customer 2";
        $customer->phone = "2018-09-26";
        $customer->email = "customer2@codegym.vn";
        $customer->city_id = 5;
        $customer->save();
        $customer = new Customer();
        $customer->id = 3;
        $customer->name = "customer 3";
        $customer->phone = "2018-09-26";
        $customer->email = "customer3@codegym.vn";
        $customer->city_id = 6;
        $customer->save();
    }
}
