<?php

namespace Modules\Page\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Page\Services\PageService;

class PageController extends Controller
{
    public function store(Request $request, PageService $service)
    {
        $service->create($request->all());

        return redirect()->back()->with('success', 'Page created');
    }
}