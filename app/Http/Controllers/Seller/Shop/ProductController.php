<?php

namespace App\Http\Controllers\Seller\Shop;

use App\Helpers\Helper;
use App\Models\BusinessType;
use App\Models\BusinessTypeChildCategory;
use App\Models\BusinessTypeParentCategory;
use App\Models\Category;
use App\Models\VendorProduct;
use App\Models\VendorProductColor;
use App\Models\VendorProductSize;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;
class ProductController extends App\Http\Controllers\Seller\SellerController {


    private $product;

    public function fetch() {
        $this->results = VendorProduct::all();
        if($this->results) {
            foreach($this->results as $result) {
                $this->rows[] = array(
                    'id'			    => $result->vendor_product_id,
                    'product_name'	    => $result->product_name,
                    'product_price'		=> $result->product_price,
                    'product_quantity'  => $result->product_quantity,
                    'created_at'        => $result->created_at,
                    'updated_at'        => $result->updated_at
                );
            }
            $i = 0;
            $sl = 1;
            foreach($this->rows as $row) {

                $this->data[$i][] = '<td class="text-center">
											<label class="css-control css-control-primary css-checkbox">
												<input data-id="'.$row['id'].'" type="checkbox" class="css-control-input selectCheckbox" id="row_'.$row['id'].'" name="row_'.$row['id'].'">
												<span class="css-control-indicator"></span>
											</label>
										</td>';
                $this->data[$i][] = '<td>'.$sl.'</td>';
                $this->data[$i][] = '<td>'.$row['product_name'].'</td>';
                $this->data[$i][] = '<td>'.$row['product_price'].'</td>';
                $this->data[$i][] = '<td>'.$row['product_quantity'].'</td>';
                $this->data[$i][] = '<td>'.$row['created_at'].'</td>';
                //$this->data[$i][] = '<td>'.$row['updated_at'].'</td>';
                $this->data[$i][] = '<td class="text-right">
<a href="'.route('shop.product.edit',[$row['id']]).'" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
<a href="'.route('shop.product.edit',[$row['id']]).'" class="btn btn-success btn-sm" title="View"><i class="fas fa-eye"></i></a>


                                     </td>';
                $i++;
                $sl++;
            }
        }
        if($this->data) {
            return response()->json(['data' => $this->data],200);
        } else {
            return response()->json(['data' => []],200);
        }
    }
    public function index() {
        return view('seller.shop.product.index', $this->data);
    }
    /**
     * @param $request
     * Upload Additional Product Images
     */
    public function setData($request) {

        if (!empty($this->product)) {
            $this->data['id'] = $this->product->vendor_product_id;
        } else {
            $this->data['id'] = '';
        }

        if (session()->has('businessUserId')) {
            $this->setVendorId(session()->get('businessUserId'));
        }
        $this->data['vendor_id'] = $this->getVendorId();

        if (!empty($request->post('category_id'))) {
            $this->data['category_id'] = $request->post('category_id');
        } elseif (!empty($this->product)) {
            $this->data['category_id'] = $this->product->category_id;
        } else {
            $this->data['category_id'] = '';
        }
        if (!empty($request->post('subcategory_id'))) {
            $this->data['subcategory_id'] = $request->post('subcategory_id');
        } elseif (!empty($this->product)) {
            $this->data['subcategory_id'] = $this->product->subcategory_id;
        } else {
            $this->data['subcategory_id'] = '';
        }
        // Name
        if (!empty($request->post('product_name'))) {
            $this->data['product_name'] = $request->post('product_name');
        } elseif (!empty($this->product)) {
            $this->data['product_name'] = $this->product->product_name;
        } else {
            $this->data['product_name'] = '';
        }
        if (!empty($request->post('product_brand'))) {
            $this->data['product_brand'] = $request->post('product_brand');
        } elseif (!empty($this->product)) {
            $this->data['product_brand'] = $this->product->product_brand;
        } else {
            $this->data['product_brand'] = '';
        }
        if (!empty($request->post('product_quantity'))) {
            $this->data['product_quantity'] = $request->post('product_quantity');
        } elseif (!empty($this->product)) {
            $this->data['product_quantity'] = $this->product->product_quantity;
        } else {
            $this->data['product_quantity'] = '';
        }
        if (!empty($request->post('product_price'))) {
            $this->data['product_price'] = $request->post('product_price');
        } elseif (!empty($this->product)) {
            $this->data['product_price'] = $this->product->product_price;
        } else {
            $this->data['product_price'] = '';
        }

        if (!empty($request->post('product_description'))) {
            $this->data['product_description'] = $request->post('product_description');
        } elseif (!empty($this->product)) {
            $this->data['product_description'] = $this->product->product_description;
        } else {
            $this->data['product_description'] = '';
        }

        if (!empty($request->post('colors'))) {
            $this->data['colors'] = $request->post('colors');
        } elseif (!empty($this->product)) {
            $this->data['colors'] = $this->product->colors;
        } else {
            $this->data['colors'] = array();
        }

        if (!empty($request->post('sizes'))) {
            $this->data['sizes'] = $request->post('sizes');
        } elseif (!empty($this->product)) {
            $this->data['sizes'] = $this->product->sizes;
        } else {
            $this->data['sizes'] = array();
        }

        $target             = public_path().'/uploads/';
        $additionalImages   = array();
        $this->data['placeholder']  = Helper::resize('no_image.png', 100, 100);
        $this->data['back'] = url()->route('shop.product');
        // Images
        $newImages = array();
        if (!empty($request->file('images'))) {
            $images = $request->file('images');
            if(!empty($images)) {
                foreach ($images as $image) {
                    $file = 'shop-product-'.time() . '-' . strtolower($image['image']->getClientOriginalName());
                    $image['image']->move($target, $file);
                    $newImages[] = $file;
                }

                if(count($newImages)) {
                    foreach ($newImages as $newImage) {
                        $additionalImages[] = array(
                            'url' => $newImage,
                            'id'  => ''
                        );
                    }
                }
            }
        } elseif (!empty($this->product->getAdditionalImages)) {
            $additionalImages = $this->product->getAdditionalImages->toArray();
        } else {
            $additionalImages = array();
        }
        $this->data['images'] = array();
        foreach ($additionalImages as $additionalImage) {
            if (is_file(DIR_IMAGE . $additionalImage['url'])) {
                $image = $additionalImage['url'];
                $thumb = $additionalImage['url'];
            } else {
                $image = '';
                $thumb = 'no_image.png';
            }
            $this->data['images'][] = array(
                'image'      => $image,
                'thumb'      => Helper::resize($image, 100, 100),
                'id'         => $additionalImage['id'],
            );
        }

        $this->data['vendor']           = App\Models\Vendor::find($this->getVendorId());
        $this->data['categories']       = Category::all()->where('business_type_id','=',1);
        $this->data['businessTypes']    = BusinessType::all()->toArray();
        //dd($this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request) {
        $this->setData($request);
        return view('seller.shop.product.create', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        try {
            $this->setData($request);

            $vendorProduct = VendorProduct::create([
                'vendor_id'             => $this->data['vendor_id'],
                'category_id'           => $this->data['category_id'],
                'subcategory_id'        => $this->data['subcategory_id'],
                'product_price'         => $this->data['product_price'],
                'product_brand'         => $this->data['product_brand'],
                'product_name'          => $this->data['product_name'],
                'product_quantity'      => $this->data['product_quantity'],
                'product_description'   => $this->data['product_description'],
            ]);
            if(count($this->data['images'])) {
                foreach ($this->data['images'] as $image) {
                    $vendorProduct->image()->create([
                        'url' => $image['image']
                    ]);
                }
            }
            if(count($this->data['colors'])) {
                foreach ($this->data['colors'] as $color) {
                    VendorProductColor::create([
                        'product_color'     =>  $color,
                        'vendor_product_id' =>  $vendorProduct->id
                    ]);
                }
            }
            if(count($this->data['sizes'])) {
                foreach ($this->data['sizes'] as $size) {
                    VendorProductSize::create([
                        'product_size'      =>  $size,
                        'vendor_product_id' =>  $vendorProduct->id
                    ]);
                }
            }

            session()->flash('message', trans('sentence.restaurant.menu.label.success'));
            return redirect()->route('shop.product');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id, Request $request) {
        $this->product = VendorProduct::find($id);
        if(!$this->product) {
            return redirect()->route('shop.product');
        }
        $this->setData($request);
        //dd($this->data);
        return view('seller.shop.product.edit', $this->data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request) {
        try {
            $this->setData($request);
            $vendorProduct = VendorProduct::updateOrCreate(['vendor_product_id' => $id],[
                'vendor_id'             => $this->data['vendor_id'],
                'category_id'           => $this->data['category_id'],
                'subcategory_id'        => $this->data['subcategory_id'],
                'product_price'         => $this->data['product_price'],
                'product_brand'         => $this->data['product_brand'],
                'product_name'          => $this->data['product_name'],
                'product_quantity'      => $this->data['product_quantity'],
                'product_description'   => $this->data['product_description'],
            ]);
            if(count($this->data['colors'])) {
                DB::table('vendor_product_colors')->where('vendor_product_id', '=', $id)->delete();
                foreach ($this->data['colors'] as $color) {
                    VendorProductColor::create([
                        'product_color'     =>  $color,
                        'vendor_product_id' =>  $id
                    ]);
                }
            }
            if(count($this->data['sizes'])) {
                DB::table('vendor_product_sizes')->where('vendor_product_id', '=', $id)->delete();
                foreach ($this->data['sizes'] as $size) {
                    VendorProductSize::create([
                        'product_size'      =>  $size,
                        'vendor_product_id' =>  $id
                    ]);
                }
            }
            if(count($this->data['images'])) {
                foreach ($this->data['images'] as $image) {
                    $vendorProduct->image()->create([
                        'url' => $image['image']
                    ]);
                }
            }
            //dd($this->data);
            session()->flash('message', trans('sentence.restaurant.menu.label.success'));
            return redirect()->route('shop.product.edit',[$id]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function delete() {}

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchChildCategory(Request $request) {
        if($request->ajax()) {
            $businessTypeParentCategory = ($request->has('businessTypeParentCategory')) ? $request->get('businessTypeParentCategory') : '';
            if($businessTypeParentCategory) {
                $childCategories = BusinessTypeChildCategory::where('category_id', $businessTypeParentCategory)->whereNotNull('subcategory_name')->get();

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
            return response()->json(['businessTypeChildCategory' => []],200);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(Request $request) {
        if($request->ajax()) {
            $image = \App\Models\Image::find($request->get('id'));
            $image->delete();
            return response()->json(['status' => 'success'],200);
        }
    }
}
