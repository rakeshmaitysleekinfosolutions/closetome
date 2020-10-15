<?php

namespace App\Http\Controllers\RestaurantPortal;

use App\Http\Controllers\Controller;
use App\Models\RestaurantPortal\ClientModel;
use Illuminate\Contracts\Support\Renderable;


class ClientController extends Controller
{
    public function showRestaurants(){
        return view('pages.restaurants');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //dd(ClientModel::all());
        if (!session()->get('businessuser_info')) {
            return redirect('bus/signin');
        }

        return view('restaurantportal.clients.index');
    }
}
