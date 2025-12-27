@extends('client.layouts.app')
<title>Leadnest</title>
<!-- <link rel="shortcut icon" href="{{ asset('products/assets/img/favicon.png') }}" type="images/x-icon" /> -->
<link rel="stylesheet" href="{{ asset('products/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('products/assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('products/assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('products/assets/css/metisMenu.css') }}">
<link rel="stylesheet" href="{{ asset('products/assets/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('products/assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('products/assets/css/main.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')

<style>
    a{
        text-decoration:none !important;
    }

.crm-testimonial__slide.swiper-container.swiper-container-initialized.swiper-container-horizontal {
    height: 400px !important;
}


</style>

<body class="home-dark">

    <!-- <div id="xb-loadding" class="xb-loader style-2">
        <div class="xb-dual-ring"></div>
    </div> -->

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

            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu">
                <!-- <div class="header-mobile-search">
                    <form role="search" method="get" action="#">
                        <input type="text" placeholder="Search Keywords">
                        <button type="submit"><i class="ti-search"></i></button>
                    </form>
                </div> -->
                <ul id="mobile-menu-active">
                    <!-- <li class="dropdown"><a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Chatbot</a></li>
                            <li class="active"><a href="home-2.html">CRM</a></li>
                            <li><a href="home-3.html">Copy Writing</a></li>
                        </ul>
                    </li> -->
                    <li><a class="scrollspy-btn" href="https://leadnests.thenightmarketer.com">Home</a></li>
                    <li><a class="scrollspy-btn" href="#feature">Feature</a></li>
                    <li><a class="scrollspy-btn" href="#process">How it works</a></li>
                    <li><a class="scrollspy-btn" href="#pricing">Pricing</a></li>
                    <li><a href="javascript:void(0)" class="scrollspy-btn openDemo">Get a Demo</a></li>
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
                    data-background="{{ asset('products/assets/img/bg/hero_bg.png') }}"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-10">
                            <div class="hero__content style-3 text-center">
                                <small class="text-light">Trusted by ⭐⭐⭐⭐⭐ 2k+ Small Business Owners</small>
                                <h1 class="title wow fadeInUp" data-wow-delay="0ms" data-wow-duration=".5s">The Complete Toolkit for Lead & Sales Management
                                    <!-- <span class="xb-title--typewriter">
                                        <span class="xb-item--text is-active">Sales</span>
                                        <span class="xb-item--text">Automation</span>
                                        <span class="xb-item--text">Toolkit</span>
                                    </span> -->
                                </h1>
                                <div class="shape mb-30 wow fadeInUp" data-wow-delay="100ms" data-wow-duration=".5s">
                                    <img src="{{ asset('products/assets/img/shape/h_line_shape.png') }}" alt="">
                                </div>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="200ms" data-wow-duration=".5s">
                                    Capture leads automatically, manage agents smartly, and <br> boost conversions
                                    effortlessly with <span class="special-word">Leadnests</span> </p>
                                <div class="btns wow fadeInUp" data-wow-delay="300ms" data-wow-duration=".5s">
                                    <a class="thm-btn thm-btn--gradient style-2 openDemo" href="javascript:void(0)">Get a demo</a>
                                    <div class="discount-btn">
                                        <span class="discount-badge">SAVE 25%</span>
                                        <a class="thm-btn thm-btn--outline style-2 view-design" href="#pricing">View Pricing</a>
                                    </div>
                                </div>
                                <div class="hero-image mt-90 wow fadeInUp" data-wow-delay="400ms"
                                    data-wow-duration=".5s">
                                    <!-- <img src="{{ asset('products/assets/img/hero/leadnest_dashboard.webp') }}" alt="leadnest_dashboard"> -->
                                    <div class="hero-video video-desktop">
                                        <!-- Desktop video -->
                                        <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                                            <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/7n3ybylin0?web_component=true&seo=false" title="horizontal Video" allow="autoplay; fullscreen" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="100%" height="100%"></iframe></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-video">
                                    <div class="wistia_responsive_padding" style="padding:177.78% 0 0 0;position:relative;">
                                        <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                                            <iframe
                                                src="https://fast.wistia.net/embed/iframe/0dfsts7rk7?web_component=true&seo=false&autoPlay=false"
                                                title="leadnest_video"
                                                allow="fullscreen"
                                                allowtransparency="true"
                                                frameborder="0"
                                                scrolling="no"
                                                class="wistia_embed"
                                                name="wistia_embed"
                                                width="100%"
                                                height="100%">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="crm-hero__shape">
                    <div class="shape shape--1" data-parallax='{"y" : 80}'>
                        <img class="wow fadeInLeft" src="{{ asset('products/assets/img/shape/h_shape6.png') }}" alt="">
                    </div>
                    <div class="shape shape--2">
                        <img src="{{ asset('products/assets/img/shape/h_shape7.png') }}" alt="">
                    </div>
                    <div class="shape shape--3" data-parallax='{"y" : 70}'>
                        <img class=" wow fadeInRight" src="{{ asset('products/assets/img/shape/h_shape8.png') }}" alt="">
                    </div>
                    <div class="shape shape--4">
                        <img src="{{ asset('products/assets/img/shape/h_shape9.png') }}" alt="">
                    </div>
                </div>
            </section>
            <!-- hero end -->

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
                                    <img src="{{ asset('products/assets/img/icon/ft_01.svg') }}" alt="">
                                </div>
                                <h3>User Management</h3>
                                <p>Admins manage agents, set goals, and automate salary tracking.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/assets/img/icon/ft_02.svg') }}" alt="">
                                </div>
                                <h3>Lead Distribution</h3>
                                <p>Auto-assign leads, upload sheets, and integrate Meta or Google.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/assets/img/icon/ft_03.svg') }}" alt="">
                                </div>
                                <h3>Instant Alerts</h3>
                                <p>Admins receive updates, agents get alerts for untracked leads.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/assets/img/icon/ft_04.svg') }}" alt="">
                                </div>
                                <h3>Lead Tracking</h3>
                                <p>Add, edit, close, or reopen leads with custom statuses.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/assets/img/icon/ft_05.svg') }}" alt="">
                                </div>
                                <h3>Easy Automation</h3>
                                <p>Automate workflows, follow-ups, reminders, and marketing integrations effortlessly.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/assets/img/icon/ft_06.svg') }}" alt="">
                                </div>
                                <h3>Team Collaboration</h3>
                                <p>Reassign leads, use queues, and scale teams with ease.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-20">
                            <div class="crm-feature__item">
                                <div class="icon mb-40">
                                    <img src="{{ asset('products/assets/img/icon/ft_07.svg') }}" alt="">
                                </div>
                                <h3>Smart Reports</h3>
                                <p>Track revenue, sales, analytics globally.</p>
                                <div class="ft_icon">
                                    <img src="{{ asset('products/assets/img/icon/ft_icon.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="crm-feature__shape">
                    <div class="shape shape--1" data-parallax='{"y" : 70}'>
                        <img src="{{ asset('products/assets/img/shape/ft_shape1.png') }}" alt="">
                    </div>
                    <div class="shape shape--2" data-parallax='{"y" : 80}'>
                        <img src="{{ asset('products/assets/img/shape/ft_shape2.png') }}" alt="">
                    </div>
                </div>
            </section>
            <!-- feature end -->

            <!-- process start -->
            <section id="process" class="process pos-rel pb-120">
                <div class="process__shape">
                    <div class="shape shape--1" data-parallax='{"x" : 70}'>
                        <img src="{{ asset('products/assets/img/shape/pr_shape1.png') }}" alt="">
                    </div>
                    <div class="shape shape--2">
                        <img src="{{ asset('products/assets/img/shape/pr_shape2.png') }}" alt="">
                    </div>
                    <div class="shape shape--3" data-parallax='{"y" : 80}'>
                        <img src="{{ asset('products/assets/img/shape/pr_shape3.png') }}" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="crm-title text-center mb-60">
                        <h2 class="custom-heading">
                            <span class="crm-logo">
                                <img src="https://leadnests.thenightmarketer.com/images/logo/1755779471.svg" alt="leadnest-logo">
                            </span>
                            <span class="word">manages</span>
                            <span class="word break-mobile">leads</span>
                        </h2>
                    </div>

                    <div class="process__wrap ul_li_between">
                        <div class="process__title mt-30">
                            <h3 class="title">Quickly Add <br>New Leads</h3>
                            <p>Quickly create new leads manually or upload them in bulk from spreadsheets or integrations. All details are stored securely for easy access anytime.</p>
                            <div class="mt-35">
                                <a class="thm-btn thm-btn--gradient style-2" href="#offer">Learn More</a>
                            </div>
                        </div>
                        <div class="process__ss mt-30">
                            <img src="{{ asset('products/assets/img/process/process6.webp') }}" alt="">
                        </div>
                    </div>
                    <div class="row g-38 mt-5">
                        <div class="col-lg-5 mt-30">
                            <div class="process__app-item">
                                <div class="text-center">
                                    <img src="{{ asset('products/assets/img/process/process2.webp') }}" alt="">
                                </div>
                                <div class="process__title mt-40">
                                    <h3 class="title">Set Timely Follow-Ups</h3>
                                    <p>Assign tasks and set reminders for every interaction. Smart alerts ensure timely follow-ups so no lead is ever missed.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mt-30">
                            <div class="process__app-item style-2">
                                <div class="process__title mb-30">
                                    <h3 class="title">Close Deals With Ease</h3>
                                    <p>Track every step from lead to sale. Agents can mark leads closed and record sales for accurate reporting and incentives.</p>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('products/assets/img/process/process7.webp') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="process__button mt-60 border-animated">
                        <div class="btns text-center">
                            <a class="thm-btn thm-btn--gradient style-2" href="#!">Get Started Today</a>
                            <a class="thm-btn thm-btn--outline style-2" href="#!">Browse all Features</a>
                        </div>
                    </div> -->
                    <div class="row pt-150 pt-xs-90">
                        <div class="col-12">
                            <div class="process__area">
                                <div class="process__top ul_li_between mt-none-30">
                                    <div class="crm-title mt-30">
                                        <h2 class="crm-title__heading mb-15">Access Anytime, Anywhere</h2>
                                        <div>
                                            <p class="lh-2 mb-2">Work from anywhere with real-time updates. <span class="special-word">Leadnests</span> is cloud-based, so your data is always accessible from any device.</p>
                                            <a class="thm-btn thm-btn--gradient style-2 openDemo" href="#!">Get Demo</a>
                                        </div>
                                    </div>
                                    <div class="image mt-30">
                                        <img src="{{ asset('products/assets/img/process/Leadnests_dashboard.webp') }}" alt="">
                                    </div>
                                </div>
                                <div class="row g-26 mt-10">
                                    <div class="col-lg-6 mt-30">
                                        <div class="process__app-item style-3">
                                            <div class="process__title process__title--lg mb-30">
                                                <h3 class="title">Seamless Collaboration</h3>
                                                <p><span class="special-word">Leadnests</span> simplifies teamwork across departments. Sales, marketing, improved accountability so no opportunity is missed and every lead receives timely attention.</p>
                                            </div>
                                            <div class="text-center">
                                                <img src="{{ asset('products/assets/img/process/process5.webp') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-30">
                                        <div class="process__app-item style-3">
                                            <div class="process__title process__title--lg mb-30">
                                                <h3 class="title">Analyze & Optimize Performance</h3>
                                                <p>Every successful process ends with insights. <span class="special-word">Leadnests</span> provides real-time analytics and performance reports,<br> helping you identify which campaigns and sales</p>
                                            </div>
                                            <div class="text-center">
                                                <img src="{{ asset('products/assets/img/process/process5.webp') }}" alt="">
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


            <section class="container mb-60" id="offer">
                <div class="free-setup-card" role="region" aria-labelledby="free-setup-title">
                    <div class="free-setup-glow"></div>

                    <div class="free-setup-badge" aria-label="Limited Offer">LIMITED OFFER</div>

                    <h2 id="free-setup-title" class="free-setup-title">
                        <span class="free-setup-accent">Free Setup</span>
                    </h2>

                    <p class="free-setup-subtitle">
                        We’ll set up your <span class="special-word">Leadnests</span>system end-to-end—lead capture, smart assignment, statuses, reminders, and your first dashboard—so you can start closing faster from Day 1
                    </p>

                    <ul class="free-setup-list" aria-label="What you get">
                        <li><i class="fa-solid fa-check"></i><strong>LeadNest provides up to 20 free agents for efficient lead management.</strong></li>
                        <li><i class="fa-solid fa-check"></i><strong>Automated Backup every 24 hours (Never lose your data)</strong></li>
                        <li><i class="fa-solid fa-check"></i> Done-for-you onboarding & data import (CSV/Sheets)</li>
                        <li><i class="fa-solid fa-check"></i> Auto-assign rules & SLA alerts configured</li>
                        <li><i class="fa-solid fa-check"></i> Dashboard with daily/weekly/monthly revenue</li>
                        <li><i class="fa-solid fa-check"></i> Meta/Google Ads lead capture hookup</li>
                        <li><i class="fa-solid fa-check"></i>Statuses, pipelines & follow-up reminders set</li>
                    </ul>

                    <div class="free-setup-cta">
                        <a href="#contact" class="thm-btn thm-btn--gradient style-2 openDemo" aria-label="Claim My Free Setup">
                            <i class="fa-solid fa-rocket"></i> Claim Free Setup
                        </a>
                    </div>

                    <div class="free-setup-foot">
                        <span class="dot"></span> No credit card needed
                        <span class="sep">•</span> Setup in 24–48 hrs
                        <span class="sep">•</span> Cancel anytime
                    </div>

                    <!-- Decorative confetti (non-interactive) -->
                    <div class="free-setup-confetti" aria-hidden="true">
                        <span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>
            </section>

            <!-- Pricing Section -->
            <!-- ===================== -->
            <section class="container pricing-simple" id="pricing">

                <div class="pricing-head">
                    <div>
                        <span class="eyebrow">Flexible CRM Plans</span>
                        <h2 class="title">Simple, Fair Pricing</h2>
                        <p class="sub">Choose a plan based on where you operate. Cancel anytime.</p>
                    </div>
                </div>

                <div class="pricing-grid">
                    <!-- India (Left) -->
                    <article class="p-card is-popular">
                        <div class="p-badge">India</div>
                        <h3 class="p-plan">Pro (India)</h3>

                        <div class="p-pricewrap">
                            <div class="p-old" data-target="7999">₹7,999</div>
                            <div class="p-price">
                                <span id="inr" data-target="5999">
                                    ₹5,999
                                </span>
                                <small>/month</small>
                            </div>
                        </div>

                        <ul class="p-list">
                            <li>Unlimited leads</li>
                            <li>Smart assignment & SLAs</li>
                            <li>Dashboards & reports</li>
                            <li>Priority email support</li>
                            <li>Custom integrations (India region)</li>
                            <!-- <li>Annual plan → ₹59,999/year (2 months free)</li> -->
                            <li>Startup discount (20–30% first year)</li>
                        </ul>

                        <a class="thm-btn thm-btn--gradient style-2 openDemo text-capitalize" href="javascript:void(0)">Schedule demo</a>
                        <p class="p-tnc"><strong>Terms:</strong> INR pricing. GST extra. Fair-use policy applies.</p>
                    </article>

                    <!-- Global (Right) -->
                    <article class="p-card is-popular">
                        <div class="p-badge">Outside India</div>
                        <h3 class="p-plan">Pro (Global)</h3>

                        <div class="p-pricewrap">
                            <div class="p-old" data-target="133">$133</div>
                            <div class="p-price">
                                <span id="usd" data-target="100">$100</span><small>/month</small>
                            </div>
                        </div>

                        <ul class="p-list">
                            <li>Unlimited leads</li>
                            <li>Smart assignment & SLAs</li>
                            <li>Dashboards & reports</li>
                            <li>24/7 global support</li>
                            <li>Multi-currency & timezone support</li>
                            <!-- <li>Annual plan → $1,000/year (2 months free)</li> -->
                            <li>Multi-country agency license</li>
                        </ul>

                        <a class="thm-btn thm-btn--gradient style-2 openDemo text-capitalize" href="javascript:void(0)">Schedule demo</a>
                        <p class="p-tnc"><strong>Terms:</strong> USD pricing. Fair-use policy applies.</p>
                    </article>
                </div>
            </section>


            <!-- 
            <section class="ln-growth-section" aria-labelledby="ln-growth-title">
                <div class="container ln-grid">
               
                    <div class="ln-chart" role="img" aria-label="LeadNest growth 2022 to 2025 in percent">
                        <div class="ln-chart__head">
                            <h3 class="ln-eyebrow">Purpose-Driven Growth</h3>
                            <h2 id="ln-growth-title" class="ln-title">Growing Businesses, Not Just Numbers</h2>
                        </div>

                        <div class="ln-bars" aria-hidden="true">
                    
                            <div class="ln-bar" data-value="40" data-year="2022">
                                <div class="ln-bar__col" style="--bar:0%">
                                    <span class="ln-bar__val" aria-hidden="true">0%</span>
                                </div>
                                <span class="ln-bar__year">2022</span>
                            </div>

                            <div class="ln-bar" data-value="55" data-year="2023">
                                <div class="ln-bar__col" style="--bar:0%">
                                    <span class="ln-bar__val" aria-hidden="true">0%</span>
                                </div>
                                <span class="ln-bar__year">2023</span>
                            </div>

                            <div class="ln-bar" data-value="68" data-year="2024">
                                <div class="ln-bar__col" style="--bar:0%">
                                    <span class="ln-bar__val" aria-hidden="true">0%</span>
                                </div>
                                <span class="ln-bar__year">2024</span>
                            </div>

                            <div class="ln-bar" data-value="82" data-year="2025">
                                <div class="ln-bar__col" style="--bar:0%">
                                    <span class="ln-bar__val" aria-hidden="true">0%</span>
                                </div>
                                <span class="ln-bar__year">2025</span>
                            </div>
                        </div>

                        
                        <div class="ln-legend" aria-hidden="true">
                            <span>0%</span><span>25%</span><span>50%</span><span>75%</span><span>100%</span>
                        </div>
                    </div>
                    <div class="ln-content">
                        <h3 class="ln-subtitle">LeadNest Growth Over the Years</h3>
                        <p class="ln-desc">
                            We build systems that move metrics <em>that matter</em>—from faster follow-ups to cleaner pipelines and higher close rates.
                            The result? Compounding, purpose-driven growth for every customer we serve.
                        </p>

                        <ul class="ln-bullets">
                            <li><strong>Capture & qualify smarter:</strong> reduce leakage and route leads to the right owner instantly.</li>
                            <li><strong>Follow-ups that land:</strong> timed nudges and SLAs keep momentum alive.</li>
                            <li><strong>Close with clarity:</strong> status, notes & interactions in one place for zero guesswork.</li>
                            <li><strong>Scale with confidence:</strong> dashboards reveal bottlenecks before they cost you deals.</li>
                        </ul>

                        <div class="ln-kpis">
                            <div class="ln-kpi">
                                <span class="ln-kpi__num" data-count="35">0</span>
                                <span class="ln-kpi__label">Faster First Response</span>
                            </div>
                            <div class="ln-kpi">
                                <span class="ln-kpi__num" data-count="27">0</span>
                                <span class="ln-kpi__label">Higher Close Rate</span>
                            </div>
                            <div class="ln-kpi">
                                <span class="ln-kpi__num" data-count="2.1">0</span>
                                <span class="ln-kpi__label">x Pipeline Velocity</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->



            <section class="cards-container">
                <div class="container">
                    <div class="row">
                        <div class="grid-gallery">
                            <div class="grid-item" id="item1">
                                <div class="item-title">Lead Management</div>
                                <div class="item-desc">Easily capture, organize, and track every lead.</div>
                            </div>
                            <div class="grid-item" id="item2">
                                <div class="item-title">Smart Assignment</div>
                                <div class="item-desc">Automatically assign leads evenly to available agents.</div>
                            </div>
                            <div class="grid-item" id="item3">
                                <div class="item-title">Instant Notifications</div>
                                <div class="item-desc">Get notified instantly about overdue lead updates.</div>
                            </div>
                            <div class="grid-item" id="item4">
                                <div class="item-title">Revenue Insights</div>
                                <div class="item-desc">Track revenue growth, conversions, and team performance.</div>
                            </div>
                            <div class="grid-item" id="item5">
                                <div class="item-title">Ai Automation</div>
                                <div class="item-desc">Simplify workflows with automation and customizable statuses.</div>
                            </div>
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
                                <img src="{{ asset('products/assets/img/icon/rating.png') }}" alt="">
                            </div>
                            <p><span class="special-word">Leadnests </span> has streamlined our entire sales pipeline. Automated reminders and clear dashboards keep the team focused, and we’ve achieved a 50% jump in lead response time.</p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/assets/img/avatar/testi-3.webp') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>Sarah J.</h4>
                                    <span>ScaleHive</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/assets/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="crm-testimonial__item swiper-slide">
                            <div class="rating mb-40">
                                <img src="{{ asset('products/assets/img/icon/rating.png') }}" alt="">
                            </div>
                            <p>Before <span class="special-word">Leadnests</span>, we wasted hours tracking prospects. Now, follow-ups are automatic, reports are instant, and our monthly deals have doubled. It’s a game-changer for scaling startups</p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/assets/img/avatar/testi-5.webp') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>Vishesh</h4>
                                    <span>IOV HUB</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/assets/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="crm-testimonial__item swiper-slide">
                            <div class="rating mb-40">
                                <img src="{{ asset('products/assets/img/icon/rating.png') }}" alt="">
                            </div>
                            <p><span class="special-word">LeadNests</span>’s simplicity is unmatched. My team manages hundreds of leads daily without missing a beat. Conversion rates are up by 35%, and clients feel cared for every step</p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/assets/img/avatar/testi-6.webp') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>Emily Turner</h4>
                                    <span>SalesSprout</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/assets/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="crm-testimonial__item swiper-slide">
                            <div class="rating mb-40">
                                <img src="{{ asset('products/assets/img/icon/rating.png') }}" alt="">
                            </div>
                            <p><span class="special-word">LeadNests</span> brought visibility to our entire pipeline. Real-time notifications and analytics mean no lead slips through. We’ve shortened our sales cycle and improved overall team efficiency.</p>
                            <div class="crm-testimonial__author ul_li_center text-start mt-45">
                                <div class="avatar">
                                    <img src="{{ asset('products/assets/img/avatar/harryji.webp') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>Harry</h4>
                                    <span>Ticketa</span>
                                </div>
                            </div>
                            <div class="quote">
                                <img src="{{ asset('products/assets/img/icon/quote-2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="crm-testimonial__shape">
                    <div class="shape shape--1">
                        <img src="{{ asset('products/assets/img/shape/tm_shape1.png') }}" alt="">
                    </div>
                    <div class="shape shape--2" data-parallax='{"y" : 80}'>
                        <img src="{{ asset('products/assets/img/shape/tm_shape2.png') }}" alt="">
                    </div>
                </div>
            </section>
            <!-- testimonial end -->

            <section class="container faq-section-container mb-3">
                <h2 class="faq-column-header mb-5">Frequently Asked Questions (FAQ)</h2>
                <div class="faq-wrapper two-column">
                    <div class="faq-section">
                        <div class="faq-item">
                            <div class="faq-question">How can LeadNests help if I’m losing track of leads?<i class="fas fa-chevron-down"></i></div>
                            <div class="faq-answer">LeadNests centralizes all leads in one dashboard, sends reminders for follow-ups, and helps you prioritize hot prospects so no lead slips through the cracks.</div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">Can LeadNests improve my team’s response time? <i class="fas fa-chevron-down"></i></div>
                            <div class="faq-answer">Yes! With real-time notifications and automated lead routing, your sales agents respond faster, improving conversion rates.</div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">How does LeadNests help me close more deals? <i class="fas fa-chevron-down"></i></div>
                            <div class="faq-answer">LeadNests gives you a clear view of every lead’s journey, automates repetitive tasks, and provides actionable insights to focus on the right opportunities.</div>
                        </div>
                    </div>


                    <div class="faq-section">
                        <div class="faq-item">
                            <div class="faq-question">What if my sales team isn’t tech-savvy? <i class="fas fa-chevron-down"></i></div>
                            <div class="faq-answer">LeadNests is designed to be easy-to-use with minimal training. We also offer onboarding and training support to ensure your team adopts it smoothly.</div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">Will LeadNests work if I already have a system? <i class="fas fa-chevron-down"></i></div>
                            <div class="faq-answer">Absolutely. LeadNests can integrate with your current tools and workflows, making it easy to transition without disrupting your sales process.</div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">Can I see performance reports easily? <i class="fas fa-chevron-down"></i></div>
                            <div class="faq-answer">Yes, you’ll get real-time reports on team performance, lead sources, and conversion rates to make better decisions quickly.</div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- <section class="faq-section-container">

                <div class="faq-wrapper">
           
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

   



                    <div class="faq-section">
         


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

            </section> -->





            <footer class="site-footer footer-style-two pos-rel pt-85" data-background="{{ asset('products/assets/img/shape/fot_shape2.png') }}">
                <div>
                    <div class="row">
                        <div class="crm-community text-center">
                            <!-- <ul class="crm-community__social ul_li_center mb-35">
                                <li><a href="#!"><img src="{{ asset('products/assets/img/icon/discord.png') }}" alt=""></a></li>
                                <li><a href="#!"><img src="{{ asset('products/assets/img/icon/whatsapp.png') }}" alt=""></a></li>
                                <li><a href="#!"><img src="{{ asset('products/assets/img/icon/telegram.png') }}" alt=""></a></li>
                            </ul> -->
                            <div class="crm-title text-center mb-40">
                                <h2 class="crm-title__heading"> Supercharge Your Lead Management</h2>
                            </div>
                            <a class="thm-btn thm-btn--gradient style-2 openDemo" href="javascript:void(0)">Start Free Demo</a>
                        </div>
                    </div>


                    <!-- <section class="container mb-5">
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
                    </section> -->

                    <!-- <div class="row mt-none-30 pb-90">
                        <div class="col-lg-4 col-md-6 mt-30">
                            <div class="footer__cta">
                                <span class="title">NEWSLETTER</span>
                                <h4>Get now free 20% discount for all <br> products on your first order!</h4>
                                <form class="footer__newsletter" action="#">
                                    <input type="text" placeholder="Email address">
                                    <button class="thm-btn thm-btn--gradient style-2 br-5">SIGN UP</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-30">
                            <div class="footer__cta pl-45">
                                <span class="title">QUICK CONTACT</span>
                                <h4>If you have questions, please use our 24- <br>hour helpline</h4>
                                <span class="cta-number"><span><img src="{{ asset('products/assets/img/icon/np_icon2.svg') }}" alt=""></span>760 398-3535</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-30">
                            <div class="footer__cta text-lg-end">
                                <span class="title">JOIN NOW</span>
                                <ul class="footer__cta-social ul_li_right mb-60">
                                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <ul class="footer__cta-link ul_li_right">
                                    <li><a href="#!">PayPal</a></li>
                                    <li><a href="#!">VISA</a></li>
                                    <li><a href="#!">Master Card</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>-->



                    <!-- <div class="footer__copyright">
                        <div class="container">
                            <div class="ul_li_between mt-none-10">
                                <div class="footer__copyright-text mt-10">
                                    © 2025- The Night Marketer
                                </div>
                      
                            </div>
                        </div>
                    </div> -->
                    <div class="crm-footer__shape">
                        <div class="shape shape--1" data-parallax='{"y" : 70}'>
                            <img src="{{ asset('products/assets/img/shape/fot_shape1.png') }}" alt="">
                        </div>
                        <div class="shape shape--2" data-parallax='{"y" : 80}'>
                            <img src="{{ asset('products/assets/img/shape/fot_shape3.png') }}" alt="">
                        </div>
                    </div>

            </footer>


            <div id="demoModal" class="demo-modal">
                <div class="demo-modal-content">
                    <span class="demo-close">&times;</span>
                    <h2 class="demo-title">Get Your Free <span class="special-word">LeadNests</span> Demo</h2>
                    <p class="demo-subtitle">
                        Experience how <span class="special-word">LeadNests</span> helps teams capture, track, and close leads faster.
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="demo-form" id="demoForm" onsubmit="process(event)" novalidate>
                                <!-- Country (top) -->
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select id="country" name="country" required>
                                        <!-- default India -->
                                        <option value="India" selected>India</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Australia">Australia</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="location">Location</label>
                                    <select id="location" name="location" required>
                                        <option value="">Select location</option>
                                        <option value="India" selected>India</option>
                                        <option value="Outside India">Outside India</option>
                                    </select>
                                </div> -->

                                <div class="form-grid">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="you@company.com" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <select id="phone_code" name="country_code" class="w-25" required>
                                                <!-- populated by JS; default +91 -->
                                            </select>
                                            <input type="tel" id="phone" name="phone" class="w-75"
                                                placeholder="1234567890" required
                                                inputmode="numeric" pattern="[0-9]{6,15}"
                                                title="Enter 6-15 digits">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="industry">Industry</label>
                                        <select id="industry" name="industry" required>
                                            <option value="">Select industry</option>
                                            <option value="Travel">Travel</option>
                                            <option value="Education">Education</option>
                                            <option value="Healthcare">Healthcare</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Institute & Schools">Institute & Schools</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="team_size">Team Size</label>
                                        <select id="team_size" name="team_size" required data-min="1" data-max="201" data-step="1">
                                            <option value="" disabled selected>Select team size</option>
                                            <option value="1-50">1-50</option>
                                            <option value="51-100">51-100</option>
                                            <option value="101-200">101-200</option>
                                            <option value="201+">201+</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" id="company" name="company" placeholder="Company Name" required>
                                    </div>
                                </div>

                                <button type="submit" id="submitBtn" class="btn-primary">
                                    Book My Demo
                                </button>

                                <p id="formMsg" role="alert" style="margin-top:10px; display:none;"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- <section class="form-container">
                <span class="big-circle"></span>
                <img src="img/shape.png" class="square" alt="decorative shape" />

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



        </main>
    </div>

    <a
        href="https://wa.me/919717884659"
        class="whatsapp-fab is-ringing"
        target="_blank"
        rel="noopener"
        aria-label="Chat on WhatsApp">
        <img src="{{ asset('products/assets/img/icon/whatsapp.png') }}" alt="WhatsApp" />
    </a>


    <!-- jquery include -->


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
    integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"
    integrity="sha512-P2IDYZfqSwjcSjX0BKeNhwRUH8zRPGlgcWl5n6gBLzdi4Y5/0O4zaXrtO4K9TZK6Hn1BenYpKowuCavNandERg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('products/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('products/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('products/assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('products/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('products/assets/js/appear.js') }}"></script>
