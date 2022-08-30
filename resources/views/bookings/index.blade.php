<x-admin_layout>

    {{-- add button and search box --}}
    <div class="d-flex">
        <a class="btn btn-success mx-2 my-4 px-4 py-2" href="/bookings/create" role="button"><i
                class="fa-solid fa-plus mr-2"></i>Add Manual Booking</a>

        {{-- searching --}}
        <form class="form-inline my-2 my-lg-0" method="GET" action='/bookings'>
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

    {{-- sorting and pagination --}}
    <div class="d-flex">
        {{-- order --}}
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Order</h5>
                <form method='GET' action='/bookings'>
                    <div class="form-group">
                        <select name="order" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Order</button>
                </form>
            </div>
        </div>

        {{-- check in sort --}}
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Check In Order</h5>
                <form method='GET' action='/bookings'>
                    <div class="form-group">
                        <select name="check_in" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Sort by Check In Date</button>
                </form>
            </div>
        </div>

        {{-- bill sort --}}
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Bill Type</h5>
                <form method='GET' action='/bookings'>
                    <div class="form-group">
                        <select name="bill" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="paid">Paid</option>
                            <option value="due">Due</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Sort by Bill Type</button>
                </form>
            </div>
        </div>

        {{-- data per page --}}
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Data Per Page</h5>
                <form method='GET' action='/bookings'>
                    <div class="form-group">
                        <select name="dataPerPage" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">OK</button>
                </form>
            </div>
        </div>

    </div>

    {{-- bookings data --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Resort Name</th>
                <th scope="col">Location</th>
                <th scope="col">Check In</th>
                <th scope="col">Check Out</th>
                <th scope="col">Room No.</th>
                <th scope="col">Visitor Email</th>
                <th scope="col">Visitor Numbers</th>
                <th scope="col">Bill</th>
            </tr>
        </thead>
        <tbody>

            @if (count($bookings) == 0)
                <h1> Sorry, No Data Found </h1>
            @else
                @foreach ($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $booking->id }}</th>
                        <td>{{ $booking->resort->title }}</td>
                        <td>{{ $booking->resort->location }}</td>
                        <td>{{ $booking->check_in }}</td>
                        <td>{{ $booking->check_out }}</td>
                        <td>{{ $booking->room_no }}</td>
                        <td>{{ $booking->visitor_email }}</td>
                        <td>{{ $booking->visitor_numbers }}</td>
                        <td>{{ $booking->bill }}</td>
                        <td><a class="btn btn-info" href="/bookings/{{ $booking->id }} ">Manage</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- pagination links --}}
    <div class="mt-6 pt-4">
        {{ $bookings->links() }}
    </div>

</x-admin_layout>
