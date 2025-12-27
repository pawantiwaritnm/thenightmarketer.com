@extends('client.layouts.app')
@section('content')
<style>
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

    .ai-team  {
       height: auto !important;
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
        background-color: #212026;
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
        border-radius: 10px;
        text-align: center;
        padding: 1.5rem;
        height: 397px;
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
        margin-bottom: 5px; }

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
        font-weight: 600;   }

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
    font-size: 22px ;
}
    }


    @media (max-width: 767px) {

        .filters {
            width: 220%;
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
        margin-top: -10px ;
        position: relative;
    }

.filters {
    display: flex ;
    width: 1005px;
}

.industries-section {
    margin-top: -21px;
    padding-bottom: 0px;
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


    /* -----------------------New-cards--------------------------  */

    .bg-black-newcard{
    background-color: #24232B;
      color: #fff;
    }


        h2 {
      font-weight: 600;
    }

    .about-new-service {
      background-color: transparent;
      padding: 20px;
      display: flex;
      align-items: flex-start;
      gap: 10px;
      border-radius: 10px;
      transition: 0.3s;
    }

    .about-new-service:hover {
      background-color: rgba(255, 255, 255, 0.05);
    }

    /* .about-new-service .icon-box {
      min-width: 50px;
      min-height: 50px;
      background-color: #2b2c34;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
    } */

    .about-new-service .icon-box img {
      width: 55px;
      height: auto;
    }

    .content-about-card{
        line-height: 24px;
    }

    .about-new-service .content-about-card h5 {
        font-size: 20px;
        margin-bottom: 6px;
        font-weight: 300;
    }

    .about-new-service .content-about-card p {
      font-size: 14px;
      margin-bottom: 0;
      opacity: 0.85;
      color:#FFFFFF99;
      font-weight:200;
    }

    .learn-more {
      color: #F0CF22;
      font-size: 14px;
      text-decoration: none;
      display: inline-block;
      margin-top: 6px;
    }

    .btn-yellow-new-card{
        background: #f0cf22;
        font-size: 14px;
        font-style: normal;
        line-height: 22.478px;
        background-color: var(--yellow-accent);
        color: #1a1a1a !important;
        padding: 0.5rem 1.5rem !important;
        border-radius: 50px;
        font-weight: 600;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-yellow-new-card:hover{
        background: #f0cf22;
        color: #1a1a1a !important;
    }

    /* .btn-yellow {
      background-color: #ffd60a;
      border: none;
      color: #000;
      font-weight: bold;
      padding: 10px 25px;
      border-radius: 25px;
      margin-top: 30px;
    } */

    @media (max-width: 767px) {
      .about-new-service {
        flex-direction: row;
      }

      .img-fluid-new-d {
            width: 100% !important;
            height: auto !important;
            object-fit: contain;
      }

        .about-us-silder .slick-slide {
        padding: 0;
    }
    .ai-team img{
        width: 60px !important;
        height: 60px !important;
    }

     .ai-team  {
       height: 150px !important;
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
                                Delivering innovative designs <br><span class="highlight"> that captivate and engage <br> your audience.</span>
                            </h1>


                        </div>




                        <!-- <div class="col-lg-8 col-12 mx-auto mt-0 mt-md-0 mt-lg-5">
                            <p class="text-white">We are a dynamic digital agency based in New Delhi, India, specializing in
                                design, development, and marketing expertise. Our dedicated team of talented and motivated
                                digital strategists lives and breathes the digital space.</p>
                        </div> -->

                        <!-- Call to Action Button -->
                        <a href="{{ route('contact-us') }}" class="btn hero-btn mt-3">Get a Quote</a>

                        <!-- Partner Section -->

                    </div>
                </div>
            </div>
        </div>

        <div class="about-us-silder-design mt-5 d-none d-md-block d-lg-block">
            <div> <img src="{{ asset('client/images/about-us-new-img0.png') }}" alt="about-us-slider" class="d-block w-100"></div>
            <div> <img src="{{ asset('client/images/about-us-new-img1.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <!-- <div> <img src="{{ asset('client/images/about-us-new-img2.png') }}" alt="about-us-slider" class="d-block w-100">
            </div> -->
            <div> <img src="{{ asset('client/images/about-us-new-img3.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <!-- <div> <img src="{{ asset('client/images/about-us-new-img4.png') }}" alt="about-us-slider" class="d-block w-100">
            </div> -->
            <div> <img src="{{ asset('client/images/about-us-new-img5.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/about-us-new-img6.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/about-us-new-img7.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/about-us-new-img8.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/about-us-new-img9.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/about-us-new-img10.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
            <div> <img src="{{ asset('client/images/about-us-new-img11.png') }}" alt="about-us-slider" class="d-block w-100">
            </div>
        </div>

        <div class="about-us-silder-design mt-5 d-block d-md-none d-lg-none">
            <div> <img src="{{ asset('client/images/about-us-mb-n0.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d"></div>
            <div> <img src="{{ asset('client/images/about-us-mb-n1.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <!-- <div> <img src="{{ asset('client/images/about-us-mb-n2.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div> -->
            <div> <img src="{{ asset('client/images/about-us-mb-n3.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <!-- <div> <img src="{{ asset('client/images/about-us-mb-n4.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div> -->
            <div> <img src="{{ asset('client/images/about-us-mb-n5.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <div> <img src="{{ asset('client/images/about-us-mb-n6.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <div> <img src="{{ asset('client/images/about-us-mb-n7.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <div> <img src="{{ asset('client/images/about-us-mb-n8.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <div> <img src="{{ asset('client/images/about-us-mb-n9.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <div> <img src="{{ asset('client/images/about-us-mb-n10.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
            <div> <img src="{{ asset('client/images/about-us-mb-n11.png') }}" alt="about-us-slider" class="img-fluid img-fluid-new-d">
            </div>
        </div>
    </section>


<!-- -------------------------------------New-CARDS--------------------------  -->


<section class="py-5 bg-black-newcard text-white text-center">
  <div class="container">
    <h2 class="mb-5 team-headline">Design Services</h2>
    <div class="row g-4 justify-content-center">
      <!-- Service 1 -->
      <div class="col-md-5">
        <div class="about-new-service text-start">
          <div class="icon-box">
            <img src="{{ asset('client/images/new-card-a-icon0.png') }}" alt="UI/UX Icon">
          </div>
          <div class="content-about-card">
            <h5>UI/UX Design</h5>
            <p>If your website traffic is high but conversions are low, CRO can help increase your success.</p>
            <a href="https://thenightmarketer.com/ui-design-services" class="learn-more">Learn More →</a>
          </div>
        </div>
      </div>
      <!-- Service 2 -->
      <div class="col-md-5">
        <div class="about-new-service text-start">
          <div class="icon-box">
            <img src="{{ asset('client/images/new-card-a-icon1.png') }}" alt="Branding Icon">
          </div>
          <div class="content-about-card">
            <h5>Branding</h5>
            <p>CRO can reduce bounce rates by improving the user experience and keeping visitors engaged.</p>
            <a href="https://thenightmarketer.com/branding-services" class="learn-more">Learn More →</a>
          </div>
        </div>
      </div>
      <!-- Service 3 -->
      <div class="col-md-5">
        <div class="about-new-service text-start">
          <div class="icon-box">
            <img src="{{ asset('client/images/new-card-a-icon2.png') }}" alt="Graphic Icon">
          </div>
          <div class="content-about-card">
            <h5>Graphic Design</h5>
            <p>If your website traffic is high but conversions are low, CRO can help increase your success.</p>
            <a href="https://thenightmarketer.com/graphic-design-services" class="learn-more">Learn More →</a>
          </div>
        </div>
      </div>
      <!-- Service 4 -->
      <div class="col-md-5">
        <div class="about-new-service text-start">
          <div class="icon-box">
            <img src="{{ asset('client/images/new-card-a-icon3.png') }}" alt="CRO Icon">
          </div>
          <div class="content-about-card">
            <h5>Conversion Rate Optimization</h5>
            <p>CRO can reduce bounce rates by improving the user experience and keeping visitors engaged.</p>
            <a href="https://thenightmarketer.com/conversion-rate-optimization" class="learn-more">Learn More →</a>
          </div>
        </div>
      </div>
    </div>

    <a href="{{ route('contact-us') }}" class="btn btn-yellow-new-card my-4">Get a Quote</a>
    <!-- <button class="btn btn-yellow">Get a Quote</button> -->
  </div>
</section>



<!-- ----------------------------------------End-card-------------------------------------  -->











    <section class="team-section pt-5 bg-black text-white">

        <div class="container mt-md-2">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-9 mx-auto text-center mb-4 ">

                    <h3 class="team-headline">Our nicest work in front of you</h3>
                </div>
            </div>
        </div>
        <div data-js="hero-demo">
            <div class="ui-group overflow-auto">
         
                <div class="filters button-group js-radio-button-group device-type">
                    <button class="button is-checked" data-filter="*">All</button>
                    @foreach ($caseStudy as $tab => $studies)
                        <button class="button" data-filter=".cat-{{ Str::slug($tab) }}">{{ $tab }}</button>
                    @endforeach
                </div>
            </div>

      
            <ul class="grid">
            
                 <li class="element-item cat-all cat-uiux cat-branding cat-development" data-category="cat-all cat-uiux cat-branding">
                    <a href="{{ route('french-factor') }}" class="portfolio-card">
                        <img src="{{ asset('client/images/homeimg/frenchcaseimg.webp') }}" alt="Figma" class="img-fluid"></a>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
                            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
                        </div>
                        <h4 class="case-study-section-text">Building stories for a rich perfume brand</h4>
                        <p class="case-study-section-text-p">A premium perfume brand based in USA with, a masterpiece of design and development, reflects the brand's luxurious ethos with its seamless animations and refined aesthetics.</p>
                    
                </li>

<li class="element-item cat-all cat-uiux cat-branding cat-development" data-category="cat-all cat-uiux cat-branding">
    <a href="{{ route('ozar-luxury') }}" class="portfolio-card">
        <img src="{{ asset('client/images/homeimg/ozarcaseimg.webp') }}" alt="Figma" class="img-fluid"></a>
        <div class="d-flex flex-wrap gap-2">
            <a href="javascript:void(0)" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand Identity</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
        </div>
        <h4 class="case-study-section-text">Revamping a real-estate brand based in Goa</h4>
        <p class="case-study-section-text-p">A brand helping you find your dream home with stunning villas, stylish apartments, and prime land worldwide.</p>
    
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
        </div>
    </section>



    <section class="team-section mt-0 pt-5 bg-black text-white">
        <div class="container ">

            <div class="row">
                <div class="col-md-7 mx-auto text-center mb-2 ">
                    <h5 class="h5">Our Tools</h5>
                    <h3 class="team-headline">Behind the Creative Designs</h3>
                </div>
            </div>

            <!-- Team Members -->
            <div class="row mt-3 design-icon-new">
    <!-- Card 1 -->
    <div class="col-6 col-md-6 col-lg-3 mb-4">
        <div class="team-card ai-team">
            <img class="border-radius-logo" src="{{ asset('client/images/design-icon-0.svg') }}" alt="Figma">
            <h5>Figma</h5>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="col-6 col-md-6 col-lg-3 mb-4">
        <div class="team-card ai-team">
            <img class="border-radius-logo" src="{{ asset('client/images/design-icon-1.svg') }}" alt="Miro">
            <h5>Miro App</h5>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="col-6 col-md-6 col-lg-3 mb-4">
        <div class="team-card ai-team">
            <img class="border-radius-logo" src="{{ asset('client/images/design-icon-2.svg') }}" alt="Adobe Creative">
            <h5>Adobe Creative</h5>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="col-6 col-md-6 col-lg-3 mb-4">
        <div class="team-card ai-team">
            <img class="border-radius-logo" src="{{ asset('client/images/design-icon-3.svg') }}" alt="Canva">
            <h5>Canva</h5>
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
