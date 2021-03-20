<?php

use Illuminate\Support\Facades\Route;
//Frontend
use App\Http\Controllers\Frontend\PagesController;

//Backend
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\ProfilesController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\MissionsController;
use App\Http\Controllers\Backend\VisionsController;
use App\Http\Controllers\Backend\NewsEventController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\AboutsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('aboutus');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contactus');
Route::post('/contact/store', [PagesController::class, 'contactStore'])->name('contactu.store');
Route::get('/news/event/{id}', [PagesController::class, 'newsDetail'])->name('news.event.details');
Route::get('/our/mission', [PagesController::class, 'mission'])->name('our.mission');
Route::get('/our/vision', [PagesController::class, 'vision'])->name('our.vision');
Route::get('/news/events', [PagesController::class, 'newsEvent'])->name('our.news.event');






Auth::routes();
//Admin Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    
    //User Routes
    Route::prefix('users')->group(function(){
        Route::get('/', [UsersController::class, 'index'])->name('user.index');
        Route::get('/create', [UsersController::class, 'create'])->name('user.create');
        Route::post('/store', [UsersController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UsersController::class, 'update'])->name('user.update');
        Route::post('/user/delete', [UsersController::class, 'delete'])->name('user.delete');
    });
    
    //User Profile Routes
    Route::prefix('profiles')->group(function(){
        Route::get('/', [ProfilesController::class, 'index'])->name('user.profiles');
        Route::get('/edit', [ProfilesController::class, 'edit'])->name('user.profile.edit');
        Route::post('/update', [ProfilesController::class, 'update'])->name('user.profile.update');
        Route::get('/user/change-password', [ProfilesController::class, 'changePassword'])->name('user.change.password');
        Route::post('/user/update-password', [ProfilesController::class, 'updatePassword'])->name('user.update.password');
    });
    
    //Logo Routes
    Route::prefix('logos')->group(function(){
        Route::get('/', [LogoController::class, 'index'])->name('user.logos');
        Route::get('/create', [LogoController::class, 'create'])->name('user.logo.create');
        Route::post('/store', [LogoController::class, 'store'])->name('user.logo.store');
        Route::get('/edit/{id}', [LogoController::class, 'edit'])->name('user.logo.edit');
        Route::post('/update/{id}', [LogoController::class, 'update'])->name('user.logo.update');
        Route::post('/logo/delete', [LogoController::class, 'delete'])->name('user.logo.delete');
    });
    
    //Slider Routes
    Route::prefix('sliders')->group(function(){
        Route::get('/', [SlidersController::class, 'index'])->name('user.sliders');
        Route::get('/create', [SlidersController::class, 'create'])->name('user.slider.create');
        Route::post('/store', [SlidersController::class, 'store'])->name('user.slider.store');
        Route::get('/edit/{id}', [SlidersController::class, 'edit'])->name('user.slider.edit');
        Route::post('/update/{id}', [SlidersController::class, 'update'])->name('user.slider.update');
        Route::post('/slider/delete', [SlidersController::class, 'delete'])->name('user.slider.delete');
    });
    
    //Mission Routes
    Route::prefix('missions')->group(function(){
        Route::get('/', [MissionsController::class, 'index'])->name('missions.index');
        Route::get('/create', [MissionsController::class, 'create'])->name('missions.create');
        Route::post('/store', [MissionsController::class, 'store'])->name('missions.store');
        Route::get('/edit/{id}', [MissionsController::class, 'edit'])->name('missions.edit');
        Route::post('/update/{id}', [MissionsController::class, 'update'])->name('missions.update');
        Route::post('/mission/delete', [MissionsController::class, 'delete'])->name('missions.delete');
    });
    
    //Vision  Routes
    Route::prefix('visions')->group(function(){
        Route::get('/', [VisionsController::class, 'index'])->name('visions.index');
        Route::get('/create', [VisionsController::class, 'create'])->name('visions.create');
        Route::post('/store', [VisionsController::class, 'store'])->name('visions.store');
        Route::get('/edit/{id}', [VisionsController::class, 'edit'])->name('visions.edit');
        Route::post('/update/{id}', [VisionsController::class, 'update'])->name('visions.update');
        Route::post('/vision/delete', [VisionsController::class, 'delete'])->name('visions.delete');
    });
    
    //News & Events  Routes
    Route::prefix('news_events')->group(function(){
        Route::get('/', [NewsEventController::class, 'index'])->name('news_events.index');
        Route::get('/create', [NewsEventController::class, 'create'])->name('news_event.create');
        Route::post('/store', [NewsEventController::class, 'store'])->name('news_event.store');
        Route::get('/edit/{id}', [NewsEventController::class, 'edit'])->name('news_event.edit');
        Route::post('/update/{id}', [NewsEventController::class, 'update'])->name('news_event.update');
        Route::post('/news_event/delete', [NewsEventController::class, 'delete'])->name('news_event.delete');
    });
    
    //Service  Routes
    Route::prefix('services')->group(function(){
        Route::get('/', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::post('/service/delete', [ServiceController::class, 'delete'])->name('service.delete');
    });
    
    //Contact  Routes
    Route::prefix('contacts')->group(function(){
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
        Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
        Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
        Route::post('/update/{id}', [ContactController::class, 'update'])->name('contact.update');
        Route::post('/contact/delete', [ContactController::class, 'delete'])->name('contact.delete');
        
        //Communicate
        Route::get('/communicate', [ContactController::class, 'viewCommunicate'])->name('contact.communicate');
        Route::post('/communicate/delete', [ContactController::class, 'deleteCommunicate'])->name('contact.communicate.delete');
    });
    
    //About  Routes
    Route::prefix('abouts')->group(function(){
        Route::get('/', [AboutsController::class, 'index'])->name('abouts.index');
        Route::get('/create', [AboutsController::class, 'create'])->name('about.create');
        Route::post('/store', [AboutsController::class, 'store'])->name('about.store');
        Route::get('/edit/{id}', [AboutsController::class, 'edit'])->name('about.edit');
        Route::post('/update/{id}', [AboutsController::class, 'update'])->name('about.update');
        Route::post('/about/delete', [AboutsController::class, 'delete'])->name('about.delete');
    });
    
    
});

