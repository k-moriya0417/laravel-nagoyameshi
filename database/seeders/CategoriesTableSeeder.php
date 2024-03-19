<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food_categories = [
            '和食','イタリア料理','フランス料理','居酒屋','焼肉','パスタ','ハンバーガー','ランチ','ディナー'
        ];

        foreach($food_categories as $food_category) {
            Category::create([
                'category_name' => $food_category,
                'restaurant_id' => 1
            ]);
        }
    }
}
