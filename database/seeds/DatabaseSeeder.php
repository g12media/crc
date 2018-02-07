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
            'username' => 'alain_anita',
            'password' => bcrypt('929rth'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Daniel y Erika Berrios',
            'lastName' => 'Alonso',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'danielyerika@gmail.com',
            'username' => 'daniel_erika',
            'password' => bcrypt('v1r7zi'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Laudjair y Sara',
            'lastName' => 'Guerra',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'laudjair_guerra@gmail.com',
            'username' => 'laudjair_sara',
            'password' => bcrypt('4sr2xl'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);
        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Rich y Manuela',
            'lastName' => 'Harding',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'rich_manuela@gmail.com',
            'username' => 'rich_manuela',
            'password' => bcrypt('bqu2nt'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);
        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Eliemerson y Johanna',
            'lastName' => 'Proença',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'eliemerson_johanna@gmail.com',
            'username' => 'eliemerson_johanna',
            'password' => bcrypt('9vfi5q'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);
        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'John y Angela',
            'lastName' => 'Espinosa',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'john_angela@gmail.com',
            'username' => 'john_angela',
            'password' => bcrypt('t733w9'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);
        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Luis y Janeth',
            'lastName' => 'Barrios',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'luis_janeth@gmail.com',
            'username' => 'luis_janeth',
            'password' => bcrypt('w6stfl'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Jorge y Margarita',
            'lastName' => 'Cataño',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'jorge_margarita@gmail.com',
            'username' => 'jorge_margarita',
            'password' => bcrypt('br520x'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Julian y Lorena',
            'lastName' => 'Gamba',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'julian_lorena@gmail.com',
            'username' => 'julian_lorena',
            'password' => bcrypt('83fgdc'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Orlando y Ruth',
            'lastName' => 'Castañeda',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'orlando_ruth@gmail.com',
            'username' => 'orlando_ruth',
            'password' => bcrypt('3swbda'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Alfredo y Perla Doris',
            'lastName' => 'Mora',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'alfredo_perla@gmail.com',
            'username' => 'alfredo_perla',
            'password' => bcrypt('28d781'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
            'name' => 'Fernando y Clara',
            'lastName' => 'Ramos',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'fernando_clara@gmail.com',
            'username' => 'fernando_clara',
            'password' => bcrypt('4rs2u1'),
            'level' => '12',
            'leaderPrincipal' => '1',
            'userId' => '1',
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'contactType' => 'ministerio',
              'name' => 'Raul y Lina',
            'lastName' => 'Ramos',
            'city' => 'Bogota',
            'phone' => '00000000',
            'email' => 'raul_lina@gmail.com',
            'username' => 'raul_lina',
            'password' => bcrypt('vdh4ff'),
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
