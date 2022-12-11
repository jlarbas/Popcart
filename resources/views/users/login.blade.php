@extends('layout')
@section('content')

<div class="mb-8">
    <x-card class="p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-200 shadow-lg mt-8">
        <header class="text-center">
            <h2 class="text-2xl font-semibold  mb-1">
                Login
            </h2>
            
        </header>

        <form action="{{ route('authenticate') }}" method="POST" class="mb-8">
            @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ old('email') }}"
                />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
               
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                    Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

           
            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-hub text-white rounded py-2 px-14 hover:bg-orange-500"
                >
                    Login
                </button>
            </div>
            </div>
        </form>
    </x-card>

@endsection
