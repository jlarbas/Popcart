
<section
class="relative h-72 bg-[url('/images/WP5.png')] flex flex-col 
justify-center align-center text-center space-y-4">


<div class="z-10">
    <h1 class="text-6xl font-bold text-hub">
        POP<span class="text-white">Cart</span>
    </h1>
    <p class="text-2xl text-gray-200 font-bold my-4">
        
    </p>
    <div>
        
        <a
            href="{{ route('restaurants.index') }}"
            class="ml-1 mr-1 inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-orange-400 hover:border-orange-400"
            >Restaurant</a
        >
        @if(auth()->user()->role_id == 1)
        <a
            href="{{ route('usersindex') }}"
            class="ml-1 mr-1 inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-orange-400 hover:border-orange-400"
            >Employees</a>
        <a
        href="{{ route('products.index') }}"
        class="ml-1 mr-1 inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-orange-400 hover:border-orange-400"
        >Products</a>
        <a
        href="{{ route('reports') }}"
        class="ml-1 mr-1 inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-orange-400 hover:border-orange-400"
        >Reports</a>
    @endif
    <a
        href="{{ route('createInventory') }}"
        class="ml-1 mr-1 inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-orange-400 hover:border-orange-400"
        >Inventory
    </a>
    
    </div>
    
</div>
</section>
