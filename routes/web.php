<?php
use App\Http\Controllers\admin\subcategorycontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\admin\productattributescontroller;
use App\Http\Controllers\admin\discountcontroller;
use App\Http\Controllers\seller\sellermaincontroller;
use App\Http\Controllers\seller\sellerproductcontroller;
use App\Http\Controllers\seller\sellerstorecontroller;
use App\Http\Controllers\seller\sellerordercontroller;


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
            Route::controller(subcategorycontroller::class)->group(function () {
                Route::get('/subcategory/create','create')->name('admin.subcategory.create');
                Route::get('/subcategory/manage','manage')->name('admin.subcategory.manage');
            });
        });
   });
   //seller route
Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function () {
     Route::controller(sellermaincontroller::class)->group(function () {
        Route::get('/dashboard','index')->name('vendor');
        Route::get('/order/history','orderhistory')->name('vendor.order.history');
    
          });
           Route::controller(sellerproductcontroller::class)->group(function () {
             Route::get('/product/create','create')->name('seller.product.create');
             Route::get('/product/manage','manage')->name('seller.product.manage');

          });
           Route::controller(sellerstorecontroller::class)->group(function () {
                Route::get('/store/create','create')->name('seller.store.create');
                Route::get('/store/manage','manage')->name('seller.store.manage');
    
          });


        
        });
   });
Route::middleware(['auth', 'verified', 'rolemanager:user'])->group(function () {
    Route::prefix('vendor')->group(function () {
     Route::controller(sellermaincontroller::class)->group(function () {

        Route::get('/dashboard','index')->name('dashboard');
        Route::get('/order/history','orderhistory')->name('vendor.order.history');
        Route::get('/affiliate','affiliate')->name('vendor.affiliate');
        Route::get('/payment','payment')->name('vendor.payment');
        

          });
         
        });
   });








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';