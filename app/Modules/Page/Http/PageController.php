<?php

namespace Modules\Page\Http;

use App\Http\Controllers\Controller;
use Modules\Page\Http\Requests\StorePageRequest;
use Modules\Page\Models\Page;
use Modules\Page\Services\PageService;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(15);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request, PageService $service)
    {
        $service->create($request->validated());

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }
}