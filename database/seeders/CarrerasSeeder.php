<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carrera::create([
            'clave' => 'INNI',
            'carrera' => 'INGENIERIA INFORMATICA'
        ]);

        Carrera::create([
            'clave' => 'ICOM',
            'carrera' => 'INGENIERIA EN COMPUTACION'
        ]);
    }
}
