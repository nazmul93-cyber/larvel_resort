<x-admin_layout>
    <a href="/bookings" class="btn btn-info"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-6">
        <div class="p-12 mx-4">
            <div class="d-flex flex-column justify-content-center text-center">
                <h3 class="my-2">{{ $booking->resort->title }}</h3>
                <div class="my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $booking->resort->location }}
                </div>
                <div class="border border-secondary mb-6"></div>
            </div>
            <div class="font-italic text-center my-4">
                <h3>Stay Duration</h3>
                <p class="font-weight-bold">Check In Date: {{ $booking->check_in }}</p>
                <p class="font-weight-bold">Check Out Date: {{ $booking->check_out }}</p>
                <p class="font-weight-bold">Room No: {{ $booking->room_no }}</p>
            </div>
            <div class="text-italic text-center my-4">
                <h3>Visitor Details</h3>
                <p class="font-weight-bold">Visitor Email : {{ $booking->visitor_email }}</p>
                <p class="font-weight-bold">Number of Visitors : {{ $booking->visitor_numbers }}</p>
            </div>
            <div class="text-italic text-center my-4">
                <h3>Payment Details</h3>
                @php
                    $from_date = new DateTime($booking->check_in);
                    $to_date = new DateTime($booking->check_out);
                    $interval = $from_date->diff($to_date);
                @endphp
                <p class="font-weight-bold">Bill : {{ $booking->bill == 'due'? "bdt ".($booking->resort->room_price) * ($interval->days) : $booking->bill }}</p>
            </div>
        </div>

        <div class="d-flex ">
            <a class="mx-3 btn btn-info" href="/bookings/{{ $booking->id }}/edit">
                <i class="fa-solid fa-pencil mr-1"></i>Edit
            </a>

            <form onsubmit="return confirm('Are you sure?');" method="POST" action="/bookings/{{ $booking->id }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
            </form>
        </div>
    </div>
</x-admin_layout>
