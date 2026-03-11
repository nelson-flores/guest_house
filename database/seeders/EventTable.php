<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventTable extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {
        Event::create([
            'name'=>'FENA 2026',
            'address'=>'Mavuco, Nampula',
            'description'=>'A Feira Económica de Nampula (FENA) é um evento anual que reúne empresas, investidores e público em geral para promover negócios, inovação e desenvolvimento econômico na região de Nampula, Moçambique.',
            'start_date'=> now(),
            'end_date'=> now(),
            'slug'=>"fena_2026",
            'edition_number'=> 7,
        ]);
    }
}
