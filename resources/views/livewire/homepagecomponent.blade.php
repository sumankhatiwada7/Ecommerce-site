<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @foreach ($products as $product)

    <div>

        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">

        <p>{{ $product->product_name}}</p>

        <p>{{ $product->description	 }}</p>

        <p>${{ $product->regular_price }}</p>

        <button wire:click="addToCart({{ $product->id }})">Add To Cart</button>

            <a href="{{ route('product.show', $product->id) }}" >View Details</a>

    </div>

@endforeach

</div>
