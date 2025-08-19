<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Resources\ArticleResource;


class ArticleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $articles = Article::with('user')->get();
        return ArticleResource::collection($articles);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article = $request->user()->articles()->create($data);

        return response()->json($article, 201);
    }

    public function show(Article $article)
    {
        $article->load('user');
        return new ArticleResource($article);
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article->update($data);

        return response()->json($article);
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
}
