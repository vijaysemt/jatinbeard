@include('header')

<style>
    @media screen and (orientation: landscape) {
        .carousel img {
            height: auto;
        }
    }
</style>


<main class="main-content">

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url('admin/assets/uploads/slider/oii.jpg')}}" class="d-block w-100" alt="...">
    </div>

     @foreach (App\Models\Slider::orderBy('order', 'DESC')->get() as $item)
         <div class="carousel-item">
          <img src="{{ url('admin/assets/uploads/slider/' . $item->image) }}" class="d-block w-100" alt="...">
        </div>

            @endforeach



  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>






    <!--== Start Offer Area Wrapper ==-->
    {{-- <div class="offer-area p-0" data-aos="" data-aos-duration="1000">
        <div class="">
            <div class="row g-0">
                <div class="col-sm-4 col-4 p-0">
                    <div class="single-offer">
                        <div class="thumb">
                            <a href="{{ url('shop') }}">
                                <img src="{{ url('frontend/img/mockup.jpg') }}" alt="Olivine-Image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-4 p-0">
                    <div class="single-offer">
                        <div class="thumb">
                            <a href="{{ url('shop') }}">
                                <img src="{{ url('frontend/img/ayurvedic-beard-oil.jpg') }}" alt="Olivine-Image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-4 p-0">
                    <div class="single-offer">
                        <div class="thumb">
                            <a href="{{ url('shop') }}">
                                <img src="{{ url('frontend/img/mockup1.jpg') }}" alt="Olivine-Image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--== End Offer Area Wrapper ==-->

    <!--== Start Discount Area Wrapper ==-->
    <section class="discount-area d-none d-sm-block " style="background:#f2f2f2;">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-md-5 mt-md-5">

                    <img src="{{ url('frontend/img/jatin.jpg') }}" >

                    <!--<div class="discount-content discount-content-style2 bg-img"-->
                    <!--    data-bg-img="">-->

                        <!--<h3>New Arrival</h3>-->
                        <!--<p>Proactively drive collaborative value and reliable mindshare. Distinctively negotiate-->
                        <!--    superior users via economically sound models. Energistically underwhelm.</p>-->
                        <!--<a href="{{ url('shop') }}" class="text-white btn border rounded-pill px-4">View-->
                        <!--    Collection</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Discount Area Wrapper ==-->

    <!--== Start Discount Area Wrapper ==-->
    <section class="discount-area d-block d-sm-none pt-80 lg-pt-65" style="background:#f2f2f2;" data-aos="fade-up"
        data-aos-duration="1000">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{ url('frontend/img/jatin.jpg') }}" >

                    <!--<div class="discount-content discount-content-style2 bg-img"-->
                    <!--    data-bg-img="{{ url('frontend/img/offer-1.jpg') }}">-->
                    <!--    <h3>New Arrival</h3>-->
                    <!--    <p>Proactively drive collaborative value and reliable mindshare. Distinctively negotiate-->
                    <!--        superior users via economically sound models. Energistically underwhelm.</p>-->
                    <!--    <a href="{{ url('shop') }}" class="text-white btn border rounded-pill px-4">View-->
                    <!--        Collection</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Discount Area Wrapper ==-->





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
                                                            <a href="{{ url('product', $item->id .'/'. $item->name ) }}">
                                                                <img src="{{ url('admin/assets/uploads/product/home/' . $item->pimage) }}"
                                                                    alt="" width="50px">

                                                            </a>

                                                            {{-- <div class="ribbons">
                                                                <span
                                                                    class="ribbon ribbon-onsale align-right">-25%</span>
                                                            </div> --}}

                                                        </div>
                                                        <div class="product-info">
                                                            <div class="row align-items-end mx-0">
                                                                <h4 class="title text-capitalize"><a
                                                                        href="{{ url('product', $item->id.'/'. $item->name ) }}">{{ $item->name }}</a>
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
                                                                    <!--<span class="price-old">₹{{ $item->price }}-->
                                                                    <!--</span>-->
                                                                </div>
                                                                <a href="{{ url('add-to-cart', $item->id) }}"
                                                                    class="btn btn-secondary">Add to Cart</a>
                                                                <!--<button-->
                                                                <!--    class="btn btn-success w-100 border-0 btn-whatesapp">-->
                                                                <!--    <a target="_blank" class="action-cart text-white"-->
                                                                <!--        href="https://wa.me/+917307051100?text=Hi, I am Interested to buy this product, Please guide me {{ $item['name'] }} price:- {{ $item['price'] }} {{ url('product/' . $item['id'] . '/' . $item['name']) }}">-->
                                                                <!--        <i class="icofont-whatsapp"></i> Order on-->
                                                                <!--        whatesapp-->
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


    <section style="background:#f2f2f2;" class="py-5">
        <div class="container">
            <div class="row">
                <script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-64197b0d-1f9d-4404-9580-9ed73209ef98" data-elfsight-app-lazy></div>
            </div>
        </div>
    </section>


    <!--== Start Brand Logo Area ==-->
    {{-- <div class="brand-logo-area brand-logo-default-area py-5" style="background:#f2f2f2;" >
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="swiper-container brand-logo-slider-container">
                        <div class="swiper-wrapper brand-logo-slider">
                            <div class="swiper-slide brand-logo-item">
                                <a href="#/"><img src="frontend/img/brand-logo/1.webp" width="100px"
                                        alt="Brand-Logo"></a>
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <a href="#/"><img src="frontend/img/brand-logo/2.webp" width="100px"
                                        alt="Brand-Logo"></a>
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <a href="#/"><img src="frontend/img/brand-logo/3.webp" width="100px"
                                        alt="Brand-Logo"></a>
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <a href="#/"><img src="frontend/img/brand-logo/4.webp" width="100px"
                                        alt="Brand-Logo"></a>
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <a href="#/"><img src="frontend/img/brand-logo/5.webp" width="100px"
                                        alt="Brand-Logo"></a>
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <a href="#/"><img src="frontend/img/brand-logo/6.webp" width="100px"
                                        alt="Brand-Logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</main>



@include('footer')
