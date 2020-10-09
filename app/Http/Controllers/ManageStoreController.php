<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Vendor;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\BusinessTypeChildCategory;
use Response;
use Illuminate\Routing\Controller;
use App\Models\BusinessType;
use App\Models\BusinessTypeParentCategory;

use DB;
use MessageBag;
use Storage;

use Toastr;
class ManageStoreController extends BaseController
{




    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('businessportal::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('businessportal::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('businessportal::edit');
    }



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
