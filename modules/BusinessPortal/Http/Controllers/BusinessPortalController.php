<?php

namespace Modules\BusinessPortal\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Vendor;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\BusinessPortal\Entities\BusinessTypeChildCategory;
use Response;
use Illuminate\Routing\Controller;
use Modules\BusinessPortal\Entities\BusinessType;
use Modules\BusinessPortal\Entities\BusinessTypeParentCategory;

use DB;
use MessageBag;
use Storage;

use Toastr;
class BusinessPortalController extends BaseController
{
    private $vendor;
    private $businessUserInfo;
    private $businessTypeId;
    private $businessTypeParentCategory;
    private $businessType;
    private $coverImage;
    private $coverImageFile;
    private $shopImageFile;
    private $shopImage;
    /**
     * @var string
     */
    private $shopIcon;
    private $shopIconFile;

    public function __construct(Vendor $vendor, BusinessType $businessType, BusinessTypeParentCategory $businessTypeParentCategory) {
        $this->vendor = $vendor;
        $this->businessType = $businessType;
        $this->businessTypeParentCategory = $businessTypeParentCategory;
    }

    /**
     * @var mixed
     */
    private $businessUserId;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //dd($this->vendor);
        if (session()->has('businessUserId')) {
            $this->businessUserId = session()->get('businessUserId');
        }
        if($this->businessUserId) {
            $this->businessUserInfo = $this->vendor->find($this->businessUserId);
        }
        if($this->businessUserInfo) {
            $this->data['businessUserInfo'] = $this->businessUserInfo->toArray();
        }

        $this->data['businessTypes'] = BusinessType::all()->toArray();
        //dd($this->data['businessUserInfo']);
        return view('businessportal::index', $this->data);
    }
    public function setBusinessTypeId($id) {
        $this->businessTypeId = $id;
        return $this;
    }
    public function fetchParentCategory(Request $request) {
        if($request->ajax()) {
            $this->businessTypeId = ($request->has('businessType')) ? $request->get('businessType') : '';
            if($this->businessTypeId) {
                $categories = BusinessTypeParentCategory::where('business_type_id', $this->businessTypeId)->get();
                if(count($categories) > 0) {
                    foreach ($categories as $category) {
                        $this->response[] = array(
                            'id'    => $category->category_id,
                            'name'  => $category->spanish_translation
                        );
                    }
                }
                return response()->json(['businessTypeParentCategory' => $this->response],200);
            }
            return response()->json(['businessTypeParentCategory' => $this->response],200);
        }
    }
    public function fetchChildCategory(Request $request) {
        if($request->ajax()) {
            $businessTypeParentCategoryName = ($request->has('businessTypeParentCategory')) ? $request->get('businessTypeParentCategory') : '';
            $parentCategory                 = BusinessTypeParentCategory::where('spanish_translation', $businessTypeParentCategoryName)->get();
            if($parentCategory) {
                $childCategories = BusinessTypeChildCategory::where('category_id', $parentCategory[0]->category_id)->whereNotNull('subcategory_name')->get();
            }
            //dd($childCategories);
            if(count($childCategories) > 0) {
                foreach ($childCategories as $childCategory) {
                    $this->response[] = array(
                        'id'    => $childCategory->subcategory_id ,
                        'name'  => $childCategory->subcategory_name
                    );
                }
            }
            return response()->json(['businessTypeChildCategory' => $this->response],200);
        }
    }
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
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {

        $this->vendor = $this->vendor->find($request->post('vendor_id'));
        //dd($request->all());
        // Cover Image
        $target = public_path().'/assets/images/vendors/';
        if(!empty($request->file('cover_image'))) {

            $this->coverImageFile = $request->file('cover_image');
            $existingCoverImageWithPath = public_path('assets\images\vendors\\'.$this->vendor->coverimage);//public_path().'/uploads/'.$existingAvatar;
            \File::delete($existingCoverImageWithPath);
            $this->coverImage = time(). '-' . strtolower($this->coverImageFile->getClientOriginalName());
            $this->coverImageFile->move($target, $this->coverImage);
        } else {
            $this->coverImage = $this->vendor->coverimage;
        }

        // Shop Image
        if(!empty($request->file('shop_image'))) {
            $this->shopImageFile = $request->file('shop_image');
            $existingCoverImageWithPath = public_path('assets\images\vendors\cover_image\\'.$this->vendor->shop_image);//public_path().'/uploads/'.$existingAvatar;
            \File::delete($existingCoverImageWithPath);
            $this->shopImage = time(). '-' . strtolower($this->shopImageFile->getClientOriginalName());
            $this->shopImageFile->move($target, $this->shopImage);
        } else {
            $this->shopImage = $this->vendor->shop_image;
        }
       // dd($this->shopImage);
        // Shop Icon
        if(!empty($request->file('shop_icon'))) {
            $this->shopIconFile = $request->file('shop_icon');
            $existingCoverImageWithPath = public_path('assets\images\vendors\\'.$this->vendor->shop_icon);//public_path().'/uploads/'.$existingAvatar;
            \File::delete($existingCoverImageWithPath);
            $this->shopIcon = time(). '-' . strtolower($this->shopIconFile->getClientOriginalName());
            $this->shopIconFile->move($target, $this->shopIcon);
        } else {
            $this->shopIcon = $this->vendor->shop_icon;
        }

        $this->vendor->business_name            = ($request->has('business_name')) ? $request->get('business_name') : $this->vendor->business_name;
        $this->vendor->business_description     = ($request->has('business_description')) ? $request->get('business_description') : $this->vendor->business_description;
        $this->vendor->phone                    = ($request->has('phone')) ? $request->get('phone') : $this->vendor->phone;
        $this->vendor->raw_email                = ($request->has('email')) ? $request->get('email') : $this->vendor->email;
        $this->vendor->email                    = ($request->has('email')) ? bcrypt($request->get('email')) : $this->vendor->email;
        $this->vendor->business_type            = ($request->has('businessType')) ? BusinessType::find($request->get('businessType'))->business_type_name : $this->vendor->business_type;
        $this->vendor->category                 = ($request->has('businessTypeParentCategory')) ? $request->get('businessTypeParentCategory') : $this->vendor->category;
        $this->vendor->subcategory              = ($request->has('businessTypeChildCategory')) ? $request->get('businessTypeChildCategory') : $this->vendor->subcategory;
        $this->vendor->country                  = ($request->has('country')) ? $request->get('country') : $this->vendor->country;
        $this->vendor->city                     = ($request->has('city')) ? $request->get('city') : $this->vendor->city;
        $this->vendor->street                   = ($request->has('street')) ? $request->get('street') : $this->vendor->street;
        $this->vendor->postal_code              = ($request->has('postal_code')) ? $request->get('postal_code') : $this->vendor->postal_code;
        $this->vendor->password                 = ($request->has('password')) ? bcrypt($request->get('password')) : $this->vendor->password;
        $this->vendor->raw_password             = ($request->has('raw_password')) ? bcrypt($request->get('raw_password')) : $this->vendor->raw_password;

        $this->vendor->coverimage              =  $this->coverImage;
        $this->vendor->shop_image               =  $this->shopImage;
        $this->vendor->shop_icon                =  $this->shopIcon;

        $this->vendor->save();

        Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
        return redirect()->route('index');
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
