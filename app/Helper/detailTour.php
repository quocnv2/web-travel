<?php

namespace App\Helper;

class detailTour{
    public $items = null;

    public function __construct(){
        $this->items = session('detailTour') ? session('detailTour') : null;
    }
    // lấy danh sách
    public function get_detailTour(){
        return $this->items;
    }

    // Thêm mới
    public function add_detailTour($course){
        $items = [
            'name' => $course->name,
            'code' => $course->code,
            'slug' => $course->slug,
            'imgBanner' => $course->imgBanner,
            'imageArray' => $course->imageArray,
            'videoArray' => $course->videoArray,
            'info_details_blog' => $course->info_details_blog,
            'price' => $course->price,
            'idCategory' => $course->idCategory,
            'province' => $course->province,
            'district' => $course->district,
            'wards' => $course->wards,
            'status' => $course->status,
        ];
        session(['detailTour' => $this->items]);
    }
}
