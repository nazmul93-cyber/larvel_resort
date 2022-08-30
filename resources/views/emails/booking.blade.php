b@component('mail::message')
# Dear Customer,
Booking Succesfully Completed.

details::
Resort Name: {{ $data['message']->resort->title }} 
Resort Location: {{ $data['message']->resort->location }}
Resort Check In: {{ $data['message']->check_in }}
Resort Check Out: {{ $data['message']->check_out }}
Resort Room No: {{ $data['message']->room_no }}
Visitor Number: {{ $data['message']->visitor_numbers }}
Bill: {{ $data['message']->bill }}

@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
 