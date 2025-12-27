@extends('client.layouts.app')
@section('content')
    <style>
/* Wrapper ko relative banayein */
.team-card .img-wrapper {
    position: relative;
    display: block;
    width: 100%;
    /* Agar card me border-radius hai to ye zaroori hai taaki image bahar na nikle */
    overflow: hidden; 
}

/* Dono images par transition effect lagayein taaki smooth cross-fade ho */
.team-card .img-wrapper img {
    width: 100%;
    height: auto;
    display: block;
    transition: opacity 0.4s ease-in-out; /* Smoothness ke liye zaroori */
    backface-visibility: hidden; /* Flicker avoid karne ke liye */
}

/* Default image (optional, just for clarity) */
.team-card .default-img {
    position: relative;
    z-index: 1;
}

/* Hover (PR) image ko absolute position karein aur chupayein */
.team-card .hover-img {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0; /* Initially hidden */
    z-index: 2; /* Default image ke upar */
}

/* --- HOVER ACTION --- */

/* Jaise hi card pe hover ho, PR image dikhao */
.team-card:hover .hover-img {
    opacity: 1;
}

/* YAHI NAYA HAI: Jaise hi card pe hover ho, pehli image chupao */
.team-card:hover .default-img {
    opacity: 0;
}



        .about-us-headline {

            font-size: 59px;
            font-weight: 400;
            line-height: 60px;
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
        }

        .about-us-image-section {
            color: #fff;
        }

        .about-us-headline-span {
            color: #F0CF22;
        }

        .about-us-section {
            padding-top: 100px;
            background-color: #141318;
        }

        @media (max-width: 480px) {
            .headline-section-container span.highlight {
                color: #f0cf22;
                font-family: "ivypresto_displaylight_italic";
                font-size: 30px;
                /* font-style: italic; */
                font-weight: 400;
                line-height: 35.297px !important;
            }

            .first-section {
                padding-top: 31px !important;
            }
        }

        /* .custom-section {
            padding: 5rem 0;

        } */

        .about-us-silder .slick-slide {
            padding: 0 10px;
        }

        .portfolio-section img {
            border-radius: 18px;
        }

        h2.industries-headline {
            font-size: 42px;
            font-weight: 600;
        }

        .border-radius-logo {
            border-radius: 0px !important;
        }


        .circle {
            width: 10px;
            height: 10px;
            border: 2px solid #FFD700;
            border-radius: 50%;
            display: inline-block;
            margin-right: 10px;
        }

        /*
        span.highlight-about-us {
            background-image: linear-gradient(gold, gold);
            background-size: 100% 29px;
            background-repeat: no-repeat;
            background-position: 65% 96%;
            transition: background-size .7s, background-position .5s ease-in-out;
        }

        span.highlight-about-us:hover {
            background-size: 100% 100%;
            background-position: 0% 100%;
            transition: background-position .7s, background-size .5s ease-in-out;
        } */

        .about-us-headline-about-us {
            font-size: 42px;
            line-height: 60px;
            font-weight: 600;
            color: #fff;
            /* font-family: Neue Montreal; */
        }


        .stats-section {
            background-color: #141318;
            /* Dark background */
            color: #fff;
            padding: 3rem 0;
            position: relative;
            padding-bottom: 190px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
        }

        .stat-label {
            font-size: 1.5rem;
            font-weight: 400;
            /* margin-top: 0.5rem; */
            color: #fff;
        }


        .ai-team img {
            width: 90px !important;
            height: 90px !important;
        }

        .ai-team {
            height: auto !important;
        }

        .experience-tag {
    position: absolute;
    bottom: 15px;
    right: 0;
    left: 0;
    margin: 0 auto;
    width: fit-content; /* IMPORTANT */
    background-color: #FFD700;
    color: #000000;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    z-index: 10;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.img-wrapper {
    position: relative;
}


        .team-section {
            /* padding: 4rem 0; */
            background-color: #f9f9f9;
        }

        .team-header {
            background-color: #FFD700;
            /* Yellow background */
            padding: 2.8rem;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .team-card {
            border: none;
            /* background-color: #212026; */
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
            border-radius: 10px;
            text-align: center;
            /* padding: 1.5rem; */
            /* height: 397px; */
        }

        .team-card img {
            width: 187px;
            height: 187px;
            /* border-radius: 50%; */
            margin-bottom: 1rem;
        }

        .team-card h5 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .team-card p {
            font-size: 0.9rem;
            color: #fff;
            width: 70%;
    margin: 0 auto;
        }

        .leader-card {
            background-color: #212026;
            padding: 16px;
            border-radius: 10px;
        }

        .team-header {
            color: #141318;
        }

        .leader-card-image img {
            width: 170px;
            height: 170px;
            /* border-radius: 50%; */
        }

        .leader-card h3 {
            font-size: 1.5rem;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .leader-card p {
            font-size: 1rem;
            margin: 3px;

        }

        .team-headline {

            font-size: 42px;
            font-weight: 400;
            line-height: 60px;
            text-align: center;
            align-content: center;
        }

        .team-header h3 {
            font-size: 50px;
            font-weight: 700;

        }


        .quote-image img {
            width: 33px;
            height: 25px;
            margin-bottom: 1rem;
        }


        .team-card-p {
            text-transform: uppercase;
            font-weight: 800;
            color: #ffd60a !important;
            font-size: 12px !important;
            margin-bottom: 5px;
        }

        section.team-section {
            margin-top: -37px;
            position: relative;
        }


        .grid {
            max-width: 1200px;
            margin: 40px auto;
            margin-bottom: 0px;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            list-style-type: none;
        }

        .industries-section {
            background-image: url('https://thenightmarketer.com/client/images/aboutbg-img.webp');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
            margin-top: -121px;
            object-fit: cover;
            /* padding-bottom: 75px; */
            background-color: linear-gradient(180deg, #14131800 0%, #141318 100%);
        }

        .grid>li {
            width: calc(100% / 2 - 30px);
            margin: 0px 15px;
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 15px;
            /* background-color: #141318; */
        }

        .filters {
            margin-top: 40px;
            margin: 0 auto;
            display: table;
            background: #25242C;
            padding: 10px 0px;
            border-radius: 100px;
            width: 1033px;
        }

        .grid li img {
            max-width: 100%;
            border-radius: 10px;
        }

        .filters button {
            padding: 6px 25px;
            margin: 0px 5px;
            background-color: transparent;
            border: none;
            border-radius: 10px;
            transition: 150ms;
            color: #fff;
            font-size: 18px;
            line-height: 25px;
            font-weight: 500;
            position: relative;
            outline: none;
            cursor: pointer;
            border-radius: 100px;
        }

        .filters button.is-checked {
            background-color: #F0CF22;
            color: #121212;
        }

        .element-item>div {
            padding: 15px 0px;
            color: #121212;
        }

        /* .element-item a {
            font-size: 18px;
            line-height: 24px;
            text-decoration: none;
            color: #fff;
            text-transform: capitalize;
        } */

        .element-item a.about-btn {
            margin-right: 10px;
        }

        .portfolio-card-headline {
            font-size: 22px;
            line-height: 30px;
            font-weight: 600;
        }

        .portfolio-card-text {
            font-size: 14px;
            line-height: 22px;
            color: #fff;
        }

        .about-us-headline-about-us .about-us-headline-about-us-span {
            color: #F0CF22;
            font-family: "ivypresto_displaylight_italic";
            /* font-style: italic; */
        }

        @media (max-width: 985px) {
            .lets-get-started {
                font-size: 22px;
            }
        }


        @media (max-width: 767px) {

            .filters {
                width: 220%;
            }

            .team-card p {
                width: 80% !important;
   
            }

            .filters button {
                padding: 5px 15px;
                margin: 5px;
            }

            .grid>li {
                width: calc(100% - 30px);
            }

            .element-item p {
                font-size: 16px;
                line-height: 22px;
            }

            .about-us-headline {
                font-size: 28px !important;
                line-height: 36.297px !important;
            }

            .team-header h2 {
                font-size: 45px;
                font-weight: 700;
            }

            h2.industries-headline {
                font-size: 34px;
            }

            .team-headline {
                font-size: 34px;
            }

            .ui-group {
                overflow: auto;
            }

            .team-card {
                height: 439px;
            }



            .team-card-p {
                text-transform: uppercase;
                font-weight: 800;
                color: #ffd700;
                font-size: 12px;
            }

            /* .element-item a {
                font-size: 14px;
                line-height: 24px;
                text-decoration: none;
                color: #fff;
            } */



            /* .team-card img {
                width: 100% !important;
                height: auto !important;

            } */

            .stat-label {
                font-size: 1.2rem;
            }

        }

        @media (max-width: 480px) {
            .team-card {
                height: auto;
                padding: 0.5rem;
            }


            .about-us-headline-about-us {
                font-size: 30px !important;
                line-height: 38px !important;

            }

            .team-headline {
                font-size: 30px !important;

                line-height: 38px !important;
            }


            .team-header h2 {
                font-size: 39px !important;
                font-weight: 600;
            }

            .team-header {
                padding: 1.6rem !important;

            }

            .industries-headline {
                font-size: 30px !important;
                font-weight: 600;
            }

            .stats-section {
                padding-top: 0px;
                padding-bottom: 53px !important;
            }

            .filters {

                width: 865px !important;
            }


            .border-radius-logo {
                border-radius: 0px !important;
                width: 100% !important;
                height: 150 !important;
                object-fit: contain;
            }
        }

        @media (max-width: 768px) {
            .industries-headline {
                font-size: 34px;
                font-weight: 600;
            }



            section.team-section {
                margin-top: -10px;
                position: relative;
            }

            .filters {
                display: flex;
                width: 1005px;
            }

            .industries-section {
                margin-top: -21px;
                /* padding-bottom: 0px; */
            }


            .stats-section {
                padding-top: 0px;
                padding-bottom: 92px;
            }

            .about-us-headline-about-us {
                font-size: 42px;
                line-height: 50px;
                font-weight: 500;

            }

            .team-headline {
                font-size: 42px;
                font-weight: 400;
                line-height: 50px;
            }

            .team-header h2 {
                font-size: 45px;
                font-weight: 600;
            }
        }
    </style>
    <section class="about-us-section hero-section-bgimg">


        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 mx-auto">
                    <div class="hero-section text-center first-section">
                        <!-- Badge and rating section -->
                        <div class="rating-section">
                            <!-- Profile Images -->
                            <div class="profile-images">
                                {{-- <img src="{{ asset('client/images/homeimg/h-p1.png') }}" alt="Profile 1" class="profile-img">
                        <img src="{{ asset('client/images/homeimg/h-p2.png') }}" alt="Profile 2" class="profile-img">
                        <img src="{{ asset('client/images/homeimg/h-p3.png') }}" alt="Profile 3" class="profile-img">
                        <img src="{{ asset('client/images/homeimg/h-p4.png') }}" alt="Profile 4" class="profile-img"> --}}

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
                                <span class="description">Rated by {{ @$contactDetails['clients'] }}+ Successful D2C
                                    Owners</span>
                            </div>
                        </div>

                        <!-- Headline Section -->
                        <div class="headline-section-container shine">
                            <h1 class="headline-section">
                                {{-- High-Impact Websites and Creovation</span> for Growth --}}
                                Empowering brands <br><span class="highlight"> with cutting-edge experiences</span>
                            </h1>


                        </div>




                        <div class="col-lg-8 col-12 mx-auto mt-0 mt-md-0 mt-lg-5">
                            <p class="text-white">We are a dynamic digital agency based in New Delhi, India, specializing in
                                design, development, and marketing expertise. Our dedicated team of talented and motivated
                                digital strategists lives and breathes the digital space.</p>
                        </div>

                        <!-- Call to Action Button -->
                        <a href="{{ route('contact-us') }}" class="btn hero-btn mt-3">Get a Quote</a>

                        <!-- Partner Section -->

                    </div>
                </div>
            </div>
        </div>

        <div class="about-us-silder mt-5 d-none d-md-block d-lg-block">
            <div> <img src="{{ asset('client/images/imageabout.webp') }}" alt="about-us-slider" class="d-block w-100"></div>
            <div> <img src="{{ asset('client/images/image2about.webp') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/image3about.webp') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/image4about.webp') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/image5about.webp') }}" alt="about-us-slider" class="d-block w-100">
            </div>
        </div>

        <div class="about-us-silder mt-5 d-block d-md-none d-lg-none">
            <div> <img src="{{ asset('client/images/aboutsildemob1.webp') }}" alt="about-us-slider" class="img-fluid"></div>
            <div> <img src="{{ asset('client/images/aboutsildemob2.webp') }}" alt="about-us-slider" class="img-fluid">
            </div>
            <div> <img src="{{ asset('client/images/aboutsildemob3.webp') }}" alt="about-us-slider" class="img-fluid">
            </div>
            <div> <img src="{{ asset('client/images/aboutsildemob4.webp') }}" alt="about-us-slider" class="img-fluid">
            </div>
            <!-- <div> <img src="{{ asset('client/images/aboutsildemob5.webp') }}" alt="about-us-slider" class="img-fluid">
                </div> -->
        </div>
    </section>





    <section class="about-us-image-section bg-black">
        <div class="container custom-section pt-0">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6 col-lg-4 mb-0 mb-lg-4 mb-md-4">
                    <h2 class="about-us-headline-about-us d-none d-lg-block d-md-block">

                        Believing
                        in the synergy of<br>
                        <span class="about-us-headline-about-us-span">design and tech</span>
                    </h2>
                    <h2 class="about-us-headline-about-us d-block d-lg-none d-md-none">

                        Believing
                        in the synergy of
                        <span class="about-us-headline-about-us-span">design and tech</span>
                    </h2>
                </div>
                <!-- Right Column -->
                <div class="offset-lg-2 col-md-6">
                    <p>As a conversion-focused agency, The Night Marketer offers comprehensive services including web design
                        and development, social media management, SEO, and strategic marketing solutions. Our unique
                        strength lies in fusing artistry and logic to craft digital storytelling that leaves a lasting
                        impact, helping businesses stand out in a crowded online marketplace.
                    </p>
                </div>
            </div>
        </div>
        {{-- <div id="marquee-container">
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
    </div> --}}
    </section>

    <section class="stats-section position-relative" id="counter">
        <div class="could-effect"></div>
        <!-- Decorative Circles -->
        <div class="circle-large"></div>
        <div class="circle-small"></div>

        <div class="container position-relative">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 col-6 pb-4">
                    <div class="stat-number"><span class="counter-value" data-count="10">0</span>+</div>
                    <div class="stat-label">Year Experience</div>
                </div>

                <!-- Stat 2 -->
                <div class="col-lg-3 col-md-6 col-6 pb-4 pb-md-0">
                    <div class="stat-number"><span class="counter-value" data-count="8">0</span>+</div>
                    <div class="stat-label">Countries</div>
                </div>
                <!-- Stat 3 -->
                <div class="col-lg-3 col-md-6 col-6 pb-4 pb-md-0">
                    <div class="stat-number"><span class="counter-value"
                            data-count="{{ @$contactDetails['clients'] }}">0</span>+</div>
                    <div class="stat-label">Clients</div>
                </div>
                <!-- Stat 4 -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-number"><span class="counter-value" data-count="30">0</span>+</div>
                    <div class="stat-label">Team</div>
                </div>
            </div>
        </div>

    </section>


    <section class="industries-section text-white position-relative">
        <div class="container section mb-5">
            <div class="row d-none">
                <div class="col-lg-7 col-md-12 mx-auto text-center mb-4 ">

                    <h3 class="team-headline">Services</h3>
                </div>
            </div>
            <div class="row align-items-center flex-column-reverse flex-lg-row flex-md-row mb-3">
                {{-- <div class="col-md-12">
                    <div class="industries-headline-wrapper">
                        <div class="col-md-4">
                            <div class="benefit-card text-center">
                                <img src="https://thenightmarketer.com/storage/service/section_items/v26WS87CNZmmF2ZSYCfvdGvxASsFAkW2jhmpe4xX.png"
                                    class="img-fluid mx-auto" alt="Shopify theme development">
                                <h3 class="card-title">Shopify theme development</h3>
                                <p class="card-text">Create a unique design that prioritizes performance. Revamp your
                                    storefront to provide a great user experience and watch your sales grow. Our themes are
                                    designed to enhance user interaction and provide optimal performance on all platforms.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="benefit-card text-center">
                                <img src="https://thenightmarketer.com/storage/service/section_items/v26WS87CNZmmF2ZSYCfvdGvxASsFAkW2jhmpe4xX.png"
                                    class="img-fluid mx-auto" alt="Shopify theme development">
                                <h3 class="card-title">Shopify theme development</h3>
                                <p class="card-text">Create a unique design that prioritizes performance. Revamp your
                                    storefront to provide a great user experience and watch your sales grow. Our themes are
                                    designed to enhance user interaction and provide optimal performance on all platforms.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="benefit-card text-center">
                                <img src="https://thenightmarketer.com/storage/service/section_items/v26WS87CNZmmF2ZSYCfvdGvxASsFAkW2jhmpe4xX.png"
                                    class="img-fluid mx-auto" alt="Shopify theme development">
                                <h3 class="card-title">Shopify theme development</h3>
                                <p class="card-text">Create a unique design that prioritizes performance. Revamp your
                                    storefront to provide a great user experience and watch your sales grow. Our themes are
                                    designed to enhance user interaction and provide optimal performance on all platforms.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="benefit-card text-center">
                                <img src="https://thenightmarketer.com/storage/service/section_items/v26WS87CNZmmF2ZSYCfvdGvxASsFAkW2jhmpe4xX.png"
                                    class="img-fluid mx-auto" alt="Shopify theme development">
                                <h3 class="card-title">Shopify theme development</h3>
                                <p class="card-text">Create a unique design that prioritizes performance. Revamp your
                                    storefront to provide a great user experience and watch your sales grow. Our themes are
                                    designed to enhance user interaction and provide optimal performance on all platforms.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="benefit-card text-center">
                                <img src="https://thenightmarketer.com/storage/service/section_items/v26WS87CNZmmF2ZSYCfvdGvxASsFAkW2jhmpe4xX.png"
                                    class="img-fluid mx-auto" alt="Shopify theme development">
                                <h3 class="card-title">Shopify theme development</h3>
                                <p class="card-text">Create a unique design that prioritizes performance. Revamp your
                                    storefront to provide a great user experience and watch your sales grow. Our themes are
                                    designed to enhance user interaction and provide optimal performance on all platforms.
                                </p>
                            </div>
                        </div>
                    </div>
                </div> --}}



                <!-- Left Section -->
                <div class="col-md-6 col-12">
                    <h2 class="industries-headline">Serving Brands from <br> different industries.</h2>
                    <p class="pt-2 pb-2">Providing Top-Notch Design & Development services to clients across various
                        sectors, such as technology, healthcare, finance, and retail.</p>
                    <a href="{{ route('contact-us') }}" class="btn book-call-btn mt-0">Contact Us</a>
                </div>
                <!-- Right Section -->
                <div class="col-md-6 mb-3 mb-md-0 col-12">
                    <img src="{{ asset('client/images/Group-11791.png') }}" alt="industries-image" class="img-fluid">
                </div>
            </div>
        </div>


        {{-- <div class="container mt-md-2">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-9 mx-auto text-center mb-4 ">

                    <h3 class="team-headline">Our nicest work in front of you</h3>
                </div>
            </div>
        </div>
        <div data-js="hero-demo">
            <div class="ui-group overflow-auto">
                <!-- Dynamic Tabs -->
                <div class="filters button-group js-radio-button-group device-type">
                    <button class="button is-checked" data-filter="*">All</button>
                    @foreach ($caseStudy as $tab => $studies)
                        <button class="button" data-filter=".cat-{{ Str::slug($tab) }}">{{ $tab }}</button>
                    @endforeach
                </div>
            </div>

            <!-- Dynamic Grid -->
            <ul class="grid">
                <!-- Static Case Studies (add them to the "All" category) -->
                <li class="element-item cat-all cat-uiux cat-branding cat-development"
                    data-category="cat-all cat-uiux cat-branding">
                    <a href="{{ route('french-factor') }}" class="portfolio-card">
                        <img src="{{ asset('client/images/homeimg/frenchcaseimg.webp') }}" alt="Figma"
                            class="img-fluid"></a>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX
                            Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
                    </div>
                    <h4 class="case-study-section-text">Building stories for a rich perfume brand</h4>
                    <p class="case-study-section-text-p">A premium perfume brand based in USA with, a masterpiece of design
                        and development, reflects the brand's luxurious ethos with its seamless animations and refined
                        aesthetics.</p>

                </li>

                <li class="element-item cat-all cat-uiux cat-branding cat-development"
                    data-category="cat-all cat-uiux cat-branding">
                    <a href="{{ route('ozar-luxury') }}" class="portfolio-card">
                        <img src="{{ asset('client/images/homeimg/ozarcaseimg.webp') }}" alt="Figma"
                            class="img-fluid"></a>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="javascript:void(0)"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand Identity</a>
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX
                            Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
                    </div>
                    <h4 class="case-study-section-text">Revamping a real-estate brand based in Goa</h4>
                    <p class="case-study-section-text-p">A brand helping you find your dream home with stunning villas,
                        stylish apartments, and prime land worldwide.</p>

                </li>
                @foreach ($caseStudy as $tab => $studies)
                    @foreach ($studies as $study)
                        <li class="element-item cat-{{ Str::slug($tab) }}" data-category="cat-{{ Str::slug($tab) }}">
                            <a href="{{ route('case-study-details', $study->slug) }}" class="portfolio-card">
                                <img src="{{ asset('storage/' . $study->featured_image) }}" alt="{{ $study->title }}"
                                    class="img-fluid"></a>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($study->tags as $tag)
                                    <a href="{{ route('case-study-details', $study->slug) }}"
                                        class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2 about-btn">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            <h4 class="portfolio-card-headline">{{ $study->title }}</h4>
                            <p class="portfolio-card-text">{{ Str::limit($study->summary, 100) }}</p>

                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div> --}}
    </section>

    <section class="team-section pt-5 bg-black text-white">
        <div class="container ">

            <div class="row">
                <div class="col-md-12 col-lg-7 mx-auto text-center mb-4 ">
                    <h5 class="h5">Team</h5>
                    <h3 class="team-headline">The Night Marketers</h3>
                </div>
            </div>
            <div class="row">
                <!-- Team Header -->
                <div class="col-md-12 col-12 col-lg-3">
                    <div class="team-header">
                        <h3>Team Heads of TNM</h3>
                    </div>
                </div>

                <div class="col-md-12 col-12 col-lg-9">
                    <div class="leader-card text-center">
                        <!-- <div class="row">
                                <div class="col-md-6 leader-card-image">
                                    <img src="{{ asset('client/images/image-71.png') }}" alt="Raghav Mittal">
                                    <h3>Raghav Mittal</h3>
                                    <p>Director</p>
                                </div>
                                <div class="col-md-6 align-content-center">
                                    <div class="quote-image text-center ">
                                        <img src="{{ asset('client/images/unnamed-file.png') }}" alt="quote"
                                            class="img-fluid">
                                    </div>
                                    <p>Captain Chaos Wrangler of The Night Marketer! transforming digital mayhem into smooth
                                        sailing, steering projects with unparalleled expertise and a steady hand on the wheel.
                                    </p>
                                </div>
                            </div> -->
                        <div class="row">
                            <div class="col-md-6 leader-card-image">
                                <img src="{{ asset('storage/' . @$director->image) }}" alt="{{ @$director->name }}">
                                <h3>{{ @$director->name }}</h3>
                                <p>{{ @$director->designation }}</p>
                            </div>
                            <div class="col-md-6 align-content-center">
                                <div class="quote-image text-center ">
                                    <img src="{{ asset('client/images/unnamed-file.png') }}" alt="quote"
                                        class="img-fluid">
                                </div>
                                <p>
                                    {{ @$director->description }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/pawan.webp') }}" alt="Pawan Tiwari" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/pawan1.webp') }}" alt="Pawan Tiwari" class="hover-img">
                            </div>
                            <span class="experience-tag">5 Yrs+</span>
                        </div>
                        <p class="team-card-p">Sr. Backend Developer</p>
                        <h5>Pawan Tiwari</h5>
                        <p>Crafting robust, scalable server architectures with cutting-edge technologies ensuring optimal performance and reliability always</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/rishab.webp') }}" alt="Rishabh Singh" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/rishab (1).webp') }}" alt="Rishabh Singh" class="hover-img">
                            </div>
                            <span class="experience-tag">4 Yrs+</span>
                        </div>
                        <p class="team-card-p">Sr. Designer</p>
                        <h5>Rishabh Singh</h5>
                        <p>Designing stunning user-centric visual experiences that blend creativity with functionality, bringing brands to life</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/sachin.webp') }}" alt="Sachin Shrotriya" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/sachin1.webp') }}" alt="Sachin Shrotriya" class="hover-img">
                            </div>
                            <span class="experience-tag">4 Yrs+</span>
                        </div>
                        <p class="team-card-p">Backend Developer</p>
                        <h5>Sachin Shrotriya</h5>
                        <p>Building secure, efficient backend systems ensuring seamless data flow, reliability and optimal application performance</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/rahul.webp') }}" alt="Rahul Singh" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/rahul1.webp') }}" alt="Rahul Singh" class="hover-img">
                            </div>
                            <span class="experience-tag">4 Yrs+</span>
                        </div>
                        <p class="team-card-p">Sr. Frontend Developer</p>
                        <h5>Rahul Singh</h5>
                        <p>Creating seamless, interactive user interfaces with modern frameworks delivering exceptional digital experiences for users</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/anand.webp') }}" alt="Anand Kushwaha" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/anand1.webp') }}" alt="Anand Kushwaha" class="hover-img">
                            </div>
                            <span class="experience-tag">4 Yrs+</span>
                        </div>
                        <p class="team-card-p">Sr. Developer</p>
                        <h5>Anand Kushwaha</h5>
                        <p>Developing clean, maintainable code solutions that solve complex problems with elegant simplicity and precision</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/ronak.webp') }}" alt="Ronak Bisht" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/ronak1.webp') }}" alt="Ronak Bisht" class="hover-img">
                            </div>
                            <span class="experience-tag">4 Yrs+</span>
                        </div>
                        <p class="team-card-p">Graphic Designer</p>
                        <h5>Ronak Bisht</h5>
                        <p>Designing compelling brand visual identities that capture attention, communicate messages effectively and inspire audiences</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/prashant.webp') }}" alt="Prashant" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/prashant1.webp') }}" alt="Prashant" class="hover-img">
                            </div>
                            <span class="experience-tag">4 Yrs+</span>
                        </div>
                        <p class="team-card-p">Sr. Marketing Expert</p>
                        <h5>Prashant</h5>
                        <p>Driving strategic growth marketing campaigns that boost engagement, conversions and build strong brand awareness</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/satyam.webp') }}" alt="Rishabh Kumar" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/satyam1.webp') }}" alt="Rishabh Kumar" class="hover-img">
                            </div>
                            <span class="experience-tag">1 Yr+</span>
                        </div>
                        <p class="team-card-p">Frontend Developer</p>
                        <h5>Rishabh Kumar</h5>
                        <p>Building responsive, modern web applications with focus on intuitive user experience and flawless performance</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="team-card">
                        <div class="img-wrapper">
                           <div class="default-img-container">
                            <img src="{{ asset('client/images/arjun.webp') }}" alt="Arjun Singh" class="default-img">
                           </div>
                            
                            <div class="hover-img-container">
                            <img src="{{ asset('client/images/arjun1.webp') }}" alt="Arjun Singh" class="hover-img">
                            </div>
                            <span class="experience-tag">1 Yr+</span>
                        </div>
                        <p class="team-card-p">SEO Executive</p>
                        <h5>Arjun Singh</h5>
                        <p>Optimizing search rankings and visibility through strategic keyword research, content optimization and technical excellence</p>
                    </div>
                </div>


        
                {{-- @foreach ($teams as $member)
                    <div class="col-lg-4 col-md-6 col-12 mb-4 col-lg-3">
                        <div class="team-card">
                            <img src="{{ asset('storage/' . @$member->image) }}" alt="{{ @$member->name }}">
                            <p class="team-card-p">{{ @$member->designation }}</p>
                            <h5>{{ @$member->name }}</h5>
                            <p>{{ @$member->description }}</p>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>



    <section class="team-section mt-0 pt-5 bg-black text-white">
        <div class="container ">

            <div class="row">
                <div class="col-md-7 mx-auto text-center mb-2 ">
                    <h5 class="h5">Our AI Agents</h5>
                    <h3 class="team-headline">The Brainy Bots Behind the Scenes</h3>
                </div>
            </div>

            <!-- Team Members -->
            <div class="row mt-3">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-3 col-12 mb-4 col-lg-3">
                    <div class="team-card ai-team">
                        <img class="border-radius-logo" src="{{ asset('client/images/chatgpt.webp') }}" alt="Chat GPT">
                        {{-- <p class="team-card-p">Senior Shopify Developer</p> --}}
                        <h5>Chat GPT</h5>
                        <p>Here to help, chat and transform your thoughts into words.
                            From deep dives to fun facts, I've got you covered!!</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12 mb-4 col-lg-3">
                    <div class="team-card ai-team">
                        <img class="border-radius-logo" src="{{ asset('client/images/cursor.webp') }}" alt="Cursor">
                        {{-- <p class="team-card-p">Senior Backend Developer</p> --}}
                        <h5>Cursor</h5>
                        <p>Faster than your finger, smarter than your screen. Navigating your digital world with precision
                            and style!</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 col-lg-3 col-12 mb-4 col-lg-3">
                    <div class="team-card ai-team">
                        <img class="border-radius-logo" src="{{ asset('client/images/vo.webp') }}" alt="V0 Dev">
                        {{-- <p class="team-card-p">Backend Developer</p> --}}
                        <h5>V0 Dev</h5>
                        <p>Building tomorrow's tech today. I code, innovate, and
                            create, all while keeping it future-ready!</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-6 col-lg-3 col-12 mb-4 col-lg-3">
                    <div class="team-card ai-team">
                        <img class="border-radius-logo" src="{{ asset('client/images/cloude.webp') }}" alt="Claude">
                        {{-- <p class="team-card-p">UI/UX Designer</p> --}}
                        <h5>Claude</h5>
                        <p>Think tank meets wit- Claude's got answers, riddles, and a
                            touch of charm!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- cta -->
    @include('client.utils.cta')
    <!-- end-cta -->



    <div class="bg-black d-xl-none d-lg-none d-md-none d-block">
        <div class="container ">
            <div class="consultation-banner-mob">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-7 col-md-7 col-sm-12 text-center pt-5">
                            <h3 class="lets-get-started">Lets get started, Book your free consultation call</h3>
                            <a href="{{ route('contact-us') }}" class="btn btn-dark mt-3 book-call-btn_white">Book
                                Now</a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <img src="{{ asset('client/images/serviceimg/rocket-img.png') }}" alt="Figma"
                                class="img-fluid">
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Generation Here -->
@endsection
