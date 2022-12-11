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
</div">
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
        </tbody>
    </table>
    <p class="centered">Thanks for your purchase!
        
    
</div>
</div><br>
<button id="btnPrint" class="hidden-print">Print</button>



<script >
const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
window.print();
});
</script>
</body>
</html>

