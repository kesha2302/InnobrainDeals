<?php

use App\Http\Controllers\AdminAboutusController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPopularproductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ForgotpasswordController;
use App\Http\Controllers\GuestorderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// HomePage Details
Route::get('/',[HomeController::class,'index']);
Route::get('/About',[HomeController::class,'About']);
Route::get('/Service',[HomeController::class,'Service']);
Route::get('/Contact',[HomeController::class,'Contact']);
Route::get('/Product',[HomeController::class,'Product']);

Route::get('/banners', [HomeController::class, 'banner']);
Route::get('/allproducts', [HomeController::class, 'allproducts']);
Route::get('/category/{id}', [HomeController::class, 'categoryshow'])->name('category.show');
Route::get('/popularproducts', [HomeController::class, 'popularproducts']);

//Login and Forgot Password
Route::get('/Login',[LoginController::class,'loginview']);
Route::get('/register',[LoginController::class,'registerview']);
Route::post('/Signup2', [LoginController::class, 'signupdata']);
Route::post('/Login2',[LoginController::class, 'logindata']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forgotpassword',[ForgotpasswordController::class,'forgotpasswordload']);
Route::post('/resetpasswordlink', [ForgotpasswordController::class, 'forgotpassword'])->name('resetpasswordlink');
Route::get('/reset-password',[ForgotpasswordController::class,'resetpasswordload']);
Route::post('/resetpasswordset', [ForgotpasswordController::class, 'resetpassword'])->name('resetpasswordset');


//Cart Details
Route::get('/cart',[CartController::class,'cart'])->name('cart.view');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class,'removeFromCart'])->name('cart.remove');


// Checkout Details
Route::get('/checkoutpage',[CheckoutController::class,'checkout']);
Route::post('/checkout-submit', [CheckoutController::class, 'checkoutSubmit'])->name('checkout.submit');

// Payment Raoutes
Route::post('/handlepayment',[PaymentController::class,'handlepayment']);

// Profile Routes
Route::get('/edit-profile', [ProfileController::class, 'edit']);
Route::post('/edit-profile2', [ProfileController::class, 'update']);
Route::get('/orderhistory',[ProfileController::class, 'orderhistory']);

//Admin Details
Route::get('/Admin', [AdminController::class, 'adminhome']);

Route::get('/Admin_customersdetail', [AdminController::class, 'admincustomerdetail']);
Route::get('/Admin_guestuserdetail', [AdminController::class, 'guestuserdetail']);
Route::get('/Adminorder', [AdminController::class, 'adminorder'])->name('Adminorder');
Route::get('/Admincheckoutdetails', [AdminController::class, 'admincheckout']);
Route::get('/Admin_guestorders', [AdminController::class, 'guestorderdetail'])->name('Admin_guestorders');
Route::get('/Admincartsession', [AdminController::class, 'cartsession']);
Route::delete('/admin/cartsessions/delete', [AdminController::class, 'deleteAll'])->name('admin.cartsessions.delete');


// Admin Login
Route::get('/AdminSignup', [AdminLoginController::class, 'signup']);
Route::post('/AdminSignup2', [AdminLoginController::class, 'signupdata'])->name('registerdata');
Route::get('/Adminlogin', [AdminLoginController::class, 'login']);
Route::post('/Adminlogin2',[AdminLoginController::class, 'logindata']);
Route::post('/Adminlogout', [AdminLoginController::class, 'logout'])->name('adminlogout');
Route::get('/Resetpassword', [AdminLoginController::class,'resetpassword']);
Route::post('/password/reset', [AdminLoginController::class,'reset']);



// Admin Banner Details
Route::get('/Adminbannerdetail',[AdminBannerController::class,'adminbannerdetailview']);
Route::get('/Adminbannerdetailform',[AdminBannerController::class,'adminbannerdetailform']);
Route::post('/Adminbannerdetailform2', [AdminBannerController::class, 'bannerdetaildata']);
Route::get('/Adminbannerdetailtrash',[AdminBannerController::class,'bannerdetailtrash']);
Route::get('/bannerdetail/delete/{id}',[AdminBannerController::class,'bannerdetaildelete'])->name('bannerdetail.delete');
Route::get('/bannerdetail/frocedelete/{id}',[AdminBannerController::class,'bannerdetailforcedelete'])->name('bannerdetail.forcedelete');
Route::get('/bannerdetail/restore/{id}',[AdminBannerController::class,'bannerdetailrestore'])->name('bannerdetail.restore');
Route::get('/bannerdetail/edit/{id}',[AdminBannerController::class,'bannerdetailedit'])->name('bannerdetail.edit');
Route::post('/bannerdetail/update/{id}',[AdminBannerController::class,'bannerdetailupdate'])->name('bannerdetail.update');


