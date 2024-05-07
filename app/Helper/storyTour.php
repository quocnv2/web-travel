<?php

namespace App\Helper;

class storyTour{
    public $items = [];

    public function __construct(){
        $this->items = session('storyTour') ? session('storyTour') : [];
    }
    // lấy danh sách
    public function list_storyTour(){
        return $this->items;
    }

    // Thêm mới
    public function add_storyTour($course){
        $item = [
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

        $this->items[$course->id] = $item;

        session(['storyTour' => $this->items]);
    }
}