<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CheckoutVenueController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/venue/{id}',[HomeController::class,'venueDetailsView'])->name('venue.details');

Route::get('/shop',[HomeController::class,'venueShop'])->name('venue.shop');

Route::get('/home',[HomeController::class,'homePage'])->name('venue.home');

Route::post('/checkout/venue/{id?}',[CheckoutVenueController::class,'checkout'])->name('checkout');

Route::post('/user/review',[UserReviewController::class,'postUserReview'])->name('user.review');

Route::get('admin/user/review',[UserReviewController::class,'adminUserReview'])->name('admin.user.review');

Route::get('/user/request/venue',[UserReviewController::class,'requestVenue'])->name('request.venue');

Route::post('/user/request/venue/store',[UserReviewController::class,'requestVenueStore'])->name('request.venue.store');

Route::post('search',[HomeController::class,'search'])->name('search-products');


Route::middleware('adminMiddlware')->group(function () {


    //------------- ADMIN DASHBOARD ROUTES ----------------//
    Route::get('admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

    //------------- ORDER ROUTES ----------------//
    Route::get('admin/orders',[OrderController::class,'orders'])->name('orders.index');

    Route::get('admin/user/review',[UserReviewController::class,'adminUserReview'])->name('admin.user.review');


    //------------- EVENTS ROUTES ----------------//
    Route::get('admin/events',[EventController::class,'index'])->name('event.index');
    Route::get('admin/events/create',[EventController::class,'createEvent'])->name('event.create');
    Route::post('admin/events/store-event',[EventController::class,'storeEvent'])->name('event.store');
    Route::get('admin/events/edit/{id}',[EventController::class,'editEvent'])->name('event.edit');
    Route::put('admin/events/update/{id}',[EventController::class,'updateEvent'])->name('event.update');
    Route::delete('admin/events/delete/{id}',[EventController::class,'deleteEvent'])->name('event.delete');

    //------------- SERVICES ROUTES ----------------//
    Route::get('admin/services',[ServiceController::class,'index'])->name('service.index');
    Route::get('admin/services/create',[ServiceController::class,'createService'])->name('service.create');
    Route::post('admin/services/store/single',[ServiceController::class,'storeSingleService'])->name('service.store');

    Route::get('admin/services/edit/{id}',[ServiceController::class,'editService'])->name('service.edit');
    Route::put('admin/services/update/{id}',[ServiceController::class,'updateService'])->name('service.update');
    Route::delete('admin/services/delete/{id}',[ServiceController::class,'deleteService'])->name('service.delete');


    //------------- CATEGORY ROUTES ----------------//
    Route::get('admin/categories',[CategoryController::class,'index'])->name('category.index');
    Route::get('admin/categories/create',[CategoryController::class,'createCategory'])->name('category.create');
    Route::post('admin/categories/store',[CategoryController::class,'storeCategory'])->name('category.store');
    Route::get('admin/categories/edit/{id}',[CategoryController::class,'editCategory'])->name('category.edit');
    Route::put('admin/categories/update/{id}',[CategoryController::class,'updateCategory'])->name('category.update');
    Route::delete('admin/categories/delete/{id}',[CategoryController::class,'deleteCategory'])->name('category.delete');


    //------------- LOCATION ROUTES ----------------//
    Route::get('admin/locations',[LocationController::class,'index'])->name('location.index');
    Route::get('admin/locations/create',[LocationController::class,'createLocation'])->name('location.create');
    Route::post('admin/locations/store',[LocationController::class,'storeLocation'])->name('location.store');
    Route::get('admin/locations/edit/{id}',[LocationController::class,'editLocation'])->name('location.edit');
    Route::put('admin/locations/update/{id}',[LocationController::class,'updateLocation'])->name('location.update');
    Route::delete('admin/locations/delete/{id}',[LocationController::class,'deleteLocation'])->name('location.delete');

    //------------- VENUES ROUTES ----------------//
    Route::get('admin/venues',[VenueController::class,'indexVenue'])->name('venue.index');
    Route::get('admin/venues/create',[VenueController::class,'createVenue'])->name('venue.create');
    Route::post('admin/venues/store',[VenueController::class,'storeVenue'])->name('venue.store');
    Route::get('admin/venues/edit/{id}',[VenueController::class,'editVenue'])->name('venue.edit');
    Route::put('admin/venues/update/{id}',[VenueController::class,'updateVenue'])->name('venue.update');
    Route::delete('admin/venues/delete/{id}',[VenueController::class,'deleteVenue'])->name('venue.delete');

    //------------- VENEUES SERVICES ROUTES ----------------//
    Route::get('admin/venues/navigate-plans',[VenueController::class,'navigatePlan'])->name('create.plans');
    Route::get('admin/venues/add-services',[VenueController::class,'addServices'])->name('venue.add.services');
    Route::post('admin/venues/store-services',[VenueController::class,'storeServices'])->name('venue.store.services');
    Route::post('admin/venues/delete-services/venue/{venue_id}/service/{service_id}',[VenueController::class,'deleteVenueService'])->name('venue.delete.services');


    Route::get('admin/users',[HomeController::class,'index'])->name('users.index');

});


Route::post('location/search',[HomeController::class,'searchVenueLocation'])->name('location.home.search');





require __DIR__.'/auth.php';
