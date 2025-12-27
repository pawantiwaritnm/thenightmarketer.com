
@extends('client.layouts.app')
@section('content')

<style>
    .footer .social-icons i, .footer .footer-address i {
    border: 1px solid #fff;
    padding: 8px 10px !important;
    border-radius: 50%;
    color: #fff;
}
.last_row {
            justify-content: center;
        }

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

        .right-bottom-img:nth-child(6) {
            border-right: none;
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

        @media (max-width: 767px) {
            .right-bottom-img:nth-child(even) {
                border-right: hidden;
            }

            .border-right-hide {
                border-right: 1px solid #ffffff5c;
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

</style>

<section class="client-and-partners-section hero-section-bgimg bg-black">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="portfolio-sectio-main-headline">Our Clients</h1>
            </div>
        </div>
    </div>
    <!-- <div  data-js="hero-demo">
        <div class="ui-group">
            Dynamic Tabs
            <div class="filters button-group js-radio-button-group device-type">
                <button class="button is-checked" data-filter="*">All</button>
                @foreach($clientsByIndustry as $industryName => $clients)
                <button class="button" data-filter=".cat-{{ Str::slug($industryName) }}">{{ $industryName }}</button>
                @endforeach
            </div>
        </div>

        Dynamic Grid
        <ul class="grid">
            @foreach($clientsByIndustry as $industryName => $clients)
            @foreach($clients as $client)
            <li class="element-item cat-{{ Str::slug($industryName) }}" data-category="cat-{{ Str::slug($industryName) }}">
                <div class="portfolio-card">
                    @if($client->logo)
                    <a href="{{ @$client->website_url }}" target="_blank"><img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->client_name }}" class="img-fluid"></a>
                    @endif
                    <div>
                        <h4 class="portfolio-card-headline text-white">{{ $client->client_name }}</h4>
                        <a href="{{ $client->website_url }}" target="_blank" class="portfolio-card-text text-white">
                            Visit Website
                        </a>
                    </div>
                </div>
            </li>
            @endforeach
            @endforeach
        </ul>
    </div> -->
    <div class="container">
            <div class="row">
                <!-- <div class="col-lg-9 col-md-9 col-sm-12 mx-auto mb-3">
                    <h3 class="we-excel-text ">We excel in all industries,<span class="span-highlight"> backed by over 10
                            years of expertise.</span></h3>
                </div> -->
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
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  class="text-center" href="https://www.nutriseed.co.uk/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/NUTRISEED.svg" alt="NUTRISEED">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.jaquar.com/en/luxury-bath-tub">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/jaquar.svg" alt="jaquar">
                                    </a>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.naaginsauce.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Naagin01.svg" alt="Naagin">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://coffeeza.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Coffeeza.svg" alt="coffeeza">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://frenchfactor.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/french-factor.svg" alt="french-factor">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> 
                                    <a target="_blank" class="text-center"  href="https://farmerr.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Farmerr01.svg" alt="Farmerr">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://pincodebykunalkapur.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/pincode.svg" alt="pincode">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.boultaudio.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/boult.svg" alt="boult">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://tattooloverscare.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/kgO5L3Fqf3JXVS7r9Yef1dbDPyqjmUOJ7iYANKt2.svg" alt="tattolovercare">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.spreadhome.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Spread-Home.svg" alt="Spread-Home">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://thedrchoice.com/">
                                        <img class="img-fluid" loading="lazy"src="https://thenightmarketer.com/storage/client/logos/eB8MizTO3qSc31XkX9I7bfTe2tcyzRsVPQi3NUhh.svg" alt="drchoice">
                                    </a>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://nack.life/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/6ftvPltRGfvRjmTQGeDRTCFxbXm5SYljsxcvEe3B.png" alt="Nack"
                                        class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.startup-movers.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/NAV25qtfihaJugg4yoWvU2o9BDSSK5zpZNVoFQQ9.svg" alt="startup-movers">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> 
                                    <a target="_blank" class="text-center"  href="https://thetribekids.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Tribe-kids01.svg" alt="thetribekids">
                                    </a>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> 
                                    <a target="_blank" class="text-center"  href="https://secondaid.co.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Secondaid-logo-final01.svg" alt="Second Aid">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> 
                                    <a target="_blank" class="text-center"  href="https://www.johnpride.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/John-pride.svg" alt="John Pride">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://wiscon.in/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/FeKIPyMuMWghq7uHfssDvUuJKPPM9HqwzSSFWc28.svg" alt="wiscon">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> 
                                    <a target="_blank" class="text-center"  href="https://manzuriselect.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Manzuri01.svg" alt="Manzuri">
                                    </a>
                                </div>
                            </div>
                            <div class="row border-bottom-hide">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center" 
                                        href="https://ozarluxury.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/ozarluxury.svg" alt="ozar luxury">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://thegoldenweddingfair.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/golden-wedding-fair.svg" alt="The Golden Wedding Fair" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://www.digibuggy.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/digibuggy.svg" alt="digi buggy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://evisadubai.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/evisadubai.svg" alt="eVisaDubai"
                                    class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://alsowise.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/alsowise.svg" alt="alsowise">
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://rierp.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/rajyog.svg" alt="rierp">
                                    </a>
                                </div>
                            </div>
                            <div class="row border-bottom-hide last_row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://sorbetco.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Sorbet.svg" alt="Sorbet">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://eurumme.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/eurumme.svg" alt="eurumme">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a target="_blank" class="text-center"  href="https://ruchoks.com/">
                                        <img class="img-fluid" loading="lazy" src="https://thenightmarketer.com/storage/client/logos/Ruchoks01.svg" alt="Ruchoks">
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div id="tabContent1" style="display: none;">
                            <div class="row ">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.fleurons.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Fleurons01.svg" alt="Fleurons" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://ruchoks.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Ruchoks01.svg" alt="Ruchoks" class="img-fluid" loading="lazy">
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> 
                                    <a href="https://www.dibha.com" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Dibha01.svg" alt="Dibha" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.greenchickchop.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Greenchickchop01.svg" alt="Green Chick Chop" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://farmerr.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Farmerr01.svg" alt="Farmerr" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.readytoeat.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Fazlani01.svg" alt="Fazlani" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                            </div>

                            <div class="row border-bottom-hide last_row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">  
                                    <a href="https://secondaid.co.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Secondaid-logo-final01.svg" alt="Second Aid" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">   
                                    <a href="https://www.shasnthegame.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Shasn01.svg" alt="Shasn" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://auraafood.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Oc2feqiDnMEfJcdbW8uX5eKhp1BE2fbDpjT84VzR.svg" alt="AuraaFoods" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://manzuriselect.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Manzuri01.svg" alt="Manzuri" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://thewickandco.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/SQ1NMPK3NlimQO7hHaskLxX9f5YH9YaMCrnZAXnk.svg" alt="Wick & Co" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="tabContent2" style="display: none;">
                            <div class="row border-bottom-hide">

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.johnpride.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/John-pride.svg" alt="John Pride" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://juniorfolk.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/hNm6Xzz7cev6A41EgudnGC9DrABl4Oj9HP7N24Oi.svg" alt="Junior Folk" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.vidhisinghania.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Vidhi-Singhania.svg" alt="Vidhi Singhania" class="img-fluid" loading="lazy">
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://chhayamehrotra.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Chhaya.svg" alt="Chhaya Mehrotra" class="img-fluid" loading="lazy">
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://inka.co.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/inka.svg" alt="Inka" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.spreadhome.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Spread-Home.svg" alt="Spread Home" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                            </div>
                            <div class="row border-bottom-hide">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.jaquar.com/en/luxury-bath-tub" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/jaquar.svg" alt="Jaquar" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://eurumme.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/eurumme.svg" alt="Eurumme" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.altr.nyc/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/altr.svg" alt="Alter Diamonds" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://frenchfactor.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/french-factor.svg" alt="French Factor" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://sorbetco.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Sorbet.svg" alt="Sorbet" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://www.vistafashions.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/vista.svg" alt="Vista Furnishing" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                            </div>
                            <div class="row border-bottom-hide last_row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://thegoldenweddingfair.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/golden-wedding-fair.svg" alt="The Golden Wedding Fair" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://samaywatch.com/password" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/bZNkLURPFRNpvNDJ0z6u96guPhOIPZspD5tWH5TR.svg" alt="Samay" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img">
                                    <a href="https://shopnadi.in/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/g826Iqqc19metxOuGnIOZDO5JuwynmNOEQH1Gh7l.svg" alt="Shop nadi" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> 
                                    <a href="https://thetribekids.com/" target="_blank" class="text-center" >
                                        <img src="https://thenightmarketer.com/storage/client/logos/Tribe-kids01.svg" alt="Tribe Kids" class="img-fluid" loading="lazy">
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

                            <div class="row">

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> <a href="" target="_blank" class="text-center" ><img src="https://thenightmarketer.com/storage/client/logos/ahika.svg"
                                    alt="Ahika" class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> <a href="https://coffeeza.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/Coffeeza.svg" alt="Coffeeza"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> <a href="https://ohcha.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/ohcha.svg" alt="Ohcha"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.polkapop.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/polkapop.svg" alt="Polka Pop"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.beanlycoffee.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/jd919blFDk4xc8xIPgfIrhvZbQwUmk071O5wX714.svg" alt="Beanly"
                                    class="img-fluid" loading="lazy"></a></div>

                                    <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://nack.life/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/6ftvPltRGfvRjmTQGeDRTCFxbXm5SYljsxcvEe3B.png" alt="Nack"
                                        class="img-fluid" loading="lazy"></a></div>
                            </div>

                            <div class="row border-bottom-hide">

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> <a href="https://organity.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/Organity.svg" alt="Organity"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> <a href="https://thedrchoice.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/eB8MizTO3qSc31XkX9I7bfTe2tcyzRsVPQi3NUhh.svg" alt="Dr. Choice"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://qurist.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/qurist.svg" alt="Qurist"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.nutriseed.co.uk/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/NUTRISEED.svg" alt="Nutriseed"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.timetravellingmilkman.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/milkman.svg" alt="Time Travelling Milkman"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://tattooloverscare.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/kgO5L3Fqf3JXVS7r9Yef1dbDPyqjmUOJ7iYANKt2.svg" alt="Tatto Lover Care"
                                        class="img-fluid" loading="lazy"></a></div>
                            </div>
                        </div>
                        <div id="tabContent4" style="display: none;">

                            <div class="row  border-bottom-hide">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://bluebookhotels.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/bluebookhotels.svg" alt="Bluebook"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://pincodebykunalkapur.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/pincode.svg" alt="Pincode"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://kibana.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/kibana.svg" alt="Kibana"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://ruhestays.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/ruhestays.svg" alt="Ruhe Stays"
                                    class="img-fluid" loading="lazy"></a></div>
                                    <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://ozarluxury.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/ozarluxury.svg" alt="Ozar Luxury"
                                        class="img-fluid" loading="lazy"></a></div>
    
                                    <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://zingafs.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/R35JIhP3Q2vUnbn7u9pegvqnP6Dna2CpXmzJPstl.svg" alt="ZingaFS"
                                        class="img-fluid" loading="lazy"></a></div>

                            </div>


                        </div>
                        <div id="tabContent5" style="display: none;">

                            <div class="row  border-bottom-hide last_row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.boultaudio.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/boult.svg" alt="Boult"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://wiscon.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/FeKIPyMuMWghq7uHfssDvUuJKPPM9HqwzSSFWc28.svg" alt="Wiscon"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.toolworld.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/toolworld.svg" alt="Toolworld"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.maviyom.com/en" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/maviyom.svg" alt="Maviyom"
                                    class="img-fluid" loading="lazy"></a></div>
                                    <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.digibuggy.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/digibuggy.svg" alt="Digibuggy"
                                        class="img-fluid" loading="lazy"></a></div>
    
                                   
    
                                  
                            </div>
                        </div>
                        <div id="tabContent6" style="display: none;">

                            <div class="row  border-bottom-hide last_row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://voyagecrafter.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/3vk1p2iAeJJM8HaAMx3diLnjnvO9tmvGBh8fwiRK.svg" alt="Voyage Crafter"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="http://www.sparkholidays.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/wrgltMyFcBXzfWKisjvNmSqepxdosxpfy9yqtYSB.svg" alt="Spark Holidays"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://evisadubai.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/evisadubai.svg" alt="eVisaDubai"
                                    class="img-fluid" loading="lazy"></a></div>

                               
                            </div>
                        </div>
                        <div id="tabContent7" style="display: none;">

                            <div class="row border-bottom-hide last_row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://bigrededucation.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/YXsBZinObCrCTKWFHrKSjrYXKSwEPAC97eecAOkf.svg"
                                    alt="Big Red Education" class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://p4i.net/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/p4i.svg" alt="P4i"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.startup-movers.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/NAV25qtfihaJugg4yoWvU2o9BDSSK5zpZNVoFQQ9.svg"
                                    alt="Startup Movers (CRM)" class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://gleaf.in/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/greenleaf.svg" alt="Greenleaf"
                                    class="img-fluid" loading="lazy"></a></div>

                                    <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://alsowise.com/" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/alsowise.svg" alt="Alsowise"
                                        class="img-fluid" loading="lazy"></a></div>
                                   
                            </div>
                        </div>

                        <div id="tabContent8" style="display: none;">

                            <div class="row border-bottom-hide last_row">
                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://alsowise.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/alsowise.svg" alt="Alsowise"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://www.arenesslaw.com/" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/areness.svg" alt="Areness Dashboard (CRM)"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/Hyrefast_Logo 2.svg" alt="Hyrefast"
                                    class="img-fluid" loading="lazy"></a></div>

                                <div class="col-lg-2 col-md-2 col-6 right-bottom-img"><a href="https://rierp.com" target="_blank" class="text-center" ><img
                                    src="https://thenightmarketer.com/storage/client/logos/rajyog.svg" alt="Rajyog"
                                    class="img-fluid" loading="lazy"></a></div>

                                    <div class="col-lg-2 col-md-2 col-6 right-bottom-img"> <a href="" target="_blank" class="text-center" ><img
                                        src="https://thenightmarketer.com/storage/client/logos/Youshare.svg" alt="Youshare"
                                        class="img-fluid" loading="lazy"></a></div>
                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="bg-black client-and-partners-section pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2 class="portfolio-sectio-main-headline pb-3">Our Partners</h2>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('client/images/parner1.png') }}" alt="Figma" class="img-fluid">
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('client/images/patner2.png') }}" alt="Figma" class="img-fluid">
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('client/images/partner3.png') }}" alt="Figma" class="img-fluid">
            </div>
        </div>
    </div>
</section>


<section class="bg-black">
    <!-- Start Generation Here -->
<div class="bg-black d-xl-block d-lg-block d-md-block d-none">
    <div class="container ">
        <div class="consultation-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <img src="{{ asset('client/images/partner_cta.png') }}" alt="Figma"
                            class="img-fluid mb-2">
                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-12 align-self-center">
                        <h3 class="lets-get-started">Want to become<br>our Partner?</h3>
                        <a href="{{ route('contact-us') }}" class="btn btn-dark mt-3 book-call-btn_white">Book Now</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<div class="bg-black d-xl-none d-lg-none d-md-none d-block ">
    <div class="container ">
        <div class="consultation-banner-mob">
            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-md-7 col-sm-12 text-center pt-5">
                        <h3 class="lets-get-started">Want to become our Partner?</h3>
                        <a href="{{ route('contact-us') }}" class="btn btn-dark mt-3 book-call-btn_white">Book Now</a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <img src="{{ asset('client/images/partner_cta.png') }}" alt="Figma"
                            class="img-fluid">
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
</section>

@endsection
