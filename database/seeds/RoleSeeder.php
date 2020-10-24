<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin';
        $admin->save();


        $faculty = new Role();
        $faculty->name = 'Faculty';
        $faculty->slug = 'faculty';
        $faculty->save();


        $student = new Role();
        $student->name = 'Student';
        $student->slug = 'student';
        $student->save();
    }
}
