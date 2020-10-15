<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\BusinessTypeChildCategory;
use App\Models\BusinessTypeParentCategory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Shopcategory;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\VendorProduct;
use App\Models\VendorProductColor;
use App\Models\VendorProductSize;
use App\Models\VendorProductImage;
use App\Helpers\Helper;
use File;

class BusinessUserController extends Controller
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
        if (!session()->get('businessuser_info')) {
            return redirect('bus/signin');
        }
        if (session()->has('businessUserId')) {
            $this->businessUserId = session()->get('businessUserId');
        }
        //dd(session()->get('businessuser_info'));
        if($this->businessUserId) {
            $this->businessUserInfo = $this->vendor->find($this->businessUserId);
        }
        if($this->businessUserInfo) {
            $this->data['businessUserInfo'] = $this->businessUserInfo->toArray();
        }

        $this->data['businessTypes'] = BusinessType::all()->toArray();
        //dd($this->data['businessUserInfo']);
        return view('businessportal.index', $this->data);

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

        $this->vendor = $this->vendor->find($request->post('vendor_id'));
        $oldPassword = $this->vendor->raw_password;
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
        $this->vendor->email                    = ($request->has('email')) ? bcrypt($request->get('email')) : $this->vendor->email;
        $this->vendor->raw_email                = ($request->has('email')) ? $request->get('email') : $this->vendor->raw_email;
        $this->vendor->business_type            = ($request->has('business_type')) ? BusinessType::find($request->post('business_type'))->business_type_name : $this->vendor->business_type;
        $this->vendor->category                 = ($request->has('category')) ? $request->get('category') : $this->vendor->category;
        $this->vendor->subcategory              = ($request->has('subcategory')) ? $request->get('subcategory') : $this->vendor->subcategory;
        $this->vendor->country                  = ($request->has('country')) ? $request->get('country') : $this->vendor->country;
        $this->vendor->city                     = ($request->has('city')) ? $request->get('city') : $this->vendor->city;
        $this->vendor->street                   = ($request->has('street')) ? $request->get('street') : $this->vendor->street;
        $this->vendor->street_number            = ($request->has('street_number')) ? $request->get('street_number') : $this->vendor->street_number;
        $this->vendor->postal_code              = ($request->has('postal_code')) ? $request->get('postal_code') : $this->vendor->postal_code;
        $this->vendor->password                 = ($request->get('password') != null) ? bcrypt($request->get('password')) : $this->vendor->password;
        $this->vendor->raw_password             = ($request->get('password') != null) ? $request->get('password') : $oldPassword;
        //dd($oldPassword);
        $this->vendor->coverimage              =  $this->coverImage;
        $this->vendor->shop_image               =  $this->shopImage;
        $this->vendor->shop_icon                =  $this->shopIcon;

        $this->vendor->save();

        session()->put('businessuser_info',[
            'name'          => $this->vendor->firstname." ".$this->vendor->firstname,
            'business_name' => $this->vendor->business_name,
            'image'         => ($this->vendor->shop_icon) ? asset('assets/images/vendors/'.$this->vendor->shop_icon) : asset('assets/images/users/user.png'),
            'user_id'       => $this->vendor->vendor_id
        ]);
        session()->put('businessUserId', $this->vendor->vendor_id);
        //Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
        session()->flash('message', 'La tienda se ha modificado correctamente');
        return redirect('/bus/manage-store');
    }
    public function signup(){
        $extra_style = 'assets/css/bus_signup_style.css';
        $shop_categories = Shopcategory::orderBy('spanish_translation')->get();
        $categories = Category::orderBy('spanish_translation')->get();

        $business_types = new Category;
        $business_type_data = $business_types->getBusinessTypes();
        $businessTypes = array();
        $businessTypes = BusinessType::all()->toArray();

        return view('business.busi_signup')->with(['data'=>$extra_style,'shop_categories'=>$shop_categories,'categories'=>$categories,'business_types'=>$business_type_data,'businessTypes'=>$businessTypes]);
    }

    public function signup_submit(Request $request){
        $this->shopIcon = asset('assets/images/users/user.png');
        $request->validate([
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'password'  => 'required|string',
            'cnfmpassword'=> 'required|string',
            'businessname'=>'required|string',
            'email'     => 'required|string|email',
            'mobile'    => 'required',
            'country'   => 'required',
            'confirmed' => 'required',
            'acceptcheckbox'=>'required'
        ],
        [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'password.required' => 'Password is required',
            'cnfmpassword.required' => 'Confirm Password is required',
            'businessname.required' => 'Business name is required',
            'email.required' => 'Email is required',
            'mobile.required' => 'Mobile number is required',
            'country.required' => 'Country is required',
            'confirmed.required' => 'Please confirm',
            'acceptcheckbox.required' => 'Please accept',
        ]
    );
    $email = $request->input('email');
    $password = $request->input('password');
    $cnfmpassword = $request->input('cnfmpassword');

    $v = new Vendor;

    if($password == $cnfmpassword){
        if(count($v->checkEmailExists($email))==0){
            $new_vendor = Vendor::create([
                'firstname' => $request->input('firstname'),
                'lastname'  => $request->input('lastname'),
                'profilename'=>$request->input('firstname')." ".$request->input('lastname'),
                'email'     => bcrypt($request->input('email')),
                'raw_email' => $request->input('email'),
                'phone'    => $request->input('mobile'),
                'password'  => bcrypt($request->input('password')),
                'raw_password'=>$request->input('password'),
                'street'    => $request->input('street'),
                'street_number' => $request->input('street_number'),
                'country'   => $request->input('country'),
                'city'      => $request->input('city'),
                'postal_code'  => $request->input('postal_code'),
                'business_type' => BusinessType::find($request->post('business_type'))->business_type_name,
                'category' => $request->input('category'),
                'subcategory' => $request->input('subcategory'),
                'business_name' =>$request->input('businessname')
            ]);
            $new_vendor->save();

//            if($new_vendor->business_type == 'Restaurants') {
//                $this->shopIcon = asset('assets/images/users/user.png');
//            } else {
//                $this->shopIcon = asset('assets/images/vendors/'.$new_vendor->shop_icon);
//            }

            $session_data = [
                'name'          => $request->input('firstname')." ".$request->input('lastname'),
                'business_name' => $new_vendor->business_name,
                'image'         => $this->shopIcon,
                'user_id'       => $new_vendor->vendor_id,
                'companyType'   => $new_vendor->business_type
            ];
            $request->session()->put('businessuser_info',$session_data);

            // Code added by rakesh
            if(isset($new_vendor->vendor_id)) {
                session()->put('businessUserId', $new_vendor->vendor_id);
            }

            if($new_vendor->business_type == 'Restaurants') {
                return redirect()->route('restaurantportal.dashboard');
            }
            return redirect('bus/dashboard');
        }else{
            return redirect('/bus/signup')->with('email_msg','Email Already Exists! Please try another');
        }
    }
    else{
        return redirect('/bus/signup')->with('cpass_msg','Passwords do not match!');
    }
    }

    public function signin(){
        return view('business.busi_login');
    }
    public function dashboard(Request $request){
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $id = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$id)->take(1)->first();
            return view('business.busi_dashboard')->with(['vendor'=>$vendor]);
        }
        else{
            return redirect('bus/signin');
        }
    }
    public function customers(Request $request){
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $id = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$id)->take(1)->first();
            return view('business.busi_customer')->with(['vendor'=>$vendor]);
        }
        else{
            return redirect('bus/signin');
        }
    }
    public function manageOrders(Request $request){
     if ($request->session()->has('businessuser_info')) {
            //dd(session()->get('businessuser_info'));
            $user_info = $request->session()->get('businessuser_info','default');
            $id = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$id)->take(1)->first();
            //dd($vendor);
            return view('business.busi_manageorders')->with(['vendor'=>$vendor]);
        }
        else{
            return redirect('bus/signin');
        }
    }
    public function signout(Request $request){
        // Forget a single key...
        $request->session()->forget('businessuser_info');
        $request->session()->forget('businessUserId');
        return redirect('bus/signin');
    }

    public function logincheck(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|string',
            'password'=>'required|string'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $u = new Vendor;
        $this->shopIcon = asset('assets/images/users/user.png');
        if(count($u->checkLogin($email,$password))==1){
            foreach($u->checkLogin($email,$password) as $user){

                if($user->business_type == 'Restaurants') {

                    $this->shopIcon = Helper::resize($user->shop_icon,100,100);
                    //dd($this->shopIcon);
                } else {

                    $this->shopIcon = asset('assets/images/vendors/'.$user->shop_icon);
                    //dd($this->shopIcon);
                }
                $session_data = [
                    'name'          => $user->business_name,
                    'image'         => $this->shopIcon,
                    'user_id'       => $user->vendor_id,
                    'business_name' => $user->business_name,
                    'companyType'   => $user->business_type
                ];
               // dd($session_data);
                $request->session()->put('businessuser_info',$session_data);
                // Code added by rakesh
                if(isset($user->vendor_id)) {
                    $request->session()->put('businessUserId', $user->vendor_id);
                }
                if($user->business_type == 'Restaurants') {
                    return redirect()->route('restaurantportal.dashboard');
                }
                return redirect('bus/dashboard');
            }
        }
        else{
            return redirect('/bus/signin')->with('msg','Invalid Email or password');
        }
    }

    public function manageStore(Request $request){
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $id = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$id)->take(1)->first();
            $shop_categories = Shopcategory::all();
            return view('business.busi_storemanage')->with(['vendor'=>$vendor,'shopcats'=>$shop_categories]);
        }
        else{
            return redirect('bus/signin');
        }
    }

    public function setStoreData($data) {

    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeUpdate(Request $request) {

        if($request->file('cover_image')){
            $img = Vendor::where('vendor_id',$request->input('vendor_id'))->take(1)->first()->coverimage;
            if($img!='' && File::exists($img)){
                unlink(public_path('assets\images\vendors\\'.$img));
            }
        }

        $coverimage     = strtotime("now") . "_" . $request->input('vendor_id');
        $file           = $request->file('cover_image');
        $ext            = $file->extension();
        $coverimage     = $coverimage . '.' . $ext;
        $vendor_id      = $request->input('vendor_id');

        $affectedRows = Vendor::where('vendor_id',$vendor_id)->update([
            'business_name'         => $request->input('business_name'),
            'business_description'  => $request->input('business_description'),
            'email'                 => bcrypt($request->input('email')),
            'raw_email'             => $request->input('email'),
            'password'              => bcrypt($request->input('password')),
            'raw_password'          => $request->input('password'),
            'phone'                 => $request->input('phone'),
            'shop_type'             => $request->input('shop_type'),
            'business_type'         => $request->input('business_type'),
            'sub_category_name'     => $request->input('sub_category_name'),
            'country'               => $request->input('country'),
            'city'                  => $request->input('city'),
            'street'                => $request->input('street'),
            'street_number'         => $request->input('street_number'),
            'postal_code'           => $request->input('postal_code'),
            'shop_type'             => $request->input('shopcategory'),
            'category_name'         => $request->input('category_name'),
            'sub_category_name'     => $request->input('sub_category_name'),
            'coverimage'            => $coverimage,
            'shop_icon'             => $request->input('shop_icon'),
        ]);
        #Setting Up The Destination Path
        $target = "public/assets/images/vendors";
        // #Moving The file from its temp location to Real Server Location .
        $file->move($target,$coverimage);
        if($affectedRows > 0){
            return redirect('bus/store')->with(['status'=>'success']);
        }
    }

    public function manageProducts(Request $request){
        // dd(VendorProduct::all());
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $id = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$id)->take(1)->first();
            $shop_categories = VendorProduct::all();
            $v = new VendorProduct;
            $products = $v->getProductsByVendor($id);
            return view('business.products.busi_productmanage')->with(['vendor'=>$vendor,'products'=>$products]);
        }
        else{
            return redirect('bus/signin');
        }
    }
    public function showSingleProduct($product_id,Request $request)
    {
        $id = base64_decode($product_id);
        // dd(VendorProduct::all());
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $vid = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$vid)->take(1)->first();
            // $shop_categories = VendorProduct::all();
            $v = new VendorProduct;

            $product_detail = $v->getProductDetailById($id);
            $product_variant_detail = $v->getProductVariantDetailById($id);
            $product_images = $v->getProductImagesById($id);
            $product_colors = $v->getProductColorsById($id);
            $product_sizes = $v->getProductSizesById($id);
            $categories = Category::all();
            $c = new Category;
            $subcats = $c->getSubcatsById($product_detail->category_id);
            return view('business.products.busi_singleproduct')->with(['vendor'=>$vendor,'product_detail'=>$product_detail,'product_variants'=>$product_variant_detail,'product_images'=>$product_images,'product_colors'=>$product_colors,'product_sizes'=>$product_sizes,'categories'=>$categories,'subcats'=>$subcats]);
        }
        else{
            return redirect('bus/signin');
        }
    }

    public function editProduct($product_id,Request $request)
    {
        $id = base64_decode($product_id);
        // dd(VendorProduct::all());
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $vid = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$vid)->take(1)->first();
            // $shop_categories = VendorProduct::all();
            $v = new VendorProduct;

            $product_detail = $v->getProductDetailById($id);
            $product_variant_detail = $v->getProductVariantDetailById($id);
            $product_images = $v->getProductImagesById($id);
            $product_colors = $v->getProductColorsById($id);
            $product_sizes = $v->getProductSizesById($id);
            $categories = Category::all();
            $c = new Category;
            // dd($product_detail);
            $subcats = $c->getSubcatsById($product_detail->category_id);
            return view('business.products.busi_productedit_form')->with(['vendor'=>$vendor,'product_detail'=>$product_detail,'product_variants'=>$product_variant_detail,'product_images'=>$product_images,'product_colors'=>$product_colors,'product_sizes'=>$product_sizes,'categories'=>$categories,'subcats'=>$subcats]);
        }
        else{
            return redirect('bus/signin');
        }
    }

    public function ajaxSubCats(Request $request){
        $c = new Category;
        echo json_encode(['subcats'=>$c->getSubcatsById($request->input('category_id'))]);
    }

    public function editproductsubmit(Request $request){
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $vid = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$vid)->take(1)->first();
            $vp_id = $request->input('vendor_product_id');
            $shop_categories = VendorProduct::all();
            $u_array['category_id'] = $request->input('category_id');
            $u_array['subcategory_id'] = $request->input('subcategory_id');
            $u_array['product_brand'] = $request->input('product_brand');
            $u_array['product_name'] = $request->input('product_name');
            $u_array['product_description'] = $request->input('product_description');
            $u_array['product_price'] = $request->input('product_price');
            $u_array['product_quantity'] = $request->input('product_quantity');
            $aff = VendorProduct::where('vendor_product_id',$request->input('vendor_product_id'))->update($u_array);

            $color = VendorProductColor::where('vendor_product_id',$vp_id);
            $color->delete();
            $size = VendorProductSize::where('vendor_product_id',$vp_id);
            $size->delete();
            $colors = $request->input('colors');
            if(isset($colors)){
            foreach($colors as $c){
                $newProductColor = VendorProductColor::create([
                    'product_color'=>$c,
                    'vendor_product_id'=>$vp_id
                ]);
                $newProductColor->save();
            }
            }

            $sizes = $request->input('sizes');

            if(isset($sizes)){
            foreach($sizes as $s){
                $newProductSize = VendorProductSize::create([
                    'product_size'=>$s,
                    'vendor_product_id'=>$vp_id
                ]);
                $newProductSize->save();
                // echo $newProductSize->id;
            }
            }
            return redirect('bus/products');

        }
        else{
            return redirect('bus/signin');
        }
    }
    public function addProduct(Request $request){
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $vid = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$vid)->take(1)->first();
            // $shop_categories = VendorProduct::all();
            $v = new VendorProduct;

            // $product_detail = $v->getProductDetailById($id);
            // $product_variant_detail = $v->getProductVariantDetailById($id);
            // $product_images = $v->getProductImagesById($id);
            // $product_colors = $v->getProductColorsById($id);
            // $product_sizes = $v->getProductSizesById($id);
            $categories = Category::all();
            return view('business.products.busi_productadd_form')->with(['vendor'=>$vendor,'categories'=>$categories]);
            // $c = new Category;
            // $subcats = $c->getSubcatsById($product_detail->category_id);
            // return view('business.products.busi_productedit_form')->with(['vendor'=>$vendor,'product_detail'=>$product_detail,'product_variants'=>$product_variant_detail,'product_images'=>$product_images,'product_colors'=>$product_colors,'product_sizes'=>$product_sizes,'categories'=>$categories,'subcats'=>$subcats]);
        }
        else{
            return redirect('bus/signin');
        }
    }

    public function addProductSubmit(Request $request){
        if ($request->session()->has('businessuser_info')) {
        // dd($request->file());
            $user_info = $request->session()->get('businessuser_info','default');
            $vid = $user_info['user_id'];

        $vendor_id = $request->input('vendor_id');

        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $vid = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$vid)->take(1)->first();
            // $shop_categories = VendorProduct::all();
            $newProduct = VendorProduct::create([
                'vendor_id'=>$vid,
                'category_id'=>$request->input('category_id'),
                'subcategory_id'=>$request->input('subcategory_id'),
                'product_price'=>$request->input('product_price'),
                'product_brand'=>$request->input('product_brand'),
                'product_name'=>$request->input('product_name'),
                'product_quantity'=>$request->input('product_quantity'),
                'product_description'=>$request->input('product_description')
            ]);
            $newProduct->save();
            $id = $newProduct->id;

            $colors = $request->input('colors');
            if(isset($colors)){
            foreach($colors as $c){
                $newProductColor = VendorProductColor::create([
                    'product_color'=>$c,
                    'vendor_product_id'=>$id
                ]);
                $newProductColor->save();
            }
            }
            $sizes = $request->input('sizes');
            if(isset($sizes)){
            foreach($sizes as $s){
                $newProductSize = VendorProductSize::create([
                    'product_size'=>$s,
                    'vendor_product_id'=>$id
                ]);
                $newProductSize->save();
            }
            }
        for($i=1;$i<=6;$i++){
            if($request->file('file'.$i) !=null){
                $file = $request->file('file'.$i);
                $ext = $file->extension();
                $file_image = strtotime("now") . "_" . $vid . "_file".$i;
                $file_image = $file_image . '.' . $ext;
                $target = "public/assets/images/product_images";
                // #Moving The file from its temp location to Real Server Location .
                $file->move($target,$file_image);

                $newImage = VendorProductImage::create([
                    'vendor_product_image' => $file_image,
                    'vendor_product_id'=>$id
                ]);
                $newImage->save();
            }
        }

            return redirect('bus/products');
        }
    }
        else{
            return redirect('bus/signin');
        }
    }
    public function deleteProduct($id,Request $request){
        if ($request->session()->has('businessuser_info')) {
            $user_info = $request->session()->get('businessuser_info','default');
            $vid = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$vid)->take(1)->first();
            $id = base64_decode($id);
            // $vendor_product_color = VendorProductColor::where('vendor_product_id',$id)->get();
                $color = VendorProductColor::where('vendor_product_id',$id);
                $color->delete();
                $size = VendorProductSize::where('vendor_product_id',$id);
                $size->delete();
                $product = VendorProduct::where('vendor_product_id',$id);
                $product->delete();
                return redirect('bus/products');
        }
        else{
            return redirect('bus/signin');
        }

    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
