<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'title' => 'O que é o CEP Nampula?',
                'description' => 'O Conselho Empresarial Provincial (CEP) de Nampula é a representação provincial da CTA – Confederação das Associações Económicas de Moçambique. O CEP trabalha para promover um ambiente de negócios favorável, representando os interesses do sector privado junto das instituições públicas e promovendo o desenvolvimento empresarial na província.',
                'created_at' => now(),
            ],
            [
                'title' => 'Quem pode tornar-se membro do CEP?',
                'description' => 'Podem tornar-se membros do CEP empresas, associações empresariais, cooperativas e empresários individuais que operam na província de Nampula e que estejam interessados em participar no desenvolvimento do sector privado.',
                'created_at' => now(),
            ],
            [
                'title' => 'Quais são os benefícios de ser membro?',
                'description' => 'Os membros do CEP beneficiam de representação institucional, acesso a eventos empresariais, participação em fóruns de diálogo público-privado, networking com outros empresários e acesso a informações relevantes para o desenvolvimento dos seus negócios.',
                'created_at' => now(),
            ],
            [
                'title' => 'Como posso tornar-me membro?',
                'description' => 'Para se tornar membro do CEP Nampula, deve preencher o formulário de adesão disponível no site ou entrar em contacto com o secretariado do CEP. Após a submissão da candidatura, a mesma será analisada conforme os regulamentos internos.',
                'created_at' => now(),
            ],
            [
                'title' => 'O CEP organiza eventos para empresários?',
                'description' => 'Sim. O CEP organiza regularmente seminários, conferências, workshops e encontros empresariais com o objectivo de promover networking, partilha de conhecimento e discussão de temas relevantes para o ambiente de negócios.',
                'created_at' => now(),
            ],
            [
                'title' => 'Qual é a relação entre o CEP e a CTA?',
                'description' => 'O CEP é a representação provincial da CTA. A CTA coordena a nível nacional as associações empresariais e conselhos provinciais, enquanto o CEP actua localmente na defesa dos interesses do sector privado.',
                'created_at' => now(),
            ],
        ]);
    }
}