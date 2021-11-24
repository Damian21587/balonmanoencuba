<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::generateFor('roles','Roles','Admin');
        Permission::generateFor('users','Usuarios','Admin');
        Permission::generateFor('contactos', 'Informacion de Contacto', 'Admin');
        Permission::generateFor('quienes-somos', 'Quienes Somos', 'Admin');
        Permission::generateFor('noticias', 'Noticias', 'Admin');
        Permission::generateFor('jugadores', 'Jugadores', 'Admin');
        Permission::generateFor('redes-sociales', 'Jugadores', 'Admin');

        //******Nomencladores*********
        Permission::generateFor('posiciones', 'Tipos de Posiciones', 'Admin');
        Permission::generateFor('titulos', 'Titulos', 'Admin');
        Permission::generateFor('provincias', 'Provincias', 'Admin');
    }
}
