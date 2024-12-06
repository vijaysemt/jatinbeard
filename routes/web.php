<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Website;

use App\Http\Controllers\ContactformController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\CmspageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductgallController;
use App\Http\Controllers\TopbarController;
use App\Http\Controllers\couponController;
use App\Http\Controllers\HomeController;


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



Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/best-seller', [FrontendController::class, 'best_seller'])->name('best-seller');
//Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/product/{id}/{name}',[FrontendController::class, 'product'])->name('product');
Route::get('/chandar-prakash-vyas', [FrontendController::class, 'chandar_prakash_vyas'])->name('chandar-prakash-vyas');
Route::get('/rahul-tanvi', [FrontendController::class, 'rahul_tanvi'])->name('rahul-tanvi');
Route::get('/tanvi-jain', [FrontendController::class, 'tanvi_jain'])->name('tanvi-jain');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');

Route::get('/support/{id}/{name}',[FrontendController::class, 'support'])->name('support');

Route::get('/about-us', [FrontendController::class, 'aboutus'])->name('about-us');
Route::get('/testimonials', [FrontendController::class, 'testimonials'])->name('testimonials');
Route::get('/courses/{id}', [FrontendController::class, 'courses'])->name('hello');
Route::get('/privacy-policy', [FrontendController::class, 'privacypolicy'])->name('privacypolicy');
Route::post('/addregnum/',[FrontendController::class, 'addregnum'])->name('addregnum');
Route::post('/contactinfo/',[FrontendController::class, 'contactinfo'])->name('contactinfo');
Route::post('/borrowreginfo/',[FrontendController::class, 'borrowreginfo'])->name('borrowreginfo');
Route::get('/loan_detail{id}',[FrontendController::class, 'loan_detail'])->name('loan_detail');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');






// ----contact form routes

Route::get('/testview', [Website::class, 'index'])->name('testview');
Route::post('/post-message', [ContactformController::class, 'postmessage'])->name('post-message');


Route::get('/testborrow', [Website::class, 'testborrow'])->name('testborrow');
Route::post('/post-borrow', [BorrowFormController::class, 'postborrow'])->name('post-borrow');


Route::fallback(function() {
    return view('404');
});

Auth::routes([
    'register' => false,
    'reset' => false
]);

// Superadmin Route


Route::get('/admin', [FrontendController::class, 'admin'])->name('admin');
Route::get('/dashboard/data', [HomeController::class, 'fetchData'])->name('dashboard.data');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function () {
//     Route::post('add-to-cart',[CartController::class, 'addproduct']);
// });


    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkoutget');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/processCheckout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');
    Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

    Route::post('payment/callback', [CartController::class, 'handleRazorpayCallback']);
    Route::get('/coupons/get/{name}',[couponController::class, 'get'])->name('coupons.get');
    
    ///////////////////////////START///////////////////////////////
    
    Route::post('/create-order', [CartController::class, 'createOrder']);
    Route::post('/verify-payment', [CartController::class, 'verifyPayment']);
    Route::get('/payment-success/{orderId}', [CartController::class, 'showSuccessPage'])->name('payment.success');
    ///////////////////////////END///////////////////////////////


