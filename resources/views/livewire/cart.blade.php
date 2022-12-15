

<div id="cart" class="grid grid-cols-3 grid grid-auto-fit">


{{-- Menu Items --}}

<div class="col-span-2 bg-white border border-gray-100 shadow-r-2xl rounded-l-2xl p-6 mt-12  ml-12  ">

<a href="{{ route('home') }}"
                ><img class="w-40  mt-2 mb-2 ml-4 mr-2"  src="{{ asset('images/logoCart3.png') }}" alt="" class="logo"/>
        </a><br>

    <div class="grid grid-cols-4 gap-x-2 gap-y-5 grid grid-auto-fit">
        
        @foreach($restaurant->products as $product)
        @if($product->isAvailable == 1)
        <div class="p-4 border border-gray-200 hover:bg-orange-200 rounded-md grid grid-auto-fit shadow-md ml-2 hover:bg-orange-200">
            
            <a href="#"  wire:click="addToCart({{$product->id}})">
            <img
            class="border content-center rounded-md" 
            src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
            alt=""
            />
            <p class ="text-base">
            {{$product->name}} <p>
            <p class ="font-semibold text-orange-400">
            ₱{{$product->price}}<p>
            </a>  
         
            </div>
        @endif
        @endforeach
      </div>   <br>
    </div>
 


{{-- Left Table --}}

<div class="bg-gray1  shadow-l-2xl rounded-r-2xl p-6 mr-12 mt-12 grid grid-auto-fit">
<h2 class="text-xl font-semibold ml-4 mt-4">
        Current Order
    </h2>
         

            <div class="col ml-5 mb-3 grid grid-auto-fit ">
                
                {{-- <select name="restaurant_id" wire:model="restaurantId">
                    @foreach($restaurant as $restaurantData)
                        <option 
                            value="{{ $restaurantData->id }}" 
                        >{{ $restaurantData->name }}</option>
                    @endforeach
                </select> --}}
            </div>
            
      
   
    <div class="grid grid-auto-fit">


        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 bg-transparent">
   
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-20 ">
                        <thead class="">
                            <tr class="bg-transparent border-none ">
                        
                            </tr>
                        </thead>
                        
                        
                        <tbody wire:poll.750ms>

                            @foreach($cart as $cartItem)
                            
                            <tr class="bg-transparent border-none">

                            
                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-gray-900 text-left">{{$cartItem->product->name}}</td>
                                
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap content-left text-left">
                                    <span class="btn btn1 mr-2 " wire.loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})"><i class="fa fa-minus"></i></span>
                                    {{$cartItem->quantity}}
                                    <span class="btn btn1 ml-2" wire.loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})"><i class="fa fa-plus"></i></span>
                                </td>
                                
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left ">
                                    {{$cartItem->product->price * $cartItem->quantity}}
                                    <span class="btn btn1 ml-6" wire.loading.attr="disabled" wire:click="destroyQuantity({{$cartItem->id}})"><i class="fa fa-trash hover:text-orange-500 text-orange-400"></i></span>
                                </td>
                                
                            </tr>
                            
                           
                           @php 
                           
                           $totalPrice += $cartItem->product->price * $cartItem->quantity
                           @endphp
                            
                            @endforeach
                            
                        </tbody>
                       
                        
                        
                    </table>
                    <div class="grid grid-cols-2 gap-4 bg-white mb-6 py-4 rounded-lg mt-6 border border-gray-200 shadow-md">
                        <div class="text-left ml-4 text-lg">Total</div>
                        <div class="text-right font-semibold text-xl text-orange-400 mr-6">₱{{$totalPrice}}</div>
                    </div>

                    <div class="">
                        <div class="bg-hub text-white rounded-xl py-3 px-4 hover:bg-orange-500 text-center "><button type="button" wire:click="submitCart" class="btn btn-success">Confirm</button></div>
                        <p class="mb-2">
                        <div class="border border-hub bg-white text-hub rounded-xl py-3 px-4 hover:text-white hover:bg-orange-500 text-center"><button type="button" wire:click="cancelCart" class="btn btn-danger">Cancel</button></div>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>



      

