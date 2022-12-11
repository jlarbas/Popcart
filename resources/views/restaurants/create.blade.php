@extends('layout')
@section('content')
@include('partials._hero')
<x-card class="p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
    <header class="text-center">
        <h2 class="text-2xl font-semibold mb-8">
            Create Restaurant
        </h2>
        
    </header>

    <form method="POST" action="{{ route('restaurants.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="name"
                class="inline-block text-lg mb-2"
                >Name</label
            >
            <input
                type="text"
                class="border border-gray-400 rounded p-2 w-full"
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
                class="inline-block text-lg mb-2"
                >Status</label
            ><br>
            <select name="status" class="border border-gray-400 rounded p-2 px-20 ">
                <option value="open" > Open </option>
                <option value="closed" >Closed </option>
        </select>
            @error('status')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="address"
                class="inline-block text-lg mb-2"
                >Location</label
            >
            <input
                type="text"
                class="border border-gray-400 rounded p-2 w-full"
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
                class="inline-block text-lg mb-2"
                >Contact</label
            >
            <input
                type="text"
                class="border border-gray-400 rounded p-2 w-full"
                name="contact"
                value="{{ old('contact') }}"
            />
            @error('contact')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-lg mb-2">
                Restaurant Photo
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-4 w-full"
                name="picture"
            />
            @error('picture')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button
                class="bg-hub text-white rounded py-2 px-4 hover:bg-orange-500"
            >
                Create Restaurant
            </button>

            <button
            <a href="/" class="bg-hub text-white rounded py-2 px-14 hover:bg-orange-500"> Back </a>
           
            </button>

            
        </div>
    </form>
</x-card>
@endsection