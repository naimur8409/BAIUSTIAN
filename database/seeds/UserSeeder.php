<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $admin = Role::where('slug', 'admin')->first();
        $faculty = Role::where('slug', 'faculty')->first();
        $student = Role::where('slug', 'student')->first();

        $user1 =  new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@gmail.com';
        $user1->password = bcrypt('12345678');
        $user1->save();
        $user1->roles()->attach($admin);


        $user2 =  new User();
        $user2->name = 'Faculty';
        $user2->email = 'faculty@gmail.com';
        $user2->password = bcrypt('12345678');
        $user2->save();
        $user2->roles()->attach($faculty);


        $user3 =  new User();
        $user3->name = 'Student';
        $user3->email = 'student@gmail.com';
        $user3->password = bcrypt('12345678');
        $user3->save();
        $user3->roles()->attach($student);
    }
}
