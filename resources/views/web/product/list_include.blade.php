@foreach($listProduct as $product)
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="{{ asset($product->getImagePath() ?? 'no_img.png') }}" alt="..."/>
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                    <!-- Product price-->
                    {{ $product->price }}
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                            href="{{ route('web.add_cart', ['id' => $product->id]) }}">Add to cart</a></div>
                <div class="text-center" style="padding-top: 10px"><a class="btn btn-outline-dark mt-auto"
                                                                      href="#">Detail</a></div>
            </div>
        </div>
    </div>
@endforeach
