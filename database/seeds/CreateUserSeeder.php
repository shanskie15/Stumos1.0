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
            ],
            [
                'firstname'=>'Michael',
                'middlename'=>'The',
                'lastname'=>'Mauro',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birth_date' => '1996-03-05',
                'email'=>'librarian@mail.com',
                'personnel_type'=>'librarian',
                'password'=> bcrypt('123456'),
            ],
            [
                'firstname'=>'Martin',
                'middlename'=>'The',
                'lastname'=>'Gaitera',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birth_date' => '1996-03-05',
                'email'=>'counselor@mail.com',
                'personnel_type'=>'counselor',
                'password'=> bcrypt('123456'),
            ],
            [
                'firstname'=>'Gibert',
                'middlename'=>'The',
                'lastname'=>'Go',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birth_date' => '1996-03-05',
                'email'=>'healthcare@mail.com',
                'personnel_type'=>'healthcareprofessional',
                'password'=> bcrypt('123456'),
            ],
            [
                'firstname'=>'Sean',
                'middlename'=>'The',
                'lastname'=>'Mantos',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birth_date' => '1996-03-05',
                'email'=>'teacher@mail.com',
                'personnel_type'=>'teacher',
                'password'=> bcrypt('123456'),
            ]

        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
