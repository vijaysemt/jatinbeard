<ul class="list-unstyled topnav-menu float-right mb-0">

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="{{ url('frontend/img/jatin-beard-oil-favicon.jpg') }}" alt="user-image" class="rounded-circle mt-md-0 mt-3">
            <span class="pro-user-name ml-1 text-capitalize">
                {{ Str::limit(Auth::user()->name,'10')}}<i class="mdi mdi-chevron-down"></i>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <a href="/profile" class="dropdown-item notify-item">
                <i class="mdi mdi-account-outline"></i>
                <span>Profile</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout-variant"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>


        </div>
    </li>


</ul>

<!-- LOGO -->
<div class="logo-box">
    <a href="/home" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ url('frontend/img/jatin-beard-oil.png') }}" alt="" width="120px" class="mt-3 ms-0">
            <!-- <span class="logo-lg-text-dark">Simple</span> -->
        </span>
        <span class="logo-sm">
            <!-- <span class="logo-lg-text-dark">S</span> -->
            <img src="{{ url('frontend/img/jatin-beard-oil-favicon.jpg') }}" alt="" width="45px" class="mt-3 ms-0">
        </span>
    </a>
    <a href="/home" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ url('frontend/img/jatin-beard-oil.png') }}" alt=""  width="120px"  class="mt-3 ms-0">
            <!-- <span class="logo-lg-text-light">Simple</span> -->
        </span>
        <span class="logo-sm">
            <!-- <span class="logo-lg-text-light">S</span> -->
            <img src="{{ url('frontend/img/jatin-beard-oil-favicon.jpg') }}" alt="" width="45px"  class="mt-3 ms-0">
        </span>
    </a>
</div>

<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
    <li>
        <button class="button-menu-mobile">
            <i class="mdi mdi-menu"></i>
        </button>
    </li>
    <li class="d-none d-sm-block">
        <h5 class="mt-3 pt-2">Jatin Beard Oil - Dashboard</h5>
    </li>
</ul>
