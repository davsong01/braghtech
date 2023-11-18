<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function contactForm(Request $request){
   
        $this->validate($request, [
            'firstName' => 'nullable',
            'lastName' => 'nullable',            
            'businessEmail' => 'nullable',
            'title' => 'nullable',         
            'companyName' => 'nullable',
            'companySize' => 'nullable',
            'country' => 'nullable',           
            'phoneNumber' => 'nullable',
            'message' => 'nullable',           
            'consent' => 'nullable',           
            'consent2' => 'nullable'
        ]);

        $contact = Contact::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'businessEmail' => $request->businessEmail,
            'title' => $request->title,
            'companyName' => $request->companyName,
            'companySize' => $request->companySize,
            'country' => $request->country,
            'phoneNumber' => $request->phoneNumber,
            'message' => $request->message,
            'consent' => $request->consent,
            'consent2' => $request->consent2,

        ]);

        return response()->json(['message' => 'success', 'data' => []], 200);

    }
    
    public function index(){
        return view('admin.pages.index');
    }

    public function homepage()
    {
        $home = HomePages::first();
        
        $section1 = $home->section1 ? json_decode($home->section1, true) : [];
       
        $sections['section1'] = [
            'section1_title' => $section1['section1_title'] ?? '',
            'section1_text' => $section1['section1_text'] ?? '',
            'section1_image' => $section1['section1_image'] ?? '',
            'section1_button1_text' => $section1['section1_button1_text'] ?? '',
            'section1_button2_text' => $section1['section1_button2_text'] ?? ''
        ];
       
        $section2 = $home->section2 ? json_decode($home->section2, true) : [];
        $sections['section2'] = [
            'section1_title' => $section2['section2_title'] ?? '',
            'section2_text' => $section2['section2_text'] ?? '',
            'section2_image' => $section2['section2_image'] ?? '',
            'section2_button1_text' => $section2['section2_button1_text'] ?? '',
            'section2_button2_text' => $section2['section2_button2_text'] ?? ''
        ];
        
        return view('admin.pages.homepage', compact('section1','section2'));
        // return response()->json(['message' => 'success', 'data' => $sections], 200);
    }
}
