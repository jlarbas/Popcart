@props(['restaurant'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$restaurant->picture ? asset('storage/' . $restaurant->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="{{route('restaurants.show', $restaurant->id)}}">{{ $restaurant->name }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $restaurant->contact }}</div>
            <ul class="flex">
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    {{$restaurant->status}}
                </li>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $restaurant->address}}
            </div>
        </div>
    </div>
</div>