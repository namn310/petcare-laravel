<?php
//class Admin
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\AccountUserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\UserController;
//class user
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\ProductUserController;
use App\Http\Controllers\User\ServiceUserController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\checkOutController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('test', [TestController::class, 'index'])->name('User.test');
Route::post('test', [TestController::class, 'store'])->name('test.store');
//user view
Route::group(['namespace' => 'User', 'prefix' => ''], function () {
    Route::get('loginUser', [AccountUserController::class, 'index'])->name('user.login');
    // Route::post('login', [AccountUserController::class, 'login'])->name('user.checkAccount');
    Route::post('loginUser', [AccountUserController::class, 'loginCheck'])->name('user.checkLogin');
    //log out
    Route::get('logout', [AccountUserController::class, 'logOut'])->name('user.logout');
    Route::get('registerUser', [AccountUserController::class, 'registerForm'])->name('user.register');
    Route::post('registerUser', [AccountUserController::class, 'register'])->name('user.registAccount');
    //infor user
    Route::get('infor', [AccountUserController::class, 'inforUser'])->name('user.infor');
    Route::PUT('infor/{id}', [AccountUserController::class, 'updateInfor'])->name('user.updateInfor');
    //Change pass
    Route::get('changePass', [AccountUserController::class, 'changePassForm'])->name('user.changePassForm');
    Route::put('changePass', [AccountUserController::class, 'ChangePass'])->name('user.changePass');
    Route::get('/', [HomeUserController::class, 'index'])->name('user.home');
    Route::get('about', function () {
        return view('User.about');
    })->name('user.about');
    Route::get('service', [ServiceUserController::class, 'index'])->name('user.service');
    //product
    Route::get('product/{id}', [ProductUserController::class, 'index'])->name('user.product');
    Route::get('product/detail/{id}', [ProductUserController::class, 'getDetail'])->name('user.productDetail');
    //comment
    Route::post('product/detail/{id}', [CommentController::class, 'store'])->name('user.comment');

    Route::get('book', function () {
        return view('User.booking');
    })->name('user.book');
    Route::get('contact', function () {
        return view('User.contact');
    })->name('user.contact');
    //Cart
    Route::get('cart', [CartController::class, 'index'])->name('user.cart');
    Route::get('cart/addPro/{id}', [CartController::class, 'add'])->name('user.add');
    Route::get('cart/destroy', [CartController::class, 'destroyCart'])->name('user.destroyCart');
    Route::post('cart/update', [CartController::class, 'update'])->name('user.cartupdate');
    Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('user.delete');
    //cart checkout
    Route::get('cart/checkout', [CartController::class, 'checkout'])->name('user.checkout');
    Route::post('cart/checkout', [checkOutController::class, 'confirmCheckOut'])->name('user.confirmCheckOut');
});



//admin view
Route::get('admin/login', function () {
    return view('Admin.pages-login');
})->name('admin.login');
Route::get('admin/register', function () {
    return view('Admin.register');
});
Route::post('register', [UserController::class, 'store'])->name('admin.register');

//post đăng nhập
Route::post('login', [UserController::class, 'checkLogin'])->name('admin.checkLogin');
//post đăng ký tài khoản
Route::prefix('admin')->middleware('checkLogin::class')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('admin.home');
    //log out
    Route::get('logout', [UserController::class, 'logOut'])->name('admin.logout');
    //product
    Route::get('product', [ProductController::class, 'index'])->name('admin.product');
    Route::post('product/add', [ProductController::class, 'store'])->name('admin.createProduct');
    //load view form thêm mới sản phẩm
    Route::get('product/add', [ProductController::class, 'create'])->name('admin.addForm');
    Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');
    Route::get('product/change/{id}', [ProductController::class, 'edit'])->name('admin.changeProductView');
    Route::put('product/change/{id}', [ProductController::class, 'update'])->name('admin.updateProduct');
    //customer
    Route::get('customer', [CustomerController::class, 'index'])->name('admin.customer');
    Route::get('staff', [StaffController::class, 'index'])->name('admin.staff');
    //category
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('category/add', [CategoryController::class, 'create'])->name('admin.categoryForm');
    Route::post('category/add', [CategoryController::class, 'store'])->name('admin.createCat');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.deleteCat');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin.updateCat');
    //service
    Route::get('service', [ServiceController::class, 'index'])->name('admin.service');
    Route::get('service/add', [ServiceController::class, 'create'])->name('admin.serviceAddView');
    Route::post('service/add', [ServiceController::class, 'store'])->name('admin.AddService');
    Route::get('service/change/{id}', [ServiceController::class, 'edit'])->name('admin.change');
    Route::get('service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.deleteService');
    Route::post('service/change/{id}', [ServiceController::class, 'update'])->name('admin.updateService');
    //order
    Route::get('order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('order/detail/{id}', [OrderController::class, 'detail'])->name('admin.detail');
    //book
    Route::get('book', [BookingController::class, 'index'])->name('admin.book');
});
/*Route::get('/', function () {
    return view('welcome');
});*/
