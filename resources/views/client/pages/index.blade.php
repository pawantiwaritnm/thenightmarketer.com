@extends('client.layouts.app')
@section('content')
    <style>
        .right-bottom-img {
            border-bottom: 1px solid #ffffff5c;
            border-right: 1px solid #ffffff5c;
            padding: 35px 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 98px;
        }

        /* .right-bottom-img img {
                width: 83%;
            } */

        /*.right-bottom-img:nth-child(6) {
            border-right: none;
        }*/
        .bd-right-0{
            border-right: 0;
        }
        .bd-bottom-0{
            border-bottom: 0;
        }
        .tabs_logo {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .tabs_logo .right-bottom-img {
            width: 12%;
        }
        .border-bottom-hide:last-child>* {
            border-bottom: none;
        }

        .border-bottom-hide {
            border-bottom:none;
        }

        .border-right-hide {
            border-right: none;
        }

        .testimonial-section .testimonial-image img {
            width: 75px;
            height: auto;
        }

        .footer .footer-address i {
            padding: 5px 10px 8px 10px !important;
        }
        .last_row {
            justify-content: center;
        }
        /*.border-bottom-hide:last-child>* {
            border-bottom: none;
        }*/
        .tabs-container .content a{
            text-align: center;
        }
        .last_row .col-lg-2:last-child {
            border-right: 0;
        }
        @media (max-width: 767px) {
            .right-bottom-img:nth-child(3n) {
                border-right: hidden;
            }

            .right-bottom-img:last-child {
            border-right: 0;
        }

            .border-right-hide {
                border-right: 1px solid #ffffff5c;
            }

            .bd-right-0{
            border-right: 1px solid #ffffff5c;
        }
        .bd-bottom-0{
            border-bottom: 1px solid #ffffff5c;
        }

            .tabs_logo .right-bottom-img {
                width: 33%;
            }

            .border-bottom-hide:last-child>* {
                border-bottom: 1px solid #ffffff5c;
            }

            .right-bottom-img img {
                width: 87%;
            }

            .right-bottom-img {

                padding: 12px 5px !important;
            }
        }


        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }


        .section-philosophy img {
            border-radius: 18px;
        }

        /*
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
                padding: 12px;
            }

            .form-section .form-control::placeholder {
                color: #FFF;
                font-size: 15px;
                font-style: normal;
                font-weight: 500;
                line-height: normal;
                text-transform: uppercase;
                opacity: 0.5;

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
            } */


            .headline-section-container .scrolling-words {
            display: flex;
            flex-direction: column;
            transition: transform 0.5s ease-in-out;
            position: relative;
            text-align: center;
        }

        .headline-section-container .word {
            display: block;
            height: 1.2em;
            /* color: #84E296; */
            white-space: nowrap;
        }

        .headline-section-container .word-container {
            display: inline-block;
            height: 1.2em;
            overflow: hidden;
            vertical-align: top;
            width: auto;
        }

        /* ----------------------------new-card-----------------------------  */

    .cwpc-card {
        background-color: #2A2832;
        color: #ffffff;
        border-radius: 30px;
        padding: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        border-bottom: 10px solid #F0CF22;
        height: 100%;
        min-height: 300px;
    }

    .cwpc-card-content {
      flex: 1;
    }

    .cwpc-card-content h2 {
      background: #ffffff;
      color: #141318;
      display: inline-block;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 20px;
      margin-bottom: 20px;
      font-weight: 500;
      
    }
   .bg-yellow {
      background: #F0CF22 !important;
     
    }

    .cwpc-card-content ul {
      list-style: none;
      padding: 0;
      margin: 0 0 20px 0;
    }

    .cwpc-card-content ul li {
      margin-bottom: 10px;
      position: relative;
      padding-left: 20px;
      font-size: 14px;
    }

    .cwpc-card-content ul li::before {
        content: "●";
        color: #F0CF22;
        position: absolute;
        left: 0;
        font-size: 22px;
        margin: auto;
        top: -7px;
    }

    .cwpc-see-more-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: transparent;;
      color: #fff;
      /* padding: 10px 18px; */
      border-radius: 50px;
      /* font-weight: bold; */
      text-decoration: none;
      width: fit-content;
      margin-top: 10px;
           transition: transform 0.4s ease;
    }

    .cwpc-see-more-btn span {
      font-size: 18px;
    }

     .cwpc-see-more-btn:hover .bg-yellow-btn-sm{
          transform: rotate(45deg);
     }

    .cwpc-card-image img {
      width: 220px;
      height: auto;
    }
    .cwpc-card-light {
  background-color: #fff;
  color: #1E1D24;
  min-height: 300px;
}

