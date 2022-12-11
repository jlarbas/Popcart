@extends('layout')

@section('content')
@include('partials._hero')
    

<div class="p-10 rounded-lg max-w-7xl mx-auto mt-8 bg-white shadow-lg"> 
<header class="text-center">
        <h2 class="text-2xl font-semibold  mb-8">
            Inventory
        </h2>
</header>


<div class="grid grid-cols-5 gap-x-2 gap-y-2 mr-5 ml-5 mt-5">

        @foreach($restaurant->inventory as $data)
         <div class="p-10 rounded-lg  mx-auto border border-gray-400">
            <a href="{{ route('displayInventory',$data->id) }}" class="hover:text-hub font-semibold">Inventory</a>
             <p>{{ $data->created_at }}</p> 
         </div>

        @endforeach
    </div>
    
    
    
@endsection