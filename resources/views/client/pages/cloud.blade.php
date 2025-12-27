@extends('client.layouts.app')
@section('content')
<style>
	.cloud_point ul li {
	    display: flex;
	    justify-content: flex-start;
	    width: 100%;
	    gap: 15px;
	}
	.cloud_point ul li .icon {
	    max-width: 40px;
	    margin-right: 10px;
	}
	.cloud_point ul li .icon img {
	    width: 100%;
	}
	.cloud .row {
	    align-items: center;
	}
	 /*@media (max-width: 480px) {
        body {
            background: #25242c !important;

        }
    }*/

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
img.integrations_img {
    max-width: 280px;
    margin-top: 15px;
}
h3 {
    font-size: 35px;
    margin-bottom: 10px;
}
ul.cmn_point {
    column-count: 2;
}
.cloud_point ul li .text h6 {
    margin: 0;
}
.cloud_point ul li {
    border: 1px solid #e1e1e1;
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 10px;
}
.cloud_point ul li p {
    margin: 0;
}
@media (max-width: 480px) {
ul.cmn_point {
    column-count: 1;
}
.banner-section {
    padding: 15% 30px 112% 30px !important;
    margin-top: 16%;
}
nav.navbar.navbar-expand-lg.navbar-dark.px-0 {
    background: #25242c !important;
    top: 34px;
}
h3 {
    font-size: 25px;
}
section.cloud.cloud_first .cloud_right {
    margin-top: 25px;
}
section.cloud.cloud_second .cloud_right {
    margin-bottom: 15px;
}
section.cloud.cloud_third {
    padding-top: 0;
}
section.cloud.cloud_third .cloud_right {
    margin-top: 15px;
}
section.cloud.cloud_fourth {
    padding-top: 0;
}
section.cloud.cloud_fourth ul {
    padding: 0;
    margin-top: 30px;
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
p{
    opacity: 0.6;
}
section.cloud_banner {
    background: #141318;
    padding: 150px 0 50px;
    position: relative;
}
.cloud_banner .row {
    align-items: center;
}
.cloud_banner_left {
    padding-right: 80px;
}
.cloud_banner_left h1, .cloud_banner_left p {
    color: #fff;
}
.cloud_banner_left img {
    width: 100%;
    margin-top: 50px;
}
.cloud_banner_right img {
    width: 100%;
    border-radius: 40px;
}
section.cloud_why {
    position: relative;
    background: #141318;
}
.cloud_why .title h2 {
    margin-bottom: 50px;
    font-size: 40px;
}
.cloud_why_item h3 {
    color: #fff;
    font-size: 22px;
    margin: 15px 0;
}
.cloud_why_item p {
    color: #ffff;
}
.cloud_why_item img {
    max-width: 80px;
}
img.cloud_back {
    width: 100%;
}
.cloud_bg {
    background: #212028;
    padding-bottom: 40px;
}
section.cloud-belive {
    background: #141318;
}
section.cloud-belive h3 {
    color: #fff;
}
section.cloud-belive p {
    color: #fff;
}
section.cloud-belive h3 span {
    color: #f0cf22;
    font-family: "ivypresto_displaylight_italic";
}
.cloud-belive-item {
    margin-top: 30px;
}
.cloud-belive-item h5 {
    font-size: 20px;
    margin: 10px 0;
    color: #fff;
}
.cloud-belive-item p {
    margin: 0;
    opacity: 0.6;
}
@media only screen and (max-width: 600px) {
.cloud_banner_left {
    padding: 0;
    text-align: center;
}
.cloud_banner_right {
    margin-top: 30px;
}
section.cloud_banner {
    padding-bottom: 10px;
    padding-top: 120px;
}
.cloud_why .title h2 {
    font-size: 35px;
    margin-bottom: 30px;
}
.cloud_why_item h3 {
    font-size: 18px;
    margin: 10px 0;
}
.cloud_why_item p {
    margin-bottom: 30px;
    font-size: 15px;
}
section.cloud-belive,
.cloud_why_item{
    text-align: center;
}
}
</style>
<section class="cloud_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="cloud_banner_left">
                    <h1>Reduce Cloud Expenses</h1>
                    <p>Utilize AI-driven solutions to minimize waste, optimize workloads, and cut down on AWS costs. Intelligent automation guarantees you pay only for what you use—boosting efficiency while maintaining top-tier performance.</p>
                    <a href="https://thenightmarketer.com/contact-us" class="book-call-btn btn">Get Started</a>
                    <div class="cloud_payment">
                        <img src="{{ asset('client/images/Group1000014658.svg') }}" alt="Icon">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cloud_banner_right">
                    <img src="{{ asset('client/images/cloud_banner.jpg') }}" alt="Banner">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cloud_why">
    <img src="{{ asset('client/images/Group1000014668.svg') }}" class="cloud_back" alt="Image">
    <div class="cloud_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title">
                        <h2>Why Choose Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="cloud_why_item">
                        <img src="{{ asset('client/images/why_1.svg') }}" alt="Image">
                        <h3>Smart Anomaly Detection for Cost Control</h3>
                        <p>Our AI-powered system continuously monitors your AWS spending patterns to detect unusual cost spikes and potential billing issues before they become major problems.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cloud_why_item">
                        <img src="{{ asset('client/images/why_2.svg') }}" alt="Image">
                        <h3>Free Tier Management & Cost Optimization</h3>
                        <p>Get detailed insights into your AWS Free Tier usage and discover optimization opportunities. Our platform helps you maximize savings while maintaining optimal performance.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cloud_why_item">
                        <img src="{{ asset('client/images/why_3.svg') }}" alt="Image">
                        <h3>Compatible with all your favorite software tools</h3>
                        <p>Full integration and support for most popular tools and platforms. If there’s an integration missing that you need, let us know and we’ll happily add support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cloud-belive">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="cloud-belive-left">
                    <h3>Believing <br>in the synergy of <br><span>design and tech</span></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cloud-belive-right">
                    <p>As a conversion-focused agency, The Night Marketer offers comprehensive services including web design and development, social media management, SEO, and strategic marketing solutions. Our unique strength lies in fusing artistry and logic to craft digital storytelling that leaves a lasting impact, helping businesses stand out in a crowded online marketplace.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="cloud-belive-item">
                    <img src="{{ asset('client/images/Frame1000008737.svg') }}" alt="Image">
                    <h5>Slack</h5>
                    <p>AI-driven insights directly in Slack to stay on top of cloud spending.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cloud-belive-item">
                    <img src="{{ asset('client/images/Frame1000008738.svg') }}" alt="Image">
                    <h5>Microsoft Teams</h5>
                    <p>Collaborate on strategies with automated reports and actionable recommendations.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cloud-belive-item">
                    <img src="{{ asset('client/images/Frame1000008739.svg') }}" alt="Image">
                    <h5>Discord</h5>
                    <p>Monitor cloud costs, receive notifications, and keep your team informed effortlessly.</p>
                </div>
            </div>
        </div>
    </div>
</section>

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
                         <!-- Loop through FAQs -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading0">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse0" aria-expanded="false" aria-controls="faqCollapse0">
                                    What is The Night Marketer and how does it work?
                                </button>
                            </h2>
                            <div id="faqCollapse0" class="accordion-collapse collapse" aria-labelledby="faqHeading0" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    The Night Marketer is a cloud cost optimization platform that helps you reduce your AWS costs through automated analysis and recommendations.
                                </div>
                            </div>
                        </div>
                         <!-- Loop through FAQs -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                                    How much can I save with The Night Marketer?
                                </button>
                            </h2>
                            <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    On average, our customers save 30-50% on their AWS costs after implementing our recommendations. The exact savings depend on your current infrastructure and usage patterns.
                                </div>
                            </div>
                        </div>
                         <!-- Loop through FAQs -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                    How long does it take to get started?
                                </button>
                            </h2>
                            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   Getting started with The Night Marketer is quick and easy. Most customers are up and running within 15 minutes. Our platform requires minimal setup and automatically starts analyzing your infrastructure as soon as you connect your AWS account.
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cta -->
@include('client.utils.cta')
<!-- end-cta -->
@endsection