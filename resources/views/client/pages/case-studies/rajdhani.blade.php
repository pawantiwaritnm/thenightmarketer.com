@extends('client.layouts.app')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "DM Sans", sans-serif;
    }


    .navbar {
    padding: 0rem 1rem;
    transition: background-color 0.3s 
ease;
    background-color: #000000;
}

    .content-section .content-title {
        color: var(--Color-Black, #111013);
        font-size: 37px;
        font-style: normal;
        font-weight: 700;
        line-height: 105%;
    }

    .content-section .content-title2 {
        color: var(--Color-Black, #111013);
        font-size: 37px;
        font-style: normal;
        font-weight: 700;
        line-height: 105%;
    }

    .bg_color-french {
        background: rgb(243 244 254);
    }

    .task-details {
        border-top: 2px solid #9f9f9fa4;
        padding-top: 10px;
        margin-top: 10px;
    }

    #cssportal-grid {
        display: grid;
        grid-template-rows: repeat(3, 1fr);
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        width: 100%;
        height: 100%;
        aspect-ratio: 1 / 1;
        /* maintains square proportion */
        overflow: hidden;
    }

    #cssportal-grid div {
        position: relative;
    }

    #cssportal-grid img {
        width: 100%;
        /* height: 100%; */
        /* object-fit: cover; */
        display: block;
    }

    #div1 {
        width: 100%;
    }

    #div2 {
        width: 100%;
    }

    #div3 {
        width: 100%;
    }

    #div4 {
        width: 100%;
    }

    .img-fluid.object-fit-cover {
        object-fit: cover;
    }


    .challenge-section {
        padding-top: 50px;
    }

    .challenge-text {
        position: absolute;
        top: 100px;
        left: 33px;
        font-weight: 500;
    }

    .challenge-col {
        padding: 4rem 0;
    }

    .challenge-row img:hover {
        transform: scale(1.1);
    }


    .chana-img {
        padding: 2rem;
    }

    .distributor-img {
        width: 3vw;
    }

    .distributor-text {
        width: 3px;
    }

    .distributor-logo {
        display: flex;
        justify-content: space-around;
    }

    .fw-cls {
        font-weight: 500;
    }

    .visit-website {
        color: var(--Color-Black, #111013);
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: 105%;
        text-decoration: none;
    }

    .visit-website:hover {
        text-decoration: underline;
        color: var(--Color-Black, #111013);
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .challenge-col {
            padding: 1rem 0;
        }

        .challenge-text {
            position: absolute;
            top: 52px;
            left: 40px;
            font-weight: 500;
        }


    }


    @media only screen and (max-width: 600px) {
        section {
            padding: 30px 0;
        }

        .chana-img {
            padding: 0rem;
            margin-bottom: 1rem;
        }

        .distributor-img {
            width: 36px;
            padding-top: 20px;
        }

        .distributor-logo {
            text-align: center;
        }

        .content-section .content-title {
            font-size: 30px;
        }
    }
</style>

<main>
    <img src="{{ asset('client/casestudy/rajdhani/rajdhani-main-img.webp') }}" alt="rajdhani-main-img" class="img-fluid w-100 h-auto">
</main>

<section class="py-md-5 py-sm-2">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="content-title">Rajdhani Besan</h2>
                <p>
                    Rajdhani is a leading Indian food brand renowned for its premium quality products, including a wide range of flours, lentils, and spices. The brand has built a legacy of trust and excellence in Indian households. Recently, they launched a new Rajdhani Besan ad featuring prominent personalities Karan Johar and Ananya Pandey, highlighting their products' high quality and versatility.
                </p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="pb-2">
                    <h5>Objective</h5>
                    <p>
                        Rajdhani approached us to overhaul their outdated, generic website and revamp it with a modern, distributor-centric approach. The goal was to create a sleek, professional distributor portal that would cater to their B2B audience, emphasizing the brand’s commitment to quality and its wide distribution network.
                    </p>
                </div>
                <div class="container-fluid ps-0 pe-0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="task-details">
                                <h5 class="pt-3 fw-bold">Scope of Work</h5>
                                <p>UI/UX Design</p>
                                <p>Website Development</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="task-details">
                                <h5 class="pt-3 fw-bold">Duration</h5>
                                <p>Total Duration: 2 Months</p>
                                <p>Design Phase: 3 Weeks</p>
                                <p>Development Phase: 5 Weeks</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="task-details">
                                <h5 class="pt-3 fw-bold">Client</h5>
                                <p>Rajdhani Besan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="bg_color-french">
    <div class="container content-section">
        <div class="row pt-3">
            <div class="col-lg-5">
                <h6>Rajdhani</h6>
                <h3 class="content-title">
                    Plan of Action
                </h3>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
                <div class="pb-2">
                    <p>
                        The 12-week project for Rajdhani involved understanding distributor needs through brief calls and knowledge transfer, creating wireframes and visual mockups for mobile and desktop, and developing a distributor-centric website on Webflow. After rigorous testing, the site was launched, showcasing all products with USPs and integrating Rajdhani's brand legacy for distributors.
                    </p>
                </div>
            </div>

            <div class="col-lg-12">
                <img class="img-fluid w-100" src="{{ asset('client/casestudy/rajdhani/rajdhani-steps.webp') }}">
            </div>
        </div>
    </div>
</section>

<section class="py-3">
    <img src="{{ asset('client/casestudy/rajdhani/rajdhani-img-2.webp') }}" alt="rajdhani-img" class="img-fluid w-100 h-auto">
</section>


<section class="py-2">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h6>Branding</h6>
                <h4 class="content-title">
                    Brand Colors & Typo
                </h4>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
                <div class="pb-2">
                    <p>
                        With stakeholders’ approval, we introduced refined typography and brand colors that align with Rajdhani’s premium look and brand voice, creating a modern yet authentic visual identity.
                    </p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <img src="{{ asset('client/casestudy/rajdhani/color-img.webp') }}" alt="color-img" class="img-fluid w-100 h-100 ">
            </div>

            <div class="col-md-6">
                <img src="{{ asset('client/casestudy/rajdhani/glorich.webp') }}" alt="glorich" class="img-fluid w-100 h-100 ">
            </div>
        </div>

    </div>
</section>




<section class="challenge-section">
    <div class="container content-section">
        <div class="row g-2">
            <div class="col-lg-6">
                <h6>Problem Statement / Challenges</h6>
                <h3 class="content-title">
                    Key Challenges <br> Faced by Rajdhani
                </h3>
                <div class="row challenge-row px-3">
                    <div class="col-md-6 position-relative challenge-col">
                        <img src="{{ asset('client/casestudy/rajdhani/challenge-1.svg') }}" alt="challenge-1" class="img-fluid w-27 h-27">
                        <p class="challenge-text">Outdated and generic website with poor user experience</p>
                    </div>
                    <div class="col-md-6 position-relative challenge-col">
                        <img src="{{ asset('client/casestudy/rajdhani/challenge-2.svg') }}" alt="challenge-2" class="img-fluid w-27 h-27">
                        <p class="challenge-text">Weak online representation of brand legacy and USPs</p>
                    </div>
                    <div class="col-md-6 position-relative challenge-col">
                        <img src="{{ asset('client/casestudy/rajdhani/challenge-3.svg') }}" alt="challenge-3" class="img-fluid w-27 h-27">
                        <p class="challenge-text">Poor mobile optimization & Low engagement with distributors</p>
                    </div>
                    <div class="col-md-6 position-relative challenge-col">
                        <img src="{{ asset('client/casestudy/rajdhani/challenge-4.svg') }}" alt="challenge-4" class="img-fluid w-27 h-27">
                        <p class="challenge-text">Weak online representation of brand legacy and USPs</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-2"></div> -->
            <div class="col-lg-6">
                <img src="{{ asset('client/casestudy/rajdhani/Challenges-img.webp') }}" alt="Challenges-img" class="img-fluid w-100 h-100 ">
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container content-section">
        <div class="col-lg-12 chana-img">
            <img class="img-fluid w-100" src="{{ asset('client/casestudy/rajdhani/chana-img.webp') }}">
        </div>

        <div class="row">
            <div class="col-lg-5">
                <h6>Solution / Implementation</h6>
                <h3 class="content-title">
                    Distributor-centric design with easy navigation
                </h3>
            </div>
            <div class="col-lg-1 py-md-3"></div>
            <div class="col-lg-6 pt-3">
                <div class="pb-2 distributor-logo">
                    <div class="">
                        <img src="{{ asset('client/casestudy/rajdhani/better-org.svg') }}" alt="better-org" class="img-fluid distributor-img"> <br>
                        <small>
                            Better <br> Organized Pages
                        </small>
                    </div>
                    <div class="">
                        <img src="{{ asset('client/casestudy/rajdhani/quick-commerce.svg') }}" alt="quick-commerce" class="img-fluid distributor-img"> <br>
                        <small>Available <br> Across Quick Commerce</small>
                    </div>
                    <div class=" ">
                        <img src="{{ asset('client/casestudy/rajdhani/brand.svg') }}" alt="brand" class="img-fluid distributor-img"> <br>
                        <small>
                            Showing Karan & <br> Ananaya's Brand Presence
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-fluid w-100" src="{{ asset('client/casestudy/rajdhani/rajdhani-img-3.webp') }}">
            </div>
        </div>
    </div>
</section>


<section class="pt-lg-5 pt-md-4 pt-sm-2 pt-2">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h6>Solution / Implementation</h6>
                <h4 class="content-title">
                    Product Categorizations
                </h4>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
                <div class="pb-2">
                    <p class="fw-cls">
                        Rajdhani's products are categorized by type and packaging, making it easy for consumers to choose everyday items and for distributors to access bulk packs with detailed product info and USPs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-fluid w-100" src="{{ asset('client/casestudy/rajdhani/category.webp') }}">
            </div>
        </div>
    </div>
</section>

<section class="bg_color-french py-md-3 py-1">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h6>Results</h6>
                <h3 class="content-title">
                    Outcome
                </h3>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="pb-2">
                    <p>The revamped website successfully created a premium distributor-focused experience, improving accessibility, engagement, and product visibility. Distributors can now browse products easily, place inquiries, and connect with the brand seamlessly, all while enjoying a modern and responsive design.</p>
                    <a target="_blank" href="https://www.rajdhanifoods.com/" class="visit-website">Visit Website</a>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="p-0">
    <img class="img-fluid w-100" src="{{ asset('client/casestudy/rajdhani/rajdhani-main-img.webp') }}">
</section>

@endsection