<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Pagecontroller extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function howToCreateYourBusiness() {
        $this->data['title'] = 'How to Create Your Business';
        return view('pages.how-to-create-your-business', $this->data);
    }
}
