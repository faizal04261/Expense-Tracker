<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_roles')->insert([
            [
                'name'  => 'Administrator',
                'description'  => 'For Administrator',
                'ModifiedByID'  => '1',
                'statusID'  => '1',
                'created_at'  => now(),
                'updated_at'  => now(),                  
            ],
            [
                'name'  => 'User',
                'description'  => 'For User',
                'ModifiedByID'  => '1',
                'statusID'  => '1',
                'created_at'  => now(),
                'updated_at'  => now(),                  
            ]
        ]);
        
    }
}
