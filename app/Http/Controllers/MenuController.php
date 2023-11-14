<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = 1;
        $index2 = 1;
        $index3 = 1;

        $main_menu = Menu::orderby('order', 'ASC')->where('type', 'top')->get();
        $jump_menu = Menu::orderby('order', 'ASC')->where('type', 'jump')->get();
        $footer_menu = Menu::orderby('order', 'ASC')->where('type','footer')->get();
        return view('admin.menus.index', compact('main_menu', 'index', 'index2', 'index3','jump_menu','footer_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $range = range(1,100);
        $menus = Menu::get()->pluck('order')->toArray();
        $range = array_diff($range, $menus);
        return view('admin.menus.create', compact('range'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "name" => "required",
            "url" => "required",
            "order" => "required",
            "status" => "required",
            "type" => "required",
        ]);

        Menu::create([
            "name" => $data['name'],
            "url" => $data['url'],
            "order" => $data['order'],
            "status" => $data['status'],
            "type" => $data['type'],
        ]);

        return back()->with('message', 'Record Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $range = range(1, 100);
        $menus = Menu::get()->pluck('order')->toArray();
        $range = array_diff($range, $menus);
        $own = (array) (int) $menu->order;
      
        $range = array_merge($range, $own);
        $range = array_values($range);
       
        return view('admin.menus.edit', compact('menu', 'range'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
       
        $data = $this->validate($request, [
            "name" => "required",
            "url" => "required",
            "order" => "required",
            "status" => "required",
            "type" => "required",
        ]);

        $menu->update([
            "name" => $data['name'],
            "url" => $data['url'],
            "order" => $data['order'],
            "status" => $data['status'],
            "type" => $data['type'],
        ]);

        return back()->with('message', 'Record Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('message', 'Delete successful');
    }
}
