<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Wypelnianie
        $user = new \App\User();
        $user->typ_kontaId = 1;
        $user->imie = 'Student';
        $user->nazwisko = 'Student';
        $user->pesel = '987656457';
        $user->email = 'stud@student.edu.pl';
        $user->name = 'stud';
        $user->password = bcrypt('stud');
        $user->remember_token = NULL;
        $user->save();

    }
}