// Admin Aboutus Details
Route::get('/Adminaboutus', [AdminAboutusController::class, 'adminaboutus']);
Route::get('/Adminaboutusform', [AdminAboutusController::class, 'adminaboutusform']);
Route::post('/Adminaboutusform2', [AdminAboutusController::class, 'aboutusform']);
Route::get('/Adminaboutustrash',[AdminAboutusController::class,'aboutustrash']);
Route::get('/aboutus/edit/{id}',[AdminAboutusController::class,'aboutusedit'])->name('aboutus.edit');
Route::post('/aboutus/update/{id}',[AdminAboutusController::class,'aboutusupdate'])->name('aboutus.update');
Route::get('/aboutus/delete/{id}',[AdminAboutusController::class,'aboutusdelete'])->name('aboutus.delete');
Route::get('/aboutus/frocedelete/{id}',[AdminAboutusController::class,'aboutusforcedelete'])->name('aboutus.forcedelete');
Route::get('/aboutus/restore/{id}',[AdminAboutusController::class,'aboutusrestore'])->name('aboutus.restore');


// Admin Contact Details
Route::get('/Admincontact', [AdminContactController::class, 'admincontact']);
Route::get('/Admincontactform', [AdminContactController::class, 'admincontactform']);
Route::post('/Admincontactform2', [AdminContactController::class, 'contactform']);
Route::get('/contact/edit/{id}',[AdminContactController::class,'contactedit'])->name('contact.edit');
Route::post('/contact/update/{id}',[AdminContactController::class,'contactupdate'])->name('contact.update');
Route::get('/contact/delete/{id}',[AdminContactController::class,'contactdelete'])->name('contact.delete');


// Admin Category Details
Route::get('/Admincategory', [AdminCategoryController::class, 'admincategory']);
Route::get('/Admincategoryform', [AdminCategoryController::class, 'admincategoryform']);
Route::post('/Admincategoryform2', [AdminCategoryController::class, 'categoryform']);
Route::get('/Admincategorytrash',[AdminCategoryController::class,'categorytrash']);
Route::get('/category/edit/{id}',[AdminCategoryController::class,'categoryedit'])->name('category.edit');
Route::post('/category/update/{id}',[AdminCategoryController::class,'categoryupdate'])->name('category.update');
Route::get('/category/delete/{id}',[AdminCategoryController::class,'categorydelete'])->name('category.delete');
Route::get('/category/frocedelete/{id}',[AdminCategoryController::class,'categoryforcedelete'])->name('category.forcedelete');
Route::get('/category/restore/{id}',[AdminCategoryController::class,'categoryrestore'])->name('category.restore');


// Admin Product Details
Route::get('/Adminproduct', [AdminProductController::class, 'adminproduct']);
Route::get('/Adminproductform', [AdminProductController::class, 'adminproductform']);
Route::post('/Adminproductform2', [AdminProductController::class, 'productform']);
Route::get('/Adminproducttrash',[AdminProductController::class,'producttrash']);
Route::get('/product/edit/{id}',[AdminProductController::class,'productedit'])->name('product.edit');
Route::post('/product/update/{id}',[AdminProductController::class,'productupdate'])->name('product.update');
Route::get('/product/delete/{id}',[AdminProductController::class,'productdelete'])->name('product.delete');
Route::get('/product/frocedelete/{id}',[AdminProductController::class,'productforcedelete'])->name('product.forcedelete');
Route::get('/product/restore/{id}',[AdminProductController::class,'productrestore'])->name('product.restore');


//Admin Registeruser OrderController(Activation Link)
Route::get('/Adminorder/{orderId}', [OrderController::class, 'viewOrder'])->name('admin.viewOrder');
Route::get('/send-activation/{orderId}/{productId}', [OrderController::class, 'showActivationForm'])->name('send.activation');
Route::post('/send-activationlink', [OrderController::class, 'sendActivation'])->name('send.activationlink');


//Admin Guestuser GuestorderController(Activation Link)
Route::get('/Adminguestorder/{gorderId}', [GuestorderController::class, 'viewOrder'])->name('admin.guestviewOrder');
Route::get('/Sendactivationlink/{orderId}/{productId}', [GuestorderController::class, 'showActivationForm'])->name('send.guestactivation');
Route::post('/send-guestactivationlink', [GuestorderController::class, 'sendActivation'])->name('send.guestactivationlink');


//Admin Popular Products Routes
Route::get('/Adminpopularproducts', [AdminPopularproductController::class, 'popularproductview']);
Route::get('/Adminpopularproductform', [AdminPopularproductController::class, 'adminpopularproductform']);
Route::post('/Adminpopularproductform2', [AdminPopularproductController::class, 'popularproductform']);
Route::get('/popularproduct/delete/{id}',[AdminPopularproductController::class,'popularproductdelete'])->name('pp.delete');
