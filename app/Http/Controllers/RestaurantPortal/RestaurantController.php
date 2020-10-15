<?php

namespace App\Http\Controllers\RestaurantPortal;

use App\Helpers\Helper;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use App\Models\BusinessTypeChildCategory;
use App\Models\BusinessTypeParentCategory;
use App\Models\Dish;
use Illuminate\Contracts\Support\Renderable;

use App\Models\Vendor;
class RestaurantController extends BaseController
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
    private $restaurant;

    public function __construct(Vendor $vendor, BusinessType $businessType, BusinessTypeParentCategory $businessTypeParentCategory) {
        $this->vendor = $vendor;
        $this->businessType = $businessType;
        $this->businessTypeParentCategory = $businessTypeParentCategory;
    }
    /**
     * @var mixed
     */
    private $businessUserId;

    public function setData($request) {
        if (isset($this->restaurant)) {
            $this->data['id'] = $this->restaurant->vendor_id;
            $this->data['mode'] = 'edit';
        } else {
            $this->data['id'] = '';
            $this->data['mode'] = 'add';
        }
        $this->data['action'] = route('restaurants');
        if (isset($this->restaurant)) {
            $this->data['mode'] = 'edit';
        } else {
            $this->data['mode'] = 'add';
        }
        if (!empty($request->post('business_name'))) {
            $this->data['business_name'] = $request->post('business_name');
        } elseif (!empty($this->restaurant)) {
            $this->data['business_name'] = $this->restaurant->business_name;
        }else {
            $this->data['business_name'] = '';
        }
        if (!empty($request->post('business_description'))) {
            $this->data['business_description'] = $request->post('business_description');
        } elseif (!empty($this->restaurant)) {
            $this->data['business_description'] = $this->restaurant->business_description;
        }else {
            $this->data['business_description'] = '';
        }
        if (!empty($request->post('email'))) {
            $this->data['email'] = bcrypt($request->post('email'));
        } elseif (!empty($this->restaurant)) {
            $this->data['email'] = $this->restaurant->email;
        } else {
            $this->data['email'] = '';
        }
        if (!empty($request->post('email'))) {
            $this->data['raw_email'] = $request->post('email');
        } elseif (!empty($this->restaurant)) {
            $this->data['raw_email'] = $this->restaurant->raw_email;
        } else {
            $this->data['raw_email'] = '';
        }
        if (!empty($request->post('password'))) {
            $this->data['password'] = bcrypt($request->post('password'));
        } elseif (!empty($this->restaurant)) {
            $this->data['password'] = $this->restaurant->password;
        } else {
            $this->data['password'] = '';
        }
        if (!empty($request->post('password'))) {
            $this->data['raw_password'] = $request->post('password');
        } elseif (!empty($this->restaurant)) {
            $this->data['raw_password'] = $this->restaurant->raw_password;
        }else {
            $this->data['raw_password'] = '';
        }
        //dd($this->data);

        if (!empty($request->post('phone'))) {
            $this->data['phone'] = $request->post('phone');
        } elseif (!empty($this->restaurant)) {
            $this->data['phone'] = $this->restaurant->phone;
        } else {
            $this->data['phone'] = '';
        }
        if (!empty($request->post('business_type'))) {
            $this->data['business_type'] = $request->post('business_type');
        } elseif (!empty($this->restaurant)) {
            $this->data['business_type'] = $this->restaurant->business_type;
        } else {
            $this->data['business_type'] = '';
        }
        if (!empty($request->post('country'))) {
            $this->data['country'] = $request->post('country');
        } elseif (!empty($this->restaurant)) {
            $this->data['country'] = $this->restaurant->country;
        } else {
            $this->data['country'] = '';
        }
        if (!empty($request->post('category'))) {
            $this->data['category'] = $request->post('category');
        } elseif (!empty($this->restaurant)) {
            $this->data['category'] = $this->restaurant->category;
        } else {
            $this->data['category'] = '';
        }
        if (!empty($request->post('subcategory'))) {
            $this->data['subcategory'] = $request->post('subcategory');
        } elseif (!empty($this->restaurant)) {
            $this->data['subcategory'] = $this->restaurant->subcategory;
        } else {
            $this->data['subcategory'] = '';
        }
        if (!empty($request->post('city'))) {
            $this->data['city'] = $request->post('city');
        } elseif (!empty($this->restaurant)) {
            $this->data['city'] = $this->restaurant->city;
        } else {
            $this->data['city'] = '';
        }
        if (!empty($request->post('postal_code'))) {
            $this->data['postal_code'] = $request->post('postal_code');
        } elseif (!empty($this->restaurant)) {
            $this->data['postal_code'] = $this->restaurant->postal_code;
        } else {
            $this->data['postal_code'] = '';
        }
        if (!empty($request->post('street'))) {
            $this->data['street'] = $request->post('street');
        } elseif (!empty($this->restaurant)) {
            $this->data['street'] = $this->restaurant->street;
        } else {
            $this->data['street'] = '';
        }
        if (!empty($request->post('street_number'))) {
            $this->data['street_number'] = $request->post('street_number');
        } elseif (!empty($this->restaurant)) {
            $this->data['street_number'] = $this->restaurant->street_number;
        } else {
            $this->data['street_number'] = '';
        }
        $target = public_path().'/uploads/';
        if (!empty($request->file('shop_icon'))) {
            if(!empty($request->post('image_id'))) {
                $image = \App\Models\Image::find($request->post('image_id'));
                $image->delete();
            }

            $shopIcon   = $request->file('shop_icon');
            $file       = time() . '-' . strtolower($shopIcon->getClientOriginalName());

            $shopIcon->move($target, $file);
            $this->data['shop_icon'] = $file;
        } elseif (!empty($this->restaurant)) {
            $this->data['shop_icon'] = (count($this->restaurant->shopIcon->toArray())) ? $this->restaurant->shopIcon->toArray()[0]['url'] : '';
            $this->data['image_id'] = (count($this->restaurant->shopIcon->toArray())) ? $this->restaurant->shopIcon->toArray()[0]['id'] : '';
        } else {
            $this->data['shop_icon'] = '';
        }
        //dd($this->data['shop_icon']);


        if (!empty($this->restaurant) && is_file(DIR_IMAGE . $this->data['shop_icon'])) {
            $this->data['thumb'] = Helper::resize($this->data['shop_icon'], 100, 100);
        } else {
            $this->data['thumb'] = Helper::resize('no_image.png', 100, 100);
        }
       // dd($this->data);
        $this->data['placeholder']  = Helper::resize('no_image.png', 100, 100);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (!session()->get('businessuser_info')) {
            return redirect('bus/signin');
        }
        if (session()->has('businessUserId')) {
            $this->businessUserId = session()->get('businessUserId');
        }
        //dd( $this->businessUserId);
        if($this->businessUserId) {
            $this->restaurant = Vendor::find($this->businessUserId);
        }
        $this->setData(request());

        if($this->restaurant) {
            $this->data['businessUserInfo'] = $this->data;
        }
        if(request()->isMethod('POST')) {
            switch ($this->data['mode']) {
                case 'add':
                case 'edit':

                $vendor = \App\Models\Vendor::updateOrCreate(
                    ['vendor_id' => $this->data['id']],
                    [
                        'business_name'             => $this->data['business_name'],
                        'business_description'      => $this->data['business_description'],
                        'phone'                     => $this->data['phone'],
                        'email'                     => $this->data['email'],
                        'raw_email'                 => $this->data['raw_email'],
                        'category'                  => $this->data['category'],
                        'subcategory'               => $this->data['subcategory'],
                        'city'                      => $this->data['city'],
                        'street'                    => $this->data['street'],
                        'street_number'             => $this->data['street_number'],
                        'postal_code'               => $this->data['postal_code'],
                        'password'                  => $this->data['password'],
                        'raw_password'              => $this->data['raw_password'],
                        'shop_icon'                 => $this->data['shop_icon'],
                    ]
                );
                if(isset($this->data['shop_icon'])) {
                    $vendor->image()->create([
                        'url' => $this->data['shop_icon']
                    ]);
                }
                session()->put('businessuser_info',[
                    'name'          => $vendor->firstname." ".$this->vendor->firstname,
                    'business_name' => $this->data['business_name'],
                    'image'         => ($this->data['shop_icon']) ? asset('uploads/'.$this->data['shop_icon']) : asset('assets/images/users/user.png'),
                    'user_id'       => $vendor->vendor_id
                ]);
                session()->put('businessUserId', $vendor->vendor_id);
                session()->flash('message', trans('sentence.restaurant.store.label.success'));
                return redirect()->route('restaurants');

            }
        }
        $this->data['businessTypes'] = BusinessType::all()->toArray();
        $this->data['placeholder']  = Helper::resize('no_image.png', 100, 100);
        $this->data['back'] = url()->route('restaurantportal.dashboard');
       // dd($this->data);
        return view('restaurantportal.restaurants.index', $this->data);

        //dd($this->vendor);

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
                        'name'  => $childCategory->spanish_translation
                    );
                }
            }
            return response()->json(['businessTypeChildCategory' => $this->response],200);
        }
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {



        session()->put('businessuser_info',[
            'name'          => $this->vendor->firstname." ".$this->vendor->firstname,
            'business_name' => $this->vendor->business_name,
            'image'         => ($this->vendor->shop_icon) ? asset('assets/images/vendors/'.$this->vendor->shop_icon) : asset('assets/images/users/user.png'),
            'user_id'       => $this->vendor->vendor_id
        ]);
        session()->put('businessUserId', $this->vendor->vendor_id);
        //Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
        session()->flash('message', 'La tienda se ha modificado correctamente');
        return redirect()->route('restaurants');
    }
}
