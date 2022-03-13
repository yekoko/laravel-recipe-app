<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;

class DashboardController extends Controller
{
    public function index()
    {
        $list = Recipe::with('ingredients')->get();
        
        return view('admin.recipes.list', compact('list'));
    }

    public function create()
    {
        return view('admin.recipes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'thumbnail' => 'required'
        ]);
        
        $newRecipe = new Recipe();
        $newRecipe->name = $request->name;
        $newRecipe->thumbnail = $request->thumbnail;
        $newRecipe->description = $request->description;
        $newRecipe->save();

        foreach($request->ingredients as $ingredient) {
            $recipeIngredient = new Ingredient();
            $recipeIngredient->recipe_id = $newRecipe->id;
            $recipeIngredient->ingredent_name = $ingredient;
            $recipeIngredient->save();
        }

        return redirect()->route('admin.recipe.list');
    }

    public function show($id) 
    {
        $recipe = Recipe::with('ingredients')->find($id);
        return view('admin.recipes.show', compact('recipe'));
    }

    public function edit($id)
    {
        $recipe = Recipe::with('ingredients')->find($id);
        return view('admin.recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'thumbnail' => 'required'
        ]);
        
        $newRecipe = Recipe::find($id);
        $newRecipe->name = $request->name;
        $newRecipe->thumbnail = $request->thumbnail;
        $newRecipe->description = $request->description;
        $newRecipe->save();

        Ingredient::where('recipe_id', $id)->delete();
        
        foreach($request->ingredients as $ingredient) {
            $recipeIngredient = new Ingredient();
            $recipeIngredient->recipe_id = $newRecipe->id;
            $recipeIngredient->ingredent_name = $ingredient;
            $recipeIngredient->save();
        }

        return redirect()->route('admin.recipe.list');
    }

    public function delete($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        Ingredient::where('recipe_id', $id)->delete();

        return redirect()->route('admin.recipe.list');
    }
}
