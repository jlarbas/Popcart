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
    <x-card class="p-10  bg-white border border-gray-100 rounded mt-10 border border-gray-100 rounded-lg shadow-lg mb-8">
    <div class="">
        <form method="POST" action="{{ route('fetch') }}" enctype="multipart/form-data">
            @csrf
        <label
            for="date"
            class="inline-block text-lg mb-4"
            >Select Date</label
        ><br>
        <input
            type="date"
            class="border border-gray-400 rounded p-2 mb-4"
            name="date"
        /><br>
        @error('date_consumed')
        <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <div class="mb-6">
            <button
                class="bg-hub text-white rounded py-2 px-4 hover:bg-orange-500"
            >
                Search
            </button>
        </div>
    </form>
        <div>
            
            @foreach($order as $data)
            <div>
            <p>Order Number: {{ $data->id }}
            Total: {{ $data->total }}
            Date & Time: {{ $data->created_at }}</p>
            </div>
            @endforeach
        </div>
    </div>
    </x-card>   
    </main>
    <x-flash-message />
</body>
</html>      