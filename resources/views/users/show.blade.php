@extends('layout')
@section('content')
@include('partials._hero')



{{-- User Details--}}


<x-card class=" w-4/12 bg-gray1 p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
       
            <x-user-showcard :user="$user"/>
 
            </x-card>            




        <a href="{{ route('edituser',$user->id)}}">
        <div class="mt-6 border border-hub bg-hub text-white rounded-xl 
        py-3 px-12 hover:text-white hover:bg-orange-500 text-center">
               
        <button type="button" 
        wire:click="cancelCart" 
        class="btn btn-danger">Edit</button></div>     

        </a>

    
        <a href="/">  
        <div class="mt-3 border border-hub bg-white text-hub rounded-xl 
        py-3 px-12 hover:text-white hover:bg-orange-500 text-center">

        <button type="button" 
        wire:click="cancelCart" 
        class="btn btn-danger">Back</button></div>     
                
        </a>
       


        {{-- <form method="POST" action="{{ route('deleteuser', $user->id) }}" >
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash">DELETE</i>
        </form> --}}
    

</div>

@endsection

</div>