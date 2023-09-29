<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TimingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\AppSettingsController;
use App\Http\Controllers\BusinessDetailController;

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

Route::get('/email/verify', function () {
    return Inertia::render('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');


Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('/all-cities', 'view_all_cities')->name('all-cities');
    Route::get('/all-categories', 'view_all_categories')->name('all-categories');
    Route::get('/all-listings', 'view_all_listings')->name('all-listings');
    Route::get('/view/{url}', 'view_single_business')->name('view');
    Route::get('/cat/{url}', 'filter_by_category')->name('cat');
    Route::post('set-location', 'set_location')->name('set-location');
    Route::post('search_listings', 'search_listings')->name('search_listings');
    Route::post('search_with_cat_loc', 'search_with_cat_loc')->name('search_with_cat_loc');
    Route::get('filter-by-city/{url}', 'filter_by_city')->name('filter-by-city');
    Route::get('view-blogs', 'view_all_blogs')->name('view-blogs');
    Route::get('blog-by-cat/{url}', 'blog_by_cat')->name('blog-by-cat');
    Route::get('single-blogs/{url}', 'single_blog')->name('single-blogs');
    Route::post('submit-news-letter', 'submitNewsLetter')->name('submit-news-letter');
    Route::get('subscribe-success', 'subscribeSuccess')->name('subscribe-success');
    Route::get('page/{url}', 'view_page')->name('page');
   
});

Route::controller(UserPagesController::class)->group(function () {
    Route::get('login', 'userLogin')->name('login')->middleware('guest');
    Route::get('registration', 'userRegistration')->name('registration')->middleware('guest');
    Route::get('to-dashboard', 'toDashboard')->name('to-dashboard')->middleware(['auth', 'is_verified']);
    Route::get('user-dashboard', 'dashboard')->name('user-dashboard')->middleware(['auth', 'is_verified']);
    Route::get('my-listing', 'my_listing')->name('my-listing')->middleware(['auth', 'is_verified']);
    Route::get('profile', 'profile')->name('profile')->middleware(['auth', 'is_verified']);
    Route::get('bookmarks', 'bookmarks')->name('bookmarks')->middleware(['auth', 'is_verified']);
    Route::get('reviews', 'reviews')->name('reviews')->middleware(['auth', 'is_verified']);
    Route::get('active-plan', 'active_plan')->name('active-plan')->middleware(['auth', 'is_verified']);
    Route::get('payments', 'payment_history')->name('payments')->middleware(['auth', 'is_verified']);
    Route::get('user-settings', 'user_settings')->name('user-settings')->middleware(['auth', 'is_verified']);
    Route::get('user-messages', 'user_messages')->name('user-messages')->middleware(['auth', 'is_verified']);
    Route::get('new-listing', 'new_listing')->name('new-listing')->middleware(['auth', 'is_verified']);
    Route::get('choos-package', 'choos_package')->name('choos-package')->middleware(['auth', 'is_verified']);
    Route::get('user-profile-image', 'userProfileImage')->name('user-profile-image')->middleware(['auth', 'is_verified']);
   

});

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->middleware('admin')->name('admin_checkclear');
    Route::get('admin/dashboard', 'index')->middleware('admin')->name('dashboard');
    Route::get('admin/login', 'login')->middleware(['admin_check', 'guest'])->name('admin/login');
    Route::get('admin/password-settings', 'password_settings')->middleware('admin')->name('password-settings');
    Route::post('change-password', 'change_password')->middleware('admin')->name('change-password');
});

Route::controller(SiteInfoController::class)->group(function () {
    Route::post('upload-site-logo', 'upload_site_logo')->middleware('admin')->name('upload-site-logo');
    Route::post('upload-fav-icon', 'upload_fav_icon')->middleware('admin')->name('upload-fav-icon');
    Route::post('update-about', 'update_about')->middleware('admin')->name('update-about');
    Route::post('update-contact-details', 'update_contact_details')->middleware('admin')->name('update-contact-details');
    Route::post('update-social-links', 'update_social_links')->middleware('admin')->name('update-social-links');
   
});

Route::resource('purchase', PurchaseController::class)->middleware('auth');
Route::controller(PurchaseController::class)->group(function () {
    Route::get('create-transaction', 'createTransaction')->middleware('auth')->name('create-transaction');
    Route::get('process-transaction', 'processTransaction')->middleware('auth')->name('process-transaction');
    Route::get('success-transaction', 'successTransaction')->middleware('auth')->name('success-transaction');
    Route::get('cancel-transaction', 'cancelTransaction')->middleware('auth')->name('cancel-transaction');
    Route::get('payment-success', 'paymentSuccess')->middleware('auth')->name('payment-success');

    //PurchaseController Admin Routes
    Route::get('admin/payment-history', 'paymentHistory')->middleware('admin')->name('admin/payment-history');
    Route::get('admin/transaction-history', 'transactionHistory')->middleware('admin')->name('admin/transaction-history');
    
});


