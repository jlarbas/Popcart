<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Receipt example</title>
    </head>
    <body>
<div class="ticket">
    <img src="./logo.png" alt="Logo">
    <p class="centered">RECEIPT No. {{$order->id}}
        <br>Address line 1
        <br>Address line 2</p>
    <table>
        <thead>
            <tr>
                <th class="description">Description</th>
                <th class="quantity">Q.</th>
                
                <th class="price">$$</th>
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
<button id="btnPrint" class="hidden-print">Print</button>
<script >
const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
window.print();
});
</script>
</body>
</html>