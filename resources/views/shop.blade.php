@include('header')

<!--== Start Product Tab Area Wrapper ==-->
<section class="product-area product-default-area" style="background:#f2f2f2;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-tab-content" data-aos="fade-up" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="popular-product" role="tabpanel"
                                    aria-labelledby="new-product-tab">
                                    <div class="row">

                                        @foreach (App\Models\Product::get() as $item)
                                            <div class="col-12 col-sm-3">
                                                <!-- Start Product Item -->
                                                <div class="product-item">
                                                    <div class="product-thumb">
                                                        <a href="{{ url('product', $item->id . '/' . $item->name) }}">
                                                            <img src="{{ url('admin/assets/uploads/product/home/' . $item->pimage) }}"
                                                                alt="" width="50px">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="row align-items-end mx-0">
                                                            <h4 class="title text-capitalize">
                                                                <a
                                                                    href="{{ url('product', $item->id . '/' . $item->name) }}">{{ $item->name }}</a>
                                                            </h4>
                                                            <div class="small fw-bold">
                                                                @if ($item->status == 0)
                                                                    <span class="font-weight-bold text-danger">
                                                                        @php
                                                                            echo 'In stock';
                                                                        @endphp
                                                                    </span>
                                                                @else
                                                                    <span class="font-weight-bold text-danger">
                                                                        @php
                                                                            echo 'Out of stock';
                                                                        @endphp
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="prices">
                                                                <span class="price">Rs.{{ $item->price }}/-</span>
                                                                <!--<span-->
                                                                <!--    class="price-old">₹{{ $item->price }}-->
                                                                <!--</span>-->
                                                            </div>
                                                            <a href="{{ url('add-to-cart', $item->id) }}" class="btn btn-secondary">Add to Cart</a>
                                                            <!--<button-->
                                                            <!--    class="btn btn-success w-100 border-0 btn-whatesapp">-->
                                                            <!--    <a target="_blank" class="action-cart text-white"-->
                                                            <!--        href="https://wa.me/+917307051100?text=Hi, I am Interested to buy this product, Please guide me {{ $item['name'] }} price:- {{ $item['price'] }} {{ url('product/' . $item['id'] . '/' . $item['name']) }}">-->
                                                            <!--        <i class="icofont-whatsapp"></i> Order on whatesapp-->
                                                            <!--    </a>-->
                                                            <!--</button>-->
                                                            <img src="{{ url('frontend/images/natural-logo.png') }}"
                                                                class="img-fluid d-block mx-auto w-50 mt-md-3 mt-2"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Product Tab Area Wrapper ==-->

@include('footer')
