<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Lab3', [
            'articles' => Article::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        Article::factory()->create(['user_id'=> $user->id]);
        return Article::all();
    }

    public function createFormArticle()
    {
        if (Auth::user()->isAdmin) {
            return Inertia::render('Lab5');
        }else{
            return Inertia::render('CreateArticle');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->validated());
        if (Auth::user()->isAdmin) {
            return redirect()->back();
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $lab3)
    {
        return Inertia::render('Lab4', ['article'=>$lab3]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function all()
    {
        return Inertia::render('Lab4-all', [
            'articles' => Article::all(),
        ]);
    }
}
