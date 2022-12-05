<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  route::middleware([LoginController::class])->group(function () {
    route::prefix('admin')->group(function () {

        route::get('/', function () {
            return view('admin.index');
        });
         //-----dang nhap-----
    route::get('/loginadmin', [LoginController::class, 'loginamin']);
    route::post('/loginadmin', [LoginController::class, 'loginadminpost']);
    route::get('/logoutadmin', [LoginController::class, 'logoutadmin']);

        //quan ly user
        route::prefix('users')->group(function () {
            route::get('/', [UsersController::class, 'index'])->name('index.users'); //index la get
            route::get('create', [UsersController::class, 'create']);
            route::post('store', [UsersController::class, 'store'])->name('store.users');
            route::post('store1', [UsersController::class, 'store1']);//->name('store.users');
            route::delete('destroy', [UsersController::class, 'destroy']);
            route::get('edit', [UsersController::class, 'edit']);
            //route::edit('edit', [UsersController::class, 'edit']);
        });
        //quan ly category
        route::prefix('category')->group(function () {
            route::get('/', [CategoryController::class, 'index']); 
            route::get('create', [CategoryController::class, 'create']);
            route::post('store', [CategoryController::class, 'store']);
            route::delete('destroy/{id}', [CategoryController::class, 'destroy']);
            route::get('edit/{id}', [CategoryController::class, 'edit']);
            route::put('update', [CategoryController::class, 'update']);
        }); 
        
        //quan ly product
        route::prefix('product')->group(function () {
            route::get('/', [ProductController::class, 'index']); 
            route::get('create', [ProductController::class, 'create']);
            route::post('store', [ProductController::class, 'store']);
            route::delete('destroy/{id}', [ProductController::class, 'destroy']);
            route::get('edit/{id}', [ProductController::class, 'edit']);
            route::put('update', [ProductController::class, 'update']);
        });     
    });
// });

route::get('/', [ProductController::class, 'trangchu']);

route::prefix('client')->group(function () {
    //-----dang nhap-----
    route::get('/loginuser', [LoginController::class, 'loginuser']);
    route::post('/loginuser', [LoginController::class, 'loginuserpost']);
    route::get('/logoutuser', [LoginController::class, 'logoutuser']);
    //-----dang ky-------
    route::get('/registeruser', [LoginController::class, 'register']);
    route::post('/registeruser', [LoginController::class, 'registerpost']);
    //-----trang san pham------


    route::get('/oto', [ProductController::class, 'oto']);
   
    route::get('/gioithieu', [ProductController::class, 'gioithieu']);
    route::get('/lienhe', [ProductController::class, 'lienhe']);



    //----tim,hien thi sp---
    route::get('/findlap', [ProductController::class, 'find']);
    route::get('/findbyid/{idcat}', [ProductController::class, 'findbyid']);
    route::get('/findbytenp/{ten}', [ProductController::class, 'findbytenp']);
    //------gio hang------
    route::get('/cart', [CartController::class, 'index']);
    route::get('/cart/add/{id}', [CartController::class, 'add']);
    route::get('/cart/remove/{id}', [CartController::class, 'remove']);

    route::post('/cart/edit', [CartController::class, 'edit']);
    //------check out----------
    route::get('/checkout',[CartController::class, 'checkout'])->middleware('ktUser');
    route::post('/checkout',[CartController::class, 'checkout1']);


});
///
route::get('/demo', [CartController::class, 'demo']);
//
route::get('/demoanh', [ProductController::class, 'demoanh']);
route::post('/demoanh7', [ProductController::class, 'demoanh7']);