<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            ['marca' => 'Toyota', 'modelo' => 'Corolla', 'anio' => 2020, 'color' => 'Rojo', 'precio' => 20000.00],
            ['marca' => 'Honda', 'modelo' => 'Civic', 'anio' => 2021, 'color' => 'Azul', 'precio' => 22000.00],
            ['marca' => 'Ford', 'modelo' => 'Focus', 'anio' => 2019, 'color' => 'Negro', 'precio' => 18000.00],
            ['marca' => 'BMW', 'modelo' => 'Serie 3', 'anio' => 2022, 'color' => 'Blanco', 'precio' => 35000.00],
            ['marca' => 'Audi', 'modelo' => 'A4', 'anio' => 2022, 'color' => 'Gris', 'precio' => 36000.00],
            ['marca' => 'Mercedes-Benz', 'modelo' => 'Clase C', 'anio' => 2021, 'color' => 'Negro', 'precio' => 37000.00],
            ['marca' => 'Volkswagen', 'modelo' => 'Golf', 'anio' => 2020, 'color' => 'Azul', 'precio' => 20000.00],
            ['marca' => 'Mazda', 'modelo' => '3', 'anio' => 2018, 'color' => 'Rojo', 'precio' => 18000.00],
            ['marca' => 'Nissan', 'modelo' => 'Sentra', 'anio' => 2019, 'color' => 'Negro', 'precio' => 17000.00],
        ];

        DB::table('coches')->insert($cars);
    }
}