<?php

namespace Database\Seeders;


use App\Models\Customer;
use Illuminate\Database\Seeder;



class NewCustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name'=>'Dolores',
            'surname'=>'García',
            'user_id'=> 3,

        ]);

        Customer::create([
            'name'=>'Luka',
            'surname'=>'Modric',
            'user_id'=> 4,

        ]);
    }
}
