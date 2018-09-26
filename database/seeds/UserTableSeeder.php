<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $roleAdmin  = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@tester.com';
        $admin->password = bcrypt('weakpassword');
        $admin->save();
        $admin->roles()->attach($roleAdmin);

        $ordinaryAdmin  = Role::where('name', 'ordinary')->first();

        $admin = new User();
        $admin->name = 'Ordinary';
        $admin->email = 'ordinary@tester.com';
        $admin->password = bcrypt('veryweakpassword');
        $admin->save();
        $admin->roles()->attach($ordinaryAdmin);
    }
}
