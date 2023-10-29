<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = auth()->user()->cars;
        if(auth()->user()->email=='admin@example.com')
        {
            $cars =  Car::all();
        }
        
        return view('cars.index', [
            // 'cars' => auth()->user()->cars, // Logged user cars
            'cars' => $cars // Logged user cars
        ]);
    }

    public function create()
    {
        $users = User::where('email',auth()->user()->email)->get();
        if(auth()->user()->email=='admin@example.com')
        {
            $users = User::all();
        }
        return view('cars.create',[
            'users'=>$users
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
                'vin' => ['required', 'unique:cars,vin'],
            'model' => ['required'],
            'brand' => [''],
            'color' => ['required'],
            'owner_id' => ['required', 'exists:users,id'],
        ]);

        if(auth()->user()->email != 'admin@example.com')
        {
            $attributes['owner_id'] = auth()->user()->id;
        }

        Car::create($attributes);

        return redirect('/cars')->with([
            'message' => 'Updated successfully',
        ]);
    }

    public function edit($id, Request $request)
    {
        $users = User::where('email',auth()->user()->email)->get();
        if(auth()->user()->email=='admin@example.com')
        {
            $users = User::all();
        }

        $car = Car::find($id);

        return view('cars.edit', [
            'car' => $car,
            'users' => $users,
        ]);
    }

    public function update($id, Request $request)
    {
        $car = Car::find($id);

        $attributes = $request->validate([
            'vin' => ['unique:cars,vin,'.$id],
            'model' => [],
            'brand' => [],
            'color' => [],
            'owner_id' => ['exists:users,id'],
        ]);

        if(auth()->user()->email != 'admin@example.com')
        {
            $attributes['owner_id'] = auth()->user()->id;
        }

        $car->update($attributes);

        return redirect('/cars')->with([
            'message' => 'Updated successfully'
        ]);
    }

    public function destroy($id)
    {
        Car::find($id)->delete();
        return redirect('/cars')->with([
            'message' => 'Deleted successfully'
        ]);
    }
}
