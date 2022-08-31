<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <h1>New Booking by Customer</h1>
    <h2>Resort Name: {{ $data['message']->resort->title }} </h1>
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
