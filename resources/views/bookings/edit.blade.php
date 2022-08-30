<x-admin_layout>
    <div class="container-fluid">
        <form method="POST" action="/bookings/{{ $booking->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Present Resort:
                        {{ $booking->resort->title }}</label>
                </div>
                <select name="resort_id" class="custom-select" id="inputGroupSelect01">
                    <option disabled selected>Choose...</option>
                    @foreach ($resorts as $resort)
                        <option value="{{ $resort->id }}">{{ $resort->title }}</option>
                    @endforeach
                </select>
                @error('resort_id')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputdate1">Present Check In date: {{ $booking->check_in }}</label>
                <input name="check_in" type="date" class="form-control" id="exampleInputdate1"
                    aria-describedby="emailHelp" value="">
                @error('check_in')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputdate1">Present Check Out date: {{ $booking->check_out }}</label>
                <input name="check_out" type="date" class="form-control" id="exampleInputdate1"
                    aria-describedby="emailHelp" value="">
                @error('check_out')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputNumber1">Room No</label>
                <input name="room_no" type="number" min="101" max="909" class="form-control"
                    id="exampleInputNumber1" aria-describedby="emailHelp" value="{{ $booking->room_no }}">
                @error('room_no')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputNumber1">Visitor Email</label>
                <input name="visitor_email" type="email" class="form-control" id="exampleInputNumber1"
                    aria-describedby="emailHelp" value="{{ $booking->visitor_email }}">
                @error('visitor_email')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputNumber1">Visitor Numbers</label>
                <input name="visitor_numbers" type="number" min="1" max="10" class="form-control"
                    id="exampleInputNumber1" aria-describedby="emailHelp" value="{{ $booking->visitor_numbers }}">
                @error('visitor_numbers')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Present Bill Type:
                        {{ $booking->bill }}</label>
                </div>
                <select name="bill" class="custom-select" id="inputGroupSelect01">
                    <option disabled selected>Choose...</option>
                    <option value="paid">Paid</option>
                    <option value="due">Due</option>
                </select>
                @error('bill')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
        <a href="/bookings/{{ $booking->id }}" class="btn btn-info my-4">Go Back</a>
    </div>
</x-admin_layout>
