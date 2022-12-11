@extends('layout')

@section('content')

    <div>
        @foreach($restaurant->inventory as $data)
         <div>
            <a href="{{ route('displayInventory',$data->id) }}">Open</a>
             {{ $data->created_at }}   
         </div>

        @endforeach
    </div>
    
    
    
@endsection