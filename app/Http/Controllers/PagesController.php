<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use App\Models\HomePage;
use App\Models\Solutions;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\WhyBraghtechPage;

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
        $section_3 = !empty($home->section_3) ? json_decode($home->section_3, true) : [];
        $section_4 = !empty($home->section_4) ? json_decode($home->section_4, true) : [];
        $section_5 = !empty($home->section_5) ? json_decode($home->section_5, true) : [];
        
        $solutions = Solutions::where(['status' => 'active'])->orderBy('order', 'ASC')->get();
        $services = Service::where(['status'=>'active'])->orderBy('order', 'ASC')->get();
        return view('admin.pages.homepage', compact('section_1', 'section_2', 'section_3', 'section_4', 'section_5','solutions','services'));
    }

    public function updateHomepage(Request $request){
        $sections = HomePage::first();

        if (!$sections) {
            $sections = HomePage::create([]);
        }

        $all['section_1'] = !empty($sections->section_1) ? $sections->section_1 : [];
        $all['section_2'] = !empty($sections->section_2) ? $sections->section_2 : [];
        $all['section_3'] = !empty($sections->section_3) ? $sections->section_3 : [];
        $all['section_4'] = !empty($sections->section_4) ? $sections->section_4 : [];
        $all['section_5'] = !empty($sections->section_5) ? $sections->section_5 : [];
        
        if($request->section && $request->section == 'section1'){
            $data = [];
            if (!empty($request->section1_image)) {
                $data['image'] = url('/') . '/' . $this->uploadImage($request->section1_image, 'images');
            }else{
                $data['image'] = json_decode($all['section_1'], true)['image'] ?? null;
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
            $data['solutions'] = json_encode($request->solutions);
            $data['view_more_text'] = $request->view_more_text;
            $data['view_more_link'] = $request->view_more_link;
            $data['view_more_status'] = $request->view_more_status;
            $data['status'] = $request->status;
            $data['status'] = $request->status;

            $all['section_2'] = json_encode($data);
        }

        if ($request->section && $request->section == 'section3') {
            $data = [];
            
            if (!empty($request->left_image)) {
                $data['left_image'] = url('/') . '/' . $this->uploadImage($request->left_image, 'images');
            } else {
                $data['left_image'] = json_decode($all['section_3'], true)['left_image'] ?? null;
            }
            
            $data['title_1'] = $request->title_1;
            $data['description_1'] = $request->description_1;
            $data['button_1_text'] = $request->button_1_text;
            $data['button_1_link'] = $request->button_1_link;
            $data['bullet_1_title'] = $request->bullet_1_title;
            $data['bullet_1_description'] = $request->bullet_1_description;
            $data['bullet_1_status'] = $request->bullet_1_status;
            $data['bullet_2_title'] = $request->bullet_2_title;
            $data['bullet_2_description'] = $request->bullet_2_description;
            $data['bullet_2_status'] = $request->bullet_2_status;
            $data['bullet_3_title'] = $request->bullet_3_title;
            $data['bullet_3_description'] = $request->bullet_3_description;
            $data['bullet_3_status'] = $request->bullet_3_status;
            $data['status'] = $request->status;

            $all['section_3'] = json_encode($data);
        }


        if ($request->section && $request->section == 'section4') {
            $data = [];
            $data['services'] = json_encode($request->services);
            $data['read_more_text'] = $request->read_more_text;
            $data['read_more_link'] = $request->read_more_link;
            $data['read_more_status'] = $request->read_more_status;
            $data['status'] = $request->status;
            $all['section_4'] = json_encode($data);
        }

        if ($request->section && $request->section == 'section5') {
            $data = [];

            if (!empty($request->section5_image)) {
                $data['section5_image'] = url('/') . '/' . $this->uploadImage($request->section5_image, 'images');
            } else {
                $data['section5_image'] = json_decode($all['section_5'], true)['section5_image'] ?? null;
            }
            
            $data['status'] = $request->status;
            $all['section_5'] = json_encode($data);
        }

    
        $sections->update($all);
        return back()->with('message', 'Updated successfully');
       
    }

    public function whyBraghtech()
    {
        $why = WhyBraghtechPage::first();

        return view('admin.pages.why_braghtech', compact('why'));
    }

    public function updateWhyBraghtech(Request $request)
    {
        $why = WhyBraghtechPage::first();
       
        if (!$why) {
            $why = WhyBraghtechPage::create([]);
        }

        $data = $request->all();
        if (!empty($request->who_are_we_image)) {
            $data['who_are_we_image'] = url('/') . '/' . $this->uploadImage($request->who_are_we_image, 'images');
        } else {
            $data['who_are_we_image'] = $why->who_are_we_image ?? null;
        }

        if (!empty($request->our_vision_image)) {
            $data['our_vision_image'] = url('/') . '/' . $this->uploadImage($request->our_vision_image, 'images');
        } else {
            $data['our_vision_image'] = $why->our_vision_image ?? null;
        }

        if (!empty($request->why_choose_us_image)) {
            $data['why_choose_us_image'] = url('/') . '/' . $this->uploadImage($request->why_choose_us_image, 'images');
        } else {
            $data['why_choose_us_image'] = $why->why_choose_us_image ?? null;
        }
        
        $why->update($data);
        
        return back()->with('message', 'Updated successfully');
    }

    public function contactForms()
    {
        $index = 1;

        $contacts = Contact::orderby('status', 'ASC')->orderby('created_at', 'DESC')->get();
        return view('admin.pages.contacts', compact('contacts','index'));
    }

    public function resolveContactForms($id){
        $contact = Contact::where('id', $id)->first();
        
        if($contact){
            $contact->update(['status' => 'resolved']);
        }

        return back()->with('message','Resolved succesfully');
    }

    public function deleteContactForm($id)
    {
      
        $contact = Contact::where('id', $id)->first();

        $contact->delete();
        
        return back()->with('message', 'Deleted successfully');
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
