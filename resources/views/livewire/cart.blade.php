<div id="cart" class="grid grid-cols-3 gap-4 bg-yellow-300 h-max">
    <div class="">
        <div class="">
           <div class="">
                <div class="col ml-5 mb-3">
                    <input type="text" class="form-control" placeholder="Scan Barcode...">
               
                
                    {{-- <select name="restaurant_id" wire:model="restaurantId">
                        @foreach($restaurant as $restaurantData)
                            <option 
                                value="{{ $restaurantData->id }}" 
                            >{{ $restaurantData->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
                
           </div>
        </div>
        {{-- Left Table --}}
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Product Name</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Quantity</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Price</th>
                                </tr>
                            </thead>
                            
                            
                            <tbody>

                                @foreach($cart as $cartItem)
                                
                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cartItem->product->name}}</td>
                                    
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <span class="btn btn1" wire.loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})"><i class="fa fa-minus"></i></span>
                                        {{$cartItem->quantity}}
                                        <span class="btn btn1" wire.loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})"><i class="fa fa-plus"></i></span>
                                    </td>
                                    
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$cartItem->product->price * $cartItem->quantity}}
                                        <span class="btn btn1" wire.loading.attr="disabled" wire:click="destroyQuantity({{$cartItem->id}})"><i class="fa fa-trash"></i></span>
                                    </td>
                                    
                                </tr>
                                
                               
                               @php 
                               
                               $totalPrice += $cartItem->product->price * $cartItem->quantity
                               @endphp
                                
                                @endforeach
                                
                            </tbody>
                           
                            
                            
                        </table>
                        <div class="grid grid-cols-2 gap-4 w-96 bg-blue-200">
                            <div class="text-right">Total:</div>
                            <div class="text-right mr-2">{{$totalPrice}}</div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 w-96">
                            <div class="text-center bg-green-500"><button type="button" wire:click="submitCart" class="btn btn-success">Submit</button></div>
                            <div class="text-center bg-red-500"><button type="button" wire:click="cancelCart" class="btn btn-danger">Cancel</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    {{-- Menu Items --}}
    <div class="col-span-2 bg-pink-300">
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Search Product">
        </div>
        <div class="grid grid-cols-5 gap-x-0 gap-y-2 mr-20 ml-5">
            @foreach($restaurant->products as $product)
            
            <div class="relative bg-red-200 h-32 w-32">
                
                <a href="#"  wire:click="addToCart({{$product->id}})">
                <img
                class="h-32 w-32 mr-6 mb-6"
                src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
                alt=""
                />
                </a>
                <div class="absolute bottom-0 left-0">
                {{$product->name}}
                {{$product->price}}
                </div>
            </div>
            @endforeach
          </div>
    </div>
    
   
    
</div>
