<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = User::create([
            'name'=>'Elmer',
            'email'=>'mejia_huiza@hotmail.com',
            'password'=>Hash::make('mh11066*'),
            'url'=>'wwww.huiza.com',
        ]);

        $user->perfil()->create();

        $user2 = User::create([
            'name'=>'Huiza',
            'email'=>'mejiaelmer1993@gmail.com',
            'password'=>Hash::make('mh11066*'),
            'url'=>'wwww.huiza.com',
        ]);

        $user2->perfil()->create();
    }
}
