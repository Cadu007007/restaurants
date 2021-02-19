<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('home', ['restaurants' => $restaurants]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $validated = Validator::make($request->all(), [
            'image' => 'required|image',
            "restaurant_name" => 'required|unique:restaurants,restaurant_name',
            "owner_name" => 'sometimes|nullable',
            "type" => 'required',
            "open" => 'sometimes|nullable',
            "phone" => 'sometimes|nullable',
            "whatsapp" => 'sometimes|nullable',
            "instagram" => 'sometimes|nullable',
            "website" => 'required',
            "description" => 'sometimes|nullable',
        ]);
        if ($validated->fails()) {
            return back()->withErrors($validated->errors());
        }
        $restaurant = new Restaurant();
        $restaurant->image = $request->image->store('images', ['disk' => 'public']);
        $restaurant->owner_name = $request->owner_name;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->type = $request->type;
        $restaurant->all_day = $request->open;
        $restaurant->phone_number = $request->phone;
        $restaurant->whatsapp = $request->whatsapp;
        $restaurant->instagram = $request->instagram;
        $restaurant->website = $request->website;
        $restaurant->description = $request->description;
        $restaurant->save();
        return back()->with('message', 'Restaurant Stored Successfully');

        // 'owner_name', 'image', 'restaurant_name', 'type',
        // 'all_day', 'phone_number', 'whatsapp', 'instagram', 'website', 'description'
        // Slide::create(['image' => $slid->store('slides', ['disk' => 'public'])]);

    }
    public function update(Request $request, Restaurant $restaurant)
    {
        $rules = [
            "restaurant_name" => 'required|unique:restaurants,restaurant_name,' . $restaurant->id,
            "owner_name" => 'sometimes|nullable',
            "type" => 'required',
            "open" => 'sometimes|nullable',
            "phone" => 'sometimes|nullable',
            "whatsapp" => 'sometimes|nullable',
            "instagram" => 'sometimes|nullable',
            "website" => 'required',
            "description" => 'sometimes|nullable',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'required|image';
        }
        $validated = Validator::make($request->all(), $rules);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete(($restaurant->image));

            $restaurant->image = $request->image->store('images', ['disk' => 'public']);
        }
        $restaurant->owner_name = $request->owner_name;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->type = $request->type;
        $restaurant->all_day = $request->open;
        $restaurant->phone_number = $request->phone;
        $restaurant->whatsapp = $request->whatsapp;
        $restaurant->instagram = $request->instagram;
        $restaurant->website = $request->website;
        $restaurant->description = $request->description;
        $restaurant->save();
        return back()->with('message', 'Restaurant Updated Successfully Successfully');

    }
    public function destroy(Restaurant $restaurant)
    {
        Storage::disk('public')->delete(($restaurant->image));

        $restaurant->delete();
        return back()->withMessage('Restaurant Deleted Successfully');
    }
}
