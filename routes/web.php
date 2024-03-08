<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\event\BookController;
use App\Http\Controllers\event\EventController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TiketfpdfController;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

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
Route::resource('/home',EventoController::class);

Route::get('/auth', function () {
    return view('pages.authentification.login');
});

Route::post('/auth',[AuthController::class, 'Register'])->name('Register');
Route::post('/login',[AuthController::class, 'Login'])->name('Login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/you forgot your password',function(){
    return view('pages.resset_pass.email_resset');
})->name('resset_pass');
Route::post('/you forgot your password',[AuthController::class, 'ForgetPassword'])->name('ForgetPassword');
Route::get('/resset_password',function(){
    return view('pages.resset_pass.new_pass');
})->name('update_password');
Route::post('/update your password',[AuthController::class, 'resetPassword'])->name('resetPassword');

Route::get('/dash',function(){
    return view("admin.index");
});

Route::get('/category',function(){
    return view('admin.category.index');
});

Route::resource('/event', EventController::class)->names([
    'index' => 'event',
    'store' => 'Event_Store',
    // 'show' => 'event_show',
    'edit' => 'event_edit',
    'update'=>'event_update',
    'destroy' => 'event_destroy',
])->middleware('Role:organ');

Route::get('/event_details/{id}', [EventController::class, 'show'])->name('event_show');

Route::get('/event list', function () {
    $events = Event::with('cetegory')->get();
    $categories = Category::all();

    return view('admin.event.index', compact('events', 'categories'));
})->middleware('Role:admin');

Route::put('/event/{id}/status', [EventController::class, 'updateStatus'])->name('event_status');

Route::put('auto/{id}', [EventController::class, 'auto'])->name('auto');

Route::resource('/category', CategoryController::class)->names([
    'index' => 'category',
    'store' => 'category_Store',
    'edit' => 'category_edit',
    'update'=>'category_update',
    'destroy' => 'category_destroy',
])->middleware('Role:admin');

Route::get('/generate-pdf', [TiketfpdfController::class, 'showPdf']);

Route::get('/reserve',function(){
    return view('pages.event.reserve');
});

Route::resource('/booking', BookController::class)->names([
    'index'=>'booking',
    'show' => 'booking_show',
    'store' => 'booking_store',
    'update' => 'booking_update'
]);

Route::post('/downloadTicket', [TiketfpdfController::class, 'downloadTicket'])->name('downloadTicket');

Route::get('/search', [EventoController::class, 'search']);
