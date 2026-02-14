<?php

namespace Modules\Testimonial\Http;

use App\Http\Controllers\Controller;
use Modules\Testimonial\Http\Requests\StoreTestimonialRequest;
use Modules\Testimonial\Http\Requests\UpdateTestimonialRequest;
use Modules\Testimonial\Models\Testimonial;
use Modules\Testimonial\Services\TestimonialService;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('translations')->latest()->paginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(StoreTestimonialRequest $request, TestimonialService $service)
    {
        $service->create($request->validated());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        $testimonial->load('translations');

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial, TestimonialService $service)
    {
        $service->update($testimonial, $request->validated());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial, TestimonialService $service)
    {
        $service->delete($testimonial);

        return back()->with('success', 'Testimonial deleted successfully.');
    }

    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->update(['status' => !$testimonial->status]);

        return back();
    }
}
