<?php
use App\Http\Controllers\admin\subcategorycontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\admin\productattributescontroller;
use App\Http\Controllers\admin\discountcontroller;
use App\Http\Controllers\seller\sellermaincontroller;
use App\Http\Controllers\seller\sellerproductcontroller;
use App\Http\Controllers\seller\sellerstorecontroller;
use App\Http\Controllers\seller\sellerordercontroller;
use App\Http\Controllers\customer\customermaincontroller;
use App\Http\Controllers\maincatgorycontroller;
use App\Http\Controllers\mainsubcategories;

Route::get('/', function () {
    return view('welcome');
});

// Main dashboard route with role-based redirection
Route::get('/dashboard', function () {
    $user = Auth::user();
    
    if (!$user) {
        return redirect()->route('login');
    }
    
    switch ($user->role) {
        case 0: // Admin
            return redirect()->route('admin');
        case 1: // Vendor
            return redirect()->route('vendor');  
        case 2: // Customer
            return redirect()->route('customer.dashboard');
        default:
            return redirect('/');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

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
            Route::controller(maincatgorycontroller::class)->group(function () {
            Route::post('/category', 'store')->name('admin.maincategory.create'); // create/save
            Route::get('/category/{id}/edit', 'edit')->name('admin.maincategory.edit'); // show edit form
            Route::put('/category/{id}', 'update')->name('admin.maincategory.update');
            Route::delete('/category/{id}', 'delete')->name('admin.maincategory.delete'); // delete category
});
  Route::controller(mainsubcategories::class)->group(function () {
            Route::post('/subcategory', 'store')->name('admin.mainsubcategory.store'); // create/save
          
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

   //customer route
Route::middleware(['auth', 'verified', 'rolemanager:user'])->group(function () {
    Route::prefix('customer')->group(function () {
     Route::controller(customermaincontroller::class)->group(function () {
        Route::get('/dashboard','index')->name('customer.dashboard');
        Route::get('/order-history','order_history')->name('customer.order.history');
        Route::get('/affiliate','affiliate')->name('customer.affiliate');
        Route::get('/payment','payment')->name('customer.payment');
        Route::get('/profile','profile')->name('customer.profile');
          });
        });
   });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';