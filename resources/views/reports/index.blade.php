@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')


<a
            href="{{ route('restaurants.create') }}"
            class="ml-4 bg-hub inline-block text-white py-2.5 px-4 rounded-md hover:bg-orange-500 mb-8"
            >Add Restaurant</a
        >


<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
@if(count($restaurants) == 0)
<h1>No Restaurants Found. Add your first restaurant </h1>
@endif

@foreach($restaurants as $restaurant)
    
<x-listing-reportcard :restaurant="$restaurant" />

@endforeach
</div>
    {{-- Paginate frontend --}}
    <div class="mt-6 p-4">
        {{ $restaurants->links() }}
    </div>
@endsection
