@extends('layout')
@section('content')
@include('partials._hero')

<x-card class="bg-gray1 p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
<header class="text-center">
        <a href="{{ route('home') }}"
                ><img class="w-40  mt-2 mb-2 ml-4 mr-2 ml-28 mt-8"  
                src="{{ asset('images/logoCart4.png') }}" alt="" class="logo"/>
        </a><br>


            <h2 class="text-xl font-semibold  mb-12">
                Add Record
            </h2>
            
     

        
        <button class="border border-hub bg-white text-hub rounded-xl py-3.5 px-4 hover:text-white hover:bg-orange-400 
        text-center w-full" 

        onclick="Livewire.emit('openModal', 'add-inventory')">
        Create Inventory Item</button>
         @livewire('livewire-ui-modal')
        
    </header>
    <livewire:main-inventory :restaurant="$restaurant"/>
</x-card>
@endsection