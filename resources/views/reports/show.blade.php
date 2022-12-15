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
                        gray1: "#f2f2f2", 
                        pink1: "#f4c9d7"
                    },
                },
            },
        };
    </script>
    
    <title>Pop Cart</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
        
</head>
<body style="background-image: linear-gradient(to right, #F8DFB9 , #F4C9D7)">
    <div class="bg-white">
        <nav class="flex justify-between items-center mb-0">

    
            <a href="{{ route('home') }}"
                ><img class="w-24" src="{{ asset('images/logoCart.png') }}" alt="" class="logo"/> 
            </a>
            <ul class="flex space-x-6 mr-6 text-base">
                @auth
                <li>
                    <i class="fa-solid fa-user"></i><span class=""> {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-hub text-base">
                            <a><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </form>
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

    <div class="mx-4">
        <x-card class="p-10  bg-gray1 border border-gray-100 rounded mr-10 ml-10 mt-10 border border-gray-100 rounded-lg shadow-lg mb-10">
            
            <a href="{{ route('history',$restaurant->id) }}">Purchase History</a>

            <x-listing-showcard :restaurant="$restaurant"/>  
            
          
          <div class="grid grid-cols-3 grid-auto-fit gap-x-3 gap-y-3">
                <div class="text-hub rounded-xl py-4 px-4 bg-orange-100 border border-hub shadow-lg mr-2 ml-2 mb-2 text-left w-full">
                    <p class="mb-4 text-lg font-semibold">₱{{$data}} </p>
                    <p>Daily Sales </p> 
                </div>

                <div class="text-hub rounded-xl py-4 px-4 bg-orange-100 border border-hub shadow-lg mr-2 ml-2 mb-2 text-left w-full">
                    <p class="mb-4 text-lg font-semibold">₱{{$week}} </p>
                    <p>This Week's Sales </p> 
                </div>
                
                <div class="text-hub rounded-xl py-4 px-4 bg-orange-100 border border-hub shadow-lg mr-2 ml-2 mb-2 text-left w-full">
                    <p class="mb-4 text-lg font-semibold">₱{{$lastweek}} </p>
                    <p>Last Week's Sales </p> 
                </div>
            </div>  
            
            
            <div class="grid grid-cols-2 grid-auto-fit gap-x-3 gap-y-3 ml-2 mt-4 ">
            

            <div class="border border-gray-300 rounded-xl text-base shadow-lg">
            <br>
            <table style="width:80% centered">
                    
           
                    <thead>
                        <th colspan="3">Daily</th>
                        </tr>
                      <th width="33%">Product</th>
                      <th width="33%">Purchase</th>
                      <th width="33%">Total</th>

                        </tr>               
                    </thead>



                    @foreach($day as $data)
                    <tr>
                      <td width="33%">{{$data->product_name}}</td>
                      <td width="33%">{{$data->purchases}}</td>
                      <td width="33%">{{$data->sales}}</td>
                      
                    </tr>
                    @endforeach
                  </table>
         </div>
           
                


           
            <div class="grid grid-cols-2 grid-auto-fit gap-x-2 gap-y-2">
                @foreach($products as $data)
                <div class="border border-gray-300 rounded-xl text-black rounded py-4 px-4 bg-white mr-2  text-left  w-100">
                    <p class="mb-1 text-base font-semibold"> {{$data->product_name}} </p>
                    <p class="mb-1 text-sm ">Total Purchases: {{$data->purchases}} </p>
                    <p class="mb-1 text-sm ">Total Sales: {{$data->sales}} </p>
                     
                </div>
                @endforeach
                
                </div>     
                  
        </x-card>
        @if(auth()->user()->role_id == 2)
        <div class="grid grid-cols-5 gap-x-0 gap-y-2 mr-10 ml-10 mt-10">
            
        </div>
        @endif
    </div>    
       
        </main>
    <x-flash-message />
</body>
</html>      

