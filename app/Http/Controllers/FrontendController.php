<?php

namespace App\Http\Controllers;

use App\Jobs\AlertSuperAdminJob;
use App\Jobs\BookingMailJob;
use App\Models\Booking;
use App\Models\Resort;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $resorts = Resort::query()
            ->filter(request('tags'))
            ->search(request('search'))
            ->paginate();
        return view('frontend.home', ['resorts' => $resorts]);
    }

    public function show(Resort $resort)
    {
        return view('frontend.show', ['resort' => $resort]);
    }

    public function create(Resort $resort)
    {
        return view('frontend.booking', ['resort' => $resort]);
    }

    public function store(Resort $resort)
    {
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
            dispatch(new AlertSuperAdminJob($email_data));

            return redirect('/')->with('message', 'Congratulations! Successfully Booked Resort');
        } else {
            return redirect('/')->with('message', 'Sorry! This resort is not available at your check in time');
        }
    }
}
