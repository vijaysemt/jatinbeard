@include('header')

<style>
.homeaddcart {
    background-color: #4fcf64;
    border-color: #4fcf64;
    border-radius: 2px;
}
.awrap{
    padding: 1px 20px;
    color: #fff;
    background-color: #ED5C0B;
    border-radius: 30px 0px 30px 0px;
    border: 1px solid transparent;
    box-shadow: 0 3px 3px 0 rgba(1, 1, 1, .55);
    -webkit-transition: .5s cubic-bezier(.22,.61,.36,1);
    -moz-transition: .5s cubic-bezier(.22, .61, .36, 1);
    transition: .5s cubic-bezier(.22,.61,.36,1);
    position: relative;
    display: inline-block;
    margin: 5px auto;
    text-transform: uppercase;
    font-size: 10px;
}

.product-item {
    position: relative;
    
}

.product-rating {
    right: 0px;
    background: rgba(255, 255, 255, 0.8); /* Slightly transparent background */
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 5px;
        margin-left: 60px;
}

.product-rating .rating-stars i {
    color: #FFD700; /* Gold color for stars */
}

.product-rating .rating-value {
    font-weight: bold;
    color: #333;
}

.offribbon {
    position: absolute;
    top: 1px; /* Adjust for spacing */
    left: 10px; /* Adjust for spacing */
    z-index: 10; /* Ensure it's on top of the product image */
    background-color: #f44336; /* Red color for the ribbon */
    color: white;
    padding: 5px 10px;
    font-size: 12px;
    font-weight: bold;
    border-radius: 3px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.ribbon span {
    display: inline-block;
    white-space: nowrap;
}

.action-buttons {
    gap: 10px; /* Space between the buttons */
}

.action-buttons .btn {
    flex: 1; /* Make both buttons equal width */
    padding: 7px 10px;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
}

.action-buttons .btn-primary {
    background-color: #007bff; /* Blue color for Add to Cart */
    color: white;
    border: none;
}

.action-buttons .btn-primary:hover {
    background-color: #0056b3;
}

.action-buttons .btn-success {
    background-color: #25d366; /* Green color for WhatsApp */
    color: white;
    border: none;
}

.action-buttons .btn-success:hover {
    background-color: #1da851;
}

.action-buttons i {
    font-size: 16px; /* Adjust icon size */
}

#whatsapp-button {
  position: fixed;
  bottom: 135px; /* Distance from the bottom of the screen */
  right: 20px; /* Distance from the right of the screen */
  z-index: 9999; /* Ensure it stays on top */
}

#whatsapp-button img {
  width: 50px; /* Button size */
  height: 50px;
  cursor: pointer;
}


.modal-footer-buttons { display: flex; justify-content: space-between; width: 100%; }
    @media screen and (orientation: landscape) {
        .carousel img {
            height: auto;
        }
        
    }


/* General fallback for all mobile devices */
@media (max-width: 767px)
{
    .product-rating {
        margin-left: 80px;
        font-size: 12px;
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
    <section class="product-area product-default-area" style="background:#ffffff;">
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
                                                        <div class="product-thumb" style='margin-bottom: 20px;'>
                                                           <!-- <div class="product-rating position-absolute top-right">
            <span class="rating-stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </span>
            <span class="rating-value">4.5</span>
        </div>-->
        @if(($item->oprice - $item->price) > 0 )
        <div class="offribbon">
                <span>{{ floor((($item->oprice - $item->price) * 100) / $item->oprice) }}% OFF</span>
            </div>
            <br>@endif
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
                                                            <div class="row align-items-start mx-0 mb-3">
															
														</div>
                                                            <div class="row align-items-end mx-0">
                                                                <h4 class="title text-capitalize"><a
                                                                        href="{{ url('product', $item->id.'/'. $item->name ) }}">{{ $item->name }}</a>
                                                                </h4>
                                                                 <div class="product-rating">
             <span class="rating-stars"> @if($item->rating) @for ($i = 0; $i < 5; $i++) @if ($i < floor($item->rating)) <i class="fas fa-star"></i> @elseif ($i < $item->rating) <i class="fas fa-star-half-alt"></i> @else <i class="far fa-star"></i> @endif @endfor @else <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i> @endif </span> <span class="rating-value"> @if($item->rating) {{ $item->rating }} @else 4.5 @endif </span> 
        </div>
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
                                                                
                                                                <!--<div class="prices">
                                                                    <span class="price">Rs.{{ $item->price }}/-</span>-->
                                                                    <!--<span class="price-old">₹{{ $item->price }}-->
                                                                    <!--</span>-->
                                                                <!--</div>-->
                                                                <!-- Price Tagline -->
    <div class="price-tagline mt-1 mb-2">
        <span class="current-price">₹{{ $item->price }}</span>
        @if(($item->oprice - $item->price) > 0 ) <span class="original-price text-muted text-decoration-line-through">₹{{ $item->oprice }}</span>
        <span class="discount text-success"> Save ₹{{ $item->oprice - $item->price}}</span>@endif
    </div>
                                                               <!-- <div class="static_card">
  <a class="button-wrap awrap" href="#">   <span class="price">Rs.699/- </span>  Cashback as Store Credits</a>

</div>-->
                                                                <div class="action-buttons d-flex justify-content-between align-items-center mt-2">
   

    <!-- WhatsApp Order Button -->
    <!--<a href="https://wa.me/+919996863180?text=Hi, I am Interested to buy this product, Product name : {{ $item['name'] }}" 
       target="_blank" 
       class="btn btn-success btn-sm d-flex align-items-center">
        <i class="fab fa-whatsapp me-1"></i> WhatsApp
    </a>-->
    
     <!-- Add to Cart Button -->
      
   <a href="#" onclick="showModal(event, {{ $item->id }})" class="btn btn-success btn-sm d-flex align-items-center">
   <i class="fas fa-cart-plus me-1"></i> Buy Now
</a>
</div>
                                                                <img src="{{ url('frontend/images/natural-logo.png') }}"
                                                                    class="img-fluid d-block mx-auto w-50 mt-md-3 mt-2"
                                                                    alt="">
                                                                     <!--<button-->
                                                                <!--    class="btn btn-success w-100 border-0 btn-whatesapp">-->
                                                                <!--    <a target="_blank" class="action-cart text-white"-->
                                                                <!--        href="https://wa.me/+917307051100?text=Hi, I am Interested to buy this product, Please guide me {{ $item['name'] }} price:- {{ $item['price'] }} {{ url('product/' . $item['id'] . '/' . $item['name']) }}">-->
                                                                <!--        <i class="icofont-whatsapp"></i> Order on-->
                                                                <!--        whatesapp-->
                                                                <!--    </a>-->
                                                                <!--</button>-->
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


    <section style="background:#ffffff;" class="py-5">
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
<div id="whatsapp-button">
<a href="https://wa.me/+917307051100?text=Hi, I am Interested to buy one of your products" 
       target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" />
    </a>
    </div>
<!-- Modal -->
<div class="modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered"> <!-- Centered vertically -->
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="buyNowLabel">
               <i class="icofont-check-circled"></i> Product Added Successfully!
            </h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         
         <!-- Modal Body -->
         <div class="modal-body text-center">
            <p class="text-muted mb-4">
               Your product has been added to the cart. You can continue shopping or proceed to your cart.
            </p>
          
         </div>

         <!-- Modal Footer -->
         <div class="modal-footer justify-content-center">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
               <i class="icofont-close-line"></i> Continue Shopping
            </button>
            <a href="{{ url('/cart') }}" class="btn btn-primary me-2">
               <i class="icofont-shopping-cart"></i> View Cart
            </a>
         </div>
      </div>
   </div>
</div>


@include('footer')
