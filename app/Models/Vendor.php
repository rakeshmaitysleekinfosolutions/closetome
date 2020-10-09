<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Vendor extends Model
{
    use HasFactory;
    protected static $rules = [
        'business_name' => 'required|min:1|max:2500',
        'email'         => 'required|min:1|max:2500',
        'password'      => 'required|confirmed|min:6',
    ];
    protected $primaryKey = 'vendor_id';
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname','lastname','profilename','email','raw_email','phone',
                           'password','raw_password','street','street_number','country','city','postal_code','business_name','shop_type','category','subcategory'];


    public function checkEmailExists($email){
        $login = DB::select("select * from vendors where raw_email=?",[$email]);
        return $login;
    }

    public function checkLogin($email,$password){
        $login = DB::select("select * from vendors where raw_email=? and raw_password=?",[$email,$password]);
        return $login;
    }

}
