@extends('client.layouts.app')
@section('content')
<style>
    /* ==========================================================================
   🌐 RESET + BASE
   ========================================================================== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    background-color: #000;
}

:root {
    --gradient-border: linear-gradient(338deg, #2e0101, #2428E4);
}

h2 {
    font-size: 48px;
}

/* Smooth wrapper/content */
/* #smooth-wrapper {
    overflow: hidden;
    height: 100vh;
} */

#smooth-content {
    overflow: visible;
}


/* ==========================================================================
   🖼️ BANNERS / HERO
   ========================================================================== */
.main-class .desktop-banner {
    /* background: url("{{ asset('images/video-editing.webp') }}"); */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    /* height: 100vh; */
}

.hero-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.hero-content span {
    font-size: 1.2rem;
    background: Stroke;
}


/* ==========================================================================
   🎛️ FLOATING / SOCIAL ICONS
   ========================================================================== */
.instagram-icon-main {
    position: absolute;
    top: 90px;
    left: -40px;
    width: 120px;
    height: 120px;
    animation: floatUpDown 3s ease-in-out infinite;
    /* 💫 floating effect */
}

.instagram-icon-main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: blur(6px);
    rotate: 289deg;
    transition: transform 0.3s ease, filter 0.3s ease;
}

.instagram-icon-main:hover img {
    transform: scale(1.05);
    filter: blur(2px);
}

.tiktok-icon {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 100px;
    height: 100px;
}

.tiktok-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: blur(5px) hue-rotate(190deg) saturate(6) brightness(1.3);
    transition: transform 0.3s ease, filter 0.3s ease;
}

.tiktok-icon:hover img {
    transform: scale(1.05);
    filter: blur(2px) hue-rotate(200deg) saturate(6) brightness(1.4) drop-shadow(0 0 8px #00aaff);
}

.instagram-icon {
    position: absolute;
    top: -41px;
    right: 64px;
    width: 100px;
    height: 100px;
}

.instagram-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: blur(6px);
    rotate: 131deg;
    transition: transform 0.3s ease, filter 0.3s ease;
}

.instagram-icon:hover img {
    transform: scale(1.05);
    filter: blur(2px);
}

.youtube-icon {
    position: absolute;
    bottom: -60px;
    left: 200px;
    width: 150px;
    /* height: 100px; */
}

.youtube-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: blur(6px);
    rotate: 30deg;
    transition: transform 0.3s ease, filter 0.3s ease;
}

.youtube-icon:hover img {
    transform: scale(1.05);
    filter: blur(2px);
}

.c-icon {
    position: absolute;
    top: -60px;
    right: 0px;
    width: 150px;
    /* height: 100px; */
}

.c-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: blur(6px);
    rotate: 338deg;
    transition: transform 0.3s ease, filter 0.3s ease;
}

.c-icon:hover img {
    transform: scale(1.05);
    filter: blur(2px);
}


/* ==========================================================================
   🌀 KEYFRAMES
   ========================================================================== */
@keyframes floatUpDown {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-20px);
    }

    /* move up */
    100% {
        transform: translateY(0);
    }

    /* move down */
}

@keyframes pulse {

    0%,
    100% {
        opacity: 0.5;
    }

    50% {
        opacity: 0.8;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(-20px);
    }

    100% {
        transform: translateY(0px);
    }
}


/* ==========================================================================
   🖼️ SIMPLE FADE SLIDER (sf-*)
   ========================================================================== */
/* Slider shell */
.sf-slider {
    position: relative;
    overflow: hidden;
    width: 100%;
    max-width: 560px;
    /* optional cap */
    margin-inline: auto;
}

/* Track + slides */
.sf-track {
    display: flex;
    will-change: transform;
    transition: transform .35s ease;
}

.sf-slide {
    flex: 0 0 100%;
}

.sf-slide img {
    width: 100%;
    display: block;
    object-fit: cover;
    border-radius: 12px;
}

/* Arrows */
.sf-prev,
.sf-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    border: 0;
    border-radius: 999px;
    background: rgba(0, 0, 0, .45);
    color: #fff;
    font-size: 22px;
    line-height: 36px;
    text-align: center;
    cursor: pointer;
    z-index: 3;
}

.sf-prev {
    left: 8px;
}

.sf-next {
    right: 8px;
}

/* Dots */
.sf-dots {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 8px;
    display: flex;
    justify-content: center;
    gap: 8px;
    z-index: 3;
}

.sf-dots .sf-dot {
    width: 8px;
    height: 8px;
    border: 0;
    padding: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, .45);
    cursor: pointer;
}

.sf-dots .sf-dot.active {
    background: #fff;
}

/* Optional: hide arrows if you only want swipe + dots */
/* .sf-prev,.sf-next{ display:none; } */


/* ==========================================================================
   🎥 VIDEO SECTION + GRID
   ========================================================================== */
/* .video-container{
    margin-top: -18vw;
} */

.video-container {
    visibility: hidden;
    opacity: 0;
    margin-top: -10vw;
}

.video-container img {
    opacity: 0;
    transform: translateY(28px);
    will-change: transform, opacity;
}

/* Reduced motion users ke liye */
@media (prefers-reduced-motion: reduce) {

    .video-container,
    .video-container img {
        visibility: visible !important;
        opacity: 1 !important;
        transform: none !important;
    }
}

.video-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    margin-inline: auto;
}

