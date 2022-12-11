@props(['restaurant'])





<div class="bg-gray-50 border border-gray-100 rounded-lg shadow-lg p-6">




    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 mr-6 md:block rounded-md border border-gray-400 rounded-lg"
            src="{{$restaurant->picture ? asset('storage/' . $restaurant->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-lg font-semibold mb-2">
                <a href="{{route('restaurants.show', $restaurant->id)}}" class="hover:text-hub"> {{ $restaurant->name }}</a>
            </h3>
           
            <i class="text-lg fa-solid fa-location-dot mb-2"></i> {{ $restaurant->address}}
            <div class="text-lg  mb-2 text-orange-600 font-semibold capitalize">{{ $restaurant->status }}</div>
            
        </div>
    </div>
</div>