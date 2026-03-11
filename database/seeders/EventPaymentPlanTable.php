<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventPaymentPlan;

class EventPaymentPlanTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         
        Micro 5 mil meticais (Stand 4,5m2) Exposição Venda
        Pequena 10 mil meticais (Stand 4,5m2)
        Média 50 mil meticais (Stand 9m2)
        Grande 100 mil meticais (Stans 18m2)
        Empresas Estrangeiras 2.000 USD (Stans 18m2)
        Instituição pública 25 mil meticais (Stans 9m2)
        Sala de Conferencias com capacidade de 100 pessoas 25 mil meticais (por hora)
        **/

        $plans = [  
            [
                'event_id' => 1,
                'name' => 'Micro(Stand 4,5m2) - Exposição Venda',
                'participant_type' => 'exhibitor',
                'company_sizetype' => 'micro',
                'price' => 5000
            ],
            [
                'event_id' => 1,
                'name' => 'Pequena (Stand 4,5m2)',
                'participant_type' => 'exhibitor',
                'company_sizetype' => 'small',
                'price' => 10000
            ],
            [
                'event_id' => 1,
                'name' => 'Média (Stand 9m2)',
                'participant_type' => 'exhibitor',
                'company_sizetype' => 'medium',
                'price' => 50000
            ],
            [
                'event_id' => 1,
                'name' => 'Grande (Stand 18m2)',
                'participant_type' => 'exhibitor',
                'company_sizetype' => 'large',
                'price' => 100000
            ],
            [
                'event_id' => 1,
                'name' => 'Empresas Estrangeiras (Stand 18m2)',
                'participant_type' => 'exhibitor',
                'company_sizetype' => 'large',
                'price' => 2000
            ],
            [
                'event_id' => 1,
                'name' => 'Instituição pública (Stand 9m2)',
                'participant_type' => 'exhibitor',
                'company_sizetype' => 'large',
                'price' => 25000
            ],
            [
                'event_id' => 1,
                'name' => "Sala de Conferencias com capacidade de 100 pessoas (por hora)",
                'participant_type' => "exhibitor",
                "company_sizetype" => 'large',
                "price" => 25000
            ]
        ];


        foreach ($plans as $plan) {
            EventPaymentPlan::create($plan);
        }
    }
}
