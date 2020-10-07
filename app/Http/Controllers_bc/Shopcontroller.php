<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Shopcontroller extends Controller
{
    public function showShops(){
        $categories = Category::all();        
        return view('pages.shops')->with(['categories'=>$categories]);
    }
}
