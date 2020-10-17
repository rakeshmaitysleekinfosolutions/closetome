<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class VendorProduct extends Model
{
    use HasFactory;
    protected $primaryKey = 'vendor_product_id';
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['vendor_id','category_id','product_brand','product_name','product_description','product_price',
                           'product_quantity','subcategory_id'];

    //Business portal product listing
    public function getProductsByVendor($vendor_id){
        $vendor_product = DB::table('vendor_products')
                            //   ->join('vendor_product_images','vendor_products.vendor_product_id','=','vendor_product_images.vendor_product_id')
                            //   ->select('vendor_products.*','vendor_product_images.*')
                                ->select('vendor_products.*')
                              ->where('vendor_products.vendor_id',$vendor_id)
                              ->get();
        return $vendor_product;
    }

    public function getProductDetailById($product_id){
        $vendor_product = DB::table('vendor_products')
                              ->join('categories','vendor_products.category_id','=','categories.category_id')
                              ->join('subcategories','subcategories.category_id','=','categories.category_id')
                              ->select('vendor_products.*','categories.category_name','subcategories.subcategory_name')
                              ->where('vendor_products.vendor_product_id',$product_id)
                              ->first();
        return $vendor_product;
    }

    public function getProductImagesById($product_id){
        $vendor_product = DB::table('vendor_product_images')
                              ->where('vendor_product_images.vendor_product_id',$product_id)
                              ->get();
        return $vendor_product;
    }


    public function getProductVariantDetailById($product_id){
        // $vendor_product = DB::table('vendor_products')
        //                       ->join('categories','vendor_products.category_id','=','categories.category_id')
        //                       ->join('product_colors','vendor_products.product_color_id','=','product_colors.product_color_id')
        //                       ->join('product_sizes','vendor_products.product_size_id','=','product_sizes.product_size_id')
        //                       ->select('vendor_products.*','categories.category_name','product_colors.product_color','product_sizes.product_size')
        //                       ->where('vendor_products.vendor_product_id',$product_id)
        //                       ->get();
        // return $vendor_product;
        $vendor_product = DB::table('vendor_product_variants')
                                ->join('vendor_products','vendor_products.vendor_product_id','=','vendor_product_variants.vendor_product_id')
                                ->join('product_colors','product_colors.product_color_id','=','vendor_product_variants.product_color_id')
                                ->join('product_sizes','product_sizes.product_size_id','=','vendor_product_variants.product_size_id')
                                ->where('vendor_product_variants.vendor_product_id',$product_id)
                              ->get();
        return $vendor_product;

    }

    public function getProductColorsById($product_id){
        $vendor_product = DB::table('vendor_product_colors')
                                ->where('vendor_product_id',$product_id)
                              ->get();
        return $vendor_product;
    }
    public function getProductSizesById($product_id){
        $vendor_product = DB::table('vendor_product_sizes')
                                ->where('vendor_product_id',$product_id)
                              ->get();
        return $vendor_product;
    }
    public function colors() {
        return $this->hasMany(VendorProductColor::class, 'vendor_product_id', 'vendor_product_id');
    }
    public function sizes() {
        return $this->hasMany(VendorProductSize::class, 'vendor_product_id', 'vendor_product_id');
    }
    public function image() {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function getAdditionalImages() {
        return $this->image();
    }
}