Route::middleware(['auth', 'isAdmin'])->group(function () {

    //Only redirection links
    Route::get('/profile', [AdminController::class,'profile'])->name('profile');
    Route::put('/admin/user/{id}/update-password', [AdminController::class, 'updatePassword'])->name('admin.update.password');

    Route::get('/productlist', [ProductController::class,'productlist'])->name('productlist');
    Route::get('/createproduct', [ProductController::class,'createproduct'])->name('createproduct');
    Route::post('/addproductinfo/',[ProductController::class, 'addproductinfo'])->name('addproductinfo');
    Route::get('/updateproduct/{id}/{edit}',[ProductController::class, 'updateproduct'])->name('updateproduct');
    Route::post('/updateproductinfo/{id}',[ProductController::class, 'updateproductinfo'])->name('updateproductinfo');
    Route::get('/deleteproduct/{id}/{delete}',[ProductController::class, 'deleteproduct'])->name('deleteproduct');

    Route::get('/categorylist/',[CategoryController::class, 'categorylist'])->name('categorylist');
    Route::get('/createcategory/',[CategoryController::class, 'createcategory'])->name('createcategory');
    Route::post('/addcategoryinfo/',[CategoryController::class, 'addcategoryinfo'])->name('addcategoryinfo');
    Route::get('/updatecategory/{id}/{edit}',[CategoryController::class, 'updatecategory'])->name('updatecategory');
    Route::post('/updatecategoryinfo/{id}',[CategoryController::class, 'updatecategoryinfo'])->name('updatecategoryinfo');
    Route::get('/deletecategory/{id}/{delete}',[CategoryController::class, 'deletecategory'])->name('deletecategory');

    Route::get('/labellist/',[LabelController::class, 'labellist'])->name('labellist');
    Route::get('/createlabel/',[LabelController::class, 'createlabel'])->name('createlabel');
    Route::post('/addlabelinfo/',[LabelController::class, 'addlabelinfo'])->name('addlabelinfo');
    Route::get('/updatelabel/{id}/{edit}/',[LabelController::class, 'updatelabel'])->name('updatelabel');
    Route::post('/updatelabelinfo/{id}',[LabelController::class, 'updatelabelinfo'])->name('updatelabelinfo');
    Route::get('/deletelabel/{id}/{delete}',[LabelController::class, 'deletelabel'])->name('deletelabel');


    Route::get('/trendinglist/',[TrendingController::class, 'trendinglist'])->name('trendinglist');
    Route::get('/createtrending/',[TrendingController::class, 'createtrending'])->name('createtrending');
    Route::post('/addtrendinginfo/',[TrendingController::class, 'addtrendinginfo'])->name('addtrendinginfo');
    Route::get('/updatetrending/{id}/{edit}/',[TrendingController::class, 'updatetrending'])->name('updatetrending');
    Route::post('/updatetrendinginfo/{id}',[TrendingController::class, 'updatetrendinginfo'])->name('updatetrendinginfo');
    Route::get('/deletetrending/{id}/{delete}',[TrendingController::class, 'deletetrending'])->name('deletetrending');


    Route::get('/pagelist/',[CmspageController::class, 'pagelist'])->name('pagelist');
    Route::get('/createcmspage/',[CmspageController::class, 'createcmspage'])->name('createcmspage');
    Route::post('/addcmspageinfo/',[CmspageController::class, 'addcmspageinfo'])->name('addcmspageinfo');
    Route::get('/updatecmspage/{id}/{edit}/',[CmspageController::class, 'updatecmspage'])->name('updatecmspage');
    Route::post('/updatecmspageinfo/{id}',[CmspageController::class, 'updatecmspageinfo'])->name('updatecmspageinfo');
    Route::get('/deletecmspage/{id}/{delete}',[CmspageController::class, 'deletecmspage'])->name('deletecmspage');

    Route::get('/productgall/',[ProductgallController::class, 'index'])->name('productgall');
    Route::get('/createpgallery/',[ProductgallController::class, 'createpgallery'])->name('createpgallery');
    Route::post('/addpgalleryinfo/',[ProductgallController::class, 'addpgalleryinfo'])->name('addpgalleryinfo');
    Route::get('/deletepgall/{id}/{delete}',[ProductgallController::class, 'deletepgall'])->name('deletepgall');


    Route::get('/sliderlist/',[SliderController::class, 'sliderlist'])->name('sliderlist');
    Route::get('/createslider/',[SliderController::class, 'createslider'])->name('createslider');
    Route::post('/addsliderinfo/',[SliderController::class, 'addsliderinfo'])->name('addsliderinfo');
    Route::get('/updateslider/{id}/{edit}/',[SliderController::class, 'updateslider'])->name('updateslider');
    Route::post('/updatesliderinfo/{id}',[SliderController::class, 'updatesliderinfo'])->name('updatesliderinfo');
    Route::get('/deleteslider/{id}/{delete}',[SliderController::class, 'deleteslider'])->name('deleteslider');

    Route::get('/orders/',[OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/view/{id}',[OrdersController::class, 'view'])->name('orders.view');

    Route::get('/coupons/',[couponController::class, 'index'])->name('coupons.index');
    Route::get('/coupons/create',[couponController::class, 'create'])->name('coupons.create');
    Route::post('/coupons/create',[couponController::class, 'store'])->name('coupons.store');
    Route::get('/coupons/edit/{id}',[couponController::class, 'edit'])->name('coupons.edit');
    Route::put('/coupons/edit/{id}',[couponController::class, 'update'])->name('coupons.update');
    Route::delete('/coupons/delete/{id}',[couponController::class, 'destroy'])->name('coupons.delete');

    Route::get('/topbar/',[TopbarController::class, 'topbar'])->name('topbar');
    Route::post('/addtopbarinfo/{id}',[TopbarController::class, 'addtopbarinfo'])->name('addtopbarinfo');


});

