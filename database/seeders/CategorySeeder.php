<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use CreateCategoriesTable;

class CategorySeeder extends Seeder
{
    public function run()
    {
        CreateCategoriesTable::insert([
            ['name' => 'Makanan'],
            ['name' => 'Minuman'],
            ['name' => 'Bahan Pokok']
        ]);
    }
};
