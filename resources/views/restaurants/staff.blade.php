@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')
        

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
@if(count($restaurants) == 0)
<h1>No Restaurants Found. Add your first restaurant </h1>
@endif

@foreach($restaurants as $restaurant)
@if(auth()->user()->restaurant_id == $restaurant->id)
<x-listing-card :restaurant="$restaurant" />
@endif
@endforeach
</div>
    {{-- Paginate frontend --}}
    <div class="mt-6 p-4">
        {{ $restaurants->links() }}
    </div>
@endsection
