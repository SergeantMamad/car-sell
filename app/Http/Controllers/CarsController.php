<?php

namespace App\Http\Controllers;

use App\Models\CarModels;
use App\Models\Cars;
use App\Models\User;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCarsRequest;

class CarsController extends Controller
{


    public function index()
    {
        $cars = Cars::with('images')->latest()->paginate(10);
        return view("shows.show", ['cars' => $cars]);
    }

    public function searchCompany(Request $request)
    {
        if (isset($request->model)) {
            $cars = Cars::with('images')->Where([
                'company'=>$request->company,
                'model'=>$request->model
            ])->latest()->paginate(10);
        } else {
            $cars = Cars::with('images')->Where('company', $request->company)->latest()->paginate(10);
        }

        return view('shows.show', ['cars' => $cars,'searchreq'=>$request->model]);
    }

    public function create()
    {

        return view('shows.create');

    }

    public function store(StoreCarsRequest $request)
    {
        $form = $request->all();
        $form['user_id'] = auth()->id();
        $newform = Cars::create($form);

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = 'image-' . Carbon::now() . rand(0, 2000) . '.' . $image->extension();
                $image->move(public_path('carsImage'), $imageName);
                Images::create([
                    'cars_id' => $newform->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect('/')->with('success', 'Your Car has been added succefully');
    }

    public function show(Request $request)
    {

        $car = Cars::With('images')->Where('id', $request->id)->first();
        $number = User::Where('id', $car->user_id)->first();
        return view('shows.showCar', compact('car', 'number'));
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $car = Cars::where('id', $request->id)->with('images')->first();
        if (!empty($car) && $car->user_id==Auth::id() || $user->hasRole('admin')) {
            if (isset($car->images[0]->image)) {
                foreach ($car->images as $image) {

                    $file_path = public_path('carsImage') . '/' . $image->image;
                    File::delete($file_path);
                    $image->delete();
                }
            }
            $car->delete();
            return redirect()->back()->with('success', 'Your Car have been deleted succefully');
        } else {
            return redirect()->to('/dashboard')->with('error', 'Deleting progress has been failed');
        }




    }

    public function edit(Request $request)
    {
        $car = Cars::where('id', $request->id)->first();
        $carmodels = CarModels::where('company', $car->company)->get();
  
        $user = Auth::user();
        if (Auth::check()) {
            if ($user->hasRole('admin')) {
                return view('shows.editAdmin', compact('car', 'carmodels'));
            } else if ($user->hasRole('user') && Auth::id() == $car->user_id) {
                return view('shows.edit', compact('car', 'carmodels'));
            } else {
                return redirect('/')->with('error', 'You dont have access');
            }
        } else {
            return redirect()->back()->with('error', 'You have to be signed in');
        }


    }

    public function update(StoreCarsRequest $request)
    {
        
        $car = Cars::where('id', $request->id)->first();
        $form = request()->all();
        $form['user_id'] = Auth::id();
        $car->update($form);
        return redirect()->to('/dashboard')->with('success', 'Your car has been succefully updated');

    }

    public function manageImages(Request $request)
    {

        $car = Cars::where('id', $request->id)->first();
        $carImages = Images::where('cars_id', $request->id)->get();
        return view('shows.manageImages', compact('carImages', 'car'));

    }
    public function deleteImages(Request $request)
    {

        $carImages = Images::where('id', $request->id)->first();
        if (isset($carImages)) {
            $file_path = public_path('carsImage') . '/' . $carImages->image;
            File::delete($file_path);
            $carImages->delete();
            return redirect()->back()->with('success', 'Image has been deleted succefully');
        } else {
            return redirect()->back()->with('error', 'There is problam with deleting image');
        }
    }
    public function updateImages(Request $request)
    {
        foreach ($request->file('images') as $image) {
            $imageName = 'image-' . Carbon::now() . rand(0, 2000) . '.' . $image->extension();
            $image->move(public_path('carsImage'), $imageName);
            Images::create([
                'cars_id' => $request->id,
                'image' => $imageName,
            ]);
        }
        return redirect()->back()->with('success', 'Your Photos Has been posted Succfully');
    }
}


