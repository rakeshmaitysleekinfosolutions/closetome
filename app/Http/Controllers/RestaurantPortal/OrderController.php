<?php

namespace App\Http\Controllers\RestaurantPortal;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (!session()->get('businessuser_info')) {
            return redirect('bus/signin');
        }
        return view('restaurantportal.orders.index');
    }
}
