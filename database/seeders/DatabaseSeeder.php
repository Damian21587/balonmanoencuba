<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermisoTableSeeder::class);
        $this->call(PermisoRolTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProvinciaTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(TitleTableSeeder::class);
    }
}
