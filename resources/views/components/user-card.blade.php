@props(['user'])

<div class="bg-gray-50 border border-gray-100  p-6 rounded-lg shadow-lg">





    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 h-48 mr-6 md:block rounded-lg border border-gray-400  "
            src="{{$user->picture ? asset('storage/'.$user->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-lg mb-2 font-bold hover:text-hub">
                {{-- <a href="{{route('users', $user->id)}}" >{{ $user->name }}</a> --}}
                <a href="{{route('showuser', $user->id)}}">{{ $user->name }}</a>
            </h3>
            <div class="text-lg  mb-2">Email: {{ $user->email }}</div>
            <div class="text-lg  mb-2">Role: {{ $user->role }}</div>
            <div class="text-lg  mb-2">Schedule: {{ $user->schedule }}</div>           
            <div class="text-lg  mb-2">
                <i class="fa-solid fa-location-dot mb-2"></i> {{ $user->address}}
            <div class="text-lg  mb-2 text-orange-600 font-semibold">{{ $user->status }}</div>
            </div>
        </div>
    </div>
</div>