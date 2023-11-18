<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutions = Client::with('category')->orderBy('order', 'ASC')->get();
        $index = 1;
        return view('admin.clients.index', compact('solutions', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $range = range(1, 100);
        $solutions = Client::get()->pluck('order')->toArray();
        $range = array_diff($range, $solutions);
        $categories = Category::orderBy('order', 'ASC')->get();
        
        return view('admin.clients.create', compact('range','categories'));
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
            'category_id' => 'required',
            'status' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        }

        Client::create($data);

        return redirect(route('client.index'))->with('message', 'Added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $range = range(1, 100);
        $clients = Client::get()->pluck('order')->toArray();
        $range = array_diff($range, $clients);
        $own = (array) (int) $client->order;

        $range = array_merge($range, $own);
        $range = array_values($range);

        $categories = Category::orderBy('order', 'ASC')->get();

        return view('admin.clients.edit', compact('range', 'client','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable',
            'order' => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        if (!empty($request->image)) {
            $data['image'] = url('/') . '/' . $this->uploadImage($request->image, 'images');
        } else {
            $data['image'] = $client->image;
        }

        $client->update($data);

        return redirect(route('client.index'))->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
