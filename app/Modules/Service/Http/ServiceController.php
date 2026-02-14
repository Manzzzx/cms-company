<?php

namespace Modules\Service\Http;

use App\Http\Controllers\Controller;
use Modules\Service\Http\Requests\StoreServiceRequest;
use Modules\Service\Http\Requests\UpdateServiceRequest;
use Modules\Service\Models\Service;
use Modules\Service\Services\ServiceService;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('translations')->latest()->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request, ServiceService $service)
    {
        $service->create($request->validated());

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $service->load('translations');

        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service, ServiceService $serviceService)
    {
        $serviceService->update($service, $request->validated());

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service, ServiceService $serviceService)
    {
        $serviceService->delete($service);

        return back()->with('success', 'Service deleted successfully.');
    }

    public function toggleStatus(Service $service)
    {
        $service->update(['status' => !$service->status]);

        return back();
    }
}
