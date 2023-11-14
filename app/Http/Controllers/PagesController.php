<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homepage()
    {
        $home = HomePage::first();
       
        $section_1 = !empty($home->section_1) ? json_decode($home->section_1, true) : [];
        $section_2 = !empty($home->section_2) ? json_decode($home->section_2, true) : [];

        return view('admin.pages.homepage', compact('section_1', 'section_2'));
    }

    public function updateHomepage(Request $request){
        $sections = HomePage::first();
       
        if($request->section && $request->section == 'section1'){
            $data = [];
            if ($request->section1_image) {
                $data['image'] = url('/') . '/' . $this->uploadImage($request->section1_image, 'images');
            }

            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['button_1_text'] = $request->button_1_text;
            $data['button_1_link'] = $request->button_1_link;
            $data['button_1_status'] = $request->button_1_status;
            $data['button_2_text'] = $request->button_2_text;
            $data['button_2_link'] = $request->button_2_link;
            $data['button_2_status'] =  $request->button_2_status;
            $data['status'] =  $request->status;

            $all['section_1'] = json_encode($data); 
        }

        if ($request->section && $request->section == 'section2') {
            $data = [];
            if ($request->section1_image) {
                $data['image'] = url('/') . '/' . $this->uploadImage($request->section1_image, 'images');
            }

            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['button_1_text'] = $request->button_1_text;
            $data['button_1_link'] = $request->button_1_link;
            $data['button_1_status'] = $request->button_1_status;
            $data['button_2_text'] = $request->button_2_text;
            $data['button_2_link'] = $request->button_2_link;
            $data['button_2_status'] =  $request->button_2_status;
            $data['status'] =  $request->status;

            $all['section_1'] = json_encode($data);
        }


        if(!$sections){
            HomePage::create($all); 
        }else{
            $sections->update($all);
        }

        return back()->with('message', 'Updated successfully');
       
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
