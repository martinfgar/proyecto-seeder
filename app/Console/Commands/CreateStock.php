<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Empresa;
use App\Models\Stock;

class CreateStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stocks:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una entrada de valor de stock para todas las empresas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $six_months = \Carbon\Carbon::now();
        $six_months->subMonths(6);
        $now = \Carbon\Carbon::now();
        $function_period = $now->valueOf() - $six_months->valueOf(); 
        $wave_amplitude = 20;
        $empresas = Empresa::all();
        foreach($empresas as $empresa){
            $stock = new Stock;
            $stock->empresa_id = $empresa->id;
            $value = mt_rand(0,10)/10+(sin($now->valueOf()/$function_period*pi()+ mt_rand(-2,2)/10)**2)*$wave_amplitude;
            $stock->valor = $value;
            $stock->save();
        }
        return Command::SUCCESS;
    }
}
