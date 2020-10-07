<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Shopcontroller extends Controller
{
    public function showShops(){
        $categories = Category::all();        
        $p_categories = Category::limit(6)->get();        
        return view('pages.shops')->with(['categories'=>$categories,'p_categories'=>$p_categories]);
    }
}
