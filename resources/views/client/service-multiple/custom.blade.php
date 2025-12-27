@extends('client.layouts.app')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="">
<link rel="stylesheet" href="{{ asset('client/service/css/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Shopify Service Page</title>

<script src="{{ asset('client/service/js/jquery.min.js') }}" loading="eager" decoding="sync"></script>
<script src="{{ asset('client/service/js/slick.min.js') }}" defer="defer"></script>

<noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</noscript>

<script defer="" src="{{ asset('client/service/js/swiper-bundle.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('client/service/css/header.css') }}">

@section('content')


<div class="bg_overly"></div>

<main id="MainContent" class="content-for-layout focus-none " role="main" tabindex="-1">

    <div id="shopify-section-template--21354087547164__main_hero_xQzBMV" class="shopify-section">
        <div class="section_template--21354087547164__main_hero_xQzBMV block__main-hero-section">
            <div class="container">
                <div class="container_content">
                    <div class="block__animation-video-cover"></div>

                    <div class="block__main-hero-wrapper">
                        <div class="block__main-hero-top">
                            <div class="block__main-hero-left">
                                <h1 class="block__main-hero-heading golden_text_inner_text">
                                    {!! $service->hero_heading ?? 'Shopify Web Design & <span>Development Company</span>' !!}
                                </h1>
                                <div class="block__main-hero-description golden_text_inner_text">
                                    {!! nl2br($service->hero_description ?? 'Official Shopify Partner | Direct Loop Partner | 150+ Live Stores | 10+ Years Experience<br><br>We build and optimize Shopify stores engineered to sell more, driving measurable growth for ambitious D2C brands.') !!}
                                </div>
                                <div class="block__main-hero-button-wrapper">
                                    <a href="{{ $service->cta1_button_link ?? 'https://thenightmarketer.com/contact-us' }}" target="_blank" class="block__golden-ouline-button">
                                        <span class="block__product-btn">
                                            {{ $service->cta1_button_text ?? 'Book a Call' }}
                                            <span class="block__product-btn-icon-wrapper">
                                                <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                    <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                    <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                                </svg>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="btn-hover">
                                                    <path d="M21 11C13.9145 14.3777 12.0973 16.6182 11.25 21" stroke="black" stroke-width="1.5"></path>
                                                    <path d="M21 11C13.9145 7.62228 12.0973 5.38178 11.25 1" stroke="black" stroke-width="1.5"></path>
                                                    <path d="M1 11C8.0855 14.3777 9.90266 16.6182 10.75 21" stroke="black" stroke-width="1.5"></path>
                                                    <path d="M1 11C8.0855 7.62228 9.90266 5.38178 10.75 1" stroke="black" stroke-width="1.5"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
                                    <div class="block__main-hero-ag-star-image">
                                        <img src="{{ asset('client/service/images/image_711_1_1.png') }}" alt="Shopify Platinum Partner" srcset="{{ asset('client/service/images/image_711_1_1.png') }}" width="320" height="110">
                                    </div>
                                </div>
                            </div>

                            <div class="block__main-hero-cards">
                                {{-- Card 1 --}}
                                <div class="block__main-hero-card">
                                    <div class="block__main-hero-card-content">
                                        <img src="{{ $service->card1_icon ? asset('storage/' . $service->card1_icon) : asset('client/service/images/mh-card-icon-1.svg') }}" alt="" class="block__main-hero-card-icon">
                                        <h4 class="block__main-hero-card-title">
                                            {{ $service->card1_title ?? 'I need to Improve My Shopify Store' }}
                                        </h4>
                                        <div class="block__main-hero-card-sub-title">
                                            {{ $service->card1_subtitle ?? 'Need to move fast? Buy Bulk Hours and Start Today.' }}
                                        </div>
                                    </div>
                                    <div class="block__main-hero-card-button-wrapper">
                                        <a href="{{ $service->card1_button_link ?? 'https://thenightmarketer.com/contact-us' }}" target="_blank" class="block__main-hero-card-button">
                                            <span class="block__main-hero-card-button-inner small-hide">
                                                {{ $service->card1_button_text ?? 'Buy Bulk Hours' }}
                                                <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                    <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                    <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                                </svg>
                                            </span>
                                            <span class="block__main-hero-card-button-inner golden_text_inner_text large-up-hide medium-hide">
                                                Free<span>Audit</span>
                                                <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                    <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                    <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="block__main-hero-card-bottom-text small-hide">
                                            <p>{!! $service->card1_note ?? 'Unsure? <a href="https://thenightmarketer.com/contact-us" target="_blank">Get a Free Quote</a>' !!}</p>
                                        </div>
                                        <div class="block__main-hero-card-bottom-text large-up-hide medium-hide">
                                            <p>{!! $service->card1_note ?? 'Unsure? <a href="https://thenightmarketer.com/contact-us" target="_blank">Get a Free Quote</a>' !!}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Card 2 --}}
                                <div class="block__main-hero-card">
                                    <div class="block__main-hero-card-content">
                                        <img src="{{ $service->card2_icon ? asset('storage/' . $service->card2_icon) : asset('client/service/images/mh-card-icon-2.svg') }}" alt="" class="block__main-hero-card-icon">
                                        <h4 class="block__main-hero-card-title">
                                            {{ $service->card2_title ?? 'I need to Build a New Shopify Store' }}
                                        </h4>
                                        <div class="block__main-hero-card-sub-title">
                                            {{ $service->card2_subtitle ?? "We'll start building it for free, scope it, quote it, and get you a game plan." }}
                                        </div>
                                    </div>
                                    <div class="block__main-hero-card-button-wrapper">
                                        <a href="{{ $service->card2_button_link ?? 'https://thenightmarketer.com/contact-us' }}" target="_blank" class="block__main-hero-card-button">
                                            <span class="block__main-hero-card-button-inner small-hide">
                                                {{ $service->card2_button_text ?? 'Start Free Prototype' }}
                                                <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                    <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                    <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                                </svg>
                                            </span>
                                            <span class="block__main-hero-card-button-inner golden_text_inner_text large-up-hide medium-hide">
                                                Free<span>Prototype</span>
                                                <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                    <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                    <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="block__main-hero-card-bottom-text small-hide">
                                            <p>{!! $service->card2_note ?? 'Looking to <a href="https://thenightmarketer.com/contact-us" target="_blank">Migrate</a> to Shopify?' !!}</p>
                                        </div>
                                        <div class="block__main-hero-card-bottom-text large-up-hide medium-hide">
                                            <p>{!! $service->card2_note ?? 'Looking to <a href="https://thenightmarketer.com/contact-us" target="_blank">Migrate</a> to Shopify?' !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Marquee Section --}}
                        <div class="block__main-hero-marquee-wrapper">
                            @php
                            $marqueeItems = $service->marquee_items ?? [
                            'Official Shopify Partner',
                            '150+ Live Stores',
                            '$56M+ Revenue Generated',
                            'Direct Loop Partner',
                            '10+ Years Experience'
                            ];
                            @endphp

                            @foreach($marqueeItems as $item)
                            <div class="block__main-hero-marquee-text">
                                <span class="block__main-hero-marquee-dot"></span>
                                <span class="block__main-hero-marquee-content">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>

                        {{-- Stats Section - Keep existing stats from your stats field --}}
                        @if($service->stats && count($service->stats) > 0)
                        <div class="block__main-hero-inner-bottom">
                            @foreach($service->stats as $stat)
                            <a href="/pages/casestudies" class="block__main-hero-inner-bottom-item" target="_blank">
                                <div class="block__main-hero-inner-bottom-item-wrapper">
                                    <div class="block__main-hero-inner-bottom-item-title">
                                        {{ $stat['title'] }}
                                    </div>
                                    <div class="block__main-hero-inner-bottom-item-value-wrapper">
                                        <sup class="block__main-hero-inner-bottom-item-inc-value">
                                            <img src="{{ asset('client/service/images/ross-golden-arrow.svg') }}" alt="">
                                            {{ $stat['value'] }} <span>{{ $stat['improvement'] ?? 'improvement' }}</span>
                                        </sup>
                                    </div>
                                </div>
                                <img src="{{ asset('client/service/images/chart-img.png') }}" alt="{{ $stat['title'] }}" class="block__main-hero-inner-bottom-item-chart">
                            </a>
                            @endforeach
                        </div>
                        @endif

                        {{-- Logo Section - Keep static --}}
                        <div class="block__main-hero-inner-logos">
                            <div class="block__main-hero-inner-logo-item">
                                <img src="{{ asset('client/service/images/main-hero-logo-1.png') }}" alt="logo">
                            </div>
                            <div class="block__main-hero-inner-logo-item">
                                <img src="{{ asset('client/service/images/main-hero-logo-2.png') }}" alt="logo">
                            </div>
                            <div class="block__main-hero-inner-logo-item">
                                <img src="{{ asset('client/service/images/main-hero-logo-3.png') }}" alt="logo">
                            </div>
                            <div class="block__main-hero-inner-logo-item">
                                <img src="{{ asset('client/service/images/main-hero-logo-4.png') }}" alt="logo">
                            </div>
                            <div class="block__main-hero-inner-logo-item">
                                <img src="{{ asset('client/service/images/main-hero-logo-5.png') }}" alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('client/service/js/main-hero.js') }}" type="text/javascript"></script>
    </div>

    {{-- Section One: Full Section with Items --}}
    @php
    $sectionOne = $service->sections->where('section_type', 'section_one')->first();
    @endphp

    @if($sectionOne)
    {{-- Section One Header --}}
    <div id="shopify-section-template--21354087547164__innovative_brands_WhzGiH" class="shopify-section section">
        <div class="section__template--21354087547164__innovative_brands_WhzGiH block__innovative-brands-section">
            <div class="container">
                <div class="block__innovative-brands-box">
                    <div class="block__innovative-brands-title">
                        <h3>{{ $sectionOne->title }}</h3>
                        <div class="block__innovative-brands-caption">
                            <p>{{ $sectionOne->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Section One Items (AI Competitive Section) --}}
    @if($sectionOne->items && $sectionOne->items->count() > 0)
    <div id="shopify-section-template--21354087547164__ai_competitive_pjYCdk" class="shopify-section">
        <div class="section_template--21354087547164__ai_competitive_pjYCdk block__ai-competitive-section">
            <div class="container">
                <div class="container_content">
                    <div class="block__ai-competitive-wrapper">
                        <div class="block__ai-competitive-left">
                            <div class="block__ai-competitive-header">
                                <h2 class="block__ai-competitive-heading">
                                    {{ $sectionOne->items->first()->title ?? 'Gain a Competitive Edge with The Night Marketer' }}
                                </h2>
                                <p>{{ $sectionOne->items->first()->description ?? 'Arctic Grey offers specialized optimizations like UX/UI audits, speed enhancements, mobile-first themes, and custom apps to ensure real-time synchronization and personalized experiences, while also handling complex setups such as loyalty programs, product customizers, and in-store kiosks that bridge online and offline retail.' }}</p>
                            </div>

                            <div class="block__ai-competitive-tab-wrapper">
                                @foreach($sectionOne->items->skip(1) as $index => $item)
                                <div class="block__ai-competitive-tab-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="block__ai-competitive-tab-header">
                                        <h4>{{ $item->title }}</h4>
                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('client/service/images/competitive-' . ($index + 1) . '.svg') }}"
                                            alt=""
                                            loading="lazy"
                                            decoding="async"
                                            width="40"
                                            height="40">
                                    </div>
                                    <div class="block__ai-competitive-tab-content" {{ $index === 0 ? 'style=display:block;' : '' }}>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="block__ai-competitive-right">
                            {{-- Keep images static as requested --}}
                            <img src="{{ asset('client/service/images/AG_desktop.png') }}"
                                alt=""
                                srcset="{{ asset('client/service/images/AG_desktop_1.png') }} 352w, {{ asset('client/service/images/AG_desktop.png') }} 780w"
                                width="780"
                                height="845"
                                loading="lazy"
                                class="small-hide"
                                decoding="async">
                            <img src="{{ asset('client/service/images/Ag_mo.png') }}"
                                alt=""
                                srcset="{{ asset('client/service/images/Ag_mo_1.png') }} 352w, {{ asset('client/service/images/Ag_mo.png') }} 800w"
                                width="800"
                                height="632"
                                loading="lazy"
                                class="large-up-hide medium-hide"
                                decoding="async">

                            <div class="block__ai-competitive-box">
                                <div class="block__ai-competitive-box-header">
                                    <h4 class="text-white">150+</h4>
                                    <p class="text-white">Shopify Stores Built</p>
                                </div>
                                <div class="block__ai-competitive-logo-slider">
                                    {{-- Keep logos static as requested --}}
                                    <div class="block__ai-competitive-logo-slide-image">
                                        <img src="https://thenightmarketer.com/storage/client/logos/Ruchoks01.svg"
                                            alt="Ruchoks"
                                            srcset="https://thenightmarketer.com/storage/client/logos/Ruchoks01.svg 107w, https://thenightmarketer.com/storage/client/logos/Ruchoks01.svg 352w"
                                            width="107" height="34" loading="lazy">
                                    </div>
                                    <div class="block__ai-competitive-logo-slide-image">
                                        <img src="https://thenightmarketer.com/client/images/clients/rajdhani.svg"
                                            alt="Rajdhani"
                                            srcset="https://thenightmarketer.com/client/images/clients/rajdhani.svg 123w, https://thenightmarketer.com/client/images/clients/rajdhani.svg 352w"
                                            width="123" height="20" loading="lazy">
                                    </div>
                                    <div class="block__ai-competitive-logo-slide-image">
                                        <img src="https://thenightmarketer.com/storage/client/logos/Farmerr01.svg"
                                            alt="Farmerr"
                                            srcset="https://thenightmarketer.com/storage/client/logos/Farmerr01.svg 107w, https://thenightmarketer.com/storage/client/logos/Farmerr01.svg 352w"
                                            width="107" height="31" loading="lazy">
                                    </div>
                                    <div class="block__ai-competitive-logo-slide-image">
                                        <img src="https://thenightmarketer.com/client/images/clients/fuel-your-body.svg"
                                            alt="Fuel Your Body"
                                            srcset="https://thenightmarketer.com/client/images/clients/fuel-your-body.svg 113w, https://thenightmarketer.com/client/images/clients/fuel-your-body.svg 352w"
                                            width="113" height="30" loading="lazy">
                                    </div>
                                    <div class="block__ai-competitive-logo-slide-image">
                                        <img src="https://thenightmarketer.com/storage/client/logos/NUTRISEED.svg"
                                            alt="Nutri Seed"
                                            srcset="https://thenightmarketer.com/storage/client/logos/NUTRISEED.svg 79w, https://thenightmarketer.com/storage/client/logos/NUTRISEED.svg 352w"
                                            width="79" height="28" loading="lazy">
                                    </div>
                                    <div class="block__ai-competitive-logo-slide-image">
                                        <img src="https://thenightmarketer.com/storage/client/logos/french-factor.svg"
                                            alt="French Factor"
                                            srcset="https://thenightmarketer.com/storage/client/logos/french-factor.svg 198w, https://thenightmarketer.com/storage/client/logos/french-factor.svg 352w"
                                            width="198" height="56" loading="lazy">
                                    </div>
                                    <div class="block__ai-competitive-logo-slide-image">
                                        <img src="https://thenightmarketer.com/storage/client/logos/Secondaid-logo-final01.svg"
                                            alt="Secondaid"
                                            srcset="https://thenightmarketer.com/storage/client/logos/Secondaid-logo-final01.svg 72w, https://thenightmarketer.com/storage/client/logos/Secondaid-logo-final01.svg 352w"
                                            width="72" height="39" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif


    {{-- Section Two: Reasons Section --}}
    @php
    $sectionTwo = $service->sections->where('section_type', 'section_two')->first();
    @endphp

    @if($sectionTwo)
    <section class="reasons-section">
        <div class="reasons-title">
            <h2>{{ $sectionTwo->title }}</h2>
            <p class="text-dark text-justify">{{ $sectionTwo->description }}</p>
        </div>

        @if($sectionTwo->items && $sectionTwo->items->count() > 0)
        <div class="reasons-grid">
            @foreach($sectionTwo->items as $item)
            <div class="reason-card">
                <div class="card-icon">
                    @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" width="40" height="40">
                    @else
                    {{ $item->icon ?? '💻' }}
                    @endif
                </div>
                <h3>{{ $item->title }}</h3>
                <p class="text-dark text-start">{{ $item->description }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </section>
    @endif
    <div id="shopify-section-template--21354087547164__tasks_completed_GQcReV" class="shopify-section">
        <div class="container-fluid" style="padding:0;">
            <!-- include -->
            @include('client.service-multiple.partials.why_leading')
            <!-- include end -->
            {{-- Section Three: Process Section --}}
            @php
            $sectionThree = $service->sections->where('section_type', 'section_three')->first();
            @endphp

            @if($sectionThree)
            <div id="shopify-section-template--21354087547164__ai_process_6GqQVw" class="shopify-section" style="background-color: #00BE75">
                <div class="section_template--21354087547164__ai_process_6GqQVw block__ai-process-section">
                    <div class="container">
                        <div class="container_content container">
                            <h2 class="block__ai-process-heading text-white">{{ $sectionThree->title }}</h2>

                            @if($sectionThree->items && $sectionThree->items->count() > 0)
                            {{-- Desktop Version --}}
                            <div class="block__ai-process-wrapper small-hide medium-hide">
                                @foreach($sectionThree->items as $index => $item)
                                <div class="block__ai-process-item {{ $index === 0 ? 'active' : '' }}"
                                    style="background-image: url('{{ $item->image ? asset('storage/' . $item->image) : asset('client/service/images/process-' . ($index + 1) . '.png') }}')">
                                    <div class="block__ai-process-header">
                                        <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        <span>{{ $item->title }}</span>
                                    </div>
                                    <div class="block__ai-process-description">
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- Mobile Version (Accordion) --}}
                            <div class="block__ai-process-acco-wrapper large-up-hide">
                                @foreach($sectionThree->items as $index => $item)
                                <div class="block__ai-process-acco-item {{ $index === 0 ? 'active' : '' }}"
                                    style="background-image: url('{{ $item->image ? asset('storage/' . $item->image) : asset('client/service/images/back-tab-' . ($index + 1) . '.png') }}')">
                                    <div class="block__ai-process-acco-header">
                                        <div class="block__ai-process-acco-title">
                                            <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            <span>{{ $item->title }}</span>
                                        </div>
                                        <img src="{{ asset('client/service/images/icon-aoo-open.svg') }}" class="icon-ai-open" alt="" loading="lazy" decoding="async">
                                        <img src="{{ asset('client/service/images/icon-acco-right-arrow.svg') }}" class="icon-ai-right-arrow" alt="" loading="lazy" decoding="async">
                                    </div>
                                    <div class="block__ai-process-acco-description" {{ $index === 0 ? 'style=display:block' : '' }}>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div id="shopify-section-template--21354087547164__ai_powered_heading_phc8iM"
                class="shopify-section ai-powered-section">
                <div
                    class="section_template--21354087547164__ai_powered_heading_phc8iM block_ai-powered-heading-section">
                    <div class="container">
                        <div class="container_content pb-1"><img src="{{ asset('client/service/images/yellow-logo.svg')}}" alt="" loading="lazy"
                                decoding="async" width="292" height="386" class="block_ai-powered-icon"
                                data-animate-on-scroll="">
                            <div class="block_ai-powered-sub-heading mt-5">
                                Everything you need to sell, scale, and succeed
                            </div>
                            <h2 class="block_ai-powered-heading text-dark">
                                Our Suite of Services are Sweet

                                <img src="{{ asset('client/service/images/image_718.png')}}" alt="" srcset="{{ asset('client/service/images/image_718_1.png')}} 61w"
                                    width="61" height="57" loading="lazy">

                            </h2>
                        </div>
                    </div>
                </div>

                <script defer="">
                    document.addEventListener('DOMContentLoaded', function() {
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    entry.target.classList.add('animate-in');
                                    observer.unobserve(entry.target);
                                }
                            });
                        }, {
                            threshold: 0.3,
                            rootMargin: '0px 0px -20% 0px'
                        });

                        const animateElements = document.querySelectorAll('[data-animate-on-scroll]');
                        animateElements.forEach(el => observer.observe(el));
                    });
                </script>
            </div>
            {{-- Section Four: AI Powered Build Section --}}
            @php
            $sectionFour = $service->sections->where('section_type', 'section_four')->first();
            @endphp

            @if($sectionFour)
            <div id="shopify-section-template--21354087547164__ai_powered_build_LT8HGL" class="shopify-section ai-powered-section">
                <div class="section_template--21354087547164__ai_powered_build_LT8HGL block__ai-powered-build-section">
                    <div class="container">
                        <div class="container_content">
                            <div class="block__ai-powered-build-wrapper">
                                <div class="block__ai-powered-tabs">
                                    <h3 class="block__ai-powered-tabs-heading text-start">{{ $sectionFour->title }}</h3>
                                    <p class="text-start">{{ $sectionFour->description }}</p>

                                    @if($sectionFour->items && $sectionFour->items->count() > 0)
                                    <div class="block__ai-powered-tab-wrapper">
                                        @foreach($sectionFour->items as $item)
                                        <div class="block__ai-powered-tab">
                                            <h4 class="fix-width">{{ $item->title }}</h4>
                                            <p style="font-size:14px; margin-top:5px; color:#555; text-align: justify;">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <a href="{{ $service->cta2_button_link ?? 'https://thenightmarketer.com/contact-us' }}" class="block__product-btn">
                                        {{ $service->cta2_button_text ?? 'Start Your Shopify Test Drive' }}
                                        <span class="block__product-btn-icon-wrapper">
                                            <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                            </svg>
                                            <svg class="icon-ai-open" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 11C13.9145 14.3777 12.0973 16.6182 11.25 21" stroke="url(#template--21354087547164__ai_powered_build_LT8HGLpaint0_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M21 11C13.9145 7.62228 12.0973 5.38178 11.25 1" stroke="url(#template--21354087547164__ai_powered_build_LT8HGLpaint1_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M1 11C8.0855 14.3777 9.90266 16.6182 10.75 21" stroke="url(#template--21354087547164__ai_powered_build_LT8HGLpaint2_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M1 11C8.0855 7.62228 9.90266 5.38178 10.75 1" stroke="url(#template--21354087547164__ai_powered_build_LT8HGLpaint3_linear_3077_14079)" stroke-width="1.5"></path>
                                                <defs>
                                                    <linearGradient id="template--21354087547164__ai_powered_build_LT8HGLpaint0_linear_3077_14079" x1="11.25" y1="16.0376" x2="21" y2="16.0376" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_build_LT8HGLpaint1_linear_3077_14079" x1="11.25" y1="5.96241" x2="21" y2="5.96241" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_build_LT8HGLpaint2_linear_3077_14079" x1="10.75" y1="16.0376" x2="1" y2="16.0376" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_build_LT8HGLpaint3_linear_3077_14079" x1="10.75" y1="5.96241" x2="1" y2="5.96241" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="block__ai-powered-build-slider">
                                    <div class="block__ai-powered-build-slider-wrapper">
                                        <div class="block__ai-powered-build-slide">
                                            <img src="{{ $sectionFour->image ? asset('storage/' . $sectionFour->image) : asset('client/service/images/rajdhani-img-1.png') }}" alt="{{ $sectionFour->title }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- Section Five: Task Section with Video --}}
            @php
            $sectionFive = $service->sections->where('section_type', 'section_five')->first();
            @endphp

            @if($sectionFive)
            <div id="shopify-section-template--21354087547164__ai_powered_task_arrqKf" class="shopify-section ai-powered-section">
                <script>
                    function toggleVideoPopUp() {
                        console.log('asd')
                        if (document.querySelector(".video_popup").style.display == "block") {
                            document.querySelector(".video_overlay").style.display = "none";
                            document.querySelector(".video_popup").style.display = "none";
                            document.querySelector(".video_popup video").pause();
                        } else {
                            document.querySelector(".video_overlay").style.display = "block";
                            document.querySelector(".video_popup").style.display = "block";
                            document.querySelector(".video_popup").innerHTML = `<video playsinline="true" controls="controls" class="video-landing-box-image-wrapper-cover-video-tag" loading="lazy" preload="metadata" poster="//arcticgrey.com/cdn/shop/files/preview_images/video_cover_2048x.png?v=1702871905"><source src="//arcticgrey.com/cdn/shop/videos/c/vp/49ffd468f14047779af77a496aefa2ea/49ffd468f14047779af77a496aefa2ea.HD-1080p-2.5Mbps-21351893.mp4?v=0" type="video/mp4"><img src="//arcticgrey.com/cdn/shop/files/preview_images/video_cover_2048x.png?v=1702871905"></video>`;
                            document.querySelector(".video_popup video").play();
                        }
                    }
                </script>
                <div class="section_template--21354087547164__ai_powered_task_arrqKf block__ai-powered-task-section mt-3">
                    <div class="container">
                        <div class="container_content">
                            <div class="block__ai-powered-task-wrapper">
                                <div class="video_overlay" onclick="toggleVideoPopUp()"></div>
                                <div class="video_popup"></div>

                                {{-- Keep Video Static --}}
                                <div class="block__ai-powered-task-video block__task-video-box">
                                    <video playsinline="true" class="video-landing-box-image-wrapper-cover-video-tag" loading="lazy" preload="metadata" poster="//arcticgrey.com/cdn/shop/files/preview_images/video_cover_2048x.png?v=1702871905">
                                        <source src="media/49ffd468f14047779af77a496aefa2ea.HD-1080p-2.5Mbps-21351893.mp4" type="video/mp4">
                                        <img src="{{ asset('client/service/images/video_cover_2048x.png') }}">
                                    </video>
                                </div>

                                {{-- Dynamic Content --}}
                                <div class="block__ai-powered-tabs">
                                    <h3 class="block__ai-powered-tabs-heading">{!! nl2br(e($sectionFive->title)) !!}</h3>
                                    <p>{!! $sectionFive->description !!}</p>

                                    @if($sectionFive->items && $sectionFive->items->count() > 0)
                                    <div class="block__ai-powered-tab-wrapper">
                                        @foreach($sectionFive->items as $index => $item)
                                        <a href="{{ $item->link ?? 'https://thenightmarketer.com/contact-us' }}" class="block__ai-powered-tab">
                                            {{ $item->title }}
                                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('client/service/images/task-' . ($index + 1) . '.svg') }}" alt="" loading="lazy" decoding="async">
                                        </a>
                                        @endforeach
                                    </div>
                                    @endif

                                    <a href="{{ $service->cta1_button_link ?? 'https://thenightmarketer.com/contact-us' }}" class="block__product-btn">
                                        {{ $service->cta1_button_text ?? 'Get a Free Quote' }}
                                        <span class="block__product-btn-icon-wrapper">
                                            <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                            </svg>
                                            <svg class="icon-ai-open" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 11C13.9145 14.3777 12.0973 16.6182 11.25 21" stroke="url(#template--21354087547164__ai_powered_task_arrqKfpaint0_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M21 11C13.9145 7.62228 12.0973 5.38178 11.25 1" stroke="url(#template--21354087547164__ai_powered_task_arrqKfpaint1_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M1 11C8.0855 14.3777 9.90266 16.6182 10.75 21" stroke="url(#template--21354087547164__ai_powered_task_arrqKfpaint2_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M1 11C8.0855 7.62228 9.90266 5.38178 10.75 1" stroke="url(#template--21354087547164__ai_powered_task_arrqKfpaint3_linear_3077_14079)" stroke-width="1.5"></path>
                                                <defs>
                                                    <linearGradient id="template--21354087547164__ai_powered_task_arrqKfpaint0_linear_3077_14079" x1="11.25" y1="16.0376" x2="21" y2="16.0376" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_task_arrqKfpaint1_linear_3077_14079" x1="11.25" y1="5.96241" x2="21" y2="5.96241" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_task_arrqKfpaint2_linear_3077_14079" x1="10.75" y1="16.0376" x2="1" y2="16.0376" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_task_arrqKfpaint3_linear_3077_14079" x1="10.75" y1="5.96241" x2="1" y2="5.96241" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @include('client.service-multiple.partials.seamless_migrations')

            {{-- Section Six: Image with Tabs Section --}}
            @php
            $sectionSix = $service->sections->where('section_type', 'section_six')->first();
            @endphp

            @if($sectionSix)
            <div id="shopify-section-template--21354087547164__ai_powered_img_tab_NPdxhP" class="shopify-section ai-powered-section">
                <div class="section_template--21354087547164__ai_powered_img_tab_NPdxhP block__ai-powered-img-with-tab-section">
                    <div class="container">
                        <div class="container_content">
                            <div class="block__ai-powered-img-with-tab-wrapper">
                                {{-- Dynamic Main Image --}}
                                <div class="block__ai-powered-img-with-tab-image">
                                    <img src="{{ $sectionSix->image ? asset('storage/' . $sectionSix->image) : asset('client/service/images/ai-shopify-apps.png') }}"
                                        width="1474"
                                        height="1142"
                                        loading="lazy"
                                        decoding="async"
                                        alt="{{ $sectionSix->title }}">
                                </div>

                                {{-- Dynamic Content --}}
                                <div class="block__ai-powered-tabs">
                                    <h3 class="block__ai-powered-tabs-heading text-left">{!! $sectionSix->title !!}</h3>
                                    <p class="text-start">{{ $sectionSix->description }}</p>

                                    @if($sectionSix->items && $sectionSix->items->count() > 0)
                                    <div class="block__ai-powered-tab-wrapper">
                                        @foreach($sectionSix->items as $index => $item)
                                        <div class="block__ai-powered-tab">
                                            {{ $item->title }}
                                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('client/service/images/tabimage-' . ($index + 1) . '.svg') }}"
                                                alt="{{ $item->title }}"
                                                loading="lazy"
                                                decoding="async">
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <a href="{{ $service->cta2_button_link ?? 'https://thenightmarketer.com/contact-us' }}"
                                        target="_blank"
                                        class="block__product-btn">
                                        {{ $service->cta2_button_text ?? 'Learn More about' }}
                                        <span class="block__product-btn-icon-wrapper">
                                            <svg class="icon-right-white" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 11C12.9145 14.3777 11.0973 16.6182 10.25 21" stroke="white" stroke-width="1.5"></path>
                                                <path d="M20 11C12.9145 7.62228 11.0973 5.38178 10.25 1" stroke="white" stroke-width="1.5"></path>
                                                <line x1="6.55671e-08" y1="11.25" x2="20" y2="11.25" stroke="white" stroke-width="1.5"></line>
                                            </svg>
                                            <svg class="icon-ai-open" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 11C13.9145 14.3777 12.0973 16.6182 11.25 21" stroke="url(#template--21354087547164__ai_powered_img_tab_NPdxhPpaint0_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M21 11C13.9145 7.62228 12.0973 5.38178 11.25 1" stroke="url(#template--21354087547164__ai_powered_img_tab_NPdxhPpaint1_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M1 11C8.0855 14.3777 9.90266 16.6182 10.75 21" stroke="url(#template--21354087547164__ai_powered_img_tab_NPdxhPpaint2_linear_3077_14079)" stroke-width="1.5"></path>
                                                <path d="M1 11C8.0855 7.62228 9.90266 5.38178 10.75 1" stroke="url(#template--21354087547164__ai_powered_img_tab_NPdxhPpaint3_linear_3077_14079)" stroke-width="1.5"></path>
                                                <defs>
                                                    <linearGradient id="template--21354087547164__ai_powered_img_tab_NPdxhPpaint0_linear_3077_14079" x1="11.25" y1="16.0376" x2="21" y2="16.0376" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_img_tab_NPdxhPpaint1_linear_3077_14079" x1="11.25" y1="5.96241" x2="21" y2="5.96241" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_img_tab_NPdxhPpaint2_linear_3077_14079" x1="10.75" y1="16.0376" x2="1" y2="16.0376" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="template--21354087547164__ai_powered_img_tab_NPdxhPpaint3_linear_3077_14079" x1="10.75" y1="5.96241" x2="1" y2="5.96241" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7D379"></stop>
                                                        <stop offset="0.130208" stop-color="#E9BE65"></stop>
                                                        <stop offset="0.234375" stop-color="#F5E583"></stop>
                                                        <stop offset="0.387985" stop-color="#C89447"></stop>
                                                        <stop offset="0.4606" stop-color="#DCAB57"></stop>
                                                        <stop offset="0.546183" stop-color="#D6A453"></stop>
                                                        <stop offset="0.639546" stop-color="#F7D87B"></stop>
                                                        <stop offset="0.735503" stop-color="#A57331"></stop>
                                                        <stop offset="0.834053" stop-color="#C18D42"></stop>
                                                        <stop offset="1" stop-color="#C08A41"></stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

    {{-- Section Seven: Case Study Section --}}
@php
    $sectionSeven = $service->sections->where('section_type', 'section_seven')->first();
@endphp

@if($sectionSeven)
<section class="case-study-section">
    <div class="container-sm">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="case-mockup-wrapper position-relative">
                    <div class="mockup-shadow"></div>
                    <img src="{{ $sectionSeven->image ? asset('storage/' . $sectionSeven->image) : asset('client/service/images/fyb-cs.png') }}" 
                         alt="{{ $sectionSeven->title }}"
                         class="img-fluid position-relative z-2 rounded-4 shadow-lg app-image">

                    <div class="stat-badge-float">
                        <span class="fw-bold">2.3x</span> Growth
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-lg-5">

                {{-- Keep Apps Static --}}
                <div class="d-flex align-items-center mb-4 flex-wrap gap-3">
                    <span class="fw-bold small text-dark">Apps we used:</span>
                    <div class="tech-icons">
                        <span class="tech-item"><img src="{{ asset('client/service/images/shopify-icon.svg') }}" alt="Shopify"></span>
                        <span class="tech-item"><img src="{{ asset('client/service/images/loop-icon.svg') }}" alt="Loop"></span>
                        <span class="tech-item"><img src="{{ asset('client/service/images/figma-icon.svg') }}" alt="Figma"></span>
                        <span class="tech-item"><img src="{{ asset('client/service/images/miro-icon.svg') }}" alt="Miro"></span>
                    </div>
                </div>

                {{-- Dynamic Title --}}
                <h2 class="section-title mb-4">
                    {!! nl2br(e($sectionSeven->title)) !!}
                </h2>

                {{-- Dynamic Link from Section Description --}}
                @if($sectionSeven->description)
                <a href="{{ $sectionSeven->description }}" target="_blank" class="view-study-link mb-5 d-inline-block">
                    View Case Study <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
                @endif

                {{-- Dynamic Testimonial from Items --}}
                @if($sectionSeven->items && $sectionSeven->items->count() >= 2)
                    @php
                        $quote = $sectionSeven->items->get(0); // First item = quote
                        $person = $sectionSeven->items->get(1); // Second item = person details
                    @endphp
                    <div class="testimonial-block">
                        <p class="quote-text mb-4">
                            "{{ $quote->title }}"
                        </p>

                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ $person->image ? asset('storage/' . $person->image) : 'https://randomuser.me/api/portraits/men/32.jpg' }}" 
                                 alt="{{ $person->title }}"
                                 class="author-avatar rounded-circle">
                            <div>
                                <h6 class="mb-0 fw-bold">{{ $person->title }}</h6>
                                <small class="text-muted">{{ $person->description }}</small>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>
