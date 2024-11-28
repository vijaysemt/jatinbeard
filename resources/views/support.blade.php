@include('header')


<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h2 class="title text-capitalize">{{ $data['name'] }}</h2>
                        <div class="bread-crumbs text-capitalize"><a href="{{ url('/') }}">Home<span
                                    class="breadcrumb-sep">></span></a><span class="active">{{ $data['name'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start About Area ==-->
    <section class="about-area py-5 my-md-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="text-justify"> {!! $data->content !!}</span>
                </div>
            </div>
        </div>
    </section>

</main>

@include('footer')
