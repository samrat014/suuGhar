<?php

namespace App\Http\Controllers;

use App\Models\ToiletCodinates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToiletCodinatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('addcodinates.index');
        return view('addcodinates');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'nearest_station' => 'required|string',
            'image_url' => 'nullable',
        ]);

        $path = $request->file('image_url')->store('public/images');

        try {
            ToiletCodinates::create([
                'name' => $request->name,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'nearest_station' => $request->nearest_station,
                'image_url' => $path,

            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());

            return redirect()->route('dashboard')->with('error', 'Something went wrong.');
        }

        return redirect()->route('dashboard')->with('success', 'Location added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $toiletCodinates = ToiletCodinates::all();

        return view('dashboard')->with('toiletCodinates', $toiletCodinates);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToiletCodinates $toiletCodinates)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'nearest_station' => 'required|string',
            'image_url' => 'nullable',
        ]);

        $path = $request->file('image_url')->store('public/images');

        try {
            $toiletCodinates->update([
                'name' => $request->name,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'nearest_station' => $request->nearest_station,
                'image_url' => $path,

            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());

            return redirect()->route('dashboard')->with('error', 'Something went wrong.');
        }

        return redirect()->route('dashboard')->with('success', 'Location updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToiletCodinates $toiletCodinates)
    {
        if (Auth::user()->name == 'admin') {
            $toiletCodinates->delete();

            return redirect()->route('dashboard')->with('success', 'Location deleted successfully.');
        }
    }
}
