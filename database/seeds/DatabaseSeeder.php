<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@hr.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'ADMIN',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'HR',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\BackpackUser',
            'model_id' => 1,
        ]);


        // $this->call(UsersTableSeeder::class);
    }
}
