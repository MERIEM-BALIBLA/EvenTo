<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\event\BookController;
use App\Http\Controllers\event\EventController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\orgnizer\StatisticOrganController;
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

Route::get('/', [HomeController::class, 'index']);

// authentication
Route::get('/auth', function () {
    return view('pages.authentification.login');
});

Route::post('/auth', [AuthController::class, 'Register'])->name('Register');
Route::post('/login', [AuthController::class, 'Login'])->name('Login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/you forgot your password', function () {
    return view('pages.resset_pass.email_resset');
})->name('resset_pass');
Route::post('/you forgot your password', [AuthController::class, 'ForgetPassword'])->name('ForgetPassword');
Route::get('/resset_password', function () {
    return view('pages.resset_pass.new_pass');
})->name('update_password');
Route::post('/update your password', [AuthController::class, 'resetPassword'])->name('resetPassword');

// admin
Route::get('/event list', function () {
    $events = Event::with('cetegory')
        ->orderByRaw("FIELD(status, 'pending', 'accepted', 'refused')")
        ->paginate(8);
        // ->get();
    $categories = Category::all();

    return view('admin.event.index', compact('events', 'categories'));
})->middleware('Role:admin');

Route::get('/category', function () {
    return view('admin.category.index');
});

Route::resource('/dash_admin', StatisticController::class)->middleware('Role:admin');

Route::resource('/category', CategoryController::class)->names([
    'index' => 'category',
    'store' => 'category_Store',
    'edit' => 'category_edit',
    'update' => 'category_update',
    'destroy' => 'category_destroy',
])->middleware('Role:admin');

// publish event
Route::put('/event/{id}/status', [EventController::class, 'updateStatus'])->name('event_status');

// orgnizer
Route::resource('/dash_orgnizer', StatisticOrganController::class)->middleware('Role:organ');

Route::resource('/event', EventController::class)->names([
    'index' => 'event',
    'store' => 'Event_Store',
    // 'show' => 'event_show',
    'edit' => 'event_edit',
    'update' => 'event_update',
    'destroy' => 'event_destroy',
])->middleware('Role:organ');

// booking automatic
Route::put('auto/{id}', [EventController::class, 'auto'])->name('auto');

// event home
Route::get('/event_details/{id}', [EventController::class, 'show'])->name('event_show');

// Ticket
// Route::get('/generate-pdf', [TiketfpdfController::class, 'showPdf']);
Route::post('/downloadTicket', [TiketfpdfController::class, 'generatePdf'])->name('downloadTicket');

// rserve page
Route::get('/reserve', function () {
    return view('pages.event.reserve');
});

// booking decrement/update reserve/store
Route::resource('/booking', BookController::class)->names([
    'index' => 'booking',
    'show' => 'booking_show',
    'store' => 'booking_store',
    'update' => 'booking_update'
]);

// Route::get('/viewTicket', [TiketfpdfController::class, 'generatePdf'])->name('viewTicket');

// Route::get('/pdf', [TiketfpdfController::class, 'generatePdf']);

// home page 
Route::get('/page_index', [EventoController::class, 'index'])->name('index');
Route::get('filter', [EventoController::class, 'filterEvent'])->name('filter');
Route::get('search', [EventoController::class, 'searchByTitle'])->name('search');