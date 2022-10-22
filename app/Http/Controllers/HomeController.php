<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::all();
        return Inertia::render('Home/index', ["projects" => $categories]);
    }
}
