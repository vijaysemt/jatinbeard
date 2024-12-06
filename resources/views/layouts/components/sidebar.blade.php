<div class="user-box">

    <div class="float-left">
        <img src="{{ url('frontend/img/jatin-beard-oil-favicon.jpg') }}" width="100px" alt=""
            class="avatar-md rounded-circle">
    </div>

    <div class="user-info">
        <a href="#" class="text-capitalize">{{ Str::limit(Auth::user()->name, '10') }}</a>
        <p class="text-muted m-0">Administrator</p>
    </div>

</div>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="/home">
                <i class="ti-home"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="ti-files"></i>
                <span> Product Manage</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="/productlist">Product List</a></li>
                <li><a href="/createproduct">Add New Product</a></li>
                <li><a href="/productgall">Product Gallery</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="ti-files"></i>
                <span> Woocommerce</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ url('categorylist') }}">Category List</a></li>
                {{-- <li><a href="{{ url('labellist') }}">Label List</a></li>
                <li><a href="{{ url('trendinglist') }}">Trending List</a></li> --}}
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="ti-files"></i>
                <span> CMS Pages</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ url('pagelist') }}">CMS All pages </a></li>
            </ul>
        </li>

        <li>
            <a href="{{ url('sliderlist') }}">
                <i class="ti-files"></i>
                <span> Slider List</span>
            </a>
        </li>
        <li>
            <a href="{{ url('topbar') }}">
                <i class="ti-files"></i>
                <span> Topbar</span>
            </a>
        </li>
        <li>
            <a href="{{ route('coupons.index') }}">
                <i class="ti-layout-cta-btn-right"></i>
                <span> Coupons</span>
            </a>
        </li>
        <li>
            <a href="{{ url('orders') }}">
                <i class="ti-shopping-cart"></i>
                <span> Orders</span>
            </a>
        </li>

        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout-variant"></i>
                <span> Logout </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>

</div>
