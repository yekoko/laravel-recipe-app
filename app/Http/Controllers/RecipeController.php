<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $list = Recipe::with('ingredients')->get();
        
        return view('home', compact('list'));
    }

    public function view($id)
    {
        $recipe = Recipe::with('ingredients')->find($id);
        return view('detail', compact('recipe'));
    }
}
