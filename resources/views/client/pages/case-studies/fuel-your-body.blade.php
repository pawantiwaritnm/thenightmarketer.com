@extends('client.layouts.app')
@section('content')
<style>
    /* Custom Properties & Overrides */
    :root {
        --brand-black: #1a1a1a;
        --brand-green: #2e7d32;
        --brand-light-green: #e8f5e9;
        --brand-offwhite: #f9f9f9;
    }

    body {
        font-family: "DM Sans", sans-serif;
        color: var(--brand-black);
        -webkit-font-smoothing: antialiased;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .font-serif {
        font-family: "DM Sans", sans-serif;
    }

    .scroll-section{
        display:none;
    }

    .navbar{
        top:0;
    }

    .content-section .content-title {
        color: var(--Color-Black, #111013);
        font-size: 37px;
        font-style: normal;
        font-weight: 700;
        line-height: 105%;
    }

    .bg_color-french {
        background: rgb(243 244 254);
    }

    .light-green {
        background: #FEF9DA;
    }

    .task-details {
        border-top: 2px solid #9f9f9fa4;
        padding-top: 10px;
        margin-top: 10px;
    }

    .text-brand-green {
        color: var(--brand-green) !important;
    }

    .bg-brand-black {
        background-color: var(--brand-black) !important;
    }

    .bg-brand-green {
        background-color: var(--brand-green) !important;
    }

    .bg-brand-light-green {
        background-color: var(--brand-light-green) !important;
    }


    /* Hero */
    .hero-section {
        background-image: url("{{ asset('client/casestudy/fyb/fyb-banner.webp') }}");
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
        height: 100vh;
        display: flex;
        align-items: flex-end;
    }

    .hero-tag {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #888;
        border: 1px solid #ddd;
        padding: 4px 12px;
        border-radius: 50px;
        background: #fff;
        display: inline-block;
        margin-bottom: 1.5rem;
    }

    .display-huge {
        font-size: 3.5rem;
        font-weight: 500;
        line-height: 1.1;
    }

    @media(min-width: 768px) {
        .display-huge {
            font-size: 5rem;
        }
    }

    /* Stats Cards */
    .stat-card {
        background: #fff;
        border: 1px solid #eee;
        padding: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .stat-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #888;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--brand-black);
    }

    .small-bar {
        height: 40%;
    }

    .big-bar {
        height: 100%;
    }

    /* Timeline */
    .timeline-step {
        border-top: 1px solid #e0e0e0;
        padding: 3rem 0;
        transition: background-color 0.3s;
    }

    .timeline-step:hover {
        background-color: #fff;
    }

    .step-number {
        font-family: var(--font-serif);
        font-size: 3rem;
        color: #ddd;
        line-height: 1;
    }

    .timeline-step:hover .step-number {
        color: var(--brand-green);
    }

    .tag-pill {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 4px 8px;
        background: #fff;
        border: 1px solid #e0e0e0;
        color: #666;
        margin-right: 5px;
        font-weight: 600;
    }

    /* Strategy Comparison */
    .strategy-box {
        padding: 2rem;
        border-radius: 12px;
        height: 100%;
    }

    .strategy-old {
        background: rgba(40, 40, 40, 0.5);
        border: 1px solid #444;
        color: #bbb;
    }

    .strategy-new {
        background: rgba(46, 125, 50, 0.05);
        border: 1px solid rgba(46, 125, 50, 0.3);
        color: var(--brand-black);
    }

    /* Charts */
    .bar-chart-container {
        display: flex;
        align-items: flex-end;
        height: 200px;
        gap: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .bar-group {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        height: 100%;
    }

    .bar {
        width: 100%;
        border-radius: 4px 4px 0 0;
        transition: height 1s ease-out;
        position: relative;
    }

    .bar-label {
        margin-top: 10px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #666;
        text-align: center;
    }

    .bar-value {
        /* position: absolute;
            top: -25px; */
        width: 100%;
        text-align: center;
        font-size: 0.8rem;
        font-weight: 700;
    }

    #overview {
        margin-top: -64px;
        position: relative;
        z-index: 10;
    }

    /* Footer */
    footer {
        background-color: var(--brand-black);
        color: #fff;
    }

    .btn-brand-white {
        background-color: #fff;
        color: var(--brand-black);
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
    }

    .btn-brand-white:hover {
        background-color: #e0e0e0;
        color: var(--brand-black);
    }

    /* Utilities */
    .section-padding {
        padding: 80px 0;
        overflow: hidden;
    }

    .text-balance {
        text-wrap: balance;
    }


    @media (max-width: 625px) {
        #overview {
            margin-top: -15px;
        }
    }

    .bullet-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    .visit-website {
        color: var(--Color-Black, #111013);
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: 105%;
        text-decoration: none;
    }

    /* .visit-website::after {
            content: '';
            position: absolute;
            left: 0px;
            right: 0;
            bottom: 15px;
            height: 3px;
            background-color: #1a1a1a;
        } */

    .bottom-banner {
        background: #F9F6DE;
    }
</style>

<!-- Hero Section -->
<header class="hero-section pt-md-5 pt-2 ">
    <div class="container-xxl pb-0 pb-md-4">
        <span class="hero-tag">E-Commerce / UX Optimization</span>
        <h1 class="display-huge mb-4 text-white">Fuel Your Body</h1>
        <p class="lead text-white mb-5 col-lg-7">
            Scaling a meal subscription service in PEI, Canada from a basic checkout to a comprehensive lifestyle
            brand, increasing average order value by $20 per customer.
        </p>

        <div class="row g-4 border-top pt-4">
            <div class="col-6 col-md-3">
                <small class="text-uppercase d-block mb-1 fw-bold text-white"
                    style="font-size: 0.7rem;">Client</small>
                <span class="fw-semibold text-white">Jamie (FYB)</span>
            </div>
            <div class="col-6 col-md-3">
                <small class="text-uppercase d-block mb-1 fw-bold text-white" style="font-size: 0.7rem;">Scope
                    of Work</small>
                <span class="fw-semibold text-white">UI/UX Design</span> <br>
                <span class="fw-semibold text-white">Shopify Development</span> <br>
                <span class="fw-semibold text-white">Subscription Flow</span>
            </div>
            <div class="col-6 col-md-3">
                <small class="text-uppercase d-block mb-1 fw-bold text-white"
                    style="font-size: 0.7rem;">Duration</small>
                <span class="fw-semibold text-white">Jan - Sept 2025</span>
            </div>
            <div class="col-6 col-md-3">
                <small class="text-uppercase d-block mb-1 fw-bold text-white" style="font-size: 0.7rem;">Key
                    Result</small>
                <span class="fw-bold text-white">+75% Sales Growth</span>
            </div>
        </div>
    </div>
</header>

<section class="py-md-5 py-4">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h5 class="fw-bold">Goal</h5>
                <p>
                    Scaling a meal subscription service in PEI, Canada from a basic checkout to a comprehensive
                    lifestyle
                    brand, increasing average order value by $20 per customer.
                </p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="pb-2">
                    <h5 class="fw-bold">Objective</h5>
                    <p class="">
                        The objective was to craft a distinctive brand identity for Sorbet & Co. and develop a
                        sleek, user-friendly website. The goal was to reflect the brand’s elegant, trendsetting
                        style while enhancing customer experience with a responsive design that showcases their
                        fashion jewelry collections.
                    </p>
                </div>
                <!-- <div class="container-fluid ps-0 pe-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="task-details">
                                    <h5 class="pt-3 fw-bold">Scope of Work</h5>
                                    <p>Branding</p>
                                    <p>UI/UX Design</p>
                                    <p>Website Development</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="task-details">
                                    <h5 class="pt-3 fw-bold">Duration</h5>
                                    <p>Total Duration: 8 Months</p>
                                    <p>Branding Phase: 2 Weeks</p>
                                    <p>UI/UX Phase: 2 Weeks</p>
                                    <p>Development Phase: 3 Weeks</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="task-details">
                                    <h5 class="pt-3 fw-bold">Client</h5>
                                    <p>Jamie (FYB)</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
</section>




<!-- Context -->
<section class="section-padding pb-0">
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0 col-12">
                <h2 class="display-6 fw-bold">The Challenge</h2>
            </div>
            <div class="col-lg-1 col-12">

            </div>
            <div class="col-lg-6 col-12">
                <p class="lead text-secondary mb-4">
                    Fuel Your Body is a subscription-based meal platform for busy individuals in PEI, Canada. When
                    we began in January 2025, the website was purely functional but confusing.
                </p>
                <p class="text-secondary">
                    With <strong>75% of traffic coming from mobile</strong>, the existing flow was creating
                    friction. Users struggled to decide between "One-Time" and "Weekly" orders, leading to high
                    abandonment. We needed to transform the experience from a basic cart to a lifestyle brand.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding container-xxl py-5">
    <div class="row">
        <div class="col-12">
            <img src="{{ asset('client/casestudy/fyb/fyb-influencer.webp') }}" class="img-fluid h-100 w-100" alt="">
        </div>
    </div>
</section>

<!-- Mockup Section -->
<div class="container-fluid p-0">
    <div class="position-relative bg-secondary">
        <img src="{{ asset('client/casestudy/fyb/healthy.png') }}" alt="Healthy Food Prep" class="w-100 h-100">
        <!-- <div class="position-absolute bottom-0 start-0 p-5 text-white">
                <span class="text-uppercase small letter-spacing-2 opacity-75 fw-bold">Post-Launch Visuals</span>
            </div> -->
    </div>
</div>

<!-- Stats Overview -->
<section id="overview" class="section-padding py-0">
    <div class="container-xxl">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-label">User Drop-off Rate</div>
                    <div class="d-flex align-items-baseline gap-2 mb-2">
                        <span class="stat-value">12%</span>
                        <span class="text-success small fw-bold"><i class="bi bi-arrow-down"></i> from 63%</span>
                    </div>
                    <p class="text-secondary small mb-0">Massive improvement in funnel efficiency after simplifying
                        the subscription options.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-label">Avg. Order Value</div>
                    <div class="d-flex align-items-baseline gap-2 mb-2">
                        <span class="stat-value">$85</span>
                        <span class="text-success small fw-bold"><i class="bi bi-arrow-up"></i> from $65</span>
                    </div>
                    <p class="text-secondary small mb-0">Driven by the new tiered plan structure (4, 6, 12 meals)
                        and clear savings.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-label">Subscribers</div>
                    <div class="d-flex align-items-baseline gap-2 mb-2">
                        <span class="stat-value">350+</span>
                        <span class="text-success small fw-bold"><i class="bi bi-arrow-up"></i> from 220</span>
                    </div>
                    <p class="text-secondary small mb-0">Steady weekly growth post-launch in March 2025.</p>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- Process -->
<section id="process" class="section-padding">
    <div class="container-xxl">
        <h2 class="display-6 fw-bold mb-5 border-bottom pb-4">The Roadmap</h2>

        <div class="timeline-step row">

            <img src="{{ asset('client/casestudy/fyb//Discovery & Audit.png') }}" class="img-fluid pb-3" alt="">
            <div class="col-md-3 mb-3 mb-md-0">
                <span class="step-number">01</span>
                <div class="small fw-bold text-secondary text-uppercase mt-2">Jan 2025</div>
            </div>
            <div class="col-md-9">
                <h3 class="h4 mb-3">Discovery & Audit</h3>
                <p class="text-secondary mb-3">
                    We started with a CRO audit, identifying bugs and major friction points. Tools like Clarity and
                    Lucky Orange revealed users were confused by the navigation structure.
                </p>
                <div>
                    <span class="tag-pill">CRO Audit</span>
                    <span class="tag-pill">Heatmaps</span>
                </div>
            </div>
        </div>

        <div class="timeline-step row">

            <img src="{{ asset('client/casestudy/fyb/Competitive Analysis & Strategy.png') }}" class="img-fluid pb-3" alt="">
            <div class="col-md-3 mb-3 mb-md-0">
                <span class="step-number">02</span>
                <div class="small fw-bold text-secondary text-uppercase mt-2">Jan Week 3</div>
            </div>
            <div class="col-md-9">
                <h3 class="h4 mb-3">Competitive Analysis & Strategy</h3>
                <p class="text-secondary mb-3">
                    We studied competitors like WeCook, HelloFresh, and Factor. We completely overhauled the
                    subscription flow to a tiered model: 4, 6, 12 meals, or a custom plan. This simplified
                    decision-making.
                </p>
                <div>
                    <span class="tag-pill">Competitor Research</span>
                    <span class="tag-pill">Pricing Strategy</span>
                </div>
            </div>
        </div>

        <div class="timeline-step row">

            <img src="{{ asset('client/casestudy/fyb/Design & Development.webp') }}" class="img-fluid pb-3" alt="">
            <div class="col-md-3 mb-3 mb-md-0">
                <span class="step-number">03</span>
                <div class="small fw-bold text-secondary text-uppercase mt-2">Feb - Mar 2025</div>
            </div>
            <div class="col-md-9">
                <h3 class="h4 mb-3">Design & Development</h3>
                <p class="text-secondary mb-3">
                    Designed a mobile-first UI in Figma focusing on brand storytelling. Development on Shopify took
                    4 weeks. We added pickup locations (Fridges) and emphasized PEI delivery.
                </p>
                <div>
                    <span class="tag-pill">Figma</span>
                    <span class="tag-pill">Shopify</span>
                    <span class="tag-pill">Mobile First</span>
                </div>
            </div>
        </div>

        <div class="timeline-step row">
            <img src="{{ asset('client/casestudy/fyb/Continuous Optimization.png') }}" class="img-fluid pb-3" alt="">
            <div class="col-md-3 mb-3 mb-md-0">
                <span class="step-number">04</span>
                <div class="small fw-bold text-secondary text-uppercase mt-2">July 2025</div>
            </div>
            <div class="col-md-9">
                <h3 class="h4 mb-3">Continuous Optimization</h3>
                <p class="text-secondary mb-3">
                    Post-launch data showed older demographics (50+) struggling with the order process. We
                    introduced a dedicated "How It Works" page and upgraded meal cards to show Macros (Calories,
                    Carbs, Protein, Fats) upfront.
                </p>
                <div>
                    <span class="tag-pill">Accessibility</span>
                    <span class="tag-pill">Iterative Design</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Strategy Comparison -->
<section id="strategy" class="section-padding bg-brand-black text-white">
    <div class="container-xxl">
        <div class="mb-5">
            <h2 class="display-5 fw-bold mb-3">Rethinking the Flow</h2>
            <p class="text-white lead">We shifted from a transactional model to a plan-based model to reduce
                cognitive load.</p>


            <img src="{{ asset('client/casestudy/fyb/fyb-changes.png') }}" alt="Strategy" class="img-fluid">
        </div>

        <div class="row g-4">
            <!-- Old Flow -->
            <div class="col-lg-6">
                <div class="strategy-box strategy-old">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="badge bg-danger text-uppercase letter-spacing-2">Old Flow</span>
                        <i class="bi bi-x-circle fs-4 text-danger"></i>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                            <span class="text-white">No clear savings shown for larger plans</span>
                            <i class="bi bi-arrow-right"></i>
                        </li>
                        <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                            <span class="text-white">Users couldn’t switch plans mid-selection</span>
                            <i class="bi bi-arrow-right"></i>
                        </li>
                        <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                            <span class="text-white"> Limited meal information provided </span>
                            <i class="bi bi-arrow-right"></i>
                        </li>
                        <!-- <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                                <span class="text-white"> Delivery details appeared only at checkout</span>
                                <i class="bi bi-arrow-right"></i>
                            </li> -->
                        <!-- <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                                <span class="text-white"> Only delivery option available</span>
                                <i class="bi bi-arrow-right"></i>
                            </li> -->
                        <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                            <span class="text-white"> Users guessed which plan offered best value</span>
                            <i class="bi bi-arrow-right"></i>
                        </li>
                        <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                            <span class="text-white"> Nutrition tracking required extra effort.</span>
                            <i class="bi bi-arrow-right"></i>
                        </li>
                        <!-- <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                                <span class="text-white"> Checkout felt disconnected from meal selection</span>
                                <i class="bi bi-arrow-right"></i>
                            </li>
                            <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                                <span class="text-white"> Fewer personalization options for users</span>
                                <i class="bi bi-arrow-right"></i>
                            </li>
                            <li class="p-3 border border-secondary rounded d-flex justify-content-between">
                                <span class="text-white"> User engagement and clarity were lower</span>
                                <i class="bi bi-arrow-right"></i>
                            </li> -->
                    </ul>
                    <p class="mt-4 small text-white">
                        <strong class="text-white">Problem:</strong> Users hesitated at the first step. Pricing per
                        meal was unclear until the end.
                    </p>


                </div>
            </div>

            <!-- New Flow -->
            <div class="col-lg-6">
                <div class="strategy-box strategy-new position-relative overflow-hidden">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="badge bg-brand-green text-uppercase letter-spacing-2">New Flow</span>
                        <i class="bi bi-check-circle-fill fs-4 text-brand-green"></i>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li
                            class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-brand-green rounded-circle me-2">1</span>
                                <strong>Displays savings clearly for each meal plan size</strong>
                                <!-- <div class="small text-muted ms-4 mt-1">4, 6, 12, or Custom</div> -->
                            </div>
                        </li>
                        <li
                            class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-brand-green rounded-circle me-2">2</span>
                                <strong>Shows detailed macros for every meal</strong>
                                <!-- <div class="small text-success ms-4 mt-1 fw-bold">Dynamic Pricing Applied ($11.99 -
                                        $12.99)</div> -->
                            </div>
                        </li>
                        <li
                            class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-brand-green rounded-circle me-2">3</span>
                                <strong>Allows switching between plans anytime on meal page</strong>
                            </div>
                            <!-- <i class="bi bi-credit-card-fill text-brand-green"></i> -->
                        </li>
                        <li
                            class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-brand-green rounded-circle me-2">4</span>
                                <strong>Shows delivery date upfront on build page</strong>
                            </div>
                            <!-- <i class="bi bi-credit-card-fill text-brand-green"></i> -->
                        </li>
                        <li
                            class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-brand-green rounded-circle me-2">5</span>
                                <strong>Offers pickup or home delivery flexibility</strong>
                            </div>
                            <!-- <i class="bi bi-credit-card-fill text-brand-green"></i> -->
                        </li>
                        <!-- <li
                                class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-brand-green rounded-circle me-2">6</span>
                                    <strong>Clearly communicates savings and plan comparisons</strong>
                                </div>
                            </li> -->
                        <!-- <li
                                class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-brand-green rounded-circle me-2">7</span>
                                    <strong>Integrated macro info supports goal-based meal choices</strong>
                                </div>
                            </li> -->
                        <!-- <li
                                class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-brand-green rounded-circle me-2">8</span>
                                    <strong>Seamless transition from meal choice to payment</strong>
                                </div>
                            </li> -->
                        <li
                            class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-brand-green rounded-circle me-2">6</span>
                                <strong>Provides customizable plans and flexible options</strong>
                            </div>
                        </li>
                        <!-- <li
                                class="p-3 bg-white text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-brand-green rounded-circle me-2">10</span>
                                    <strong>Boosts engagement with transparent, user-friendly flow</strong>
                                </div>
                                
                            </li> -->
                    </ul>
                    <p class="mt-4 small text-light">
                        <strong class="text-brand-green">Solution:</strong> By committing to a quantity first, users
                        see the value per meal instantly. The 12-meal plan offers the best value ($11.99),
                        incentivizing higher AOV.
                    </p>


                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5 col-12">
                <h3 class="text-white mt-4 display-5">The Benefits of Upgrading the Build My Meal Plan Flow</h3>
            </div>
            <div class="col-md-1 col-12">
            </div>
            <div class="col-md-6 col-12">
                <ul class="mt-4 list-unstyled">
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Shows clear
                        savings for larger
                        meal plans.</li>
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Displays
                        meal macros for
                        informed nutrition choices.</li>
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Allows easy
                        plan switching
                        during selection.</li>
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Shows
                        delivery dates early for
                        better planning.</li>
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Offers
                        flexible pickup or
                        delivery options.</li>
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Simplifies
                        user decisions with
                        transparent information.</li>
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Builds
                        trust through clear
                        offers and savings.</li>
                    <li class="text-white bullet-item"><i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        Enhances
                        overall user
                        convenience and flexibility.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Visual Highlights -->
<section class="section-padding">
    <div class="container-xxl">
        <div class="row align-items-end mb-5">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-3">Mobile-First Experience</h2>
                <p class="text-secondary">75% of users order on their phones. We optimized the UI for thumbs.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 bg-light">
                    <div class="card-body p-5 text-center d-flex flex-col flex-column justify-content-center">
                        <i class="bi bi-phone fs-1 text-secondary mb-3"></i>
                        <h4 class="h5">Sticky Plan Builder</h4>
                        <p class="text-secondary small">A sticky footer allows users to see their progress (e.g.,
                            "2/6 meals selected") without scrolling back up.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 bg-light">
                    <div class="card-body p-5 text-center d-flex flex-col flex-column justify-content-center">
                        <i class="bi bi-card-text fs-1 text-secondary mb-3"></i>
                        <h4 class="h5">Macro Transparency</h4>
                        <p class="text-secondary small">Meal cards now display Calories, Protein, Carbs, and Fats
                            directly, aiding decision-making for health-conscious users.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 bg-light">
                    <div class="card-body p-5 text-center d-flex flex-col flex-column justify-content-center">
                        <i class="bi bi-tags fs-1 text-secondary mb-3"></i>
                        <h4 class="h5">Tiered Offers</h4>
                        <p class="text-secondary small">Clear visual distinction of savings: $12.99 (4 meals) vs
                            $11.99 (12 meals).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quantitative Results -->
<section id="results" class="section-padding bg-white">
    <div class="container-xxl">
        <div class="row g-5">
            <div class="col-lg-4">
                <h2 class="display-6 fw-bold mb-4">The Impact</h2>
                <p class="text-secondary mb-4">
                    We tracked everything using Shopify analytics. Comparing the pre-optimization period (Jan-Apr)
                    with the post-optimization period (Apr-Sept), growth is evident.
                </p>
                <div class="p-4 bg-brand-light-green rounded mb-3">
                    <div class="small text-uppercase text-brand-green fw-bold mb-1">Total Sales</div>
                    <div class="d-flex align-items-center">
                        <span class="fs-2 fw-bold text-brand-black">$427,032</span>
                        <span class="badge bg-success ms-3">+75%</span>
                    </div>
                    <div class="small text-secondary mt-1">Apr - Sept 2025</div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-4">Performance Comparison</h5>

                    <div class="row">
                        <!-- Sales Chart -->
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h6 class="text-center text-secondary small text-uppercase mb-3">Total Sales</h6>
                            <div class="bar-chart-container">
                                <div class="bar-group">
                                    <div class="bar-value text-secondary">$243k</div>
                                    <div class="bar bg-secondary small-bar"></div>
                                    <div class="bar-label">Jan-Apr</div>
                                </div>
                                <div class="bar-group">
                                    <div class="bar-value text-brand-green">$427k</div>
                                    <div class="bar bg-brand-green big-bar"></div>
                                    <div class="bar-label">Apr-Sept</div>
                                </div>
                            </div>
                        </div>

                        <!-- Orders Chart -->
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h6 class="text-center text-secondary small text-uppercase mb-3">Total Orders</h6>
                            <div class="bar-chart-container">
                                <div class="bar-group">
                                    <div class="bar-value text-secondary">3,077</div>
                                    <div class="bar bg-secondary small-bar"></div>
                                    <div class="bar-label">Jan-Apr</div>
                                </div>
                                <div class="bar-group">
                                    <div class="bar-value text-brand-green">5,071</div>
                                    <div class="bar bg-brand-green big-bar"></div>
                                    <div class="bar-label">Apr-Sept</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sessions Chart -->
                        <div class="col-md-4">
                            <h6 class="text-center text-secondary small text-uppercase mb-3">Sessions</h6>
                            <div class="bar-chart-container">
                                <div class="bar-group">
                                    <div class="bar-value text-secondary">17k</div>
                                    <div class="bar bg-secondary small-bar"></div>
                                    <div class="bar-label">Jan-Apr</div>
                                </div>
                                <div class="bar-group">
                                    <div class="bar-value text-brand-green">30k</div>
                                    <div class="bar bg-brand-green big-bar"></div>
                                    <div class="bar-label">Apr-Sept</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="section-padding bottom-banner pb-0">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <img src="{{ asset('client/casestudy/fyb/fyb-bottom.webp') }}" class="img-fluid h-100 w-100" alt="">
            </div>
        </div>
    </div>
</section>


<section class="py-md-4 py-3">
    <div class="container content-section" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="col-lg-5" bis_skin_checked="1">
                <h6>Results</h6>
                <h3 class="content-title">
                    Outcome
                </h3>
            </div>
            <div class="col-lg-1" bis_skin_checked="1"></div>
            <div class="col-lg-6" bis_skin_checked="1">
                <div class="pb-2" bis_skin_checked="1">
                    <p class="text-justify">Fuel Your Body's website was redesigned to simplify healthy eating for
                        Canadians with clearer
                        products, smoother meal-plan selection, and an improved subscription flow. The enhanced UX,
                        faster checkout, and stronger nutritional storytelling help customers easily explore meals,
                        customize plans, and fuel their lifestyle with confidence.
                    </p>
                    <a target="_blank"
                        href="https://eatfyb.ca"
                        class="visit-website">Visit Website</a>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection