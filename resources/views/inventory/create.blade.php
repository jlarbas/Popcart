@extends('layout')
@section('content')
@include('partials._hero')
<x-card class="p-10 rounded-lg max-w-lg mx-auto mt-24 border border-gray-100 shadow-lg">
    <header class="text-center">
        <h2 class="text-2xl font-bold  mb-8">
            Add Record
        </h2>
        <button class="text-lg hover:text-orange-600" onclick="Livewire.emit('openModal', 'add-inventory')">Create Inventory Item</button>
      @livewire('livewire-ui-modal')
        
    </header>
    <livewire:main-inventory :restaurant="$restaurant"/>
</x-card>
@endsection