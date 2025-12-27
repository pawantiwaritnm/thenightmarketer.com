@extends('client.layouts.app')
@section('content')
<style>
    .hero-section {

        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 20px;
        padding-bottom: 44px;
        text-align: left;
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .contact-section {
        /* margin-top: -50px; */
        padding: 18px 20px;
        color: #fff;
    }



    .form-section-contactUs {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        color: #000;
        border: 2px solid rgba(255, 255, 255, 0.17);
        background: rgba(30, 29, 34, 0.50);
        backdrop-filter: blur(27px);
    }


    .form-section-contactUs::before {
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

    .form-section-contactUs::after {
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

    .form-section-contactUs .form-control,
    .form-section-contactUs .phone-dropdown,
    .form-section-contactUs .form-check-input {
        border: 1.466px solid rgba(255, 255, 255, 0.26) !important;
        background: transparent !important;
        color: #fff !important;
        padding: 0.7rem !important;
        border-radius: 25px !important;
    }

    .form-section-contactUs .form-check-input {
        padding: 0rem !important;
        border-radius: 5px !important;
    }

    .form-section-contactUs .form-label,
    .form-section-contactUs h4,
    .form-section-contactUs .form-check-label {
        color: #fff
    }

    .form-section-contactUs .form-check-label {
        font-size: 15px;
        /* margin-top: 5px; */
    }

    .form-section-contactUs .form-check-input:checked {
        background-color: #ffd60a !important;
        border-color: #ffd60a !important;
    }

    .form-section-contactUs .form-check-input:focus {
        border-color: #ffd60a8a !important;
        outline: 0 !important;
        box-shadow: 0 0 0 .25rem #ffd70e3f !important;
    }

    .form-section-contactUs .form-control::placeholder {
        color: #FFF;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-transform: uppercase;
        opacity: 0.5;

    }

    .color-front {
        color: #ffd60a;
    }


    .form-section-contactUs .form-control:focus {
        background: none;
        box-shadow: none;
        border: 1.466px solid rgba(255, 255, 255, 0.26);
        color: #fff;
    }


    .contact-section a {
        color: #000;
        text-decoration: none;
    }


    .contact-section a:hover {
        color: #ffd60a;
        text-decoration: none;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
    }

    .dropdown-item img {
        margin-right: 10px;
    }

    .phone-dropdown {
        background: #fff !important;
        color: #000 !important;
        border: 1px solid #dee2e6 !important;
    }

    .phone-dropdown-menu {
        background: #fff !important;
        color: #000;
        border: 1px solid #dee2e6;
        width: 313px;
        height: 200px;
        overflow-x: hidden;
    }

    .text-a-white a {
        color: #fff !important;
    }
</style>
<style>
    .form-check-inline {

        display: flex;
        margin-right: 0px !important;
        align-items: center;
        gap: 5px;

    }

    .is-invalid {
        border-color: red;
        outline: none;
    }

    .is-valid {
        border-color: green;
        outline: none;
        border: 1px solid #000
    }

    .form-check-input {
        margin-top: 0px !important;
    }

    .calendly-inline-widget {
        height: 700px;
    }

    @media (max-width: 480px) {
        .form-section-contactUs .form-check-label {
            font-size: 12px;
            margin-top: 5px;
        }

        .form-section-contactUs {
            padding: 26px 15px;
        }

        .form-check-input {
            margin-top: .25em !important;
        }

        .hero-section {
            padding: 100px 0px 0px;
        }




    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }

        .calendly-inline-widget {
            height: 445px !important;
        }
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
</style>







<style>
    .form-section-contactUs-new {
            margin-bottom: 40px;
        }

        .section-title-contactUs {
            font-size: 24px;
            font-weight: 400;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        .interest-buttons-contactUs {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 60px;
            /* max-width: 800px; */
        }

        .interest-btn-contactUs {
            padding: 12px 24px;
            border: 1px solid #fff;
            background: transparent;
            color: white;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .interest-btn-contactUs.selected {
            background: white;
            color: #2a2a2a;
            border-color: white;
        }

        .interest-btn-contactUs:hover {
            border-color: #999;
        }

        .interest-btn-contactUs.selected:hover {
            background: #f0f0f0;
        }

        .form-grid-contactUs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px 60px;
            margin-bottom: 40px;
        }

        .form-group-contactUs {
            position: relative;
        }

        .form-group-contactUs label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 400;
        }

        .form-group-contactUs input{
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid #fff;
            color: white;
            font-size: 16px;
            padding: 8px 0;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-group-contactUs input:focus,
        .form-group-contactUs textarea:focus {
            border-bottom-color: #f1c40f;
        }

        .form-group-contactUs input::placeholder,
        .form-group-contactUs textarea::placeholder {
            color: #fff;
        }

        .form-group-contactUs textarea {
            resize: vertical;
            min-height: 60px;
        }

        .submit-btn-contactUs {
            background: #f1c40f;
            color: #2a2a2a;
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .submit-btn-contactUs:hover {
            background: #e6b800;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .form-grid-contactUs {
                grid-template-columns: 1fr;
                gap: 30px;
            }

           

            .interest-btn-contactUs {
                font-size: 14px;
                padding: 10px 20px;
            }

            .section-title-contactUs {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {

            .interest-btn-contactUs {
                font-size: 13px;
                padding: 8px 16px;
            }

            .bg-black::after {
         display: none;
        }
        }

        @media (max-width: 1000px) {

        .bg-black::after {
        display: none;
        }
        }
        .bg-black {
            overflow: hidden;
        }

        .bg-black::after {
            content: "";
            position: absolute;
            filter: blur(184px);
            width: 500px;
            height: 500px;
            top: -124px;
            background: #F0CF22;
            border-radius: 50%;
            right: -66px;
        }
    </style>



<div class="bg-black position-relative">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Hey👋, Let’s <br>discuss your idea</h1>
                  
                </div>
            </div>
        </div>
    </section>
<!-- 
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
            <div class="form-section-contactUs-new">
                <h3 class="section-title-contactUs">I'm interested in...</h3>
                <div class="interest-buttons-contactUs">
                    <button type="button" class="interest-btn-contactUs" data-service="logo-design">Logo Design</button>
                    <button type="button" class="interest-btn-contactUs" data-service="website-design">Website Design</button>
                    <button type="button" class="interest-btn-contactUs" data-service="web-development">Web Development</button>
                    <button type="button" class="interest-btn-contactUs" data-service="mobile-app">Mobile App</button>
                    <button type="button" class="interest-btn-contactUs" data-service="performance-marketing">Performance Marketing</button>
                    <button type="button" class="interest-btn-contactUs" data-service="monthly-seo">Monthly SEO</button>
                    <button type="button" class="interest-btn-contactUs" data-service="social-media-marketing">Social Media Marketing</button>
                    <button type="button" class="interest-btn-contactUs" data-service="other">Other...</button>
                </div>
            </div>

            <div class="form-grid-contactUs">
                <div class="form-group-contactUs">
                    <input type="text" id="name" name="name" placeholder="My name is" required>
                </div>

                <div class="form-group-contactUs">
                    <input type="email" id="contact" name="contact" placeholder="You can email me at" required>
                </div>

                <div class="form-group-contactUs">
                    <input type="number" id="phone" name="phone" placeholder="and my phone number">
                </div>

                <div class="form-group-contactUs">
                    <input type="text" id="idea" name="idea"  placeholder="and this is my idea">
                </div>
            </div>

            <button type="submit" class="submit-btn-contactUs">Submit Query</button>
            </div>
        </div>
    </div>
 -->

    <!-- Contact Section -->
    <div class="container contact-section">
        <div class="row flex-column-reverse flex-lg-row flex-md-column-reverse">
            <!-- Address and Details -->
            <div class="col-md-12 col-lg-8 my-4 mx-lg-0">

                <div class="row">
                    <div class="col-md-4">
                        <h4 class="color-front">Office Address</h4>
                        <div class="text-a-white"><a href="https://maps.app.goo.gl/3FJsaZVqXfojDehx9">A-92 Second Floor, Wazirpur,<br>Group,
                                Industrial Area<br>New Delhi – 110052</a></div>
                    </div>
                    <div class="col-md-4 mt-4 mt-lg-0 mt-md-0">
                        <h4 class="color-front">Contact Us:</h4>
                        <div class="text-a-white">Ph: <a href="tel:+91-9717884659">+91-9717884659</a><br>Email: <a
                                href="mailto:info@thenightmarketer.com">info@thenightmarketer.com</a> </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-lg-0 mt-md-0">
                        <h4 class="color-front">Assistance Hours:</h4>
                        <div>Monday – Saturday<br>9:30 am to 6:30 pm IST</div>
                    </div>
                </div>
                <!-- <div class="calendly-inline-widget mt-4 mt-lg-0" data-url="https://calendly.com/raghavtnm"
                    style="min-width:320px;"></div> -->
            </div>


            <!-- Calendar Embed -->
            <div class="col-md-12 col-lg-4 text-start position-relative ">
                <div class="container form-section-contactUs overflow-hidden">
                    <div class="row position-relative">
                        <div class="col-md-12">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <h4>Fill Your Details Here:</h4>

                        </div>
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('contact.us.submit') }}">
                                @csrf
                                <input type="text" name="honeypot" style="display:none;">
                                <div class="mb-3">
                                    <!-- <label for="name" class="form-label">Name</label> -->
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Name" value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="email" class="form-label">Email</label> -->
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Email" value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="phone" class="form-label">Contact Number</label> -->
                                    <div class="d-flex gap-2">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle phone-dropdown" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img id="selected-flag" src="https://flagcdn.com/w40/in.png"
                                                    alt="India"
                                                    style="width: 20px; height: 15px; margin-right: 5px;">
                                                (+91)
                                            </button>
                                            <ul class="dropdown-menu phone-dropdown-menu"
                                                aria-labelledby="dropdownMenuButton">
                                                <li class="px-2">
                                                    <input type="text" id="countrySearch" class="form-control"
                                                        placeholder="Search country..." style="border: 1px solid #000 !important; padding: 8px !important; color:#000 !important;">
                                                </li>
                                                <div id="countryList">
                                                    @foreach ($countries as $country)
                                                    <li>
                                                        <a class="dropdown-item country-option" href="#"
                                                            data-dial-code="{{ $country['dial_code'] }}"
                                                            data-code="{{ strtolower($country['code']) }}"
                                                            data-name="{{ $country['name'] }}">
                                                            <img src="https://flagcdn.com/w40/{{ strtolower($country['code']) }}.png"
                                                                alt="{{ $country['name'] }}"
                                                                style="width: 20px; height: 15px; margin-right: 5px;">
                                                            {{ $country['name'] }} ({{ $country['dial_code'] }})
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                        <input type="hidden" id="country" name="country"
                                            value="{{ old('country', 'India') }}">
                                        <input type="hidden" id="country_code" name="country_code"
                                            value="{{ old('country_code', '+91') }}">
                                        <input type="number"
                                            class="form-control w-100 @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="number"
                                            value="{{ old('phone') }}" required>
                                    </div>
                                    @error('phone')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="message" class="form-label">Message</label> -->
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4"
                                        placeholder="Message" required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 ">
                                    <label for="services" class="form-label">Services Looking For *</label>
                                    <br>
                                    <div class="container">
                                        <div class="row flex-wrap">
                                            <div class=" col-6 col-md-6 mb-1 mb-1">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="service-branding"
                                                        name="services[]" value="Branding">
                                                    <label class="form-check-label"
                                                        for="service-branding">Branding</label>
                                                </div>
                                            </div>
                                            <div class=" col-6 col-md-6 mb-1">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="service-web"
                                                        name="services[]" value="Graphic Design">
                                                    <label class="form-check-label" for="service-web">Graphic
                                                        Design</label>
                                                </div>
                                            </div>
                                            <div class=" col-6 col-md-6 mb-1">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="service-uiux"
                                                        name="services[]" value="UI/UX Design">
                                                    <label class="form-check-label" for="service-uiux">UI/UX
                                                        Design</label>
                                                </div>
                                            </div>
                                            <div class=" col-6 col-md-6 mb-1">

                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="service-cro"
                                                        name="services[]" value="CRO">
                                                    <label class="form-check-label" for="service-cro">CRO</label>
                                                </div>
                                            </div>
                                            <div class=" col-6 col-md-6 mb-1">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="service-app"
                                                        name="services[]" value="App Design">
                                                    <label class="form-check-label" for="service-app">App Design</label>
                                                </div>
                                            </div>
                                            <div class=" col-6 col-md-6 mb-1">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="service-development" name="services[]" value="Development">
                                                    <label class="form-check-label"
                                                        for="service-development">Development</label>
                                                </div>
                                            </div>
                                            <div class=" col-6 col-md-6 mb-1">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="service-marketing" name="services[]" value="Marketing">
                                                    <label class="form-check-label"
                                                        for="service-marketing">Marketing</label>
                                                </div>
                                            </div>
                                            <div class=" col-6 col-md-6 mb-1">
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="service-automation" name="services[]" value="Automations">
                                                    <label class="form-check-label"
                                                        for="service-automation">Automations</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('services')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Custom CAPTCHA -->
                                {{-- <div class="mb-3">
                                    <label for="custom_captcha" class="form-label">Custom CAPTCHA *</label>
                                    <br>
                                    <div class="d-flex align-items-center">
                                        <span class="me-2 w-25 text-white">{{ $num1 }} + {{ $num2 }}
                                =</span>
                                <input type="number"
                                    class="form-control @error('custom_captcha') is-invalid @enderror w-75"
                                    id="custom_captcha" name="custom_captcha" placeholder="Your Answer"
                                    required>
                        </div>
                        @error('custom_captcha')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Google reCAPTCHA -->
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE') }}"></div>
                        @error('g-recaptcha-response')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>--}}
                    <div class="mb-3">
                        <div class="h-captcha" data-sitekey="15f8030e-6840-470e-8e24-791657d65e0e"></div>
                        @error('h-captcha-response')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="book-call-btn button-success-home mt-1">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Form Section -->
</div>
@endsection
@section('pageJs')

<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const countrySearch = document.getElementById('countrySearch');
        const countryList = document.getElementById('countryList');
        const countryOptions = document.querySelectorAll('.country-option');
        const selectedFlag = document.getElementById('selected-flag');
        const phoneInput = document.getElementById('phone');
        const dropdownButton = document.getElementById('dropdownMenuButton');
        const dropdownMenu = document.querySelector('.dropdown-menu');
        const countryInput = document.getElementById('country'); // Hidden country input
        const countryCodeInput = document.getElementById('country_code'); // Hidden country code input

        // Filter countries based on search input
        countrySearch.addEventListener('input', function() {
            const filter = countrySearch.value.toLowerCase();
            countryOptions.forEach(option => {
                const countryName = option.getAttribute('data-name').toLowerCase();
                if (countryName.includes(filter)) {
                    option.parentElement.style.display = 'block'; // Show matching country
                } else {
                    option.parentElement.style.display = 'none'; // Hide non-matching country
                }
            });
        });

        // Update selected country
        countryOptions.forEach(option => {
            option.addEventListener('click', function(e) {
                e.preventDefault();

                // Update the selected flag, dropdown button, and hidden inputs
                const dialCode = this.getAttribute('data-dial-code');
                const countryName = this.getAttribute('data-name');
                const flagUrl = `https://flagcdn.com/w40/${this.getAttribute('data-code')}.png`;

                selectedFlag.src = flagUrl;
                dropdownButton.innerHTML =
                    `<img id="selected-flag" src="${flagUrl}" alt="${countryName}" style="width: 20px; height: 15px; margin-right: 5px;"> (${dialCode})`;
                phoneInput.placeholder = `Enter number (${dialCode})`;
                countryInput.value = countryName;
                countryCodeInput.value = dialCode;

                // Close dropdown after selection
                dropdownMenu.classList.remove('show');
            });
        });

        // Default placeholder and inputs for India
        function setDefaultCountry() {
            const defaultFlagUrl = "https://flagcdn.com/w40/in.png";
            const defaultCountryName = "India";
            const defaultDialCode = "+91";

            selectedFlag.src = defaultFlagUrl;
            dropdownButton.innerHTML =
                `<img id="selected-flag" src="${defaultFlagUrl}" alt="${defaultCountryName}" style="width: 20px; height: 15px; margin-right: 5px;"> (${defaultDialCode})`;
            phoneInput.placeholder = `Enter number (${defaultDialCode})`;
            countryInput.value = defaultCountryName;
            countryCodeInput.value = defaultDialCode;
        }

        // Initialize with default country
        setDefaultCountry();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const nameInput = document.getElementById("name");
        const emailInput = document.getElementById("email");
        const phoneInput = document.getElementById("phone");
        const messageInput = document.getElementById("message");
        const form = document.querySelector("form");

        // Validate name (only characters allowed)
        nameInput.addEventListener("keyup", function() {
            const nameRegex = /^[a-zA-Z\s]*$/;
            if (!nameRegex.test(this.value)) {
                this.classList.add("is-invalid");
            } else {
                this.classList.remove("is-invalid");
            }
        });

        // Validate email format
        emailInput.addEventListener("keyup", function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(this.value)) {
                this.classList.remove("is-invalid");
                this.classList.add("is-valid");
            } else {
                this.classList.remove("is-valid");
                this.classList.add("is-invalid");
            }
        });

        // Validate phone (only numeric values)
        phoneInput.addEventListener("keyup", function() {
            const phoneRegex = /^[0-9]*$/;
            if (!phoneRegex.test(this.value)) {
                this.classList.add("is-invalid");
            } else {
                this.classList.remove("is-invalid");
            }
        });

        // Validate message (no special characters allowed)
        messageInput.addEventListener("keyup", function() {
            const messageRegex = /^[a-zA-Z0-9\s.,]*$/;
            if (!messageRegex.test(this.value)) {
                this.classList.add("is-invalid");
            } else {
                this.classList.remove("is-invalid");
            }
        });

        // Form submission validation
        form.addEventListener("submit", function(e) {
            let isValid = true;

            // Name validation
            const nameRegex = /^[a-zA-Z\s]*$/;
            if (!nameInput.value.trim() || !nameRegex.test(nameInput.value)) {
                nameInput.classList.add("is-invalid");
                nameInput.focus();
                isValid = false;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailInput.value.trim() || !emailRegex.test(emailInput.value)) {
                emailInput.classList.add("is-invalid");
                emailInput.focus();
                isValid = false;
            }

            // Phone validation
            const phoneRegex = /^[0-9]*$/;
            if (!phoneInput.value.trim() || !phoneRegex.test(phoneInput.value)) {
                phoneInput.classList.add("is-invalid");
                phoneInput.focus();
                isValid = false;
            }

            // Message validation (optional, no special characters)
            const messageRegex = /^[a-zA-Z0-9\s.,]*$/;
            if (messageInput.value.trim() && !messageRegex.test(messageInput.value)) {
                messageInput.classList.add("is-invalid");
                messageInput.focus();
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>




<script>
        // Handle interest button selection
        const interestButtons = document.querySelectorAll('.interest-btn-contactUs');
        
        interestButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('selected');
            });
        });

        // Handle form submission
        document.getElementById('serviceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get selected services
            const selectedServices = Array.from(document.querySelectorAll('.interest-btn-contactUs.selected'))
                .map(btn => btn.textContent);
            
            // Get form data
            const formData = {
                name: document.getElementById('name').value,
                contact: document.getElementById('contact').value,
                phone: document.getElementById('phone').value,
                idea: document.getElementById('idea').value,
                services: selectedServices
            };
            
            // Here you would typically send the data to your server
            console.log('Form submitted:', formData);
            alert('Thank you for your inquiry! We will get back to you soon.');
        });

        // Add smooth focus transitions
        const inputs = document.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>


@endsection