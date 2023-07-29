@extends('layout.app')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="landing/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="space-top mb-30">
    <div class="container">
        <div class="row gx-60 align-items-center">
            <div class="col-xl-6 mb-30 mb-xl-0 wow fadeInUp" data-wow-delay="0.3s">
                <div class="img-box5">
                    <div class="img-1"><img src="{{ asset('landing/img/about.jpg') }}" alt="about"></div>
                    <div class="shape-1"></div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="sec-pills">
                    <div class="pill"></div>
                    <div class="pill"></div>
                    <div class="pill"></div>
                </div>
                <span class="sec-subtitle3">Invest with confidence, trade with experts - MarkSoulDigital.</span>
                <h2 class="sec-title2 mb-2 mb-xxl-3 pb-1">Transcending borders, maximizing profits</h2>
                <p class="about-text1 mb-xl-3 mb-xxl-4 pb-2">Welcome to MarkSoulDigital (MSD), your trusted platform for
                    forex trading excellence. We specialize in empowering investors like you to capitalize on the vast
                    potential of the forex market. Our cutting-edge platform brings together skilled traders and
                    ambitious investors seeking financial growth and success. At MSD, we believe in transparency,
                    innovation, and a commitment to our clients' prosperity.
                </p>
                <div class="row  align-items-center justify-content-end flex-row-reverse mt-4 mt-xxl-5 pt-3 pt-xl-1 ">
                    <div class="col-sm-auto">
                        <a href="{{ route('register') }}" class="vs-btn style7">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class=" space-bottom">
    <div class="container">
        <div data-bg-src="landing/img/shape/counter-shape-1-1.jpg">
            <div class="row gx-0">
                <div class="col-md-6 col-lg vs-counter  wow fadeInUp" data-wow-delay="0.3s">
                    <div class="vs-counter__number">
                        <span class="amount">259</span>
                        <span class="quora">k</span>
                    </div>
                    <p class="vs-counter__text">Happy client's</p>
                </div>
                <div class="col-md-6 col-lg vs-counter  wow fadeInUp" data-wow-delay="0.4s">
                    <div class="vs-counter__number">
                        <span class="amount">958</span>
                        <span class="quora">M</span>
                    </div>
                    <p class="vs-counter__text">Project Complete</p>
                </div>
                <div class="col-md-6 col-lg vs-counter  wow fadeInUp" data-wow-delay="0.5s">
                    <div class="vs-counter__number">
                        <span class="amount">23</span>
                        <span class="quora">+</span>
                    </div>
                    <p class="vs-counter__text">Years Of Designing</p>
                </div>
                <div class="col-md-6 col-lg vs-counter  wow fadeInUp" data-wow-delay="0.6s">
                    <div class="vs-counter__number">
                        <span class="amount">32</span>
                        <span class="quora">+</span>
                    </div>
                    <p class="vs-counter__text">Loyal Employees</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class=" space-top">
    <div class="container">
        <div class="row gx-60">
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="sec-pills">
                    <div class="pill"></div>
                    <div class="pill"></div>
                    <div class="pill"></div>
                </div>
                <span class="sec-subtitle3">Unlock the full potential of forex markets alongside our experts.</span>
                <h2 class="sec-title2 mb-2 mb-xxl-3 pb-1">MSD: Where successful forex journeys begin.</h2>
                <p class="about-text1 mb-xl-3 mb-xxl-4 pb-2">We stand out as a premier choice for forex trading due to
                    our unwavering commitment to our clients' success and the exceptional value we bring to the table.
                    Our team of expert traders is driven by a passion for excellence and an in-depth understanding of
                    the forex market's intricacies. With a proven track record of delivering consistent profits and a
                    transparent approach, we offer a reliable and rewarding platform for investors to capitalize on the
                    vast potential of forex trading.
                </p>
                <div class="row  align-items-center justify-content-end flex-row-reverse mt-4 mt-xxl-5 pt-3 pt-xl-1 ">
                    <div class="col-sm-auto">
                        <a href="{{ route('register') }}" class="vs-btn style7">Create Account</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-30 mb-xl-0 wow fadeInUp" data-wow-delay="0.3s">
                <div class="img-box5">
                    <div class="img-1"><img src="{{ asset('landing/img/why.jpg') }}" alt="about"></div>
                    <div class="shape-1"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-bg-1 space-top space-extra-bottom">
    <div class="container">
        <div class="title-area text-center">
            <div class="sec-pills">
                <div class="pill"></div>
                <div class="pill"></div>
                <div class="pill"></div>
            </div>
            <span class="sec-subtitle3">Blog & News</span>
            <h2 class="sec-title2">Get Latest Updates</h2>
        </div>
        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-ml-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
            @foreach ($posts as $post)
            <div class="col-md-6 col-xl-4">
                <div class="vs-blog blog-style3">
                    <div class="blog-img">
                        <a href="{{ route('post.show',['post' => $post->id]) }}"><img src="{{ asset('landing/img/gallery/'.$loop->iteration.'.jpg') }}" alt="Blog Image" class="w-100"></a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fal fa-bookmark"></i>Business</a>
                        </div>
                        <h3 class="blog-title h5">
                            <a href="{{ route('post.show',['post' => $post->id]) }}">{{ str()->words($post->title,5) }}</a>
                        </h3>
                        <a href="{{ route('post.show',['post' => $post->id]) }}" class="link-btn style2">Read More<i class="far fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection