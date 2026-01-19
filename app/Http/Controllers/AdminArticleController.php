<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $articles = Article::all();
        return Inertia::render('Article/Index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function create(): Response
    {
        return Inertia::render('Article/Create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        // Validate input
        $formFields = $request->validated();

        // Allow empty link
        if (!isset($formFields['link'])) {
            $formFields['link'] = null;
        }

        // Get upload file path
        $formFields['image'] = Article::uploadImage($formFields['image']);

        $article = Article::create($formFields);

        return redirect()->route('admin.articles.show', ['article' => $article->id])->with('message', 'Article created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): Response
    {
        return Inertia::render('Article/Show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): Response
    {
        return Inertia::render('Article/Edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        // Validate input
        $formFields = $request->validated();

        // Allow empty link
        if (!isset($formFields['link'])) {
            $formFields['link'] = null;
        }

        // Get upload file path
        if (isset($formFields['image'])) {
            $formFields['image'] = Article::uploadImage($formFields['image']);
        }

        $article->update($formFields);

        return redirect()->route('admin.articles.show', ['article' => $article->id])->with('message', 'Article updated!');
    }
}
