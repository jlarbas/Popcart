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
    <link href-"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" >
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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

        <img class="w-24" src="{{ asset('images/logoCart.png') }}" alt="" class="logo"/>
            
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

    
    <div class="flex h-screen">
    <div class="m-auto bg-white content-center shadow-xl rounded-xl mt-20 xl:w-3/5">
    
        <div class="p-5">
           
            <form method="GET" action="" >
                @csrf
            <label
                for="date"
                class="inline-block text-lg mb-4"
                >First Date: </label
            >
            <input
                type="date"
                class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-2/6"
                name="dateone"
            />
            <label
            for="date"
            class="inline-block text-lg mb-4"
            >Second Date: </label
            >
            <input
            type="date"
            class="mr-5 border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-2/6"
            name="datetwo"
            /><br>
            @error('date')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="mt-2 mb-6">
                <button
                    class="bg-hub text-white rounded-xl py-3 px-3 hover:bg-orange-500 w-2/6"
                >
                    Search
                </button>
            </div>
            </form>

            <h1 class="text-xl font-semibold">Sales</h1> <br>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>
                            Order Number
                        </th>  
                        <th>
                            Total
                        </th> 
                        <th>
                            Date
                        </th> 
                        <th>
                            Action
                        </th> 
                    </tr>  
                </thead>
                <tbody>
                    @foreach($order as $data)
                    
                    <tr>    
                    <td>
                    Order #: {{ $data->id }}
                    </td>
                    <td>
                Total: {{ $data->total }}
                    </td>
                    <td>
                    Date & Time: {{ $data->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('displayPurchases',$data->id) }}">View</a>
                    </td>    
                    </tr>
                
                    @endforeach
                </tbody>
                </table>    
        </div>
    </div>
    </div>      
    </main>
    <x-flash-message />
</body>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</html>      