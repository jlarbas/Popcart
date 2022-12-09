@extends('layout')

@section('content')
    <livewire:styles />
    <livewire:pos :restaurant="$restaurant" :cart="$cart" :product="$product"/>
    
    <livewire:scripts />
@endsection