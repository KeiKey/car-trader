<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return View
     */
    public function index(): View
    {
        return view('users.index', ['users' => User::query()->with('roles')->paginate(10)]);
    }
}
