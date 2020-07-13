<?php

use Illuminate\Database\Seeder;
use App\User;
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
            'name'=>'diaa',
            'email'=>'diaanagib3@gmail.com',
            'password'=>bcrypt('336933')
        ]);
    }
}
