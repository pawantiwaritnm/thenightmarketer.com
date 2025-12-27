<!DOCTYPE html>
<html lang="en">
@php
$a = rand(1, 9);
$b = rand(1, 9);
session(['company_profile_captcha' => $a + $b]);
@endphp

<head>
    @stack('haed')
    @stack('head')
    <!-- start php -->
    <meta name="robots" content="index, follow">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php

    @endphp
    <?php if (!empty(@$pageMeta)) { ?>
        <title>
            <?= $pageMeta['meta_title'] ?>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content=" <?= $pageMeta['meta_description'] ?>" />
        <meta name="keywords" content="<?= $pageMeta['meta_keyword'] ?>" />
        <meta property="og:url" content="https://thenightmarketer.com/">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?= $pageMeta['meta_title'] ?>">
        <meta property="og:description" content="<?= $pageMeta['meta_description'] ?>">
        <meta property="og:image" content="{{ asset('client/images/OG Image.webp') }}">
    <?php } else { ?>
        <title>
            @if (View::hasSection('title'))
            @yield('title') || The Night Marketer
            @else
            Digital Marketing & Development Services | The Night Marketer
            @endif
        </title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description"
            content="Transform your digital presence with The Night Marketer. Offering SEO, social media marketing, mobile app development, email marketing, and more. Partner with us for proven success and growth." />
        <meta name="keywords"
            content="UI/UX Design, Graphic Design, Branding, Conversion Rate Optimization, Shopify Development, WordPress Development, Social Media Marketing, Search Engine Optimization">
        <meta property="og:url" content="https://thenightmarketer.com/">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Digital Marketing & Development Services | The Night Marketer">
        <meta property="og:description"
            content="Transform your digital presence with The Night Marketer. Offering SEO, social media marketing, mobile app development, email marketing, and more. Partner with us for proven success and growth.">
        <meta property="og:image" content="{{ asset('client/images/OG Image.webp') }}">
    <?php } ?>
    <!-- end php -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('client/images/favicon.png') }}">
    <link rel="canonical" href="{{ url()->current() }}" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K6F8PWK');
    </script>
    <!-- End Google Tag Manager -->


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" async="" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" async="" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" async="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/style.css') }}" async="" />

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        async="" />


    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1076949064639753');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1076949064639753&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->


    <style>
        .copyright-section p {
            opacity: 0.5;
        }

        .rotate-box-owl {
            width: 120px;
            height: 120px;
            position: relative;
        }

        .center-image-owl {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 128px;
            height: 128px;
            border-radius: 50%;
            overflow: hidden;
            z-index: -1;
        }



        .center-image-owl img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .rotating-text-owl {
            position: absolute;
            width: 100%;
            height: 100%;
            animation: rotate 20s linear infinite;
        }

        .get_btn {
            position: fixed;
            left: auto;
            right: 15px;
            bottom: 15px;
            border: 0;
            padding: 0;
            border-radius: 100px;
            z-index: 9;
        }

        .get_btn-2 {
            position: fixed;
            left: 15px;
            /* right: 15px; */
            bottom: 15px;
            border: 0;
            padding: 0;
            border-radius: 100px;
            z-index: 9;

        }

        @media (max-width: 768px) {
            .center-image-owl {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 92px;
                height: 92px;
                border-radius: 50%;
                overflow: hidden;
                z-index: -1;
            }

            .rotate-box-owl {
                width: 90px;
                height: 90px;
                position: relative;
            }
        }


        .tabs-container .content a {
            text-align: center;
        }

        .link-slide-up a {
            overflow: hidden;
            display: inline-block;
            position: relative;
            vertical-align: top;
            text-decoration: none;
            color: white;
            /* default color */
        }

        .link-slide-up a span {
            position: relative;
            display: inline-block;
            transition: transform 0.3s ease;
            z-index: 1;
        }

        .link-slide-up a span::before {
            content: attr(data-hover);
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            white-space: nowrap;
            color: #f0cf22;
            /* Hover color */
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 1;
            z-index: 0;
        }

        .link-slide-up a:hover span {
            transform: translateY(-100%);
        }

        .link-slide-up a {
            line-height: 1.4;
        }

        #typed-hello {
            border-right: 2px solid #f0cf22;
            padding-right: 4px;
            animation: blink 0.8s step-end infinite;
        }

        .career-link::after {
            content: "Hiring";
            position: absolute;
            bottom: 9px;
            right: -46px;
            width: 55px;
            border-radius: 6px;
            height: 24px;
            background-color: #f0cf22;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            font-size: 14px;
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }


        @media screen and (max-width: 767px) {
            .career-link::after {
                content: "Hiring";
                position: absolute;
                bottom: 0px;
                left: 61px;
                right: unset;
                width: 55px;
                border-radius: 6px;
                height: 24px;
                background-color: #f0cf22;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #000;
                font-size: 14px;
            }
        }





        /* .company-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.85);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    animation: fadeIn 0.3s ease;
}

.company-modal-overlay.active {
    display: flex;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        transform: translateY(50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.company-modal-content {
    background: #141318;
    border-radius: 20px;
    padding: 45px;
    max-width: 500px;
    width: 90%;
    position: relative;
    animation: slideUp 0.4s ease;
    border: 3px solid #FFD700;
    box-shadow: 0 20px 60px rgba(255, 215, 0, 0.3);
}

.company-close-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 32px;
    color: #FFD700;
    cursor: pointer;
    background: none;
    border: none;
    transition: all 0.3s ease;
    line-height: 1;
    font-weight: 300;
}

.company-close-btn:hover {
    transform: rotate(90deg);
    color: #fff;
}

.company-modal-header {
    text-align: center;
    margin-bottom: 35px;
}

.company-modal-header h2 {
    color: #FFD700;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.company-modal-header p {
    color: #fff;
    font-size: 15px;
    opacity: 0.85;
}

.company-form-group {
    margin-bottom: 25px;
}

.company-form-group label {
    display: block;
    color: #FFD700;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.company-form-group input {
    width: 100%;
    padding: 16px 20px;
    background: #1e1e1e;
    border: 2px solid #333;
    border-radius: 12px;
    color: #fff;
    font-size: 15px;
    transition: all 0.3s ease;
    outline: none;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.company-form-group input:focus {
    border-color: #FFD700;
    background: #252525;
    box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
}

.company-form-group input::placeholder {
    color: #666;
}

.company-submit-btn {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
    border: none;
    border-radius: 12px;
    color: #141318;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.company-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
}

.company-submit-btn:active {
    transform: translateY(0);
}

.company-error-text {
    color: #ff4444;
    font-size: 13px;
    margin-top: 5px;
    display: block;
}

.company-success-message {
    background: #4CAF50;
    color: white;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
    margin-top: 15px;
    display: none;
}

.company-success-message.show {
    display: block;
    animation: slideUp 0.3s ease;
}

@media (max-width: 576px) {
    .company-modal-content {
        padding: 30px 20px;
    }
    .company-modal-header h2 {
        font-size: 24px;
    }
} */
    </style>
    <style>
        /* Modal Background */
        .custom-modal {
            background-color: #ffffff;
            /* White background for the form area as per image */
            border-radius: 15px !important;
            padding: 10px;
            border: none;
        }

        /* Title Styling */
        .modal-title {
            color: #1a1a1a;
            font-weight: 700;
            font-size: 1.2rem;
        }

        /* Fix for Close Button (Standard Bootstrap 5) */
        .btn-close {
            opacity: 0.8;
        }

        /* Input Styles */
        .custom-input {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 12px;
            color: #333;
        }

        .custom-input:focus {
            box-shadow: none;
            border-color: #000;
        }

        /* Captcha Label */
        .captcha-container .form-label {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
            display: block;
        }

        /* Submit Button */
        .btn-submit {
            background-color: #212529;
            /* Dark gray/black like your site */
            color: white;
            font-weight: 600;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            transition: 0.3s;
            border: none;
        }

        .btn-submit:hover {
            background-color: #000;
            color: #fff;
        }

        /* Force the close button to be visible and styled */
        #companyProfileModal .btn-close {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e");
            background-size: 12px;
            opacity: 0.8;
            transition: opacity 0.2s;
            margin-right: 5px;
            margin-top: 5px;
        }

        #companyProfileModal .btn-close:hover {
            opacity: 1;
            background-color: transparent;
            /* Ensures no gray box appears on hover */
        }

        /* Ensure the header has enough padding for the button */
        #companyProfileModal .modal-header {
            padding: 1.5rem 1.5rem 0.5rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "The Night Marketer",
            "image": "https://thenightmarketer.com/images/tnm-logo-new.png",
            "@id": "https://thenightmarketer.com",
            "url": "https://thenightmarketer.com",
            "telephone": "+91-9717884659",
            "priceRange": "$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "A-92 Second Floor, Wazirpur Group, Industrial Area",
                "addressLocality": "New Delhi",
                "addressRegion": "Delhi",
                "postalCode": "110052",
                "addressCountry": "IN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 28.7041,
                "longitude": 77.1025
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ],
                "opens": "10:00",
                "closes": "19:00"
            },
            "sameAs": [
                "https://www.facebook.com/thenightmarketer",
                "https://www.instagram.com/thenightmarketer",
                "https://www.linkedin.com/company/thenightmarketer",
                "https://twitter.com/thenightmarketer"
            ],
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.9",
                "clientCount": "450"
            }
        }
    </script>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "The Night Marketer",
            "alternateName": "TNM",
            "url": "https://thenightmarketer.com",
            "logo": "https://thenightmarketer.com/images/tnm-logo-new.png",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+91-9717884659",
                "contactType": "customer service",
                "email": "info@thenightmarketer.com",
                "areaServed": "IN",
                "availableLanguage": ["en", "Hindi"]
            },
            "sameAs": [
                "https://www.facebook.com/thenightmarketer",
                "https://www.instagram.com/thenightmarketer",
                "https://www.linkedin.com/company/thenightmarketer",
                "https://twitter.com/thenightmarketer",
                "https://www.youtube.com/@thenightmarketer"
            ],
            "description": "The Night Marketer is a leading digital marketing and web development agency in Delhi, specializing in Shopify development, WordPress websites, UI/UX design, SEO, and performance marketing services.",
            "foundingDate": "2015",
            "numberOfEmployees": {
                "@type": "QuantitativeValue",
                "value": "30"
            },
            "slogan": "Design, Development, Marketing, Automation Solutions",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "A-92 Second Floor, Wazirpur Group, Industrial Area",
                "addressLocality": "New Delhi",
                "addressRegion": "Delhi",
                "postalCode": "110052",
                "addressCountry": "IN"
            }
        }
    </script>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Service",
            "serviceType": "Digital Marketing Services",
            "provider": {
                "@type": "LocalBusiness",
                "name": "The Night Marketer",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "A-92 Second Floor, Wazirpur Group, Industrial Area",
                    "addressLocality": "New Delhi",
                    "postalCode": "110052",
                    "addressCountry": "IN"
                }
            },
            "areaServed": {
                "@type": "City",
                "name": "Delhi NCR"
            },
            "hasOfferCatalog": {
                "@type": "OfferCatalog",
                "name": "Digital Marketing & Development Services",
                "itemListElement": [{
                        "@type": "OfferCatalog",
                        "name": "Design Services",
                        "itemListElement": [{
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "UI Design Services",
                                    "description": "User Interface design for websites and mobile applications",
                                    "url": "https://thenightmarketer.com/ui-design-services"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "UX Design Services",
                                    "description": "User Experience design and research services",
                                    "url": "https://thenightmarketer.com/ux-design-services"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Graphic Design Services",
                                    "description": "Brand identity, marketing collateral, and graphic design",
                                    "url": "https://thenightmarketer.com/graphic-design-services"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Brand Identity Design",
                                    "description": "Complete branding solutions and brand identity creation",
                                    "url": "https://thenightmarketer.com/branding-services"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Conversion Rate Optimization",
                                    "description": "CRO services to improve website conversions",
                                    "url": "https://thenightmarketer.com/conversion-rate-optimization"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Video Editing Services",
                                    "description": "Professional video editing for marketing content",
                                    "url": "https://thenightmarketer.com/video-editing"
                                }
                            }
                        ]
                    },
                    {
                        "@type": "OfferCatalog",
                        "name": "Development Services",
                        "itemListElement": [{
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Shopify Development",
                                    "description": "Custom Shopify store development and theme customization",
                                    "url": "https://thenightmarketer.com/shopify-development-company"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "WordPress Development",
                                    "description": "WordPress website development and customization",
                                    "url": "https://thenightmarketer.com/wordpress-development"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Custom Web Development",
                                    "description": "Custom frontend and backend development solutions",
                                    "url": "https://thenightmarketer.com/custom-frontend-and-backend"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "CRM & ERP Development",
                                    "description": "Custom CRM and ERP system development",
                                    "url": "https://thenightmarketer.com/erp-crm"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Mobile App Development",
                                    "description": "iOS and Android mobile application development",
                                    "url": "https://thenightmarketer.com/mobile-app-development"
                                }
                            }
                        ]
                    },
                    {
                        "@type": "OfferCatalog",
                        "name": "Marketing Services",
                        "itemListElement": [{
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Social Media Marketing",
                                    "description": "Social media management and advertising services",
                                    "url": "https://thenightmarketer.com/social-media-marketing"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Google Ads Management",
                                    "description": "Google Ads campaign management and optimization",
                                    "url": "https://thenightmarketer.com/google-ads-services"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "SEO Services",
                                    "description": "Search engine optimization services",
                                    "url": "https://thenightmarketer.com/search-engine-optimization"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Performance Marketing",
                                    "description": "Data-driven performance marketing campaigns",
                                    "url": "https://thenightmarketer.com/performance-marketing"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Email Marketing",
                                    "description": "Email marketing campaigns and automation",
                                    "url": "https://thenightmarketer.com/email-marketing"
                                }
                            }
                        ]
                    },
                    {
                        "@type": "OfferCatalog",
                        "name": "Cloud & Automation Services",
                        "itemListElement": [{
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "AI Agent Development",
                                    "description": "Custom AI agent and chatbot development",
                                    "url": "https://thenightmarketer.com/ai-agent"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Email Automation",
                                    "description": "Automated email marketing workflows",
                                    "url": "https://thenightmarketer.com/email-automation"
                                }
                            },
                            {
                                "@type": "Offer",
                                "itemOffered": {
                                    "@type": "Service",
                                    "name": "Cloud Services",
                                    "description": "Cloud setup, migration, and management",
                                    "url": "https://thenightmarketer.com/cloud"
                                }
                            }
                        ]
                    }
                ]
            }
        }
    </script>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "The Night Marketer",
            "image": "https://thenightmarketer.com/images/tnm-logo-new.png",
            "url": "https://thenightmarketer.com",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.9",

            },
            "review": [{
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Pratibha Gambhir"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "When I first heard the company's name, I  instantly fell in love with their creativity. When they can put in several creative and practical efforts for themselves, think till what extent will they go to serve their customers through their services.",
                    "datePublished": "2024-08-15"
                },
                {
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Dream Motivation"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "Working with The NightMarketer was a great experience. They are knowledgeable and professional, and they really took the time to understand my business needs. Their customer service is top-notch and I can confidently say that the work they did for me exceeded my expectations.",
                    "datePublished": "2024-07-22"
                },
                {
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Sagar Aggrawal"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "We were thoroughly impressed with their team's customer-oriented approach.",
                    "datePublished": "2024-09-10"
                },
                {
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Ujjwal Verma"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "Their intent and ability to handle uncertain circumstances are one of their key proposition.",
                    "datePublished": "2024-06-18"
                },
                {
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Angad Singh"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "The Night Marketer had guided me to the right path, which has helped me run a successful business.",
                    "datePublished": "2024-05-25"
                }
            ]
        }
    </script>



</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6F8PWK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="scroll-section">
        <div class="scroll-text">
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
    <nav class="navbar navbar-expand-lg navbar-dark px-0">

        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/Santa-The-Night-Marketer.gif') }}" loading="lazy"
                    alt="Night Marketer Logo">
            </a>

            <button class="navbar-toggler menu-toggle" type="button" id="menuToggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <!-- <li class="nav-item dropdown position-static">
                        <a class="nav-link services-toggle" href="#" role="button">
                            Services
                        </a>
                        <div class="mega-menu">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <h6>Design</h6>
                                    <a class="nav-link" href="#">UI Design</a>
                                    <a class="nav-link" href="#">UX Design</a>
                                    <a class="nav-link" href="#">Graphic Design</a>
                                    <a class="nav-link" href="#">Brand Identity</a>
                                    <a class="nav-link" href="#">CRO <span class="offer-badge">OFFER</span></a>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6>Development</h6>
                                    <a class="nav-link" href="#">Shopify</a>
                                    <a class="nav-link" href="#">WordPress</a>
                                    <a class="nav-link" href="#">Custom</a>
                                    <a class="nav-link" href="#">CRMs & ERPs</a>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6>Marketing</h6>
                                    <a class="nav-link" href="#">Social Media</a>
                                    <a class="nav-link" href="#">Google Ads <span
                                            class="offer-badge">OFFER</span></a>
                                    <a class="nav-link" href="#">Meta Ads</a>
                                    <a class="nav-link" href="#">SEO</a>
                                    <a class="nav-link" href="#">Performance</a>
                                    <a class="nav-link" href="#">Copywriting</a>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6>Automations</h6>
                                    <a class="nav-link" href="#">Social Media</a>
                                    <a class="nav-link" href="#">Go High Level</a>
                                    <a class="nav-link" href="#">Chat Bot</a>
                                    <a class="nav-link" href="#">Relevance AI</a>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link services-toggle" href="#" role="button">Services</a>
                        <div class="mega-menu">
                            <div class="row">
                                @php
                                // Fetch top-level categories with their children
                                $categories = \App\Models\Category::with('children')
                                ->whereNull('parent_id')
                                ->where('status', 1)
                                ->get();
                                @endphp

                                @foreach ($categories as $category)
                                <div class="col-lg-3 col-md-6">
                                    <h6>{{ $category->name }}</h6>
                                    @if ($category->children->isNotEmpty())
                                    @foreach ($category->children as $child)
                                    <!-- <a class="nav-link" href="{{ @$child->url }}"> -->
                                    <a class="nav-link"
                                        href="{{ rtrim(config('app.url'), '/') . '/' . ltrim($child->url, '/') }}">

                                        {{ $child->name }}
                                        @if ($child->name == 'CRO' || $child->name == 'Google Ads')
                                        <!-- <span class="offer-badge">OFFER</span> -->
                                        @endif
                                    </a>
                                    @endforeach
                                    @else
                                    <p>No subcategories available</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link services-toggle" href="#" role="button">
                            Products
                        </a>
                        <div class="mega-menu">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    {{-- <h6>Design</h6> --}}
                                    <a class="nav-link" href="{{ route('leadNets') }}">LeadNests</a>
                                    {{-- <a class="nav-link" href="#">UX Design</a>
                                    <a class="nav-link" href="#">Graphic Design</a>
                                    <a class="nav-link" href="#">Brand Identity</a>
                                    <a class="nav-link" href="#">CRO <span class="offer-badge">OFFER</span></a> --}}
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <p class="text-white">Trusted by ⭐⭐⭐⭐⭐ 2k+ Small Business Owners <br>
                                        The Complete Toolkit for Lead & Sales Management</p>
                                    {{-- <img src="{{ asset('https://thenightmarketer.com/products/assets/img/process/Leadnests_dashboard.webp') }}" alt="leadnests"> --}}
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('case-study') }}">Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.partners') }}">Clients</a>
                    </li>
                    <li class="nav-item position-relative ">
                        <a class="nav-link career-link" href="{{ route('career') }}">Career</a>
                    </li>


                </ul>
                <a href="{{ route('contact-us') }}" class="nav-link book-call-btn ms-lg-3">Contact Us</a>

            </div>
        </div>





    </nav>
    {{-- mobile menu  --}}

    <div class="mobile-menu" id="mobileMenu">
        <!-- Close Button -->
        <button class="close-button" id="closeButton">&times;</button>

        <!-- Placeholder for logo -->
        <div class="menu-logo">
            <a href="{{ route('contact-us') }}">
                <img class="img-fluid" src="{{ asset('client/images/Mobile Menu Banner.png') }}"
                    alt="mobile menu banner">
            </a>
        </div>
        <ul class="menu-list">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about-us') }}">About Us</a></li>
            @foreach ($categories as $category)
            <li class="dropdown">
                <a href="#" class="dropdown-toggle"
                    id="{{ $loop->first ? 'servicesToggle' : 'servicesToggle' . $category->name }}">{{ $category->name }}</a>
                <div class="dropdown-menu position-relative"
                    id="{{ $loop->first ? 'servicesMenu' : 'servicesMenu' . $category->name }}">
                    <div class="container ps-0 pe-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="dropdown-column">
                                    <ul>
                                        @if ($category->children->isNotEmpty())
                                        @foreach ($category->children as $child)
                                        <li>
                                            <a class=""
                                                href="{{ rtrim(config('app.url'), '/service/') . '/' . ltrim($child->url, '/') }}">
                                                {{ $child->name }}
                                                @if ($child->name == 'CRO' || $child->name == 'Google Ads')
                                                {{-- <span class="new-badge">NEW</span> --}}
                                                @endif
                                            </a>
                                        </li>
                                        @endforeach
                                        @else
                                        <li>No subcategories available</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="productsToggle">Products</a>
                <div class="dropdown-menu position-relative" id="productsMenu">
                    <div class="container ps-0 pe-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="dropdown-column">
                                    <ul>
                                        <li> <a class="nav-link" href="{{ route('leadNets') }}">LeadNests</a></li>
                                        {{-- <li>UX Design</li>
                                        <li>Graphic Design</li>
                                        <li>Brand Identity</li>
                                        <li>CRO <span class="new-badge">NEW</span></li> --}}
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </li>
            {{-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="servicesToggleDevelopment">Development</a>
                <div class="dropdown-menu position-relative" id="servicesMenuDevelopment">
                    <div class="container ps-0 pe-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="dropdown-column">
                                    <ul>
                                        <li>Shopify</li>
                                        <li>WordPress</li>
                                        <li>Custom</li>
                                        <li>CRMs & ERPs</li>
                                    </ul>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="servicesToggleMarketing">Marketing</a>
                <div class="dropdown-menu position-relative" id="servicesMenuMarketing">
                    <div class="container ps-0 pe-0">
                        <div class="row">
                 
                            <div class="col-12">
                                <div class="dropdown-column">
                                    <ul>
                                        <li>Social Media</li>
                                        <li>Google Ads <span class="new-badge">NEW</span></li>
                                        <li>Meta Ads</li>
                                        <li>SEO</li>
                                        <li>Performance</li>
                                        <li>Copywriting</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="servicesToggleAutomations">Automations</a>
                <div class="dropdown-menu position-relative" id="servicesMenuAutomations">
                    <div class="container ps-0 pe-0">
                        <div class="row">
                
                            <div class="col-6">
                                <div class="dropdown-column">
                                    <ul>
                                        <li>Social Media</li>
                                        <li>Go High Level</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li> --}}
            <li><a href="{{ route('blogs') }}">Blogs</a></li>
            <li><a href="{{ route('case-study') }}">Work</a></li>
            <li><a href="{{ route('clients.partners') }}">Clients</a></li>
            <li class="position-relative"><a class="career-link" href="{{ route('career') }}">Career</a></li>

            <a href="{{ route('contact-us') }}" class="nav-link book-call-btn ms-lg-3 fs-5">Book a Free Consultation
                Call</a>
        </ul>
    </div>

    @yield('content')


    <a class="get_btn" href="{{ route('contact-us') }}">
        <div class="rotate-box-owl">
            <div class="rotating-text-owl">
                <svg viewBox="0 0 100 100">
                    <defs>
                        <path id="textCircle" d="M 50,50 m -37,0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"
                            fill="none"></path>
                    </defs>
                    <text>
                        <textPath href="#textCircle" fill="#141318" font-size="8" textLength="225"
                            style="font-weight: 900;">- BOOK
                            YOUR CALL - LET'S DISCUSS YOUR IDEA </textPath>
                    </text>
                </svg>
            </div>
            <div class="center-image-owl">
                <img decoding="async" src="{{ asset('client/images/owl-tnm3.webp') }}" alt="owl">
            </div>
        </div>
    </a>

    <!-- 
    <a class="get_btn-2" href="javascript:void(0);" data-toggle="company-modal">
        <div class="rotate-box-owl">
            <div class="rotating-text-owl">
                <svg viewBox="0 0 100 100">
                    <defs>
                        <path id="textCircle" d="M 50,50 m -37,0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"
                            fill="none"></path>7
                    </defs>
                    <text>
                        <textPath href="#textCircle" fill="#141318" font-size="8" textLength="225"
                            style="font-weight: 900; text-transform: uppercase;">- Let's Checkout Our Company Profile </textPath>
                    </text>
                </svg>
            </div>
            <div class="center-image-owl">
                <img decoding="async" src="{{ asset('client/images/view_company_pr_light.svg') }}" alt="owl">
            </div>
        </div>
    </a> -->


    {{--

      <button type="button" class="btn btn-primary get_btn" style="right: 163px;
    color: #fff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>


      <div class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="popup-form-container">
                    <form id="ebookContactForm">
                        <input type="hidden" name="" value="">
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
                                    <input type="url" class="form-control" id="website_url" name="website_url"
                                        placeholder="Website / URL" required>
                                    <span class="text-danger error-text website_url_error"></span>
                                </div>
                            </div>
                        </div>
                    </form>
            
                    <!-- Custom Trigger Button -->
                    <div class="row mt-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <button id="" class="book-call-btn button-success-home w-100">Get a Free
                                Report</button>
                        </div>
                    </div>
            
                    <div id="successMessage" class="alert alert-success  d-none mt-3"></div>
            
            
                </div>
            </div>
          </div>
        </div>
      </div> --}}


    {{-- <div class="ccw_style9">
        <a id="whatsapp-button" target="_blank" href="https://wa.link/g4uf1e" class="img-icon-a nofocus">
            <img class="img-icon ccw-analytics entered lazyloaded" id="style-9" data-ccw="style-9" style="height: 48px;" src="{{ asset('client/images/whatsapp-icon-square.svg') }}" alt="WhatsApp chat">
    </a>
    </div> --}}

    <footer class="footer pt-5 pb-3">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <div class="mb-4 footer-address">
                        <div class="mb-3 md-lg-2 d-flex align-items-center">
                            <div class="ft_icon"><i class="bi bi-geo-alt-fill "></i></div>
                            <span class="d-block"><a
                                    href="https://maps.app.goo.gl/3FJsaZVqXfojDehx9" target="_blank">A-92 Second Floor,
                                    Wazirpur Group,
                                    Industrial Area, New Delhi – 110052</a>
                            </span>
                        </div>
                        <div class="mb-3 md-lg-2 d-flex align-items-center">
                            <div class="ft_icon"><i class="bi bi-telephone-fill "></i></div>


                            <a href="tel:+919717884659">+91-{{ @$contactDetails['phone'] }}</a>
                        </div>
                        <div class="mb-3 md-lg-2 d-flex align-items-center">
                            <div class="ft_icon"><i class="bi bi-envelope-fill "></i></div>
                            <a href="mailto:{{ @$contactDetails['email'] }}">{{ @$contactDetails['email'] }}</a>
                        </div>
                    </div>
                    <div class="footer-heading-social mb-3 mb-lg-0">


                        <!-- <ul class="list-unstyled d-flex gap-3 align-items-center mb-0">
                            <li class="pb-0"><a href="{{ route('blogs') }}">Blogs</a></li>|
                            <li class="pb-0"><a href="{{ route('about-us') }}">About</a></li>|
                            <li class="pb-0"><a href="{{ route('case-study') }}">Work</a></li>|
                            <li class="pb-0"><a href="{{ route('career') }}">Career</a></li>
                            {{-- <li><a href="#">Career</a></li> --}}
                        </ul> -->
                        <ul class="list-unstyled d-flex gap-3 align-items-center mb-0 link-slide-up">
                            <li class="pb-0"><a href="{{ route('blogs') }}"><span data-hover="Blogs">Blogs</span></a></li>|
                            <li class="pb-0"><a href="{{ route('about-us') }}"><span data-hover="About">About</span></a></li>|
                            <li class="pb-0"><a href="{{ route('case-study') }}"><span data-hover="Work">Work</span></a></li>|
                            <li class="pb-0"><a href="{{ route('career') }}"><span data-hover="Career">Career</span></a></li>
                        </ul>


                        {{-- <a href="https://test.thenightmarketer.com/contact-us" class="nav-link book-call-btn d-inline-block">Contact Us</a> --}}
                        <!-- <h2 class="mb-2 footer-heading">Say <a href="{{ route('contact-us') }}"
                                class="hello text-decoration-none">hello!</a></h2> -->
                        <h2 class="mb-2 footer-heading">
                            Say <a href="{{ route('contact-us') }}" class="hello text-decoration-none">
                                <span id="typed-hello">hello!</span>
                            </a>
                        </h2>

                        <div class="social-icons">
                            <a href="{{ @$contactDetails['linkedin'] }}" target="_blank" aria-label="LinkedIn"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                            <a href="{{ @$contactDetails['behance'] }}" target="_blank" aria-label="Behance"><i
                                    class="fa-brands fa-behance"></i></a>
                            <a href="{{ @$contactDetails['instagram'] }}" target="_blank" aria-label="Instagram"><i
                                    class="fa-brands fa-instagram"></i></a>
                            <a href="{{ @$contactDetails['facebook'] }}" target="_blank" aria-label="Facebook"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="{{ @$contactDetails['twitter'] }}" target="_blank" aria-label="Twitter"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10 col-sm-12" bis_skin_checked="1">
                        <button
                            class="book-call-btn button-success-home w-100 cro_cta_buttom mt-4"
                            id="companyProfileBtn"
                            data-bs-toggle="modal"
                            data-bs-target="#companyProfileModal">
                            Download Company Profile
                        </button>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-6 col-md-6 mb-lg-4 mb-0">
                            <h3>{{ $category->name }}</h3>
                            @if ($category->children->isNotEmpty())
                            <ul class="list-unstyled link-slide-up">
                                @foreach ($category->children as $child)
                                <li>
                                    <a href="{{ rtrim(config('app.url'), '/') . '/' . ltrim($child->url, '/') }}">
                                        <span data-hover="{{ $child->name }}">{{ $child->name }}</span>
                                    </a>
                                    @if ($child->name == 'CRO' || $child->name == 'Google Ads')
                                    <!-- <span class="offer-badge">OFFER</span> -->
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p>No subcategories available</p>
                            @endif
                        </div>
                        @endforeach

                        <!-- <div class="col-6 col-md-6 mb-4">
                            <h3>Design</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">UI Design</a></li>
                                <li><a href="#">UX Design</a></li>
                                <li><a href="#">Graphic Design</a></li>
                                <li><a href="#">Brand Identity</a></li>
                                <li><a href="#">CRO <span class="offer-badge">OFFER</span></a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-6 mb-4">
                            <h3>Development</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Shopify</a></li>
                                <li><a href="#">WordPress</a></li>
                                <li><a href="#">Custom</a></li>
                                <li><a href="#">CRMs & ERPs</a></li>
                                <li><a href="#">App Development</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-6 mb-4">
                            <h3>Marketing</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Social Media</a></li>
                                <li><a href="#">SEO</a></li>
                                <li><a href="#">Performance</a></li>
                                <li><a href="#">Content Marketing</a></li>
                                <li><a href="#">Email Marketing</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-6 mb-4">
                            <h3>Automations</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">AI Agent</a></li>
                                <li><a href="#">Custom ⁠Chatbots</a></li>
                                <li><a href="#">Ecommerce Automation with Flows</a></li>
                                <li><a href="#">Email Automations</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="col-12 text-lg-start text-center mt-1">
                    <div
                        class="d-flex copyright-section justify-content-center justify-content-lg-between justify-content-between flex-column flex-lg-row">
                        <p class="mb-2">Copyright © 2015 - 2025. All rights reserved.</p>
                        <p><a href="{{ route('terms-conditions') }}" class="text-decoration-none text-white">Terms &
                                Conditions</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="companyProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">

                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Download Company Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="companyProfileForm">
                        @csrf
                        <input type="text" class="form-control custom-input" name="name" placeholder="Full Name" required>
                        <input type="email" class="form-control custom-input" name="email" placeholder="Email" required>
                        <input type="tel" class="form-control custom-input" name="phone" placeholder="Phone" required>
                        <input type="text" class="form-control custom-input" name="company_name" placeholder="Company Name">

                        <div class="captcha-container">
                            <label class="form-label">What is {{ $a }} + {{ $b }} ?</label>
                            <input type="number" class="form-control custom-input" name="captcha_answer" placeholder="Your answer" required>
                        </div>

                        <div class="progress mt-3 d-none" id="companyProgress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                style="width:100%">
                                Processing...
                            </div>
                        </div>

                        <button type="submit" class="btn btn-submit w-100 mt-3" id="companySubmitBtn">
                            Submit & Download
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>




    <!-- 
    <div class="company-modal-overlay" id="companyModalOverlay">
    <div class="company-modal-content">
        <button class="company-close-btn" id="companyCloseBtn">&times;</button>
        
        <div class="company-modal-header">
            <h2>Company Profile</h2>
            <p>Fill the form to get our company profile</p>
        </div>

        <form id="companyProfileForm">
            <div class="company-form-group">
                <label for="companyName">Name *</label>
                <input type="text" id="companyName" name="name" placeholder="Enter your name" required>
                <span class="company-error-text" id="nameError"></span>
            </div>

            <div class="company-form-group">
                <label for="companyEmail">Email *</label>
                <input type="email" id="companyEmail" name="email" placeholder="Enter your email" required>
                <span class="company-error-text" id="emailError"></span>
            </div>

            <div class="company-form-group">
                <label for="companyPhone">Phone Number *</label>
                <input type="tel" id="companyPhone" name="phone" placeholder="Enter your phone number" required>
                <span class="company-error-text" id="phoneError"></span>
            </div>

            <button type="submit" class="company-submit-btn">Get Company Profile</button>
        </form>

        <div class="company-success-message" id="companySuccessMessage">
            Thank you! We'll send the company profile to your email shortly.
        </div>
    </div>
