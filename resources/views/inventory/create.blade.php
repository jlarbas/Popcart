@extends('layout')
@section('content')
@include('partials._hero')
<x-card class=" p-10 rounded  mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add a Record
        </h2>
        <button onclick="Livewire.emit('openModal', 'add-inventory')">Create Inventory Item</button>
      @livewire('livewire-ui-modal')
        
    </header>
    <livewire:main-inventory :restaurant="$restaurant"/>
</x-card>
@endsection