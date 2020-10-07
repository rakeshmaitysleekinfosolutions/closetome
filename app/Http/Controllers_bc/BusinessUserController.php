<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopcategory;
use App\Models\Vendor;

class BusinessUserController extends Controller
{
    public function signup(){
        $extra_style = 'assets/css/bus_signup_style.css';
        $shop_categories = Shopcategory::all();
        return view('business.busi_signup')->with(['data'=>$extra_style,'shop_categories'=>$shop_categories]);
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
}
