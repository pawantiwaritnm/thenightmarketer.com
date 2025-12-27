@extends('client.layouts.app')
@section('content')
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.detail-img{
    
}


.content-section .content-title {
    color: var(--Color-Black, #111013);
    font-size: 37px;
    font-style: normal;
    font-weight: 700;
    line-height: 105%;
}



.content-text{
 text-align: justify;   
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

.light-green{
    background: #FEF9DA;
}

.task-details{
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

.challenge-col{
    padding: 4rem 0;
}

.challenge-row img:hover{
    transform: scale(1.1);
}


.chana-img{
    padding: 2rem;
}

.distributor-img{
    width: 3vw;
}

.distributor-text{
    width: 3px;
}

.distributor-logo{
    display: flex;
    justify-content: space-around;
}

.fw-cls{
    font-weight: 500;
}

.visit-website{
    color: var(--Color-Black, #111013);
    font-size: 24px;
    font-style: normal;
    font-weight: 600;
    line-height: 105%;
    text-decoration: none;
}

.visit-website:hover{
    text-decoration: underline;
    color: var(--Color-Black, #111013);
    transform: scale(1.1);
}

@media (max-width: 768px) {
    .challenge-col{
        padding: 1rem 0;
    }

    .challenge-text{
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

    .distributor-logo{
       text-align: center;
    }

    .content-section .content-title {
        font-size: 30px;
    }
}

</style>
<main>
    <img src="{{ asset('client/casestudy/grean-leaf/green-leaf-banner.webp') }}" alt="green-brand" class="img-fluid w-100 h-auto">
</main>

<section class="py-md-5 py-sm-4">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="content-title">Greenleaf</h2>
                <p>
                    Greenleaf has emerged as a leader in the agricultural commodities sector. With a focus on
                    excellence and innovation, the brand serves a diverse clientele, including farmers, investors,
                    and industry professionals. Greenleaf aims to empower its audience with insights and knowledge,
                    helping them navigate complex market landscapes.
                </p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="pb-2">
                    <h5>Objective</h5>
                    <p>
                        To create a strong brand identity and a modern, informative website that reflects
                        Greenleaf's authority in the agricultural commodities sector while providing an intuitive
                        experience for all user segments.
                    </p>
                </div>
                <div class="container-fluid ps-0 pe-0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="task-details">
                                <h5 class="pt-3 fw-bold">Scope of Work</h5>
                                <p>Branding and Visual Identity</p>
                                <p>Website UI/UX Design</p>
                                <p>Development of an informative, responsive website</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="task-details">
                                <h5 class="pt-3 fw-bold">Duration</h5>
                                <p>Total Duration: 2 Months</p>
                                <p>Branding Phase: 2 Weeks</p>
                                <p>UI/UX Phase: 2 Weeks</p>
                                <p>Development Phase: 4 Weeks</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="task-details">
                                <h5 class="pt-3 fw-bold">Client</h5>
                                <p>gleaf.in</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-3">
    <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('client/casestudy/grean-leaf/green-img-1.webp') }}" alt="green-brand"
                class="img-fluid w-100 h-auto d-none d-md-block">
            <img src="{{ asset('client/casestudy/grean-leaf/square-img-1.webp') }}" alt="green-leaf-2"
                class="img-fluid w-100 h-100  d-block d-md-none">
        </div>
    </div>
</section>


<section class="container">
    <div class="row g-5">
        <div class="col-lg-6">
            <img src="{{ asset('client/casestudy/grean-leaf/green-sugarcane.webp') }}" alt="green-brand" class="img-fluid w-100 h-100">
        </div>

        <div class="col-lg-6">
            <img src="{{ asset('client/casestudy/grean-leaf/green-bowl.webp') }}" alt="green-brand" class="img-fluid w-100 h-100">
        </div>
    </div>
</section>



<section class="py-5">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <!-- <h6>Rajdhani</h6> -->
                <h3 class="content-title">
                    Mood boards for <br> the Brand
                </h3>
            </div>
            <!-- <div class="col-lg-2"></div> -->
            <div class="col-lg-7">
                <div class="pb-2">
                    <p class="text-justify">
                        The mood boards reflect Greenleaf's growth, expertise, and trust. Using green tones, earthy
                        neutrals, and accent gold, combined with clean typography and imagery of agriculture and
                        markets, the visuals create a professional, approachable, and empowering brand identity that
                        guided the website and overall design.
                    </p>
                </div>
            </div>

            <div class="col-lg-12 py-2">
                <img src="{{ asset('client/casestudy/grean-leaf/green-brand.webp') }}" alt="green-brand" class="img-fluid w-100 h-100">
            </div>
        </div>
    </div>
</section>


<section class="py-3 py-sm-1">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <!-- <h6>Rajdhani</h6> -->
                <h3 class="content-title">
                    Idea presented to <br> Stakeholders
                </h3>
            </div>
            <!-- <div class="col-lg-2"></div> -->
            <div class="col-lg-7">
                <div class="pb-2">
                    <p class="content-text">
                        The logo and overall visual representation resonate strongly with the tagline "Unlock the
                        World of Commodities." The design must emphasize the use of green hues to reflect the
                        brand's name and environmental commitment, while creatively integrating a leaf and key motif
                        to symbolize unlocking the potential within the agricultural commodities market.
                    </p>
                </div>
            </div>

            <div class="row g-2 py-2">
                <div class="col-md-4">
                    <img src="{{ asset('client/casestudy/grean-leaf/green-leaf-1.webp') }}" alt="green-leaf-1" class="img-fluid w-100 h-100">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('client/casestudy/grean-leaf/green-leaf-2.webp') }}" alt="green-leaf-2" class="img-fluid w-100 h-100">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('client/casestudy/grean-leaf/green-leaf-3.webp') }}" alt="green-leaf-3" class="img-fluid w-100 h-100">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container content-section py-3">

    <!-- <h6>Rajdhani</h6> -->
    <h2 class="content-title py-3">
        Design <br> Requirements
    </h2>
    <div class="row g-4 py-2">
        <div class="col-md-4">
            <div class="image-container">
                <img src="{{ asset('client/casestudy/grean-leaf/square-img-2.webp') }}" alt="green-leaf-1" class="img-fluid w-100 h-100">
                <h3 class="mt-2 ">Color Scheme</h3>
                <p class="content-text">The logo should predominantly feature green hues, reflecting the brand's name and its association
                    with agriculture and sustainability.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="image-container">
                <img src="{{ asset('client/casestudy/grean-leaf/square-img-1.webp') }}" alt="green-leaf-2" class="img-fluid w-100 h-100">
                <h3 class="mt-2">Motifs</h3>
                <p class="content-text">Integrate a leaf and a key within the logo design. The leaf represents the agricultural focus of
                    Greenleaf, while the key symbolizes the unlocking of market insights and opportunities.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="image-container">
                <img src="{{ asset('client/casestudy/grean-leaf/square-img-3.webp') }}" alt="green-leaf-3" class="img-fluid w-100 h-100">
                <h3 class="mt-2">Connection with Tagline</h3>
                <p class="content-text"> The design must naturally incorporate the tagline "Unlock the World of Commodities" in a way that
                    the visuals and text complement each other, reinforcing the brand’s mission and expertise.</p>
            </div>
        </div>
    </div>

</section>


<div class="container pt-3 pb-0">
    <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('client/casestudy/grean-leaf/circular-std-img.webp') }}" alt="green-brand" class="img-fluid w-100 h-auto">
        </div>
    </div>
</div>

<div class="container pb-0">
    <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('client/casestudy/grean-leaf/green-color.webp') }}" alt="green-brand" class="img-fluid w-100 h-auto">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('client/casestudy/grean-leaf/green-card.webp') }}" alt="green-brand" class="img-fluid w-100 h-auto">
        </div>
    </div>
</div>


<section class="light-green py-5">
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
                    <p class="content-text">The newly designed brand identity and website for Greenleaf successfully capture the brand's
                        expertise and empowering essence. The cohesive design aligns with stakeholder vision and
                        brand goals, offering a seamless, user-friendly experience while effectively showcasing
                        services, resources, and market insights, enhancing engagement among farmers, investors, and
                        industry professionals.</p>
                    <a href="https://www.gleaf.in" target="_blank" class="visit-website">Visit Website</a>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection