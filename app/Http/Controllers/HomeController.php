<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\Solutions;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\WhyBraghtechPage;

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
            'status' => 'pending',
        ]);

        try {
            $setting = GeneralSetting::first();
            $data = $contact->toArray();
            $data['type'] = 'contact';
            $data['subject'] = 'New Contact form on '. $setting->company_name ?? 'Bragtech';
            $data['recipient'] = [$setting->support_email];

            $data['message'] = 'Dear Admin, please find details of contact form sent from ' . $setting->company_name .'<br><br>
            <strong>First Name: </strong>'.  $data['firstName'] . '<br>
            <strong>Last Name: </strong>'.  $data['lastName'] . '<br>
            <strong>Business Email: </strong>' . $data['businessEmail'] . '<br>
            <strong>Title: </strong>' . $data['title'] . '<br>.
            <strong>Company Name: </strong>' . $data['companyName'] . '<br>
            <strong>Company Size: </strong>' . $data['companySize'] . '<br>
            <strong>Country: </strong>' . $data['country'] . '<br>
            <strong>Phone Number: </strong>' . $data['phoneNumber'] . '<br>
            <strong>Message: </strong>' . $data['message'] . '<br> <br><br>Warm Regards';
            
            $this->sendEmail($data);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return response()->json(['message' => 'success', 'data' => []], 200);
    }

    public function index(){
        $admins = User::count();
        $active_clients = Client::where('status', 'active')->count();
        $clients = Client::count();

        $active_solutions = Solutions::where('status', 'active')->count();
        $solutions = Solutions::count();

        $active_services = Service::where('status', 'active')->count();
        $services = Service::count();

        $active_partners = Partner::where('status', 'active')->count();
        $partners = Partner::count();

        $newMessages = Contact::where('status', 'pending')->count();
        
        return view('admin.pages.index',compact('admins','active_clients','clients','active_solutions','solutions','active_services','services','active_partners','partners','newMessages'));
    }

    public function homepage()
    {
        $home = HomePage::first();

        $section_1 = !empty($home->section_1) ? json_decode($home->section_1, true) : [];
        $section_2 = !empty($home->section_2) ? json_decode($home->section_2, true) : [];
        $section_3 = !empty($home->section_3) ? json_decode($home->section_3, true) : [];
        $section_4 = !empty($home->section_4) ? json_decode($home->section_4, true) : [];
        $section_5 = !empty($home->section_5) ? json_decode($home->section_5, true) : [];
        
        $sol = !empty($section_2['solutions']) ?  json_decode($section_2['solutions']) : [];
      
        $solutions = Solutions::whereIn('id', $sol)->where('status','active')->orderBy('order','ASC')->get();
        $section_2solutions = [];

        foreach ($solutions as $key => $value) {
            $section_2solutions[] = [
                "title" => $value->title,
                "image" => $value->image,
                "link" => $value->link,
                "description" => $value->description
            ];
        }
        $section_2['solutions'] = $section_2solutions;

        $serv = !empty($section_4['services']) ?  json_decode($section_4['services']) : [];
        $services = Service::whereIn('id', $serv)->where('status', 'active')->orderBy('order', 'ASC')->get();
        $section_4solutions = [];

        foreach ($services as $key => $value) {
            $section_4solutions[] = [
                "title" => $value->title,
                "image" => $value->image,
                "description" => $value->description
            ];
        }
        $section_4['services'] = $section_4solutions;

        $all = [
            'section_1' => $section_1,
            'section_2' => $section_2,
            'section_3' => $section_3,
            'section_4' => $section_4,
            'section_5' => $section_5,
        ];

        return response()->json(['message' => 'success', 'data' => $all], 200);
    }

    public function menus(){
        $main_menu = Menu::orderBy('order', 'ASC')->where('status', 'active')->where('type', 'top')->get();
        $jump_menu = Menu::orderBy('order', 'ASC')->where('status', 'active')->where('type', 'jump')->get();
        $footer_menu = Menu::orderBy('order','ASC')->where('status','active')->where('type', 'footer')->get();
        
        $data = [
            'main_menus' => $main_menu,
            'jump_menus' => $jump_menu,
            'footer_menus' => $footer_menu,
        ];

        return response()->json(['message' => 'success', 'data' => $data], 200);

    }

    public function solutions(){
        $solutions = Solutions::where('status', 'active')->orderBy('order', 'ASC')->get();
        return response()->json(['message' => 'success', 'data' => $solutions], 200);
    }

    public function services()
    {
        $services = Service::where('status', 'active')->orderBy('order', 'ASC')->get();
        return response()->json(['message' => 'success', 'data' => $services], 200);
    }

    public function categoriesAndClients(){
        $cac = Category::with(['client'=>function($query){
            return $query->where('status','active')->orderBy('order', 'ASC')->get();
        }])->where('status', 'active')->orderBy('order', 'ASC')->get();
      
        return response()->json(['message' => 'success', 'data' => $cac], 200);
    }

    public function partners(){
        $partners = Partner::where('status', 'active')->orderBy('order', 'ASC')->get();
        return response()->json(['message' => 'success', 'data' => $partners], 200);
    }

    public function whyBraghtech(){
        $sections = WhyBraghtechPage::first();
        return response()->json(['message' => 'success', 'data' => $sections], 200);
    }

    public function companySettings(){
        $setting = GeneralSetting::first();
        return response()->json(['message' => 'success', 'data' => $setting ?? []], 200);
    }

}