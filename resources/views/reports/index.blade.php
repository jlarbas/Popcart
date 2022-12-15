@extends('layout')
@section('content')
@include('partials._hero')



<div class="bg-gray1 mt-12 mr-12 ml-12  border border-gray-100 shadow-2xl rounded-2xl">

@include('partials._search')
    

<div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mt-8 mx-40">

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

</div>   
@endsection
