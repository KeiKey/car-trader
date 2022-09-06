<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->updateOrCreate(['name' => 'Typology']);
        Category::query()->updateOrCreate(['name' => 'Vehicle condition']);
        Category::query()->updateOrCreate(['name' => 'Fuel type']);
        Category::query()->updateOrCreate(['name' => 'Transmission']);
        Category::query()->updateOrCreate(['name' => 'Furnishing']);
    }
}
