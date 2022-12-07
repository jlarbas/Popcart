@extends('layout')
@section('content')
@include('partials._hero')

<a href="/" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<a
href="{{ route('pos',$restaurant->id) }}"
class="bg-hub inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
>POS</a
>

<div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ asset('images/no-image.png') }}"
                    alt=""
                />

            <h3 class="text-2xl mb-2">{{ $restaurant->name}}</h3>
            <x-listing-card :restaurant="$restaurant"/>
                            </div>
                    </div>
            </div>
    </x-card>
    @foreach($restaurant->products as $product)
    <p>{{$product->name}}
    {{$product->price}}
    <img
                    class="w-48 mr-6 mb-6"
                    src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
                    alt=""
                /></p>
    @endforeach
    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="{{ route('restaurants.edit',$restaurant->id)}}">
        <i class="fa-solid fa-pencil"> Edit </i>
        </a>
        <form method="POST" action="{{ route('restaurants.destroy', $restaurant->id) }}" >
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash">DELETE</i>
        </form>
    </x-card>

</div>

@endsection