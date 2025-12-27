@extends('client.layouts.app')
@section('content')
<style>
    @media (max-width: 480px) {
        body {
            background: #25242c !important;

        }
    }

    .faq_area .accordion {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1* var(--bs-gutter-y));
        margin-right: calc(-.5* var(--bs-gutter-x));
        margin-left: calc(-.5* var(--bs-gutter-x));
    }

    div#accordionExample .accordion-item {
        border: 0;
        margin-bottom: 15px;
    }

    .faq_area .accordion .accordion-item {
        width: 50%;
        flex: 0 0 auto;
        padding: 0 15px;
        background: transparent;
    }


    
    .faq_area .accordion .accordion-item .accordion-button {
    border-style: dotted;
    border-width: 3px 3px 3px 3px;
    border-color: #3e3c49;
    border-radius: 10px 10px 10px 10px;
    background-color: #25242c;
    font-size: 15px;
    font-weight: 500;
    line-height: 18px;
    color: #ffffff;
        box-shadow: none;
    }

    .faq_area .accordion .accordion-item .accordion-button:focus {
        box-shadow: none;
        border-radius: 10px 10px 0px 0px;

    }
    
    

   .faq_area .accordion .accordion-item .accordion-body {
    font-size: 15px;
    border-radius: 0px 0px 10px 10px;
    background-color: #25242c;
    color: #fff;
    border-style: dotted;
    border-width: 0px 3px 3px 3px;
    border-color: #3e3c49;
}
    .accordion-button::after {
        filter: contrast(0%)!important;
    }
    .accordion-button:not(.collapsed)::after {
    filter: contrast(0%)!important;
}


    .accordion-item:first-of-type {
        border-top-left-radius: var(--bs-accordion-border-radius);
        border-top-right-radius: var(--bs-accordion-border-radius);
/*
         border-bottom-right-radius: 0px!important;
        border-bottom-left-radius:0px!important;
*/
    }

    a.case-studi-img img {
    border-radius: 18px;
}
 
    @media (max-width: 767px) {
        .faq_area .accordion .accordion-item {
            width: 100%;
        }
    }
    .left-content h1 {
    color: #fff;
    font-weight: 400;
    line-height: 60px;
    margin-bottom: 10%;
    font-size: 46px;
}
@media (max-width: 1440px) {
    .left-content h1 {
        color: #fff;
        font-weight: 400;
        line-height: 60px;
        margin-bottom: 10%;
        font-size: 46px;
    }
}
@media (max-width: 768px) {
    .left-content h1 {
        line-height: 40px;
        font-size: 34px;
    }
}
</style>
<style>
/* General styling for the heading */
.heading-title {
  
    text-align: center; /* Ensures text inside is centered */
    margin: 0 auto; /* Ensures proper centering in the layout */
}

/* Styling specifically for desktop screens */
@media (min-width: 992px) { /* Desktop screens */
    .heading-title .desktop-title {
        display: inline-block;
        word-break: break-word; /* Breaks the words if they exceed container width */
        /* line-height: 1.5; Adjust line height for readability */
        max-width: 80%; /* Prevents the title from stretching too wide */
    }
}
</style>
{{-- <div class="container-fluid banner-section d-xl-block d-lg-block d-none d-md-block"
    style="background-image: url({{ asset('storage/' . @$service->desktop_banner) }});">
    
    <div class="row align-items-center">
        <div class="col-lg-5 offset-lg-1 mb-6 col-md-6 col-sm-12 left-content">

            <p class="top-tag">
                
                {{ @$service->achievements }}
            </p>

            <h1>{{ @$service->title }}</h1>
            <a href="{{ route('contact-us') }}" class="book-call-btn btn">Start a Project</a>
        </div>

        <div class="col-lg-6 mb-6 col-sm-12 ">
            <div class="right-side-img">
             
            </div>
        </div>
    </div>
</div>

<div class="container-fluid banner-section d-xl-none d-lg-none d-block d-md-none"
    style="background-image: url({{ asset('storage/' . @$service->mobile_banner) }});">
 
    <div class="row align-items-center">
        <div class="col-lg-5 offset-lg-1 mb-6 text-center text-md-start text-lg-start col-md-6 col-sm-12 left-content">

            <p class="top-tag">
             
                {{ @$service->achievements }}
            </p>

            <h2>{{ @$service->title }}</h2>
            <a href="{{ route('contact-us') }}" class="btn-yellow">Start a Project</a>
        </div>

        <div class="col-lg-6 mb-6 col-sm-12 ">
            <div class="right-side-img">
            
            </div>
        </div>
    </div>
</div> --}}



