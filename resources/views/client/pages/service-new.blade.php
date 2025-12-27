@extends('client.layouts.app')
@section('content')
<style>
section.service_new {
    padding: 160px 0 60px;
}
.service_left h2 {
    color: #fff;
    font-size: 35px;
}
.service_new_item {
    margin-bottom: 30px;
}
.service_new_item a {
    color: #fff;
    text-decoration: none;
}
.service_new_item a span {
    color: #ffd60a;
    font-size: 18px;
}	
.service_new_item a h4 {
    margin: 10px 0;
}
.service_new_item a p {
    opacity: 0.8;
    margin: 0;
}
section.pd-0 {
    padding: 0;
}
section.pd-50 {
    padding: 90px 0 90px;
}
section.pd-last.bg-black {
    padding-top: 0;
}

@media only screen and (max-width: 600px) {
	.service_left h2 {
	    font-size: 24px;
	    margin-bottom: 40px;
	}
	section.service_new.bg-black {
	    padding: 120px 0 30px;
	}
	section.pd-50.bg-black {
	    padding: 30px 0 20px;
	}
	.service_new_item a h4 {
    font-size: 16px;
	}
	.service_new_item a p{
		font-size:14px;
	}
}
</style>
<!-- AOS CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>



<section class="service_new bg-black">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="service_left">
					<h2 class="coman-text pb-2" data-aos="fade-up" data-aos-offset="100" data-aos-easing="ease-in-out">
    Creative Designs
</h2>

				</div>
			</div>
			<div class="col-md-9" >
				<div class="service_right">
					<div class="row">
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>01</span>
									<h4>UI/UX Design</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>02</span>
									<h4>Branding</h4>
									<p>Build a two-way conversation with your TG. Build brand love and boost your engagement rates.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>03</span>
									<h4>Graphic Design</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>04</span>
									<h4>Conversion Rate Optimization</h4>
									<p>Build a two-way conversation with your TG. Build brand love and boost your engagement rates.</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="pd-0 bg-black">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="service_left">
					<h2 class="coman-text pb-2" data-aos="fade-up" data-aos-offset="100" data-aos-easing="ease-in-out">Web Development</h2>
				</div>
			</div>
			<div class="col-md-9" >
				<div class="service_right">
					<div class="row">
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>01</span>
									<h4>Shopify/ WordPress</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>02</span>
									<h4>Webflow/ Wix/ Squarespace</h4>
									<p>Build a two-way conversation with your TG. Build brand love and boost your engagement rates.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>03</span>
									<h4>App Development</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>04</span>
									<h4>Custom Development</h4>
									<p>Build a two-way conversation with your TG. Build brand love and boost your engagement rates.</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pd-50 bg-black">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="service_left">
					<h2 class="coman-text pb-2" data-aos="fade-up" data-aos-offset="100" data-aos-easing="ease-in-out">Performance Marketing</h2>
				</div>
			</div>
			<div class="col-md-9" >
				<div class="service_right">
					<div class="row">
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>01</span>
									<h4>Email Marketing</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>02</span>
									<h4>Social Media Marketing</h4>
									<p>Build a two-way conversation with your TG. Build brand love and boost your engagement rates.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>03</span>
									<h4>SEOs</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pd-last bg-black">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="service_left">
					<h2 class="coman-text pb-2" data-aos="fade-up" data-aos-offset="100" data-aos-easing="ease-in-out">Cloud & AI Automations</h2>
				</div>
			</div>
			<div class="col-md-9" >
				<div class="service_right">
					<div class="row">
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>01</span>
									<h4>AI Agents</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>02</span>
									<h4>Cloud Setup & Migrations</h4>
									<p>Build a two-way conversation with your TG. Build brand love and boost your engagement rates.</p>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 mb-2" data-aos="fade-left">
							<div class="service_new_item">
								<a href="#">
									<span>03</span>
									<h4>eCommerce Automations</h4>
									<p>Craft a great user experience for your audience and retain them for life.</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection