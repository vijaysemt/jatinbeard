<footer style="background: #111" class=" text-md-start text-center text-light py-md-5 py-4">
    <div class="container">
        <div class=" mt-5">
            <div class="row">
                <div class="col-md-3">
                    <p class="text-light mb-3 fw-normal text-uppercase">Newsletter</p>
                    <p class=" mb-3">Sign up to our newsletter to receive exclusive offers</p>

                    <form action="">
                        <div class=" form-group">
                            <input type="text" name="" class="w-100 py-2 mb-3"
                                style="background:transparent; border:1px solid #555;">
                        </div>
                        <button class="btn rounded-0 btn-light px-4"><small> S U B S C R I B E</small></button>

                        <div class="social-widget mt-4">
                            <a href="https://www.facebook.com/profile.php?id=100064825326115" target="_blank"><i
                                    class="fa-brands fa-facebook " target="_blank"></i></a>
                            <a href="https://www.instagram.com/jatinbeard/" target="_blank"><i
                                    class="fa-brands fa-instagram "></i> </a>
                            <a href="https://www.youtube.com/@jatinjatinsharma95" target="_blank"><i
                                    class="fab fa-youtube "></i> </a>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <div class=" ps-md-5 pt-md-0 pt-5">
                        <p class="text-light mb-3 fw-normal text-uppercase">Quick Link's</p>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('about-us') }}">About Us</a></li>
                            <li><a href="{{ url('shop') }}">Shop</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class=" ps-md-5 pt-md-0 pt-4">
                        <p class="text-light mb-3 fw-normal text-uppercase">Abour Us</p>
                        <p>Jatin Beard , The People's Brand, is here to offer the best solutions for all your SKIN &
                            HAIR problems. A prominent and homegrown Indian brand, Jatin Beard has brought in
                            sophisticated amenities for our clients in the skin and hair department.</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ url('/') }}">
                        <img class="logo-main mb-md-4 mt-md-0 mt-4" src="{{ url('frontend/img/jatin-beard-oil.png') }}"
                            alt="Logo" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="py-5 text-md-start text-center" style="background: #111">
    <div class="container">
        <div class="row">
            <div class="col-md-7 order-md-0  order-1">
                <p class="">© 2023 Jatin Beard Oil. All rights reserved. Designed by <a target="_blank"
                        class="" style="color: #999" href="https://digitalmagnetix.in/"><u>
                            DigitalMagnetix</u></a><br>

                    <span class="text-warning">
                        Disclaimer: The Image is for representation purposes only. The packaging you receive might ARA
                    </span>
                </p>

            </div>
            <div class="col-md-5 text-md-end samll order-md-1 order-0">
                <div class=" mb-md-0 mb-4">
                    @foreach (App\Models\Cmspage::get() as $date)
                        <a class=" ps-md-4 px-2" style="color: #999"
                            href="{{ url('support/' . $date->id . '/' . $date->name) }}">{{ $date->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<!--== End Footer Area Wrapper ==-->
<!--== Scroll Top Button ==-->
<div class="scroll-to-top"><span class="icofont-arrow-up"></span></div>
<!--== Start Quick View Menu ==-->
{{-- <aside class="product-quick-view-modal">
    <div class="product-quick-view-inner">
        <div class="product-quick-view-content">
            <button type="button" class="btn-close">
                <span class="close-icon"><i class="fa fa-times-circle"></i></span>
            </button>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="thumb">
                        <img src="frontend/img/shop/quick-view1.webp" alt="Olivine-Shop">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="content">
                        <h4 class="title">Product dummy title</h4>
                        <div class="prices">
                            <del class="price-old">$167.540</del>
                            <span class="price">$141.76</span>
                        </div>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical Latin literature from 45 BC, making it over 2000 years old.
                            Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,
                        </p>
                        <div class="quick-view-select">
                            <div class="quick-view-select-item">
                                <label for="forSize" class="form-label">Size:</label>
                                <select class="form-select" id="forSize" required>
                                    <option selected value="">s</option>
                                    <option>m</option>
                                    <option>l</option>
                                    <option>xl</option>
                                </select>
                            </div>
                            <div class="quick-view-select-item">
                                <label for="forColor" class="form-label">Color:</label>
                                <select class="form-select" id="forColor" required>
                                    <option selected value="">red</option>
                                    <option>green</option>
                                    <option>blue</option>
                                    <option>yellow</option>
                                    <option>white</option>
                                </select>
                            </div>
                        </div>
                        <div class="action-top">
                            <div class="pro-qty">
                                <input type="text" id="quantity2" title="Quantity" value="1" />
                            </div>
                            <button class="btn btn-black">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="canvas-overlay"></div>
</aside> --}}
<!--== End Quick View Menu ==-->
<!--== Start Sidebar Cart Menu ==-->
{{-- <aside class="sidebar-cart-modal">
    <div class="sidebar-cart-inner">
        <div class="sidebar-cart-content">
            <a class="cart-close" href="javascript:void(0);"><i class="icofont-close-line"></i></a>
            <div class="sidebar-cart">
                <h4 class="sidebar-cart-title">Shopping Cart</h4>
                    <div class="product-cart">
                        @if ($cartItems)
                            @foreach ($cartItems as $item)
                                <div class="product-cart-item">
                                    <div class="product-img">
                                        <a href="shop.html"><img src="frontend/img/shop/cart/1.webp" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="title">{{ $item->product->name }}</h4>
                                        <span class="info">{{ $item->quantity }} × ${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                                    </div>
                                    <div class="product-delete"><a href="{{ route('cart.remove', ['id' => $item->product_id]) }}">×</a></div>
                                </div>
                            @endforeach
                        @else
                            <td>No Product in Cart</td>
                        @endif
                    </div>
                    <div class="cart-total">
                        <h4>Total: <span class="money">{{ number_format($total, 1) }}</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-theme" href="{{route('cart.index')}}">View Cart</a>
                        <a class="btn-theme" href="{{route('cart.checkout')}}">Checkout</a>
                    </div>
            </div>
        </div>
    </div>
</aside> --}}
<!--== End Sidebar Cart Menu ==-->
<!--== Start Side Menu ==-->
<aside class="off-canvas-wrapper">
    <div class="off-canvas-inner">
        <div class="off-canvas-overlay d-none"></div>
        <!-- Start Off Canvas Content Wrapper -->
        <div class="off-canvas-content">
            <!-- Off Canvas Header -->
            <div class="off-canvas-header">
                <div class="close-action">
                    <button class="btn-close"><i class="icofont-close-line"></i></button>
                </div>
            </div>
            <div class="off-canvas-item">
                <!-- Start Mobile Menu Wrapper -->
                <div class="res-mobile-menu">
                    <!-- Note Content Auto Generate By Jquery From Main Menu -->
                </div>
                <!-- End Mobile Menu Wrapper -->
            </div>
            <!-- Off Canvas Footer -->
            <div class="off-canvas-footer"></div>
        </div>
        <!-- End Off Canvas Content Wrapper -->
    </div>
</aside>
<!--== End Side Menu ==-->
</div>
<script>
    function showModal(event, itemId) {

        event.preventDefault();
        let currentUrl = window.location.href;
        //event.stopPropagation();
        // Prevent the default action (navigating to the cart page) // AJAX request to add product to cart 
        $.ajax({
            url: "{{ url('add-to-cart') }}/" + itemId,
            method: 'GET',
            // Assuming you're using a GET request to add items to the cart 
            success: function(response) {

                if (currentUrl.includes('/cart')) {
                    window.location.reload();
                }
                // Get the cart count element
                let cartCountElement = document.querySelector('.cart-count');

                // Get the current count (parse it as an integer)
                let cartCount = parseInt(cartCountElement.innerText);

                // Increment the cart count
                cartCount++;

                // Update the cart count display
                cartCountElement.innerText = cartCount;
                if (cartCount > 0) {
                    cartCountElement.removeAttribute('hidden');
                    cartCountElement.style.removeProperty('background-color');
                }
               
                var modal = new bootstrap.Modal(document.getElementById('buyNowModal'));
                modal.show();
                setTimeout(() => {
                    modal.hide();
                }, 3000);

            }
        });

    }
</script>
<script></script>
<!--=======================Javascript============================-->
<!--=== Modernizr Min Js ===-->
<script src="{{ url('frontend/js/modernizr.js') }}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{ url('frontend/js/jquery-3.6.0.min.js') }}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{ url('frontend/js/jquery-migrate.js') }}"></script>
<!--=== Popper Min Js ===-->
<script src="{{ url('frontend/js/popper.min.js') }}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
<!--=== jquery Appear Js ===-->
<script src="{{ url('frontend/js/jquery.appear.js') }}"></script>
<!--=== jquery Swiper Min Js ===-->
<script src="{{ url('frontend/js/swiper.min.js') }}"></script>
<!--=== jQuery Slick Min Js ===-->
<script src="{{ url('frontend/js/slick.min.js') }}"></script>
<!--=== jquery Fancybox Min Js ===-->
<script src="{{ url('frontend/js/fancybox.min.js') }}"></script>
<!--=== jquery Aos Min Js ===-->
<script src="{{ url('frontend/js/aos.min.js') }}"></script>
<!--=== jquery Slicknav Js ===-->
<script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
<!--=== jquery Countdown Js ===-->
<script src="{{ url('frontend/js/jquery.countdown.min.js') }}"></script>
<!--=== jquery Wow Min Js ===-->
<script src="{{ url('frontend/js/wow.min.js') }}"></script>
<!--=== jQuery Zoom Min Js ===-->
<script src="{{ url('frontend/js/jquery-zoom.min.js') }}"></script>
<!--=== Custom Js ===-->
<script src="{{ url('frontend/js/custom.js') }}"></script>
<!--instert link in footer-->
<script src="{{ url('frontend/js/lightbox.js') }}"></script>
<!--instert link in footer-->

</body>

</html>
