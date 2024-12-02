<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Jatin Beard Oil - india's best Oil</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ url('frontend/img/jatin-beard-oil-favicon.jpg') }}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&amp;display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/197305d821.js" crossorigin="anonymous"></script>



    <!--== Bootstrap CSS ==-->
    <link href="{{ url('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--== Font-awesome Icons CSS ==-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ url('frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!--== Icofont Min Icons CSS ==-->
    <link href="{{ url('frontend/css/icofont.min.css') }}" rel="stylesheet" />
    <!--== Fontello CSS ==-->
    <link href="{{ url('frontend/css/fontello.css') }}" rel="stylesheet" />

    <!--== Animate CSS ==-->
    <link href="{{ url('frontend/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/aos.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/jquery.fancybox.min.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/slicknav.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/slick.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/lightbox.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/css/lightbox.min.css') }}" rel="stylesheet" />
    
    <style>
        .border-gall {
            /*border: 1px solid #dfdfdf;*/
            /*padding: 10px;*/
            max-height: 450px;
            margin-bottom: 10px;
            overflow-y: scroll;
        }
    </style>

</head>

<body>

    <!--wrapper start-->
    <div class="wrapper home-default-wrapper">

        <!--== Start Preloader Content ==-->
        {{-- <div class="preloader-wrap">
            <div class="preloader">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div> --}}
        <!--== End Preloader Content ==-->

        <!--== Start Header Wrapper ==-->



        <header class="header-wrapper">

            <div class="alert alert-custom alert-dismissible fade show" role="alert">

                @foreach (App\Models\Topbar::get() as $item)
                    <marquee onmouseover="this.stop();" onmouseout="this.start();"> {!! $item->topbar !!} </marquee>
                @endforeach

                <button type="button" class="btn-close custom-close-btn" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>

            <div class="header-area header-default sticky-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-5 col-sm-3 col-md-3  col-lg-2">
                            <div class="header-logo-area">
                                <a href="{{ url('/') }}">
                                    <img class="logo-main" src="{{ url('frontend/img/jatin-beard-oil.png') }}"
                                        alt="Logo" />
                                    <img class="logo-light" src="{{ url('frontend/img/jatin-beard-oil.png') }}"
                                        alt="Logo" />
                                </a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9 col-md-9 col-lg-10">
                            <div class="header-align">
                                <div class="header-navigation-area">
                                    <ul class="main-menu nav justify-content-center">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <!--<li><a href="{{ url('shop') }}">Best Seller</a></li>-->


                                        <li class="has-submenu"><a href="{{ url('about-us') }}">About Us
                                            </a>
                                            <ul class="submenu-nav">
                                                <li><a href="{{ url('/chandar-prakash-vyas') }}">Chandar Prakash
                                                        Vyas</a></li>
                                                <li><a href="{{ url('/rahul-tanvi') }}">Rahul Tanvi</a></li>
                                                <li><a href="{{ url('/tanvi-jain') }}">Tanvi Jain </a></li>
                                                <li><a href="{{ url('/') }}">Our Mission</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-submenu"><a href="{{ url('shop') }}">Shop
                                            </a>
                                            <ul class="submenu-nav">
                                                @foreach (App\Models\Product::get() as $item)
                                                    <li><a
                                                            href="{{ url('product', $item->id . '/' . $item->name) }}">{{ $item->name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>

                                        <li class="has-submenu"><a href="{{ url('/') }}">Customer Help
                                            </a>
                                            <ul class="submenu-nav">
                                                @foreach (App\Models\Cmspage::get() as $date)
                                                    <li><a
                                                            href="{{ url('support/' . $date->id . '/' . $date->name) }}">{{ $date->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>


                                        {{-- <li><a href="{{ url('blog') }}">Blog</a></li> --}}
                                        <li><a href="{{ url('contact-us') }}">Contact us</a></li>

                                    </ul>
                                </div>
                                <div class="header-action-area">
                                    <div class="header-action-cart">
                                        <a class="cart-icons" href="">
                                            <i class="icofont-user-alt-3 text-dark"></i>
                                        </a>
                                    </div>
                                    <div class="header-action-cart pe-md-4">
                                        <a class="cart-icon" href="{{ url('/cart') }}">
                                            <i class="icofont-shopping-cart"></i>
                                            <span class="cart-count" @if(!isset($totalQuantity) || $totalQuantity < 1) hidden @endif>
                                                {{ $totalQuantity ?? '' }}
                                            </span>
                                           

                                        </a>
                                    </div>
                                    <div class="">
                                        <a class="cart-icon" href="tel:7307051100" target="_blank">
                                            <button
                                                class="d-none d-sm-block btn btn-dark rounded-pill px-md-3 px-3 py-1 btn-sm"><i
                                                    class="fab fa-whatsapp"></i> <span class=""> Let's
                                                    talk</span></button>
                                        </a>
                                    </div>
                                    <button class="btn-menu btn-menu-rs d-xl-none">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to check if the device is iOS
                function isiOS() {
                    return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
                }

                // Apply specific CSS if the device is iOS
                if (isiOS()) {
                    console.log('iOS device detected');

                    // Create a new style element
                    const style = document.createElement('style');
                    style.textContent = ".product-rating { margin-left: 100px !important; }";
                    document.head.appendChild(style);
                }
            });
        </script>
