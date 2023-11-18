<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutions = Partner::orderBy('order', 'ASC')->get();
        $index = 1;
        return view('admin.partners.index', compact('solutions', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $range = range(1, 100);
        $solutions = Partner::get()->pluck('order')->toArray();
        $range = array_diff($range, $solutions);
        return view('admin.partners.create', compact('range'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'order' => 'required',
            'status' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        }

        Partner::create($data);

        return redirect(route('partner.index'))->with('message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        $range = range(1, 100);
        $partners = Partner::get()->pluck('order')->toArray();
        $range = array_diff($range, $partners);
        $own = (array) (int) $partner->order;

        $range = array_merge($range, $own);
        $range = array_values($range);

        return view('admin.partners.edit', compact('range', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable',
            'order' => 'required',
            'status' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        } else {
            $data['image'] = $partner->image;
        }

        $partner->update($data);

        return redirect(route('partner.index'))->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
