<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Inertia\Inertia;
use Inertia\Response;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $pages = Page::all();
        return Inertia::render('Page/Index', [
            'pages' => $pages
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page): Response
    {
        return Inertia::render('Page/Show', [
            'page' => $page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): Response
    {
        return Inertia::render('Page/Edit', [
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        // Validate input
        $formFields = $request->validated();

        // Allow empty subtitle
        if (!isset($formFields['sub_title'])) {
            $formFields['sub_title'] = null;
        }

        // Get upload file path
        if (isset($formFields['hero'])) {
            $formFields['hero'] = $request->file('hero')->store('hero', 'public');
        }

        $page->update($formFields);

        return redirect()->route('admin.pages.show', ['page' => $page->slug])->with('message', 'Page updated!');
    }
}
