@extends('layout')
@section('content')
@include('partials._hero')

<x-card class="bg-gray1 p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
    
<header class="text-center">
        <a href="{{ route('home') }}"
                ><img class="w-40  mt-2 mb-2 ml-4 mr-2 ml-28 mt-8"  src="{{ asset('images/logoCart4.png') }}" alt="" class="logo"/>
        </a><br>


            <h2 class="text-xl font-semibold  mb-8">
                Add Product
            </h2>
            
        </header>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label
                for="name"
                class="inline-block text-lg mb-2"></label
            >
            <input
                placeholder="Name"
                type="text"
                class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                name="name"
                value="{{ old('name') }}"
            />
            @error('name')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label
                for="price"
                class="inline-block text-lg mb-2"></label
            >
            <input
                placeholder="Price"
                type="text"
                class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                name="price"
                
            />
            @error('price')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 mt-8 text-lg mb-2">
            <label class="inline-block text-base mb-2 text-hub">Select Restaurant</label>
            <br>
            <select name="restaurant_id" class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full">
            @foreach($restaurants as $restaurant)
                <option 
                    class="text-center"
                    value="{{ $restaurant->id }}" 
                >{{ $restaurant->name }}</option>
            @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-base mb-2 text-hub">
                Picture
            </label>
            <input
                type="file"
                class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                name="picture"
            />
            @error('picture')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <button
                class="bg-hub text-white rounded-xl py-3 px-14 hover:bg-orange-500 w-full"
            >
                Create Product
            </button>
        </div>

        <div class="mb-4">
             
             <a href="/">  
             <div class="border border-hub bg-white text-hub rounded-xl py-3 px-4 hover:text-white hover:bg-orange-500 text-center">
                 <button type="button" 
                 wire:click="cancelCart" 
                 class="btn btn-danger">Cancel</button></div>     
             </div>
             </a>


    </form>
</x-card>
@endsection