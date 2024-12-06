@include('header')

{{--

<div class="container my-5">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Stock: {{ $product->stock }}</p>
    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Add to Cart</a>
    <a href="{{ route('shop') }}" class="btn btn-secondary">Back to Products</a>
</div> --}}

<!--== Start Shop Area ==-->
<section class="product-area shop-single-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 p-0 col-2 order-md-0 order-1" >
                <div class="sss" style="max-height: 580px!important; overflow-y:scroll;">
                    @foreach (App\Models\Productgall::where('pid', $data->id)->get() as $item)
                         <a class="example-image-link" class="border-gall" href="{{ url('admin/assets/uploads/product/gallery/'.$item->pimage) }}" data-lightbox="example-set">
                            <img src="{{ url('admin/assets/uploads/product/gallery/'.$item->pimage) }}"  class="border-gall" alt="{{ $item->alt }}" />
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-10 order-md-1 order-0">
                <div class="single">
                    <div class="product-dec-slider-right">
                        <div class="single-product-thumb">
                            <div class="single-product-thumb-slider">
                                <div class="">
                                    <div class="thumb-item">
                                        <a class="example-image-link" href="{{ url('admin/assets/uploads/product/cover/' . $data->pcover) }}" data-lightbox="example-set">
                                            <img src="{{ url('admin/assets/uploads/product/cover/' . $data->pcover) }}" alt="{{ $data->alt }}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-md-2 order-2">
                <div class="single-product-info">
                    <h4 class="title text-capitalize">{{ $data->name }}</h4>
                    <div class="product-ratting">
                        {{-- <div class="product-sku">
                            SKU: <span>1110</span>
                        </div> --}}
                        <div class="ratting-icons">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> &nbsp; <a href="javacript:0"> <u>5 star rating product
                                </u></a>
                        </div>
                    </div>
                    <span class="product-desc text-justify">{!! $data['description'] !!}</span>

                    <div class="product-availability mt-3">
                        Availability: <span> <b class="text-dark">
                                @if ($data['status'] == 0)
                                    <span class="text-danger">
                                        @php
                                            echo 'In stock';
                                        @endphp
                                    </span>
                                @else
                                    <span class="text-danger">
                                        @php
                                            echo 'Out of stock';
                                        @endphp
                                    </span>
                                @endif
                            </b>
                        </span>
                    </div>

                    <div class="prices">
                        <span class="price"><b>Rs.{{ $data['price'] }}/-</b></span>
                        <!--<span class="price-old">₹{{ $data['oprice'] }}</span>-->
                    </div>

                    <div class="quick-product-action">

                        <div class="action-bottom mb-3">
                            <a href="{{ route('cart.add', $data->id) }}" ><button class="btn btn-dark text-light  btn-black">Add to cart</button></a>
                            <a href="{{ route('shop') }}" ><button class="btn btn-black">Back to Products</button></a>

                        </div>

                        <!--<div class="action-top">-->
                        <!--    <a-->
                        <!--        href="https://wa.me/+917307051100?text=Hi, I am Interested to buy this product, Please guide me {{ $data['name'] }} price:- {{ $data['price'] }} {{ url('product/' . $data['id'] . '/' . $data['name']) }}" target="_blank">-->
                        <!--        <img src="{{ url('frontend/img/order-on-whatsapp.png') }}" style="max-width:200px; ">-->
                        <!--    </a>-->
                        <!--    {{-- <a class="btn-theme" href="shop-checkout.html">Buy it now</a> --}}-->
                        <!--</div>-->

                        {{-- <div class="product-social-info">
                            <span class="title-social">Share:</span>
                            <a href="#"><span class="shopify-social-icon-facebook-rounded color"></span></a>
                            <a href="#"><span class="shopify-social-icon-twitter-rounded color"></span></a>
                            <a href="#"><span class="shopify-social-icon-pinterest-rounded color"></span></a>
                        </div> --}}

                        <div class="product-availability">
                            Category: <span>

                                <span class="text-capitalize ">
                                    @foreach (App\Models\Category::get() as $item)
                                        <b>
                                            @if ($data['cate_id'] == $item->id)
                                                {{ $item->name }}
                                            @endif
                                        </b>
                                    @endforeach
                                </span>
                            </span>
                        </div>

                        <img src="{{ url('frontend/images/natural-logo.png') }}" class="img-fluid w-25 mt-md-3 mt-2" alt="">
                        {{-- <div class="payment-support">
                            <h5>Payment Methods:- </h5>
                            <ul class="payment-items">
                                <li class="payment-item"><img src="{{ url('frontend/img/icons/razorpay.png') }}"
                                        height="35" alt="paypal"></li>
                                <li class="payment-item"><img src="{{ url('frontend/img/icons/google.svg') }}"
                                        height="35" alt="google pay"></li>
                                <li class="payment-item"><img src="{{ url('frontend/img/icons/paytm.png') }}"
                                        height="35" alt="google pay"></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
</section>
<!--== End Shop Area ==-->

<!--== Start Shop Tab Area ==-->
<section class="product-area product-description-review-area pb-80">
    <div class="container">
        <div class="row">
            <h4 class="mb-md-4">Full Description</h4>
            <span class="text-justify">
                {!! $data['fdescription'] !!}
            </span>
        </div>
    </div>
</section>
<!--== End Shop Tab Area ==-->



@include('footer')
