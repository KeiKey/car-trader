<?php

namespace App\Http\Controllers;

use App\Models\Car\Vehicle;
use App\Models\Category\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        Category::query()->create(['name' => 'category_1']);
//        Category::query()->create(['name' => 'category_2']);
//        Category::query()->create(['name' => 'category_3']);
//        Category::query()->create(['name' => 'category_4']);
//        Category::query()->create(['name' => 'category_5']);
//        Category::query()->create(['name' => 'category_6']);
//        Category::query()->create(['name' => 'category_7']);
//
//        CategoryOption::query()->create(['name' => 'category_CategoryOption_1', 'category_id' => 1]);
//        CategoryOption::query()->create(['name' => 'category_CategoryOption_2', 'category_id' => 1]);
//        CategoryOption::query()->create(['name' => 'category_CategoryOption_3', 'category_id' => 2]);
//        CategoryOption::query()->create(['name' => 'category_CategoryOption_4', 'category_id' => 2]);
//        CategoryOption::query()->create(['name' => 'category_CategoryOption_5', 'category_id' => 3]);
//        CategoryOption::query()->create(['name' => 'category_CategoryOption_6', 'category_id' => 4]);
//        CategoryOption::query()->create(['name' => 'category_CategoryOption_7', 'category_id' => 1]);
        /** @var Vehicle $car */
        $car = Vehicle::query()->firstWhere('id',  10);
//        $car = Car::query()->create(['name' => 'car_1']);
//        $car->categoryOptions()->sync([1, 2, 3]);
        $category = Category::query()->with('categoryOptions.cars')->firstWhere('id', 1);
        dd($car->categoryOptions, $category);
        return view('home');
    }
}