.video-grid img {
    width: 100%;
    display: block;
    object-fit: cover;
    border-radius: 12px;
}


/* ==========================================================================
   🧊 CHIPS / SLIDER MARQUEES
   ========================================================================== */
.slider-wrap,
.slider2-wrap {
    overflow: hidden;
    width: 100%;
    padding: 3px 0;
}

.slider-viewport,
.slider2-viewport {
    overflow: hidden;
    position: relative;
}

.slider-track,
.slider2-track {
    display: flex;
    gap: 20px;
    will-change: transform;
}

.slide,
.slide2 {
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    gap: 10px;
    color: #fff;
    background-color: #26242D;
    padding: 10px 15px;
    border-radius: 10px;
}

.slide img,
.slide2 img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
}

.slide img {
    border-radius: 100%;
}

/* keep exact original detail */


/* ==========================================================================
   🧩 EDIT CARD + DECORATIVE GLOW
   ========================================================================== */
.edit-card {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 700px;
    padding: 40px;
    overflow: hidden;
    background: #161620;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 16px;
}

/* Subtle background glow effect */
.edit-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 30%, rgba(36, 40, 228, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(0, 255, 238, 0.15) 0%, transparent 50%);
    z-index: -1;
    opacity: 0.7;
    animation: pulse 8s ease-in-out infinite;
}

/* Subtle border highlight */
.edit-card::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    border-radius: 16px;
    padding: 1px;
    background: linear-gradient(135deg, rgba(36, 40, 228, 0.3), rgba(0, 255, 238, 0.3));
    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
}

.card-title {
    position: relative;
    z-index: 1;
    margin-bottom: 35px;
    font-size: 2rem;
    font-weight: 300;
    letter-spacing: -0.5px;
    color: #ffffff;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 28px;
    position: relative;
    z-index: 1;
}

.feature-item:last-child {
    margin-bottom: 0;
}

.badge-icon {
    width: 40px;
    height: 40px;
    display: flex;
    margin-right: 20px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
}

.badge-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.feature-text {
    flex: 1;
    padding-top: 4px;
    color: #e0e0e0;
    font-size: 1.15rem;
    line-height: 1.6;
}

.feature-text strong {
    color: #000000;
    font-weight: 400;
}


/* ==========================================================================
   🧾 CARD / BODY / CONTENT
   ========================================================================== */
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: transparent !important;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}

.card-body {
    padding: 40px;
    background-color: transparent;
    border-radius: 24px;
}

.card-body img {
    height: 90px;
}

.expertise-para {
    opacity: 0.85;
    font-weight: 300;
}

.step-content {
    text-align: center;
    margin-bottom: 40px;
}

.arrow {
    position: relative;
    display: flex;
    align-items: center;
    gap: 15px;
    min-height: 70px;
}

.arrow h5 {
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 1.2rem;
}

.arrow h5 wbr {
    word-break: break-word;
}

.step-content p {
    margin: 0;
    text-align: start;
    font-size: 0.95rem;
    line-height: 1.6;
    opacity: 0.85;
}

.step-arrow-desktop {
    position: absolute;
    left: 140px;
    width: 81px;
}

.two-revision {
    position: absolute;
    top: -10px;
    left: -10px;
    z-index: 1;
    padding: 10px;
    border-radius: 10px;
}


/* ==========================================================================
   🔘 TOGGLE (Tabs)
   ========================================================================== */
.toggle-section {
    text-align: center;
    margin-bottom: 20px;
}

.toggle-container {
    position: relative;
    display: inline-flex;
    padding: 6px;
    background: transparent;
    border: 1px solid #ffffff;
    border-radius: 50px;
}

.toggle-option {
    position: relative;
    z-index: 2;
    padding: 12px 35px;
    font-size: 0.95rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    color: #ffffff;
    background: transparent;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: color 0.3s ease;
    white-space: nowrap;
}

.toggle-option.active {
    color: #000;
}

.toggle-option:hover:not(.active) {
    color: #fff;
}

