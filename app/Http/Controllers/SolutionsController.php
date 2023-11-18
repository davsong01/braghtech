<?php

namespace App\Http\Controllers;

use App\Models\Solutions;
use Illuminate\Http\Request;

class SolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutions = Solutions::orderBy('order','ASC')->get();
        $index = 1;
        return view('admin.solutions.index', compact('solutions','index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $range = range(1, 100);
        $solutions = Solutions::get()->pluck('order')->toArray();
        $range = array_diff($range, $solutions);
        return view('admin.solutions.create', compact('range'));
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
            'link' => 'nullable',
            'order' => 'required',
            'status' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        }
        
        Solutions::create($data);

        return redirect(route('solutions.index'))->with('message', 'Added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Solutions $solutions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solutions $solution)
    {
        $range = range(1, 100);
        $solutions = Solutions::get()->pluck('order')->toArray();
        $range = array_diff($range, $solutions);
        $own = (array) (int) $solution->order;
        
        $range = array_merge($range, $own);
        $range = array_values($range);

        return view('admin.solutions.edit', compact('range', 'solution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solutions $solution)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'link' => 'nullable',
            'order' => 'required',
            'status' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        }else{
            $data['image'] = $solution->image;
        }

        $solution->update($data);

        return redirect(route('solutions.index'))->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solutions $solutions)
    {
        $solutions->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
