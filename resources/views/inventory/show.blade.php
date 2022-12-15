@extends('layout')

@section('content')
    

    
<div class="grid grid-cols-5 gap-x-2 gap-y-2 mr-5 ml-5 mt-8">
        @foreach($inventory->inventorylist as $data)
        <div class="p-10 rounded-lg  bg-white  py-10 bg-white shadow-lg">
             <p class="font-semibold text-base"> {{ $data->item_name }} </p>
             <p class="text-sm"> Quantity: {{ $data->quantity }} </p>
             <p class="text-sm"> Price: ₱{{ $data->price }} </p>
             <p class="text-sm"> Measurement: {{ $data->measurement }} </p>
             <p class="text-sm"> Item Code: {{ $data->item_code }} </p>
             <p class="text-sm"> Quantity Used: {{ $data->quantity_used }} </p>
             <p class="text-sm"> Date Consumed: {{ $data->date_consumed }} </p>
             <p class="text-sm"> {{ $data->description }} </p>
         </div>

        @endforeach
    </div>
    
    
    
@endsection