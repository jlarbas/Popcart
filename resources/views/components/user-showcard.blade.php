@props(['user'])

{{-- User Details--}}


<div class="rounded p-6">
    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 h-48 mr-6 md:block rounded-full mb-4"
            src="{{$user->picture ? asset('storage/' . $user->picture) : asset('/images/no-image.png')}}"
            alt="" />
    </div>

            <h3 class="text-2xl">
                {{-- <a class="font-semibold" href="{{route('users', $user->id)}}">{{ $user->name }}</a> --}}
                <a href="{{route('showuser', $user->id)}}">{{ $user->name }}</a>
            </h3>
        <div>
            
            <div class="text-lg  mb-2"> Email {{ $user->email }}</div>
            @if($user->restaurant_id == 0)
            <div class="text-lg  mb-2">Not assisgned to a restaurant</div>
            @else
            <div class="text-lg  mb-2">Restaurant: {{ $user->restaurant->name }}</div>
            @endif
            <div class="text-lg  mb-2 capitalize">{{ $user->role }}</div>
            <div class="text-lg  mb-2">{{ $user->contact }}</div>
            <div class="text-lg  mb-2">{{ $user->address }}</div>
            <div class="text-lg  mb-2">Schedule: {{ $user->schedule }}</div>


            <ul class="flex">
             
            <div class="text-lg">
                <i class="fa-solid fa-location-dot mb-2"></i> {{ $user->address}}


                <li
                    class="text-orange-600 capitalize font-semibold"
                >
                    {{$user->status}}
                </li>

            