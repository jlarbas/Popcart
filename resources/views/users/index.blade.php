@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search_users')

<div>

    <a href="{{ route('register') }}"
    class="ml-4 bg-hub inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2"
    >Add Employee</a>
    
</div>
<br>
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@if(count($users) == 0)
<h1>No Listings Found</h1>
@endif

@foreach($users as $user)
    
<x-user-card :user="$user" />

@endforeach
</div>
    {{-- Paginate frontend --}}
    <div class="mt-6 p-4">
        {{ $users->links() }}
    </div>
@endsection
