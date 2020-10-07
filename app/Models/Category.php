<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";

    public function getSubcatsById($category_id){
        $vendor_product = DB::table('subcategories')
                                ->where('category_id',$category_id)
                              ->get();
        return $vendor_product;
    }

    public function getBusinessTypes(){
        $vendor_product = DB::table('business_types')
                              ->get();
        return $vendor_product;    	
    }
}
