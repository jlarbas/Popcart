@props(['restaurant'])

<div class=" rounded-lg shadow-lg p-6  ml-4 grid grid-auto-fit hover:bg-orange-200">


<a href="{{route('restaurants.show', $restaurant->id)}}">

    <div class="grid grid-auto-fit">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden md:block rounded-md border border-gray-400 rounded-lg grid grid-auto-fit"
            src="{{$restaurant->picture ? asset('storage/' . $restaurant->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-base font-semibold mt-2">
                 {{ $restaurant->name }}
            </h3>
           
            <i class="text-base fa-solid fa-location-dot"></i> {{ $restaurant->address}}
            <div class="text-base text-orange-400 font-semibold capitalize">{{ $restaurant->status }}</div>
           </a> 
        </div>
    </div>
</div>