<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Dish extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function image() {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function getAdditionalImages() {
        return $this->image();
    }
}