.toggle-slider {
    position: absolute;
    top: 6px;
    left: 6px;
    z-index: 1;
    height: calc(100% - 12px);
    border-radius: 50px;
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
    background: #ffffff;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}


/* ==========================================================================
   🎞️ VIDEO CARDS
   ========================================================================== */
.video-card {
    position: relative;
    overflow: hidden;
    margin-bottom: 20px;
    padding: 30px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.video-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.video-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 4px;
    width: 100%;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
}

.video-thumbnail {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px;
    margin-bottom: 20px;
    color: white;
    font-size: 3rem;
    border-radius: 12px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.video-title {
    margin-bottom: 10px;
    font-size: 1.5rem;
    font-weight: 600;
    color: #1a1a2e;
}

.video-description {
    margin-bottom: 15px;
    line-height: 1.6;
    color: #666;
}

.video-stats {
    display: flex;
    gap: 20px;
    font-size: 0.9rem;
    color: #999;
}

.video-stat {
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Toggle card container */
.cards-container {
    display: none;
}

.cards-container.active {
    display: block;
    animation: fadeIn 0.5s ease;
}


/* ==========================================================================
   📱 STEPS - MOBILE VARIANT
   ========================================================================== */
.steps-mobile {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 55px;
    /* 🔹 zyada gap taaki arrow ke liye space ho */
    padding: 30px 20px;
}

.step-box {
    position: relative;
    width: 100%;
    max-width: 380px;
    padding: 25px 20px;
    text-align: center;
    color: #fff;
    background: #161620;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease;
}

.step-box:hover {
    transform: translateY(-3px);
}

.step-box h5 {
    margin-bottom: 10px;
    font-size: 1.2rem;
    font-weight: 600;
    color: #fff;
}

.step-box p {
    font-size: 0.95rem;
    line-height: 1.5;
    opacity: 0.85;
}

/* ✅ Arrow Outside the Box */
.outside-arrow {
    position: absolute;
    bottom: -35px;
    /* 🔹 half-outside */
    left: 50%;
    transform: translateX(-50%) rotate(90deg);
    width: 45px;
    opacity: 0.8;
}

/* 🔸 Hide arrow for last box */
.step-box:last-child .outside-arrow {
    display: none;
}

/* Two Revision Tag */
.two-revision-mobile {
    position: absolute;
    top: -18px;
    left: -10px;
    width: 84px;
}


/* ==========================================================================
   🎨 PAGES / THEMES
   ========================================================================== */
.blue-section {
    background: url("{{ asset('images/blue-banner.png') }}");
    background-position: center;
    background-size: cover;
}

.tiktok-icon-page {
    position: absolute;
    top: -60%;
    right: -81px;
    width: 250px;
    height: 250px;
    z-index: 0;
}

.tiktok-icon-page img {
    width: 100%;
    height: 100%;
    filter: blur(6px);
    rotate: 330deg;
    transition: transform 0.3s ease, filter 0.3s ease;
    animation: float 3s ease-in-out infinite;
}

.tiktok-icon-page:hover img {
    transform: scale(1.05);
    filter: blur(2px);
}


/* ==========================================================================
   📱 RESPONSIVE QUERIES
   ========================================================================== */
/* Mobile banner */
@media (max-width: 990px) {
    .main-class .mobile-banner {
        /* background: url("{{ asset('images/video-editing-mobile.webp') }}"); */
        background-size: cover;
        background-position: center;
        /* height: 100vh; */
    }
}

/* Video grid at tablet */
@media (max-width: 992px) {
    .video-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Tablet: step arrow, responsive title */
@media (max-width: 990px) {
    .step-arrow-desktop {
        width: 42px;
        left: 100px;
    }

    .responsive-title .break-word {
        display: block;
    }
}

/* Headings + icons */
@media (max-width: 767px) {
    h2 {
        font-size: 2rem;
    }

    h2 img {
        width: 50px !important;
    }
}

/* Video cards / toggle */
@media (max-width: 768px) {
    .toggle-btn {
        padding: 12px 30px;
        font-size: 1rem;
    }

    .video-thumbnail {
        height: 150px;
    }
}

/* Small mobiles: video card + typography + badge sizes */
@media (max-width: 576px) {
    .video-card {
        padding: 30px 25px;
    }

    .card-title {
        font-size: 2rem;
    }

    .feature-text {
        font-size: 1rem;
    }

    .badge-icon {
        min-width: 40px;
        height: 40px;
    }

    .instagram-icon-main {
        height: 100px;
        width: 100px;
    }

    .step-box {
        padding: 22px 16px;
    }

    .outside-arrow {
        bottom: -28px;
        width: 35px;
    }

    .tiktok-icon-page {
        width: 158px;
        height: 158px;
    }
}

</style>
<!-- <div id="smooth-wrapper"> -->
    <div id="smooth-content">
        <main class="main-class">
            <img src="{{ asset('images/video-editing.webp') }}" class="desktop-banner img-fluid w-100 d-none d-md-none d-lg-block"
                alt="" decoding="async" loading="lazy" fetchpriority="high">
            <img src="{{ asset('images/video-editing-mobile.webp') }}" class="mobile-banner img-fluid w-100 d-block d-lg-none"
                alt="" decoding="async" loading="lazy" fetchpriority="high">

            <div class="instagram-icon-main">
                <img src="{{ asset('images/instagram.png') }}" alt="">
            </div>
        </main>


        <section class="container py-4 video-container">
            <div class="row g-3 justify-content-center text-center">
                <!-- Always visible (xs and up) -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <img src="{{ asset('images/video-1.png') }}" class="img-fluid w-100" alt="">
                </div>

                <!-- Hidden on xs; visible from sm and up -->
                <div class="col-12 col-sm-6 col-lg-3 d-none d-md-block d-lg-block">
                    <img src="{{ asset('images/video-2.png') }}" class="img-fluid w-100" alt="">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-none d-md-none d-lg-block">
                    <img src="{{ asset('images/video-3.png') }}" class="img-fluid w-100" alt="">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-none d-md-none d-lg-block">
                    <img src="{{ asset('images/video-4.png') }}" class="img-fluid w-100" alt="">
                </div>
            </div>
        </section>




        <section class="py-4 position-relative">
            <div>
                <h4 class="text-center text-white fw-semibold">
                    Built to hook faster, keep viewers <br> longer, and convert better.
                </h4>

                <div class="tiktok-icon-page">
                    <img src="{{ asset('images/tik-tok.png') }}" alt="">
                </div>

                <div class="slider-wrap mt-0" id="sliderWrap">
                    <div class="slider-viewport">
                        <div class="slider-track" id="sliderTrack">
                            <div class="slide"><img src="{{ asset('images/user-1.png') }}" alt="1">Clean, crisp, fast</div>
                            <div class="slide"><img src="{{ asset('images/user-2.png') }}" alt="2">Color grade on point</div>
                            <div class="slide"><img src="{{ asset('images/user-3.png') }}" alt="3">Hooks that hit</div>
                            <div class="slide"><img src="{{ asset('images/user-4.png') }}" alt="4">Story flows better</div>
                            <div class="slide"><img src="{{ asset('images/user-5.png') }}" alt="5">Smooth & punchy</div>
                            <div class="slide"><img src="{{ asset('images/user-6.png') }}" alt="6">Tight, on-brand</div>
                            <div class="slide"><img src="{{ asset('images/user-7.png') }}" alt="7">Color grade on point</div>
                            <div class="slide"><img src="{{ asset('images/user-8.png') }}" alt="8">Beat-synced magic</div>
                            <div class="slide"><img src="{{ asset('images/user-5.png') }}" alt="9">Smooth & punchy</div>
                        </div>
                    </div>
                </div>

                <div class="slider2-wrap">
                    <div class="slider2-viewport">
                        <div class="slider2-track" id="slider2Track">
                            <div class="slide2"><img src="{{ asset('images/user-1.png') }}" alt="1">Clean, crisp, fast</div>
                            <div class="slide2"><img src="{{ asset('images/user-2.png') }}" alt="2">Color grade on point</div>
                            <div class="slide2"><img src="{{ asset('images/user-3.png') }}" alt="3">Hooks that hit</div>
                            <div class="slide2"><img src="{{ asset('images/user-4.png') }}" alt="4">Story flows better</div>
                            <div class="slide2"><img src="{{ asset('images/user-5.png') }}" alt="5">Smooth & punchy</div>
                            <div class="slide2"><img src="{{ asset('images/user-1.png') }}" alt="1">Clean, crisp, fast</div>
                            <div class="slide2"><img src="{{ asset('images/user-2.png') }}" alt="2">Color grade on point</div>
                            <div class="slide2"><img src="{{ asset('images/user-3.png') }}" alt="3">Hooks that hit</div>
                            <div class="slide2"><img src="{{ asset('images/user-4.png') }}" alt="4">Story flows better</div>
                            <div class="slide2"><img src="{{ asset('images/user-5.png') }}" alt="5">Smooth & punchy</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div>
                <h2 class="text-center py-4 text-white">What We Edit</h2>

                <div class="row g-3">
                    <div class="col-md-12 col-lg-6 col-12">
                        <div class="edit-card">
                            <h5 class="card-title">Short-Form Videos</h5>
                            <div class="feature-item">
                                <div class="badge-icon"> <img src="{{ asset('images/icon-check.svg') }}" alt=""></div>
                                <div class="feature-text">
                                    Hook-first pacing, punch-in cuts,<br>
                                    b-roll, meme cutaways
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="badge-icon"><img src="{{ asset('images/icon-check.svg') }}" alt=""></div>
                                <div class="feature-text">
                                    Auto-captions with brand fonts &<br>
                                    color bars
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="badge-icon"><img src="{{ asset('images/icon-check.svg') }}" alt=""></div>
                                <div class="feature-text">
                                    Deliverables: 9:16 + 1:1 (optional<br>
                                    16:9 repurpose)
                                </div>
                            </div>

                            <div class="tiktok-icon">
                                <img src="{{ asset('images/Vector.png') }}" alt="">
                            </div>
                            <div class="instagram-icon">
                                <img src="{{ asset('images/instagram.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-12">
                        <div class="edit-card">
                            <h2 class="card-title">Long-Form</h2>

                            <div class="feature-item">
                                <div class="badge-icon"><img src="{{ asset('images/icon-check.svg') }}" alt=""></div>
                                <div class="feature-text">
                                    Narrative structure, pattern breaks <br> every 20-30s
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="badge-icon"><img src="{{ asset('images/icon-check.svg') }}" alt=""></div>
                                <div class="feature-text">
                                    Motion lower-thirds, chapter cards,<br> screen comps
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="badge-icon"><img src="{{ asset('images/icon-check.svg') }}" alt=""></div>
                                <div class="feature-text">
                                    Deliverables: 16:9 master + <br> shorts cut-downs (optional)
                                </div>
                            </div>
                            <div class="youtube-icon">
                                <img src="{{ asset('images/youtube.png') }}" alt="">
                            </div>

                            <div class="c-icon">
                                <img src="{{ asset('images/c-image.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="blue-section">


            <section class="container">
                <h2 class="text-center text-white my-5">Our Video Editing <br> Software Expertise</h2>
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row g-5">
                            <div class="col-md-4 col-12">
                                <img src="{{ asset('images/img-1.svg') }}" class="img-fluid mb-3" alt="">
                                <h5 class="text-white">Adobe
                                    Premiere Pro</h5>
                                <p class="text-white expertise-para">We craft cinematic stories with Adobe Premiere Pro, using seamless transitions and precision editing to create professional, emotion-driven videos.</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <img src="{{ asset('images/img-2.svg') }}" class="img-fluid mb-3" alt="">
                                <h5 class="text-white">Final Cut
                                    Pro X</h5>
                                <p class="text-white expertise-para">With Final Cut Pro X, we deliver smooth, high-quality edits that bring ideas to life through precision, creativity, and storytelling excellence.</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <img src="{{ asset('images/img-3.svg') }}" class="img-fluid mb-3" alt="">
                                <h5 class="text-white">Adobe After
                                    Effects</h5>
                                <p class="text-white expertise-para">Adobe After Effects helps us create stunning animations, dynamic visuals, and impactful motion graphics that make every frame unforgettable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container step-arrow-container">
                <h2 class="text-center my-3 text-white">
                    From
                    <img src="{{ asset('images/video-content.svg') }}" alt="">
                    Frames <br>
                    to Fame
                    <img src="{{ asset('images/gold-star.svg') }}" alt="">
                </h2>

                <div class="row">
                    <div class="col-md-3 col-12 step-content d-none d-md-block">
                        <div class="arrow">
                            <h5 class="text-white responsive-title">
                                <span>Brief &</span> <span class="break-word">Assets</span>
                            </h5>

                            <img src="{{ asset('images/arrow.svg') }}" width="70px" class="step-arrow-desktop" alt="">
                        </div>
                        <p class="text-white">
                            Share raw footage, references, <br> brand kit, outcomes.
                        </p>
                    </div>

                    <div class="col-md-3 col-12 step-content d-none d-md-block">
                        <div class="arrow">
                            <h5 class="text-white">The Cut</h5>
                            <img src="{{ asset('images/arrow.svg') }}" width="70px" class="step-arrow-desktop" alt="">
                        </div>
                        <p class="text-white">
                            We propose openings, pattern <br> breaks, and pacing
                        </p>
                    </div>

                    <div class="col-md-3 col-12 step-content d-none d-md-block">
                        <div class="arrow position-relative">
                            <img src="{{ asset('images/2revision.svg') }}" class="two-revision" width="90px" alt="">
                            <h5 class="text-white">Review</h5>
                            <img src="{{ asset('images/arrow.svg') }}" width="70px" class="step-arrow-desktop" alt="">
                        </div>
                        <p class="text-white">
                            Frame.io time-coded comments; <br> 2 rounds included.
                        </p>
                    </div>

                    <div class="col-md-3 col-12 step-content d-none d-md-block">
                        <div class="arrow">
                            <h5 class="text-white">Delivery</h5>
                        </div>
                        <p class="text-white">
                            Share raw footage, references, <br> brand kit, outcomes.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="steps-mobile d-md-none">
                        <div class="step-box">
                            <h5>Brief & Assets</h5>
                            <p>Share raw footage, references, <br> brand kit, outcomes.</p>
                            <img src="{{ asset('images/arrow.svg') }}" alt="arrow" class="step-arrow outside-arrow" />
                        </div>

                        <div class="step-box">
                            <h5>The Cut</h5>
                            <p>We edit your content with storytelling <br> and brand voice in mind.</p>
                            <img src="{{ asset('images/arrow.svg') }}" alt="arrow" class="step-arrow outside-arrow" />
                        </div>

                        <div class="step-box">
                            <img src="{{ asset('images/2revision.svg') }}" alt="2 revisions" class="two-revision-mobile" />
                            <h5>Review</h5>
                            <p>Frame.io time-coded comments; <br> 2 rounds included.</p>
                            <img src="{{ asset('images/arrow.svg') }}" alt="arrow" class="step-arrow outside-arrow" />
                        </div>

                        <div class="step-box">
                            <h5>Delivery</h5>
                            <p>Final export optimized for platforms. <br> Fast and ready to post.</p>
                        </div>
                    </div>

                </div>


            </div>

            <section class="container">
                <h2 class="text-center my-5 text-white">Our Recent Work</h2>

                <div class="toggle-section">
                    <div class="toggle-container">
                        <div class="toggle-slider" id="slider"></div>
                        <button class="toggle-option active" onclick="switchToggle(0, this)">SHORT FORM</button>
                        <button class="toggle-option" onclick="switchToggle(1, this)">LONG FORM</button>
                    </div>
                </div>

                <div id="short-form" class="cards-container active">
                    <!-- Grid: visible from sm and up -->
                    <div class="row text-center g-4 d-none d-sm-flex">
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('images/video-1.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('images/video-2.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('images/video-3.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('images/video-4.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                    </div>

                    <!-- Custom slider: phones only -->
                    <div class="sf-slider d-block d-sm-none" data-autoplay="true">
                        <div class="sf-track">
                            <div class="sf-slide"><img src="{{ asset('images/video-1.png') }}" alt=""></div>
                            <div class="sf-slide"><img src="{{ asset('images/video-2.png') }}" alt=""></div>
                            <div class="sf-slide"><img src="{{ asset('images/video-3.png') }}" alt=""></div>
                            <div class="sf-slide"><img src="{{ asset('images/video-4.png') }}" alt=""></div>
                        </div>
                        <button class="sf-prev" aria-label="Previous">‹</button>
                        <button class="sf-next" aria-label="Next">›</button>
                        <div class="sf-dots"></div>
                    </div>
                </div>

                <div id="long-form" class="cards-container">
                    <!-- Grid: visible from sm and up -->
                    <div class="row text-center g-4 d-none d-sm-flex">
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('images/video-1.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('images/video-2.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('images/video-3.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('images/video-4.png') }}" class="img-fluid rounded-3 w-100" alt="">
                        </div>
                    </div>

                    <!-- Phone-only custom slider (same UI as short-form) -->
                    <div class="sf-slider d-block d-sm-none" data-autoplay="true">
                        <div class="sf-track">
                            <div class="sf-slide"><img src="{{ asset('images/video-1.png') }}" alt=""></div>
                            <div class="sf-slide"><img src="{{ asset('images/video-2.png') }}" alt=""></div>
                            <div class="sf-slide"><img src="{{ asset('images/video-3.png') }}" alt=""></div>
                            <div class="sf-slide"><img src="{{ asset('images/video-4.png') }}" alt=""></div>
                        </div>
                        <button class="sf-prev" aria-label="Previous">‹</button>
                        <button class="sf-next" aria-label="Next">›</button>
                        <div class="sf-dots"></div>
                    </div>
                </div>

            </section>
        </section>
    </div>
<!-- </div> -->


@endsection


@section('pageJs')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollSmoother.min.js"
    integrity="sha512-t4hwZimhnCKT3YLAsEcAcRDkngVFfCcUIfNLIjklrIZAZKD+GfQMP7HbRcsVHxNS48WRBSywNU1uSM2zzLQt1Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Slider configurations
        const sliders = [{
                trackId: "sliderTrack",
                direction: -1,
                speed: 20
            }, // original slider, left
            {
                trackId: "slider2Track",
                direction: 1,
                speed: 20
            } // new slider, right
        ];

        sliders.forEach(slider => {
            const track = document.getElementById(slider.trackId);
            const slides = Array.from(track.children);

            // Clone slides for infinite scroll
            slides.forEach(slide => {
                const clone = slide.cloneNode(true);
                track.appendChild(clone);
            });

            let pos = 0;
            let lastTime = null;

            function step(time) {
                if (!lastTime) lastTime = time;
                const delta = (time - lastTime) / 1000; // convert to seconds
                lastTime = time;

                pos += slider.speed * delta * slider.direction;
                const totalWidth = track.scrollWidth / 2;
                pos = ((pos % totalWidth) + totalWidth) % totalWidth;

                track.style.transform = `translateX(${-pos}px)`;
                requestAnimationFrame(step);
            }

            requestAnimationFrame(step);
        });
    });
</script>

<script>
    function switchToggle(index, element) {
        const options = document.querySelectorAll('.toggle-option');
        options.forEach(opt => opt.classList.remove('active'));
        element.classList.add('active');

        const slider = document.getElementById('slider');
        slider.style.width = element.offsetWidth + 'px';
        slider.style.transform = `translateX(${element.offsetLeft - 6}px)`;

        const shortForm = document.getElementById('short-form');
        const longForm = document.getElementById('long-form');

        if (index === 0) {
            shortForm.classList.add('active');
            longForm.classList.remove('active');
        } else {
            longForm.classList.add('active');
            shortForm.classList.remove('active');
        }
    }

    window.addEventListener('load', () => {
        const activeOption = document.querySelector('.toggle-option.active');
        const slider = document.getElementById('slider');
        slider.style.width = activeOption.offsetWidth + 'px';
        slider.style.transform = `translateX(${activeOption.offsetLeft - 6}px)`;
        document.getElementById('short-form').classList.add('active');
        document.getElementById('long-form').classList.remove('active');
    });

    window.addEventListener('resize', () => {
        const activeOption = document.querySelector('.toggle-option.active');
        const slider = document.getElementById('slider');
        slider.style.width = activeOption.offsetWidth + 'px';
        slider.style.transform = `translateX(${activeOption.offsetLeft - 6}px)`;
    });
</script>

<script>
    (function() {
        const slider = document.querySelector('.sf-slider');
        if (!slider) return;

        const track = slider.querySelector('.sf-track');
        const slides = Array.from(track.children);
        const prev = slider.querySelector('.sf-prev');
        const next = slider.querySelector('.sf-next');
        const dotsC = slider.querySelector('.sf-dots');
        const autoplayEnabled = slider.dataset.autoplay === 'true';

        // build dots
        slides.forEach((_, i) => {
            const b = document.createElement('button');
            b.className = 'sf-dot' + (i === 0 ? ' active' : '');
            b.setAttribute('aria-label', `Go to slide ${i + 1}`);
            b.addEventListener('click', () => go(i));
            dotsC.appendChild(b);
        });
        const dots = Array.from(dotsC.children);

        let index = 0,
            timer = null,
            touching = false,
            startX = 0,
            dx = 0;

        function update() {
            track.style.transition = 'transform .35s ease';
            track.style.transform = `translateX(-${index * 100}%)`;
            dots.forEach((d, i) => d.classList.toggle('active', i === index));
        }

        function go(i) {
            index = (i + slides.length) % slides.length;
            update();
            restart();
        }

        // arrows
        prev.addEventListener('click', () => go(index - 1));
        next.addEventListener('click', () => go(index + 1));

        // touch swipe
        track.addEventListener('touchstart', e => {
            touching = true;
            startX = e.touches[0].clientX;
            dx = 0;
            stop();
        }, {
            passive: true
        });

        track.addEventListener('touchmove', e => {
            if (!touching) return;
            dx = e.touches[0].clientX - startX;
            track.style.transition = 'none';
            track.style.transform = `translateX(calc(-${index * 100}% + ${dx}px))`;
        }, {
            passive: true
        });

        track.addEventListener('touchend', () => {
            touching = false;
            track.style.transition = 'transform .35s ease';
            if (Math.abs(dx) > 50) {
                go(index + (dx < 0 ? 1 : -1));
            } else {
                update();
                restart();
            }
        });

        // autoplay
        function start() {
            if (autoplayEnabled && !timer) timer = setInterval(() => go(index + 1), 3000);
        }

        function stop() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        function restart() {
            stop();
            start();
        }

        // pause on hover (if needed)
        slider.addEventListener('mouseenter', stop);
        slider.addEventListener('mouseleave', start);

        // init (only on phones; if you want to enforce that)
        const mq = window.matchMedia('(max-width: 575.98px)');

        function toggleByMQ(e) {
            if (e.matches) {
                start();
            } else {
                stop();
            }
        }
        mq.addEventListener ? mq.addEventListener('change', toggleByMQ) : mq.addListener(toggleByMQ);
        toggleByMQ(mq); // run once
        update();
    })();
</script>

<script>
    (function() {
        function initSFSlider(slider) {
            const track = slider.querySelector('.sf-track');
            if (!track) return;

            const slides = Array.from(track.children);
            const prev = slider.querySelector('.sf-prev');
            const next = slider.querySelector('.sf-next');
            const dotsC = slider.querySelector('.sf-dots');
            const autoplayEnabled = slider.dataset.autoplay === 'true';

            // Build dots (clear first to avoid duplicates if re-run)
            if (dotsC) dotsC.innerHTML = '';
            slides.forEach((_, i) => {
                if (!dotsC) return;
                const b = document.createElement('button');
                b.className = 'sf-dot' + (i === 0 ? ' active' : '');
                b.setAttribute('aria-label', `Go to slide ${i + 1}`);
                b.addEventListener('click', () => go(i));
                dotsC.appendChild(b);
            });
            const dots = dotsC ? Array.from(dotsC.children) : [];

            let index = 0,
                timer = null,
                touching = false,
                startX = 0,
                dx = 0;

            function update() {
                track.style.transition = 'transform .35s ease';
                track.style.transform = `translateX(-${index * 100}%)`;
                if (dots.length) dots.forEach((d, i) => d.classList.toggle('active', i === index));
            }

            function go(i) {
                index = (i + slides.length) % slides.length;
                update();
                restart();
            }

            // Arrows
            if (prev) prev.addEventListener('click', () => go(index - 1));
            if (next) next.addEventListener('click', () => go(index + 1));

            // Touch swipe
            track.addEventListener('touchstart', e => {
                touching = true;
                startX = e.touches[0].clientX;
                dx = 0;
                stop();
                track.style.transition = 'none';
            }, {
                passive: true
            });

            track.addEventListener('touchmove', e => {
                if (!touching) return;
                dx = e.touches[0].clientX - startX;
                track.style.transform = `translateX(calc(-${index * 100}% + ${dx}px))`;
            }, {
                passive: true
            });

            track.addEventListener('touchend', () => {
                touching = false;
                track.style.transition = 'transform .35s ease';
                if (Math.abs(dx) > 50) {
                    go(index + (dx < 0 ? 1 : -1));
                } else {
                    update();
                    restart();
                }
            });

            // Autoplay helpers
            function start() {
                if (autoplayEnabled && !timer) {
                    timer = setInterval(() => go(index + 1), 3000);
                }
            }

            function stop() {
                if (timer) {
                    clearInterval(timer);
                    timer = null;
                }
            }

            function restart() {
                stop();
                start();
            }

            // Pause on hover
            slider.addEventListener('mouseenter', stop);
            slider.addEventListener('mouseleave', start);

            // Only autoplay on phones
            const mq = window.matchMedia('(max-width: 575.98px)');

            function toggleByMQ(e) {
                e.matches ? start() : stop();
            }
            if (mq.addEventListener) mq.addEventListener('change', toggleByMQ);
            else mq.addListener(toggleByMQ); // Safari/older
            toggleByMQ(mq);

            // Initial render
            update();
        }

        // Initialize ALL instances
        document.querySelectorAll('.sf-slider').forEach(initSFSlider);
    })();
</script>


<script>
    // Video container ko refresh/resize par bhi check karna
    (function() {
        function checkAndAnimateVideo() {
            const el = document.querySelector('.video-container');
            if (!el) return;

            const r = el.getBoundingClientRect();
            const inView = r.top < window.innerHeight && r.bottom > 0;

            if (inView && window.getComputedStyle(el).visibility === 'hidden') {
                gsap.set(".video-container", {
                    autoAlpha: 1
                });
                gsap.to(".video-container img", {
                    opacity: 1,
                    y: 0,
                    stagger: 0.15,
                    duration: 0.75,
                    ease: "power3.out"
                });
            }
        }

        // Page load par check karo
        window.addEventListener('load', checkAndAnimateVideo);

        // Scroll par bhi check karo
        let scrollTimeout;
        window.addEventListener('scroll', () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(checkAndAnimateVideo, 50);
        }, {
            passive: true
        });
    })();
</script>

<script>
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".video-container .col-12, .video-container .col-sm-6, .video-container .col-lg-3", {
        scrollTrigger: {
            trigger: ".video-container",
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 50,
        stagger: 0.15,
        duration: 0.8,
        ease: "power3.out"
    });


    // 2. Section Headings - Scale and fade
    gsap.utils.toArray("h2, h4").forEach((heading) => {
        gsap.from(heading, {
            scrollTrigger: {
                trigger: heading,
                start: "top 85%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            scale: 0.9,
            y: 30,
            duration: 0.7,
            ease: "back.out(1.2)"
        });
    });

    // 3. Slider sections - Slide in from sides
    gsap.from(".slider-wrap", {
        scrollTrigger: {
            trigger: ".slider-wrap",
            start: "top 80%",
            toggleActions: "play none none none"
        },
        x: -100,
        opacity: 0,
        duration: 1,
        ease: "power2.out"
    });

    gsap.from(".slider2-wrap", {
        scrollTrigger: {
            trigger: ".slider2-wrap",
            start: "top 80%",
            toggleActions: "play none none none"
        },
        x: 100,
        opacity: 0,
        duration: 1,
        ease: "power2.out"
    });

    // 4. Edit Cards - Mobile friendly animation
    const isMobile = window.innerWidth <= 576;
    gsap.from(".edit-card", {
        scrollTrigger: {
            trigger: ".edit-card",
            start: "top 75%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        rotationY: isMobile ? 0 : 90,
        y: isMobile ? 50 : 0,
        transformOrigin: "left center",
        stagger: 0.3,
        duration: 1,
        ease: "power3.out"
    });

    // 5. Feature Items - Sequential reveal
    gsap.utils.toArray(".feature-item").forEach((item) => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: "top 85%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            x: -30,
            duration: 0.6,
            ease: "power2.out"
        });
    });

    // 6. Software Expertise Cards - Zoom in with rotation
    gsap.from(".blue-section .col-md-4", {
        scrollTrigger: {
            trigger: ".blue-section .row",
            start: "top 70%",
            toggleActions: "play none none none"
        },
        scale: 0.7,
        opacity: 0,
        rotation: 10,
        stagger: 0.2,
        duration: 0.8,
        ease: "back.out(1.5)"
    });


// 9. Toggle Section - Trigger ko delay karo
gsap.from(".toggle-section", {
    scrollTrigger: {
        trigger: ".toggle-section",
        start: "top 90%",  // ❌ 80% se ✅ 90% karo (ya "top 95%")
        toggleActions: "play none none none"
    },
    scale: 0.5,
    opacity: 0,
    duration: 0.6,
    ease: "elastic.out(1, 0.5)"
});

// 10. Recent Work Images - Yaha bhi adjust karo
gsap.utils.toArray("#short-form img, #long-form img").forEach((img) => {
    gsap.from(img, {
        scrollTrigger: {
            trigger: img,
            start: "top 90%",  // ❌ 85% se ✅ 90% karo
            toggleActions: "play none none none"
        },
        opacity: 0,
        scale: 0.8,
        y: 30,
        duration: 0.7,
        ease: "power2.out"
    });
});

    // 11. Instagram/TikTok/YouTube Icons - Floating entrance
    gsap.utils.toArray(".tiktok-icon, .instagram-icon, .youtube-icon, .c-icon").forEach((icon) => {
        gsap.from(icon, {
            scrollTrigger: {
                trigger: icon,
                start: "top 90%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            scale: 0,
            rotation: 360,
            duration: 1,
            ease: "elastic.out(1, 0.6)"
        });
    });

    // 12. Parallax effect for main background
    // Hero image zoom-in effect on scroll
    // gsap.to(".main-class", {
    //     scale: 1.1,
    //     transformOrigin: "center center",
    //     scrollTrigger: {
    //         trigger: ".main-class",
    //         start: "top top",
    //         end: "bottom top",
    //         scrub: 1.5,
    //         pin: true
    //     },
    //     ease: "none"
    // });

    gsap.to(".main-class img", {
        scale: 1.1,
        // y: 100,
        transformOrigin: "center center",
        scrollTrigger: {
            trigger: ".main-class",
            start: "top top",
            end: "bottom top",
            scrub: 0.5,
            // pin: true
        },
        ease: "none"
    });


    // 13. Blue section parallax
    gsap.to(".blue-section", {
        scrollTrigger: {
            trigger: ".blue-section",
            start: "top bottom",
            end: "bottom top",
            scrub: 1
        },
        backgroundPositionY: "30%",
        ease: "none"
    });

    // 14. Smooth scroll reveal for card body
    gsap.from(".card-body", {
        scrollTrigger: {
            trigger: ".card-body",
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 60,
        duration: 1,
        ease: "power3.out"
    });

    // 15. Instagram icon main - Rotate and fade
    gsap.from(".instagram-icon-main", {
        scrollTrigger: {
            trigger: ".instagram-icon-main",
            start: "top 90%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        rotation: -180,
        scale: 0.5,
        duration: 1.2,
        ease: "back.out(1.5)"
    });
</script>


<script>
    // Just in case kisi browser me CSS clamp ignore ho, force-clip once.
    (function() {
        try {
            document.documentElement.style.overflowX = 'clip';
            // Recalculate after fonts/layout settle
            window.addEventListener('load', () => {
                document.documentElement.style.overflowX = 'clip';
                document.body.style.overflowX = 'clip';
            }, {
                once: true
            });
        } catch (e) {}
    })();
</script>

<!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

        ScrollSmoother.create({
            wrapper: "#smooth-wrapper", 
            content: "#smooth-content", 
            smooth: 1.5,    
        });
    }); -->
</script>
@endsection