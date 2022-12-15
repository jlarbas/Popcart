<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('assets/style.css')}}" rel="stylesheet" type="text/css" >
        <title>Receipt</title>
    </head>
    <body style="background-image: linear-gradient(to right, #F8DFB9 , #F4C9D7)">


    

    
<div class="ticket">

<div class="content">
    <img  class="" src="{{ asset('images/logoCartSmall.png') }}" alt="">
    <p class="LogoName"> POP Cart </p>
    <p class="centered">Receipt No. {{$order->id}}
        
        <br>Address line 2</p><br>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderlist as $data)
            <tr>
                <td class="description">{{$data->product_name}}</td>
                <td class="quantity">{{$data->quantity}}</td>
                <td class="price">{{$data->price}}</td>
            </tr>
            @endforeach
        <table>
            <tr><br>
                 <td class="description">Cash:{{$order->payment}}</td>
                 <td class="description">Total:{{$order->total}}</td>
                 
            </tr>
            <tr>
                <td class="quantity">Change:{{$order->change}}</td>
                 <td class="price">VAT:{{$order->vat}}</td>
            </tr>
        </tbody>
    </table>
</table><br>
        
    


<form method="POST" action="{{ route('payment',$order->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label
            for="payment"
            class="inline-block text-lg mb-2"
            ></label
        >
        <input
            type="text"
            placeholder="Payment Amount"
            id="field-payment"
            name="payment"
            
        />
        @error('payment')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <button
            id="btn-confirm">
            Confirm
        </button>
    </div>
</form>
</body>
</html>

