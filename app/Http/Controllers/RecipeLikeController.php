<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeLikeController extends Controller
{
    public function like(Recipe $recipe)
    {
        $liker = auth()->user();
        $liker->likes()->attach($recipe);
        return redirect()->route('recipes.index')->with('success', 'You liked the post!');
    }
    public function unlike(Recipe $recipe)
    {
        $liker = auth()->user();
        $liker->likes()->detach($recipe);
        return redirect()->route('recipes.index')->with('success', 'You unliked the post!');
    }
}
