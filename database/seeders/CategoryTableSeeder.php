<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => 'GA',
            'category_slug' => 'ga',
        ]);

        $category = Category::create([
            'name' => 'Geography',
            'category_slug' => 'geography',
        ]);

        $category = Category::create([
            'name' => 'Topography',
            'category_slug' => 'topography',
        ]);

        $category = Category::create([
            'name' => 'Demography',
            'category_slug' => 'demography',
        ]);

        $category = Category::create([
            'name' => 'Rivers',
            'category_slug' => 'rivers',
        ]);

        $category = Category::create([
            'name' => 'Land',
            'category_slug' => 'land',
        ]);

        $category = Category::create([
            'name' => 'CLS',
            'category_slug' => 'cls',
        ]);

        $category = Category::create([
            'name' => 'Trans Frontier',
            'category_slug' => 'trans_frontier',
        ]);

        $category = Category::create([
            'name' => 'Militry',
            'category_slug' => 'militry',
        ]);

        $category = Category::create([
            'name' => 'Remaining Commands',
            'category_slug' => 'remaining_commands',
        ]);
    }
}
