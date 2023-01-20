@extends('layout')
@section('content')
@include('partials._hero')


<!DOCTYPE html>
<html lang="en">
<link href="{{asset('assets/style.css')}}" rel="stylesheet" type="text/css">  
</html>


<div class="flex h-screen">
<div class="m-auto bg-gray1 content-center shadow-xl rounded-xl mt-20 md:w-2/5 lg:w-2/5  xl:w-10/12 text-base ">

    <div class="p-10 mt-4 ">
        <a class="bg-hub mb-8 text-white rounded-xl py-3 px-14 hover:bg-orange-500 w-full" href="{{ route('customsales',$pass) }}">
            Select Range</a>
        <br> 
        <form method="GET" action="" >
            @csrf
        <label
            for="date"
            class="inline-block mt-8 mb-2"
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


        
        <div class="mt-2 mb-8">
            <button
                class="bg-hub text-white rounded-xl py-3 px-3 hover:bg-orange-500 w-2/6"
            >
                Search
            </button>
        </div>
        </form>


        <table class="styled-table" style="width:100%">

        <thead>                   
                <tr>
                <th colspan="2">Sales</th>
                </tr> 
        </thead>


        <tbody>
                     <td>
                     Sales for this day
                    </td>

                     <td>
                     <p class="font-semibold">₱{{ $data }}</p>
                    </td>
        </table>
        <table id="myTable">
            <thead>
                <tr>
                    <th>
                        Product
                    </th>  
                    <th>
                        Total Purchases
                    </th> 
                    <th>
                        Total Sales
                    </th> 
                </tr>  
            </thead>
            <tbody>
                @foreach($products as $data)
                <tr>
                    <td width="33%">{{$data->product_name}}</td>
                  <td width="33%">{{$data->purchases}}</td>
                  <td width="33%">{{$data->sales}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>    




        



      



    </div>
</div>
</div>      
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection