<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessTypeParentCategory extends Model
{
    protected $fillable = [];
    protected $table = 'categories';
    protected $primaryKey = 'category_id ';

    public function businessTypeParentCategories($businessTypeId) {
        // return $this->hasMany(BusinessTypeParentCategory::class, 'business_type_id','id');
        //dd($d);
//        return DB::table('categories')
//            ->where('categories.business_type_id', $businessTypeId)
//            ->get();
        return $this->where('business_type_id', $businessTypeId)->get();
    }
}
