@extends('layout')
@section('content')
@include('partials._hero')

<a href="{{ route('usersindex') }}" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ asset('images/no-image.png') }}"
                    alt=""
                />

            <h3 class="text-2xl mb-2">{{ $user->name}}</h3>
            <x-user-card :user="$user"/>
                            </div>
                    </div>
            </div>
    </x-card>
    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="{{ route('edituser',$user->id)}}">
        <i class="fa-solid fa-pencil"> Edit </i>
        </a>
        {{-- <form method="POST" action="{{ route('deleteuser', $user->id) }}" >
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash">DELETE</i>
        </form> --}}
    </x-card>

</div>

@endsection