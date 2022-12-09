@extends('layout')

@section('content')
    

    
    <div>
        @foreach ($restaurant->order as $orderData)
         <div>
            <a href="{{ route('displayOrder',$orderData->id) }}">Open</a>
             {{ $orderData->id }}
             {{ $orderData->status}}
             {{ $orderData->total}}
             {{ $orderData->created_at}}
         </div>
     
         
         
        @endforeach
    </div>
    
    
    
@endsection