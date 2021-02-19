<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function index()
    {
        return RestaurantResource::collection(Restaurant::paginate(10));
    }
    public function filter(Request $request)
    {
        // dd('d');
        $query = Restaurant::query();
        if ($request->all_day && $request->all_day == true) {
            $query->where('all_day', true);
        }
        if ($request->type) {
            $query->where('type', $request->type);
        }
        // dd('d');

        $result = $query->paginate(10);

        return RestaurantResource::collection($result);

    }
    public function search(Request $request)
    {
        $query = Restaurant::query();
        if ($request->name) {
            $query->where('restaurant_name', 'like', '%' . $request->name . '%');
        }
        if ($request->type) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }
        $result = $query->paginate(10);

        return RestaurantResource::collection($result);

    }
}
