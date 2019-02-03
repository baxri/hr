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

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'hr',
            'email' => 'hr@hr.com',
            'password' => bcrypt('hr123456'),
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

        DB::table('model_has_roles')->insert([
            'role_id' => 2,
            'model_type' => 'App\Models\BackpackUser',
            'model_id' => 2,
        ]);

        DB::table('examples_tables')->insert([
            'file' => 'examples/stores-example.csv',
            'name' => 'stores',
        ]);

        DB::table('examples_tables')->insert([
            'file' => 'examples/employees-example.csv',
            'name' => 'employees',
        ]);


        // Passport
        DB::table('oauth_clients')->insert([
            'id' => 1,
            'name' => 'HR WEB',
            'secret' => 'J2UcxP5OJnOvcxZbCKxZrblJyiJxoamyxyoEPBwN',
            'redirect' => 'http://localhost',
            'personal_access_client' => 1,
            'password_client' => 1,
            'revoked' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
