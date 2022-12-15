@props(['restaurant'])
<div class="bg-gray-50 border border-orange-200 rounded-lg shadow-lg p-6 hover:bg-orange-200">
    <a href="{{route('showReport', $restaurant->id)}}" class="">

        <div class="grid grid-auto-fit ">
         {{-- Shows the Picture in the database if not then default picture --}}
            <img
            class="hidden w-48 mr-6 md:block rounded-md border border-gray-400 rounded-lg"
            src="{{$restaurant->picture ? asset('storage/' . $restaurant->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-md font-semibold mt-1 mb-2">
                 {{ $restaurant->name }}</a>
            </h3> 
        </a>       
        </div>
    </div>
</div>