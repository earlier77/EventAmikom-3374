<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Partner;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $partners = Partner::all();
        return view('welcome', compact('categories', 'partners'));
    }
}
