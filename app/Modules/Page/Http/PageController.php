<?php

namespace Modules\Page\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Page\Services\PageService;

class PageController extends Controller
{
    public function store(Request $request, PageService $service)
    {
        $service->create($request->validated());

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }
}