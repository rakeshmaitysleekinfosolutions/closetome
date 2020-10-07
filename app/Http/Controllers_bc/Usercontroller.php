<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Usercontroller extends Controller
{
    public function login(){
        return view('user_pages.login');
    }
    public function loginCheck(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|string',
            'password'=>'required|string'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $u = new User;
        if(count($u->checkLogin($email,$password))==1){
            foreach($u->checkLogin($email,$password) as $user){
                $session_data = [
                    'name' => $user->profile_name,
                    'image'=> $user->image,
                    'user_id'=>$user->user_id
                ];
                $request->session()->put('user_info',$session_data);
                return redirect('user/dashboard');
            }
        }
        else{
            return redirect('/user_login')->with('msg','Invalid Email or password');
        }
    }
    public function signup(){
        return view('user_pages.signup');
    }
    public function signupCheck(Request $request){
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'Email'     => 'required|string|email',
            'Mobile'    => 'required|digits:10',
            'Password'  => 'required',
            'c_password'=> 'required',
            'Street'    => 'required',
            'street_no' => 'required',
            'Country'   => 'required|string',
            'City'      => 'required|string',
            'zip_code'  => 'required'          
        ],
    [
        'firstname.required' => 'First name is required',
        'lastname.required' => 'Last name is required',
        'c_password.required' => 'Confirm Password is required',
        'street_no.required' => 'Street Number is required',
        'zip_code.required' => 'Zip Code is required',
    ]);
    $email = $request->input('email');
    $password = $request->input('Password');
    $c_password = $request->input('c_password');
    if($password == $c_password){
        $u = new User;
        if(count($u->checkEmailExists($email))==0){

            $user = User::create([
                'firstname' => $request->input('firstname'),
                'lastname'  => $request->input('lastname'),
                'profile_name'=>$request->input('firstname')." ".$request->input('lastname'),
                'email'     => bcrypt($request->input('Email')),
                'raw_email' => $request->input('Email'),
                'mobile'    => $request->input('Mobile'),
                'password'  => bcrypt($request->input('Password')),
                'raw_password'=> $request->input('Password'),
                'street'    => $request->input('Street'),
                'street_no' => $request->input('street_no'),
                'country'   => $request->input('Country'),
                'city'      => $request->input('City'),
                'postal_code'  => $request->input('zip_code')
            ]);     
            $user->save();
            $id= $user->id;
            $session_data = [
                'name' => $request->input('firstname')." ".$request->input('lastname'),
                'image'=> 'user.png',
                'user_id'=>$id
            ];
            $request->session()->put('user_info',$session_data);
            return redirect('user/dashboard');

        }
        else{
            return redirect('/user_signup')->with('email_msg','Email Already Exists! Please try another');
        }    
    }
    else{
        return redirect('/user_signup')->with('cpass_msg','Passwords do not match!');
    }
    }

    public function userProfile(Request $request){
        // $data['page'] = 'profile';
        if ($request->session()->has('user_info')) {
            $user_info = $request->session()->get('user_info','default');
            $id = $user_info['user_id'];
            $user = User::where('user_id',$id)->take(1)->first();
            // dd($user->profile_name);
            return view('user_pages.profile')->with(['user'=>$user,'page'=>'profile']);
        }
        else{
            return redirect('user_login');
        } 
    }
    public function userBilling(){
        $data['page'] = 'billing';
        return view('user_pages.billing')->with($data);
    }
    public function userPasswordSec(){
        $data['page'] = 'passw';
        return view('user_pages.passwordsec')->with($data);
    }
    public function userContactInfo(){
        $data['page'] = 'conti';
        return view('user_pages.contactinfo')->with($data);
    }
    public function userCart(){
        $data['page'] = 'cart';
        return view('user_pages.cart')->with($data);
    }
    public function userOrderHistory(){
        $data['page'] = 'orderh';
        return view('user_pages.order_history')->with($data);
    }
    public function logout(Request $request){
        // Forget a single key...
        $request->session()->forget('user_info');
        return redirect('user_login');
    }
}
