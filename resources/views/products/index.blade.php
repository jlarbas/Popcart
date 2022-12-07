@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')
<a
href="{{ route('products.create') }}"
class="bg-hub inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
>Add a Product</a
>
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@if(count($products) == 0)
<h1>No products Found. Add your first product </h1>
@endif

@foreach($products as $product)
    
<x-listing-productcard :product="$product" />

@endforeach
</div>
    {{-- Paginate frontend --}}
    {{ $products->links() }}
@endsection
