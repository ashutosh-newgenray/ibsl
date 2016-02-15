<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permission_role')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $role =  DB::table('roles')->where('name','admin')->pluck('id');
        $permission =  DB::table('permissions')->where('name','update-menu-permissions-can-edit')->pluck('id');
        DB::table('permission_role')->insert(array('permission_id' => $permission[0], 'role_id' => $role[0]));
        DB::table('permission_role')->insert(array('permission_id' => 38, 'role_id' => $role[0]));
        DB::table('permission_role')->insert(array('permission_id' => 39, 'role_id' => $role[0]));
        DB::table('permission_role')->insert(array('permission_id' => 40, 'role_id' => $role[0]));
    }
}
