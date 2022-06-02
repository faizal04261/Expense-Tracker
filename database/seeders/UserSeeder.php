<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use DB;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           
            [
                
                'username'  => 'faisal admin',
                'fullname'  => 'Faizal Pundaodaya',              
                'email'  => 'faisalpundaodaya@ymail.com',               
                'user_roleID'  => 1,
               'ModifiedByID'  => 1,
                'status'  => 1,
                'password'  => "123",
                'created_at'  => now(),
                'updated_at'  => now(),                
            ]
        ]);
    }
}
