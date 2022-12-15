@extends('layout')
@section('content')

<x-card class="bg-gray1 p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">

<header class="text-center">
<a href="{{ route('home') }}"
        ><img class="w-40  mt-2 mb-2 ml-4 mr-2 ml-28 mt-8"  src="{{ asset('images/logoCart4.png') }}" alt="" class="logo"/>
</a><br>


    <h2 class="text-xl font-semibold  mb-8">
        Edit User
    </h2>
    
</header>

        <form action="{{ route('updateuser',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="name" class="inline-block text-lg mb-2">                  
                </label>

                <input
                placeholder="Name"
                    type="text"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="name"
                    value="{{ $user->name }}"
                />
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label for="email" class="inline-block text-lg mb-2"></label>

                <input
                    placeholder="Email"
                    type="email"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="email"
                    value="{{ $user->email }}"
                />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
               
            </div>
            <div class="mb-6">
                <label for="contact" class="inline-block text-lg mb-2">
                    
                </label>
                <input
                    placeholder="Contact"
                    type="text"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="contact"
                    value="{{ $user->contact }}"
                />
                @error('contact')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="role" class="inline-block text-base mb-2 text-hub">
                    Role
                </label>
                <select name="role" class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full">
                
                    <option class="text-center" value="management" > Management </option>
                    <option class="text-center" value="staff" > Staff </option>
                    <option class="text-center" value="customer" > Customer </option>
                </select>
                @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="status" class="inline-block text-base mb-2 text-hub">
                    Status
                </label>
                <select name="status" class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full ">
                
                    <option class="text-center" value="open" > Active </option>
                    <option class="text-center" value="closed" > Inactive </option>
                </select>
                @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>  

            <div class=" text-lg mb-4">
                <label class="inline-block text-base mb-2 text-hub">Select Restaurant</label>
                <br>
                <select name="restaurant_id" class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full  ">
                @foreach($restaurants as $data)
                    <option 
                        class="text-center" value="{{ $data->id }}" 
                    >{{ $data->name }}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="address" class="inline-block text-lg">
                   
                </label>
                <input
                    placeholder=" Address"
                    type="text"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="address"
                    value="{{ $user->address }}"
                />
                @error('address')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="schedule" class="inline-block text-lg">
                    
                </label>
                <input
                    placeholder="Schedule"
                    type="text"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="schedule"
                    value="{{ $user->schedule }}"
                />
                @error('schedule')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
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
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2">
                 Please re-enter password
                </label>
                <input
                    placeholder="Password"
                    type="password"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="password"
                    value=""
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
                    placeholder="Confirm Password"
                    type="password"
                    class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full"
                    name="password_confirmation"
                    value=""
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
                   Save Changes
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