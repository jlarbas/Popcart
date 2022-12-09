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
        <div class="mb-6">
            <label>Select Restaurant</label>
            <select name="restaurantData" wire:model="restaurantData">
            @foreach($restaurant as $restaurantData)
            <option value="">--Please choose an option--</option>
                <option 
                    value="{{ $restaurantData->id }}" 
                >{{ $restaurantData->name }}</option>
            @endforeach
            </select>
        </div>
        <button type="button" wire:click="submitTicket">Submit </button>
        </form>
</div>
