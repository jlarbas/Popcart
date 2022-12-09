@extends('layout')

@section('content')
    

    
    <div>
        @foreach($inventory->inventorylist as $data)
         <div>
             {{ $data->item_name }} 
             {{ $data->quantity }} 
             {{ $data->price }} 
             {{ $data->measurement }} 
             {{ $data->item_code }} 
             {{ $data->quantity_used }} 
             {{ $data->date_consumed }} 
             {{ $data->description }}
         </div>

        @endforeach
    </div>
    
    
    
@endsection