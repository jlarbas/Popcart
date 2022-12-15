@extends('layout')
@section('content')
@include('partials._hero')

<div class="bg-gray1 mt-12 mr-12 ml-12  border border-gray-100 shadow-2xl rounded-2xl">

{{-- User Details--}}

<div class="bg-gray1 p-10 rounded-lg max-w-auto mx-auto mb-20 mt-20 ">
    <x-card class="p-10">
       
            <x-user-showcard :user="$user"/> <br>
             

        <a href="{{ route('edituser',$user->id)}}">
        <i class="bg-hub text-white py-4 px-12 rounded-xl hover:bg-orange-600 not-italic mb-4"> Edit </i>
        </a>

        <a href="/">  
            <div class="mt-4 border border-hub bg-white text-hub rounded-xl py-3 px-12 hover:text-white hover:bg-orange-500 text-center">
                <button type="button" 
                wire:click="cancelCart" 
                class="btn btn-danger">Back</button></div>     
            </div>
            </a>



        {{-- <form method="POST" action="{{ route('deleteuser', $user->id) }}" >
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash">DELETE</i>
        </form> --}}
    </x-card>

</div>

@endsection

</div>