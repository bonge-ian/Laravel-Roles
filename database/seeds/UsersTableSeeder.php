<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        // truncate users table
        User::truncate();

        // truncate role_user
        DB::table('role_user')->truncate();

        // get some roles
        $userRole = Role::where('name', 'user')->first();
        $employeeRole = Role::where('name', 'employee')->first();
        $hrRole = Role::where('name', 'hr')->first();
        $adminRole = Role::where('name', 'admin')->first();

        // create users
        $user = User::create(
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user'),
            ]
        );
        $employee = User::create(
            [
                'name' => 'employee',
                'email' => 'employee@employee.com',
                'email_verified_at' => now(),
                'password' => bcrypt('employee'),
            ]
        );
        $hr = User::create(
            [
                'name' => 'hr',
                'email' => 'hr@hr.com',
                'email_verified_at' => now(),
                'password' => bcrypt('hr'),
            ]
        );
        $admin = User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin'),
            ]
        );

        // attach various roles
        $user->roles()->attach($userRole);
        $employee->roles()->attach($employeeRole);
        $hr->roles()->attach($hrRole);
        $admin->roles()->attach($adminRole);

        // instantiate fake users
        factory(App\User::class, 26)->create();
    }
}
