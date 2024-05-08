<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\Category\CategoryController;
use App\Http\Controllers\AdminController\Account\AccountController;
use App\Http\Controllers\AdminController\Recruitment\RecruitmentController;
use App\Http\Controllers\AdminController\Profile\ProfileController;
use App\Http\Controllers\AccountController\User\LoginController;
use App\Http\Controllers\AdminController\Home\HomeController;
use App\Http\Controllers\AdminController\Banner\BannerController;
use App\Http\Controllers\AdminController\Tour\TourController;
use App\Http\Controllers\AdminController\Blog\BlogController;
use App\Http\Controllers\AdminController\Room\RoomController;
use App\Http\Controllers\AdminController\Contact\ContactAdminController;

// Controller User
use App\Http\Controllers\UserController\Home\HomeUserController;
use App\Http\Controllers\UserController\Blog\blogController as blogUserController;
use App\Http\Controllers\UserController\Tour\tourController as tourUserController;
use App\Http\Controllers\UserController\Room\roomController as roomUserController;
use App\Http\Controllers\UserController\Contact\contactController as contactUserController;

Route::prefix('')->group(function () {
    Route::get('/', [HomeUserController::class, 'index'])->name('home');
    // Bài Viết
    Route::get('/danh-sach-bai-viet', [blogUserController::class, 'listBlog'])->name('listBlog');
    Route::get('/chi-tiet-bai-viet/{slug}', [BlogUserController::class, 'detailBlog'])->name('detailBlog');
    Route::get('/danh-sach-bai-viet/danh-muc/{slug}', [blogUserController::class, 'listBlog_Category'])->name('listBlog_Category');

    // Tour
    Route::get('/danh-sach-tour', [tourUserController::class, 'listTour'])->name('listTour');
    Route::get('/danh-sach-tour/danh-muc/{slug}', [tourUserController::class, 'listTour_Category'])->name('listTour_Category');
    Route::get('/chi-tiet-tour/{slug}', [tourUserController::class, 'detailTour'])->name('detailTour');


    // Room
    Route::get('/danh-sach-phong', [roomUserController::class, 'listRoom'])->name('listRoom');
    Route::get('/danh-sach-phong/danh-muc/{slug}', [roomUserController::class, 'listRoom_Category'])->name('listRoom_Category');
    Route::get('/chi-tiet-phong/{slug}', [roomUserController::class, 'detailRoom'])->name('detailRoom');

    // Liên Hệ
    Route::get('/lien-he', [contactUserController::class, 'contact_web'])->name('contact_web');
    Route::post('/lien-he', [contactUserController::class, 'create_contact'])->name('create_contact');


    // Lỗi 404
    Route::get('/error-404', [HomeUserController::class, 'error404'])->name('error404');
});

// // Router Đăng Nhập Admin
Route::get('/dang-nhap-quan-tri', [LoginController::class, 'view_login'])->name('view_login_account');
Route::post('/dang-nhap-quan-tri', [LoginController::class, 'login'])->name('login_admin');
Route::get('/dang-xuat-quan-tri', [LoginController::class, 'logout'])->name('logout_admin');

