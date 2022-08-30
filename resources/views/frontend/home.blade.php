<x-layout>
    <x-slot name="search_slot">
        @include('partials._search')
    </x-slot>
    @include('partials._carousel')

    <div class="container py-6 my-4">
        <div class="row">
            @foreach ($resorts as $resort)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top"
                            src="{{ $resort->logo ? asset("storage/$resort->logo") : asset('images/resort/default_image.jpg') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ Str::limit($resort->title, 10) }}</h5>
                            <p class="card-text">{{ $resort->location }}</p>
                            <p class="card-text my-4 " style="">
                                {{-- making tags array from tags csv --}}
                                @php
                                    $tags = explode(',', $resort->tags);
                                @endphp
                                <ul class="d-flex justify-content-left text-left">
                                    @foreach ($tags as $tag)
                                        <li style="list-style: none;">
                                            <a class="mr-1 font-italic" style="text-decoration: none;font-size: 12px" href="/?tags={{ $tag }}">{{ $tag }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </p>
                            <p class="card-text mt-4">{{ Str::limit($resort->description, 20) }}</p>
                            <a href="/{{ $resort->id }}" class="btn btn-primary">Find out more...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- pagination links --}}
    <div class="mt-6 pt-4">
        {{ $resorts->links() }}
    </div>
</x-layout>
