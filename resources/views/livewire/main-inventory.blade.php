<div>
    <div>
        @foreach($list as $data)
        <div>
        {{ $data->item_name }}
        {{ $data->quantity }}
        {{ $data->price }}
        {{ $data->measurement }}
        {{ $data->code }}
        {{ $data->quantity_used }}
        {{ $data->date_consumed }}
        {{ $data->description }}
        </div>
        @endforeach
       
        </div>
        <form method="POST" wire:submit.prevent="submitTicket" enctype="multipart/form-data">
        @csrf
        <div class="mb-6 mt-8 text-lg mb-8">
            <label class="inline-block text-base mb-2 text-hub">Select Restaurant</label><br>

            <select name="restaurantData" wire:model="restaurantData" class="border border-gray-400 rounded-xl hover:border-orange-500 p-4 w-full">
            @foreach($restaurant as $restaurantData)
            
            <option class="text-center" value=""></option>
                <option 
                    value="{{ $restaurantData->id }}" 
                >{{ $restaurantData->name }}</option>
            @endforeach
            </select>
        </div>
        <button type="button" wire:click="submitTicket" class="bg-hub text-white rounded-xl py-3 px-14 hover:bg-orange-500 w-full">Create </button>
        </form>
</div>
