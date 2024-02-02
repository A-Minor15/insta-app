<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // represents the categories table

class CategorySeeder extends Seeder
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Note: category name should be unique (no Duplicates)
        $categories = [
            [
                'name' => 'Blog',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Plograming',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        $this->category->insert($categories);
    }
}
