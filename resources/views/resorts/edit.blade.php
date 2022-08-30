<x-admin_layout>
    <div class="container-fluid">
        <form method="POST" action="/resorts/{{ $resort->id }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleInputfile1">Logo</label>
                <input name="logo" type="file" class="form-control" id="exampleInputfile1" value="{{ $resort->logo }}">
                @error('logo')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
                <img class="d-block" style="max-width: 10%"
                    src="{{ $resort->logo ? asset("storage/$resort->logo") : asset('images/resort/default_image.jpg') }}"
                    alt="" />
            </div>

            <div class="form-group">
                <label for="exampleInputText1">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputText1"
                    aria-describedby="emailHelp" value="{{ $resort->title }}">
                @error('title')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputText2">description</label>
                <textarea name="description" class="form-control" id="exampleInputText2" cols="30" rows="10">{{ $resort->description }}</textarea>
                @error('description')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputText3">Tags (comma separated)</label>
                <input name="tags" type="text" class="form-control" id="exampleInputText3"
                    aria-describedby="emailHelp" value="{{ $resort->tags }}">
                @error('tags')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputText4">Company</label>
                <input name="company" type="text" class="form-control" id="exampleInputText4"
                    aria-describedby="emailHelp" value="{{ $resort->company }}">
                @error('company')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputText6">Location</label>
                <input name="location" type="text" class="form-control" id="exampleInputText6"
                    aria-describedby="emailHelp" value="{{ $resort->location }}">
                @error('location')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputText5">Website</label>
                <input name="website" type="text" class="form-control" id="exampleInputText5"
                    aria-describedby="emailHelp" value="{{ $resort->website }}">
                @error('website')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ $resort->email }}">
                @error('email')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputdate1">Available From: {{ $resort->available_from }}</label>
                <input name="available_from" type="date" class="form-control" id="exampleInputdate1"
                    aria-describedby="emailHelp" value="">
                @error('available_from')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
                
            </div>

            <div class="form-group">
                <label for="exampleInputdate2">Available Till: {{ $resort->available_till }}</label>
                <input name="available_till" type="date" class="form-control" id="exampleInputdate2"
                    aria-describedby="emailHelp" value="">
                @error('available_till')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
                
            </div>

            <div class="form-group">
                <label for="exampleInputNumber1">Room Numbers</label>
                <input name="room_numbers" type="number" min="0" max="1000" class="form-control" id="exampleInputNumber1"
                    aria-describedby="emailHelp" value="{{ $resort->room_numbers }}">
                @error('room_numbers')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputNumber2">Room Price</label>
                <input name="room_price" type="number" min="500" max="10000" class="form-control" id="exampleInputNumber2"
                    aria-describedby="emailHelp" value="{{ $resort->room_price }}">
                @error('room_price')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputNumber3">Room Capacity</label>
                <input name="room_capacity" type="number" min="1" max="10" class="form-control" id="exampleInputNumber3"
                    aria-describedby="emailHelp" value="{{ $resort->room_capacity }}">
                @error('room_capacity')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Resort</button>
        </form>
        <a href="/resorts/{{ $resort->id }}" class="btn btn-info my-4">Go Back</a>
    </div>
</x-admin_layout>
