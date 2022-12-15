@props(['user'])

{{-- User Details--}}



    <div class="">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 h-48  ml-20 md:block rounded-full border border-hub "
            src="{{$user->picture ? asset('storage/' . $user->picture) : asset('/images/no-image.png')}}"
            alt="" /><br>
  

            <h3 class="text-xl text-center mb-4 font-md">
                {{-- <a class=" font-semibold" href="{{route('users', $user->id)}}">{{ $user->name }}</a> --}}
                <a href="{{route('showuser', $user->id)}}">{{ $user->name }}</a>
            </h3>

            
           
            
            <div class="text-base  mb-2"> {{ $user->email }}</div> 
            @if($user->restaurant_id == 0)
            <div class="text-base  mb-2">Not assisgned to a restaurant</div>
            @else
            <div class="text-base  mb-2">Restaurant {{ $user->restaurant->name }}</div>
            @endif
            <div class="text-base  mb-2 capitalize">{{ $user->role }}</div>
            <div class="text-base  mb-2">Contact {{ $user->contact }}</div>
            <div class="text-base  mb-2">{{ $user->address }}</div>
            <div class="text-base  mb-2">{{ $user->schedule }}</div>


            <ul class="flex">
             
            <div class="text-base">
                <i class="fa-solid fa-location-dot mb-2"></i> {{ $user->address}}


                <li
                    class="text-hub capitalize font-semibold"
                >
                    {{$user->status}}
                </li>
</div>
                

            