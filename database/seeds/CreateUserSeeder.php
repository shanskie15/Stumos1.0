<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'firstname'=>'Admin',
                'middlename'=>'The',
                'lastname'=>'Great',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birth_date' => '1996-03-05',
                'email'=>'admin@mail.com',
                'personnel_type'=>'admin',
                'password'=> bcrypt('123456'),
            ]
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
