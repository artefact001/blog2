<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'creation_date' => 'required|date',
            'image' => 'image|nullable',
        ]);
        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        // $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        Article::create([
            'name' => $request->name,
            'description' => $request->description,
            'creation_date' => $request->creation_date,
            'image' => $imagePath,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'creation_date' => 'required|date',
            'image' => 'image|nullable',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : $article->image;

        $article->update([
            'name' => $request->name,
            'description' => $request->description,
            'creation_date' => $request->creation_date,
            'image' => $imagePath,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}
