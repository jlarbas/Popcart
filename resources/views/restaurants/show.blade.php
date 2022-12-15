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
    
    <title>POP Cart</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    
</head>
<body style="background-image: linear-gradient(to right, #F8DFB9 , #F4C9D7)">
    <div class="bg-white">
        <nav class="flex justify-between items-center mb-0">

    
            <img class="w-24" src="{{ asset('images/logoCart.png') }}" alt="" class="logo"/> 
            
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

    <div class="p-10  bg-white mt-10 ml-14 mr-14 
    border border-white rounded-t-xl shadow-lg ">
    

    <a
    href="{{ route('pos',$restaurant->id) }}"
    class="border border-hub bg-white text-hub rounded-xl py-3 px-14 hover:text-white hover:bg-orange-500 text-center"
    >POS</a
    >
    @if(auth()->user()->role_id == 2)
    <a
    href="{{ route('orders',$restaurant->id) }}"
    class="border border-hub bg-white text-hub rounded-xl py-3 px-12 hover:text-white hover:bg-orange-500 text-center"
    >Orders</a
    >
    @endif
    

    </div>

    <div class="mx-4">
        
        <x-card class="p-10  bg-white border border-gray-100 rounded  ml-10 mr-10 mb-8 border border-gray-100 rounded-b-2xl shadow-lg ">
                
        
        <div class="grid grid-cols-2 flex bg-gradient-to-l from-red-300 to-white rounded-xl shadow-lg">

        <x-listing-showcard :restaurant="$restaurant"/>  
             

        <img class="h-full w-full opacity-50  rounded-r-xl"  
    src="{{ asset('images/WP4.png') }}"/>
        
        

  

            
        </div>  
           @if(auth()->user()->role_id == 1)
          
          <div class="flex mt-8">

          
                <div class="text-white rounded py-4 px-4 bg-gradient-to-r from-orange-500 to-orange-400 mr-2 ml-2 mb-2 text-left w-80">
                <p class="mb-4 text-lg font-semibold">₱{{$data}} </p>
                <p>Daily Sales </p> </div>

                <div class="text-white rounded py-4 px-4 bg-gradient-to-r from-orange-500 to-orange-400 mr-2 ml-2 mb-2 text-left w-80">
                <p class="mb-4 text-lg font-semibold">₱{{$week}} </p>
                <p>Weekly Sales </p> </div>
                <div class="bg-red-500">
                   
                </div>
            </div>
            
            @endif
        
        @if(auth()->user()->role_id == 2)


        <div class="grid grid-cols-5 gap-x-0 gap-y-2 mr-10 ml-10 mt-10">


        
        @foreach($restaurant->products as $product)
            <div class="border-2 border-orange-200  inline-block flex bg-white Z py-2 w-48 px-2 mt-2 mb-2 md:block rounded-xl shadow-lg">
                <img
                                class="hidden w-48 h-48 mr-6 md:block border border-gray-400 rounded-xl"
                                src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
                                alt=""
                            />
                <p class ="font-semibold text-lg  mt-2">{{$product->name}}</p>
                <p class ="font-semibold text-orange-600 text-lg">₱{{$product->price}}</p>
                <input data-id="{{$product->id}}" 
                class="toggle-class" 
                type="checkbox" 
                data-onstyle="success" 
                data-offstyle="danger" 
                data-toggle="toggle" 
                data-on="Active" 
                data-off="InActive" {{ $product->isAvailable ? 'checked' : '' }}> Availability
                </div>  
               
        @endforeach
            
        </div>
        @endif
    </div>    
    </x-card>



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

