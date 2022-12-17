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
                        <button type="submit" class="hover:text-hub ">
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
            
        <a class="bg-hub mb-8 text-white rounded-xl py-3 px-14 hover:bg-orange-500 w-full" href="{{ route('history',$restaurant->id) }}">
            Purchase History</a> 
        <a class="bg-hub mb-8 text-white rounded-xl py-3 px-14 hover:bg-orange-500 w-full" href="{{ route('saleshistory',$restaurant->id) }}">
            Sales History</a> <br>
        

            <x-listing-showcard :restaurant="$restaurant"/>  <br>  
                
          
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
                <div class="text-hub rounded-xl py-4 px-4 bg-orange-100 border border-hub shadow-lg mr-2 ml-2 mb-2 text-left w-full">
                    <p class="mb-4 text-lg font-semibold">₱{{$seven}} </p>
                    <p>Sales of the Last 7 Days</p> 
                </div>
                <div class="text-hub rounded-xl py-4 px-4 bg-orange-100 border border-hub shadow-lg mr-2 ml-2 mb-2 text-left w-full">
                    <p class="mb-4 text-lg font-semibold">₱{{$thirty}} </p>
                    <p>Sales of the Last 30 Days</p> 
                </div>
                <div class="text-hub rounded-xl py-4 px-4 bg-orange-100 border border-hub shadow-lg mr-2 ml-2 mb-2 text-left w-full">
                    <p class="mb-4 text-lg font-semibold">₱{{$month}} </p>
                    <p>Last Month's Sales</p> 
                </div>
            </div>  
        
            
            <select class="pull-left form-control input-lg ml-2 p-1 rounded-xl border border-hub" id="dropsearchselect" name="dropsearch">Select Search</option>
            <option value="overall">Overall</option>
            <option value="today">Daily</option>
            <option value="week">Last 7 Days</option>
            <option value="month">Last 30 Days</option>
            </select> 
            <div id="load">
            </div>
            <div id="overall">
                <table style="width:100%" >
                    <tr>
                      <th colspan="3">Overall</th>
                      
                    </tr>
                    @foreach($products as $data)
                    <tr>
                        <td width="33%">{{$data->product_name}}</td>
                      <td width="33%">{{$data->purchases}}</td>
                      <td width="33%">{{$data->sales}}</td>
                      
                    </tr>
                    @endforeach
                  </table>
            </div>   
            <div id="today">
            <table style="width:100%">
                <tr>
                  <th colspan="3">Daily</th>
                </tr>
                @foreach($day as $data)
                <tr>
                    <td width="33%">{{$data->product_name}}</td>
                  <td width="33%">{{$data->purchases}}</td>
                  <td width="33%">{{$data->sales}}</td>
                  
                </tr>
                @endforeach
              </table>
            </div>
            <div id="week">
              <table style="width:100%" id="week">
                <tr>
                  <th colspan="3">Last 7 days</th>
                  
                </tr>
                @foreach($meddata as $data)
                <tr>
                    <td width="33%">{{$data->product_name}}</td>
                  <td width="33%">{{$data->purchases}}</td>
                  <td width="33%">{{$data->sales}}</td>
                  
                </tr>
                @endforeach
              </table>
            </div>
              <div id="month">
              <table style="width:100%" id="month">
                <tr>
                  <th colspan="3">Last 30 days</th>
                  
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
                
        </x-card>
        

    </div>    
       
        </main>
    <x-flash-message />
</body>


<script>

    $("#today").hide();
    $("#week").hide();
    $("#month").hide();
    $(function () {
        
    $("#dropsearchselect").change(function () {
    if ($(this).val() == "today") {
        $("#today").show();
        $("#week").hide();
        $("#month").hide();
        $("#overall").hide();
    }
    else if ($(this).val() == "week") {
        $("#week").show();
        $("#today").hide();
        $("#month").hide();
        $("#overall").hide();
    }else if ($(this).val() == "month") {
        $("#month").show();
        $("#week").hide();
        $("#today").hide();
        $("#overall").hide();
    }
    else if ($(this).val() == "overall") {
        $("#month").hide();
        $("#week").hide();
        $("#today").hide();
        $("#overall").show();
    }

});
});
</script>
</html>      
