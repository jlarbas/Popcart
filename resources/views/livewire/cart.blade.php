<div id="cart" class="grid grid-cols-3 gap-4 h-max">
    <div class="bg-gray-50 border border border-gray-100 shadow-lg rounded-lg p-6 ml-4 mt-8 screen-md">
        <div class="">
           <div class="">
                <div class="col ml-5 mb-3">
                    
               
               
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
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left capitalize">Name</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left capitalize" >Quantity</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left capitalize">Price</th>
                                </tr>
                            </thead>
                            
                            
                            <tbody>

                                @foreach($cart as $cartItem)
                                
                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cartItem->product->name}}</td>
                                    
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <span class="btn btn1 mr-2" wire.loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})"><i class="fa fa-minus"></i></span>
                                        {{$cartItem->quantity}}
                                        <span class="btn btn1 ml-2" wire.loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})"><i class="fa fa-plus"></i></span>
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
                        <div class="grid grid-cols-2 gap-4 w-96 bg-gray-200 mb-6 py-2 rounded-lg mt-6">
                            <div class="text-right">Total:</div>
                            <div class="text-right mr-2 font-semibold text-xl text-orange-400">₱{{$totalPrice}}</div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 w-96">
                            <div class="bg-hub text-white rounded py-2 px-4 hover:bg-orange-600 text-center"><button type="button" wire:click="submitCart" class="btn btn-success">Submit</button></div>
                            <div class="bg-hub text-white rounded py-2 px-4 hover:bg-orange-600 text-center"><button type="button" wire:click="cancelCart" class="btn btn-danger">Cancel</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    {{-- Menu Items --}}
    <div class="col-span-2 bg-gray-50 border border-gray-100 shadow-lg rounded-lg p-6 mr-4 mt-8">
        
        <div class="grid grid-cols-5 gap-x-0 gap-y-2 mr-20 ml-5">
            @foreach($restaurant->products as $product)
            @if($product->isAvailable == 1)
            <div class=" border-2 border-gray-400 rounded p-4">
                
                <a href="#"  wire:click="addToCart({{$product->id}})">
                <img
                class="h-32 w-32 mr-6 mb-2 border-2 content-center rounded-md"
                src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
                alt=""
                />
                </a>
                <p class ="text-xl">
                {{$product->name}} <p>
                <p class ="font-semibold text-orange-400">
                ₱{{$product->price}}<p>
                    
            </div>   
            </div>
            @endif
            @endforeach
          </div>
    </div>
    
   
    
</div>
