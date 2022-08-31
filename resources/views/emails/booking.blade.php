<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <h1>Dear Customer,</h1>
    <h2>Resort Name: {{ $data['message']->resort->title }} </h2>
    <p>Resort Name: {{ $data['message']->resort->location }}</p>
    <hr>
    <p>
        Resort Check In: {{ $data['message']->check_in }} <br />
        Resort Check Out: {{ $data['message']->check_out }}
    </p>
    <p>
        Resort Room No: {{ $data['message']->room_no }} <br />
        Visitor Number: {{ $data['message']->visitor_numbers }}
    </p>
    <p>
        Bill: {{ $data['message']->bill }}
    </p>

</body>

</html>

{{-- @component('mail::message')
    # Dear Customer,
    Booking Succesfully Completed.

    details::
    Resort Name: {{ $data['message']->resort->title }}
    Resort Location: {{ $data['message']->resort->location }}
    Resort Check In: {{ $data['message']->check_in }}
    Resort Check Out: {{ $data['message']->check_out }}
    Resort Room No: {{ $data['message']->room_no }}
    Visitor Number: {{ $data['message']->visitor_numbers }}

    @component('mail::button', ['url' => 'http://localhost:8000/'])
        Visit Site
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent --}}
