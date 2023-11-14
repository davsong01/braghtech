<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

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