// Danh Sách Router Admin
//Route::prefix('travel-admin')->group(function () {
Route::prefix('travel-admin')->middleware('admin')->group(function () {
    // Route Trang Home
    Route::get('/', [HomeController::class, 'index'])->name('view_home_admin');

    // Router Frofile
    Route::get('/thong-tin-ca-nhan', [ProfileController::class, 'index'])->name('view_profile');
    Route::post('/cap-nhat-thong-tin-ca-nhan', [ProfileController::class, 'update_profile'])->name('update_profile');
    Route::get('/thong-tin-mat-khau', [ProfileController::class, 'index_password'])->name('index_password');
    Route::post('/cap-nhat-mat-khau-ca-nhan', [ProfileController::class, 'update_password_profile'])->name('update_password_profile');

    // // Router Account
    Route::get('/view-danh-sach-nhan-su', [AccountController::class, 'view_list'])->name('view_list_account');
    Route::get('/view-them-moi-nhan-su', [AccountController::class, 'view_creater'])->name('view_creater_account');
    Route::post('/them-moi-nhan-su', [AccountController::class, 'creater_account'])->name('creater_account');
    Route::get('/xoa-nhan-su/{slug}', [AccountController::class, 'delete_account'])->name('delete_account');
    Route::get('/cap-nhat-nhan-su/{slug}', [AccountController::class, 'view_update'])->name('view_update_account');
    Route::post('/cap-nhat-nhan-su/{slug}', [AccountController::class, 'update_account'])->name('update_account');
    Route::get('/cap-nhat-mat-khau-nhan-su/{slug}', [AccountController::class, 'view_update_password'])->name('view_update_password');
    Route::post('/cap-nhat-mat-khau-nhan-su/{slug}', [AccountController::class, 'update_password_account'])->name('update_password_account');

    // Router Category
    Route::get('/view-danh-sach-danh-muc', [CategoryController::class, 'view_list'])->name('view_list_category');
    Route::get('/view-them-moi-danh-muc', [CategoryController::class, 'view_creater'])->name('view_creater_category');
    Route::post('/them-moi-danh-muc', [CategoryController::class, 'creater_category'])->name('creater_category');
    Route::get('/xoa-danh-muc/{slug}', [CategoryController::class, 'delete_category'])->name('delete_category');
    Route::get('/cap-nhat-danh-muc/{slug}', [CategoryController::class, 'view_update'])->name('view_update_category');
    Route::post('/cap-nhat-danh-muc/{slug}', [CategoryController::class, 'update_category'])->name('update_category');

    // Router Tuyen dung
    Route::get('/view-danh-sach-bai-tuyen-dung', [RecruitmentController::class, 'view_list'])->name('view_list_recruitment');
    Route::get('/chi-tiet-tuyen-dung/{slug}', [RecruitmentController::class, 'detail_recruitment'])->name('detail_recruitment');
    Route::get('/view-them-moi-bai-tuyen-dung', [RecruitmentController::class, 'view_create'])->name('view_create_recruitment');
    Route::post('/them-moi-bai-tuyen-dung', [RecruitmentController::class, 'creater_recruitment'])->name('create_recruitment');
    Route::get('/xoa-bai-tuyen-dung/{slug}', [RecruitmentController::class, 'delete_recruitment'])->name('delete_recruitment');
    Route::get('/cap-nhat-bai-tuyen-dung/{slug}', [RecruitmentController::class, 'view_update'])->name('view_update_recruitment');
    Route::post('/cap-nhat-bai-tuyen-dung/{slug}', [RecruitmentController::class, 'update_recruitment'])->name('update_recruitment');

    Route::get('/view-danh-sach-banner', [BannerController::class, 'view_list'])->name('view_list_banner');
    Route::get('/view-them-moi-banner', [BannerController::class, 'view_create'])->name('view_create_banner');
    Route::post('/them-moi-banner', [BannerController::class, 'create_banner'])->name('create_banner');
    Route::get('/xoa-banner/{slug}', [BannerController::class, 'delete_banner'])->name('delete_banner');
    Route::get('/cap-nhat-banner/{slug}', [BannerController::class, 'view_update'])->name('view_update_banner');
    Route::post('/cap-nhat-banner/{slug}', [BannerController::class, 'update_banner'])->name('update_banner');


    Route::get('/view-danh-sach-tour', [TourController::class, 'view_list'])->name('view_list_tour');
    Route::get('/chi-tiet-tour/{slug}', [TourController::class, 'detail_tour'])->name('detail_tour');
    Route::get('/view-them-moi-tour', [TourController::class, 'view_create'])->name('view_create_tour');
    Route::post('/them-moi-tour', [TourController::class, 'create_tour'])->name('create_tour');
    Route::get('/xoa-tour/{slug}', [TourController::class, 'delete_tour'])->name('delete_tour');
    Route::get('/cap-nhat-tour/{slug}', [TourController::class, 'view_update'])->name('view_update_tour');
    Route::post('/cap-nhat-tour/{slug}', [TourController::class, 'update_tour'])->name('update_tour');


    Route::get('/view-danh-sach-blog', [BlogController::class, 'view_list'])->name('view_list_blog');
    Route::get('/chi-tiet-blog/{slug}', [BlogController::class, 'detail_blog'])->name('detail_blog');
    Route::get('/view-them-moi-blog', [BlogController::class, 'view_create'])->name('view_create_blog');
    Route::post('/them-moi-blog', [BlogController::class, 'create_blog'])->name('create_blog');
    Route::get('/xoa-blog/{slug}', [BlogController::class, 'delete_blog'])->name('delete_blog');
    Route::get('/cap-nhat-blog/{slug}', [BlogController::class, 'view_update'])->name('view_update_blog');
    Route::post('/cap-nhat-blog/{slug}', [BlogController::class, 'update_blog'])->name('update_blog');


    Route::get('/view-danh-sach-room', [RoomController::class, 'view_list'])->name('view_list_room');
    Route::get('/chi-tiet-room/{slug}', [RoomController::class, 'detail_room'])->name('detail_room');
    Route::get('/view-them-moi-room', [RoomController::class, 'view_create'])->name('view_create_room');
    Route::post('/them-moi-room', [RoomController::class, 'create_room'])->name('create_room');
    Route::get('/xoa-room/{slug}', [RoomController::class, 'delete_room'])->name('delete_room');
    Route::get('/cap-nhat-room/{slug}', [RoomController::class, 'view_update'])->name('view_update_room');
    Route::post('/cap-nhat-room/{slug}', [RoomController::class, 'update_room'])->name('update_room');

    Route::get('/danh-sach-lien-he', [ContactAdminController::class, 'contact_list'])->name('contact_list');
    Route::get('/chi-tiet-lien-he/{id}', [ContactAdminController::class, 'detail_contact'])->name('detail_contact');
    Route::get('/xoa-lien-he/{id}', [ContactAdminController::class, 'delete_contact'])->name('delete_contact');
});
