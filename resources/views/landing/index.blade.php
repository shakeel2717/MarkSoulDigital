@extends('layout.app')
@section('content')
    <section class="vs-hero-wrapper position-relative  ">
        <div class="vs-hero-carousel" data-height="885" data-container="1900" data-slidertype="responsive">
            <!-- Slide 1-->
            <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnsscale:1.2;">
                <img width="1920" height="888" src="landing/img/hero/hero-slide-4-1.jpg" class="ls-bg" alt="bg"
                    decoding="async" />
                <img width="131" height="118" src="landing/img/hero/hero-shape-7.png" class="ls-l ls-img-layer"
                    alt="shape" decoding="async"
                    style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:475px; left:1504px; -webkit-background-clip:border-box;"
                    data-ls="offsetxin:100; durationin:1500; delayin:1000; easingin:easeOutQuint; offsetxout:100; durationout:1500; easingout:easeOutQuint; parallax:true; parallaxlevel:3; parallaxevent:scroll; parallaxaxis:y; static:forever;">
                <div style="text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; font-size:24px; color:#fddf15; left:325px; top:260px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer"
                    data-ls="offsetyin:-100; durationin:1500; delayin:400; easingin:easeOutQuint; offsetyout:-100; durationout:1500; easingout:easeOutQuint;">
                    <i class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i><i
                        class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i>
                </div>
                <h1 style="font-size:80px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:700; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; color:#ffffff; font-family:Poppins; left:320px; top:280px;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">
                    Build Effective
                </h1>
                <h1 style="font-size:80px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:700; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; color:#ffffff; font-family:Poppins; left:320px; top:360px;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">
                    Strategy
                </h1>
                <p style="font-size:20px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:500; background-position:0% 0%; background-repeat:no-repeat; font-family:Poppins; left:325px; top:483px; line-height:20px; color:#ffffff; letter-spacing:2px;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; delayin:600; easingin:easeOutQuint; bgcolorin:transparent; colorin:transparent; offsetxout:-100; durationout:1500; bgcolorout:transparent; colorout:transparent;">
                    We Make Your Company Brighter</p>
                <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; left:325px; top:535px;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer"
                    data-ls="offsetyin:100; durationin:1500; delayin:800; easingin:easeOutQuint; offsetyout:100; durationout:1500; easingout:easeOutQuint;">
                    <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}" class="vs-btn style6">Get In Touch</a>
                    <a href="{{ route('login') }}" class="vs-btn style6">Sign In</a>
                    {{-- <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn style3 popup-video"><i
                            class="fas fa-play"></i></a> --}}
                </div>
                <div style="text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; border-style:solid; border-color:#000; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:#fddf15; left:150px; top:155px; font-size:34px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-html-layer"
                    data-ls="offsetyin:-100; durationin:1500; delayin:400; easingin:easeOutQuint; offsetyout:-100; durationout:1500; easingout:easeOutQuint;">
                    <i class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i><i
                        class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i>
                </div>
                <h1 style="font-size:100px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:700; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; color:#ffffff; font-family:Poppins; left:150px; top:206px;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">
                    Build Effective
                </h1>
                <h1 style="font-size:100px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:700; background-position:0% 0%; background-repeat:no-repeat; color:#ffffff; font-family:Poppins; left:150px; top:308px; border-style:solid; border-color:#000; background-clip:border-box; overflow:visible; cursor:auto; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">
                    Strategy
                </h1>
                <p style="font-size:34px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:500; background-position:0% 0%; background-repeat:no-repeat; font-family:Poppins; left:150px; top:478px; line-height:30px; color:#ffffff; letter-spacing:2px;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; delayin:600; easingin:easeOutQuint; bgcolorin:transparent; colorin:transparent; offsetxout:-100; durationout:1500; bgcolorout:transparent; colorout:transparent;">
                    We Make Your Company Brighter</p>
                <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; left:150px; top:573px;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-html-layer"
                    data-ls="offsetyin:100; durationin:1500; delayin:800; easingin:easeOutQuint; offsetyout:100; durationout:1500; easingout:easeOutQuint;">
                    <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}" class="vs-btn ls-vs-btn">Get In Touch</a>
                    <a href="{{ route('login') }}" class="vs-btn ls-vs-btn">Sign In</a>
                    {{-- <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn style3 popup-video"><i
                            class="fas fa-play"></i></a> --}}
                </div>
                <h1 style="font-size:110px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:700; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; color:#ffffff; font-family:Poppins; left:100px; top:150px;"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">
                    Build Effective
                </h1>
                <h1 style="font-size:110px; text-align:left; font-style:normal; text-decoration:none; text-transform:uppercase; font-weight:700; background-position:0% 0%; background-repeat:no-repeat; font-family:Poppins; left:100px; top:304px; border-style:solid; border-color:#000; background-clip:border-box; overflow:visible; cursor:auto; color:#ffffff; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer"
                    data-ls="offsetxin:-100; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">
                    Strategy
                </h1>
                <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; left:100px; top:496px;"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-html-layer"
                    data-ls="offsetyin:100; durationin:1500; delayin:800; easingin:easeOutQuint; offsetyout:100; durationout:1500; easingout:easeOutQuint;">
                    <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}" class="vs-btn ls-vs-btn">Get In Touch</a>
                    <a href="{{ route('login') }}" class="vs-btn ls-vs-btn">Sign In</a>
                </div>
            </div>
        </div>
    </section>

    <div class="body-wrap1" data-bg-src="landing/img/bg/body-bg-4-1.png">
        <!--==============================
                            Call To Action
                            ==============================-->
        <section class="  ">
            <div class="container">
                <div class="cta-wrap1" data-bg-src="landing/img/bg/cta-bg-4-1.jpg">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="cta-box1">
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{ asset('landing/img/svg/rocket.svg') }}" alt="cta" width="80">
                                </div>
                                <h3 class="cta-title"><a
                                        href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                        class="text-inherit">OUR
                                        VISION</a>
                                </h3>
                                <p class="cta-text">Empowering financial independence through expert-guided forex trading.
                                </p>
                                <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                    class="vs-btn style7">Get Started</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="cta-box1">
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{ asset('landing/img/svg/trophy.svg') }}" alt="cta" width="80">
                                </div>
                                <h3 class="cta-title"><a
                                        href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                        class="text-inherit">OUR
                                        MISSION</a>
                                </h3>
                                <p class="cta-text">Becoming the leading forex platform, setting new industry standards.
                                </p>
                                <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                    class="vs-btn style7">Get Started</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="cta-box1">
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{ asset('landing/img/svg/idea.svg') }}" alt="cta" width="80">
                                </div>
                                <h3 class="cta-title"><a
                                        href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                        class="text-inherit">OUR
                                        VALUES</a>
                                </h3>
                                <p class="cta-text">Integrity, Innovation, and Customer-Centric in every aspect of our
                                    service. </p>
                                <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                    class="vs-btn style7">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
                            Testimonial Area
                            ==============================-->
        <section class=" space-top space-extra-bottom">
            <div class="container">
                <div class="title-area text-center">
                    <div class="sec-pills text-white">
                        <div class="pill"></div>
                        <div class="pill"></div>
                        <div class="pill"></div>
                    </div>
                    <span class="sec-subtitle3 text-white">Why {{ env('APP_NAME') }}</span>
                    <h2 class="sec-title2 text-white">WHY CHOOSE US</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-9 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="vs-carousel testi-slide2" data-fade="true" data-arrows="true">
                            <P class="text-white">
                                {{ env('APP_NAME') }} in the market to become the leading forex trading platform,
                                recognized
                                for our
                                dedication to clients' prosperity, innovation, and transparency. We aim to set new standards
                                in the forex industry and help investors thrive in the global financial markets.
                            </P>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class=" space-top">
        <div class="container">
            <div class="row gy-gx">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="media-style4">
                        <div class="media-icon"><img src="landing/img/icon/fe-m-2-1.png" alt="icon"></div>
                        <div class="media-body">
                            <span class="media-label">22k</span>
                            <p class="media-info">Satisfied Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="media-style4 layout2">
                        <div class="media-icon"><img src="landing/img/icon/fe-m-2-2.png" alt="icon"></div>
                        <div class="media-body">
                            <span class="media-label">$305k</span>
                            <p class="media-info">Total Deposit</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="media-style4">
                        <div class="media-icon"><img src="landing/img/icon/fe-m-2-3.png" alt="icon"></div>
                        <div class="media-body">
                            <span class="media-label">$125k</span>
                            <p class="media-info">Total Withdrawals</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" space-top">
        <div class="container">
            <div class="row gx-60">
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
                    <p class="about-text1 mb-xl-3 mb-xxl-4 pb-2">Welcome to MarkSoulDigital (MSD), your trusted platform
                        for
                        forex trading excellence. We specialize in empowering investors like you to capitalize on the vast
                        potential of the forex market. Our cutting-edge platform brings together skilled traders and
                        ambitious investors seeking financial growth and success. At MSD, we believe in transparency,
                        innovation, and a commitment to our clients' prosperity.
                    </p>
                    <div class="row  align-items-center justify-content-end flex-row-reverse mt-4 mt-xxl-5 pt-3 pt-xl-1 ">
                        <div class="col-sm-auto">
                            <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                class="vs-btn style7">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <a href="{{ route('register', ['refer' => 'admin', 'position' => 'left']) }}"
                                class="vs-btn style7">Create Account</a>
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

    <div class="space-top space-extra-bottom mt-5" data-bg-src="landing/img/bg/process-bg-1.jpg">
        <div class="container position-relative ">
            <div class="process-shape1 d-none d-lg-block"><img src="landing/img/icon/process-shape-1-1.png"
                    alt="shape">
            </div>
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-auto process-style1">
                    <div class="process-body">
                        <div class="process-shape"></div>
                        <div class="process-number">01</div>
                        <div class="process-icon"><img src="landing/img/icon/pro-1-1.png" alt="icon"></div>
                        <p class="process-text">Understanding Your Goals</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-auto process-style1">
                    <div class="process-body">
                        <div class="process-shape"></div>
                        <div class="process-number">02</div>
                        <div class="process-icon"><img src="landing/img/icon/pro-1-2.png" alt="icon"></div>
                        <p class="process-text">Expert Trader Allocation</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-auto process-style1">
                    <div class="process-body">
                        <div class="process-shape"></div>
                        <div class="process-number">03</div>
                        <div class="process-icon"><img src="landing/img/icon/pro-1-3.png" alt="icon"></div>
                        <p class="process-text">Real-Time Monitoring and Analysis</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-auto process-style1">
                    <div class="process-body">
                        <div class="process-shape"></div>
                        <div class="process-number">04</div>
                        <div class="process-icon"><img src="landing/img/icon/pro-1-4.png" alt="icon"></div>
                        <p class="process-text">Transparent Reporting and Profits</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="overflow-hidden space-top">
        <div class="container-fluid px-0">
            <div class="row gx-2 gy-gx mb-2">
                @for ($i = 1; $i < 9; $i++)
                    <div class="col-sm-6 col-xl-4 col-xxl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="gallery-style4">
                            <div class="gallery-img">
                                <a href="javascript:void(0)"><img src="{{ asset('landing/img/gallery/' . $i . '.jpg') }}"
                                        alt="gallery"></a>
                            </div>
                            <div class="gallery-content">
                                <h3 class="gallery-title"><a href="javascript:void(0)"
                                        class="text-inherit">{{ env('APP_NAME') }}</a></h3>
                                <span class="gallery-degi">{{ env('APP_DESC') }}</span>
                                <a href="javascript:void(0)" class="gallery-btn"><img
                                        src="landing/img/icon/arrow-gal.png" alt="icon"></a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <div class="bg-negative space" data-bg-src="landing/img/bg/brand-bg-2-1.png">
        <div class="container">
            <div class="row vs-carousel text-center wow fadeInUp" data-wow-delay="0.3s" data-slide-show="5"
                data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">
                <div class="col">
                    <div class="brand-style1">
                        <img src="{{ asset('landing/img/brand/binance.jpg') }}" alt="Brand image">
                    </div>
                </div>
                <div class="col">
                    <div class="brand-style1">
                        <img src="{{ asset('landing/img/brand/exness.png') }}" alt="Brand image">
                    </div>
                </div>
                <div class="col">
                    <div class="brand-style1">
                        <img src="{{ asset('landing/img/brand/metamask.jpg') }}" alt="Brand image">
                    </div>
                </div>
                <div class="col">
                    <div class="brand-style1">
                        <img src="{{ asset('landing/img/brand/trustwallet.png') }}" alt="Brand image">
                    </div>
                </div>
                <div class="col">
                    <div class="brand-style1">
                        <img src="{{ asset('landing/img/brand/coinbase.jpeg') }}" alt="Brand image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class=" space-top space-extra-bottom" data-bg-src="landing/img/bg/sr-bg-5-1.jpg">
        <div class="container z-index-common">
            <div class="row justify-content-between">
                <div class="col-lg-auto text-center text-lg-start">
                    <div class="title-area">
                        <div class="sec-pills">
                            <div class="pill"></div>
                            <div class="pill"></div>
                            <div class="pill"></div>
                        </div>
                        <span class="sec-subtitle3">Business Strategy or services</span>
                        <h2 class="sec-title2">Solution Industries</h2>
                    </div>
                </div>
                <div class="col-auto align-self-end d-none d-sm-block">
                    <div class="sec-btn">
                        <a href="service.html" class="vs-btn style7">More Service</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-1.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Finance &
                                Restructuring</a></h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-2.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Strategy service &
                                Planning</a></h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-3.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Business Audit &
                                Evaluation</a></h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-4.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Finance Taxes &
                                Efficiency</a></h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-5.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Financial
                                Services</a></h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.8s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-6.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Planning
                                Communications</a></h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.9s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-7.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Business &
                                Evaluation</a></h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3  wow fadeInUp" data-wow-delay="0.9s">
                    <div class="service-style4">
                        <div class="service-icon"><img src="landing/img/service/sr-1-8.png" alt="icon"></div>
                        <h3 class="service-title"><a href="service-details.html" class="text-inherit">Taxes Financial
                                Services</a></h3>
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
            <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-ml-slide-show="3"
                data-lg-slide-show="2" data-md-slide-show="2">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-xl-4">
                        <div class="vs-blog blog-style3">
                            <div class="blog-img">
                                <a href="{{ route('post.show', ['post' => $post->id]) }}"><img
                                        src="{{ asset('landing/img/gallery/' . $loop->iteration . '.jpg') }}"
                                        alt="Blog Image" class="w-100"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="fal fa-bookmark"></i>Business</a>
                                </div>
                                <h3 class="blog-title h5">
                                    <a
                                        href="{{ route('post.show', ['post' => $post->id]) }}">{{ str()->words($post->title, 5) }}</a>
                                </h3>
                                <a href="{{ route('post.show', ['post' => $post->id]) }}" class="link-btn style2">Read
                                    More<i class="far fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
