@extends('layout')
@section('content')
@include('partials._hero')

<a href="{{ route('usersindex') }}" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4 ">
    <x-card class="p-10">
        <div
            class=""
        >
                
            <x-user-showcard :user="$user"/>
                            </div>
                    </div>
            </div>
    </x-card>
    <x-card class="mt-4 p-2 flex space-x-6 bg-transparent border-none">
        <a href="{{ route('edituser',$user->id)}}">
        <i class="bg-hub text-white rounded py-2 px-10 hover:bg-orange-600 not-italic ml-2"> Edit </i>
        </a>
        {{-- <form method="POST" action="{{ route('deleteuser', $user->id) }}" >
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash">DELETE</i>
        </form> --}}
    </x-card>

</div>

@endsection