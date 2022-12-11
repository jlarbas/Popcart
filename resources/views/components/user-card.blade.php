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
            <div class="text-lg  mb-2">
                <h3>Restaurant:</h3> {{ $user->restaurant->name}}
            
            </div>
        </div>
    </div>
</div>