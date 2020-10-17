<?php

namespace App\Http\Controllers\RestaurantPortal;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Dish;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
class MenuController extends BaseController
{
    private $dish;
    /**
     * @var Dish[]|\Illuminate\Database\Eloquent\Collection
     */
    private $results;
    private $rows = array();

    public function __construct(Dish $dish)
    {
        $this->dish = $dish;
    }

    public function fetchDish () {
        $this->results = Dish::all();
        //dd($this->results);
        if($this->results) {
            foreach($this->results as $result) {
                $this->rows[] = array(
                    'id'			=> $result->id,
                    'name'			=> $result->name,
                    'description'		    => $result->description,
                    'type'		    => $result->type,
                    'size'		    => $result->size,
                    'price'		    => $result->price,
                    'created_at'    => $result->created_at,
                    'updated_at'    => $result->updated_at
                );
            }
            $i = 0;
            foreach($this->rows as $row) {

                $this->data[$i][] = '<td class="text-center">
											<label class="css-control css-control-primary css-checkbox">
												<input data-id="'.$row['id'].'" type="checkbox" class="css-control-input selectCheckbox" id="row_'.$row['id'].'" name="row_'.$row['id'].'">
												<span class="css-control-indicator"></span>
											</label>
										</td>';
                $this->data[$i][] = '<td>'.$row['name'].'</td>';
                $this->data[$i][] = '<td>'.$row['description'].'</td>';
                $this->data[$i][] = '<td>'.$row['type'].'</td>';
                $this->data[$i][] = '<td>'.$row['size'].'</td>';
                $this->data[$i][] = '<td>'.$row['price'].'</td>';
                $this->data[$i][] = '<td>'.$row['created_at'].'</td>';
                $this->data[$i][] = '<td>'.$row['updated_at'].'</td>';
                $this->data[$i][] = '<td class="text-right"><a href="'.route('dish.edit',[$row['id']]).'" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                     </td>';
                $i++;
            }
        }
        if($this->data) {
            return response()->json(['data' => $this->data],200);
        } else {
            return response()->json(['data' => []],200);
        }
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
        return view('restaurantportal.menus.index');
    }
    public function setData($request) {
        if (!empty($this->dish)) {
            $this->data['id'] = $this->dish->id;
        } else {
            $this->data['id'] = '';
        }
        // Name
        if (!empty($request->post('name'))) {
            $this->data['name'] = $request->post('name');
        } elseif (!empty($this->dish)) {
            $this->data['name'] = $this->dish->name;
        } else {
            $this->data['name'] = '';
        }
        if (!empty($request->post('type'))) {
            $this->data['type'] = $request->post('type');
        } elseif (!empty($this->dish)) {
            $this->data['type'] = $this->dish->type;
        } else {
            $this->data['type'] = '';
        }
        if (!empty($request->post('size'))) {
            $this->data['size'] = $request->post('size');
        } elseif (!empty($this->dish)) {
            $this->data['size'] = $this->dish->size;
        } else {
            $this->data['size'] = '';
        }
        if (!empty($request->post('price'))) {
            $this->data['price'] = $request->post('price');
        } elseif (!empty($this->dish)) {
            $this->data['price'] = $this->dish->price;
        } else {
            $this->data['price'] = '';
        }
        if (!empty($request->post('description'))) {
            $this->data['description'] = $request->post('description');
        } elseif (!empty($this->dish)) {
            $this->data['description'] = $this->dish->description;
        } else {
            $this->data['description'] = '';
        }
        //
        $target = public_path().'/uploads/';

//        if (!empty($request->post('image')) && is_file(DIR_IMAGE . $request->post('image'))) {
//            $image = $request->post('image');
//            $file = time() . '-' . strtolower($image->getClientOriginalName());
//            $image->move($target, $file);
//
//            $this->data['image'] = Helper::resize($request->post('image'), 100, 100);
//        } elseif (!empty($this->dish) && is_file(DIR_IMAGE . $this->dish->image)) {
//            $this->data['image'] = Helper::resize($this->dish->image, 100, 100);
//        } else {
//            $this->data['image'] = Helper::resize('no_image.png', 100, 100);
//        }
//
//        if (!empty($request->post('image')) && is_file(DIR_IMAGE . $request->post('image'))) {
//            $image = $request->post('image');
//            $file = time() . '-' . strtolower($image->getClientOriginalName());
//            $image->move($target, $file);
//            $this->data['thumb'] = Helper::resize(asset($file), 100, 100);
//        } elseif (!empty($this->dish) && is_file(DIR_IMAGE . $this->dish->image)) {
//            $this->data['thumb'] = Helper::resize($this->dish->image, 100, 100);
//        } else {
//            $this->data['thumb'] = Helper::resize('no_image.png', 100, 100);
//        }
        $this->data['placeholder']  = Helper::resize('no_image.png', 100, 100);
        $this->data['back'] = url()->route('menus');
         // Images
        $newImages = array();
        if (!empty($request->file('images'))) {
            $images = $request->file('images');
            if(!empty($images)) {
                foreach ($images as $image) {

                    $file = time() . '-' . strtolower($image['image']->getClientOriginalName());
                    $image['image']->move($target, $file);
                    $newImages[] = $file;
                }

                if(count($newImages)) {
                    foreach ($newImages as $newImage) {
                        $dishImages[] = array(
                            'url' => $newImage,
                            'id'  => ''
                        );
                    }
                }
            }
        } elseif (!empty($this->dish->getAdditionalImages)) {
            $dishImages = $this->dish->getAdditionalImages->toArray();
        } else {
            $dishImages = array();
        }

        $this->data['images'] = array();
       // dd($dishImages);
        foreach ($dishImages as $dishImage) {
            if (is_file(DIR_IMAGE . $dishImage['url'])) {
                $image = $dishImage['url'];
                $thumb = $dishImage['url'];
            } else {
                $image = '';
                $thumb = 'no_image.png';
            }
            $this->data['images'][] = array(
                'image'      => $image,
                'thumb'      => Helper::resize($image, 100, 100),
                'id'         => $dishImage['id'],
            );
        }

        //dd($this->data);
    }
    public function create(Request $request) {
        if (!session()->get('businessuser_info')) {
            return redirect('bus/signin');
        }
        $this->setData($request);

        return view('restaurantportal.menus.create', $this->data);
    }

