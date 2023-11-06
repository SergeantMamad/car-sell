<?php

namespace App\Http\Controllers;

use App\Models\CarModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CarModelsController extends Controller
{
    public function create(Request $request)
    {
        $file = DB::table('car_models')->where('company', $request->company)->distinct()->get();
        return view('shows.create', ['file' => $file, 'company' => $request->company]);

    }

    public function storeModel(Request $request)
    {

        CarModels::create([
            'company' => $request->company,
            'model' => $request->model,
        ]);
        return redirect()->back()->with('success', 'Your Model Has Succefully Created');

    }

    public function deleteModel(Request $request)
    {
        $model = CarModels::where('model', $request->model)->first();
        $model->delete();
        return redirect()->back()->with('success', 'Your Model has succefully deleted');
    }
}
