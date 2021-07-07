<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','kcsandesh6969@gmail.com')->first();

        if(!$user){
            User::create([
                'name'=>'Sandesh Bahak K.C.',
                'email'=>'kcsandesh6969@gmail.com',
                'role'=>'admin',
                'password'=>Hash::make('password')
            ]);
        }
    }
}
