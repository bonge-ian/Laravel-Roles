<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate db
        Role::truncate();

        $roles = [
            ['name' => 'user', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'employee', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'hr', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()]
        ];
        // create new roles
        Role::insert($roles);
    }
}
