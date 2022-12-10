@extends('layout')
@section('content')
@include('partials._hero')
<x-card class="p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
    <header class="text-center">
        <h2 class="text-2xl font-bold mb-8">
            Edit Product
        </h2>
        
    </header>

    <form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                value="{{ $product->name }}"
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
                class="border border-gray-400 rounded p-2 w-full"
                name="price"
                value="{{ $product->price }}"
            />
            @error('price')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 mt-8 text-lg mb-2">
            <label>Select Restaurant</label>
            <select name="restaurant_id" class="border border-gray-400 rounded p-2 px-20 ">
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
                class="border border-gray-200 rounded p-4 w-full"
                name="picture"
            />
            @error('picture')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button
                class="bg-hub text-white rounded py-2 px-14 hover:bg-orange-500"
            >
                Edit
            </button>

            <a href="/" class="bg-hub text-white rounded py-2 px-14 hover:bg-orange-500"> Back </a>
        </div>
    </form>
</x-card>
@endsection