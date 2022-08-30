<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\UserController;
use App\Jobs\BookingMailJob;
use App\Models\Booking;
use App\Models\Resort;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Email;

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




// guest access
Route::get('/login/admin', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/admin/authenticate', [UserController::class, 'authenticate'])->name('authenticate')->middleware('guest');

// admin access
Route::get('/admin-panel', [UserController::class, 'adminPanel'])->middleware('auth');
Route::get('/admins', [UserController::class, 'index'])->middleware('auth');
Route::get('/admins/create', [UserController::class, 'create'])->middleware('auth');
Route::post('/admins/store', [UserController::class, 'store'])->middleware('auth');
Route::get('/admins/{admin}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/admins/{admin}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/admins/{admin}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
// resorts
Route::get('/resorts', [ResortController::class, 'index'])->middleware('auth');
Route::get('/resorts/create', [ResortController::class, 'create'])->middleware('auth');
Route::post('/resorts/store', [ResortController::class, 'store'])->middleware('auth');
Route::get('/resorts/{resort}/edit', [ResortController::class, 'edit'])->middleware('auth');
Route::put('/resorts/{resort}', [ResortController::class, 'update'])->middleware('auth');
Route::delete('/resorts/{resort}', [ResortController::class, 'destroy'])->middleware('auth');
Route::get('/resorts/{resort}', [ResortController::class, 'show'])->middleware('auth');     // show single resort 

// bookings
Route::get('/bookings', [BookingController::class, 'index'])->middleware('auth');
Route::get('/bookings/create', [BookingController::class, 'create'])->middleware('auth');
Route::post('/bookings/store', [BookingController::class, 'store'])->middleware('auth');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->middleware('auth');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->middleware('auth');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->middleware('auth');
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->middleware('auth');     // show single booking 


// general access
Route::get('/', function () {
    $resorts = Resort::query()
        ->filter(request('tags'))
        ->search(request('search'))
        ->paginate();
    return view('frontend.home', ['resorts' => $resorts]);
});

Route::get('/{resort}', function (Resort $resort) {
    return view('frontend.show', ['resort' => $resort]);
});

Route::get('/{resort}/booking', function (Resort $resort) {
    return view('frontend.booking', ['resort' => $resort]);
});

Route::post('/{resort}/booking', function (Resort $resort) {
    $formFields = request()->validate([
        'check_in' => ['required', 'date'],
        'check_out' => ['required', 'date'],
        'room_no' => ['required', 'numeric'],
        'visitor_email' => ['required', 'email'],
        'visitor_numbers' => ['required', 'numeric', 'min:1'],
        'bill' => 'required',
    ]);
    $formFields['resort_id'] = $resort->id;

    // check check In is available for this resort
    $checkInDate = date('Y-m-d', strtotime($formFields['check_in']));
    $startDate = date('Y-m-d', strtotime($resort->available_from));
    $endDate = date('Y-m-d', strtotime($resort->available_till));
    if (($checkInDate >= $startDate) && ($checkInDate <= $endDate)) {
        $booking = Booking::create($formFields);


        // send email on successful booking
        $email_data = [
            'email' => "najimmycuet12@gmail.com",
            'to_email' => $booking->visitor_email,
            'subject' => "Booking Successful",
            'message' => $booking,
        ];

        dispatch(new BookingMailJob($email_data));
        dd('email sent');
        return redirect('/')->with('message', 'Congratulations! Successfully Booked Resort');
    } else {
        return redirect('/')->with('message', 'Sorry! This resort is not available at your check in time');
    }
});


// mail route
// Route::get('/booking-complete', function() {

// });
