(function ($) {
	"use strict";


	/*=============================================
	=    		 Preloader			      =
	=============================================*/
	function preloader() {
		$('#xb-loadding').delay(0).fadeOut();
	};

	$(window).on('load', function () {
		preloader();
		wowAnimation();
	});

	// sticky header
	if ($('.stricky').length) {
		$('.stricky').addClass('original').clone(true).insertAfter('.stricky').addClass('stricked-menu').removeClass('original');
	}
	$(window).on('scroll', function () {
		if ($('.stricked-menu').length) {
			var headerScrollPos = 100;
			var stricky = $('.stricked-menu');
			if ($(window).scrollTop() > headerScrollPos) {
				stricky.addClass('stricky-fixed');
			} else if ($(this).scrollTop() <= headerScrollPos) {
				stricky.removeClass('stricky-fixed');
			}
		}

	});

	//=======================
	// header search
	$(".header-search-btn").on("click", function (e) {
		e.preventDefault();
		$(".header-search-form-wrapper").addClass("open");
		$('.header-search-form-wrapper input[type="search"]').focus();
		$('.body-overlay').addClass('active');
	});
	$(".tx-search-close").on("click", function (e) {
		e.preventDefault();
		$(".header-search-form-wrapper").removeClass("open");
		$("body").removeClass("active");
		$('.body-overlay').removeClass('active');
	});
	//=======================

	// mobile menu start
	$('#mobile-menu-active').metisMenu();

	$('#mobile-menu-active .dropdown > a').on('click', function (e) {
		e.preventDefault();
	});

	$(".hamburger_menu").on("click", function (e) {
		e.preventDefault();
		$(".slide-bar").toggleClass("show");
		$("body").addClass("on-side");
		$('.body-overlay').addClass('active');
		$(this).addClass('active');
	});

	$(".close-mobile-menu > a").on("click", function (e) {
		e.preventDefault();
		$(".slide-bar").removeClass("show");
		$("body").removeClass("on-side");
		$('.body-overlay').removeClass('active');
		$('.hamburger_menu').removeClass('active');
	});

	$('.body-overlay').on('click', function () {
		$(this).removeClass('active');
		$(".slide-bar").removeClass("show");
		$("body").removeClass("on-side");
		$('.hamburger-menu > a').removeClass('active');
		$(".header-search-form-wrapper").removeClass("open");
	});
	// mobile menu end

	// Off Canvas - Start
	// --------------------------------------------------
	$(document).ready(function () {
		$('.cart_close_btn, .body-overlay').on('click', function () {
			$('.cart_sidebar').removeClass('active');
			$('.body-overlay').removeClass('active');
		});

		$('.cart_btn').on('click', function () {
			$('.cart_sidebar').addClass('active');
			$('.body-overlay').addClass('active');
		});
	});



	$('.brand__marquee-left').marquee({
		speed: 50,
		gap: 30,
		delayBeforeStart: 0,
		direction: 'left',
		duplicated: true,
		pauseOnHover: true,
		startVisible: true,
	});
	$('.brand__marquee-right').marquee({
		speed: 50,
		gap: 30,
		delayBeforeStart: 0,
		direction: 'right',
		duplicated: true,
		pauseOnHover: true,
		startVisible: true,
	});

	//data background
	$("[data-background]").each(function () {
		$(this).css("background-image", "url(" + $(this).attr("data-background") + ") ")
	})

	// data bg color
	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));

	});

	function wowAnimation() {
		var wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 0,
			mobile: false,
			live: true
		});
		wow.init();
	}

	var slider = new Swiper('.testimonial__slider', {
		spaceBetween: 20,
		slidesPerView: 3,
		centeredSlides: true,
		roundLengths: true,
		loop: true,
		loopAdditionalSlides: 30,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});
	var slider = new Swiper('.crm-testimonial__slide', {
		spaceBetween: 40,
		slidesPerView: 2,
		centeredSlides: true,
		roundLengths: true,
		loop: true,
		loopAdditionalSlides: 30,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 2,
			},
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});
	var slider = new Swiper('.testimonial__active', {
		spaceBetween: 20,
		slidesPerView: 2,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		navigation: {
			nextEl: ".tm-button-next",
			prevEl: ".tm-button-prev",
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 2,
			},
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});
	var slider = new Swiper('.template__slider', {
		spaceBetween: 20,
		slidesPerView: 4,
		centeredSlides: true,
		roundLengths: true,
		loop: true,
		loopAdditionalSlides: 30,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		navigation: {
			nextEl: ".template-button-next",
			prevEl: ".template-button-prev",
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 4,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});
	var slider = new Swiper('.instagram__slide', {
		spaceBetween: 20,
		slidesPerView: 3,
		centeredSlides: true,
		roundLengths: true,
		loop: true,
		loopAdditionalSlides: 30,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
			// dynamicBullets: true,
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
				centeredSlides: false,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});


	/* magnificPopup img view */
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	/* magnificPopup video view */
	$('.popup-video').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-zoom-in',
	});

	$(document).ready(function () {

		var progressPath = document.querySelector('.progress-wrap path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function () {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		$(window).scroll(updateProgress);
		var offset = 50;
		var duration = 550;
		jQuery(window).on('scroll', function () {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.progress-wrap').addClass('active-progress');
			} else {
				jQuery('.progress-wrap').removeClass('active-progress');
			}
		});
		jQuery('.progress-wrap').on('click', function (event) {
			event.preventDefault();
			jQuery('html, body').animate({ scrollTop: 0 }, duration);
			return false;
		})

	});

	// typewriter
	$(document).ready(function () {
		if ($(".xb-title--typewriter").length) {
			function e(a, b) {
				a.length ? (a.eq(0).addClass("is-active"), a.eq(0).delay(3e3), a.eq(0).removeClass("is-active"), e(a.slice(1), b)) : b();
			}
			function f(a, b) {
				a.length ? (a.eq(0).addClass("is-active"), a.eq(0).delay(3e3).slideDown(3e3, function () {
					a.eq(0).removeClass("is-active"), f(a.slice(1), b);
				})) : b();
			}
			function d() {
				e($(".xb-title--typewriter .xb-item--text"), function () {
					f($(".xb-title--typewriter .xb-item--text"), function () {
						d();
					});
				});
			}
			d();
		}
	});


	gsap.registerPlugin(ScrollTrigger);

	gsap.fromTo(".crm-title__heading",
		{ y: -200, opacity: 0 },
		{
			y: 0,
			opacity: 1,
			ease: "power2.out",
			scrollTrigger: {
				trigger: ".crm-title",
				start: "top 60%",
				duration: 1,
				delay: 1,
				end: "+=300",
				markers: false
			}
		}
	);

	gsap.utils.toArray(".process__app-item, .process__title, .process__area").forEach((card, i) => {
		gsap.fromTo(card,
			{
				x: i % 2 === 0 ? -150 : 150,  // odd left, even right
				opacity: 0
			},
			{
				x: 0,
				opacity: 1,
				ease: "power2.out",
				scrollTrigger: {
					trigger: card,
					start: "top 85%",
					end: "top 60%",
					markers: false
				}
			}
		);
	});

	//   gsap.registerPlugin(ScrollTrigger);

	const bars = gsap.utils.toArray(".bar-graph-vertical .bar");

	gsap.fromTo(bars,
		{ height: 0 },
		{
			height: (i, bar) => bar.getAttribute("data-percentage"),
			duration: 1.2,
			ease: "power3.out",
			stagger: 0.25, // ek ke baad ek animate
			scrollTrigger: {
				trigger: ".bar-graph-section", // pura section trigger hoga
				start: "top 80%",              // jab section viewport ke 80% pe aata hai
				toggleActions: "play none none none",
				once: true                     // sirf ek hi baar chale
			}
		}
	);

	// pricing card gsap 

	const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

	// Count-up for ₹ values (keeps currency prefix)
	function countUpRupees(el, dur = 0.8) {
		const txt = el.textContent.trim();
		const target = parseInt(txt.replace(/[^\d]/g, ''), 10) || 0;
		const prefix = txt.replace(/\d.*/, ''); // e.g. "₹"
		const obj = { n: 0 };
		gsap.to(obj, {
			n: target,
			duration: dur,
			ease: "power2.out",
			onUpdate: () => { el.textContent = prefix + Math.round(obj.n).toLocaleString('en-IN'); }
		});
	}

	// ===== Timeline =====
	const tlPricing = gsap.timeline({ paused: true });

	// Header reveal
	tlPricing
		.from("#pricing .eyebrow", { y: 18, opacity: 0, duration: 0.35, ease: "power2.out" })
		.from("#pricing .heading", { y: 26, opacity: 0, duration: 0.5, ease: "power3.out" }, "-=0.15")
		.from("#pricing .segmented", { y: 16, opacity: 0, duration: 0.4, ease: "power2.out" }, "-=0.20")
		.from("#pricing .subgrid", { y: 16, opacity: 0, duration: 0.4, ease: "power2.out" }, "-=0.25");

	// Card: depthy rise-in + blur
	tlPricing
		.from("#pricing .card", {
			y: 60,
			opacity: 0,
			scale: 0.96,
			skewY: 3,
			rotateX: 6,
			filter: "blur(8px)",
			duration: prefersReduced ? 0.35 : 0.7,
			ease: "power3.out",
			stagger: { each: 0.12, from: "start" }
		}, "-=0.05")
		.from("#pricing .badge", {
			scale: 0,
			rotate: -8,
			duration: 0.5,
			ease: "back.out(1.8)"
		}, "-=0.35")
		.from("#pricing .features li", {
			x: -18,
			opacity: 0,
			filter: "blur(4px)",
			clipPath: "inset(0 100% 0 0)",
			duration: 0.35,
			ease: "power2.out",
			stagger: 0.05
		}, "-=0.1")
		.from("#pricing .foot .store", {
			x: 22,
			opacity: 0,
			duration: 0.35,
			ease: "power2.out",
			stagger: 0.08
		}, "-=0.2")
		.add(() => {
			const pro = document.getElementById("price-pro");
			if (pro) countUpRupees(pro, 1.0);
		}, "-=0.15");

	// ===== ScrollTrigger (no registerPlugin here) =====
	window.addEventListener('load', () => {
		ScrollTrigger.create({
			trigger: "#pricing",
			start: "top bottom-=10%", // fires when section just enters viewport
			once: true,               // run only once
			invalidateOnRefresh: true,
			onEnter: () => tlPricing.play()
			// markers: true, // uncomment to debug
		});
		ScrollTrigger.refresh();
	});

	// contact focus
	const inputs = document.querySelectorAll(".input");

	function focusFunc() {
		let parent = this.parentNode;
		parent.classList.add("focus");
	}

	function blurFunc() {
		let parent = this.parentNode;
		if (this.value === "") {
			parent.classList.remove("focus");
		}
	}

	inputs.forEach((input) => {
		input.addEventListener("focus", focusFunc);
		input.addEventListener("blur", blurFunc);
	});




	// free setup

	 gsap.set("#free-setup-feature .animated-gradient-text", { y: 25, opacity: 0 });
  gsap.set("#free-setup-feature .feature-subtitle", { y: 25, opacity: 0 });
  gsap.set("#free-setup-feature .accent-underline", { scaleX: 0, transformOrigin: "left center" });

  // Timeline for reveal on scroll
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: "#free-setup-feature",
      start: "top 75%",   // when top of section hits 75% of viewport
      toggleActions: "play none none reverse"
    }
  });

  tl.to("#free-setup-feature .animated-gradient-text", {
      y: 0, opacity: 1, duration: 0.7, ease: "power3.out"
    })
    .to("#free-setup-feature .accent-underline", {
      scaleX: 1, duration: 0.6, ease: "power2.out"
    }, "-=0.3")
    .to("#free-setup-feature .feature-subtitle", {
      y: 0, opacity: 1, duration: 0.6, ease: "power3.out"
    }, "-=0.2");

  // Gentle shimmer loop on the headline (subtle)
  gsap.to("#free-setup-feature .animated-gradient-text", {
    "--shine-x": "120%",
    duration: 2.8,
    ease: "sine.inOut",
    repeat: -1,
    yoyo: true
  });


	// faq accordion
	const faqItems = document.querySelectorAll('.faq-item');

	faqItems.forEach(item => {
		const question = item.querySelector('.faq-question');

		question.addEventListener('click', () => {
			// Close all other items
			faqItems.forEach(el => {
				if (el !== item) {
					el.classList.remove('active');
				}
			});

			// Toggle current item
			item.classList.toggle('active');
		});
	});
})(jQuery);



