<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titlesEs = array('Oro', 'Plata', 'Bronce', 'Cuarto');
        for ($i = 0; $i <= 3; $i++) {
            Title::create([
                'name' => [
                    'es' => $titlesEs[$i],
                    'en' => null
                ],
                'created_by'=>'Admin'
            ]);
        }
    }
}
