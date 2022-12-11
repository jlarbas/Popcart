@props(['product'])

<div class="bg-white border border-gray-00 rounded-lg p-6 shadow-lg">
    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 h-48 mr-6 md:block border border-gray-400 rounded-lg"
            src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-lg font-semibold hover:text-hub">
                <a href="{{route('products.edit', $product->id)}}">{{ $product->name }}</a>
            </h3>
            <div class="text-lg font-bold text-orange-600">₱{{ $product->price }}</div>
            <div class="text-lg">{{ $product->restaurant->name }}</div>
        </div>
    </div>
</div>