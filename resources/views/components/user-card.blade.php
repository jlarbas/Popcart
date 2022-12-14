@props(['user'])

<div class=" rounded-lg shadow-lg p-6  ml-4 grid grid-auto-fit hover:bg-orange-200">
 

<a href="{{route('showuser', $user->id)}}">

    <div class="grid grid-auto-fit">
        
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden md:block rounded-full border border-gray-400 grid grid-auto-fit "
            src="{{$user->picture ? asset('storage/'.$user->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
        
                <h3 class="text-base font-semibold mt-2 text-center">
                {{ $user->name }}
                </h3> 
                 
        
                <h3 class="capitalize">{{ $user->role}} </h3> 
</a>
                
            
           
        </div>
    </div>
</div>