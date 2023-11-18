<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutions = Category::withCount('client')->orderBy('order', 'ASC')->get();
        $index = 1;
        return view('admin.categories.index', compact('solutions', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $range = range(1, 100);
        $solutions = Category::get()->pluck('order')->toArray();
        $range = array_diff($range, $solutions);
        return view('admin.categories.create', compact('range'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'order' => 'required',
            'status' => 'required'
        ]);

        Category::create($data);

        return redirect(route('category.index'))->with('message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $range = range(1, 100);
        $categorys = Category::get()->pluck('order')->toArray();
        $range = array_diff($range, $categorys);
        $own = (array) (int) $category->order;

        $range = array_merge($range, $own);
        $range = array_values($range);

        return view('admin.categories.edit', compact('range', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'order' => 'required',
            'status' => 'required',
        ]);

        $category->update($data);

        return redirect(route('category.index'))->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
