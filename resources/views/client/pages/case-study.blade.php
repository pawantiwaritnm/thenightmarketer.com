@extends('client.layouts.app')
@section('content')
<style>
    .grid {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        list-style-type: none;
    }

    .grid>li {
        width: calc(100% / 2 - 30px);
        margin: 0px 15px;
        margin-bottom: 30px;
        overflow: hidden;
        border-radius: 15px;
        /* background-color: #fff; */
    }

    .filters {
        margin-top: 40px;
        display: table;
        /* display: -webkit-flex; */
        flex-wrap: wrap;
        justify-content: center;
        margin: 0 auto;
    /* width: 62%; */
    background: #25242C;
    padding: 10px 0px;
    border-radius: 100px;
    }

    .grid li img {
        max-width: 100%;
        border-radius: 10px;
    }

    .filters button {
        padding: 6px 20px;
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
        /* background-color: #fff; */
        color: #fff;
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
    font-size: 24px;
    line-height: 30px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

    .portfolio-card-text {
        font-size: 16px;
        line-height: 22px;
        color: #fffff
    }

    @media (max-width: 1024px) {

        .filters {
            width: 100%;
            display: block;
        
        }

        .portfolio-sectio-main-headline {

    font-size: 60px !important;
    line-height: 70.297px !important;
}

    }


    @media (max-width: 767px) {
        .filters button {
            padding: 10px 15px;
            margin: 5px;
        }

        .grid>li {
            width: calc(100% - 30px);
        }

        .element-item p {
            font-size: 16px;
            line-height: 22px;
        }
        .filters {
            width: 100%;
            padding: 0px 0px;
        }

        .element-item a {
    font-size: 14px;
    line-height: 22px;
    text-decoration: none;
        color: #ffff;
    }

        

        
    .portfolio-sectio-main-headline{
    font-size: 41px !important;
        line-height: 44.297px !important;
    }
    .filters {
        width: 900px;
        padding: 0px 0px;
    }


    .element-item>div {
    padding: 10px 0px;
    color: #fff;
}
.ui-group {
    overflow: auto;
}
    }

    .portfolio-sectio-main{
        padding-top: 100px ;
    }

    .portfolio-sectio-main-headline{
        color: #FFF;
text-align: center;
font-size: 70px;
font-style: normal;
font-weight: 600;
margin-top: 5%;
line-height: 70.297px; /* 114.997% */
    }
</style>
<section class="portfolio-sectio-main hero-section-bgimg bg-black pb-0">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="portfolio-sectio-main-headline">Our nicest work in front of you</h1>
            </div>
        </div>
    </div>
    <div data-js="hero-demo">
        <div class="ui-group">
            <!-- Dynamic Tabs -->
            <div class="filters button-group js-radio-button-group device-type">
                <button class="button is-checked" data-filter="*">All</button>
                @foreach($caseStudy as $tab => $studies)
                <button class="button" data-filter=".cat-{{ Str::slug($tab) }}">{{ $tab }}</button>
                @endforeach
            </div>
        </div>

        <!-- Dynamic Grid -->
        <ul class="grid mb-0">



                        <!-- Static Case Studies (add them to the "All" category) -->





                        

 <li class="element-item cat-all cat-uiux cat-development" data-category="cat-all cat-uiux">
    <a href="{{ route('fuel-your-body') }}" class="portfolio-card">
        <img src="{{ asset('client/images/homeimg/fuel-your-body.webp') }}" alt="Figma" class="img-fluid">
        <div class="d-flex flex-wrap gap-2">
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">CRO Design</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development </a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Marketing </a>
        </div>
        <h4 class="case-study-section-text">How We Transformed Fuel Your Body's Subscription Flow & Grew Subscribers by 2.3x in 5 Months</h4>
        <p class="case-study-section-text-p">Revamped Fuel Your Body's subscription meal platform with a complete website audit, redesigned user flow with tiered meal plans, and developed the mobile-first site on Shopify with email marketing implementation.</p>
    </a>
</li>

 <li class="element-item cat-all cat-uiux cat-development" data-category="cat-all cat-uiux">
    <a href="{{ route('rajdhani') }}" class="portfolio-card">
        <img src="{{ asset('client/images/homeimg/rajdhani-image.webp') }}" alt="Figma" class="img-fluid">
        <div class="d-flex flex-wrap gap-2">
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
        </div>
        <h4 class="case-study-section-text">Revamping Rajdhani’s Digital Presence for the Modern Distributor</h4>
        <p class="case-study-section-text-p">The goal was to create a sleek, professional distributor website that would cater to their B2B audience, emphasizing the brand’s commitment to quality and its wide distribution network.</p>
    </a>
</li>

 <li class="element-item cat-all cat-uiux cat-branding cat-development" data-category="cat-all cat-uiux cat-branding">
    <a href="{{ route('sorbet') }}" class="portfolio-card">
        <img src="{{ asset('client/images/homeimg/sorbet-image.webp') }}" alt="Figma" class="img-fluid">
        <div class="d-flex flex-wrap gap-2">
             <a href="javascript:void(0)" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand Identity</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
        </div>
        <h4 class="case-study-section-text">Designing an Elegant and Modern Web Experience for Sorbet & Co.</h4>
        <p class="case-study-section-text-p">To create a modern brand identity and digital experience that mirrors Sorbet & Co.’s elegance and fashion-forward spirit.</p>
    </a>
</li>

 <li class="element-item cat-all cat-uiux cat-branding cat-development" data-category="cat-all cat-uiux cat-branding">
    <a href="{{ route('green-leaf') }}" class="portfolio-card">
        <img src="{{ asset('client/images/homeimg/green-leaf-2.webp') }}" alt="Figma" class="img-fluid">
        <div class="d-flex flex-wrap gap-2">
             <a href="javascript:void(0)" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand Identity</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
        </div>
        <h4 class="case-study-section-text">Building Greenleaf’s Authority Through a Modern Web Presence</h4>
        <p class="case-study-section-text-p">To create a strong brand identity and a modern, informative website that reflects Greenleaf’s authority in the agricultural commodities sector while providing an intuitive experience for all user segments.</p>
    </a>
</li>


                        <li class="element-item cat-all cat-uiux cat-branding cat-development" data-category="cat-all cat-uiux cat-branding">
    <a href="{{ route('french-factor') }}" class="portfolio-card">
        <img src="{{ asset('client/images/homeimg/frenchcaseimg.webp') }}" alt="Figma" class="img-fluid">
        <div class="d-flex flex-wrap gap-2">
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
        </div>
        <h4 class="case-study-section-text">Building stories for a rich perfume brand</h4>
        <p class="case-study-section-text-p">A premium perfume brand based in USA with, a masterpiece of design and development, reflects the brand's luxurious ethos with its seamless animations and refined aesthetics.</p>
    </a>
</li>
                       

<li class="element-item cat-all cat-uiux cat-branding cat-development" data-category="cat-all cat-uiux cat-branding">
    <a href="{{ route('ozar-luxury') }}" class="portfolio-card">
        <img src="{{ asset('client/images/homeimg/ozarcaseimg.webp') }}" alt="Figma" class="img-fluid">
        <div class="d-flex flex-wrap gap-2">
            <a href="javascript:void(0)" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Brand Identity</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">UI/ UX Design</a>
            <a href="#" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2">Development</a>
        </div>
        <h4 class="case-study-section-text">Revamping a real-estate brand based in Goa</h4>
        <p class="case-study-section-text-p">A brand helping you find your dream home with stunning villas, stylish apartments, and prime land worldwide.</p>
    </a>
</li>
            @foreach($caseStudy as $tab => $studies)
                @foreach($studies as $study)
                <li class="element-item cat-{{ Str::slug($tab) }}" data-category="cat-{{ Str::slug($tab) }}">
                    <a href="{{ route('case-study-details', $study->slug) }}" class="portfolio-card">
                        <img src="{{ asset('storage/' . $study->featured_image) }}" alt="{{ $study->title }}" class="img-fluid">
                        <div class="d-flex flex-wrap">
                            @foreach($study->tags as $tag)
                            <a href="{{ route('case-study-details', $study->slug) }}" class="btn case-study-section-btn btn-dark rounded-pill px-4 py-2 about-btn">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h4 class="portfolio-card-headline text-white">{{ $study->title }}</h4>
                        <p class="portfolio-card-text text-white">{{ Str::limit($study->summary, 100) }}</p>
                    </a>
                </li>
                @endforeach
            @endforeach



        </ul>
    </div>
</section>
@endsection
