<div>
@extends('layout')
@section('content')
@include('partials._hero')
</div>



<div class="flex h-screen">
<div class="m-auto bg-white content-center shadow-xl rounded-xl mt-20 xl:w-3/5">

<br>
@include('partials._search')


    <div class="ml-4">

    <a
                href="{{ route('restaurants.create') }}"
                class="ml-4 bg-hub inline-block text-white py-3 px-4 rounded-xl hover:bg-orange-500 mb-2 mt-4"
                >Add Restaurant</a>

    </div>
        <br>

        
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            
            @if(count($restaurants) == 0)
            <h1>No Restaurants Found. Add your first restaurant </h1>
            @endif
                <div>    
                @foreach($restaurants as $restaurant)
                <x-listing-card :restaurant="$restaurant" />
                @endforeach
                </div>
                {{-- Paginate frontend --}}
                <div class="mt-6 p-4">
                    {{ $restaurants->links() }}
                </div>
        
        </div>
</div>
</div>
@endsection
