<style>
    .right-bottom-img {
        border: 1px solid #ffffff5c;
        /* Keep bottom border for all but last row */
        border-right: 1px solid #ffffff5c;
        /* Keep right border for all but last column */
        min-width: 176px;
        height: 154px;
        text-align: center;
        align-content: center;
    }

    .client-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        /* Adjusted to 5 columns */
        gap: 0px !important;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 0 auto;
    }

    /* .partner-section .partner-badge {
        width: 160px;
    }

    .partner-section .partner-badge-main {
        width: 300px;
    } */

    .section-philosophy img {
        border-radius: 18px;
    }

    .form-section .container::before {
        content: "";
        position: absolute;
        left: -137px;
        top: -214px;
        width: 33%;
        height: 100%;
        border-radius: 120.5px;
        background: rgba(34, 240, 58, 0.30);
        filter: blur(137.72000122070312px);
        z-index: -1;
    }

    .form-section .container::after {
        content: "";
        position: absolute;
        right: -137px;
        bottom: -214px;
        width: 33%;
        height: 100%;
        border-radius: 120.5px;
        background: rgba(34, 240, 58, 0.30);
        filter: blur(137.72000122070312px);
        z-index: -1;
    }

    .form-section .form-control {
        border-radius: 50px;
    border: 1.466px solid rgba(255, 255, 255, 0.26);
    background: transparent;
    color: #fff;
    }
    
    .form-section .form-control::placeholder {
        color: #FFF;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
line-height: normal;
text-transform: uppercase;
    }




    .form-section .form-control:focus {
       background: none;
       box-shadow: none;
       border: 1.466px solid rgba(255, 255, 255, 0.26);
       color: #fff;
    }


    .form-section .button-success-home {
        text-transform: uppercase;
        border-radius: 50px;
    }


    .client-container .right-bottom-img:nth-child(6) {
        border-top: 1px solid #444;
        border-image: linear-gradient(to top, transparent, #141318) 1 !important;
    }

    .client-container .right-bottom-img:nth-last-child(-n+6) {
        border-bottom: 1px solid #444;
        border-image: linear-gradient(to top, transparent, #ffffff5c) 1;
    }

    .client-container: .right-bottom-img:nth-child(6) {
        border-left: 1px solid #444;
        border-image: linear-gradient(to right, transparent, #ffffff5c) 1;
    }

    /* .client-container:first-child .right-bottom-img:nth-child(n+6) {
    border-left: 1px solid #444;
    border-image: linear-gradient(to right, transparent, #fff) 1;
} */


    .client-container .right-bottom-img:nth-child(1),
    .client-container .right-bottom-img:nth-child(2),
    .client-container .right-bottom-img:nth-child(3),
    .client-container .right-bottom-img:nth-child(4),
    .client-container .right-bottom-img:nth-child(5),
    .client-container .right-bottom-img:nth-child(6) {
        border-top: 1px solid #444;
        border-image: linear-gradient(to bottom, transparent, #ffffff5c) 1;
    }

    .client-container .right-bottom-img:nth-child(6n) {
        border-top: 1px solid #444;
        border-image: linear-gradient(to left, transparent, #ffffff5c) 1;
    }

    /* @media (max-width: 480px) {
        .partner-section .partner-badge {
            width: 100%;
        }

        .partner-section .partner-badge-main {
            width: 100%;
        }
    } */
</style>
@extends('client.layouts.app')
@section('content')
    <section class="bg-black hero-section-bgimg">
        <!-- Container for the main content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-12 mx-auto">
                    <div class="hero-section text-center first-section">
                        <!-- Badge and rating section -->
                        <div class="rating-section">
                            <!-- Profile Images -->
                            <div class="profile-images">
                                {{-- <img src="{{ asset('client/images/homeimg/h-p1.png') }}" alt="Profile 1" class="profile-img">
                                <img src="{{ asset('client/images/homeimg/h-p2.png') }}" alt="Profile 2"
                                    class="profile-img">
                                <img src="{{ asset('client/images/homeimg/h-p3.png') }}" alt="Profile 3"
                                    class="profile-img">
                                <img src="{{ asset('client/images/homeimg/h-p4.png') }}" alt="Profile 4"
                                    class="profile-img"> --}}

                                <img src="{{ asset('client/images/homeimg/Group 1000014114.webp') }}" alt="Profile 1"
                                    class="profile-img">
                            </div>

                            <!-- Star Rating and Text -->
                            <div class="rating-text">
                                <span class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                </span>
                                <span class="description">Rated by 450+ Successful B2B Owners</span>
                            </div>
                        </div>

                        <!-- Headline Section -->
                        <div class="headline-section-container shine">
                            <h1 class="headline-section">
                                We creatively design digital experiences and build
                            </h1>
                            <span class="highlight">memorable brands.</span>
                        </div>




                        <div class="ai-driven-section floating d-none d-lg-block d-xl-block d-md-block">
                            <div class="ai-driven-section-container">
                                <div class="ai-driven-section-text">AI Driven</div>
                                <div class="ai-driven-section-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22"
                                        viewBox="0 0 21 22" fill="none">
                                        <path
                                            d="M14.9244 1.88133C17.2022 0.671808 19.8435 2.70994 19.2512 5.21998L16.085 18.6365C15.4141 21.4796 11.4887 21.7845 10.3868 19.0791L9.58179 17.1024C8.89521 15.4167 7.34677 14.2372 5.53918 14.0231L4.04625 13.8463C1.1263 13.5005 0.395188 9.59653 2.99212 8.21753L14.9244 1.88133Z"
                                            fill="#F0CF22" stroke="white" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>


                        <div class="your-growth-partner-section floating d-none d-lg-block d-xl-block d-md-block">
                            <div class="your-growth-partner-section-container">
                                <div class="your-growth-partner-section-text">Your Growth Partner</div>
                                <div class="your-growth-partner-section-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22"
                                        viewBox="0 0 21 22" fill="none">
                                        <path
                                            d="M1.40428 5.79943C0.628083 3.34002 3.1116 1.11228 5.47252 2.15018L18.092 7.69793C20.7662 8.87354 20.3538 12.7891 17.4934 13.3819L15.4035 13.8149C13.6211 14.1843 12.1803 15.493 11.6418 17.2318L11.1971 18.6678C10.3273 21.4766 6.35544 21.4873 5.47048 18.6833L1.40428 5.79943Z"
                                            fill="#F0CF22" stroke="white" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Call to Action Button -->
                        <a href="{{ route('contact-us') }}" class="btn hero-btn mt-lg-5 mt-md-5 mt-3">Start a Project</a>

                        <!-- Partner Section -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="partner-section pt-5 bg-black">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-2 col-3 text-lg-end text-md-end text-center">
                    <img src="{{ asset('client/images/homeimg/clutchaw.svg') }}" alt="Shopify Partner"
                        class="partner-badge mb-2 img-fluid">
                </div>
                <div class="col-md-3 col-3 text-center">
                    <img src="{{ asset('client/images/homeimg/shopiftp.svg') }}" alt="Shopify Partner"
                        class="partner-badge-main mb-2 img-fluid">
                </div>
                <div class="col-md-2 col-3 text-center">
                    <img src="{{ asset('client/images/homeimg/klaviyo-icon.png') }}" alt="Shopify Partner"
                        class="partner-badge-main mb-2 img-fluid">
                </div>
                <div class="col-md-2 col-3 text-lg-left text-md-left text-center">
                    <img src="{{ asset('client/images/homeimg/clutchchap.svg') }}" alt="Shopify Partner"
                        class="partner-badge mb-2 img-fluid">
                </div>

            </div>
            <div class="row">
                <div class="col-md-2 mx-auto text-center">
                    <p class="partner-text">We’re among in 140 Shopify partners in India</p>
                </div>
            </div>
        </div>
    </div>


    <div class="scroll-section">
        <div class="scroll-text">
            <span>$56M+ Revenue Generated <span class="for-clients">for Clients</span></span>
            <span class="star_img">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21" fill="none">
                    <g clip-path="url(#clip0_150_1259)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.82 0.0499878H10.34V8.62351L4.27759 2.56115L3.23123 3.60761L9.2936 9.66997H0.719971V11.15H9.29339L3.23123 17.2124L4.2777 18.2588L10.3401 12.1965V20.77H11.8201V12.1965L17.8825 18.2588L18.9289 17.2124L12.8666 11.15H21.44V9.66997H12.8664L18.9288 3.60761L17.8823 2.56104L11.82 8.62341V0.0499878Z"
                            fill="#141318" />
                    </g>
                    <defs>
                        <clipPath id="clip0_150_1259">
                            <rect width="20.72" height="20.72" fill="white" transform="translate(0.719971 0.0499878)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span>{{ @$contactDetails['clients'] }}+ <span class="for-clients">Happy Clients</span></span>
            <span class="star_img">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21" fill="none">
                    <g clip-path="url(#clip0_150_1259)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.82 0.0499878H10.34V8.62351L4.27759 2.56115L3.23123 3.60761L9.2936 9.66997H0.719971V11.15H9.29339L3.23123 17.2124L4.2777 18.2588L10.3401 12.1965V20.77H11.8201V12.1965L17.8825 18.2588L18.9289 17.2124L12.8666 11.15H21.44V9.66997H12.8664L18.9288 3.60761L17.8823 2.56104L11.82 8.62341V0.0499878Z"
                            fill="#141318" />
                    </g>
                    <defs>
                        <clipPath id="clip0_150_1259">
                            <rect width="20.72" height="20.72" fill="white" transform="translate(0.719971 0.0499878)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span>30+ <span class="for-clients">Team Members</span></span>
            <span class="star_img">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21"
                    fill="none">
                    <g clip-path="url(#clip0_150_1259)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.82 0.0499878H10.34V8.62351L4.27759 2.56115L3.23123 3.60761L9.2936 9.66997H0.719971V11.15H9.29339L3.23123 17.2124L4.2777 18.2588L10.3401 12.1965V20.77H11.8201V12.1965L17.8825 18.2588L18.9289 17.2124L12.8666 11.15H21.44V9.66997H12.8664L18.9288 3.60761L17.8823 2.56104L11.82 8.62341V0.0499878Z"
                            fill="#141318" />
                    </g>
                    <defs>
                        <clipPath id="clip0_150_1259">
                            <rect width="20.72" height="20.72" fill="white"
                                transform="translate(0.719971 0.0499878)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span>AI <span class="for-clients">Powered Services</span></span>

            <span>$56M+ Revenue Generated <span class="for-clients">for Clients</span></span>
            <span class="star_img">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21"
                    fill="none">
                    <g clip-path="url(#clip0_150_1259)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.82 0.0499878H10.34V8.62351L4.27759 2.56115L3.23123 3.60761L9.2936 9.66997H0.719971V11.15H9.29339L3.23123 17.2124L4.2777 18.2588L10.3401 12.1965V20.77H11.8201V12.1965L17.8825 18.2588L18.9289 17.2124L12.8666 11.15H21.44V9.66997H12.8664L18.9288 3.60761L17.8823 2.56104L11.82 8.62341V0.0499878Z"
                            fill="#141318" />
                    </g>
                    <defs>
                        <clipPath id="clip0_150_1259">
                            <rect width="20.72" height="20.72" fill="white"
                                transform="translate(0.719971 0.0499878)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span>{{ @$contactDetails['clients'] }}+ <span class="for-clients">Happy Clients</span></span>
            <span class="star_img">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21"
                    fill="none">
                    <g clip-path="url(#clip0_150_1259)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.82 0.0499878H10.34V8.62351L4.27759 2.56115L3.23123 3.60761L9.2936 9.66997H0.719971V11.15H9.29339L3.23123 17.2124L4.2777 18.2588L10.3401 12.1965V20.77H11.8201V12.1965L17.8825 18.2588L18.9289 17.2124L12.8666 11.15H21.44V9.66997H12.8664L18.9288 3.60761L17.8823 2.56104L11.82 8.62341V0.0499878Z"
                            fill="#141318" />
                    </g>
                    <defs>
                        <clipPath id="clip0_150_1259">
                            <rect width="20.72" height="20.72" fill="white"
                                transform="translate(0.719971 0.0499878)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span>30+ <span class="for-clients">Team Members</span></span>
            <span class="star_img">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21"
                    fill="none">
                    <g clip-path="url(#clip0_150_1259)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.82 0.0499878H10.34V8.62351L4.27759 2.56115L3.23123 3.60761L9.2936 9.66997H0.719971V11.15H9.29339L3.23123 17.2124L4.2777 18.2588L10.3401 12.1965V20.77H11.8201V12.1965L17.8825 18.2588L18.9289 17.2124L12.8666 11.15H21.44V9.66997H12.8664L18.9288 3.60761L17.8823 2.56104L11.82 8.62341V0.0499878Z"
                            fill="#141318" />
                    </g>
                    <defs>
                        <clipPath id="clip0_150_1259">
                            <rect width="20.72" height="20.72" fill="white"
                                transform="translate(0.719971 0.0499878)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span>AI <span class="for-clients">Powered Services</span></span>
        </div>


    </div>



    <section class="bg-black">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="let-the-magic-happen">Let the magic happen<br>
                        <span class="let-the-magic-happen-span">design, development, marketing
                            & automation</span>
                    </div>
                    <div class="mt-5 text-center">
                        <a href="{{ route('contact-us') }}" class="btn let-the-magic-happen-btn">Book a Call</a>
                    </div>
                    <img src="{{ asset('client/images/homeimg/hedingflost1.svg') }}" alt="Figma"
                        class="img-fluid floating heading-float1">
                    <img src="{{ asset('client/images/homeimg/hedingflost2.svg') }}" alt="Figma"
                        class="img-fluid floating heading-float2 d-none d-lg-block d-xl-block d-md-block">
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 py-lg-0 py-md-0 py-4">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center pe-lg-5 position-relative">
                    <img src="{{ asset('client/images/homeimg/section1img.webp') }}" alt="Figma" class="img-fluid">
                    <img class="section1-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014036.png') }}" alt="">
                    <img class="section2-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014037.png') }}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ps-lg-5 align-content-center">
                    <h3 class="let-the-magic-section-text">Pro at creating designs that bring life to your brand.</h3>
                    <p class="let-the-magic-section-text-p">We don’t just design—we bring your brand to life. Our creative
                        touch turns ideas into vibrant visuals that captivate and connect, making your brand unforgettable.
                        Let us craft the story your audience can see and feel.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">UI/UX
                            Designs</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Graphic
                            Designs</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Brand
                            Identity</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Conversion
                            Rate
                            Optimizations</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-5 mb-5 py-lg-0 py-md-0 py-4">
            <div class="row flex-column-reverse flex-lg-row">

                <div class="col-lg-6 col-md-6 col-sm-12 pe-lg-5 align-content-center">
                    <h3 class="let-the-magic-section-text">Innovating developments prepared for tomorrow's challenges</h3>
                    <p class="let-the-magic-section-text-p">At Thenightmarkets, we design developments that don’t just meet
                        today’s standards—they set tomorrow’s. We’re focused on crafting development solutions that are
                        ahead of the curve, ready to tackle whatever the future holds.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Shopify</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">WordPress</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Mobile
                            Apps</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Custom
                            Website</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">ERP &
                            CRM</a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 ps-lg-5 text-center position-relative">
                    <img class="section3-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014034.png') }}" alt="">
                    <img class="section4-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014035.png') }}" alt="">
                    <img src="{{ asset('client/images/homeimg/section2img.webp') }}" alt="Figma" class="img-fluid">
                </div>
            </div>
        </div>


        <div class="container mt-5  py-lg-0 py-md-0 py-4">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 pe-lg-5 text-center position-relative">
                    <img class="section5-img-float floating" src="{{ asset('client/images/homeimg/image.png') }}"
                        alt="">
                    <img class="section6-img-float floating" src="{{ asset('client/images/homeimg/image (1).png') }}"
                        alt="">
                    <img class="section7-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014104.png') }}" alt="">
                    <img src="{{ asset('client/images/homeimg/section3img.webp') }}" alt="Figma" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ps-lg-5 align-content-center">
                    <h3 class="let-the-magic-section-text">Crafting marketing strategies that transform engagement into
                        results
                    </h3>
                    <p class="let-the-magic-section-text-p">Leave the art of turning engagement into real results to us.
                        Our marketing strategies are designed to convert interactions into meaningful outcomes, driving
                        success and growth for your brand. Let us together transform your vision into victories.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Google
                            Ads</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">SEO</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Lead
                            Management</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Social
                            Media</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Whatsapp
                            Marketing</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Performance Marketing</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-sec section-philosophy">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3 class="our-philosophy-text">Our Philosophy is to build a Product for greater good.</h3>
                    <p class="our-philosophy-text-p">Our goal is to create lasting impressions that resonate and drive
                        engagement. We transform visions into reality, ensuring every interaction leaves a meaningful mark.
                        Our focus is on delivering memorable digital footprints that stand the test of time.</p>
                </div>
                <div class="col-lg-3 offset-lg-3 col-md-6 col-sm-12">
                    <div class="rotate-box d-none d-lg-block d-md-block">
                        <div class="rotating-text">
                            <svg viewBox="0 0 100 100">
                                <defs>
                                    <path id="textCircle" d="M 50,50 m -37,0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"
                                        fill="none" />
                                </defs>
                                <text>
                                    <textPath href="#textCircle" fill="#FFD60A" font-size="8.5" textLength="229">- BOOK
                                        YOUR CALL - LET'S DISCUSS YOUR IDEA </textPath>
                                </text>
                            </svg>
                        </div>
                        <div class="center-image">
                            <img decoding="async" src="{{ asset('client/images/raghav.png') }}" alt="Eye Animation" />
                        </div>
                    </div>
                    <div class="d-lg-none d-md-none d-block">
                        <a href="{{ route('contact-us') }}" class="nav-link book-call-btn ms-lg-3">Book a Call</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($caseStudies as $study)
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-5 ">
                        <a href="{{ route('case-study-details', $study->slug) }}"><img
                                src="{{ asset('storage/' . $study->featured_image) }}" alt="{{ $study->title }}"
                                class="img-fluid"></a>
                        <div class="d-flex flex-wrap gap-2 mt-4">
                            @foreach ($study->tags as $tag)
                                <a href="javascript:void(0)"
                                    class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">{{ $tag->name }}</a>
                            @endforeach
                            <a href="javascript:void(0)"
                                class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Website</a>
                        </div>
                        <h4 class="case-study-section-text mt-3">{{ $study->title }}</h4>
                        <p class="case-study-section-text-p mt-3">
                            {{ Str::limit($study->summary, 150) }}
                        </p>
                    </div>
                @endforeach
                {{-- <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                    <img src="{{ asset('client/images/homeimg/rajyogcaseimg.png') }}" alt="Figma" class="img-fluid">
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX
                            Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>
                    </div>
                    <h4 class="case-study-section-text mt-3">French Factor</h4>
                    <p class="case-study-section-text-p mt-3">A premium perfume brand based in USA with, a masterpiece of
                        design and development, reflects the
                        brand's luxurious ethos with its seamless animations and refined aesthetics.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                    <img src="{{ asset('client/images/homeimg/rajyogcaseimg.png') }}" alt="Figma" class="img-fluid">
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX
                            Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>
                    </div>
                    <h4 class="case-study-section-text mt-3">French Factor</h4>
                    <p class="case-study-section-text-p mt-3">A premium perfume brand based in USA with, a masterpiece of
                        design and development, reflects the
                        brand's luxurious ethos with its seamless animations and refined aesthetics.</p>
                </div> --}}

                <div class="mt-5 text-center">
                    <a href="{{ route('case-study') }}" class="btn let-the-magic-happen-btn">See More</a>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-black">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 mx-auto">
                    <h3 class="growth-text">Sit tight, We’ve got your growth</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="growth-slider">
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img src="{{ asset('client/images/homeimg/growth1.svg') }}"
                                        alt=""></div>
                                <div class="number">125+</div>
                                <div class="title">Weekly Lead Growth</div>
                                <p class="description">Consistent and robust lead generation to fuel your business growth, helping you connect with more potential customers every week.</p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img src="{{ asset('client/images/homeimg/growth2.svg') }}"
                                        alt=""></div>
                                <div class="number">2.2X</div>
                                <div class="title">Monthly Sales</div>
                                <p class="description">Achieve accelerated sales growth with proven strategies that double your revenue month-over-month.</p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img src="{{ asset('client/images/homeimg/growth3.svg') }}"
                                        alt=""></div>
                                <div class="number">120%</div>
                                <div class="title">Organic Traffic</div>
                                <p class="description">Boost your website's visibility with increased organic traffic through SEO-driven results and content optimization.</p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img src="{{ asset('client/images/homeimg/growth4.svg') }}"
                                        alt=""></div>
                                <div class="number">1200%</div>
                                <div class="title">Brand Recognition</div>
                                <p class="description">Elevate your brand's visibility and reputation, making a lasting impression on your audience across multiple channels.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 mx-auto">
                    <h3 class="we-excel-text">We excel in all industries, with a focus on eCommerce.</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">


                    <div class="tabs-container">
                        {{-- <div class="tab-arrow left-arrow" onclick="scrollTabs('left')">&#8249;</div> --}}


                        <div class="tab active" onclick="changeTab(0)">All</div>
                        <div class="tab" onclick="changeTab(1)">FMCG</div>
                        <div class="tab" onclick="changeTab(2)">Fashion & Decor</div>
                        <div class="tab" onclick="changeTab(3)">Drinks & Wellness</div>
                        <div class="tab" onclick="changeTab(4)">Hotels & Restaurants</div>
                        <div class="tab" onclick="changeTab(5)">Others</div>


                        {{-- <div class="tab-arrow right-arrow" onclick="scrollTabs('right')">&#8250;</div> --}}
                    </div>

                    <div class="content">


                        <div id="tabContent0" style="display: block;">
                            <div class="client-container all-clients">

                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Beanly-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Bluebook-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Boult-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/BRG-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Chhaya-Mehrotra-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Dibha-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/Dr.png') }}">
                                </div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Eurumme-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Fleurons-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Green_Chick_Chop-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/IOV-RVF-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Jaquar-2-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/John_Pride-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Junior_Folk-1.png') }}"></div>
                                {{-- <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/Kiavi-1-1.png') }}"></div> --}}
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Kibana-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Maviyom-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Naagin-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Nyayay-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Ohcha-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Organity-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Pincode-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Polka-Pop-1.png') }}"></div>
                                {{-- {{-- <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/Qurist-1-1.png') }}"></div> --}}
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Ruchoks-1-1.png') }}"></div>



                            </div>
                        </div>

                        <div id="tabContent1" style="display: none;">
                            <div class="client-container">
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Ruchoks-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Fleurons-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Urth-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Naagin-1.png') }}"></div>
                                {{-- <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div>
                                <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div> --}}

                            </div>
                        </div>
                        <div id="tabContent2" style="display: none;">
                            <div class="client-container">
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/John_Pride-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Eurumme-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Jaquar-2-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div>
                                {{-- <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div>
                                <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div> --}}

                            </div>
                        </div>
                        <div id="tabContent3" style="display: none;">
                            <div class="client-container">
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Beanly-1.png') }}"></div>
                                <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/Dr.png') }}">
                                </div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Qurist-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Organity-1.png') }}"></div>
                                {{-- <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div> --}}

                            </div>
                        </div>
                        <div id="tabContent4" style="display: none;">
                            <div class="client-container">
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Pincode-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Kibana-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Ruhe-Stays-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Bluebook-1.png') }}"></div>


                            </div>
                        </div>
                        <div id="tabContent5" style="display: none;">
                            <div class="client-container">
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/BRG-1-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Nyayay-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/IOV-RVF-1.png') }}"></div>
                                <div class="right-bottom-img"><img
                                        src="{{ asset('client/images/logohome/Boult-1-1.png') }}"></div>
                                {{-- <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div>
                                <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div>
                                <div class="right-bottom-img"><img src="{{ asset('client/images/logohome/ALTR-Diamonds-1.png') }}"></div> --}}
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </section>

    <section class="bg-black">
        {{-- <div class="contanier">

            <div class="col-lg-9 col-md-9 col-sm-12 mx-auto">
                <h3 class="we-excel-text">Tools we’ve worked with</h3>
            </div>


            <div id="marquee-container" class="mb-4">
                <div id="marquee-text">
                    <span><img src="{{ asset('client/images/work-logo/HTML.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/css.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/js.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/react-one.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/node.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/laravel.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/php.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/ad.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/meta.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/figma.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/ai.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/xd.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/ae.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/photoshop.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/HTML.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/css.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/js.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/react-one.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/node.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/laravel.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/php.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/ad.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/meta.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/figma.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/ai.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/xd.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/ae.svg') }}" alt="Icon 1"></span>
                    <span><img src="{{ asset('client/images/work-logo/photoshop.svg') }}" alt="Icon 1"></span>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="silder_section_work d-none d-lg-block d-md-block">
                        <img src="{{ asset('client/images/homeimg/CRM Dashboard Banner.webp') }}" alt="">
                        <img src="{{ asset('client/images/homeimg/Mobile App Design Banner.webp') }}" alt="">
                        <img src="{{ asset('client/images/homeimg/Shopify Banner.webp') }}" alt="">
                        <img src="{{ asset('client/images/homeimg/WordPress Banner.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 d-block d-lg-none d-md-none">
                    <div class="silder_section_work">
                        <img src="{{ asset('client/images/homeimg/CRM Dashboard Banner - Mobile.webp') }}"
                            alt="">
                        <img src="{{ asset('client/images/homeimg/Mobile App Design Banner - Mobile.webp') }}"
                            alt="">
                        <img src="{{ asset('client/images/homeimg/Shopify Banner - Mobile.webp') }}" alt="">
                        <img src="{{ asset('client/images/homeimg/WordPress Banner - Mobile.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm12">
                    <div class="testimonial-section-left">
                        <p class="testimonial-p">Testimonials</p>
                        <h3 class="testimonial-text">Client Testimonials Regarding Our Services</h3>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-12">
                    <div class="testimonial-section-right">
                        <div class="testimonial-section text-white">
                            <div class="testimonial-card mt-4">
                                <div class="testimonial-image">
                                    <img src="{{ asset('client/images/BackgroundOverlay-1.svg') }}" alt="Client Image">
                                </div>
                                <h5 class="mt-3">Manick Wadhwa</h5>
                                <p class="testimonial-p">Director, SKI Capital Services Limited</p>
                                <p class="testimonial-text">The Night Marketer had an organized workflow and a
                                    well-designed scope that kept our timelines in check.</p>
                            </div>
                        </div>
                        <div class="testimonial-section text-white">
                            <div class="testimonial-card mt-4">
                                <div class="testimonial-image">
                                    <img src="{{ asset('client/images/BackgroundOverlay-1.svg') }}" alt="Client Image">
                                </div>
                                <h5 class="mt-3">Vivek Hinduja</h5>
                                <p class="testimonial-p">Managing Director</p>
                                <p class="testimonial-text">They offer a complete one-stop package at an extremely
                                    competitive price.</p>
                            </div>
                        </div>
                        <div class="testimonial-section text-white">
                            <div class="testimonial-card mt-4">
                                <div class="testimonial-image">
                                    <img src="{{ asset('client/images/BackgroundOverlay-1.svg') }}" alt="Client Image">
                                </div>
                                <h5 class="mt-3">Sagar Aggrawal</h5>
                                <p class="testimonial-p">Managing Partner</p>
                                <p class="testimonial-text">We were thoroughly impressed with their team's
                                    customer-oriented approach.</p>
                            </div>
                        </div>
                        <div class="testimonial-section text-white">
                            <div class="testimonial-card mt-4">
                                <div class="testimonial-image">
                                    <img src="{{ asset('client/images/BackgroundOverlay-1.svg') }}" alt="Client Image">
                                </div>
                                <h5 class="mt-3">Manick Wadhwa</h5>
                                <p class="testimonial-p">Director, SKI Capital Services Limited</p>
                                <p class="testimonial-text">The Night Marketer had an organized workflow and a
                                    well-designed scope that kept our timelines in check.</p>
                            </div>
                        </div>
                        <div class="testimonial-section text-white">
                            <div class="testimonial-card mt-4">
                                <div class="testimonial-image">
                                    <img src="{{ asset('client/images/BackgroundOverlay-1.svg') }}" alt="Client Image">
                                </div>
                                <h5 class="mt-3">Ujjwal Verma</h5>
                                <p class="testimonial-p">STARLIGHTAUTO PVT. LTD.</p>
                                <p class="testimonial-text">Their intent and ability to handle uncertain circumstances are
                                    one of their key
                                    proposition.</p>
                            </div>
                        </div>
                        <div class="testimonial-section text-white">
                            <div class="testimonial-card mt-4">
                                <div class="testimonial-image">
                                    <img src="{{ asset('client/images/BackgroundOverlay-1.svg') }}" alt="Client Image">
                                </div>
                                <h5 class="mt-3">Angad Singh</h5>
                                <p class="testimonial-p">Kwatra Enterprises</p>
                                <p class="testimonial-text">The Night Marketer had an guided me to the right path, which
                                    has helped me run a successful business.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="form-section bg-black">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="testimonial-section-left">
                        {{-- <p class="testimonial-p">Get a Free eBook</p> --}}
                        <h3 class="testimonial-text d-none d-lg-block d-md-block">Get your first Website <br>Audit Report<br>
                            for Free</h3>
                            <h3 class="testimonial-text d-block d-lg-none d-md-none">Get your first Website <br>Audit Report<br>
                                for Free</h3>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-6 col-sm-12">

                    <form id="ebookContactForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        required>
                                    <span class="text-danger error-text name_error"></span>
                                </div>  
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="Phone Number" required>
                                    <span class="text-danger error-text phone_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-md-0 mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email Address" required>
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-md-0 mb-3">
                                    <input type="url" class="form-control" id="website_url" name="website_url"
                                        placeholder="Website / URL" required>
                                    <span class="text-danger error-text website_url_error"></span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Custom Trigger Button -->
                   <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <button id="customTriggerButton" class="book-call-btn button-success-home w-100">Get a Free Report</button>
                    </div>
                   </div>

                    <div id="successMessage" class="alert alert-success  d-none mt-3"></div>


                </div>
            </div>
        </div>
    </section>
@endsection
@section('pageJs')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            function submitEbookForm() {
                // Clear previous error messages
                $('.error-text').text('');

                // Serialize form data
                const formData = $('#ebookContactForm').serialize();

                // AJAX request
                $.ajax({
                    url: "{{ route('ebook.contact.submit') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Show success message
                            $('#successMessage').text(response.message).removeClass('d-none');
                            // Clear the form fields
                            $('#ebookContactForm')[0].reset();
                        } else {
                            // Display validation errors
                            $.each(response.errors, function(key, value) {
                                $('.' + key + '_error').text(value[0]);
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            $('#customTriggerButton').on('click', function() {
                submitEbookForm();
            });
        });
    </script>
@endsection
