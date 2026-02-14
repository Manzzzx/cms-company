<?php

namespace Modules\Portfolio\Http;

use App\Http\Controllers\Controller;
use Modules\Portfolio\Http\Requests\StorePortfolioRequest;
use Modules\Portfolio\Http\Requests\UpdatePortfolioRequest;
use Modules\Portfolio\Models\Portfolio;
use Modules\Portfolio\Services\PortfolioService;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('translations')->latest()->paginate(15);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(StorePortfolioRequest $request, PortfolioService $service)
    {
        $service->create($request->validated());

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        $portfolio->load('translations');

        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio, PortfolioService $service)
    {
        $service->update($portfolio, $request->validated());

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio, PortfolioService $service)
    {
        $service->delete($portfolio);

        return back()->with('success', 'Portfolio deleted successfully.');
    }

    public function toggleStatus(Portfolio $portfolio)
    {
        $portfolio->update(['status' => !$portfolio->status]);

        return back();
    }
}
