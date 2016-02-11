<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Seed Menus
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('menus')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        /*
         * Menu - Courses
         */
        $id = DB::table('menus')->insertGetId(['name' => 'courses','display_name' => 'Courses','position' => 1]);
            DB::table('submenus')->insert([
                ['menu_id'=> $id ,'name' => 'courses','display_name' => 'Courses','position' => 1],
                ['menu_id'=> $id ,'name' => 'registered-learners','display_name' => 'Registered Learners','position' => 2],
                ['menu_id'=> $id ,'name' => 'course-certificates','display_name' => 'Course Certificates','position' => 3],
                ['menu_id'=> $id ,'name' => 'unit-assessment','display_name' => 'Unit Assessment','position' => 4],
                ['menu_id'=> $id ,'name' => 'mark-unit-assessment','display_name' => 'Mark_Unit Assessment','position' => 5],
                ['menu_id'=> $id ,'name' => 'unit-certificates','display_name' => 'Unit Certificates','position' => 6],
                ['menu_id'=> $id ,'name' => 'unit-resit','display_name' => 'Unit Resit','position' => 7],
                ['menu_id'=> $id ,'name' => 'mark-unit-resit','display_name' => 'Mark Unit Resit','position' => 8],
                ['menu_id'=> $id ,'name' => 'examiners','display_name' => 'Examiners','position' => 9]
            ]);

        /*
         * Menu - Centres
         */

        $id = DB::table('menus')->insertGetId(['name' => 'centres','display_name' => 'Centres','position' => 2]);
            DB::table('submenus')->insert([
                ['menu_id'=> $id ,'name' => 'centres','display_name' => 'Centres','position' => 1],
                ['menu_id'=> $id ,'name' => 'regions','display_name' => 'Regions','position' => 2],
            ]);

        /*
         * Menu - Learners
         */

        $id = DB::table('menus')->insertGetId(['name' => 'learners','display_name' => 'Learners','position' => 3]);
        DB::table('submenus')->insert([
            ['menu_id'=> $id ,'name' => 'learners','display_name' => 'Learners','position' => 1],
            ['menu_id'=> $id ,'name' => 'ethnic-codes','display_name' => 'Ethnic Codes','position' => 2],
        ]);

        /*
         * Menu - Qualifications
         */

        $id = DB::table('menus')->insertGetId(['name' => 'qualifications','display_name' => 'Qualifications','position' => 4]);
        DB::table('submenus')->insert([
            ['menu_id'=> $id ,'name' => 'qualifications','display_name' => 'Qualifications','position' => 1],
            ['menu_id'=> $id ,'name' => 'qualifications-statistics','display_name' => 'Qualifications Statistics','position' => 2],
            ['menu_id'=> $id ,'name' => 'qualifications-units','display_name' => 'Qualifications Units','position' => 3],
            ['menu_id'=> $id ,'name' => 'media','display_name' => 'Media','position' => 4],
            ['menu_id'=> $id ,'name' => 'signers','display_name' => 'Signers','position' => 5],
            ['menu_id'=> $id ,'name' => 'sign-areas','display_name' => 'Sign Areas','position' => 6],
        ]);

        /*
         * Menu - Admin
         */

        $id = DB::table('menus')->insertGetId(['name' => 'admin','display_name' => 'Admin','position' => 5]);
        DB::table('submenus')->insert([
            ['menu_id'=> $id ,'name' => 'users','display_name' => 'Users','position' => 1],
            ['menu_id'=> $id ,'name' => 'roles','display_name' => 'Roles','position' => 2],
            ['menu_id'=> $id ,'name' => 'change-password','display_name' => 'Change Password','position' => 3],
            ['menu_id'=> $id ,'name' => 'update-menu-permissions','display_name' => 'Update Menu Permissions','position' => 4]
        ]);


    }
}
