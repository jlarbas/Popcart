@extends('layout')
@section('content')
@include('partials._hero')

<div class="flex h-screen">
<div class="m-auto bg-white content-center shadow-xl rounded-xl mt-20 xl:w-3/5">

    <div class="p-5">
        <a class="bg-hub mb-8 text-white rounded-xl py-3 px-14 hover:bg-orange-500 w-full" href="{{ route('customsales',$pass) }}">
            Select Range</a>
        <br> 
        <form method="GET" action="" >
            @csrf
        <label
            for="date"
            class="inline-block text-lg mb-4"
            >Select Date</label
        ><br>
        <input
            type="date"
            class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-2/6"
            name="date"
        /><br>
        @error('date')
        <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <div class="mt-2 mb-6">
            <button
                class="bg-hub text-white rounded-xl py-3 px-3 hover:bg-orange-500 w-2/6"
            >
                Search
            </button>
        </div>
        </form>

        <h1 class="text-xl font-semibold">Sales</h1> <br>
        <p>Total Sales for Today {{ $data }}</p>
    </div>
</div>
</div>      
@endsection