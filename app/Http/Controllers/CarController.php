<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {

        $owner_id= null;
       $owner_id=$request->session()->get('owner_id');
       $brand=$request->session()->get('brand');
       $model=$request->session()->get('model');
       $reg_number=$request->session()->get('reg_number');

      $cars=Car::with('owner');

        if ($owner_id != null) {

            $cars->where('owner_id', 'like', "$owner_id");

        }

        if ($brand != null) {
            $cars->where('brand', 'like', "%$brand%");
        }
        if ($model != null) {
            $cars->where('model', 'like', "%$model%");
        }

        if ($reg_number != null) {
            $cars->where('reg_number', 'like', "%$reg_number%");
        }

          $cars = $cars->orderBy('brand')->get();

        $request->session()->forget('owner_id');

        return view("cars.index", [

            "cars"=>$cars,
            "owner_id"=>$owner_id,
            "brand"=>$brand,
            "model"=>$model,
             "reg_number"=>$reg_number
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view("cars.create", [
            'cars' => Car::all(),
            'owners' => Owner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'reg_number'=>'integer',
//            'brand'=>'required|min:3',
//            'model'=>'required|min:3'
        ]);

        Car::create($request->all());
//        $car->save();
        return redirect()->route("cars.index");
    }


    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view("cars.edit", [
            "car" => $car,
            "owners" => Owner::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->fill($request->all());
        $car->save();
        return redirect()->route("cars.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route("cars.index");
    }

    public function search(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->put('owner_id',$request->owner_id);
        $request->session()->put('brand',$request->brand);
        $request->session()->put('model',$request->model);
        $request->session()->put('reg_number',$request->reg_number);
        return redirect()->route('cars.index');
    }

    public function forget(Request $request)
    {
        $request->session()->forget('owner_id');
        $request->session()->forget('brand');
        $request->session()->forget('model');
        $request->session()->forget('reg_number');
        return redirect()->route('cars.index');
    }
}