</div> -->

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" async></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" async></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
        integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" async>
    <!-- Add slick slider JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('client/js/isotope-docs.min.js') }}" async></script>
    <script src="{{ asset('client/js/smooth-scrollbar.js') }}" async></script>
    <!-- <script src="https://www.google.com/recaptcha/api.js" defer></script> -->

    <script>
        // var Scrollbar = window.Scrollbar;

        // // Initialize smooth scrollbar
        // Scrollbar.init(document.querySelector('#my-scrollbar'), {
        //     damping: 0.05,
        //     thumbMinSize: 20,
        //     renderByPixels: true,
        //     alwaysShowTracks: false,
        //     continuousScrolling: true
        // });
    </script>

    <script>
        $(document).ready(function() {
            $('.case-studies-slider').slick({
                dots: false,
                infinite: true,
                speed: 500,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                loop: true,
                arrows: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });


        $(document).ready(function() {
            $('.service-available-slider').slick({
                dots: false,
                infinite: true,
                speed: 500,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                loop: true,
                arrows: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });

        $(document).ready(function() {
            $('.industries-headline-wrapper').slick({
                dots: false,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                loop: true,
                arrows: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".project_silder_wapper").slick({
                infinite: true, // Infinite loop for slides
                slidesToShow: 1, // Show 3 slides (centered with adjacent visible)
                slidesToScroll: 1, // Scroll 1 slide at a time
                centerMode: true, // Center the current slide
                centerPadding: "300px",
                autoplay: true, // Enable autoplay
                autoplaySpeed: 1000,
                gap: 20,
                dots: false,
                arrows: false,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1, // Show only 1 slide on smaller screens
                            centerPadding: "60px", // Increase padding for partial adjacent slides
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1, // Show only 1 slide on smaller screens
                            centerPadding: "40px", // Adjust padding for smaller screens
                        },
                    },
                ],
            });
        });


        var isCounterAnimated = false;

        $(window).on('scroll', function() {
            var counterElement = $('#counter');
            if (counterElement.length) {
                var counterOffset = counterElement.offset().top - window.innerHeight;

                if (!isCounterAnimated && $(window).scrollTop() > counterOffset) {
                    $('.counter-value').each(function() {
                        var $this = $(this);
                        var countTo = $this.data('count'); // Use .data() to retrieve data-count attribute

                        // Using a different animation function
                        $({
                            countNum: 0
                        }).animate({
                            countNum: countTo
                        }, {
                            duration: 2000, // Changed duration to 2000ms
                            easing: 'linear', // Changed easing to linear
                            step: function(now) {
                                $this.text(Math.ceil(
                                    now
                                )); // Update the text with the current value using Math.ceil
                            },
                            complete: function() {
                                $this.text(countTo); // Ensure the final value matches exactly
                                // console.log('finished');
                            },
                        });
                    });

                    isCounterAnimated = true; // Prevent re-triggering the animation
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            const servicesToggle = document.querySelector('.services-toggle');
            const megaMenu = document.querySelector('.mega-menu');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navItems = document.querySelectorAll('.navbar-nav .nav-item.dropdown');
            const megaMenus = document.querySelectorAll('.mega-menu'); // all menus

            let lastScrollTop = 0;
            let hoverTimeout;

            // Helpers
            function hideAllMegaMenus() {
                megaMenus.forEach(m => (m.style.display = 'none'));
            }

            function toggleBlock(el) {
                el.style.display = el.style.display === 'block' ? 'none' : 'block';
            }

            // Navbar background on scroll
            window.addEventListener('scroll', () => {
                const scrollTop = window.scrollY;
                if (scrollTop > 50) {
                    if (scrollTop > lastScrollTop) {
                        navbar?.classList.add('scrolled');
                        navbar?.classList.remove('sticky');
                    } else {
                        navbar?.classList.remove('scrolled');
                        navbar?.classList.add('sticky');
                    }
                } else {
                    navbar?.classList.remove('scrolled');
                    navbar?.classList.remove('sticky');
                }
                lastScrollTop = scrollTop;
            });

            // Services toggle (mobile)
            if (servicesToggle && megaMenu) {
                servicesToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.classList.toggle('active');
                    toggleBlock(megaMenu);
                });
            }

            // ===== Rename these IDs in your HTML (no spaces or & in IDs) =====
            // id="servicesToggleDevelopment" / id="servicesMenuDevelopment"   (already fine)
            // id="servicesToggleMarketing"  / id="servicesMenuMarketing"      (already fine)
            // id="servicesToggleCloudAutomations" / id="servicesMenuCloudAutomations"  <-- changed
            // id="productsToggle" / id="productsMenu"                          (already fine)

            const servicesToggleDevelopment = document.getElementById('servicesToggleDevelopment');
            const servicesMenuDevelopment = document.getElementById('servicesMenuDevelopment');
            servicesToggleDevelopment?.addEventListener('click', function(e) {
                e.preventDefault();
                this.classList.toggle('active');
                toggleBlock(servicesMenuDevelopment);
            });

            const servicesToggleMarketing = document.getElementById('servicesToggleMarketing');
            const servicesMenuMarketing = document.getElementById('servicesMenuMarketing');
            servicesToggleMarketing?.addEventListener('click', function(e) {
                e.preventDefault();
                this.classList.toggle('active');
                toggleBlock(servicesMenuMarketing);
            });

            // CHANGED IDS (update your HTML to use these)
            const servicesToggleAutomations = document.getElementById('servicesToggleCloudAutomations');
            const servicesMenuAutomations = document.getElementById('servicesMenuCloudAutomations');
            servicesToggleAutomations?.addEventListener('click', function(e) {
                e.preventDefault();
                this.classList.toggle('active');
                toggleBlock(servicesMenuAutomations);
            });

            const productsToggle = document.getElementById('productsToggle');
            const productsMenu = document.getElementById('productsMenu');
            productsToggle?.addEventListener('click', function(e) {
                e.preventDefault();
                this.classList.toggle('active');
                toggleBlock(productsMenu);
            });

            // Desktop: only one mega menu open at a time
            if (window.matchMedia('(min-width: 992px)').matches) {
                navItems.forEach((navItem) => {
                    const dropdownMenu = navItem.querySelector('.mega-menu');
                    if (!dropdownMenu) return;

                    navItem.addEventListener('mouseenter', () => {
                        clearTimeout(hoverTimeout);
                        hideAllMegaMenus(); // close others first
                        dropdownMenu.style.display = 'block';
                    });

                    navItem.addEventListener('mouseleave', () => {
                        hoverTimeout = setTimeout(() => {
                            dropdownMenu.style.display = 'none';
                        }, 150);
                    });

                    dropdownMenu.addEventListener('mouseenter', () => clearTimeout(hoverTimeout));
                    dropdownMenu.addEventListener('mouseleave', () => {
                        hoverTimeout = setTimeout(() => {
                            dropdownMenu.style.display = 'none';
                        }, 150);
                    });
                });

                // Optional: if pointer leaves the whole navbar, close everything
                const navbarEl = document.querySelector('.navbar');
                navbarEl?.addEventListener('mouseleave', () => {
                    hoverTimeout = setTimeout(hideAllMegaMenus, 150);
                });
            }

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (window.matchMedia('(max-width: 991px)').matches) {
                    if (navbarCollapse && navbarToggler &&
                        !navbarCollapse.contains(e.target) && !navbarToggler.contains(e.target)) {
                        navbarCollapse.classList.remove('show');
                    }
                }
            });

            // Optimize animations
            if (navbarCollapse) navbarCollapse.style.willChange = 'transform';
        });

        // mobile menu
        // Get elements
        const menuToggle = document.getElementById("menuToggle");
        const closeButton = document.getElementById("closeButton");
        const mobileMenu = document.getElementById("mobileMenu");
        const servicesToggle = document.getElementById("servicesToggle");
        const servicesMenu = document.getElementById("servicesMenu");

        // Open the mobile menu
        menuToggle.addEventListener("click", function() {
            mobileMenu.classList.add("show");
        });

        // Close the mobile menu
        closeButton.addEventListener("click", function() {
            mobileMenu.classList.remove("show");
        });

        // Toggle the services dropdown menu
        servicesToggle.addEventListener("click", function(event) {
            event.preventDefault();
            servicesMenu.classList.toggle("show");
        });

        $(document).ready(function() {
            $('.growth-slider').slick({
                dots: false,
                infinite: false,
                arrows: false,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 3000,
                loop: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: false,

                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });

        $('.silder_section_work').slick({
            dots: false,
            infinite: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 3000,
            loop: true
        });

        $('.testimonial-section-right').slick({
            dots: true,
            infinite: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 3000,
            loop: true,
            slidesToShow: 1,
            slidesToScroll: 1,

        });

        $(document).ready(function() {
            $('.ozar-slick-slider').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                speed: 500,
                gap: 20,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            infinite: false,

                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });

        $('.about-us-silder').slick({
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            speed: 500,
            gap: 20,
            loop: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        gap: 20,


                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });



        $('.about-us-silder-design').slick({
            speed: 3000,
            autoplay: true,
            autoplaySpeed: 0,
            cssEase: 'linear',
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            swipe: true,
            touchMove: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });
    </script>
    <script>
        function changeTab(tabIndex) {
            const tabs = document.querySelectorAll('.tab');
            const contentDivs = document.querySelectorAll('.content > div');

            tabs.forEach(tab => tab.classList.remove('active'));
            tabs[tabIndex].classList.add('active');

            contentDivs.forEach(div => div.style.display = 'none');
            contentDivs[tabIndex].style.display = 'block';
        }
        let isDragging = false;
        let initialScrollX = 0;
        let initialMouseX = 0;

        const tabsContainer = document.getElementById('tabsContainer');

        tabsContainer.addEventListener('mousemove', (event) => {
            if (!isDragging) return;

            const deltaX = event.clientX - initialMouseX;
            tabsContainer.scrollLeft = initialScrollX - deltaX;
        });

        tabsContainer.addEventListener('mouseup', () => {
            isDragging = false;
        });

        function startDrag(event) {
            isDragging = true;
            initialScrollX = tabsContainer.scrollLeft;
            initialMouseX = event.clientX;
        }



        function scrollTabs(direction) {
            const tabsContainer = document.querySelector('.tabs-container');
            const scrollDistance = 200;

            if (direction === 'left') {
                tabsContainer.scrollLeft -= scrollDistance;
            } else if (direction === 'right') {
                tabsContainer.scrollLeft += scrollDistance;
            }
        }

        function changeTab(tabIndex) {
            const tabs = document.querySelectorAll('.tab');
            const contentDivs = document.querySelectorAll('.content > div');

            tabs.forEach(tab => tab.classList.remove('active'));
            tabs[tabIndex].classList.add('active');

            contentDivs.forEach(div => (div.style.display = 'none'));
            contentDivs[tabIndex].style.display = 'block';
        }
    </script>
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

                // Disable button & show loading text
                $('#customTriggerButton')
                    .prop('disabled', true)
                    .html('<i class="fa fa-spinner fa-spin"></i> Processing...');

                // Get hCaptcha response
                var hCaptchaResponse = hcaptcha.getResponse();

                // If hCaptcha is empty, show error and stop
                if (!hCaptchaResponse) {
                    $('.h-captcha-response_error').text('Please verify you are not a robot.');
                    $('#customTriggerButton').prop('disabled', false).html('Get a Free Report');
                    return;
                }

                // Serialize form data and add hCaptcha response
                var formData = $('#ebookContactForm').serialize() + '&h-captcha-response=' + hCaptchaResponse;

                // AJAX request
                $.ajax({
                    url: "{{ route('ebook.contact.submit') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Show success message
                            $('#successMessage').text(response.message).removeClass('d-none');
                            // Reset the form and hCaptcha
                            $('#ebookContactForm')[0].reset();
                            hcaptcha.reset();
                        } else {
                            // Display validation errors
                            $.each(response.errors, function(key, value) {
                                $('.' + key + '_error').text(value[0]);
                            });
                        }
                        // Re-enable button after success
                        $('#customTriggerButton').prop('disabled', false).html('Get a Free Report');
                    },
                    error: function(xhr) {
                        if (xhr.status === 400 && xhr.responseJSON.error) {
                            $('.h-captcha-response_error').text(xhr.responseJSON.error);
                        } else {
                            console.log(xhr.responseText);
                        }
                        // Re-enable button after failure
                        $('#customTriggerButton').prop('disabled', false).html('Get a Free Report');
                    }
                });
            }

            $('#customTriggerButton').on('click', function() {
                submitEbookForm();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to increment the share count via AJAX
            function incrementShare(blogId) {
                // console.log('Increment share function called for blog ID:', blogId);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // console.log('CSRF Token:', csrfToken);

                if (!csrfToken) {
                    console.error('CSRF token not found');
                    return;
                }

                fetch(`/blogs/${blogId}/increment-share`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // console.log('Response from server:', data);
                        if (data.status === 'success' && data.share_cnt !== null) {
                            document.getElementById(`share-counter-${blogId}`).innerText =
                                `${data.share_cnt} Shares`;
                        } else {
                            console.error('Error updating share count:', data);
                        }
                    })

                    .catch(error => console.error('Error:', error));
            }


            // Expose the function to the global scope
            window.incrementShare = incrementShare;
        });
    </script>
    <script>
        const phrases = ["hello!", "Hola!", "Bonjour!", "Hallo!", "Ciao!"];
        let i = 0;
        let letterIndex = 0;
        const typingSpeed = 120;
        const delayBetweenWords = 1500;
        const typedElement = document.getElementById("typed-hello");

        function typeWriter() {
            if (letterIndex <= phrases[i].length) {
                typedElement.textContent = phrases[i].substring(0, letterIndex++);
                setTimeout(typeWriter, typingSpeed);
            } else {
                setTimeout(() => {
                    letterIndex = 0;
                    i = (i + 1) % phrases.length;
                    typeWriter();
                }, delayBetweenWords);
            }
        }

        // Start typing after page load
        window.addEventListener("DOMContentLoaded", () => {
            typeWriter();
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('companyProfileForm');
            const progress = document.getElementById('companyProgress');
            const submitBtn = document.getElementById('companySubmitBtn');
            const modalEl = document.getElementById('companyProfileModal');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // UI states
                progress.classList.remove('d-none');
                submitBtn.disabled = true;
                submitBtn.innerText = 'Please wait...';

                fetch("{{ route('company.profile.store') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: new FormData(form)
                    })
                    .then(res => res.json())
                    .then(data => {

                        progress.classList.add('d-none');
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Submit & Download';

                        if (data.success) {

                            // ✅ Remember user in this browser
                            sessionStorage.setItem('company_profile_submitted', 'yes');

                            // ✅ Reset form
                            form.reset();

                            // ✅ Close modal
                            bootstrap.Modal.getInstance(modalEl).hide();

                            // ✅ Open PDF in blank page
                            window.location.href = data.redirect;

                        } else {
                            alert(data.message || 'Please check the form and captcha');
                        }
                    })
                    .catch(() => {
                        progress.classList.add('d-none');
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Submit & Download';
                        alert('Something went wrong. Please try again.');
                    });
            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const downloadBtn = document.getElementById('companyProfileBtn');
            const pdfUrl = "{{ route('secure.pdf.viewer', 'company-profile') }}";

            downloadBtn.addEventListener('click', function(e) {

                // If user already submitted → open PDF directly
                if (sessionStorage.getItem('company_profile_submitted') === 'yes') {
                    e.preventDefault();
                    window.open(pdfUrl, '_blank');
                    return;
                }

                // else → Bootstrap modal opens normally
            });

        });
    </script>


    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>

    @yield('pageJs')

</body>

</html>