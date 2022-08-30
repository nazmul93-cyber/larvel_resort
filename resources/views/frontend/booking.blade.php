<x-layout>
    <x-slot name="search_slot"></x-slot>

    <div class="container-fluid">
        <form method="POST" action="/{{ $resort->id }}/booking">
            @csrf

            <div class="form-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Resort Name: {{ $resort->title }}</label>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputdate1">Check In</label>
                <input name="check_in" type="date" class="form-control" id="exampleInputdate1"
                    aria-describedby="emailHelp" value="{{ old('check_in') }}">
                @error('check_in')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputdate1">Check Out</label>
                <input name="check_out" type="date" class="form-control" id="exampleInputdate1"
                    aria-describedby="emailHelp" value="{{ old('check_out') }}">
                @error('check_out')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputNumber1">Room No</label>
                <input name="room_no" type="number" min="101" max="909" class="form-control"
                    id="exampleInputNumber1" aria-describedby="emailHelp" value="{{ old('room_no') }}">
                @error('room_no')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputNumber1">Visitor Email</label>
                <input name="visitor_email" type="email" class="form-control" id="exampleInputNumber1"
                    aria-describedby="emailHelp" value="{{ old('visitor_email') }}">
                @error('visitor_email')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputNumber1">Visitor Numbers</label>
                <input name="visitor_numbers" type="number" min="1" max="10" class="form-control"
                    id="exampleInputNumber1" aria-describedby="emailHelp" value="{{ old('visitor_numbers') }}">
                @error('visitor_numbers')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Bill Type</label>
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
            <button type="submit" class="btn btn-primary">Add Booking</button>
        </form>
    </div>
</x-layout>
