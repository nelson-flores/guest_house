<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {
        $post_tags = array(
            [
                'code'=>'admin',
                'name'=>'Administrador'
            ],
            [
                'code'=>'subscritor',
                'name'=>'Subscritor'
            ],
            [
                'code'=>'contributor',
                'name'=>'Contribuidor'
            ],
            [
                'code'=>'author',
                'name'=>'Autor'
            ],
            [
                'code'=>'editor',
                'name'=>'Editor'
            ],
        );
        foreach ($post_tags as $tag) {
            Role::create([
                'code' => $tag['code'],
                'name' => $tag['name'],
            ]);
        }

    }
}
