<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positionsEs = array('Extremo', 'Pivote', 'Interior','Portero');
        for ($i = 0; $i <= 2; $i++) {
            Position::create([
                'name' => [
                    'es' => $positionsEs[$i],
                    'en' => null
                ],
                'created_by'=>'Admin'
            ]);
        }
    }
}
