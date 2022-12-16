@props(['restaurant'])

<div class="w-48 rounded-xl shadow-lg p-6  border border-orange-200 ml-4 grid grid-auto-fit bg-gray1 hover:bg-orange-200">


<a href="{{route('restaurants.show', $restaurant->id)}}">

    <div class="grid grid-auto-fit">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-40  mr-6 md:block border border-gray-400 rounded-lg mb-2"
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