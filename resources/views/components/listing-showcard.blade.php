@props(['restaurant'])

<div class="rounded p-6">
    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 mr-6 md:block  shadow-lg rounded-full"
            src="{{$restaurant->picture ? asset('storage/' . $restaurant->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <br><br><br>
            <h3 class="text-lg font-semibold">
                <a href="{{route('restaurants.show', $restaurant->id)}}">{{ $restaurant->name }}</a>
            </h3>
            <div class="text-base  mb-2">{{ $restaurant->contact }}<br>
            <i class="fa-solid fa-location-dot mb-2"></i> {{ $restaurant->address}}<br>
            <p class="capitalize text-base text-orange-400 mb-2 font-semibold"></i> {{ $restaurant->status}} </p>
            
            </div>
    
           
           
        </div>
    </div>
</div>