<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'userType' => 'super-admin',
            'contactType' => 'ministerio',
            'name' => 'Cesar',
            'lastName' => 'Castellanos',
            'city' => 'Bogota',
            'phone' => '0000000',
            'email' => 'fabiing10@gmail.com',
            'username' => 'cesarcastellanos',
            'password' => bcrypt('mision144'),
            'level' => '1',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);
        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Alain - Anita',
            'lastName' => 'Alonso',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'alainyanita@gmail.com',
            'username' => 'alain',
            'password' => bcrypt('alain@2017'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('Roles')->insert([
            'name' => 'Propietario',
        ]);
        DB::table('Roles')->insert([
            'name' => 'arrendatario',
        ]);
        DB::table('Roles')->insert([
            'name' => 'red',
        ]);
    }
}
