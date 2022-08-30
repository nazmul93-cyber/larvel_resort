<x-layout>
    <x-slot name="search_slot"></x-slot>
    
    <a href="/" class="btn btn-info"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-6">
        <div class="p-12 mx-4">
            <div class="d-flex flex-column justify-content-center text-center">
                <img class="m-auto w-50 h-auto"
                    src="{{ $resort->logo ? asset("storage/$resort->logo") : asset('images/resort/default_image.jpg') }}"
                    alt="" />

                <h3 class="my-2">{{ $resort['title'] }}</h3>
                <div class="my-2">{{ $resort['company'] }}</div>
                <i class="my-2">{{ $resort['tags'] }}</i>

                <div class="my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $resort['location'] }}
                </div>
                <div class="border border-secondary mb-6"></div>
                <div>
                    <h3 class="font-bold mb-4">
                        Resort Description
                    </h3>
                    <div class="py-6">
                        {{ $resort['description'] }}

                        <div class="d-flex py-4 justify-content-center text-center">
                            <a href="mailto:{{ $resort['email'] }}" class=""><i class="fa-solid fa-envelope"></i>
                                Contact Founders</a>

                            <a href="{{ $resort['website'] }}" target="_blank" class="ml-4"><i
                                    class="fa-solid fa-globe"></i> Visit
                                Website</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="font-italic text-center my-4">
                <h3>Avaibility</h3>
                <p class="font-weight-bold">Available From: {{ $resort['available_from'] }} -
                    {{ $resort['available_till'] }}</p>
            </div>
            <div class="text-italic text-center my-4">
                <h3>Room Details</h3>
                <p class="font-weight-bold">Vacant Rooms : {{ $resort['room_numbers'] }}</p>
                <p class="font-weight-bold">Single Room Price (bdt) : {{ $resort['room_price'] }}</p>
                <p class="font-weight-bold">Single Room capacity : {{ $resort['room_capacity'] }} adults</p>
            </div>
        </div>

        <div class="text-center my-4">
            <a class="mx-3 btn btn-info" href="/{{ $resort->id }}/booking">
                <i class="fa-solid fa-paper-plane mr-1"></i>Booking
            </a>
        </div>
    </div>
</x-layout>