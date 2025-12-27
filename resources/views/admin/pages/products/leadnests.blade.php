@extends('client.layouts.app')
@push('head')
    <title>Leadnest</title>
    <link rel="shortcut icon" href="{{{{ asset('products/img/favicon.png') }}" type="images/x-icon" />
    <link rel="stylesheet" href="{{ asset('products/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('products/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('products/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('products/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('products/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('products/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('products/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<body class="home-dark">

    <div id="xb-loadding" class="xb-loader style-2">
        <div class="xb-dual-ring"></div>
    </div>

    <div class="xb-cursor tx-js-cursor style-2">
        <div class="xb-cursor-wrapper">
            <div class="xb-cursor--follower xb-js-follower"></div>
        </div>
    </div>

    <div class="progress-wrap style-2">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <div class="body_wrap">

        <!-- slide bar start -->
        <aside class="slide-bar">
            <div class="close-mobile-menu">
                <a class="tx-close" href="javascript:void(0);"></a>
            </div>

            <!-- sidebar-info start -->
            <div class="sidebar-info">
                <div class="sidebar-logo mb-30">
                    <a href="index.html">
                        <img src="{{ asset('products/img/logo/logo.svg') }}" alt="logo">
                    </a>
                </div>
                <div class="sidebar-content mb-40">
                    <p>Revolutionize Your Future: Harness the Power of Technology for Unparalleled Growth and Success!
                    </p>
                </div>
                <ul class="sidebar-menu list-unstyled">
                    <li><a href="#!">About</a></li>
                    <li><a href="#!">Services</a></li>
                    <li><a href="#!">Projects</a></li>
                    <li><a href="#!">Blog</a></li>
                    <li><a href="#!">Contact</a></li>
                </ul>
                <div class="ul_li mt-60">
                    <div class="ct-content-wrap d-flex">
                        <div class="ct-title col-auto">Call us:</div>
                        <div class="ct-content-wrap col">
                            <div class="ct-item-wrap row">
                                <div class="ct-item col-auto ">
                                    <span class="item-content"><a href="tel:02456787535" class="tel">024 5678
                                            7535</a></span>
                                </div>
                                <div class="ct-item col-auto "> <span class="item-content"><a
                                            href="mailto:support@gmail.com">support@gmail.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-socials-wrap mt-30"> <a class="social-item" href="https://facebook.com"
                        target="_blank">Facebook</a><a class="social-item" href="https://www.behance.net/"
                        target="_blank">Behance</a><a class="social-item" href="#" target="_blank">Telegram</a><a
                        class="social-item" href="https://dribbble.com/" target="_blank">Dribbble</a></div>
            </div>
            <!-- sidebar-info end -->

            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu">
                <div class="header-mobile-search">
                    <form role="search" method="get" action="#">
                        <input type="text" placeholder="Search Keywords">
                        <button type="submit"><i class="ti-search"></i></button>
                    </form>
                </div>
                <ul id="mobile-menu-active">
                    <li class="dropdown"><a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home Chatbot</a></li>
                            <li class="active"><a href="home-2.html">Home CRM</a></li>
                            <li><a href="home-3.html">Home Copy Writing</a></li>
                        </ul>
                    </li>
                    <li><a class="scrollspy-btn" href="#feature">Feature</a></li>
                    <li><a class="scrollspy-btn" href="#process">How it works</a></li>
                    <li class="dropdown">
                        <a href="#!">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-single.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Get in touch</a></li>
                </ul>

            </nav>
            <!-- side-mobile-menu end -->
        </aside>
        <div class="body-overlay"></div>
        <!-- slide bar end -->

        <main>
            <!-- hero start -->
            <section class="hero hero-style-two pos-rel pb-55">
                <div class="hero-bg wow fadeInUp" data-wow-delay="500ms" data-wow-duration=".5s"
                    data-background="{{ asset('products/img/bg/hero_bg.png') }}"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-10">
                            <div class="hero__content style-3 text-center">
                                <h1 class="title wow fadeInUp" data-wow-delay="0ms" data-wow-duration=".5s"> Accelerate
                                    and Supercharge
                                    <span class="xb-title--typewriter">
                                        <span class="xb-item--text is-active">Automated Leads</span>
                                        <span class="xb-item--text">Smartly Manage</span>
                                        <span class="xb-item--text">Boost Growth</span>
                                    </span>
                                </h1>
                                <div class="shape mb-30 wow fadeInUp" data-wow-delay="100ms" data-wow-duration=".5s">
                                    <img src="{{ asset('products/img/shape/h_line_shape.png') }}" alt="">
                                </div>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="200ms" data-wow-duration=".5s">
                                    Capture leads automatically, manage agents smartly, and <br> boost conversions
                                    effortlessly with LeadNest.</p>
                                <div class="btns wow fadeInUp" data-wow-delay="300ms" data-wow-duration=".5s">
                                    <a class="thm-btn thm-btn--gradient style-2" href="#!">Get a demo</a>
                                    <a class="thm-btn thm-btn--outline style-2" href="#!">View pricing</a>
                                </div>
                                <div class="hero-image mt-90 wow fadeInUp" data-wow-delay="400ms"
                                    data-wow-duration=".5s">
                                    <img src="{{ asset('products/img/hero/hero_img-3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="crm-hero__shape">
                    <div class="shape shape--1" data-parallax='{"y" : 80}'>
                        <img class="wow fadeInLeft" src="{{ asset('products/img/shape/h_shape6.png') }}" alt="">
                    </div>
                    <div class="shape shape--2">
                        <img src="{{ asset('products/img/shape/h_shape7.png') }}" alt="">
                    </div>
                    <div class="shape shape--3" data-parallax='{"y" : 70}'>
                        <img class=" wow fadeInRight" src="{{ asset('products/img/shape/h_shape8.png') }}" alt="">
                    </div>
                    <div class="shape shape--4">
                        <img src="{{ asset('products/img/shape/h_shape9.png') }}" alt="">
                    </div>
                </div>
            </section>
            <!-- hero start -->

            <!-- feature start -->
            <section id="feature" class="crm-feature pos-rel pt-70 pb-140">
                <div class="container">
                    <div class="crm-feature__title text-center mb-60">
                        Powerful features
                    </div>
                    <div class="row justify-content-center mt-none-20">
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/img/icon/ft_01.svg') }}" alt="">
                                </div>
                                <h3>Roles & User Management</h3>
                                <p>Admins manage unlimited agents, track their performance, set goals, and automate
                                    salary and incentive calculations based on lead conversions, ensuring structured
                                    user management.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/img/icon/ft_02.svg') }}" alt="">
                                </div>
                                <h3>Lead Acquisition & Distribution</h3>
                                <p>Leads can be added manually, uploaded in bulk, or fetched automatically via Meta Ads
                                    and Google Ads, then assigned to agents with balanced workload distribution.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/img/icon/ft_03.svg') }}" alt="">
                                </div>
                                <h3>Real-time Notifications & Escalations</h3>
                                <p>
                                    Agents receive alerts for untracked leads, and Admins get instant notifications of
                                    delayed updates, ensuring full transparency and accountability throughout lead
                                    management.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/img/icon/ft_04.svg') }}" alt="">
                                </div>
                                <h3>Dashboard & Reporting</h3>
                                <p>
                                    Dynamic dashboard tracks revenue daily, weekly, monthly, and all-time with
                                    multi-currency support. Reports include agent activity, closed leads, sales
                                    performance, and revenue analytics.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/img/icon/ft_05.svg') }}" alt="">
                                </div>
                                <h3>Lead Lifecycle Management</h3>
                                <p>Leads can be added, edited, closed, or reopened. All interactions are tracked, and
                                    custom statuses and interaction types fit business-specific workflows.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/img/icon/ft_06.svg') }}" alt="">
                                </div>
                                <h3>Automation & Configurations</h3>
                                <p>Configure lead statuses, auto-replies, and workflows. Integrate with marketing
                                    platforms for real-time capture and send smart reminders for follow-ups and
                                    prioritization.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/img/icon/ft_07.svg') }}" alt="">
                                </div>
                                <h3>Collaboration & Scalability</h3>
                                <p>Agents can reassign leads or send to queues. Scales to handle multiple agents and
                                    large lead volumes, suitable for businesses of any size.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="crm-feature__shape">
                    <div class="shape shape--1" data-parallax='{"y" : 70}'>
                        <img src="{{ asset('products/img/shape/ft_shape1.png') }}" alt="">
                    </div>
                    <div class="shape shape--2" data-parallax='{"y" : 80}'>
                        <img src="{{ asset('products/img/shape/ft_shape2.png') }}" alt="">
                    </div>
                </div>
            </section>
            <!-- feature end -->

            <!-- process start -->
            <section id="process" class="process pos-rel pb-120">
                <div class="process__shape">
                    <div class="shape shape--1" data-parallax='{"x" : 70}'>
                        <img src="{{ asset('products/img/shape/pr_shape1.png') }}" alt="">
                    </div>
                    <div class="shape shape--2">
                        <img src="{{ asset('products/img/shape/pr_shape2.png') }}" alt="">
                    </div>
                    <div class="shape shape--3" data-parallax='{"y" : 80}'>
                        <img src="{{ asset('products/img/shape/pr_shape3.png') }}" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="crm-title text-center mb-60">
                        <h2 class="crm-title__heading">Essential apps that protect <br> your data</h2>
                    </div>
                    <div class="process__wrap ul_li_between">
                        <div class="process__title mt-30">
                            <h3 class="title">Capture leads<br>automatically</h3>
                            <p>Integrate Meta Ads, Google Ads, or upload CSV files to instantly capture and centralize
                                all lead data.</p>
                            <div class="mt-35">
                                <a class="thm-btn thm-btn--gradient style-2" href="#!">Learn More</a>
                            </div>
                        </div>
                        <div class="process__ss mt-30">
                            <img src="{{ asset('products/img/process/img_01.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row g-38 mt-10">
                        <div class="col-lg-5 mt-30">
                            <div class="process__app-item">
                                <div class="text-center">
                                    <img src="{{ asset('products/img/process/img_02.png') }}" alt="">
                                </div>
                                <div class="process__title mt-40">
                                    <h3 class="title">Assign to Agents Based on Availability</h3>
                                    <p>Leads are auto-assigned using a smart workload balancer, ensuring fair
                                        distribution and faster response times.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mt-30">
                            <div class="process__app-item style-2">
                                <div class="process__title mb-30">
                                    <h3 class="title">Track Every Interaction in One Place</h3>
                                    <p>Every call, note, email, or update is logged, providing a complete 360° view of
                                        each customer journey.</p>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('products/img/process/img_03.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="process__button mt-60 border-animated">
                        <div class="feature-header text-center mb-10" id="free-setup-feature">
                            <h2 class="animated-gradient-text">
                                Free Setup for Your First 50 Leads
                                <span class="accent-underline" aria-hidden="true"></span>
                            </h2>

                            <p class="feature-subtitle">
                                Start strong with an all-in-one CRM setup — we’ll help you onboard, organize,
                                and manage your first 50 leads for free. Perfect for small teams and growing
                                businesses looking to save time and boost productivity.
                            </p>
                        </div>

                    </div>
                    <div class="row pt-150 pt-xs-90">
                        <div class="col-12">
                            <div class="process__area">
                                <div class="process__top ul_li_between mt-none-30">
                                    <div class="crm-title mt-30">
                                        <h2 class="crm-title__heading mb-15">Automate Reminders and Follow-Ups</p>
                                            <div class="mt-40">
                                                 <a class="thm-btn thm-btn--gradient style-2" href="#!">Login\Signup</a>
                                            </div>
                                    </div>
                                    <div class="image mt-30">
                                        <img src="{{ asset('products/img/process/img_04.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="row g-26 mt-10">
                                    <div class="col-lg-6 mt-30">
                                        <div class="process__app-item style-3">
                                            <div class="process__title process__title--lg mb-30">
                                                <h3 class="title">Smart notifications and workflows ensure no lead slips
                                                    through the cracks, keeping your team proactive.</p>
                                            </div>
                                            <div class="text-center">
                                                <img src="{{ asset('products/img/process/img_05.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- process end -->


            <section class="container mb-5" id="pricing">
                <div class="pricing-header">
                    <div>
                        <span class="eyebrow">Affordable Pricing</span>
                        <h2 class="heading">Start with<br>Affordable Price</h2>
                        <!-- <div class="toggle">
                            <div class="segmented" role="tablist" aria-label="Billing period">
                                <button id="tab-monthly" class="is-active" role="tab"
                                    aria-selected="true">Monthly</button>
                                <button id="tab-yearly" role="tab" aria-selected="false">Yearly</button>
                            </div>
                        </div> -->
                    </div>

                    <div class="subgrid">
                        <!-- <div class="social-proof"><b>250K+</b> reviews • App Store • Play Store</div> -->
                        <p class="desc">Unlock the full potential of LeadNest with flexible, transparent pricing made
                            for teams of any size.</p>
                    </div>
                </div>

                <div class="cards" aria-live="polite">

                    <article class="card popular" aria-label="Pro plan">
                        <div class="badge">MOST POPULAR</div>
                        <div class="plan">Pro</div>
                        <div class="price"><span id="price-pro" data-monthly="48" data-yearly="39">₹5999</span><small>/
                                <span class="period">month</span></small></div>
                        <p class="desc-plan"> Take your business to the next level with unlimited leads, effortless
                            setup, and powerful tools designed to help teams work smarter and close faster.</p>
                        <div class="rule"></div>
                        <ul class="features">
                            <li><span class="tick">✓</span><span>Unlimited leads & agents</span></li>
                            <li><span class="tick">✓</span><span>Auto-assign & smart SLA alerts</span></li>
                            <li><span class="tick">✓</span><span>Real-time dashboards</span></li>
                            <li><span class="tick">✓</span><span>Meta/Google Ads integrations</span></li>
                            <li><span class="tick">✓</span><span>Email & chat support</span></li>
                        </ul>
                        <a href="#" class="btn primary">Join this plan</a>
                    </article>


                </div>

        <div class="foot">
</div>

            </section>

            <section class="bar-graph-section">
                <div class="container">
                    <div class="row" style="align-items:center;">
                        <div class="col-md-6 col-12">
                            <!-- centered & larger bar graph -->
                            <div class="bar-graph bar-graph-vertical bar-graph-two centered-graph">
                                <div class="bar-one bar-container">
                                    <div class="bar" data-percentage="40%"></div>
                                    <span class="year">2022</span>
                                </div>
                                <div class="bar-two bar-container">
                                    <div class="bar" data-percentage="55%"></div>
                                    <span class="year">2023</span>
                                </div>
                                <div class="bar-three bar-container">
                                    <div class="bar" data-percentage="68%"></div>
                                    <span class="year">2024</span>
                                </div>
                                <div class="bar-four bar-container">
                                    <div class="bar" data-percentage="82%"></div>
                                    <span class="year">2025</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <h3 class="graph-heading">LeadNest Growth Over the Years</h3>
                            <p class="graph-desc">
                                LeadNest has emerged as a trusted partner for businesses by delivering innovative
                                solutions and measurable results. Over the years, our growth reflects the confidence our
                                clients place in us and our commitment to driving sustainable success. Each milestone
                                showcases our journey of building stronger connections, achieving excellence, and
                                creating lasting impact.
                            </p>
                        </div>
                    </div>
                </div>
            </section>



            <!-- testimonial start -->
            <section class="crm-testimonial pos-rel pb-80">
                <div class="container">
                    <div class="crm-title text-center mb-60">
                        <h2 class="crm-title__heading">Our happy customer <br> feedback</h2>
                    </div>
                </div>
                <div class="crm-testimonial__slide swiper-container">
                    <div class="swiper-wrapper">
                        <div class="crm-testimonial__item swiper-slide">
                            <div class="rating mb-40">
                                <img src="{{ asset('products/img/icon/rating.png') }}" alt="">
                            </div>
                            <p>Since implementing ABC CRM service in our organization, we have experienced a remarkable
                                transformation in our customer management practices. The platform's intuitive interface
                                and powerful automation tools have revolutionized the way we interact</p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/img/avatar/tm_avatar1.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4>Florida Campain</h4>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="crm-testimonial__item swiper-slide">
                            <div class="rating mb-40">
                                <img src="{{ asset('products/img/icon/rating.png') }}" alt="">
                            </div>
                            <p>I have been using XYZ CRM service for over a year now, and I am extremely satisfied with
                                the results. The platform is user-friendly, making it easy for me and my team to manage
                                our customer relationships efficiently way of this ways. </p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/img/avatar/tm_avatar2.jpg') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>Florida Campain</h4>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="crm-testimonial__item swiper-slide">
                            <div class="rating mb-40">
                                <img src="{{ asset('products/img/icon/rating.png') }}" alt="">
                            </div>
                            <p>I cannot imagine running my business without PQR CRM service. It has become an
                                indispensable tool in managing our customer relationships. The ability to centralize all
                                customer data and communication in one place has saved us countless.</p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/img/avatar/tm_avatar3.jpg') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>Florida Campain</h4>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="crm-testimonial__item swiper-slide">
                            <div class="rating mb-40">
                                <img src="{{ asset('products/img/icon/rating.png') }}" alt="">
                            </div>
                            <p>I have been using XYZ CRM service for over a year now, and I am extremely satisfied with
                                the results. The platform is user-friendly, making it easy for me and my team to manage
                                our customer relationships efficiently way of this ways. </p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/img/avatar/tm_avatar1.jpg') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>Florida Campain</h4>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="crm-testimonial__shape">
                    <div class="shape shape--1">
                        <img src="{{ asset('products/img/shape/tm_shape1.png') }}" alt="">
                    </div>
                    <div class="shape shape--2" data-parallax='{"y" : 80}'>
                        <img src="{{ asset('products/img/shape/tm_shape2.png') }}" alt="">
                    </div>
                </div>
            </section>
            <!-- testimonial end -->



            <section class="cards-container">
                <div class="container">
                    <div class="row">
                        <div class="grid-gallery">
                            <div class="grid-item" id="item1">
                                <div class="item-title">Mountain Peaks</div>
                                <div class="item-desc">Majestic views of snow-capped mountains</div>
                            </div>
                            <div class="grid-item" id="item2">
                                <div class="item-title">Northern Lights</div>
                                <div class="item-desc">Aurora borealis dancing in the night sky</div>
                            </div>
                            <div class="grid-item" id="item3">
                                <div class="item-title">Mountain Range</div>
                                <div class="item-desc">Expansive views of rugged terrain</div>
                            </div>
                            <div class="grid-item" id="item4">
                                <div class="item-title">Autumn Colors</div>
                                <div class="item-desc">Vibrant fall foliage in the forest</div>
                            </div>
                            <div class="grid-item" id="item5">
                                <div class="item-title">Sunset Horizon</div>
                                <div class="item-desc">Beautiful sunset over the landscape</div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>




            <section class="container">

                <div class="row">


                    <div class="contact-panel" aria-label="Contact form - Get your website audit">
                        <div class="contact-left">
                            <h1 class="contact-left__title">Get your first Website<br>Audit Report<br>for Free</h1>
                        </div>

                        <div class="contact-form" role="region" aria-labelledby="contact-form-title">
                            <form id="contact-form" onsubmit="event.preventDefault(); alert('Demo: form submitted');"
                                style="width:100%">
                                <div class="contact-grid" aria-hidden="false">
                                    <input class="contact-input" name="name" type="text" placeholder="Name" required>
                                    <input class="contact-input" name="phone" type="tel" placeholder="Phone Number">
                                </div>

                                <div class="contact-grid" style="margin-top:10px">
                                    <input class="contact-input" name="email" type="email" placeholder="Email Address"
                                        required>
                                    <input class="contact-input" name="website" type="url" placeholder="Website / URL">
                                </div>
                                <div>
                                    <button class="contact-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>


            <!-- <section class="form-container">
                <span class="big-circle"></span>
                <img src="img/shape.png') }}" class="square" alt="decorative shape" />

                <div class="form">
          
                    <div class="contact-info">
                        <h3 class="title">Let's get in touch</h3>
                        <p class="text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                            dolorum adipisci recusandae praesentium dicta!
                        </p>

                        <div class="info">
                            <div class="information">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>92 Cherry Drive Uniondale, NY 11553</p>
                            </div>
                            <div class="information">
                                <i class="fas fa-envelope"></i>
                                <p>lorem@ipsum.com</p>
                            </div>
                            <div class="information">
                                <i class="fas fa-phone"></i>
                                <p>123-456-789</p>
                            </div>
                        </div>

                        <div class="social-media">
                            <p>Connect with us :</p>
                            <div class="social-icons">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-form">
                        <span class="circle one"></span>
                        <span class="circle two"></span>

                        <form action="index.html" autocomplete="off">
                            <h3 class="title">Contact us</h3>
                            <div class="input-container">
                                <input type="text" name="name" class="input" required />
                                <label>Username</label>
                                <span>Username</span>
                            </div>
                            <div class="input-container">
                                <input type="email" name="email" class="input" required />
                                <label>Email</label>
                                <span>Email</span>
                            </div>
                            <div class="input-container">
                                <input type="tel" name="phone" class="input" required />
                                <label>Phone</label>
                                <span>Phone</span>
                            </div>
                            <div class="input-container textarea">
                                <textarea name="message" class="input" required></textarea>
                                <label>Message</label>
                                <span>Message</span>
                            </div>
                            <div>
                                <button class="fancy-btn" style="text-align: center;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>  -->


            <section class="faq-section-container">
                <!-- FAQ Start -->
                <div class="faq-wrapper">
                    <!-- Left Image -->
                    <div class="faq-image">

                        <h1 class="faq-header" style="color:#06002b; font-size: 3rem; margin-right: 1rem;">Got any
                            questions </h1>
                        <button class="faq-button">
                            <div class="rocket-container">
                                <div class="ring"></div>
                                <div class="ring"></div>
                                <div class="ring"></div>
                            </div>
                            <span class="tooltip">?</span>
                        </button>
                    </div>

                    <!-- Right FAQ Section -->



                    <div class="faq-section">
                        <!-- From Uiverse.io by Shell0110 -->


                        <div class="faq-item">
                            <div class="faq-question">
                                What is LeadNest?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">LeadNest is a growth-focused platform that helps businesses
                                generate, manage, and convert leads effectively with innovative tools and strategies.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                How does LeadNest help businesses grow?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">LeadNest provides smart lead management solutions, analytics, and
                                automation features that improve conversion rates and ensure sustainable growth.</div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                Who can use LeadNest?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">LeadNest is designed for startups, SMEs, and enterprises across
                                industries that want to streamline their lead generation and customer engagement
                                processes.</div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                Is my data safe with LeadNest?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">Absolutely. LeadNest follows strict data security protocols and uses
                                advanced encryption to keep your business and customer information safe.</div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                Does LeadNest offer customer support?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">Yes, our dedicated support team is available 24/7 to assist you with
                                onboarding, troubleshooting, and maximizing the value of LeadNest.</div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>

</body>


@endsection
@push('scripts')
    <!-- jquery include -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
        integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"
        integrity="sha512-P2IDYZfqSwjcSjX0BKeNhwRUH8zRPGlgcWl5n6gBLzdi4Y5/0O4zaXrtO4K9TZK6Hn1BenYpKowuCavNandERg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('products/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('products/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('products/js/swiper.min.js') }}"></script>
    <script src="{{ asset('products/js/wow.min.js') }}"></script>
    <script src="{{ asset('products/js/appear.js') }}"></script>
    <script src="{{ asset('products/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('products/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('products/js/cursor.js') }}"></script>
    <script src="{{ asset('products/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('products/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('products/js/easing.min.js') }}"></script>
    <script src="{{ asset('products/js/scrollspy.js') }}"></script>
    <script src="{{ asset('products/js/main.js') }}"></script>
@endpush