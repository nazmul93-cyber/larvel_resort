<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Resort;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $dataPerPage = request('dataPerPage') ?? 10;
        $bookings = Booking::query()
            ->with('resort:id,title,location,room_price')
            ->orderSort(request('order'))
            ->checkInSort(request('check_in'))
            ->billSort(request('bill'))
            ->search(request('search'))

            ->paginate($dataPerPage);

        return view('bookings.index', ['bookings' => $bookings]);
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', ['booking' => $booking]);
    }

    public function create()
    {
        $resorts = Resort::query()
                    ->select('id', 'title', 'location', 'room_price')
                    ->get();
        return view('bookings.create', ['resorts' => $resorts]);
    }

    public function store()
    {
        $formFields = request()->validate([
            'resort_id' => 'required',
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'room_no' => ['required', 'numeric'],
            'visitor_email' => ['required', 'email'],
            'visitor_numbers' => ['required', 'numeric', 'min:1'],
            'bill' => 'required',
        ]);

        Booking::create($formFields);
        return redirect('/bookings')->with('message', 'Booking Added');
    }

    public function edit(Booking $booking) {
        $resorts = Resort::query()
                    ->select('id', 'title', 'location', 'room_price')
                    ->get();
        return view('bookings.edit', ['resorts' => $resorts, 'booking' => $booking]);
    }

    public function update(Booking $booking) {
        $formFields = request()->validate([
            'resort_id' => 'required',
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'room_no' => ['required', 'numeric'],
            'visitor_email' => ['required', 'email'],
            'visitor_numbers' => ['required', 'numeric', 'min:1'],
            'bill' => 'required',
        ]);

        $booking->update($formFields);
        return back()->with('message', 'Booking Updated');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect('/bookings')->with('message', "booking data deleted successfully");
    }
}
