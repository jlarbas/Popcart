@props(['product'])

<div class="bg-gray-50 border border-gray-100 rounded w-50 p-5">
    <div class="flex">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-48 h-48 mr-6 md:block"
            src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="{{route('products.edit', $product->id)}}">{{ $product->name }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $product->price }}</div>
            <div class="text-xl font-bold mb-4">{{ $product->restaurant->name }}</div>
        </div>
    </div>
</div>