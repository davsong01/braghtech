<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutions = Service::orderBy('order', 'ASC')->get();
        $index = 1;
        return view('admin.services.index', compact('solutions', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $range = range(1, 100);
        $solutions = Service::get()->pluck('order')->toArray();
        $range = array_diff($range, $solutions);
        return view('admin.services.create', compact('range'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'order' => 'required',
            'status' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        }

        Service::create($data);

        return redirect(route('service.index'))->with('message', 'Added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $range = range(1, 100);
        $services = Service::get()->pluck('order')->toArray();
        $range = array_diff($range, $services);
        $own = (array) (int) $service->order;

        $range = array_merge($range, $own);
        $range = array_values($range);

        return view('admin.services.edit', compact('range', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'order' => 'required',
            'status' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        } else {
            $data['image'] = $service->image;
        }

        $service->update($data);

        return redirect(route('service.index'))->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
