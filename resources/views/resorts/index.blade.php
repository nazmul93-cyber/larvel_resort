<x-admin_layout>

    <div class="d-flex">
        <a class="btn btn-success mx-2 my-4 px-4 py-2" href="/admins/create" role="button"><i
                class="fa-solid fa-plus mr-2"></i>New Resort</a>

        {{-- searching --}}
        <form class="form-inline my-2 my-lg-0" method="GET" action='/resorts'>
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

    {{-- sorting and pagination --}}
    <div class="d-flex">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Price Order</h5>
                <form method='GET' action='/resorts'>
                    <div class="form-group">
                        <select name="price" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Sort by Price</button>
                </form>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Earliest Avibale Rooms</h5>
                <form method='GET' action='/resorts'>
                    <div class="form-group">
                        <select name="availability" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Sort by Availability</button>
                </form>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Room Numbers</h5>
                <form method='GET' action='/resorts'>
                    <div class="form-group">
                        <select name="room" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Sort by Room Numbers</button>
                </form>
            </div>
        </div>
    
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Data Per Page</h5>
                <form method='GET' action='/resorts'>
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
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Select Tags to Filter</h5>
                <form method='GET' action='/resorts'>
                    <div class="form-group">
                        <select name="tags" class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>choose...</option>
                            <option value="travel">Travel</option>
                            <option value="hotel">Hotel</option>
                            <option value="tourism">Tourism</option>
                            <option value="spa">Spa</option>
                            <option value="photography">Photography</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Go</button>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Tags</th>
                <th scope="col">Company</th>
                <th scope="col">Website</th>
                <th scope="col">Email</th>
                <th scope="col">Available From</th>
                <th scope="col">Available Till</th>
                <th scope="col">Room Numbers</th>
                <th scope="col">Room Price</th>
                <th scope="col">Room Capacity</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @if (count($resorts) == 0)
                <h1> Sorry, No Data Found </h1>
            @else
                @foreach ($resorts as $resort)
                    <tr>
                        <th scope="row">{{ $resort->id }}</th>
                        <td>{{ $resort->Logo ?? null }}</td>
                        <td>{{ Str::limit($resort->title, 20) }}</td>
                        <td>{{ Str::limit($resort->description, 20) }}</td>
                        <td>{{ $resort->tags }}</td>
                        <td>{{ $resort->company }}</td>
                        <td>{{ $resort->website }}</td>
                        <td>{{ $resort->email }}</td>
                        <td>{{ $resort->available_from }}</td>
                        <td>{{ $resort->available_till }}</td>
                        <td>{{ $resort->room_numbers }}</td>
                        <td>{{ $resort->room_price }}</td>
                        <td>{{ $resort->room_capacity }}</td>
                        <td class="d-flex">
                            <a href="/admins/{{ $resort->id }}/edit"><i
                                    class="fa-solid fa-pen-to-square text-info"></i></a>
                            <form onsubmit="return confirm('Are you sure?');" class="d-inline" method="POST"
                                action="/admins/{{ $resort->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-danger btn btn-light">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="mt-6 pt-4">
        {{ $resorts->links() }}
    </div>
</x-admin_layout>
