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
                'idnumber' => '20200001',
                'firstname'=>'Admin',
                'middlename'=>'The',
                'lastname'=>'Great',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birthdate' => '1996-03-05',
                'email'=>'admin@mail.com',
                'personnel_type'=>'admin',
                'password'=> bcrypt('123456'),
            ],
            [
                'idnumber' => '20200002',
                'firstname'=>'Michael',
                'middlename'=>'The',
                'lastname'=>'Mauro',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birthdate' => '1996-03-05',
                'email'=>'librarian@mail.com',
                'personnel_type'=>'librarian',
                'password'=> bcrypt('123456'),
            ],
            [
                'idnumber' => '20200003',
                'firstname'=>'Martin',
                'middlename'=>'The',
                'lastname'=>'Gaitera',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birthdate' => '1996-03-05',
                'email'=>'counselor@mail.com',
                'personnel_type'=>'counselor',
                'password'=> bcrypt('123456'),
            ],
            [
                'idnumber' => '20200004',
                'firstname'=>'Gibert',
                'middlename'=>'The',
                'lastname'=>'Go',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birthdate' => '1996-03-05',
                'email'=>'healthcare@mail.com',
                'personnel_type'=>'healthcare',
                'password'=> bcrypt('123456'),
            ],
            [
                'idnumber' => '20200005',
                'firstname'=>'Sean',
                'middlename'=>'The',
                'lastname'=>'Mantos',
                'address' => '123 Address to Heaven',
                'contact' => '123456789',
                'birthdate' => '1996-03-05',
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
