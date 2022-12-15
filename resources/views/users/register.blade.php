<div>
@extends('layout')
@section('content')
</div>

<x-card class="bg-gray1 p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">

        <header class="text-center">
        <a href="{{ route('home') }}"
                ><img class="w-40  mt-2 mb-2 ml-4 mr-2 ml-28 mt-8"  src="{{ asset('images/logoCart4.png') }}" alt="" class="logo"/>
        </a><br>


            <h2 class="text-xl font-semibold  mb-8">
                Register
            </h2>
            
        </header>

        <form action="/users" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                  
                </label>
                <input
                    type="text"
                    placeholder="Name"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="name"
                />
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    ></label
                >
                <input
                    type="email"
                    placeholder="Email"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="email"
                />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
               
            </div>
            <div class="mb-6">
                <label for="contact" class="inline-block text-lg mb-2">
                 
                </label>
                <input
                    type="text"
                    placeholder="Contact"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="contact"
                />
                @error('contact')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="role_id" class="inline-block text-base mb-2 text-hub">
                    Role
                </label><br>
                <select name="role_id" class=" border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full">
                    <option class ="text-center" value=""> Please choose an option </option>
                    @foreach($roles as $role)
                    <option 
                        value="{{ $role->id }}" 
                    >{{ $role->name }}</option>
                @endforeach
                </select>
                @error('role_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="status" class="inline-block text-base mb-2 text-hub">
                    Status
                </label>
                <br><select name="status" class=" border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full">
                        <option class ="text-center" value="active" > Active </option>
                        <option class ="text-center" value="inactive" >Inactive </option>
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
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
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
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="schedule"
                />
                @error('schedule')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 mt-8 text-lg mb-2">
                <label>Select Restaurant</label>
                <br>
                <select name="restaurant_id" class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full">
                    <option class="text-center" value="">--Please choose an option--</option>
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" >{{ $restaurant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                   
                </label>
                <input
                    placeholder="Password"
                    type="password"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
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
                  
                </label>
                <input
                    placeholder="Confirm Password"
                    type="password"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="password_confirmation"
                />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button
                    type="submit"
                    class="bg-hub text-white rounded-xl py-3 px-14 hover:bg-orange-500 w-full"
                >
                   Create
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