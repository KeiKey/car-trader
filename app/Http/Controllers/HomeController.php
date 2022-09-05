<?php

namespace App\Http\Controllers;

use App\Models\Vehicle\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('home', [
            'vehicles' => Vehicle::query()->forSearch($request->get('q'))->active()->paginate(10)
        ]);
    }
}
