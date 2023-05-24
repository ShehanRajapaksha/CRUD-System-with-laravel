<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminListingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ListingController as ControllersAdminListingController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Frontend\ListingController as FrontendListingController;
use App\Http\Controllers\InviteLinkController;
use App\Http\Controllers\LCommentController;
use App\Http\Controllers\ListerRegisterController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;

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

Route::post('postregister',[ListerRegisterController::class,'registersave'])->name('registersave');

Route::get('/', [FrontendListingController::class,'welcome'])->name('welcome');


Route::get('/all-listings',[FrontendListingController::class,'index'])->name('all.listings');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // 'role:admin'
])->group(function () {
    Route::get('/dashboard', function () {
       
        // auth()->user()->assignRole('admin');
        return view('dashboard');
    })->name('dashboard');

  
     
    // Route::get('ads/create',[ListingController::class,'create'])->name('ads.create');
    // Route::post('listings/store',[ListingController::class,'store'])->name('listings.store');
    // Route::get('listings',[ListingController::class,'index'])->middleware(('auth'))->name('listings.index');
    // Route::get('listings',[ListingController::class,'index'])->middleware(('auth'))->name('listings.index');
    Route::resource('listings',ListingController::class)->middleware('auth');
});

Route::middleware(['auth:sanctum','role:admin'])->prefix('admin')->name('admin.')->group(function(){
                Route::get('/',[AdminController::class,'index'])->name('index');
                Route::resource('categories',CategoryController::class);
                Route::resource('listings',ControllersAdminListingController::class);
                Route::resource('subcategories',SubCategoryController::class);
                Route::resource('childcategories',ChildCategoryController::class);
                Route::resource('countries',CountryController::class);
                Route::resource('states', StateController::class);
                Route::resource('cities',CityController::class);
                
            });
Route::get('posts',[PostController::class,'index']);
Route::resource('posts',PostController::class);
Route::post('/lcomments/{id}/publish', [LCommentController::class,'publish'])->name('lcomments.publish');
Route::resource('lcomments',LCommentController::class);
Route::get('posts/{post_id}',[PostController::class,'show'])->name('show');
Route::resource('comments',CommentController::class);
Route::post('comments',[CommentController::class,'store'])->name('comments.store');
Route::get('all-listings/{listing_id}',[FrontendListingController::class,'show'])->name('show');
Route::get('listings/{listing_id}',[FrontendListingController::class,'show'])->name('show');
Route::post('lcomments',[LCommentController::class,'store'])->name('lcomments.store');
Route::post('store/mail',[InviteLinkController::class,'create'])->name('email.store');
Route::get('/lister/register/{link?}',[ListerRegisterController::class,'register']) ->where('link', '[A-Za-z0-9]+')->name('register');



