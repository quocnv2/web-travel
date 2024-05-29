<?php

namespace App\Helper;

class storyRoom{
    public $items = [];

    public function __construct(){
        $this->items = session('storyRoom') ? session('storyRoom') : [];
    }
    // lấy danh sách
    public function list_storyRoom(){
        return $this->items;
    }

    // Thêm mới
    public function add_storyRoom($course){
        $item = [
            'name' => $course->name,
            'code' => $course->code,
            'slug' => $course->slug,
            'imgRoom' => $course->imgRoom,
            'imageArray' => $course->imageArray,
            'videoArray' => $course->videoArray,
            'content' => $course->content,
            'price' => $course->price,
            'idCategory' => $course->idCategory,
            'status' => $course->status,
            'nameCategory' => $course->objCategory->name,
        ];

        $this->items[$course->id] = $item;

        session(['storyRoom' => $this->items]);
    }
}