    public function store(Request $request) {
        try {
            $this->setData($request);
            $dish = Dish::create([
                'name' => $this->data['name'],
                'description' => $this->data['description'],
                'type' => $this->data['type'],
                'size' => $this->data['size'],
                'price' => $this->data['price'],
            ]);
            if(count($this->data['images'])) {
                foreach ($this->data['images'] as $image) {
                    $dish->image()->create([
                        'url' => $image['image']
                    ]);
                }
            }
            //dd($this->data);
            session()->flash('message', trans('sentence.restaurant.menu.label.success'));
            return redirect()->route('dish.add');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }


    }
    public function edit($id) {
        if (!session()->get('businessuser_info')) {
            return redirect('bus/signin');
        }
        $this->dish = Dish::find($id);
        if(!$this->dish) {
            return redirect()->route('menus');
        }
        $this->setData(\request());
        return view('restaurantportal.menus.edit', $this->data);
    }
    public function update($id, Request $request) {
        try {

            $this->setData($request);
            //dd($this->data);
            //$dish = App\Models\Dish::find(1);
           // $dish =  \App\Models\Dish::where('id', $id)->update();
            $dish = \App\Models\Dish::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $this->data['name'],
                    'description' => $this->data['description'],
                    'type' => $this->data['type'],
                    'size' => $this->data['size'],
                    'price' => $this->data['price'],
                ]
            );
            if(count($this->data['images'])) {
                foreach ($this->data['images'] as $image) {
                    $dish->image()->create([
                        'url' => $image['image']
                    ]);
                }
            }

            session()->flash('message', trans('sentence.restaurant.menu.label.success'));
            return redirect()->route('dish.edit',[$id]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }


    }

    public function deleteImage(Request $request) {
        if($request->ajax()) {
            $image = \App\Models\Image::find($request->get('id'));
            $image->delete();
            return response()->json(['status' => 'success'],200);
        }
    }
}
