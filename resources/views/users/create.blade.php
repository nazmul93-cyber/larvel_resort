<x-admin_layout>
    <div class="container-fluid">
        <form method="POST" action="/admins/store">

            @csrf

            <div class="form-group">
                <label for="exampleInputText1">Full Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputText1" value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-admin_layout>
