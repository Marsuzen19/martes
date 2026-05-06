<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Para insertar datos de prueba  automaticamente
        Career::create(['name'=>'Desarrollo de Software']);
        Career::create(['name'=>'Diseño Gráfico']);
        Career::create(['name'=>'Administración Industrial']);
        Career::create(['name'=>'Administración de Empresas']);
        Career::create(['name'=>'Ingenieria de Sistemas']);
        Career::create(['name'=>'Ingenieria Civil']);
        Career::create(['name'=>'Ingenieria de Minas']);
        Career::create(['name'=>'Contabilidad']);
        Career::create(['name'=>'Mecanica Automotriz']);
        Career::create(['name'=>'Psicologia']);
    }
}