<script src="{{ asset('products/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('products/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('products/assets/js/cursor.js') }}"></script>
<script src="{{ asset('products/assets/js/jquery.marquee.min.js') }}"></script>
<script src="{{ asset('products/assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('products/assets/js/easing.min.js') }}"></script>
<script src="{{ asset('products/assets/js/scrollspy.js') }}"></script>
<script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
<script src="https://fast.wistia.net/player.js" async></script>
<script src="{{ asset('products/assets/js/main.js') }}"></script>
<script>
    // Country → code map (extend as you like)
    const COUNTRY_CODES = {
        "India": "+91",
        "United States": "+1",
        "Canada": "+1",
        "United Kingdom": "+44",
        "Australia": "+61",
        "United Arab Emirates": "+971",
        "Pakistan": "+92",
        "Sri Lanka": "+94",
        "Bangladesh": "+880",
        "Nepal": "+977",
        "Other": "+00"
    };

    // Predefined options for phone_code select (so users can override if needed)
    const ALL_CODES = [
        "+91", "+1", "+44", "+61", "+971", "+92", "+94", "+880", "+977", "+353", "+49", "+81", "+82", "+65", "+27", "+41"
    ];

    function populatePhoneCodes() {
        const codeSelect = document.getElementById('phone_code');
        codeSelect.innerHTML = '<option value="">Code</option>';
        ALL_CODES.forEach(c => {
            const opt = document.createElement('option');
            opt.value = c;
            opt.textContent = c;
            codeSelect.appendChild(opt);
        });
    }

    function setCodeFromCountry() {
        const country = document.getElementById('country').value;
        const codeSelect = document.getElementById('phone_code');
        const preferred = COUNTRY_CODES[country] || "+00";
        // ensure options exist then select
        if (![...codeSelect.options].some(o => o.value === preferred)) {
            const opt = document.createElement('option');
            opt.value = preferred;
            opt.textContent = preferred;
            codeSelect.insertBefore(opt, codeSelect.firstChild);
        }
        codeSelect.value = preferred;
    }

    document.addEventListener('DOMContentLoaded', () => {
        populatePhoneCodes();
        setCodeFromCountry();

        document.getElementById('country').addEventListener('change', setCodeFromCountry);
    });

    async function process(e) {
        e.preventDefault();

        const form = document.getElementById('demoForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const submitBtn = document.getElementById('submitBtn');
        const msg = document.getElementById('formMsg');
        msg.style.display = 'none';
        msg.textContent = '';

        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting…';

        const fd = new FormData(form);
        const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const res = await fetch('{{ route("demo-requests.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: fd
            });

            if (!res.ok) {
                // Extract validation errors if any
                const err = await res.json().catch(() => ({}));
                const firstError = err?.errors ? Object.values(err.errors)[0][0] : 'Something went wrong.';
                throw new Error(firstError);
            }

            const data = await res.json();
            msg.style.display = 'block';
            msg.style.color = '#0a7a3c';
            msg.textContent = data.message || 'Submitted!';
            form.reset();
            setCodeFromCountry(); // re-apply default (+91) after reset
            // setTimeout(() => {
            //     window.location.href = data.redirect_url || 'https://leadnests.thenightmarketer.com/login';
            // }, 1200);
        } catch (error) {
            msg.style.display = 'block';
            msg.style.color = '#b00020';
            msg.textContent = error.message || 'Submission failed. Please try again.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Book My Demo';
        }
    }
</script>

@endsection