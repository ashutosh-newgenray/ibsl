<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('roles')->insert([
            ['name' => 'admin','display_name' => 'Admin','description' => 'Super Admin','created_at' => \Carbon\Carbon::now()->toDateTimeString(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['name' => 'registration','display_name' => 'Registration','description' => 'Registration','created_at' => \Carbon\Carbon::now()->toDateTimeString(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['name' => 'accounts','display_name' => 'Accounts','description' => 'Registration','created_at' => \Carbon\Carbon::now()->toDateTimeString(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['name' => 'examiner','display_name' => 'Examiner','description' => 'Examiner','created_at' => \Carbon\Carbon::now()->toDateTimeString(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]
        ]);

    }
}
