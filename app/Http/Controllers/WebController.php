<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;

class WebController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::orderBy('created_at','desc')->take(6)->get();
        $categories = Category::all();

        $category_names = Category::pluck('category_name');

        return view('web.index', compact('restaurants','categories','category_names'));
    }
}
