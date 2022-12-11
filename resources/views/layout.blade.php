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
        @livewireStyles
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
    <body class="mb-48">
    @if(auth()->user()->role != "customer")
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
        @endif
        <main>
        @yield('content')
        </main>
        {{-- <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-hub  text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a
            href="{{ route('createlistings') }}"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
            >Post Job</a
        >
    
    </footer> --}}
    <x-flash-message />
    @livewireScripts
    
</body>
</html>

    
