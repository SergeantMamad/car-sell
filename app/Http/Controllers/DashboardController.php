<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use App\Models\CarModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        $user = Auth::user();
        if (Auth::user() && $user->hasRole("user")) {
            $cars = Cars::where('user_id', Auth::id())->get();
            return view("dashboard", ["cars" => $cars]);

        } else if (Auth::user() && $user->hasRole("admin")) {
            $users = User::all();
            $cars = Cars::latest()->paginate(5);
            return view("admin", compact("users", "cars"));
        } else {
            return redirect('/');
        }

    }

    function createUser()
    {
        return view('shows.createUser');
    }

    function editUser(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view('shows.editUser', compact('user'));
    }

    function manageAds()
    {
        $cars = Cars::latest()->paginate(0);
        return view("shows.manageAds", ["cars" => $cars]);
    }
    function manageModels()
    {
        $models = CarModels::latest()->paginate(0);
        return view("shows.manageModels", ["models" => $models]);
    }

    public function createModel()
    {

        return view('shows.createModel');
    }

    public function chooseCompany(Request $request)
    {
        return view('shows.createModel', ['request' => $request->company]);
    }
    function manageUsers()
    {
        $users = User::latest()->paginate(0);
        return view("shows.manageUsers", compact("users"));
    }

    function deleteModels(Request $request)
    {
        $models = CarModels::where("model", $request->model)->first();
        $models->delete();
    }


}
