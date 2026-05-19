<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Teknologi Informasi',
                'slug' => 'teknologi-informasi',
                'description' => 'Jurnal tentang teknologi informasi dan sistem komputer',
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'description' => 'Jurnal tentang pendidikan dan pembelajaran',
            ],
            [
                'name' => 'Ekonomi',
                'slug' => 'ekonomi',
                'description' => 'Jurnal tentang ekonomi dan bisnis',
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'description' => 'Jurnal tentang kesehatan dan kedokteran',
            ],
            [
                'name' => 'Teknik',
                'slug' => 'teknik',
                'description' => 'Jurnal tentang teknik dan rekayasa',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
