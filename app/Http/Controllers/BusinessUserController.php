<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Shopcategory;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\VendorProduct;
use App\Models\VendorProductColor;
use App\Models\VendorProductSize;
use App\Models\VendorProductImage;

use File;

class BusinessUserController extends Controller
{
    public function signup(){
        $extra_style = 'assets/css/bus_signup_style.css';
        $shop_categories = Shopcategory::orderBy('spanish_translation')->get();
        $categories = Category::orderBy('spanish_translation')->get();

        $business_types = new Category;
        $business_type_data = $business_types->getBusinessTypes();
        return view('business.busi_signup')->with(['data'=>$extra_style,'shop_categories'=>$shop_categories,'categories'=>$categories,'business_types'=>$business_type_data]);
    }

    public function signup_submit(Request $request){
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
                'city'      => $request->input('address'),
                'postal_code'  => $request->input('postal_code'),
                'shop_type' => $request->input('shopcategory'),
                'business_name' =>$request->input('businessname')
            ]);
            $new_vendor->save();
            $id= $new_vendor->id;
            $session_data = [
                'name' => $request->input('firstname')." ".$request->input('lastname'),
                'image'=> 'user.png',
                'user_id'=>$id
            ];
            $request->session()->put('businessuser_info',$session_data);
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
            $user_info = $request->session()->get('businessuser_info','default');
            $id = $user_info['user_id'];
            $vendor = Vendor::where('vendor_id',$id)->take(1)->first();
            return view('business.busi_manageorders')->with(['vendor'=>$vendor]);
        }
        else{
            return redirect('bus/signin');
        }   
    }
    public function signout(Request $request){
        // Forget a single key...
        $request->session()->forget('businessuser_info');
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
        if(count($u->checkLogin($email,$password))==1){
            foreach($u->checkLogin($email,$password) as $user){
                $session_data = [
                    'name' => $user->business_name,
                    'image'=> 'user.png',
                    'user_id'=>$user->vendor_id
                ];
                $request->session()->put('businessuser_info',$session_data);
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

    public function storeUpdate(Request $request){
        
    
        if($request->file('cover_image')){
            $img = Vendor::where('vendor_id',$request->input('vendor_id'))->take(1)->first()->coverimage;
            if($img!='' && File::exists($img)){
            unlink(public_path('assets\images\vendors\\'.$img));            
            }
        }

        $coverimage = strtotime("now") . "_" . $request->input('vendor_id');
        $file = $request->file('cover_image');
        $ext = $file->extension();
        $coverimage = $coverimage . '.' . $ext;

        $vendor_id = $request->input('vendor_id');
        $affectedRows = Vendor::where('vendor_id',$vendor_id)->update(array(
            'business_name' => $request->input('business_name'),
            'shop_type' => $request->input('shopcat'),
            'coverimage' => $coverimage
        ));
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
