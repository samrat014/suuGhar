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

    public function neartoilet()
    {
//        if ($lat == null || $lng == null) {
            $lat = 27.70169;
            $lng = 85.3206;
//        }

        $toiletCodinates = ToiletCodinates::
            where('latitude', $lat)
            ->where('longitude', $lng)
            ->select("id", "name", "address", "latitude", "longitude", "nearest_station", "image_url")
            ->get()
            ->map(function ($toiletCodinates) {
                $toiletCodinates->distance = $toiletCodinates->distanceBetween(27.70169, 85.3206);
                return $toiletCodinates;
            })
            ->sortBy('distance');

        return view('neartoilet')->with('toiletCodinates', $toiletCodinates);

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



    // helper funciton
    public function distanceBetween($lat1, $lon1)
    {
        $lat2 = $this->latitude;
        $lon2 = $this->longitude;

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1))
            * sin(deg2rad($lat2))
            + cos(deg2rad($lat1))
            * cos(deg2rad($lat2))
            * cos(deg2rad($theta));

        $dist = acos($dist);
        $dist = rad2deg($dist);

        return $dist * 60 * 1.1515;
    }

    // get current location from device in longitute and latitude
    public function getUserLocation()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

        $latitude = $ipdat->geoplugin_latitude;
        $longitude = $ipdat->geoplugin_longitude;

        return $latitude . ',' . $longitude;
    }
}
