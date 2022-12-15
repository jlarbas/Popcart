<div>
@extends('layout')
@section('content')
</div>


<div class="bg-white grid grid-cols-2 grid grid-auto-fit ml-40 mr-40 mt-20 mb-20 shadow-xl rounded-xl">


    
  {{-- Left Side --}}



<div class="grid grid-auto-fit static">

<img class="object-fill  rounded-l-lg static bg-hub h-full opacity-80"  
    src="{{ asset('images/Wallpaper3.jpg') }}" alt="" class="logo"/>



</div>

{{-- Right Side --}}

<div class="mr-20 ml-20 mt-20 mb-20 static">
      
<img class="w-28 border border-orange-400 shadow-lg rounded-full ml-28 static mb-4"  
    src="{{ asset('images/logoCart.png') }}" alt="" class="logo"/>


            
      

        <h1 class="text-4xl font-bold text-hub  text-center mb-8">
         POP<span class="text-black">Cart</span>
        </h1>

            </h2>

        <form action="{{ route('authenticate') }}" method="POST" class="mb-8">
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

           
            <div class="mb-6 ">
                <button
                    type="submit"
                    class="bg-hub text-white rounded-xl hover:bg-orange-500 p-4 w-full">
                    Login
                </button>
            </div>
            
        </form>
    </div>


</div>
@endsection

