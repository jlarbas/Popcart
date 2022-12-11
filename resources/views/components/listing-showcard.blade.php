@props(['restaurant'])

<div class="rounded p-6">
    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 mr-6 md:block border border-gray-100 shadow-lg rounded-lg"
            src="{{$restaurant->picture ? asset('storage/' . $restaurant->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-lg font-semibold">
                <a href="{{route('restaurants.show', $restaurant->id)}}">{{ $restaurant->name }}</a>
            </h3>
            <div class="text-lg  mb-2">{{ $restaurant->contact }}<br>
            <i class="fa-solid fa-location-dot mb-2"></i> {{ $restaurant->address}}<br>
            <p class="capitalize text-lg text-orange-400 mb-2 font-semibold"></i> {{ $restaurant->status}} </p>
            
            </div>
    
           
           
        </div>
    </div>
</div>