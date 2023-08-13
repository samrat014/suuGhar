<?php

namespace App\Http\Controllers;

use App\Models\ToiletCodinates;
use Illuminate\Http\Request;

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
            'image_url' => 'required|string',
        ]);

        ToiletCodinates::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'nearest_station' => $request->nearest_station,
            'image_url' => $request->image_url,
        ]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToiletCodinates $toiletCodinates)
    {
        //
    }
}
