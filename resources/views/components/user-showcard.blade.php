@props(['user'])

<div class="bg-gray-50 border border-gray-400 rounded p-6">
    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 h-48 mr-6 md:block"
            src="{{$user->picture ? asset('storage/' . $user->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                {{-- <a href="{{route('users', $user->id)}}">{{ $user->name }}</a> --}}
                <a href="{{route('showuser', $user->id)}}">{{ $user->name }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $user->email }}</div>
            <div class="text-xl font-bold mb-4">{{ $user->role }}</div>
            <div class="text-xl font-bold mb-4">{{ $user->schedule }}</div>


            <ul class="flex">
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    {{$user->status}}
                </li>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $user->address}}
            </div>
        </div>
    </div>
</div>