@props(['restaurant'])

<div class="rounded-lg shadow-lg p-4  border border-orange-200 ml-4 grid grid-auto-fit hover:bg-orange-200">


<a href="{{route('showReport', $restaurant->id)}}" class="">

        <div class="grid grid-auto-fit ">
         {{-- Shows the Picture in the database if not then default picture --}}
            <img
            class="hidden w-40  mr-6 md:block border border-gray-400 rounded-lg mb-2"
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