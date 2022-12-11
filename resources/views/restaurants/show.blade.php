@extends('layout')
@section('content')
@include('partials._hero')

<a href="/" class="inline-block text-black ml-4 mb-8 mt-8"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<a
href="{{ route('pos',$restaurant->id) }}"
class="bg-hub text-white rounded-lg py-2.5 px-14 hover:bg-orange-500"
>POS</a
>
<a
href="{{ route('orders',$restaurant->id) }}"
class="bg-hub text-white rounded-lg py-2.5 px-14 hover:bg-orange-500"
>Orders</a
>
<a
href="{{ route('inventory',$restaurant->id) }}"
class="bg-hub text-white rounded-lg py-2.5 px-14 hover:bg-orange-500"
>Inventory</a
>

<div class="mx-4">
    <x-card class="p-10  bg-white border border-gray-100 rounded mt-10 border border-gray-100 rounded-lg shadow-lg">

        <div class="">
            
            <x-listing-card :restaurant="$restaurant"/>
                            
    </x-card>

    <div class="grid grid-cols-5 gap-x-0 gap-y-2 mr-20 ml-20 mt-10">
    @foreach($restaurant->products as $product)
    
   <div class="inline-block flex bg-white border border-gray-400 py-2 w-48 px-2 mt-2 mb-2 md:block rounded shadow-lg ">
    <img
                    class="hidden w-48 h-48 mr-6 md:block"
                    src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
                    alt=""
                />
    <p class ="font-bold text-lg mb-2">{{$product->name}}</p>
    <p class ="font-bold text-orange-600 text-lg mb-2">₱{{$product->price}}</p>
    </div>
    @endforeach

    

             


            


</div>

    <x-card class="mt-8 p-2 flex space-x-6 border-none">
        <a href="{{ route('restaurants.edit',$restaurant->id)}}">
        <i class="not-italic bg-hub text-white rounded py-2 px-14 hover:bg-orange-500"> Edit </i>
        </a>
        <form method="POST" action="{{ route('restaurants.destroy', $restaurant->id) }}" >
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="not-italic bg-hub text-white rounded py-2 px-14 hover:bg-orange-500">Delete</i>
        </form>
    </x-card>

    @endsection