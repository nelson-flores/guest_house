<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Taxonomy;

class TaxonomyTable extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {
        $post_tags = ['FENA', 'Feira', 'Nampula', 'Moçambique', 'Economia', 'Negócios', 'Inovação', 'Desenvolvimento'];
        foreach ($post_tags as $tag) {
            Taxonomy::create([
                'name' => $tag,
                'slug' => str()->slug($tag),
                'taxonomy_type' => 'tag',
            ]);
        }
        $post_categories = ['Eventos', 'Notícias', 'Destaques', 'Entrevistas', 'Análises'];
        foreach ($post_categories as $category) {
            Taxonomy::create([
                'name' => $category,
                'slug' => str()->slug($category),
                'taxonomy_type' => 'category',
            ]);
        }
    }
}
