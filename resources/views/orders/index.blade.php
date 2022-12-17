@extends('layout')

@section('content')
@include('partials._hero')
    

<div class="bg-gray1 p-10 rounded-lg max-w-6xl mx-auto mt-24 border border-gray-100 shadow-lg"> 
<header class="text-center">

<a href="{{ route('home') }}"
                ><img class="w-40 "  src="{{ asset('images/logoCart4.png') }}" alt="" class="logo"/>
        </a><br>


        <h2 class="text-2xl font-semibold  mb-8">
            Incoming Orders
        </h2>
</header>

<div class="grid grid-cols-5 gap-x-2 gap-y-2 mr-5 ml-5 mt-5">

        @foreach ($restaurant->order as $orderData)
        
        @if($orderData->status == "pending")
         <div class="p-10 rounded-lg  mx-auto border border-gray-400">
             <p class="font-semibold">Order No.{{ $orderData->id }}</p>
             <p class="text-sm">Total: ₱{{ $orderData->total}}</p>
             <p class="text-sm">Date: {{ $orderData->created_at}}</p><br>
            
            <span class="inline-flex items-baseline">
             <a href="{{ route('displayOrder',[$restaurant->id,$orderData->id]) }}" class=" hover:text-hub font-semibold mr-2"></i>  Confirm </a>
             <form method="POST" action="{{ route('deleteorder',[$restaurant->id,$orderData->id])}}">
                @csrf
                @method('DELETE')
                <button class="text-red-400"><a class="hover:text-red-600 font-semibold">Cancel</a>
                </span>
            </form>
         </div>
     
         
         @endif
        @endforeach
    </div>
   
    
    <script>
        
    </script>
    
@endsection