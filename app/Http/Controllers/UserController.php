<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function manageUsers()
    {
        $users = User::latest()->paginate(0);
        return view("shows.manageUsers", compact("users"));
    }
    public function createUser()
    {
        return view("shows.createUser");
    }
    public function StoreUser(Request $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect("/dashboard/manage/users")->with("success", "User Has been created succefully");
    }
    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect("/dashboard/manage/users")->with("success", "User Has been created succefully");
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone
        ]);

        if (isset($request->password)) {
            $user->update([
                "password" => bcrypt($request->password)
            ]);
        }
        $user->syncroles($request->role);
        return redirect("/dashboard/manage/users")->with("success", "User Has been updated succefully");
    }
}
