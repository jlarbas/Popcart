<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('assets/style.css')}}" rel="stylesheet" type="text/css" >
        <title>Receipt</title>
    </head>
    <body style="background-image: linear-gradient(to right, #F8DFB9 , #F4C9D7)">
<a href="{{ route('history',$order->restaurant_id) }}">Back</a>

    

    <h1>{{$order->id}}</h1>
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
    
        
    
</div>
</div><br>
</body>
</html>
