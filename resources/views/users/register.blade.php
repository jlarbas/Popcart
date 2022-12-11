@extends('layout')
@section('content')

<x-card class="p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">

        <header class="text-center">
            <h2 class="text-2xl font-semibold  mb-8">
                Register
            </h2>
            
        </header>

        <form action="/users" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-400 rounded p-2 w-full"
                    name="name"
                />
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-400 rounded p-2 w-full"
                    name="email"
                />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
               
            </div>
            <div class="mb-6">
                <label for="contact" class="inline-block text-lg mb-2">
                    Contact
                </label>
                <input
                    type="text"
                    class="border border-gray-400 rounded p-2 w-full"
                    name="contact"
                />
                @error('contact')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="role" class="inline-block text-lg mb-2">
                    Role
                </label><br>
                <select name="role" class="border border-gray-400 rounded p-2 px-20 ">
                    
                    <option value="management" > Management   </option>
                    <option value="staff" > Staff   </option>
                    <option value="customer" >Customer </option>
            </select>
                @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="status" class="inline-block text-lg mb-2">
                    Status
                </label>
                <br><select name="status" class="border border-gray-400 rounded p-2 px-20 ">
                        <option value="active" > Active </option>
                        <option value="inactive" >Inactive </option>
                </select>
                @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>  
            <div class="mb-6">
                <label for="address" class="inline-block text-lg mb-2">
                    Address
                </label>
                <input
                    type="text"
                    class="border border-gray-400 rounded p-2 w-full"
                    name="address"
                />
                @error('address')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="schedule" class="inline-block text-lg mb-2">
                    Schedule
                </label>
                <input
                    type="text"
                    class="border border-gray-400 rounded p-2 w-full"
                    name="schedule"
                />
                @error('schedule')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 mt-8 text-lg mb-2">
                <label>Select Restaurant</label>
                <br>
                <select name="restaurant_id" class="border border-gray-400 rounded p-2 px-20 ">
                @foreach($restaurants as $restaurant)
                <option value="">--Please choose an option--</option>
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
                    class="border border-gray-400 rounded p-2 w-full"
                    name="password"
                />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password2"
                    class="inline-block text-lg mb-2"
                >
                    Confirm Password
                </label>
                <input
                    type="password"
                    class="border border-gray-400 rounded p-2 w-full"
                    name="password_confirmation"
                />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-hub text-white rounded py-2 px-14 hover:bg-orange-500"
                >
                   Create
                </button>
            </div>
        </form>
    </x-card>

@endsection