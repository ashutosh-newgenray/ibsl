<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $menus =  DB::table('submenus')->select('name','display_name')->get();
        foreach($menus as $menu){
            DB::table('permissions')->insert([
                ['name' => $menu->name.'-no-access', 'display_name' => $menu->display_name.' No Access'],
                ['name' => $menu->name.'-can-view', 'display_name' => $menu->display_name.' Can View'],
                ['name' => $menu->name.'-can-edit', 'display_name' => $menu->display_name.' Can Edit'],
                ['name' => $menu->name.'-can-create-new', 'display_name' => $menu->display_name.' Can Create New']
            ]);
        }
    }
}
