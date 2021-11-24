<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::firstOrCreate(['name' => 'Pinar del Río', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Artemisa', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'La Habana', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Mayabeque', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Matanzas', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Cienfuegos', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Villa Clara', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Sancti Spíritus', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Ciego de Ávila', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Camagüey', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Las Tunas', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Granma', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Holguín', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Santiago de Cuba', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Guantánamo', 'created_by'=>'Admin']);
        Province::firstOrCreate(['name' => 'Municipio Especial Isla de la Juventud', 'created_by'=>'Admin']);
    }
}