Route::controller(UserController::class)->group(function () {
    Route::get('admin/view-users', 'viewUsers')->middleware('admin')->name('admin/view-users');
    Route::delete('remove-user/{id}', 'removeUser')->middleware('auth')->name('remove-user');
    Route::get('admin/view-trashed-users', 'userTrash')->middleware('admin')->name('admin/view-trashed-users');
    Route::delete('restore-user/{id}', 'restoreUser')->middleware('auth')->name('restore-user');
    Route::post('update-profile', 'updateProfile')->middleware('auth')->name('update-profile');
    Route::post('upload-profile-image', 'uploadProfileImage')->name('upload-profile-image')->middleware(['auth', 'is_verified']);
    Route::post('crop-profile-image', 'cropProfileImage')->name('crop-profile-image')->middleware(['auth', 'is_verified']);
    Route::post('update-bookmark', 'updateBookMark')->name('update-bookmark')->middleware(['auth']);
    Route::delete('remove-bookmark/{id}', 'removeBookmark')->name('remove-bookmark')->middleware(['auth']);
    
});


Route::resource('listing', ListingController::class)->middleware(['auth', 'is_verified']);
Route::controller(ListingController::class)->group(function () {
    Route::get('add-business-logo/{lid}', 'addBusienssLogo')->middleware('auth')->name('add-business-logo');
    Route::put('upload-business-logo/{lid}', 'uploadBusinessLogo')->middleware('auth')->name('upload-business-logo');
    Route::post('crope-business-logo', 'cropBusinessLogo')->middleware('auth')->name('crope-business-logo');

    //Admin Routes 
    Route::get('admin/view-all-listing', 'viewAllListings')->middleware(['auth', 'admin'])->name('admin/view-all-listing');
    Route::get('admin/view-trash-listing', 'viewTrashListings')->middleware(['auth', 'admin'])->name('admin/view-trash-listing');
    Route::put('update-listing-featured', 'update_listing_featured')->middleware('admin')->name('update-listing-featured');
    Route::delete('restore-listing/{id}', 'restoreListing')->middleware( 'admin')->name('restore-listing');
});

Route::resource('busines-detail', BusinessDetailController::class)->middleware(['auth', 'is_verified']);
Route::resource('service', ServiceController::class)->middleware(['auth', 'is_verified']);
Route::resource('product', ProductController::class)->middleware(['auth', 'is_verified']);
Route::resource('gallery', GalleryController::class)->middleware(['auth', 'is_verified']);
Route::resource('timing', TimingController::class)->middleware(['auth', 'is_verified']);
Route::resource('rating', RatingController::class)->middleware(['auth', 'is_verified']);
Route::resource('message', MessageController::class);
Route::get('admin/viewMessages', [MessageController::class, 'create'])->middleware('admin')->name('admin/viewMessages');
Route::put('updaterating/{id}', [RatingController::class, 'updaterating'])->middleware('auth')->name('updaterating');
Route::delete('deleterating/{id}', [RatingController::class, 'deleterating'])->middleware('auth')->name('deleterating');


// Location Route
Route::resource('admin/location', LocationController::class)->middleware('admin');
Route::put('update-location-featured', [LocationController::class, 'update_location_featured'])->middleware('admin')->name('update-location-featured');

Route::resource('admin/category', CategoryController::class)->middleware('admin');
Route::put('update-category-featured', [CategoryController::class, 'update_category_featured'])->middleware('admin')->name('update-category-featured');

Route::resource('admin/package', PackagesController::class)->middleware('admin');
Route::resource('admin/blog', BlogController::class)->middleware('admin');
Route::controller(BlogController::class)->group(function () {
    Route::get('admin/blog-image/{lid}', 'blogImage')->middleware('admin')->name('admin/blog-image');
    Route::get('admin/blog-detail/{lid}', 'blogDetail')->middleware('admin')->name('admin/blog-detail');
    Route::post('crope-blog-image', 'cropBlogImage')->middleware('admin')->name('crope-blog-image');
    Route::post('update-blog-detail', 'updateBlogDetail')->middleware('admin')->name('update-blog-detail');
});

//Subscriber Routes
Route::resource('admin/subscriber', SubscriberController::class)->middleware('admin');
Route::resource('admin/pages', PageController::class)->middleware('admin');


// Load More from Detail Page
Route::get('getMoreServices/{bid}/{ofset}', [ServiceController::class, 'getMoreServices'])->name('getMoreServices');
Route::get('getMoreProducts/{bid}/{ofset}', [ProductController::class, 'getMoreProducts'])->name('getMoreProducts');
Route::get('getMoreReviews/{bid}/{ofset}', [RatingController::class, 'getMoreReviews'])->name('getMoreReviews');
Route::get('getMoreGallery/{bid}/{ofset}', [GalleryController::class, 'getMoreGallery'])->name('getMoreGallery');



Route::resource('admin/app-settings', AppSettingsController::class)->middleware('admin');
Route::resource('admin/siteinfo', SiteInfoController::class)->middleware('admin');


Route::get('seed/{table}', [CommonController::class, 'seed']);



// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


require __DIR__.'/auth.php';
