<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personas; // Asegúrate de importar el modelo

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo
        Personas::create([
            'fullName' => 'SUPERADMIN',
            'phone' => '987654321',
            'cedula' => 12345679,
            'direction' => 'test dir1',
            'date' => '1990-02-21',
        ]);

        Personas::create([
            'fullName' => 'María Gómez',
            'phone' => '987654321',
            'cedula' => 12345678,
            'direction' => 'test dir',
            'date' => '1290-02-21',
            'earnings_month' => 9999
        ]);

        /*Personas::create([
            'fullName' => 'Pablo Gómez',
            'phone' => '987654321',
        ]);


        Personas::create([
            'fullName' => 'JUan Gómez',
            'phone' => '987654321',
        ]);



        Personas::create([
            'fullName' => 'Valeria Gómez',
            'phone' => '987654321',
        ]);


        Personas::create([
            'fullName' => 'Jenifer Gómez',
            'phone' => '987654321',
        ]);
*/

    }
}