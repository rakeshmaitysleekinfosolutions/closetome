<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }
    public function dashboard()
    {
        $page = 'dashboard';
        return view('admin.admin_dashboard')->with(['page'=>$page]);
    }
    public function cmspageList(){
        $page = 'cmspages';
        return view('admin.cmspages.cmspage_lists')->with(['page'=>$page]);
    }
    public function cmsPageEdit(){
        $page = 'cmspages';
        return view('admin.cmspages.cmspage_edit')->with(['page'=>$page]);
    }
}
