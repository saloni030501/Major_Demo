<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function hotellist()
    {
        $hotels = Hotel::orderBy('id', 'desc')->paginate();
        // $hotels = Hotel::orderBy('id','desc')->paginate(10);
        return view('admin.hotelview', compact('hotels'));
    }

    public function create()
    {
        return view('admin.addhotel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'rooms' => 'required|integer',
        ]);

        Hotel::create([
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
            'rooms' => $request->rooms,
        ]);

        return redirect()->route('hotellist')->with('status', 'Hotel added successfully.');
    }

    public function updateview($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.edithotel', compact('hotel'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'rooms' => 'required|integer',
    ]);

    $hotel = Hotel::findOrFail($id);
    $hotel->update([
        'name' => $request->name,
        'city' => $request->city,
        'address' => $request->address,
        'rooms' => $request->rooms,
    ]);

    return redirect()->route('hotellist')->with('status', 'Hotel updated successfully.');
}


    public function destroy($id)
    {
        $hotels = Hotel::findOrFail($id);
        $hotels->delete();
        return redirect()->back()->with('status', 'Hotel deleted successfully.');
    }
}
