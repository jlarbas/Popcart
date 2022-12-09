@extends('layout')
@section('content')
@include('partials._hero')
<x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add a Product
        </h2>
        <p class="mb-4">Post a gig to find a developer</p>
    </header>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="name"
                class="inline-block text-lg mb-2"
                >Name</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                value="{{ old('name') }}"
            />
            @error('name')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="price"
                class="inline-block text-lg mb-2"
                >Price</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="price"
                
            />
            @error('price')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <label
                for="status"
                class="inline-block text-lg mb-2"
                >Status</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="status"
                value="{{ old('status') }}"
            />
            @error('status')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        <div class="mb-6">
            <label>Select Restaurant</label>
            <select name="restaurant_id" >
            @foreach($restaurants as $restaurant)
                <option 
                    value="{{ $restaurant->id }}" 
                >{{ $restaurant->name }}</option>
            @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-lg mb-2">
                Picture
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="picture"
            />
            @error('picture')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button
                class="bg-hub text-white rounded py-2 px-4 hover:bg-black"
            >
                Create Product
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
@endsection