</section>
@endif


            @if($service->faqs && $service->faqs->isNotEmpty())
            <section class="faq-section">
                <div class="faq-container">
                    <h2 class="faq-title">Frequently asked questions</h2>

                    <div class="faq-list">
                        @foreach($service->faqs as $key => $faq)
                        @php
                        $isOpen = $key === 0; // First FAQ open by default
                        @endphp

                        <article class="faq-item {{ $isOpen ? 'is-open' : '' }}">
                            <button
                                class="faq-header"
                                aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
                                aria-controls="faq-panel-{{ $key }}"
                                id="faq-trigger-{{ $key }}">
                                <span class="faq-question">
                                    {{ $faq->question }}
                                </span>
                                <span class="faq-icon" aria-hidden="true"></span>
                            </button>

                            <div
                                class="faq-body"
                                id="faq-panel-{{ $key }}"
                                role="region"
                                aria-labelledby="faq-trigger-{{ $key }}"
                                style="max-height: {{ $isOpen ? 'none' : '0px' }};">
                                <p class="text-start">
                                    {!! nl2br(e($faq->answer)) !!}
                                </p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif

</main>



<script>
    AOS.init();
    window.addEventListener('load', AOS.refresh);
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const faqItems = document.querySelectorAll(".faq-item");

        function closeItem(item) {
            const button = item.querySelector(".faq-header");
            const body = item.querySelector(".faq-body");

            item.classList.remove("is-open");
            button.setAttribute("aria-expanded", "false");
            body.style.maxHeight = "0px";
        }

        function openItem(item) {
            const button = item.querySelector(".faq-header");
            const body = item.querySelector(".faq-body");

            item.classList.add("is-open");
            button.setAttribute("aria-expanded", "true");
            body.style.maxHeight = body.scrollHeight + "px";
        }

        // Initialize all FAQ items
        faqItems.forEach((item, index) => {
            const body = item.querySelector(".faq-body");
            const button = item.querySelector(".faq-header");

            // First item should be open by default
            if (index === 0) {
                item.classList.add("is-open");
                button.setAttribute("aria-expanded", "true");
                body.style.maxHeight = body.scrollHeight + "px";
            } else {
                item.classList.remove("is-open");
                button.setAttribute("aria-expanded", "false");
                body.style.maxHeight = "0px";
            }
        });

        // Add click event listeners
        faqItems.forEach((item) => {
            item.querySelector(".faq-header").addEventListener("click", () => {
                const isOpen = item.classList.contains("is-open");

                // Close all items
                faqItems.forEach(closeItem);

                // Open clicked item if it was closed
                if (!isOpen) {
                    openItem(item);
                }
            });
        });
    });
</script>

<script src="{{ asset('client/service/js/ai-process.js') }}" type="text/javascript"></script>
<script src="{{ asset('client/service/js/ai-competitive.js') }}" defer=""></script>
<script src="{{ asset('client/service/js/main-hero.js') }}" type="text/javascript"></script>
<script src="{{ asset('client/service/js/animation-homepage.js') }}" defer="defer"></script>
<script src="{{ asset('client/service/js/ai-powered-build.js') }}" type="text/javascript"></script>
<script src="{{ asset('client/service/js/ai-review.js') }}" defer=""></script>
@endsection