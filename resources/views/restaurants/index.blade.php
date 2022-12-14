@extends('layout')
@section('content')
@include('partials._hero')




<div class="bg-gray1 mt-12 mr-12 ml-12  border border-gray-100 shadow-2xl rounded-2xl">

<br>
@include('partials._search')


<div class="ml-4">

<a
            href="{{ route('restaurants.create') }}"
            class="ml-4 bg-hub inline-block text-white py-3 px-4 rounded-xl hover:bg-orange-500 mb-2 mt-4"
            >Add Restaurant</a
        >

        </div>
<br>


<div class="lg:grid lg:grid-cols-5 gap-4 space-y-4 md:space-y-0 mx-4 grid grid-auto-fit">
    
@if(count($restaurants) == 0)
<h1>No Restaurants Found. Add your first restaurant </h1>
@endif

@foreach($restaurants as $restaurant)
    
<x-listing-card :restaurant="$restaurant" />

@endforeach
</div>
    {{-- Paginate frontend --}}
    <div class="mt-6 p-4">
        {{ $restaurants->links() }}
    </div>
@endsection
