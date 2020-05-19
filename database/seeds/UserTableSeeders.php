<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Humberto";
        $user->email="admin@gmail.com";
        $user->password = bcrypt("contraseña123");
        $user->save();
    }
}
