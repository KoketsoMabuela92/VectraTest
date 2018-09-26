<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_manager = new Role();
        $role_manager->name = 'admin';
        $role_manager->description = 'An Admin User';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'ordinary';
        $role_manager->description = 'An Ordinary User';
        $role_manager->save();
    }
}
