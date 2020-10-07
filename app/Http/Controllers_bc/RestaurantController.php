<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function showRestaurants(){
        return view('pages.restaurants');
    }    
}
