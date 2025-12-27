@extends('client.layouts.app')
@section('content')
<style>
    .margin-section{
        background: #FDF2DD;
        margin-top: 160px;
        padding-bottom: 289px;

    }

    .margin-section .margin-section-nag{
        margin-top: -206px;
    }

    .bg_color-ozar {
        border-radius: 80px 80px 0px 0px;
background: #181B37;
margin-top: -60px;

    }

    .bg_color-ozar .margin-section-nag-main{
        margin-top: -206px;
    }

    .margin-section-color{
        background: #FDF2DD;
        
    }

        
        .quote-icon {
            font-size: 3rem;
            color: #FFD7BA;
            line-height: 1;
            margin-bottom: 1.5rem;
        }
        
        .testimonial-text p{
            color: #232226;
text-align: center;
font-style: normal;



        }
        
        .author-name {
            margin-top: 1rem;
            font-weight: 800;
        }


        .margin-section-color .margin-section-nag-main{
            margin-bottom: -270px;
        }

        .social-media-section{
            padding-top: 210px;
        }
        .ozar-slick-slider .slick-slide{
            padding: 0 10px;
        }


        .h-lg-100{
            height: -webkit-fill-available;
        }

        @media (max-width: 768px){
            .bg_color-ozar .margin-section-nag-main {
                margin-top: -60px;
            }

            .h-lg-100{
            height: auto !important;
        }

            .bg_color-ozar {
    border-radius: 10px 10px 0px 0px;
    background: #181B37;
                margin-top: -60px;
            }

            .margin-section {
    
    padding-bottom: 100px;
}

.margin-section-color .margin-section-nag-main {
    margin-bottom: -97px;
}

.social-media-section {
    padding-top: 60px;
}
        }
