<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Facades\DB;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->address = "jakarta";
        $administrator->phone = "082389053574";
        $administrator->avatar = "";
        $administrator->email = "administrator@larashop.test";
        $administrator->role = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("larashop");

        $administrator->save();
    }
}
