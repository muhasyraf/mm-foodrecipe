<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     * Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro illo magni ad nulla nobis ex pariatur labore, sapiente quas officia, eum cumque suscipit, maxime id vitae quo! Hic possimus laborum fugiat. Ullam totam perferendis aperiam!
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->title . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Recipe::create([
            'title' => $request->title,
            'user_id' => $request->user()->id,
            'description' => $request->description,
            'ingredients' => json_encode($request->ingredients),
            'steps' => json_encode($request->steps),
            'image' => $path
        ]);

        return back()->with('success', 'Resep baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
