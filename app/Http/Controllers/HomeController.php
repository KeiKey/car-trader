<?php

namespace App\Http\Controllers;

use App\Models\Vehicle\Vehicle;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home', ['vehicles' => Vehicle::query()->active()->paginate(10)]);
    }
}
