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
    <img src="{{ asset('client/casestudy/sorbet/sorbet-banner.png') }}" alt="sorbet-banner" class="img-fluid w-100 h-auto">
</main>

<section class="py-md-5 py-sm-4">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="content-title">Sorbet & Co.</h2>
                <p>
                    Sorbet & Co. is a fashion jewelry brand that believes in offering delightful, stylish, and
                    elegant pieces that reflect personal expression and self-love. Founded by Vineeta R Kejriwal,
                    the brand infuses celestial inspiration with captivating elegance. Sorbet & Co. offers
                    affordable luxury with exquisite craftsmanship, trendsetting designs, and inclusive options for
                    all age groups, ensuring a joyful and luxurious shopping experience. Their collection is
                    designed to celebrate individuality and inner beauty, making each piece a perfect symbol of
                    self-love.
                </p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="pb-2">
                    <h5>Objective</h5>
                    <p>
                        The objective was to craft a distinctive brand identity for Sorbet & Co. and develop a
                        sleek, user-friendly website. The goal was to reflect the brand’s elegant, trendsetting
                        style while enhancing customer experience with a responsive design that showcases their
                        fashion jewelry collections.
                    </p>
                </div>
                <div class="container-fluid ps-0 pe-0">
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
                                <p>Total Duration: 1.5 Months</p>
                                <p>Branding Phase: 2 Weeks</p>
                                <p>UI/UX Phase: 2 Weeks</p>
                                <p>Development Phase: 3 Weeks</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="task-details">
                                <h5 class="pt-3 fw-bold">Client</h5>
                                <p>Sorbet & Co</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container">
    <div class="row g-3">
        <div class="col-lg-4">
            <img src="{{ asset('client/casestudy/sorbet/sorbet-color-1.png') }}" alt="sorbet-img-1" class="img-fluid w-100 h-100">
        </div>
        <div class="col-lg-4">
            <img src="{{ asset('client/casestudy/sorbet/sorbet-color-2.png') }}" alt="sorbet-img-2" class="img-fluid w-100 h-100">
        </div>
        <div class="col-lg-4">
            <img src="{{ asset('client/casestudy/sorbet/sorbet-color-3.png') }}" alt="sorbet-img-3" class="img-fluid w-100 h-100">
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
                    <p>
                        The moodboards feature vibrant, bold colors like neon pink, yellow, and green, combined with
                        playful typography and modern jewelry designs. The imagery is youthful, energetic, and
                        minimalist, focusing on product details in colorful, abstract settings. Soft gradients and
                        graphic patterns add a trendy. This aesthetic appeals to Gen Z, emphasizing individuality,
                        fun, and creativity.
                    </p>
                </div>
            </div>

            <div class="col-lg-12 py-2">
                <img src="{{ asset('client/casestudy/sorbet/three-card-img.png') }}" alt="sorbet-moodboard" class="img-fluid w-100 h-100">
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
                    <p>
                        The proposed idea focused on creating a modern, sleek brand identity and a user-friendly
                        website that reflects Sorbet & Co.’s premium, trend-forward jewelry. The website design
                        emphasized elegance and functionality, with a clean aesthetic that showcased the jewelry
                        collections effectively. The vision was aligned with the brand’s essence while meeting the
                        stakeholder’s expectations for a visually appealing, intuitive online presence.
                    </p>
                </div>
            </div>

            <div class="row g-2 py-2">
                <div class="col-md-4">
                    <img src="{{ asset('client/casestudy/sorbet/Theme1.png') }}" alt="sorbet-moodboard" class="img-fluid w-100 h-100">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('client/casestudy/sorbet/theme25.png') }}" alt="sorbet-moodboard" class="img-fluid w-100 h-100">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('client/casestudy/sorbet/Theme1.png') }}" alt="sorbet-moodboard" class="img-fluid w-100 h-100">
                </div>
            </div>
        </div>
    </div>
</section>




<section class="container content-section py-3">

    <!-- <h6>Rajdhani</h6> -->
    <h2 class="content-title text-center mx-auto py-3">
        Aligning Logo Design with
        Stakeholder and Brand Vision
    </h2>
    <img src="{{ asset('client/casestudy/sorbet/big-img.png') }}" alt="brand-1" class="img-fluid w-100 h-auto">

    <img src="{{ asset('client/casestudy/sorbet/big-img-2.png') }}" alt="brand-2" class="img-fluid w-100 h-auto py-4">
</section>



<section class="container content-section py-3">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
            <video src="{{ asset('client/casestudy/sorbet/video-2.mp4') }}" autoplay loop muted class="img-fluid w-100 h-auto"></video>
        </div>

        <div class="col-lg-4 col-md-4 col-12 d-none d-md-block d-sm-none">
            <video src="{{ asset('client/casestudy/sorbet/video-1.mp4') }}" autoplay loop muted class="img-fluid w-100 h-auto"></video>
        </div>

        <div class="col-lg-4 col-md-4 col-12 d-none d-md-block d-sm-none">
            <video src="{{ asset('client/casestudy/sorbet/video-3.mp4') }}" autoplay loop muted class="img-fluid w-100 h-auto"></video>
        </div>
    </div>
</section>



<section class="py-2">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <h4 class="content-title">
                    Modern & Sleek <br> Design
                </h4>
            </div>
            <!-- <div class="col-lg-2"></div> -->
            <div class="col-lg-7">
                <div class="pb-2">
                    <p>
                        The modern and sleek design of the Sorbet & Co. website aligns with the brand's
                        sophisticated style, providing a seamless and intuitive user experience. The design
                        effectively highlights the jewelry collections while maintaining a clean, elegant aesthetic
                        that resonates with both the brand vision and stakeholder expectations.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <img src="{{ asset('client/casestudy/sorbet/big-img1.png') }}" alt="color-img" class="img-fluid w-100 h-100 ">
            </div>
        </div>

    </div>
</section>





<section class="py-5">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-5">
                <!-- <h6>Rajdhani</h6> -->
                <h3 class="content-title">
                    Focusing on more <br> Conversions Tactics
                </h3>
                <h6>Check Out More on the website</h6>
            </div>
            <!-- <div class="col-lg-2"></div> -->
            <div class="col-lg-7">
                <div class="pb-2">
                    <p>
                        The moodboards feature vibrant, bold colors like neon pink, yellow, and green, combined with playful typography and modern jewelry designs. The imagery is youthful, energetic, and minimalist, focusing on product details in colorful, abstract settings. Soft gradients and graphic patterns add a trendy. This aesthetic appeals to Gen Z, emphasizing individuality, fun, and creativity.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('client/casestudy/sorbet/detail-img.png') }}" alt="color-img" class="img-fluid w-100 h-100 ">
            </div>
        </div>
    </div>
</section>



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
                    <p>The newly designed brand identity and website for Sorbet & Co. successfully capture the brand’s elegant and trendy essence. The cohesive design aligns with stakeholder vision and brand goals, offering a seamless, user-friendly experience while beautifully showcasing the jewelry collections and enhancing customer engagement.</p>
                    <a target="_blank" href="https://sorbetco.com/" class="visit-website">Visit Website</a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection