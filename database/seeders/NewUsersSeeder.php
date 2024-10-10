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


class NewUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'customer2@correo.com',
            'status_id'=> 1,
            'profile_id'=> 1,
            'password'=> Hash::make('12345678'),
        ]);

        User::create([
            'email'=>'customer3@correo.com',
            'status_id'=> 1,
            'profile_id'=> 2,
            'password'=> Hash::make('12345678'),
        ]);
    }
}
