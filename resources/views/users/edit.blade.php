<x-admin_layout>
    
    <div class="container-fluid">
        <a class="btn btn-info my-2" href="/admins"><i class="fa-solid fa-backward-step mr-2"></i>Back</a>
        <form method="POST" action="/admins/{{ $admin->id }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="exampleInputText1">Full Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputText1" value="{{ $admin->name }}">
                @error('name')
                    <p class="text-danger text font-italic font-weight-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ $admin->email }}">
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

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-admin_layout>
