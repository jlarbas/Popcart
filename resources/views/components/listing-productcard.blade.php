@props(['product'])

<div class="rounded-lg shadow-lg p-6  ml-4 grid grid-auto-fit hover:bg-orange-200">

<a href="{{route('products.edit', $product->id)}}">

    <div class="grid grid-auto-fit">
        {{-- Shows the Picture in the database if not then default picture --}}
        <img
            class="hidden w-40  mr-6 md:block border border-gray-400 rounded-lg mb-2"
            src="{{$product->picture ? asset('storage/' . $product->picture) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-base font-semibold">
                {{ $product->name }}
            </h3>
            <div class="text-base font-semibold text-orange-600">₱{{ $product->price }}</div>
            <div class="text-base">{{ $product->restaurant->name }}</div>
            </a>
        </div>
    </div>
</div>