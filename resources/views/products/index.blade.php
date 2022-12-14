@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search_products')
<a
href="{{ route('products.create') }}"
class="ml-4 bg-hub inline-block text-white py-2.5 px-4 rounded-md hover:bg-orange-500 mb-8"
>Add Product</a
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
