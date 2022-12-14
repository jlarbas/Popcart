@extends('layout')

@section('content')
@include('partials._hero')
    

<div class="p-10 rounded-lg max-w-7xl mx-auto mt-8 bg-white shadow-lg"> 
<header class="text-center">
        <h2 class="text-2xl font-semibold  mb-8">
            Incoming Orders
        </h2>
</header>

<div class="grid grid-cols-5 gap-x-2 gap-y-2 mr-5 ml-5 mt-5">

        @foreach ($restaurant->order as $orderData)
        
        @if($orderData->status == "pending")
         <div class="p-10 rounded-lg  mx-auto border border-gray-400">
             <p>Order No.{{ $orderData->id }}</p>
             <p>Total: {{ $orderData->total}}</p>
             <p>Date: {{ $orderData->created_at}}</p>
             <a href="{{ route('displayOrder',[$restaurant->id,$orderData->id]) }}" class="hover:text-hub font-semibold">Confirm</a>
             <form method="POST" action="{{ route('deleteorder',[$restaurant->id,$orderData->id])}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash">Cancel</i>
            </form>
         </div>
     
         
         @endif
        @endforeach
    </div>
    </div>
    

    
@endsection