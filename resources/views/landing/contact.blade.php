@extends('layout.app')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index;) }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class=" space-top">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163720.1196585383!2d8.496481908353985!3d50.12134787915029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bd096f477096c5%3A0x422435029b0c600!2sFrankfurt%2C%20Germany!5e0!3m2!1sen!2sbd!4v1657785197238!5m2!1sen!2sbd" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container">
            <div class="row gx-0">
                <div class="col-md-4 contact-box wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-box__icon"><img src="assets/img/icon/contact-1-1.png" alt="icon"></div>
                    <h3 class="contact-box__title h5">Office Address:</h3>
                    <p class="contact-box__text">3556 Hartford Way Vlg, Mount Pleasant, SC, 29466, Australia.</p>
                </div>
                <div class="col-md-4 contact-box wow fadeInUp" data-wow-delay="0.4s">
                    <div class="contact-box__icon"><img src="assets/img/icon/contact-1-2.png" alt="icon"></div>
                    <h3 class="contact-box__title h5">Call Us For Help:</h3>
                    <p class="contact-box__text"><a href="tel:+25925632562">+259 2563 2562</a> (or) <a href="tel:+25636542156">+256 3654 2156</a></p>
                </div>
                <div class="col-md-4 contact-box wow fadeInUp" data-wow-delay="0.5s">
                    <div class="contact-box__icon"><img src="assets/img/icon/contact-1-3.png" alt="icon"></div>
                    <h3 class="contact-box__title h5">Mail info:</h3>
                    <p class="contact-box__text"><a href="mailto:info@example.com">info@example.com</a> (or) <a href="mailto:contact@example.com">contact@example.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
      Contact Form Area
    ==============================-->
    <section class=" pt-20 space-bottom">
        <div class="container">
            <div class="row gx-60 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="assets/img/about/faq-1-1.png" alt="image">
                </div>
                <div class="col-lg-7 pt-5 pt-xl-0 wow fadeInUp" data-wow-delay="0.4s">
                    <form action="mail.php" method="POST" class="ajax-contact">
                        <span class="sec-subtitle">For Any Query</span>
                        <h2 class="sec-title mb-4 pb-2">Send Us a Message</h2>
                        <div class="row gx-20">
                            <div class="col-md-6 form-group">
                                <input type="text" placeholder="Your Name" name="name" id="name" class="form-control style4">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" placeholder="Your Email" name="email" id="email" class="form-control style4">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" placeholder="Phone No" name="number" id="number" class="form-control style4">
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="form-select style4" name="subject" id="subject">
                                    <option hidden selected>Service Cateory</option>
                                    <option value="Web-Development">Web Development</option>
                                    <option value="User Interface Design">User Interface Design</option>
                                    <option value="Web Conversion">Web Conversion</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Business Consultations">Business Consultations</option>
                                    <option value="Others Facility">Others Facility</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <textarea placeholder="Message" name="message" id="message" class="form-control style4"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="vs-btn" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messages mb-0 mt-3"></p>
                </div>
            </div>
        </div>
    </section>
@endsection