</style>
    <div class="case_study_area">
        <div class="main-hero-content-french ">
            <!-- <div class="bg-pattern"></div> -->
            <div class="hero-content-french pt-0">
                <div class="text-center mb-5">

                    <img class="img-fluid w-100 d-none d-lg-block d-md-block" src="{{ asset('client/images/ozar-std/Frame 1000014217.webp') }}"
                        alt="" />
                        <img class="img-fluid w-100 d-lg-none d-md-none d-block" src="{{ asset('client/images/ozar-std/mobbanner.webp') }}"
                        alt="" />

                    {{-- <h2 class="display-3 maintext text-white fw-bold mb-4">
                    French Factor
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <img class="img-fluid" src="" alt="" />
                </div>
            </div> --}}
                </div>
            </div>
        </div>

            <section class="pt-lg-3 pt-md-3 pt-0">
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2 class="content-title">Ozar Luxury</h2>
                            <p>
                                Ozar Luxury is a premium real estate platform specializing in ultra-luxury properties in locations like Goa, Dholera, Dubai, and Delhi NCR. It offers high-end apartments, villas, and exclusive homes with a focus on timeless elegance and legacy. The website highlights properties with detailed listings and includes client testimonials that emphasize trust and transparency.
                            </p>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <h5>Task</h5>
                                <p>
                                    Ozar Luxury tasked us with creating a luxury-focused brand identity, a sleek and intuitive website design, and an effective social media ad campaign to drive lead generation. We crafted an elegant visual identity reflecting their high-end real estate offerings, developed a user-friendly website to showcase properties, and launched targeted social media ads across platforms like Instagram and Facebook.
                                </p>
                            </div>
                            <div class="container-fluid ps-0 pe-0">
                                <div class="row">
                                    <div class="col-md-4">


                                        <div class="task-details">
                                            <h5 class="pt-3 fw-bold">Scope of Work</h5>
                                            <p>Branding</p>
                                            <p>UI/UX Design</p>
                                            <p>Development</p>
                                            <p>Marketing</p>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="task-details">
                                            <h5 class="pt-3 fw-bold">Duration</h5>
                                            <p>3 Months</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="task-details">
                                            <h5 class="pt-3 fw-bold">Client</h5>
                                            <p>Ozar Luxury</p>
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
                    <div class="row">
                        <div class="col-lg-5">
                            <h6>Ozar Luxury</h6>
                            <h3 class="content-title2">
                                Plan of Action
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    The 14-week project for Ozar Luxury involved creating a cohesive brand identity, designing an intuitive website, and developing the frontend and backend. After rigorous testing, we launched targeted marketing campaigns, including social media ads, to drive lead generation.  
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <!-- Handle different images for desktop and mobile -->
                            <img class="img-fluid w-100"
                                src="{{ asset('client/images/ozar-std/Frame 26892.webp') }}" />
                            {{-- <img class="img-fluid w-100 d-lg-none d-md-none d-block" src="{{ asset('storage/' . @$section->mobile_image) }}" alt="{{ $section->title }}" /> --}}
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <h6>Phase One:</h6>
                            <h3 class="content-title2">
                                Branding
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    The branding for Ozar Luxury encapsulated exclusivity and sophistication, with a refined logo, elegant color palette, and premium typography. These elements were strategically crafted to reflect the high-end real estate market and applied consistently across all platforms to build trust and resonate with affluent clients.  
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-4">
                            <img class="img-fluid h-lg-100 object-fit-cover" style="border-radius: 30px;" src="{{ asset('client/images/ozar-std/Frame 26895.webp') }}" />
                        </div>
                        <div class="col-lg-8 pt-lg-0 pt-md-0 pt-3">
                           
                                <img class="img-fluid"
                                    src="{{ asset('client/images/ozar-std/Frame 26896.webp') }}" alt="">
                              
                           

                        </div>

                    </div>
                    <div class="row pt-4">
                        <div class="col-lg-12">
                            <img class="img-fluid w-100" src="{{ asset('client/images/ozar-std/Frame 26897.webp') }}" />
                        </div>
                    </div>
                </div>
            </section>


            <section style="background: #FDF2DD;" class="margin-section">
                <div class="container content-section content-section-french">

                    <div class="row margin-section-nag">
                        <div class="col-lg-5">
                            <img class="img-fluid     h-lg-100 object-fit-cover" style="border-radius: 30px;" src="{{ asset('client/images/ozar-std/Rectangle 25952.webp') }}" />
                        </div>
                        <div class="col-lg-7 pt-lg-0 pt-md-0 pt-3">
                                <img class="img-fluid " src="{{ asset('client/images/ozar-std/Frame 1000014194.webp') }}" alt="">
                        </div>

                    </div>


                    <div class="row mt-5">
                        <div class="col-lg-5">
                            <h6>Phase Two</h6>
                            <h3 class="content-title2">
                                Website Design
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    The website design for Ozar Luxury targeted an audience aged 25-60+, both men and women, with a focus on mobile design for seamless browsing. We placed extra emphasis on high-quality imagery to highlight the luxury properties. The clean, intuitive layout, combined with responsive design, ensures easy navigation across devices.   
                                </p>
                            </div>
                        </div>
                    </div>
              
                </div>
            </section>

            <section class="bg_color-ozar pb-0">
                <div class="container">
                    <div class="row margin-section-nag-main">
                        <div class="col-lg-12">
                            <img class="img-fluid"
                                src="{{ asset('client/images/ozar-std/MacBook Pro 16_ - 3.webp') }}" />
                        </div>
                    </div>
                </div>
            </section>

            <section class="margin-section-color">
                <div class="testimonial-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="testimonial-text">
                                    <div class="quote-icon text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="53" viewBox="0 0 77 53" fill="none">
                                            <path d="M67.7878 0L69.8736 5.02287C63.5004 6.98583 58.6335 9.69934 55.2731 13.1634C52.0286 16.512 50.4063 20.0915 50.4063 23.902C50.4063 26.4423 51.3913 27.7124 53.3612 27.7124C54.6358 27.7124 56.2001 27.4237 58.0542 26.8464C59.9082 26.1536 61.8781 25.8072 63.9639 25.8072C67.9037 25.8072 71.0323 27.0196 73.3499 29.4444C75.7833 31.8693 77 34.9869 77 38.7974C77 42.9542 75.4936 46.3606 72.4808 49.0163C69.468 51.6721 65.5861 53 60.8352 53C55.1573 53 50.696 51.037 47.4515 47.1111C44.3228 43.1852 42.7585 37.7582 42.7585 30.8301C42.7585 23.2091 44.8442 16.8584 49.0158 11.7778C53.1874 6.58169 59.4447 2.65577 67.7878 0ZM24.8555 0L26.9413 5.02287C20.684 6.98583 15.8751 9.69934 12.5147 13.1634C9.15425 16.512 7.47404 20.0915 7.47404 23.902C7.47404 26.4423 8.45899 27.7124 10.4289 27.7124C11.7035 27.7124 13.2679 27.4237 15.1219 26.8464C16.9759 26.1536 19.0038 25.8072 21.2054 25.8072C25.1452 25.8072 28.2739 27.0196 30.5914 29.4444C32.909 31.8693 34.0677 34.9869 34.0677 38.7974C34.0677 42.9542 32.5613 46.3606 29.5485 49.0163C26.6516 51.6721 22.7697 53 17.9029 53C12.3409 53 7.93755 51.037 4.693 47.1111C1.56433 43.1852 0 37.7582 0 30.8301C0 23.2091 2.08578 16.8584 6.25734 11.7778C10.4289 6.58169 16.6283 2.65577 24.8555 0Z" fill="#FAE0AD"/>
                                          </svg>
                                    </div>
                                    <p class="mb-4">
                                        Hey guys, I had to share this one of our leads just raved about the website and visiting card you designed for us! They loved how premium everything looks. Honestly, it's been such a great conversation starter. We're getting so much positive feedback. Huge thanks to your team for nailing the vibe.
                                    </p>
                                    <p class="author-name">Madhav Lila</p>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-section-nag-main">
                            <div class="col-lg-12">
                                <img class="img-fluid" src="{{ asset('client/images/ozar-std/Group 1000014086.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="social-media-section">
                <div class="container content-section">
                    <div class="row mt-5">
                        <div class="col-lg-5">
                            <h6>Phase Three</h6>
                            <h3 class="content-title2">
                                Social Media
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    We focused on weekly lead generation for property sales using traffic campaigns. High-quality property visuals paired with clear calls-to-action were used in carousel and story formats to engage the audience and drive inquiries, keeping the brand visible and active in the market. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-lg-12">
                        <div class="ozar-slick-slider">
                            <div>
                                <img src="{{ asset('client/images/ozar-std/34.webp') }}" class="d-block w-100" alt="Image 1">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/image-3.webp') }}" class="d-block w-100" alt="Image 2">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/image-1.webp') }}" class="d-block w-100" alt="Image 3">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/image-3.webp') }}" class="d-block w-100" alt="Image 4">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/75.webp') }}" class="d-block w-100" alt="Image 5">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/image-4.webp') }}" class="d-block w-100" alt="Image 6">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/image-2.webp') }}" class="d-block w-100" alt="Image 7">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/57.webp') }}" class="d-block w-100" alt="Image 8">
                            </div>
                            <div>
                                <img src="{{ asset('client/images/ozar-std/114.webp') }}" class="d-block w-100" alt="Image 9">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <img class="img-fluid" src="{{ asset('client/images/ozar-std/Frame 1000014215.webp') }}" />
                        </div>
                        <div class="col-lg-7 pt-lg-0 pt-md-0 pt-3">
                                <img class="img-fluid h-lg-100" src="{{ asset('client/images/ozar-std/Frame 1000014216.webp') }}" style="border-radius: 30px;" alt="">
                        </div>
    
                    </div>
                </div>
            </section>

            <section>
              <div class="container content-section">
                <div class="row mt-5">
                    <div class="col-lg-5">
                        <h6>From Campaigns</h6>
                        <h3 class="content-title2">
                            Brand Growth
                        </h3>
                    </div>
                    <div class="col-lg-2">
                        <h6>Monthly Spent</h6>
                        <h3 class="content-title2">
                            ₹12,286
                        </h3>
                    </div>
                    <div class="col-lg-5">
                        <h6>Weekly Leads we’ve got</h6>
                        <h3 class="content-title2">
                            163
                        </h3>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <img class="img-fluid" src="{{ asset('client/images/ozar-std/image 38.webp') }}" />
                    </div>
                </div>
              </div>
            </section>
    </div>
@endsection
