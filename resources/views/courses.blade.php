@include('header')

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb style2 pb20">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="courses_single_container">
                    <div class="cs_row_one">
                        <div class="cs_ins_container">
                            <h1 class="mb-3 style2">{{ $data->name }}</h1>
                            <ul class="cs_review_seller">
                                <li class="list-inline-item"><a class="bg-logo" href="#"><span>Best
                                            Seller</span></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fa text-warning fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fa text-warning fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fa text-warning fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fa text-warning fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fa text-warning fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#">5.0 (2.2K Ratings)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Courses -->
<section id="top-courses" class="blog-post pt0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <img class="img-fluid rounded mb-4"
                    src="{{ url('admin/assets/uploads/courses/cover/'.$data['image'])}}" alt="">
                <div class="courses_single_container">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show  active" role="tabpanel" aria-labelledby="Overview-tab">
                            <div class="">
                                <div class="cs_overview style2">
                                    <h2 class="">{{ $data->name }}</h2>
                                    {{ $data->londescription }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 pl-lg-0 pr-lg-0">
                <div class="sidebar_course_widget style2">
                    <div class="course_list_details">
                        <div class="price_title my-auto">Price <span class="custome_price pr10 pl10 vas">
                                {{ $data->price }}</span></div>
                        <a class="btn btn-block buy_now_btn dbxshad bg-logo text-light btn-lg btn-thm3 mt20"
                            href="#">Buy & Enrol Now</a>
                        <ul class="icon-box-list mt20 mb0">
                            <li><span class="fwb fz15 icon flaticon-clock"></span> <span
                                    class="fwb fz15 pl10 title">Module</span> <span class="para">
                                    {{ $data->module }}</span></li>
                            <li><span class="fwb fz15 icon flaticon-creative-idea"></span> <span
                                    class="fwb fz15 pl10 title">Duration</span> <span class="para">
                                    {{ $data->duration }}</span></li>
                            <li><span class="fwb fz15 icon flaticon-ebook"></span> <span
                                    class="fwb fz15 pl10 title">Course Level</span> <span class="para">
                                    {{ $data->level }}</span></li>
                            <li><span class="fwb fz15 icon flaticon-account"></span> <span
                                    class="fwb fz15 pl10 title">Loanguage</span> <span class="para">
                                    {{ $data->loanguage }}</span></li>
                            <li><span class="fwb fz15 icon flaticon-resume"></span> <span
                                    class="fwb fz15 pl10 title">Quizzes</span> <span class="para">
                                    {{ $data->quizzes }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



@include('footer')
