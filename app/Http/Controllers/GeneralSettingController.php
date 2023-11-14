<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.edit', compact('setting'));
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
        $setting = GeneralSetting::first();

        $data = $request->except(['company_logo', 'company_favicon','_token']);
        if ($request->company_logo) {
            $company_logo = url('/') . '/' . $this->uploadImage($request->company_logo, 'brands');
        }

        if ($request->company_favicon) {
            $company_favicon = url('/') . '/' . $this->uploadImage($request->company_favicon, 'brands', 400, 400);
        }
        
        $data['company_logo'] = $company_logo ?? $setting->company_logo;
        $data['company_favicon'] = $company_favicon ?? $setting->company_favicon;
        
        if($setting){
            $setting->update($data);
        }else{
            GeneralSetting::create($data);
        }
        // ->update($data);

        return redirect(route('general-settings'))->with('message', 'Updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