.cwpc-see-more-btn span {
      background-color: #fff;
      color: #000;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      width: 40px;
      height: 40px;
      font-size: 16px;
      transition: transform 0.4s ease;
    }
    .bg-arrow {
      background-color: #F0CF22 !important;
      color: #000 !important;   
    }

   .cwpc-see-more-btn:hover .bg-arrow {
    transform: rotate(45deg);
}

    .bg-see-more{
        color:#141318 !important;
    }
    @media (max-width: 576px) {
      .cwpc-card {
        flex-direction: column;
        text-align: left;
        padding: 24px;
        align-items: flex-start;
      }
      .cwpc-card-image img {
        margin-top: 20px;
      }

      .cwpc-card-light-sm-block-bg{
        background-color:#2A2832;
        color:#fff;
      }
      .bg-yellow-sm{
         background-color:#fff !important;
      }
      .bg-see-more-sm{
        color:#fff !important;
      }
      .cwpc-card-light-sm-bg-ch{
        background-color:#fff !important;
        color:#000 !important;
      }

      .bg-yellow-sm-ch{
         background-color: #F0CF22 !important;
         
      }

      .bg-yellow-btn-sm{
        background-color: #F0CF22 !important;
        color:#000 !important;
      }

      .cwpc-see-more-btn-color{
        color:#000 !important;
      }


      .cwpc-card-light-sm-bg-ch ul li a {
        color: #000 !important;
      }

      .cwpc-card-light-sm-block-bg ul li a{
        color: #ffffffff !important;
      }
      

    }

    .cs-btn{
      background: linear-gradient(to bottom, rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.15) 100%), radial-gradient(at top center, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.40) 120%) #989898;
 background-blend-mode: multiply,multiply;  !important;
      color:#fff !important;
      transition: all 0.1s ease-in-out;
      font-size: 14x;
    }

    .cs-btn:hover{
      background:
        linear-gradient(
            to bottom,
            rgba(255,255,255,0.05) 0%,
            rgba(0,0,0,0.25) 100%
        ),
        radial-gradient(
            at top center,
            rgba(255,255,255,0.25) 0%,
            rgba(0,0,0,0.55) 120%
        )
        #7d7d7d !important;

    
      color: #fff !important;
    }


    </style>
    <section class="bg-black hero-section-bgimg" loading="lazy" >
        <!-- Container for the main content -->
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

                                <img loading="lazy" src="{{ asset('client/images/homeimg/Group 1000014114.webp') }}" alt="Profile 1"
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
                                <!-- <span class="highlight">Development-Driven </span> -->
                                <span class="word-container">
                                  <span class="highlight scrolling-words" id="scrollingWords"></span>
                                </span> 
                                <br >
                                Solutions for a Strong Digital <br class="d-none d-lg-block d-md-block"> Foundation
                            </h1>

                        </div>


                        {{-- 

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
                        </div> --}}

                        <!-- Call to Action Button -->
                        <a href="{{ route('contact-us') }}" class="btn hero-btn  mt-lg-5 mt-md-5 mt-5">Start a Project</a>

                        <!-- Partner Section -->

                    </div>
                </div>
            </div>
        </div>
        <div class="partner-section mt-5">
            <div class="container">
                <div class="row align-items-center justify-content-center d-none d-lg-flex d-xl-flex d-md-flex">
                    <div class="col-md-12 text-center partner-badge-main">
                        <img style="width: 800px; margin-top: 3rem;" loading="lazy"
                            src="{{ asset('client/images/homeimg/icons brands badges.webp') }}" alt="Shopify Partner"
                            class="img-fluid">
                    </div>
                </div>
                <div class="row align-items-center justify-content-center d-flex d-lg-none d-xl-none d-md-none">
                    <div class="col-6 text-lg-left text-md-left text-center">
                        <img loading="lazy" src="{{ asset('client/images/homeimg/clutchchap.webp') }}" alt="Shopify Partner"
                            class="partner-badge mb-2 img-fluid">
                    </div>
                    <div class="col-6 text-lg-end text-md-end text-center">
                        <img src="{{ asset('client/images/homeimg/clutchaw.webp') }}" alt="Shopify Partner" loading="lazy"
                            class="partner-badge mb-2 img-fluid">
                    </div>
                    <div class="col-6 text-center">
                        <img src="{{ asset('client/images/homeimg/shopiftp.webp') }}" alt="Shopify Partner" loading="lazy"
                            class="partner-badge-main mb-2 img-fluid">
                    </div>
                    <div class="col-6 text-center">
                        <img src="{{ asset('client/images/homeimg/klaviyo-icon.webp') }}" alt="Shopify Partner" loading="lazy"
                            class="partner-badge-main mb-2 img-fluid">
                    </div>


                </div>
                {{-- <div class="row">
                    <div class="col-md-2 mx-auto text-center">
                        <p class="partner-text">We’re among in 140 Shopify<br> partners in India</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>




    {{-- <div class="scroll-section">
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


    </div> --}}
<!-- ------------------------------------------New-Card------------------------------  -->

       <section class="bg-black">
   <div class="container py-5">
    <div class="row g-5">

    <div class="col-lg-8 col-md-8 mx-auto">
                    <div class="let-the-magic-happen">
                        <span class="let-the-magic-happen-span">Design, Development, Marketing, Automation </span>Where
                        Magic Begins
                    </div>

                    <div class="mt-5 text-center">
                        <a href="{{ route('contact-us') }}" class="btn let-the-magic-happen-btn">Spark Your Journey</a>
                    </div>

                    <!-- <img loading="lazy" src="{{ asset('client/images/homeimg/hedingflost1.svg') }}" alt="Figma"
                        class="img-fluid floating heading-float1">
                    <img loading="lazy" src="{{ asset('client/images/homeimg/hedingflost2.svg') }}" alt="Figma"
                        class="img-fluid floating heading-float2 d-none d-lg-block d-xl-block d-md-block"> -->
                </div>
        
      <div class="col-md-6 ">
        <div class="cwpc-card">
          <div class="cwpc-card-content">
            <h2>Creative Designs</h2>
            <ul>
              <li><a href="https://thenightmarketer.com/service/ui-design-services" class="text-white text-decoration-none">UI/UX Design</a></li>
              <li><a href="https://thenightmarketer.com/service/branding-services" class="text-white text-decoration-none" >Branding</a> </li>
              <li><a href="https://thenightmarketer.com/service/graphic-design-services" class="text-white text-decoration-none">Graphic Design</a></li>
              <li><a href="https://thenightmarketer.com/service/conversion-rate-optimization" class="text-white text-decoration-none">Conversion Rate Optimization</a></li>
            </ul>
            <a href="https://thenightmarketer.com/design-service" class="cwpc-see-more-btn">
              <span class="bg-yellow-btn-sm"><i class="bi bi-arrow-up-right"></i></span> See More
            </a>
          </div>
          <div class="cwpc-card-image d-none d-sm-block">
            <img src="client/images/homeimg/new-card-img0.png" alt="Design Illustration">
          </div>
        </div>
      </div>

      <div class="col-md-6 ">
        <div class="cwpc-card cwpc-card-light">
          <div class="cwpc-card-content">
            <h2 class="bg-yellow">Web Development</h2>
            <ul>
              <li><a href="https://thenightmarketer.com/service/shopify-development-company" class="text-black text-decoration-none">Shopify</a>/ <a href="https://thenightmarketer.com/service/wordpress-development" class="text-black text-decoration-none">WordPress</a></li>
              <li>Webflow/ Wix/ Squarespace</li>
              <li><a href="https://thenightmarketer.com/service/mobile-app-development" class="text-black text-decoration-none">App Development</a></li>
              <li><a href="https://thenightmarketer.com/service/custom-frontend-and-backend" class="text-black text-decoration-none">Custom Development</a></li>
            </ul>
            <a href="#" class="cwpc-see-more-btn bg-see-more">
              <span class="bg-arrow"><i class="bi bi-arrow-up-right"></i></span> See More
            </a>
          </div>
          <div class="cwpc-card-image d-none d-sm-block">
            <img src="client/images/homeimg/new-card-img1.png" alt="Design Illustration">
          </div>
        </div>
      </div>

      <div class="col-md-6 ">
        <div class="cwpc-card cwpc-card-light cwpc-card-light-sm-block-bg">
          <div class="cwpc-card-content">
            <h2 class="bg-yellow bg-yellow-sm">Performance Marketing</h2>
            <ul>
              <li> <a href="https://thenightmarketer.com/service/email-marketing" class="text-black text-decoration-none">Email Marketing</a></li>
              <li> <a href="https://thenightmarketer.com/service/social-media-marketing" class="text-black text-decoration-none"> Social Media Marketing</a></li>
              <li> <a href="https://thenightmarketer.com/service/search-engine-optimization" class="text-black text-decoration-none"> SEOs</a></li>
              
            </ul>
            <a href="#" class="cwpc-see-more-btn bg-see-more bg-see-more-sm">
              <span class="bg-arrow"><i class="bi bi-arrow-up-right"></i></span> See More
            </a>
          </div>
          <div class="cwpc-card-image d-none d-sm-block">
            <img src="client/images/homeimg/new-card-img2.png" alt="Design Illustration">
          </div>
        </div>
      </div>

      <div class="col-md-6 ">
        <div class="cwpc-card cwpc-card-light-sm-bg-ch">
          <div class="cwpc-card-content">
            <h2 class="bg-yellow-sm-ch">Cloud & AI Automations</h2>
            <ul>
              <li> <a href="https://thenightmarketer.com/service/ai-agent" class="text-white text-decoration-none"> AI Agents</a></li>
              <li> <a href="https://thenightmarketer.com/service/cloud" class="text-white text-decoration-none"> Cloud Setup & Migrations</a></li>
              <li> <a href="https://thenightmarketer.com/service/email-automation" class="text-white text-decoration-none">eCommerce Automations</a></li>
              
            </ul>
            <a href="#" class="cwpc-see-more-btn cwpc-see-more-btn-color">
              <span class="bg-yellow-btn-sm"><i class="bi bi-arrow-up-right"></i></span> See More
            </a>
          </div>
          <div class="cwpc-card-image d-none d-sm-block">
            <img src="client/images/homeimg/new-card-img3.png" alt="Design Illustration">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



    <!-- <section class="bg-black">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8 col-md-8 mx-auto">
                    <div class="let-the-magic-happen">
                        <span class="let-the-magic-happen-span">Design, Development, Marketing, Automation </span>Where
                        Magic Begins
                    </div>

                    <div class="mt-5 text-center">
                        <a href="{{ route('contact-us') }}" class="btn let-the-magic-happen-btn">Spark Your Journey</a>
                    </div>

                    <img loading="lazy" src="{{ asset('client/images/homeimg/hedingflost1.svg') }}" alt="Figma"
                        class="img-fluid floating heading-float1">
                    <img loading="lazy" src="{{ asset('client/images/homeimg/hedingflost2.svg') }}" alt="Figma"
                        class="img-fluid floating heading-float2 d-none d-lg-block d-xl-block d-md-block">
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 py-lg-0 py-md-0 py-4">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 text-center pe-lg-5 position-relative">
                    <img loading="lazy" src="{{ asset('client/images/homeimg/section1img.webp') }}" alt="Figma" class="img-fluid">
                    <img loading="lazy" class="section1-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014036.png') }}" alt="Figma">
                    <img loading="lazy" class="section2-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014037.png') }}" alt="Figma">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 ps-lg-5 align-content-center">
                    <h3 class="let-the-magic-section-text">Turning Ideas into <span class="span-highlight"> Stunning
                            Designs</span></h3>
                    <p class="let-the-magic-section-text-p">We turn ideas into visually appealing, user-friendly designs.
                        Whether we're creating websites, smart UI/UX, or engaging branding, our <span
                            class="span-highlight">designs</span> make every interaction feel effortless.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">UI/UX
                            Designs</a>
                        <a href="https://thenightmarketer.com/graphic-design-services"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Graphic
                            Designs</a>
                        <a href="https://thenightmarketer.com/branding-services"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Brand
                            Identity</a>
                        <a href="https://thenightmarketer.com/conversion-rate-optimization"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Conversion
                            Rate
                            Optimizations</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-5 mb-5 py-lg-0 py-md-0 py-4">
            <div class="row flex-column-reverse flex-lg-row flex-md-row">

                <div class="col-lg-7 col-md-7 col-sm-12 pe-lg-5 align-content-center">
                    <h3 class="let-the-magic-section-text"><span class="span-highlight">Development </span> Delivers</h3>
                    <p class="let-the-magic-section-text-p">We create credible and innovative <span
                            class="span-highlight">websites</span> and <span class="span-highlight">apps</span>. Our
                        solutions are scalable, secure, and personalized to your specific requirements; they evolve
                        alongside your organization.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="https://thenightmarketer.com/shopify-development-company"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Shopify</a>
                        <a href="https://thenightmarketer.com/wordpress-development"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">WordPress</a>
                        <a href="https://thenightmarketer.com/mobile-app-development"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Mobile
                            Apps</a>
                        <a href="https://thenightmarketer.com/custom-frontend-and-backend"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Custom
                            Website</a>
                        <a href="https://thenightmarketer.com/custom-frontend-and-backend"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">ERP &
                            CRM</a>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-12 ps-lg-5 text-center position-relative">
                    <img loading="lazy" class="section3-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014034.png') }}" alt="Figma">
                    <img loading="lazy" class="section4-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014035.png') }}" alt="Figma">
                    <img loading="lazy" src="{{ asset('client/images/homeimg/section2img.webp') }}" alt="Figma" class="img-fluid">
                </div>
            </div>
        </div>


        <div class="container mt-5  py-lg-0 py-md-0 py-4">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 pe-lg-5 text-center position-relative">
                    <img loading="lazy" class="section5-img-float floating" src="{{ asset('client/images/homeimg/image.png') }}"
                        alt="Strategies">
                    <img loading="lazy" class="section6-img-float floating" src="{{ asset('client/images/homeimg/image (1).png') }}"
                        alt="Strategies">
                    <img loading="lazy" class="section7-img-float floating"
                        src="{{ asset('client/images/homeimg/Group 1000014104.png') }}" alt="Strategies">
                    <img loading="lazy" src="{{ asset('client/images/homeimg/section3img.webp') }}" loading="lazy" alt="Figma" class="img-fluid">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 ps-lg-5 align-content-center">
                    <h3 class="let-the-magic-section-text"><span class="span-highlight">Strategies </span> That Drive
                        Engagement
                    </h3>
                    <p class="let-the-magic-section-text-p">We blend creativity and analytics to construct genuinely
                        efficient <span class="span-highlight">marketing</span> strategies. From SEO to social media, we
                        help your company reach your target audience.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="https://thenightmarketer.com/google-ads-services"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Google
                            Ads</a>
                        <a href="https://thenightmarketer.com/google-ads-services"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">SEO</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Lead
                            Management</a>
                        <a href="https://thenightmarketer.com/social-media-marketing"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2">Social
                            Media</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2 d-block d-lg-block  d-md-none">Whatsapp
                            Marketing</a>
                        <a href="javascript:void(0)"
                            class="btn let-the-magic-section-btn btn-dark rounded-pill px-4 py-2 d-block d-lg-block d-md-none">Performance Marketing</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="bg-gray-sec section-philosophy">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <h3 class="our-philosophy-text">Winning Stories</h3>
                    <p class="our-philosophy-text-p col-lg-9 mx-auto">Our <span class="span-highlight">case studies</span>
                        illustrate effective solutions and triumphs,
                        showcasing how we've helped clients overcome obstacles and achieve growth through cutting-edge
                        design, development, and marketing techniques.</p>
                </div>
                <div class="col-sm-12 d-lg-none d-md-none d-block text-center">
                    {{-- <div class="rotate-box d-none d-lg-block d-md-block">
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
                    </div> --}}
                    <div>
                        <a href="{{ route('contact-us') }}" class="nav-link book-call-btn mt-0 mb-0"
                            style="display: inline;">Spark Your Journey</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5 position-relative">
                    <a href="{{ route('green-leaf') }}">
                        <img loading="lazy" src="{{ asset('client/images/homeimg/green-leaf-2.webp') }}" alt="Figma"
                            class="img-fluid">
                    </a>
                    <div class="case-study-section-tag">
                        <p>Case Study</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand Identity</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
                    </div>
                    <h4 class="case-study-section-text mt-lg-2 mt-md-2 mt-1">Building Greenleaf’s Authority Through a Modern Web Presence</h4>
                    <p class="case-study-section-text-p mt-lg-2 mt-md-2 mt-1">To create a strong brand identity and a modern, informative website that reflects Greenleaf’s authority in the agricultural commodities sector while providing an intuitive experience for all user segments.</p>
                    <a href="{{ route('green-leaf') }}" class="cs-btn text-decoration-none text-white bg-dark bg-gradient p-2 rounded-pill">
                       Read More
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5 position-relative">
                    <a href="{{ route('fuel-your-body') }}">
                        <img loading="lazy" src="{{ asset('client/images/homeimg/fuel-your-body.webp') }}" alt="Figma"
                            class="img-fluid">
                    </a>
                    <div class="case-study-section-tag">
                        <p>Case Study</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">CRO Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Marketing</a>
                    </div>
                    <h4 class="case-study-section-text mt-lg-2 mt-md-2 mt-1">How We Transformed Fuel Your Body's Subscription Flow & Grew Subscribers by 2.3x in 5 Months</h4>
                    <p class="case-study-section-text-p mt-lg-2 mt-md-2 mt-1">Revamped Fuel Your Body's subscription meal platform with a complete website audit, redesigned user flow with tiered meal plans, and developed the mobile-first site on Shopify with email marketing implementation.</p>
                     <a href="{{ route('fuel-your-body') }}" class=" cs-btn text-decoration-none text-white bg-dark bg-gradient p-2 rounded-pill">
                        Read More
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5 position-relative">
                    <a href="{{ route('rajdhani') }}">
                        <img loading="lazy" src="{{ asset('client/images/homeimg/rajdhani-image.webp') }}" alt="Figma"
                            class="img-fluid">
                    </a>
                    <div class="case-study-section-tag">
                        <p>Case Study</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
                        <!-- <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Marketing</a> -->
                    </div>
                    <h4 class="case-study-section-text mt-lg-2 mt-md-2 mt-1">Revamping Rajdhani’s Digital Presence for the Modern Distributor</h4>
                    <p class="case-study-section-text-p mt-lg-2 mt-md-2 mt-1">The goal was to create a sleek, professional distributor website that would cater to their B2B audience, emphasizing the brand’s commitment to quality and its wide distribution network.</p>
                     <a href="{{ route('rajdhani') }}" class=" cs-btn text-decoration-none text-white bg-dark bg-gradient p-2 rounded-pill">
                       Read More
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 mt-5 position-relative">
                    <a href="{{ route('french-factor') }}">
                        <img loading="lazy" src="{{ asset('client/images/homeimg/frenchcaseimg.webp') }}" alt="Figma"
                            class="img-fluid">
                    </a>
                    <div class="case-study-section-tag">
                        <p>Case Study</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX
                            Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>
                    </div>
                    <h4 class="case-study-section-text mt-lg-2 mt-md-2 mt-1">Building stories for a rich perfume brand</h4>
                    <p class="case-study-section-text-p mt-lg-2 mt-md-2 mt-1">A premium perfume brand based in USA with, a
                        masterpiece of design and development, reflects the brand's luxurious ethos with its seamless
                        animations and refined aesthetics.</p>
                         <a href="{{ route('french-factor') }}" class=" cs-btn text-decoration-none text-white bg-dark bg-gradient p-2 rounded-pill">
                        Read More
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5 position-relative">
                    <a href="{{ route('ozar-luxury') }}">
                        <img loading="lazy" src="{{ asset('client/images/homeimg/ozarcaseimg.webp') }}" alt="Figma"
                            class="img-fluid">
                    </a>
                    <div class="case-study-section-tag">
                        <p>Case Study</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="javascript:void(0)"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand identity</a>
                        <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX
                            Design</a>
                        <a href="#"
                            class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>
                    </div>
                    <h4 class="case-study-section-text mt-lg-2 mt-md-2 mt-1">Revamping a real-estate brand based in Goa
                    </h4>
                    <p class="case-study-section-text-p mt-lg-2 mt-md-2 mt-1">A brand helping you find your dream home with
                        stunning villas, stylish apartments, and prime land worldwide. </p>
                        <a href="{{ route('ozar-luxury') }}" class=" cs-btn text-decoration-none text-white bg-dark bg-gradient p-2 rounded-pill">
                        Read More
                    </a>
                </div>
                @foreach ($caseStudies as $study)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-5 position-relative">
                        <a href="{{ route('case-study-details', $study->slug) }}"><img loading="lazy"
                                src="{{ asset('storage/' . $study->featured_image) }}" alt="{{ $study->title }}"
                                class="img-fluid"></a>

                        <div class="case-study-section-tag">
                            <p>Case Study</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2 mt-4">
                            @foreach ($study->tags as $tag)
                                <a href="javascript:void(0)"
                                    class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h4 class="case-study-section-text mt-lg-2 mt-md-2 mt-1">{{ $study->title }}</h4>
                        <p class="case-study-section-text-p mt-lg-2 mt-md-2 mt-1">
                            {{ Str::limit($study->summary, 150) }}
                        </p>
                    </div>
                @endforeach
                {{-- <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                    <img src="{{ asset('client/images/homeimg/rajyogcaseimg.png') }}" alt="Figma" class="img-fluid">
            <div class="d-flex flex-wrap gap-2 mt-4">
                <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX
                    Design</a>
                <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>
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
                <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>
            </div>
            <h4 class="case-study-section-text mt-lg-3 mt-md-3 mt-2">French Factor</h4>
            <p class="case-study-section-text-p mt-lg-3 mt-md-3 mt-2">A premium perfume brand based in USA with, a
                masterpiece of
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
                <div class="col-lg-5 col-md-7 col-sm-12 mx-auto">
                    <h3 class="growth-text">Sit tight, We’ve got your growth</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="growth-slider">
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img loading="lazy" src="{{ asset('client/images/homeimg/growth1.png') }}"
                                        alt="Weekly Lead Growth"></div>
                                <div class="number">125+</div>
                                <div class="title">Weekly Lead Growth</div>
                                <p class="description">Consistent and robust lead generation to fuel your business growth,
                                    helping you connect with more potential customers every week.</p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img loading="lazy" src="{{ asset('client/images/homeimg/growth2.png') }}"
                                        alt="Monthly Sales"></div>
                                <div class="number">2.2X</div>
                                <div class="title">Monthly Sales</div>
                                <p class="description">Achieve accelerated sales growth with proven strategies that double
                                    your revenue month-over-month.</p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img loading="lazy" src="{{ asset('client/images/homeimg/growth3.png') }}"
                                        alt="Organic Traffic"></div>
                                <div class="number">120%</div>
                                <div class="title">Organic Traffic</div>
                                <p class="description">Boost your website's visibility with increased organic traffic
                                    through SEO-driven results and content optimization.</p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="card">
                                <div class="logo"><img loading="lazy" src="{{ asset('client/images/homeimg/growth4.png') }}"
                                        alt="Brand Recognition"></div>
                                <div class="number">1200%</div>
                                <div class="title">Brand Recognition</div>
                                <p class="description">Elevate your brand's visibility and reputation, making a lasting
                                    impression on your audience across multiple channels.</p>
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
                <div class="col-lg-9 col-md-9 col-sm-12 mx-auto mb-3">
                    <h3 class="we-excel-text ">We excel in all industries,<span class="span-highlight"> backed by over 10
                            years of expertise.</span></h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">


                    <div class="tabs-container">
                        {{-- <div class="tab-arrow left-arrow" onclick="scrollTabs('left')">&#8249;</div> --}}


                        <div class="tab active" onclick="changeTab(0)">All</div>
                        <div class="tab" onclick="changeTab(1)">FMCG</div>
                        <div class="tab" onclick="changeTab(2)">Fashion & Decor</div>
                        <div class="tab" onclick="changeTab(3)">Drinks & Skincare</div>
                        <div class="tab" onclick="changeTab(4)">Restaurants & Real Estate</div>
                        <div class="tab" onclick="changeTab(5)">Tech</div>
                        <div class="tab" onclick="changeTab(6)">Travel</div>
                        <div class="tab" onclick="changeTab(7)">Law & Education</div>
                        <div class="tab" onclick="changeTab(8)">CRMs & ERPs</div>


                        {{-- <div class="tab-arrow right-arrow" onclick="scrollTabs('right')">&#8250;</div> --}}
                    </div>

                    <div class="content">
                        <div id="tabContent0" style="display: block;">
                            <div class="tabs_logo">
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  class="text-center" href="https://www.nutriseed.co.uk/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/NUTRISEED.svg" alt="NUTRISEED">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.jaquar.com/en/luxury-bath-tub">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/jaquar.svg" alt="jaquar">
                                    </a>
                                </div>    
                                <!-- <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://maritimemadness.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/marine-time-madness.svg" alt="maritime madness">
                                    </a>
                                </div> -->
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.naaginsauce.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Naagin01.svg" alt="Naagin">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.rajdhanifoods.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/rajdhani.svg" alt="rajdhani">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://coffeeza.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Coffeeza.svg" alt="coffeeza">
                                    </a>
                                </div>
                   
                                <div class="right-bottom-img ">
                                    <a target="_blank" class="text-center"  href="https://frenchfactor.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/french-factor.svg" alt="french-factor">
                                    </a>
                                </div>


                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://eatfyb.ca/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/fuel-your-body.svg" alt="fuel-your-body">
                                    </a>
                                </div>
                             
                        
                                <div class="right-bottom-img bd-right-0  ">
                                    <a target="_blank" class="text-center"  href="https://pincodebykunalkapur.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/pincode.svg" alt="pincode">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-left-0">
                                    <a target="_blank" class="text-center"  href="https://www.boultaudio.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/boult.svg" alt="boult">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://tattooloverscare.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/kgO5L3Fqf3JXVS7r9Yef1dbDPyqjmUOJ7iYANKt2.svg" alt="tattolovercare">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.spreadhome.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Spread-Home.svg" alt="Spread-Home">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://thedrchoice.com/">
                                        <img class="img-fluid" loading="lazy"src="https://thenightmarketer.com/storage/client/logos/eB8MizTO3qSc31XkX9I7bfTe2tcyzRsVPQi3NUhh.svg" alt="drchoice">
                                    </a>
                                </div>
                                
                                <div class="right-bottom-img">
                                    <a href="https://nack.life/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/6ftvPltRGfvRjmTQGeDRTCFxbXm5SYljsxcvEe3B.png" alt="Nack"
                                        class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.startup-movers.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/NAV25qtfihaJugg4yoWvU2o9BDSSK5zpZNVoFQQ9.svg" alt="startup-movers">
                                    </a>
                                </div>
                                <div class="right-bottom-img"> 
                                    <a target="_blank" class="text-center"  href="https://thetribekids.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Tribe-kids01.svg" alt="thetribekids">
                                    </a>
                                </div>
                                
                                <div class="right-bottom-img   bd-right-0"> 
                                    <a target="_blank" class="text-center"  href="https://secondaid.co.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Secondaid-logo-final01.svg" alt="Second Aid">
                                    </a>
                                </div>
                                <div class="right-bottom-img "> 
                                    <a target="_blank" class="text-center"  href="https://www.johnpride.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/John-pride.svg" alt="John Pride">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://wiscon.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/FeKIPyMuMWghq7uHfssDvUuJKPPM9HqwzSSFWc28.svg" alt="wiscon">
                                    </a>
                                </div>
                                <div class="right-bottom-img"> 
                                    <a target="_blank" class="text-center"  href="https://manzuriselect.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Manzuri01.svg" alt="Manzuri">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center" 
                                        href="https://ozarluxury.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/ozarluxury.svg" alt="ozar luxury">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a href="https://thegoldenweddingfair.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/golden-wedding-fair.svg" alt="The Golden Wedding Fair" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.digibuggy.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/digibuggy.svg" alt="digi buggy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a href="https://evisadubai.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/evisadubai.svg" alt="eVisaDubai"
                                    class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <!-- <div class="right-bottom-img ">
                                    <a target="_blank" class="text-center"  href="https://alsowise.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/alsowise.svg" alt="alsowise">
                                    </a>
                                </div> -->

                                <div class="right-bottom-img bd-right-0">
                                    <a target="_blank" class="text-center"  href="https://rierp.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/rajyog.svg" alt="rierp">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://sorbetco.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Sorbet.svg" alt="Sorbet">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://eurumme.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/eurumme.svg" alt="eurumme">
                                    </a>
                                </div>
                                <!-- <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/LeadNests.svg" alt="LeadNests">
                                    </a>
                                </div> -->
                                <div class="right-bottom-img">
                                    <a  class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/nava.svg" alt="NAVA">
                                    </a>
                                </div>
                                <!-- <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://eurumme.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/palooza.svg" alt="palooza">
                                    </a>
                                </div> -->
                                <div class="right-bottom-img">
                                    <a  class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Raftaar.svg" alt="raftaar">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://samastha.co.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/samastha.svg" alt="samastha">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Scoffmeals.svg" alt="scoffmeals">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://sierasky.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Siera.svg" alt="siera">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-right-0 ">
                                    <a class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Tomorrows.svg" alt="tomorrow">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0 ">
                                    <a target="_blank" class="text-center"  href="https://ashacity.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/asha-city.svg" alt="ashacity">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0"> 
                                    <a target="_blank" class="text-center"  href="https://farmerr.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Farmerr01.svg" alt="Farmerr">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0 bd-right-0">
                                    <a target="_blank" class="text-center"  href="https://ruchoks.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Ruchoks01.svg" alt="Ruchoks">
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div id="tabContent1" style="display: none;">
                            <div class="tabs_logo">
                                <div class="right-bottom-img">
                                    <a href="https://www.fleurons.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Fleurons01.svg" alt="Fleurons" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a href="https://ruchoks.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Ruchoks01.svg" alt="Ruchoks" class="img-fluid" loading="lazy">
                                    </a>
                                </div>

                                <div class="right-bottom-img"> 
                                    <a href="https://www.dibha.com" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Dibha01.svg" alt="Dibha" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a href="https://www.greenchickchop.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Greenchickchop01.svg" alt="Green Chick Chop" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://eatfyb.ca/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/fuel-your-body.svg" alt="fuel-your-body">
                                    </a>
                                </div>

                                <div class="right-bottom-img">
                                    <a 
                                    class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Scoffmeals.svg" alt="scoffmeals">
                                    </a>
                                </div>

                                

                                <div class="right-bottom-img">
                                    <a href="https://farmerr.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Farmerr01.svg" alt="Farmerr" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img  bd-right-0">
                                    <a href="https://www.readytoeat.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Fazlani01.svg" alt="Fazlani" class="img-fluid" loading="lazy">
                                    </a>
                                </div>

                                <!-- <div class="right-bottom-img bd-bottom-0 ">
                                    <a target="_blank" class="text-center"  href="https://maritimemadness.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/marine-time-madness.svg" alt="maritime madness">
                                    </a>
                                </div> -->
                       
                                <div class="right-bottom-img  bd-bottom-0 ">
                                    <a target="_blank" class="text-center"  href="https://www.rajdhanifoods.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/rajdhani.svg" alt="rajdhani">
                                    </a>
                                </div>
                     
                                <div class="right-bottom-img bd-bottom-0">  
                                    <a href="https://secondaid.co.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Secondaid-logo-final01.svg" alt="Second Aid" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">   
                                    <a href="https://www.shasnthegame.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Shasn01.svg" alt="Shasn" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://auraafood.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Oc2feqiDnMEfJcdbW8uX5eKhp1BE2fbDpjT84VzR.svg" alt="AuraaFoods" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://manzuriselect.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Manzuri01.svg" alt="Manzuri" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                
                                <div class="right-bottom-img bd-bottom-0 bd-right-0">
                                    <a href="https://thewickandco.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/SQ1NMPK3NlimQO7hHaskLxX9f5YH9YaMCrnZAXnk.svg" alt="Wick & Co" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="tabContent2" style="display: none;">
                            <div class="tabs_logo">

                                <div class="right-bottom-img">
                                    <a href="https://www.johnpride.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/John-pride.svg" alt="John Pride" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a href="https://juniorfolk.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/hNm6Xzz7cev6A41EgudnGC9DrABl4Oj9HP7N24Oi.svg" alt="Junior Folk" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a href="https://www.vidhisinghania.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Vidhi-Singhania.svg" alt="Vidhi Singhania" class="img-fluid" loading="lazy">
                                    </a>
                                </div>

                                <div class="right-bottom-img">
                                    <a href="https://chhayamehrotra.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Chhaya.svg" alt="Chhaya Mehrotra" class="img-fluid" loading="lazy">
                                    </a>
                                </div>

                                <div class="right-bottom-img">
                                    <a href="https://inka.co.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/inka.svg" alt="Inka" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img">
                                    <a href="https://www.spreadhome.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Spread-Home.svg" alt="Spread Home" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                      
                                <div class="right-bottom-img">
                                    <a href="https://www.jaquar.com/en/luxury-bath-tub" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/jaquar.svg" alt="Jaquar" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-right-0">
                                    <a href="https://eurumme.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/eurumme.svg" alt="Eurumme" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://www.altr.nyc/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/altr.svg" alt="Alter Diamonds" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://frenchfactor.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/french-factor.svg" alt="French Factor" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://sorbetco.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Sorbet.svg" alt="Sorbet" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://www.vistafashions.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/vista.svg" alt="Vista Furnishing" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://thegoldenweddingfair.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/golden-wedding-fair.svg" alt="The Golden Wedding Fair" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://samaywatch.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/bZNkLURPFRNpvNDJ0z6u96guPhOIPZspD5tWH5TR.svg" alt="Samay" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a href="https://shopnadi.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/g826Iqqc19metxOuGnIOZDO5JuwynmNOEQH1Gh7l.svg" alt="Shop nadi" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0 bd-right-0"> 
                                    <a href="https://thetribekids.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Tribe-kids01.svg" alt="Tribe Kids" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0 bd-right-0 ">
                                    <a class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Tomorrows.svg" alt="tomorrow">
                                    </a>
                                </div>
                                {{-- <div class="col-lg-2 col-md-2 col-6 right-bottom-img border-right-hide"><a href="https://frenchfactor.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/french-factor.svg" alt="French Factor"
                                    class="img-fluid" loading="lazy"></a></div>

                                    <div class="col-lg-2 col-md-2 col-6 right-bottom-img border-right-hide"><a href="https://sorbetco.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/Sorbet.svg" alt="Sorbet"
                                        class="img-fluid" loading="lazy"></a></div>


                                        <div class="col-lg-2 col-md-2 col-6 right-bottom-img border-right-hide"><a href="https://www.vistafashions.com/" target="_blank" class="text-center" ><img
                                            src="https://thenightmarketer.com/storage/client/logos/vista.svg" alt="Vista Furnishing"
                                            class="img-fluid" loading="lazy"></a></div> --}}
                            </div>
                        </div>

                        <div id="tabContent3" style="display: none;">

                            <div class="tabs_logo">

                                <div class="right-bottom-img"> <a href="" target="_blank" class="text-center" ><img src="https://thenightmarketer.com/storage/client/logos/ahika.svg"
                                    alt="Ahika" class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img"> <a href="https://coffeeza.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/Coffeeza.svg" alt="Coffeeza"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img"> <a href="https://ohcha.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/ohcha.svg" alt="Ohcha"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img"><a href="https://www.polkapop.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/polkapop.svg" alt="Polka Pop"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img"><a href="https://www.beanlycoffee.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/jd919blFDk4xc8xIPgfIrhvZbQwUmk071O5wX714.svg" alt="Beanly"
                                    class="img-fluid" loading="lazy"></a></div>

                                    <div class="right-bottom-img"><a href="https://nack.life/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/6ftvPltRGfvRjmTQGeDRTCFxbXm5SYljsxcvEe3B.png" alt="Nack"
                                        class="img-fluid" loading="lazy"></a></div>
            

                                <div class="right-bottom-img"> <a href="https://organity.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/Organity.svg" alt="Organity"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-right-0"> <a href="https://thedrchoice.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/eB8MizTO3qSc31XkX9I7bfTe2tcyzRsVPQi3NUhh.svg" alt="Dr. Choice"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-bottom-0"><a href="https://qurist.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/qurist.svg" alt="Qurist"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-bottom-0"><a href="https://www.nutriseed.co.uk/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/NUTRISEED.svg" alt="Nutriseed"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-bottom-0"><a href="https://www.timetravellingmilkman.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/milkman.svg" alt="Time Travelling Milkman"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-bottom-0"><a href="https://tattooloverscare.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/kgO5L3Fqf3JXVS7r9Yef1dbDPyqjmUOJ7iYANKt2.svg" alt="Tatto Lover Care"
                                        class="img-fluid" loading="lazy"></a></div>
                            </div>
                        </div>
                        <div id="tabContent4" style="display: none;">

                            <div class="tabs_logo">
                                <div class="right-bottom-img "><a href="https://bluebookhotels.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/bluebookhotels.svg" alt="Bluebook"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img "><a href="https://pincodebykunalkapur.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/pincode.svg" alt="Pincode"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img "><a href="https://kibana.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/kibana.svg" alt="Kibana"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img "><a href="https://ruhestays.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/ruhestays.svg" alt="Ruhe Stays"
                                    class="img-fluid" loading="lazy"></a></div>
                                    <div class="right-bottom-img "><a href="https://ozarluxury.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/ozarluxury.svg" alt="Ozar Luxury"
                                        class="img-fluid" loading="lazy"></a></div>
    
                                    <div class="right-bottom-img  "><a href="https://zingafs.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/R35JIhP3Q2vUnbn7u9pegvqnP6Dna2CpXmzJPstl.svg" alt="ZingaFS"
                                        class="img-fluid" loading="lazy"></a></div>

                                        <div class="right-bottom-img  ">
                                    <a target="_blank" class="text-center"  href="https://ashacity.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/asha-city.svg" alt="ashacity">
                                    </a>
                                </div>
                                <div class="right-bottom-img  bd-right-0">
                                    <a  class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/nava.svg" alt="NAVA">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0">
                                    <a target="_blank" class="text-center"  href="https://sierasky.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Siera.svg" alt="siera">
                                    </a>
                                </div>
                                <div class="right-bottom-img bd-bottom-0 bd-right-0">
                                    <a class="text-center"  href="javascript:void(0)">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/client/images/clients/Myrrah.svg" alt="Myrrah">
                                    </a>
                                </div>

                            </div>


                        </div>
                        <div id="tabContent5" style="display: none;">

                            <div class="tabs_logo">
                                <div class="right-bottom-img bd-bottom-0"><a href="https://www.boultaudio.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/boult.svg" alt="Boult"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-bottom-0"><a href="https://wiscon.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/FeKIPyMuMWghq7uHfssDvUuJKPPM9HqwzSSFWc28.svg" alt="Wiscon"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-bottom-0"><a href="https://www.toolworld.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/toolworld.svg" alt="Toolworld"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="right-bottom-img bd-bottom-0"><a href="https://www.maviyom.com/en" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/maviyom.svg" alt="Maviyom"
                                    class="img-fluid" loading="lazy"></a></div>
                                    <div class="right-bottom-img bd-bottom-0 bd-right-0"><a href="https://www.digibuggy.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/digibuggy.svg" alt="Digibuggy"
                                        class="img-fluid" loading="lazy"></a></div>
    
                                   
    
                                  
                            </div>
                        </div>
                        <div id="tabContent6" style="display: none;">

                            <div class="tabs_logo">
                                <div class="bd-bottom-0 right-bottom-img"><a href="https://voyagecrafter.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/3vk1p2iAeJJM8HaAMx3diLnjnvO9tmvGBh8fwiRK.svg" alt="Voyage Crafter"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img"><a href="http://www.sparkholidays.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/wrgltMyFcBXzfWKisjvNmSqepxdosxpfy9yqtYSB.svg" alt="Spark Holidays"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img bd-right-0"><a href="https://evisadubai.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/evisadubai.svg" alt="eVisaDubai"
                                    class="img-fluid" loading="lazy"></a></div>

                               
                            </div>
                        </div>
                        <div id="tabContent7" style="display: none;">

                            <div class="tabs_logo">
                                <div class="bd-bottom-0 right-bottom-img"><a href="https://bigrededucation.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/YXsBZinObCrCTKWFHrKSjrYXKSwEPAC97eecAOkf.svg"
                                    alt="Big Red Education" class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img"><a href="https://p4i.net/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/p4i.svg" alt="P4i"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img"><a href="https://www.startup-movers.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/NAV25qtfihaJugg4yoWvU2o9BDSSK5zpZNVoFQQ9.svg"
                                    alt="Startup Movers (CRM)" class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img"><a href="https://gleaf.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/greenleaf.svg" alt="Greenleaf"
                                    class="img-fluid" loading="lazy"></a></div>

                                    <div class="bd-bottom-0 bd-right-0 right-bottom-img"><a href="https://alsowise.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/alsowise.svg" alt="Alsowise"
                                        class="img-fluid" loading="lazy"></a></div>
                                   
                            </div>
                        </div>

                        <div id="tabContent8" style="display: none;">

                            <div class="tabs_logo">
                                <div class="bd-bottom-0 right-bottom-img"><a href="https://alsowise.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/alsowise.svg" alt="Alsowise"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img"><a href="https://www.arenesslaw.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/areness.svg" alt="Areness Dashboard (CRM)"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img"><a href="" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/Hyrefast_Logo 2.svg" alt="Hyrefast"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="bd-bottom-0 right-bottom-img"><a href="https://rierp.com" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/rajyog.svg" alt="Rajyog"
                                    class="img-fluid" loading="lazy"></a></div>

                                    <div class="bd-bottom-0 bd-right-0 right-bottom-img"> <a href="" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/Youshare.svg" alt="Youshare"
                                        class="img-fluid" loading="lazy"></a></div>
                                   
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
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/CRM Dashboard Banner.webp') }}"
                                    alt="Slider Image"></a></div>
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/Mobile App Design Banner.webp') }}"
                                    alt="Slider Image"></a></div>
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/Shopify Banner.webp') }}" alt="Slider Image"></a>
                        </div>
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/WordPress Banner.webp') }}" alt="Slider Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 d-block d-lg-none d-md-none">
                    <div class="silder_section_work">
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/CRM Dashboard Banner - Mobile.webp') }}"
                                    alt="Slider Image"></a></div>
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/Mobile App Design Banner - Mobile.webp') }}"
                                    alt="Slider Image"></a></div>
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/Shopify Banner - Mobile.webp') }}"
                                    alt="Slider Image"></a></div>
                        <div><a href="{{ route('contact-us') }}"><img loading="lazy" class="img-fluid"
                                    src="{{ asset('client/images/homeimg/WordPress Banner - Mobile.webp') }}"
                                    alt="Slider Image"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm12">
                    <div class="testimonial-section-left">
                        <p class="testimonial-p">Testimonials</p>
                        <h3 class="testimonial-text">Client Testimonials Regarding Our Services</h3>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6 col-sm-12">
                    <div class="testimonial-section-right">
                        <div class="testimonial-section text-white">
                            <div class="testimonial-card mt-4">
                                <div class="testimonial-image">
                                    <img loading="lazy" src="{{ asset('client/images/Untitled-1.webp') }}" alt="Client Image">
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
                                    <img loading="lazy" src="{{ asset('client/images/Untitled-2.webp') }}" alt="Client Image">
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
                                    <img loading="lazy" src="{{ asset('client/images/Untitled-3.webp') }}" alt="Client Image">
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
                                    <img loading="lazy" src="{{ asset('client/images/Untitled-4.webp') }}" alt="Client Image">
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
                                    <img loading="lazy" src="{{ asset('client/images/Untitled-5.webp') }}" alt="Client Image">
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
                                    <img loading="lazy" src="{{ asset('client/images/Untitled-6.webp') }}" alt="Client Image">
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

    <script>
        
        const words = ['Design', 'Development', 'Marketing', 'Automation'];
        let currentIndex = 0;
        const scrollingWordsElement = document.getElementById('scrollingWords');

        function setupWords() {
            // Duplicate first word at the end to create a seamless effect
            scrollingWordsElement.innerHTML = words.map(word => `<span class="word">${word}</span>`).join('') +
                                              `<span class="word">${words[0]}</span>`;
        }

        function changeWord() {
            currentIndex++;

            scrollingWordsElement.style.transition = 'transform 0.5s ease-in-out';
            scrollingWordsElement.style.transform = `translateY(-${currentIndex * 1.2}em)`;

            // If last duplicate word is reached, instantly reset back to first without effect
            if (currentIndex === words.length) {
                setTimeout(() => {
                    scrollingWordsElement.style.transition = 'none'; // Disable animation
                    scrollingWordsElement.style.transform = 'translateY(0)'; // Reset position
                    currentIndex = 0; // Reset index
                }, 500); // Wait for transition to complete
            }
        }

        setupWords();
        setInterval(changeWord, 2000); // Change word every 2 seconds
    </script>


    <!-- Include form -->
    @include('client/utils/cro-form')
    <!-- End Include form -->
@endsection
@section('pageJs')
@endsection
