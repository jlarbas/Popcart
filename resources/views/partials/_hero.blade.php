<section
class="relative h-72 bg-gradient-to-r from-orange-500 to-orange-300 flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
<div
    class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('images/laravel-logo.png')"
></div>

<div class="z-10">
    <h1 class="text-6xl font-bold uppercase text-white">
        POP<span class="text-black">Cart</span>
    </h1>
    <p class="text-2xl text-gray-200 font-bold my-4">
        
    </p>
    <div>
        
        <a
            href="{{ route('restaurants.index') }}"
            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
            >Restaurant</a
        >
        @if(auth()->user()->role_id == 1)
        <a
            href="{{ route('usersindex') }}"
            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
            >Employees</a>
        <a
        href="{{ route('products.index') }}"
        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
        >Products</a>
        <a
        href="{{ route('reports') }}"
        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
        >Reports</a>
    @endif
    <a
        href="{{ route('createInventory') }}"
        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
        >Inventory
    </a>
    
    </div>
    
</div>
</section>
