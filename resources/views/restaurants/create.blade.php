@extends('layout')
@section('content')
@include('partials._hero')
<x-card class="p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
<header class="text-center">
        <a href="{{ route('home') }}"
                ><img class="w-40  mt-2 mb-2 ml-4 mr-2 ml-28 mt-8"  src="{{ asset('images/logoCart3.png') }}" alt="" class="logo"/>
        </a><br>


            <h2 class="text-xl font-semibold  mb-8">
                Create Restaurant
            </h2>
            
        </header>

    <form method="POST" action="{{ route('restaurants.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="name"
                class="inline-block text-lg mb-2"></label>

            <input
                type="text"
                placeholder="Name"
                class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                name="name"
                value="{{ old('name') }}"
            />
            @error('name')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="mb-6">
            <label
                for="status"
                class="inline-block text-lg mb-2 text-base text-hub"
                >Status</label
            ><br>
            <select name="status" class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full">
                <option class="text-center" value="open" > Open </option>
                <option class="text-center" value="closed" >Closed </option>
        </select>
            @error('status')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="address"
                class="inline-block text-lg mb-2"></label
            >
            <input
            placeholder="Location"
                type="text"
                class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                name="address"
                value="{{ old('address') }}"
                placeholder=""
            />
            @error('address')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="contact"
                class="inline-block text-lg mb-2"></label
            >
            <input
                placeholder="Contact"
                type="text"
                class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                name="contact"
                value="{{ old('contact') }}"
            />
            @error('contact')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-lg mb-2  text-base text-hub">
                Restaurant Photo
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
                Create Restaurant
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