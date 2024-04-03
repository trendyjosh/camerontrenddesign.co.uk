<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectContentRequest;
use App\Http\Requests\UpdateProjectContentRequest;
use App\Models\ProjectContent;

class AdminProjectContentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectContentRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectContentRequest $request, ProjectContent $projectContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectContent $projectContent)
    {
        //
    }
}
