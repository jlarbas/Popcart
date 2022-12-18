<div class="grid grid-auto-fit static">
@extends('layout')
@section('content')
</div>
<div class="bg-cover bg-no-repeat bg-center bg-[url('images/Wallpaper3.jpg')]">
<div class="flex h-screen">
<div class="m-auto bg-white content-center shadow-xl rounded-xl mt-20 xl:w-4/12">


    
  {{-- Left Side --}}



{{-- <div class="grid grid-auto-fit static">

<img class="object-fill  rounded-l-lg static bg-hub h-full opacity-80"  
    src="{{ asset('images/Wallpaper3.jpg') }}" alt="" class="logo"/>



</div> --}}

{{-- Right Side --}}


 <div class="flex justify-center mt-12">     
 <img class="w-28 border border-orange-400 shadow-lg rounded-full mb-4 "  
    src="{{ asset('images/logoCart.png') }}" alt="" class="logo"/>
 </div>   
        <h1 class="text-4xl font-bold text-hub  text-center mb-8">
         POP<span class="text-black">Cart</span>
        </h1>

        <form action="{{ route('authenticate') }}" method="POST" class="mb-8 p-5">
            @csrf
            <div class="mb-2">
                <label for="email" class="inline-block text-lg mb-2"> </label>
              
                <input
                   
                    type="email"
                    placeholder="Email Address"
                    class="border border-gray-400 rounded-xl p-4 w-full hover:border-orange-500 shadow-md"
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
                    class="inline-block text-lg mb-2">
                </label>
                <input
                    type="password"
                    placeholder="Password"
                    class="border border-gray-400 rounded-xl p-4 w-full hover:border-orange-500 shadow-md"
                    name="password"
                    
                />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

           
            <div class="mb-2 ">
                <button
                    type="submit"
                    class="bg-hub text-white rounded-xl hover:bg-orange-500 p-4 w-full">
                    Login
                </button>
            </div>
            
        </form>

    </div>
</div>
</div>

@endsection
