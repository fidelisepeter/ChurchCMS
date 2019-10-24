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
        $user = new User;
        $user->name = 'Jemimah';
        $user->email = 'jemimah@gmail.com';
        $user->mobile = '0248562578';
        $user->password = '123456';
        $user->address = 'Kotei Subway Surfers';
        $user->bday = '1993-02-01';
        $user->save();
    }
}
