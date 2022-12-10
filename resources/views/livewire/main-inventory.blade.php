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
            <label>Select Restaurant</label><br>

            <select name="restaurantData" wire:model="restaurantData" class="border border-gray-400 rounded p-2 px-20">
            @foreach($restaurant as $restaurantData)
            <option value="">--Please choose an option--</option>
                <option 
                    value="{{ $restaurantData->id }}" 
                >{{ $restaurantData->name }}</option>
            @endforeach
            </select>
        </div>
        <button type="button" wire:click="submitTicket" class="bg-hub text-white rounded py-2 px-14 hover:bg-orange-500">Create </button>
        </form>
</div>
