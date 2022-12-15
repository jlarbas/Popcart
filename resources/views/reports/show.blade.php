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

    <div class="mx-4">
        <x-card class="p-10  bg-white border border-gray-100 rounded mt-10 border border-gray-100 rounded-lg shadow-lg mb-8">
            
            

            <x-listing-showcard :restaurant="$restaurant"/>  
            
           
          <div class="flex">
                <div class="text-white rounded py-4 px-4 bg-gradient-to-r from-orange-500 to-orange-400 mr-2 ml-2 mb-2 text-left w-80">
                    <p class="mb-4 text-lg font-semibold">₱{{$data}} </p>
                    <p>Daily Sales </p> 
                </div>

                <div class="text-white rounded py-4 px-4 bg-gradient-to-r from-orange-500 to-orange-400 mr-2 ml-2 mb-2 text-left w-80">
                    <p class="mb-4 text-lg font-semibold">₱{{$week}} </p>
                    <p>This Week's Sales </p> 
                </div>
                <div class="text-white rounded py-4 px-4 bg-gradient-to-r from-orange-500 to-orange-400 mr-2 ml-2 mb-2 text-left w-80">
                    <p class="mb-4 text-lg font-semibold">₱{{$lastweek}} </p>
                    <p>Last Week's Sales </p> 
                </div>
            </div>    
                
           
            <div class="flex">
                @foreach($products as $data)
                <div class="text-white rounded py-4 px-4 bg-gradient-to-r from-orange-500 to-orange-400 mr-2 ml-2 mb-2 text-left w-80">
                    <p class="mb-4 text-lg font-semibold">Total Purchases: {{$data->purchases}} </p>
                    <p class="mb-4 text-lg font-semibold">Total Sales: {{$data->sales}} </p>
                    <p>Product Name: {{$data->product_name}} </p> 
                </div>
                @endforeach
                
                
                  
        </x-card>
        <table style="width:100%">
            <tr>
              <th colspan="3">Daily</th>
            </tr>
            @if(count($day) == 0)
            <tr>
                <td colspan="3">No Sales yet Today</td>
            </tr>
            @endif
            @foreach($day as $data)
            <tr>
                <td width="33%">{{$data->product_name}}</td>
              <td width="33%">{{$data->purchases}}</td>
              <td width="33%">{{$data->sales}}</td>
              
            </tr>
            @endforeach
          </table>
          <table style="width:100%">
            <tr>
              <th colspan="3">Last 7 Days</th>
            </tr>
            @foreach($meddata as $data)
            <tr>
                <td width="33%">{{$data->product_name}}</td>
              <td width="33%">{{$data->purchases}}</td>
              <td width="33%">{{$data->sales}}</td>
              
            </tr>
            @endforeach
          </table>
          <table style="width:100%">
            <tr>
              <th colspan="3">Last 30 Days</th>
            </tr>
            @foreach($highdata as $data)
            <tr>
                <td width="33%">{{$data->product_name}}</td>
              <td width="33%">{{$data->purchases}}</td>
              <td width="33%">{{$data->sales}}</td>
              
            </tr>
            @endforeach
          </table>
    </div>    
       
        </main>
    <x-flash-message />
</body>
</html>      

