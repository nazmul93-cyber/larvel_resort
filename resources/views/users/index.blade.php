<x-admin_layout>

    <a class="btn btn-success mx-1 my-4 px-4 py-2" href="/admins/create" role="button"><i class="fa-solid fa-plus mr-2"></i>New Admin</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @if (count($users) == 0)
                <h1> Sorry, No Data Found </h1>
            @else
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/admins/{{ $user->id }}/edit"><i class="fa-solid fa-pen-to-square mr-2 text-info"></i></a>
                            <form onsubmit="return confirm('Are you sure?');" class="d-inline" method="POST" action="/admins/{{ $user->id }}">
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

    {{-- delete confirmation script --}}
    {{-- <script>
        function deleteFunction() {
          let text = "Are you sure!";
          if (confirm(text) == true) {
            
          } else {
            
          }
          
        }
        </script> --}}
</x-admin_layout>
