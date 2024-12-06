@include('header')

<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content ">
                        <h2 class="title">Best Seller in this week!</h2>
                        <div class="bread-crumbs"><a href="{{ url('/') }}">Home<span class="breadcrumb-sep">></span></a><span
                                class="active">Best Seller</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Shop Area Wrapper ==-->
    <div class="product-area product-grid-area">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-topbar-wrapper">
                                <div class="collection-shorting">
                                    <div class="shop-topbar-left">
                                        <div class="view-mode">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link" id="nav-grid-tab" data-bs-toggle="tab"
                                                        data-bs-target="#nav-grid" type="button" role="tab"
                                                        aria-controls="nav-grid" aria-selected="false"><i
                                                            class="fa fa-th"></i></button>
                                                    <button class="nav-link active" id="nav-list-tab"
                                                        data-bs-toggle="tab" data-bs-target="#nav-list" type="button"
                                                        role="tab" aria-controls="nav-list" aria-selected="true"><i
                                                            class="fa fa-list"></i></button>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="product-show-content">
                                        <p>Showing 1 - 21 of 34 result</p>
                                    </div>
                                    <div class="product-short-list">
                                        <div class="product-show">
                                            <label for="SortBy">Sort by</label>
                                            <select class="form-select" id="SortBy"
                                                aria-label="Default select example">
                                                <option value="manual">Featured</option>
                                                <option value="best-selling">Best Selling</option>
                                                <option value="title-ascending" selected>Alphabetically, A-Z</option>
                                                <option value="title-descending">Alphabetically, Z-A</option>
                                                <option value="price-ascending">Price, low to high</option>
                                                <option value="price-descending">Price, high to low</option>
                                                <option value="created-descending">Date, new to old</option>
                                                <option value="created-ascending">Date, old to new</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <!-- Start Product Item -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="shop-single-product.html">
                                                <img src="frontend/img/shop/4.jpg" alt="Olivine-Shop">
                                            </a>
                                            <div class="ribbons">
                                                <span class="ribbon ribbon-hot">Sale</span>
                                                <span class="ribbon ribbon-onsale align-right">-15%</span>
                                                <span class="ribbon ribbon-new align-right-top">New</span>
                                            </div>
                                            <div class="product-action">
                                                <a class="action-cart" href="#/">
                                                    <i class="icofont-shopping-cart"></i>
                                                </a>
                                                <a class="action-quick-view" href="#/" title="Wishlist">
                                                    <i class="icon-zoom"></i>
                                                </a>
                                                <a class="action-compare" href="javascript:void(0);" title="Quick View">
                                                    <i class="icon-compare"></i>
                                                </a>
                                                <a class="action-wishlist" href="javascript:void(0);"
                                                    title="Quick View">
                                                    <i class="icon-heart-empty"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4 class="title"><a href="shop-single-product.html">1. New and sale badge
                                                    product</a></h4>
                                            <div class="prices">
                                                <span class="price">$110.00</span>
                                                <span class="price-old">$130.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Item -->
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <!-- Start Product Item -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="shop-single-product.html">
                                                <img src="frontend/img/shop/2.jpg" alt="Olivine-Shop">
                                            </a>
                                            <div class="ribbons">
                                                <span class="ribbon ribbon-hot">Sale</span>
                                                <span class="ribbon ribbon-onsale align-right">-10%</span>
                                            </div>
                                            <div class="product-action">
                                                <a class="action-cart" href="#/">
                                                    <i class="icofont-shopping-cart"></i>
                                                </a>
                                                <a class="action-quick-view" href="#/" title="Wishlist">
                                                    <i class="icon-zoom"></i>
                                                </a>
                                                <a class="action-compare" href="javascript:void(0);"
                                                    title="Quick View">
                                                    <i class="icon-compare"></i>
                                                </a>
                                                <a class="action-wishlist" href="javascript:void(0);"
                                                    title="Quick View">
                                                    <i class="icon-heart-empty"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4 class="title"><a href="shop-single-product.html">10. This is the
                                                    large title for testing large title and there is an image for
                                                    testing</a></h4>
                                            <div class="prices">
                                                <span class="price">$19.00</span>
                                                <span class="price-old">$21.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Item -->
                                </div>


                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="nav-list" role="tabpanel"
                            aria-labelledby="nav-list-tab">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Start Product Item -->
                                    <div class="product-item product-item-list">
                                        <div class="product-thumb">
                                            <a href="shop-single-product.html"><img src="frontend/img/shop/4.jpg"
                                                    alt="Olivine-Shop"></a>

                                            <div class="ribbons">
                                                <span class="ribbon ribbon-hot">Sale</span>
                                                <span class="ribbon ribbon-onsale align-right">-15%</span>
                                                <span class="ribbon ribbon-new align-right-top">New</span>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4 class="title"><a href="shop-single-product.html">1. New and sale
                                                    badge product</a></h4>
                                            <div class="prices">
                                                <span class="price">$110.00</span>
                                                <del class="price-old">$130.00</del>
                                            </div>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                                roots in a piece of classical Latin literature from 45 BC, making it
                                                over 2000 years old. Richard McClintock, a Latin professor at
                                                Hampden-Sydney College in Virginia,</p>
                                            <div class="product-action-btn">
                                                <a class="btn-compare" href="javascript:void(0);">
                                                    <i class="fa icon-compare"></i>
                                                </a>
                                                <a class="btn-add-cart" href="shop-cart.html">Add to cart</a>
                                                <a class="btn-wishlist" href="shop-wishlist.html">
                                                    <i class="icon-heart-empty"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Item -->
                                </div>
                                <div class="col-12">
                                    <!-- Start Product Item -->
                                    <div class="product-item product-item-list">
                                        <div class="product-thumb">
                                            <a href="shop-single-product.html"><img src="frontend/img/shop/2.jpg"
                                                    alt="Olivine-Shop"></a>

                                            <div class="ribbons">
                                                <span class="ribbon ribbon-hot">Sale</span>
                                                <span class="ribbon ribbon-onsale align-right">-10%</span>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4 class="title"><a href="shop-single-product.html">10. This is the
                                                    large title for testing large title and there is an image for
                                                    testing</a></h4>
                                            <div class="prices">
                                                <span class="price">$19.00</span>
                                                <del class="price-old">$21.00</del>
                                            </div>
                                            <p>A long established fact that a reader will be distracted by the readable
                                                content of a page when looking at its layout. The point of using Lorem
                                                Ipsum is that it has a more-or-less normal...</p>
                                            <div class="product-action-btn">
                                                <a class="btn-compare" href="javascript:void(0);">
                                                    <i class="fa icon-compare"></i>
                                                </a>
                                                <a class="btn-add-cart" href="shop-cart.html">Add to cart</a>
                                                <a class="btn-wishlist" href="shop-wishlist.html">
                                                    <i class="icon-heart-empty"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Item -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="pagination-area">
                        <nav>
                            <ul class="page-numbers">
                                <li>
                                    <a class="page-number disabled prev" href="blog.html">
                                        <i class="icofont-long-arrow-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="page-number active" href="blog.html">1</a>
                                </li>
                                <li>
                                    <a class="page-number" href="blog.html">2</a>
                                </li>
                                <li>
                                    <a class="page-number next" href="blog.html">
                                        <i class="icofont-long-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Shop Area Wrapper ==-->
</main>

@include('footer')
