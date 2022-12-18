@extends('layout')
@section('content')
@include('partials._hero')



<div class="flex h-screen">
<div class="m-auto bg-gray1 content-center shadow-xl rounded-xl  mt-20  xl:w-10/12">

@include('partials._search_products')


<div class="ml-4">

<a
href="{{ route('products.create') }}"
class="ml-4 bg-hub inline-block text-white py-3 px-4 rounded-xl hover:bg-orange-500 mb-2 mt-4"
>Add Product</a>

</div>
<br>



<div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mt-8 mx-40">

@if(count($products) == 0)
<h1>No products Found. Add your first product </h1>
@endif

@foreach($products as $product)
    
<x-listing-productcard :product="$product" />

@endforeach
</div>
    {{-- Paginate frontend --}}
    <div class="mt-6 p-4">
    {{ $products->links() }}
    </div>
@endsection
