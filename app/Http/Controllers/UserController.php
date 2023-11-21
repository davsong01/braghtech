<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = 1;
        $admins = User::orderby('created_at', 'DESC')->paginate(20);
        return view('admin.users.index', compact('admins', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "name" => "required",
            "phone" => "required",
            "avatar" => "nullable",
            "password" => "nullable",
            "email" => "required|unique:users",
            "role" => "required|in:admin,general_staff,developer"
        ]);

        // password
        if($request->password){
            $pasword = Hash::make($request->password);
        }else{
            $password = Hash::make('12345');
        }
        // Avatar
        if($request->avatar){
            $avatar = url('/').'/'.$this->uploadImage($request->avatar, 'avatars',400,400);
        }
  
        User::create([
            "name" => $data['name'],
            "phone" => $data['phone'],
            "avatar" => $avatar ?? null,
            "password" => $password,
            "email" => $data['email'],
            "role" => $data['role']
        ]);

        return back()->with('message', 'Record Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id=null)
    {
        $user = auth()->user();
        return view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $this->validate($request, [
            "name" => "required",
            "phone" => "required",
            "avatar" => "nullable",
            "password" => "nullable",
            "email" => "required|unique:users,email,".$user->id,
            "role" => "required|in:admin,general_staff,developer"
        ]);

        // password
        if ($request->password) {
            $pasword = Hash::make($request->password);
        } else {
            $password = $user->password;
        }
        // Avatar
        if ($request->avatar) {
            $avatar = url('/') . '/' . $this->uploadImage($request->avatar, 'avatars', 400, 400);
        }else{
            $avatar = $user->avatar;
        }

        $user->update([
            "name" => $data['name'],
            "phone" => $data['phone'],
            "avatar" => $avatar,
            "password" => $password,
            "email" => $data['email'],
            "role" => $data['role']
        ]);

        return back()->with('message', 'Record successfully updated!');
    }

    public function updateProfile(Request $request, User $user)
    {
        $user = auth()->user();
       
        $data = $this->validate($request, [
            "name" => "required",
            "phone" => "required",
            "avatar" => "nullable",
            "password" => "nullable",
            "email" => "required|unique:users,email," . $user->id,
        ]);

        // password
        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }
        // Avatar
        if ($request->avatar) {
            $avatar = url('/') . '/' . $this->uploadImage($request->avatar, 'avatars', 400, 400);
        } else {
            $avatar = $user->avatar;
        }

        $user->update([
            "name" => $data['name'],
            "phone" => $data['phone'],
            "avatar" => $avatar,
            "password" => $password,
            "email" => $data['email'],
        ]);

        return back()->with('message', 'Profile successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', 'Record successfully deleted!');
    }
}
