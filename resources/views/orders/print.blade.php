<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('assets/style.css')}}" rel="stylesheet" type="text/css" >
        <title>POP Cart</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    </head>
    <body style="background-image: linear-gradient(to right, #F8DFB9 , #F4C9D7)">

    


    
<div class="ticket">

<div class="content">
    <img  class="" src="{{ asset('images/logoCartSmall.png') }}" alt="">
    <p  class="LogoName"> POP Cart </p>
    <p id="text1" class="centered">Receipt No. {{$order->id}}</p>
    <p id="text1"class="centered">{{$name->name}}</p>
    <p id="text1"class="centered">Cashier: {{auth()->user()->name}}</p>
    <p id="text1" >Address line 2</p><br>

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
    </table><br>
    <p class="centered">Thank you for your purchase!</p>
    

<button id="btnPrint" class="hidden-print">Print</button>


<a id="btn-reverse" class="hidden-print" href="{{ route('orders',$order->restaurant_id) }}"> Back</a>




</div>     
</div>
<script >
const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
window.print();
});


</script>
</body>
</html>

