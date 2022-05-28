@foreach($listProduct as $product)
    <div class="product-item men m-4" onclick="window.location='{{ route('web.detail_product', ['id' => $product->id]) }}'">
        <div class="product discount product_filter" style="border-right: 1px solid rgb(233, 233, 233);">
            <div class="product_image">
                <img src="{{ asset($product->getImagePath() ?? 'no_img.png') }}">
            </div>
            <div class="favorite favorite_left"></div>
            <div
                class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                <span>-$20</span></div>
            <div class="product_info">
                <h6 class="product_name"><a href="{{ route('web.detail_product', ['id' => $product->id]) }}">{{ $product->name }}</a></h6>
                <div class="product_price">{{ $product->price }}</div>
            </div>
        </div>
        <div class="red_button add_to_cart_button"><a href="{{ route('web.add_cart', ['id' => $product->id]) }}">add to cart</a></div>
    </div>
@endforeach
