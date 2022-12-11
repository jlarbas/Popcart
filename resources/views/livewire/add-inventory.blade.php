<div>
    <form method="POST" wire:submit.prevent="storeInventory" enctype="multipart/form-data">
        
        @csrf
        <div class="mb-6 ml-2">
            <label
                for="item_name"
                class="inline-block text-lg mb-2"
                >Item Name</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 "
                name="item_name"
                wire:model="item_name"
                value="{{ old('item_name') }}"
            />
            @error('item_name')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <label
                for="quantity"
                class="inline-block text-lg mb-2"
                >Quantity</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 "
                wire:model="quantity"
                name="quantity"
                
            />
            @error('quantity')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="price"
                class="inline-block text-lg mb-2"
                >Price</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 "
                name="price"
                wire:model="price"
                
            />
            @error('price')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <label
                for="measurement"
                class="inline-block text-lg mb-2"
                >Measurement</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 "
                name="measurement"
                wire:model="measurement"
                
            />
            @error('measurement')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="item_code"
                class="inline-block text-lg mb-2"
                >Item Code</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 "
                name="item_code"
                wire:model="item_code"
                
            />
            @error('item_code')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <label
                for="quantity_used"
                class="inline-block text-lg mb-2"
                >Quantity Used</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 "
                name="quantity_used"
                wire:model="quantity_used"
            />
            @error('quantity_used')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="date_consumed"
                class="inline-block text-lg mb-2"
                >Date Consumed</label
            >
            <input
                type="date"
                class="border border-gray-200 rounded p-2 "
                name="date_consumed"
                wire:model="date_consumed"
            />
            @error('date_consumed')
            <p class="text-orange-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
              Description
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="2"
              placeholder="Include tasks, requirements, salary, etc" wire:model="description">{{old('description')}}</textarea>
    
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
        <div class="mb-6">
            <button
                class="bg-hub text-white rounded py-2 px-4 hover:bg-black"
            >
                Create Product
            </button>

            <a href="" wire:click="$emit('closeModal')" class="text-black ml-4"> Back </a>
        </div>
    </form>
</div>
