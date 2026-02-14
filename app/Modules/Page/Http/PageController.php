<?php

namespace Modules\Page\Http;

use App\Http\Controllers\Controller;
use Modules\Page\Http\Requests\StorePageRequest;
use Modules\Page\Http\Requests\UpdatePageRequest;
use Modules\Page\Models\Page;
use Modules\Page\Services\PageService;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with('translations')->latest()->paginate(15);

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

    public function edit(Page $page)
    {
        $page->load('translations');

        return view('admin.pages.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page, PageService $service)
    {
        $service->update($page, $request->validated());

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page, PageService $service)
    {
        $service->delete($page);

        return back()->with('success', 'Page deleted successfully.');
    }

    public function toggleStatus(Page $page)
    {
        $page->update(['status' => !$page->status]);

        return back();
    }
}