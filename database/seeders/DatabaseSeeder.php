<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('empresas')->insert([
            ['nombre' => 'Iberdrola'],
            ['nombre' => 'Inditex'],
            ['nombre' => 'Santander'],
            ['nombre' => 'BBVA'],
            ['nombre' => 'Naturgy'],
            ['nombre' => 'Cellnex'],
            ['nombre' => 'Caixabank'],
            ['nombre' => 'Telefonica'],
            ['nombre' => 'Repsol'],
            ['nombre' => 'Ferrovial']
        ]);
        $fecha = Carbon::today('Europe/Madrid');
        $fecha->subYears(1);
        $empresas = Empresa::all();
        while(Carbon::now('Europe/Madrid')->gt($fecha)){
            foreach($empresas as $empresa){
                $stock = new Stock;
                $stock->empresa_id = $empresa->id;
                $stock->fecha = $fecha->toDateTimeString();
                ($empresa->stock) ? 
                $stock->valor = $empresa->stock->valor*(mt_rand(5,15)/10)
                :
                $stock->valor = (mt_rand(40,200)/10);
                $stock->save();
            }
            $fecha->addDay();
        }
    }
}
