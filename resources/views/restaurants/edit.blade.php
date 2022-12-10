@extends('layout')
@section('content')
@include('partials._hero')
<x-card class="p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
    <header class="text-center">
        <h2 class="text-2xl font-bold mb-8">
            Create a Restaurant
        </h2>
       
    </header>

    <form method="POST" action="{{ route('restaurants.update',$restaurant->id) }}" enctype="multipart/form-data">
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
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                value="{{ $restaurant->name }}"
            />
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="status"
                class="inline-block text-lg mb-2"
                >Status</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="status"
                value="{{ $restaurant->status }}"
            />
            @error('status')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
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
                class="border border-gray-200 rounded p-2 w-full"
                name="address"
                value="{{ $restaurant->address }}"
                placeholder="Example: Remote, Boston MA, etc"
            />
            @error('address')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
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
                class="border border-gray-200 rounded p-2 w-full"
                name="contact"
                value="{{ $restaurant->contact }}"
            />
            @error('contact')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-lg mb-2">
                Logo
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="picture"
            />
            @error('picture')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button
                class="bg-hub text-white rounded py-2 px-4 hover:bg-orange-600">
            
                Create Restaurant
            </button>

            <a href="/" class="bg-hub text-white rounded py-2 px-14 hover:bg-orange-500"> Back </a>
        </div>
    </form>
</x-card>
@endsection