<div class="container-fluid p-0">
    <img src="{{ asset('storage/' . @$service->desktop_banner) }}" class="d-xl-block d-lg-block d-none d-md-block img-fluid w-100" alt="desktop banner img">
    <img src="{{ asset('storage/' . @$service->mobile_banner) }}" class="d-xl-none d-lg-none d-block d-md-none img-fluid w-100" alt="Mob banner img">
</div>

<!-- usp section -->
@include('client.utils.usp')
<!-- end-usp -->

@foreach ($sections as $section)
@if ($section->section_type === 'section_one')
<div class="cro-section">
    <div class="glow-effect d-none d-lg-block d-md-block"></div>
    <div class="container">
    <h2 class="heading-title">
    <span class="desktop-title">{{ @$section->title }}</span>
</h2>


        @php
        $items = $section->items; // Get all items
        $itemCount = $items->count(); // Count items
        @endphp

        <div class="row align-items-center">
            <!-- Left Features (Visible on Desktop Only) -->
            <div class="col-md-4 d-none d-lg-block d-md-block">
                @if ($itemCount <= 4)
                    @foreach ($items->take(2) as $item) <!-- First 2 items -->
                    <div class="feature-box">
                        <h3 class="feature-title">{{ $item->title }}</h3>
                        <p class="feature-text">{{ $item->description }}</p>
                    </div>
                    @endforeach
                    @else
                    @foreach ($items->take(3) as $item) <!-- First 3 items -->
                    <div class="feature-box">
                        <h3 class="feature-title">{{ $item->title }}</h3>
                        <p class="feature-text">{{ $item->description }}</p>
                    </div>
                    @endforeach
                    @endif
            </div>

            <!-- Center Phone (Visible on Desktop Only) -->
            <div class="col-md-4">
                <div class="phone-mockup d-none d-lg-block d-md-block">
                    <img src="{{ asset('storage/' . @$section->image) }}" class="img-fluid">
                </div>
            </div>

            <!-- Right Features (Visible on Desktop Only) -->
            <div class="col-md-4 d-none d-lg-block d-md-block">
                @if ($itemCount <= 4)
                    @foreach ($items->skip(2)->take(2) as $item) <!-- Next 2 items -->
                    <div class="feature-box feature-box-text">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                    @endforeach
                    @else
                    @foreach ($items->skip(3)->take(3) as $item) <!-- Next 3 items -->
                    <div class="feature-box feature-box-text">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                    @endforeach
                    @endif
            </div>

            <!-- Features for Mobile (Visible Only on Mobile) -->
            <div class="col-12 d-block d-lg-none d-md-none">
                @foreach ($items as $item)
                <div class="feature-box">
                    <h3 class="feature-title">{{ $item->title }}</h3>
                    <p class="feature-text">{{ $item->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Image at the Bottom (Visible on Mobile Only) -->
    <img src="{{ asset('storage/' . @$section->image) }}" class="img-fluid d-block d-lg-none d-md-none iphone-img-top">
</div>

@elseif ($section->section_type === 'section_two')
<div class="could-section">
    <div class="could-effect"></div>
    <div class="container">
        <h2 class="heading-title">
        <span class="desktop-title">{{ @$section->title }}</span>
            <!-- <span class="highlight"></span> -->
        </h2>
        @if (Request::is('conversion-rate-optimization'))
    <p class="condition">if your brand's website has</p>
@endif


        <div class="row justify-content-center">
            @php
            $items = $section->items;
            @endphp

            <!-- Loop Through Items Dynamically -->
            @foreach ($items as $item)
            @if($item->description != null)
            <div class="col-md-4">
                <div class="benefit-card">
                @if (!$item->image)
                                <img src="{{ asset('client/images/serviceimg/Low-Conversion-Rates.svg') }}" 
                                     class="img-fluid" 
                                     alt="{{ $item->title }}">
                            @else
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     class="img-fluid" 
                                     alt="{{ $item->title }}">
                            @endif
                    <h3 class="card-title">{{ $item->title }}</h3>
                    <p class="card-text">{{ $item->description }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
@if (Request::is('conversion-rate-optimization'))
        <p class="bottom-text">then your website need it!</p>
        @endif
    </div>
</div>

<div class="d-none">
 @elseif ($section->section_type === 'section_three')
<div class="services-section d-none">
    <div class="container">
        <h2 class="heading-title  d-none">
            {{ @$section->title }}
        </h2>
        @php
        $items = $section->items;
        @endphp

        <div class="row justify-content-center  d-none">
            @foreach ($items as $item)
            <div class="col-md-4 d-none">
                <div class="service-card  d-none">
                    <div class="service-icon  d-none">
                        <img src="{{ asset('storage/' . @$item->image) }}" class="img-fluid"
                            alt="{{ $item->title }}">
                    </div>
                    <h3 class="card-title  d-none">{{ $item->title }}</h3>
                    <p class="card-text  d-none">{{ $item->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
</div>

@endforeach
<div class="services-section">
<div class="container">
          <div class="text-center">
            <h2 class="heading-title">
                The why behind  <span class="highlight ps-1">our wow!</span></h2>
                    
          </div>
           

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="{{ asset('client/images/serviceimg/Audit-Website.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <h3>Our expertise as a certified partner</h3>
                        <p>As a result of our 10+ years of successful experience in various fields, our team of professionals offers professional craftsmanship complemented by unprecedented creativity to develop quality, excellent solutions drawing on your program’s objectives.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="{{ asset('client/images/serviceimg/Plan-Strategy.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <h3>User-Centric Approach</h3>
                        <p>Your success is our priority. Majoring in your needs, we provide individual approaches and relevant solutions based on your expectations, guaranteeing your satisfaction, and establishing loyalty.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="{{ asset('client/images/serviceimg/Implementation.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <h3>Unmatched Quality</h3>
                        <p>This means that our main focus is to attain excellent results every time to maintain professionalism. It is our design, feature implementation, and durability approach. We ensure that your project is as precise, creative, and reliable as it should be.</p>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="{{ asset('client/images/serviceimg/Implementation.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <h3>Ongoing support and consulting
                        </h3>
                        <p>The support does not end with the site design but ongoing support and consultation to ensure that the site is always up and running. Starting with daily backups or weekly updates, performance optimization, and troubleshooting our staff is always at your service to meet all your demands and ensure your site’s great performance.</p>
                    </div>
                </div> -->
            </div>
        </div>
</div>
{{-- <div class="pricing-section">
    <div class="container">
        <h2 class="heading-title">
            Our Plans To Get<br>
            Started
        </h2>

        <div class="row">
            <!-- Basic Plan -->
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="pricing-card">
                    <span class="price-tag">SAVE 20%</span>
                    <div class="price">₹ 21,999 </div>
                    <div class="sale-price">₹ 40,000</div>
                    <p>If your mobile conversions lag, CRO can ensure your site works smoothly across all devices.</p>
                    <ul class="feature-list">
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                    </ul>
                    <button class="btn-pick">Pick this plan</button>
                </div>
            </div>

            <!-- Featured Plan -->
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="pricing-card featured">
                    <span class="price-tag">SAVE 30%</span>
                    <div class="price">₹ 25,999</div>
                    <div class="sale-price">₹ 40,000</div>
                    <p>If your mobile conversions lag, CRO can ensure your site works smoothly across all devices.</p>
                    <ul class="feature-list">
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                    </ul>
                    <button class="btn-pick">Pick this plan</button>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="col-md-4">
                <div class="pricing-card">
                    <span class="price-tag">SAVE 25%</span>
                    <div class="price">₹ 29,999 </div>
                    <div class="sale-price">₹ 40,000</div>
                    <p>If your mobile conversions lag, CRO can ensure your site works smoothly across all devices.</p>
                    <ul class="feature-list">
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Lorem ipsum dolor sit amet, co</span>
                        </li>
                    </ul>
                    <button class="btn-pick">Pick this plan</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@if($service->faqs && $service->faqs->isNotEmpty()) <!-- Check if FAQs are not empty -->
<section class="service_faq bg-black">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="title text-center">
                    <h4 class="text-white heading-title">Frequently Asked Questions</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="faq_area">
                    <div class="accordion" id="accordionExample">
                        @foreach($service->faqs as $key => $faq) <!-- Loop through FAQs -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading{{ $key }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $key }}" aria-expanded="false" aria-controls="faqCollapse{{ $key }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faqCollapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="faqHeading{{ $key }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


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
                        <a href="{{ route('contact-us') }}" class="btn btn-dark mt-3 book-call-btn_white">Book Now</a>
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


<div class="case-study-section bg-black">
    <div class="container">
        <h2 class="heading-title mb-0">
            Our Case Studies
        </h2>

        <div class="case-studies-slider">
            <div class="col-lg-6 col-md-6 col-sm-12 ps-4 pe-4 mt-5">
                <a href="{{ route('french-factor') }}" class="case-studi-img">
                    <img src="{{ asset('client/images/homeimg/frenchcaseimg.webp') }}" alt="Figma" class="img-fluid">
                </a>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
                    <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>

                </div>
                <h4 class="case-study-section-text mt-3">Building stories for a rich perfume brand</h4>
                <p class="case-study-section-text-p mt-2">A premium perfume brand based in USA with, a masterpiece of design and development, reflects the brand's luxurious ethos with its seamless animations and refined aesthetics.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 ps-4 pe-4 mt-5">
               <a href="{{ route('ozar-luxury') }}" class="case-studi-img"> <img src="{{ asset('client/images/homeimg/ozarcaseimg.webp') }}" alt="Figma"
                class="img-fluid"></a>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand identity</a>
                    <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
                    <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">development</a>
                </div>
                <h4 class="case-study-section-text mt-3">Revamping a real-estate brand based in Goa</h4>
                <p class="case-study-section-text-p mt-2">A brand helping you find your dream home with stunning villas, stylish apartments, and prime land worldwide.</p>
            </div>

        </div>

    </div>
</div>


<section class="form-section bg-black 
pb-4">
   <div class="container">

       <div class="row">
           <div class="col-lg-5 col-md-5 col-12">
               <div class="testimonial-section-left">
               
                   <h3 class="testimonial-text d-none d-lg-block d-md-block">Have an Idea? <br>Lets discuss!</h3>
                   <h3 class="testimonial-text d-block d-lg-none d-md-none">Have an Idea? Lets discuss!</h3>
               </div>
           </div>
           <div class="col-lg-6 offset-lg-1 col-md-6 col-sm-12 ">

               <form id="ebookContactForm">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-12 mt-lg-0 mt-md-0 mt-3">
                           <div class="mb-3">
                               <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Name" required>
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
                           <div class="h-captcha" data-sitekey="15f8030e-6840-470e-8e24-791657d65e0e"></div>
<span class="error-message text-danger" id="hcaptchaError"></span>
                           </div>
                       </div>
                 
                   </div>
               </form>

     
               <div class="row mt-3">
                   <div class="col-lg-6 col-md-6 col-sm-12">
                       <button id="customTriggerButton" class="book-call-btn button-success-home w-100">Submit!</button>
                   </div>
               </div>

               <div id="contactSuccessMessage" class="alert alert-success  d-none mt-3"></div>
               <div id="contactErrorMessage" class="alert alert-danger  d-none mt-3"></div>


           </div>
       </div>
   </div>
</section>



<!-- End Generation Here -->
@endsection
@section('pageJs')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const headings = document.querySelectorAll(".heading-title .desktop-title");

        headings.forEach((heading) => {
            const words = heading.textContent.trim().split(" ");
            if (words.length > 5) {
                const firstLine = words.slice(0, 5).join(" ");
                const secondLine = words.slice(5).join(" ");
                heading.innerHTML = `${firstLine}<br>${secondLine}`;
            }
        });
    });
</script>
<script>
   $(document).ready(function () {
    function validateAndSubmitForm() {
        // Clear previous error messages
        $('.error-message').text('');

        // Validation flag
        var valid = true;

        // Name validation
        if ($('#name').val() == '') {
            $('#nameError').text('Name is required.');
            valid = false;
        }

        // Email validation
        if ($('#email').val() == '') {
            $('#emailError').text('Email is required.');
            valid = false;
        } else if (!validateEmail($('#email').val())) {
            $('#emailError').text('Please enter a valid email.');
            valid = false;
        }

        // Phone validation
        if ($('#phone').val() == '') {
            $('#phoneError').text('Phone number is required.');
            valid = false;
        }

        // Message validation
        if ($('#message').val() == '') {
            $('#messageError').text('Message is required.');
            valid = false;
        }

        // hCaptcha validation
        if (hcaptcha.getResponse() == '') {
            $('#hcaptchaError').text('Please verify you are not a robot.');
            valid = false;
        }

        // If validation fails, stop submission
        if (!valid) {
            return;
        }

        // Disable button and show loading animation
        $('#customTriggerButton')
            .prop('disabled', true)
            .html('<i class="fa fa-spinner fa-spin"></i> Processing...');

        // Submit the form data using AJAX
        var formData = new FormData($('#ebookContactForm')[0]);
        formData.append('h-captcha-response', hcaptcha.getResponse());
        $.ajax({
            url: "{{ route('contact-us-json') }}", // Your backend route
            method: "POST",
            data: formData,
            processData: false, // Do not let jQuery try to process the data
            contentType: false, // Do not set the content type, as it's automatically handled by FormData
            success: function (response) {
                console.log(response);

                if (response.success) {
                    $('#contactSuccessMessage')
                        .text(response.success)
                        .removeClass('d-none'); // Display success message

                    $('#ebookContactForm')[0].reset(); // Reset the form

                    // Reset button to original state
                    $('#customTriggerButton')
                        .prop('disabled', false)
                        .html('Submit!');
                } else {
                    $.each(response.errors, function (key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });

                    // Reset button to original state
                    $('#customTriggerButton')
                        .prop('disabled', false)
                        .html('Submit!');
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                $('#contactErrorMessage')
                    .removeClass('d-none')
                    .text("An error occurred while submitting the form.");

                // Reset button to original state
                $('#customTriggerButton')
                    .prop('disabled', false)
                    .html('Submit!');
            }
        });
    }

    // When the custom submit button is clicked, validate and submit the form
    $('#customTriggerButton').on('click', function () {
        validateAndSubmitForm();
    });
});

// Email validation function
function validateEmail(email) {
    var re = /^[a-zA-Z0-9._%+-]+@[a-zAZ0-9.-]+\.[a-zA-Z]{2,4}$/;
    return re.test(String(email).toLowerCase());
}

</script>
@endsection
