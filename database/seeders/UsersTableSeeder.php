<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Hobby;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'correo@correo.com',
            'status_id'=> 1,
            'profile_id'=> 1,
            'password'=> Hash::make('12345678'),
        ]);

        $hobbies = ['teatro', 'cine', 'fútbol', 'pádel', 'baile', 'tocar instrumento', 'senderismo', 'lectura', 'yoga', 'manualidades'];

        foreach($hobbies as $hobby)

        Hobby::create([
            'name' => $hobby
        ]);


        Customer::create([
            'name'=>'Marcos',
            'surname'=>'Salado',
            'user_id'=> 1,

        ]);

        DB::table('customers_hobbies')->insert([
            [
                'customer_id' => 1,
                'hobby_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 1,
                'hobby_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],  [
                'customer_id' => 1,
                'hobby_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}
