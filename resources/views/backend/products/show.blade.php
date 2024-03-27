@extends('layouts.sagtech')

@section('content')

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{ asset('storage/products_images/' . $product->image_path) }}" alt="{{ $product->name }}" id="product-detail">
                </div>
                <!-- ... (carousel code) ... -->
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{ $product->name }}</h1>
                        <p class="h3 py-2">${{ number_format($product->price, 2) }}</p>
                        <!-- ... (other product details) ... -->
                        <h6>Description:</h6>
                        <p>{{ $product->description }}</p>
                        <!-- ... (other product details) ... -->
                        <form action="" method="GET">
                            <!-- ... (form and buttons) ... -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
