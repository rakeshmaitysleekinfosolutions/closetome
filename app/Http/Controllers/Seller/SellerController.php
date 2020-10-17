<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Http\Request;
use App;

class SellerController extends App\Http\Controllers\BaseController {

    private $vendor;
    private $vendorId;
    private $businessUserInfo;
    private $businessTypeId;
    private $businessTypeParentCategory;
    private $businessType;
    private $coverImage;
    private $shopImage;
    private $businessUserId;
    private $category;
    private $subCategory;
    protected $results;
    protected $rows = array();
    public function setVendor($vendor) {
        $this->vendor = $vendor;
        return $this;
    }

    public function setVendorId($vendorId) {
        $this->vendorId = $vendorId;
        return $this;
    }
    public function setBusinessUserId($businessUserId) {
        $this->businessUserId = $businessUserId;
        return $this;
    }
    public function setBusinessType($businessType) {
        $this->businessType = $businessType;
        return $this;
    }
    public function setCoverImage($coverImage) {
        $this->coverImage = $coverImage;
        return $this;
    }
    public function setShopImage($shopImage) {
        $this->shopImage = $shopImage;
        return $this;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    public function getVendorId() {
        return $this->vendorId;
    }
    public function getBusinessUserId() {
        return $this->businessUserId;
    }
    public function getVendor() {
        return $this->vendor;
    }
    public function getBusinessType() {
        return $this->businessType;
    }
    public function getCategory() {
        return $this->category;
    }
}
