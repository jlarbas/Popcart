@extends('layout')
@section('content')
@include('partials._hero')



<div class="bg-gray1 mt-12 mr-12 ml-12  border border-gray-100 shadow-2xl rounded-2xl">
   

<br>
@include('partials._search_users')

<div class="ml-4">

    <a href="{{ route('register') }}"
    class="ml-4 bg-hub inline-block text-white py-3 px-4 rounded-xl hover:bg-orange-500 mb-2 mt-4"
    >Add Employee</a>
    
</div>
<br>


<div class="lg:grid lg:grid-cols-5 gap-4 space-y-4 md:space-y-0 mx-4 grid grid-auto-fit">

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

</div>