<?php
use App\Http\Controllers\admin\subcategorycontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\admin\productattributescontroller;
use App\Http\Controllers\admin\discountcontroller;


Route::get('/', function () {
    return view('welcome');
});
//admin route
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
     Route::controller(admincontroller::class)->group(function () {
     Route::get('/dashboard','index')->name('admin');
      Route::get('/setting','setting')->name('admin.setting');
       Route::get('/manage/user','manage_user')->name('admin.manage.user');
        Route::get('/manage/store','manage_store')->name('admin.manage.store');
         Route::get('/cart/history','cart_history')->name('admin.cart.history');
         Route::get('/order/history','order_history')->name('admin.order.history');
          });
               Route::controller(categorycontroller::class)->group(function () {
               Route::get('/category/create','category_create')->name('admin.category.create');
               Route::get('/category/manage','category_manage')->name('admin.category.manage');
          });

               Route::controller(productcontroller::class)->group(function () {
                Route::get('/product/manage_product_review','manage_product_review')->name('admin.product.manage_product_review');
                Route::get('/product/manage_product','product_manage_product')->name('admin.product.manage_product');
          });
          Route::controller(productattributescontroller::class)->group(function () {
                Route::get('/product_attributes/create','create')->name('admin.product_attributes.create');
                Route::get('/product_attributes/manage','manage')->name('admin.product_attributes.manage');
          });
            Route::controller(discountcontroller::class)->group(function () {
                Route::get('/discount/create','create')->name('admin.discount.create');
                Route::get('/discount/manage','manage')->name('admin.discount.manage');

            });
   
      });
      
   




Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified', 'rolemanager:vendor'])->name('vendor');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
