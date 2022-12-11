<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="icon" href="images/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <link href="{{asset('assets/style.css')}}" rel="stylesheet" type="text/css" >  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        hub: "#ff8400",
                    },
                },
            },
        };
    </script>
    
    <title>Home Page</title>
</head>
<body style="background-image: linear-gradient(to right, #F8DFB9 , #F4C9D7)">
    <div class="bg-white">
        <nav class="flex justify-between items-center mb-0">

    
            <a href="{{ route('home') }}"
                ><img class="w-24" src="{{ asset('images/logoCart.png') }}" alt="" class="logo"/> 
            </a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <i class="fa-solid fa-user"></i><span class=""> {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-hub ">
                            <a><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </form>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-hub "
                        ><i class="fa-solid fa-gear"></i>
                        Dashboard</a
                    >
                </li>

                    </div>
                @else
                <li>
                    {{-- <a href="{{ route('register') }}" class="hover:text-hub  "
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    > --}}
                    
                </li>
                <li>
                    <a href="{{ route('login') }}" class="hover:text-hub "
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                  
                </li>
                @endauth
            </ul>
        </nav>
    
    <main>
    @include('partials._hero')
    <a href="/" class="inline-block text-black ml-4 mb-8 mt-8"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <a
    href="{{ route('pos',$restaurant->id) }}"
    class="bg-hub text-white rounded-lg py-2.5 px-14 hover:bg-orange-500"
    >POS</a
    >
    <a
    href="{{ route('orders',$restaurant->id) }}"
    class="bg-hub text-white rounded-lg py-2.5 px-14 hover:bg-orange-500"
    >Orders</a
    >
    <a
    href="{{ route('inventory',$restaurant->id) }}"
    class="bg-hub text-white rounded-lg py-2.5 px-14 hover:bg-orange-500"
    >Inventory</a>

    <div class="mx-4">
        <x-card class="p-10  bg-white border border-gray-100 rounded mt-10 border border-gray-100 rounded-lg shadow-lg">
                <x-listing-showcard :restaurant="$restaurant"/>   
        </x-card>
        <h3>Daily Sales: {{$data}}</h3>
        <h3>Weekly Sales: {{$data}}</h3>
        @foreach($restaurant->products as $product)
            <div class="inline-block flex bg-white border border-gray-400 py-2 w-48 px-2 mt-2 mb-2 md:block rounded shadow-lg">
                <img
                                class="hidden w-48 h-48 mr-6 md:block border border-gray-400 rounded"
                                src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
                                alt=""
                            />
                <p class ="font-bold text-lg mb-2">{{$product->name}}</p>
                <p class ="font-bold text-orange-600 text-lg mb-2">₱{{$product->price}}</p>
                <input data-id="{{$product->id}}" 
                class="toggle-class" 
                type="checkbox" 
                data-onstyle="success" 
                data-offstyle="danger" 
                data-toggle="toggle" 
                data-on="Active" 
                data-off="InActive" {{ $product->isAvailable ? 'checked' : '' }}>
        @endforeach
        </div>
    </div>       
        </main>
    <x-flash-message />
</body>
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var isAvailable = $(this).prop('checked') == true ? 1 : 0; 
            var product_id = $(this).data('id'); 
            
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'isAvailable': isAvailable, 'product_id': product_id},
                success: function(data){
                console.log(data.success)
                }
            });
        })
    })
</script>  
</html>      

