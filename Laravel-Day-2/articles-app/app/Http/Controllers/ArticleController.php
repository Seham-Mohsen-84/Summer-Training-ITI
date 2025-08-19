<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\final_app;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ArticleController extends Controller
{
    use AuthorizesRequests;
    public function index1()
    {
        $totalArticles = Article::count();
        $recentArticles = Article::latest()->take(5)->get();

        return view('dashboard', compact('totalArticles', 'recentArticles'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $request->user()->articles()->create($data);
        return redirect()->route('articles.index')->with('success', 'Article created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        $article->load('user');
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, article $article)
    {
        $this->authorize('update', $article);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted!');
    }
}
