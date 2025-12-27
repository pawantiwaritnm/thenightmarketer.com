(function ($) {
	"use strict";
  
	/* ---------------------------
	   Helpers (no conflicts)
	--------------------------- */
	const qs  = (sel, root = document) => root.querySelector(sel);
	const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));
	const has = (sel, root = document) => !!qs(sel, root);
	const debounce = (fn, wait = 150) => {
	  let t; return (...args) => { clearTimeout(t); t = setTimeout(() => fn.apply(null, args), wait); };
	};
  
	/*=============================================
	=                Preloader + WOW
	=============================================*/
	function preloader() { $('#xb-loadding').delay(0).fadeOut(); }
  
	$(window).on('load', function () {
	  preloader();
	  wowAnimation();
	});
  
	function wowAnimation() {
	  if (typeof WOW === 'function') {
		var wow = new WOW({ boxClass: 'wow', animateClass: 'animated', offset: 0, mobile: false, live: true });
		wow.init();
	  }
	}
  
	/*=============================================
	=                Sticky header
	=============================================*/
	if ($('.stricky').length) {
	  $('.stricky').addClass('original').clone(true).insertAfter('.stricky').addClass('stricked-menu').removeClass('original');
	}
	$(window).on('scroll', function () {
	  if ($('.stricked-menu').length) {
		var headerScrollPos = 100;
		var stricky = $('.stricked-menu');
		if ($(window).scrollTop() > headerScrollPos) stricky.addClass('stricky-fixed');
		else stricky.removeClass('stricky-fixed');
	  }
	});
  
	/*=============================================
	=                Header search
	=============================================*/
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
  
	/*=============================================
	=                Mobile menu
	=============================================*/
	if ($('#mobile-menu-active').length && typeof $('#mobile-menu-active').metisMenu === 'function') {
	  $('#mobile-menu-active').metisMenu();
	}
	$('#mobile-menu-active .dropdown > a').on('click', function (e) { e.preventDefault(); });
  
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
  
	/*=============================================
	=                Off-canvas
	=============================================*/
	$(function () {
	  $('.cart_close_btn, .body-overlay').on('click', function () {
		$('.cart_sidebar').removeClass('active');
		$('.body-overlay').removeClass('active');
	  });
	  $('.cart_btn').on('click', function () {
		$('.cart_sidebar').addClass('active');
		$('.body-overlay').addClass('active');
	  });
	});
  
	/*=============================================
	=                Marquee (guarded)
	=============================================*/
	if ($.fn.marquee) {
	  $('.brand__marquee-left').marquee({ speed: 50, gap: 30, delayBeforeStart: 0, direction: 'left', duplicated: true, pauseOnHover: true, startVisible: true });
	  $('.brand__marquee-right').marquee({ speed: 50, gap: 30, delayBeforeStart: 0, direction: 'right', duplicated: true, pauseOnHover: true, startVisible: true });
	}
  
	/*=============================================
	=                Data background / color
	=============================================*/
	$("[data-background]").each(function () {
	  $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
	});
	$("[data-bg-color]").each(function () {
	  $(this).css("background-color", $(this).attr("data-bg-color"));
	});
  
	/*=============================================
	=                Swipers (guarded)
	=============================================*/
	if (typeof Swiper === 'function') {
	  const swipers = [
		{ sel: '.testimonial__slider', opts: { spaceBetween: 20, slidesPerView: 3, centeredSlides: true, roundLengths: true, loop: true, loopAdditionalSlides: 30, autoplay: { enabled: true, delay: 6000 }, speed: 400, breakpoints: { 1600:{slidesPerView:3},1200:{slidesPerView:2},992:{slidesPerView:2},768:{slidesPerView:1},576:{slidesPerView:1},0:{slidesPerView:1} } } },
		{ sel: '.crm-testimonial__slide', opts: { spaceBetween: 40, slidesPerView: 2, centeredSlides: true, roundLengths: true, loop: true, loopAdditionalSlides: 30, autoplay: { enabled: true, delay: 6000 }, speed: 400, breakpoints: { 1600:{slidesPerView:2},1200:{slidesPerView:2},992:{slidesPerView:2},768:{slidesPerView:2},576:{slidesPerView:1},0:{slidesPerView:1} } } },
		{ sel: '.testimonial__active', opts: { spaceBetween: 20, slidesPerView: 2, loop: true, autoplay: { enabled: true, delay: 6000 }, navigation: { nextEl: ".tm-button-next", prevEl: ".tm-button-prev" }, speed: 400, breakpoints: { 1600:{slidesPerView:2},1200:{slidesPerView:2},992:{slidesPerView:2},768:{slidesPerView:2},576:{slidesPerView:1},0:{slidesPerView:1} } } },
		{ sel: '.template__slider', opts: { spaceBetween: 20, slidesPerView: 4, centeredSlides: true, roundLengths: true, loop: true, loopAdditionalSlides: 30, autoplay: { enabled: true, delay: 6000 }, navigation: { nextEl: ".template-button-next", prevEl: ".template-button-prev" }, speed: 400, breakpoints: { 1600:{slidesPerView:4},1200:{slidesPerView:4},992:{slidesPerView:3},768:{slidesPerView:2},576:{slidesPerView:2},0:{slidesPerView:1} } } },
		{ sel: '.instagram__slide', opts: { spaceBetween: 20, slidesPerView: 3, centeredSlides: true, roundLengths: true, loop: true, loopAdditionalSlides: 30, autoplay: { enabled: true, delay: 6000 }, pagination: { el: ".swiper-pagination", clickable: true }, speed: 400, breakpoints: { 1600:{slidesPerView:3},1200:{slidesPerView:3},992:{slidesPerView:3},768:{slidesPerView:2, centeredSlides:false},576:{slidesPerView:1},0:{slidesPerView:1} } } },
	  ];
	  swipers.forEach(s => { if (has(s.sel)) new Swiper(s.sel, s.opts); });
	}
  
	/*=============================================
	=                Magnific Popup (guarded)
	=============================================*/
	if ($.fn.magnificPopup) {
	  $('.popup-image').magnificPopup({ type: 'image', gallery: { enabled: true } });
	  $('.popup-video').magnificPopup({ type: 'iframe', mainClass: 'mfp-zoom-in' });
	}
  
	/*=============================================
	=                Progress back-to-top
	=============================================*/
	$(function () {
	  const pathEl = document.querySelector('.progress-wrap path');
	  if (!pathEl) return;
	  const len = pathEl.getTotalLength();
	  pathEl.style.transition = pathEl.style.WebkitTransition = 'none';
	  pathEl.style.strokeDasharray = len + ' ' + len;
	  pathEl.style.strokeDashoffset = len;
	  pathEl.getBoundingClientRect();
	  pathEl.style.transition = pathEl.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
	  const updateProgress = function () {
		const scroll = $(window).scrollTop();
		const height = $(document).height() - $(window).height();
		const progress = len - (scroll * len / height);
		pathEl.style.strokeDashoffset = progress;
	  };
	  updateProgress();
	  $(window).scroll(updateProgress);
	  const offset = 50, duration = 550;
	  $(window).on('scroll', function () {
		if ($(this).scrollTop() > offset) $('.progress-wrap').addClass('active-progress');
		else $('.progress-wrap').removeClass('active-progress');
	  });
	  $('.progress-wrap').on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, duration);
		return false;
	  });
	});
  
	/*=============================================
	=                Typewriter (existing)
	=============================================*/
	$(function () {
	  if ($(".xb-title--typewriter").length) {
		function e(a, b) { a.length ? (a.eq(0).addClass("is-active"), a.eq(0).delay(3e3), a.eq(0).removeClass("is-active"), e(a.slice(1), b)) : b(); }
		function f(a, b) { a.length ? (a.eq(0).addClass("is-active"), a.eq(0).delay(3e3).slideDown(3e3, function () { a.eq(0).removeClass("is-active"), f(a.slice(1), b); })) : b(); }
		(function d() { e($(".xb-title--typewriter .xb-item--text"), function () { f($(".xb-title--typewriter .xb-item--text"), d); }); })();
	  }
	});
  
	/*=============================================
	=                GSAP guarded usage
	=============================================*/
	const gsapReady = !!(window.gsap);
	const stReady   = !!(window.ScrollTrigger);
	if (gsapReady && stReady) {
	  gsap.registerPlugin(ScrollTrigger);
  
	  // 1) Process title entrance
	  if (has(".crm-title") && has(".crm-title__heading")) {
		gsap.fromTo(".crm-title__heading",
		  { y: -200, opacity: 0 },
		  {
			y: 0, opacity: 1, ease: "power2.out",
			scrollTrigger: { trigger: ".crm-title", start: "top 60%", end: "+=300", markers: false }
		  }
		);
	  }
  
	  // 2) Process cards
	  if (qsa(".process__app-item, .process__title, .process__area").length) {
		gsap.utils.toArray(".process__app-item, .process__title, .process__area").forEach((card, i) => {
		  gsap.fromTo(card,
			{ x: i % 2 === 0 ? -150 : 150, opacity: 0 },
			{
			  x: 0, opacity: 1, ease: "power2.out",
			  scrollTrigger: { trigger: card, start: "top 85%", end: "top 60%", markers: false }
			}
		  );
		});
	  }
  
	  // 3) Vertical bar graph (only if present)
	  if (has(".bar-graph-section") && qsa(".bar-graph-vertical .bar").length) {
		const bars = gsap.utils.toArray(".bar-graph-vertical .bar");
		gsap.fromTo(bars,
		  { height: 0 },
		  {
			height: (i, bar) => bar.getAttribute("data-percentage"),
			duration: 1.2, ease: "power3.out", stagger: 0.25,
			scrollTrigger: { trigger: ".bar-graph-section", start: "top 80%", toggleActions: "play none none none", once: true }
		  }
		);
	  }
  
	  // 4) Growth section (entire block guarded; does nothing if commented out)
	  document.addEventListener('DOMContentLoaded', () => {
		if (!has('.ln-growth-section')) return;
  
		const section = qs('.ln-growth-section');
		const wrap    = qs('.ln-bars');
		const bars    = gsap.utils.toArray('.ln-bar');
		const kpis    = gsap.utils.toArray('.ln-kpi__num');
		if (!wrap || !bars.length) return;
  
		// Reset
		bars.forEach(bar => {
		  const col = qs('.ln-bar__col', bar);
		  const val = qs('.ln-bar__val', bar);
		  if (col) col.style.setProperty('--bar', '0%');
		  if (val) val.textContent = '0%';
		});
		kpis.forEach(el => el.textContent = '0');
  
		// Counter helper
		function countTo(el, target, { duration = 1, decimals = 0, suffix = '' } = {}) {
		  const obj = { v: 0 };
		  return gsap.to(obj, {
			v: target, duration, ease: "power2.out",
			onUpdate: () => {
			  const val = decimals ? obj.v.toFixed(decimals) : Math.round(obj.v);
			  el.textContent = val + (suffix || '');
			}
		  });
		}
  
		// Build SVG overlay
		let svg, path, dots = [];
		const gradId = 'lnGrad-' + Math.random().toString(36).slice(2);
  
		function buildLine() {
		  if (!wrap) return;
		  if (svg) svg.remove();
		  dots = [];
  
		  const w = wrap.clientWidth;
		  const h = wrap.clientHeight;
		  const wrapRect = wrap.getBoundingClientRect();
  
		  svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
		  svg.setAttribute('viewBox', `0 0 ${w} ${h}`);
		  svg.setAttribute('preserveAspectRatio', 'none');
		  svg.classList.add('ln-line-overlay');
		  svg.setAttribute('aria-hidden', 'true');
  
		  const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
		  const grad = document.createElementNS('http://www.w3.org/2000/svg', 'linearGradient');
		  grad.setAttribute('id', gradId);
		  grad.setAttribute('x1', '0%'); grad.setAttribute('x2', '100%');
		  grad.setAttribute('y1', '0%'); grad.setAttribute('y2', '0%');
  
		  const getVar = (name, fallback) =>
			getComputedStyle(document.documentElement).getPropertyValue(name)?.trim() || fallback;
  
		  const stop1 = document.createElementNS('http://www.w3.org/2000/svg', 'stop');
		  stop1.setAttribute('offset', '0%');
		  stop1.setAttribute('stop-color', getVar('--ln-accent', '#6ee7ff'));
  
		  const stop2 = document.createElementNS('http://www.w3.org/2000/svg', 'stop');
		  stop2.setAttribute('offset', '100%');
		  stop2.setAttribute('stop-color', getVar('--ln-accent-2', '#8b5cf6'));
  
		  grad.appendChild(stop1); grad.appendChild(stop2);
		  defs.appendChild(grad);
		  svg.appendChild(defs);
  
		  path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
		  let d = '';
		  bars.forEach((bar, i) => {
			const v  = Number(bar.dataset.value || 0);
			const br = bar.getBoundingClientRect();
			const x  = (br.left - wrapRect.left) + br.width / 2;
			const y  = h - (v / 100) * h;
			d += (i === 0 ? 'M' : ' L') + x + ' ' + y;
  
			const c = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
			c.setAttribute('cx', x); c.setAttribute('cy', y);
			c.setAttribute('r', 5);  c.setAttribute('fill', `url(#${gradId})`);
			c.setAttribute('opacity', '0');
			svg.appendChild(c);
			dots.push(c);
		  });
  
		  path.setAttribute('d', d);
		  path.setAttribute('fill', 'none');
		  path.setAttribute('stroke', `url(#${gradId})`);
		  path.setAttribute('stroke-width', '3');
		  path.setAttribute('stroke-linecap', 'round');
		  path.setAttribute('stroke-linejoin', 'round');
		  svg.appendChild(path);
  
		  wrap.appendChild(svg);
		}
  
		buildLine();
  
		const tl = gsap.timeline({
		  scrollTrigger: { trigger: section, start: "top 70%", end: "bottom 30%", toggleActions: "play none none none", once: true, markers: false },
		  defaults: { ease: "power2.out" }
		});
  
		tl.add(() => {
		  if (!path) return;
		  const len = path.getTotalLength();
		  gsap.set(path, { strokeDasharray: len, strokeDashoffset: len });
		}, 0);
		tl.to(path, { strokeDashoffset: 0, duration: 1.1 }, 0)
		  .to(dots, { opacity: 1, scale: 1, transformOrigin: "center", duration: 0.3, ease: "back.out(2)", stagger: 0.08 }, 0.85);
  
		bars.forEach((bar, i) => {
		  const value = Number(bar.dataset.value || 0);
		  const col   = qs('.ln-bar__col', bar);
		  const valEl = qs('.ln-bar__val', bar);
  
		  if (col) {
			tl.to(col, {
			  duration: 1.0,
			  onUpdate: function () {
				const p = Math.min(100, this.progress() * value);
				col.style.setProperty('--bar', p + '%');
				if (valEl) valEl.textContent = Math.round(p) + '%';
			  }
			}, 0.95 + i * 0.12);
		  }
		  if (valEl) tl.fromTo(valEl, { y: 16, opacity: 0 }, { y: 0, opacity: 1, duration: 0.35 }, 1.15 + i * 0.12);
		});
  
		tl.from(".ln-subtitle, .ln-desc", { opacity: 0, y: 20, duration: 0.4, stagger: 0.08 }, "-=0.35");
		tl.from(".ln-bullets li", { opacity: 0, x: 16, duration: 0.25, stagger: 0.06 }, "-=0.3");
		tl.from(".ln-kpi", { opacity: 0, y: 12, duration: 0.3, stagger: 0.08 }, "-=0.2");
  
		const rebuild = debounce(() => { buildLine(); ScrollTrigger.refresh(); }, 150);
		window.addEventListener('resize', rebuild);
	  });
  
	  // 5) Pricing section
	  document.addEventListener('DOMContentLoaded', () => {
		if (!has('#pricing')) return;
		const tl = gsap.timeline({ scrollTrigger: { trigger: '#pricing', start: 'top 75%', once: true } });
  
		if (qsa('.p-card').length) {
		  tl.from('.p-card', { y: 50, opacity: 0, duration: .6, ease: 'power3.out', stagger: .12 });
		}
  
		const inrEl = document.getElementById('inr');
		const usdEl = document.getElementById('usd');
		const oldEl = qs('.p-old');
  
		const countUp = (el, target, prefix = '') => {
		  if (!el) return;
		  const obj = { n: 0 };
		  gsap.to(obj, {
			n: target, duration: 1, ease: 'power2.out',
			onUpdate: () => {
			  const locale = prefix === '₹' ? 'en-IN' : 'en-US';
			  el.textContent = prefix + Math.round(obj.n).toLocaleString(locale);
			}
		  });
		};
  
		tl.add(() => {
		  countUp(inrEl, parseInt(inrEl?.dataset.target || '5999', 10), '₹');
		  countUp(usdEl, parseInt(usdEl?.dataset.target || '100', 10), '$');
		  if (oldEl) {
			const isDollar = /Outside India|Global/i.test(oldEl.closest('.p-card')?.textContent || '');
			oldEl.textContent = (isDollar ? '$' : '₹') + (oldEl.dataset.target || (isDollar ? '249' : '9999'));
		  }
		}, '-=0.2');
	  });
  
	  // 6) Free-setup card (fully guarded)
	  (function () {
		if (!has(".free-setup-card")) return;
		const card     = qs(".free-setup-card");
		const confetti = qsa(".free-setup-confetti span", card);
		const badge    = qs(".free-setup-badge", card);
		const title    = qs(".free-setup-title", card);
		const accent   = qs(".free-setup-accent", card);
		const subtitle = qs(".free-setup-subtitle", card);
		const items    = qsa(".free-setup-list li", card);
		const ctas     = qsa(".free-setup-cta a", card);
		const glow     = qs(".free-setup-glow", card);
		const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  
		const tl = gsap.timeline({
		  scrollTrigger: { trigger: card, start: "top 70%", end: "bottom 40%", toggleActions: "play none none reverse" }
		});
  
		gsap.set(card, { opacity: 0, y: 40, scale: 0.98 });
		if (badge) gsap.set(badge, { opacity: 0, y: -12, rotate: -6 });
		if (title) gsap.set(title, { opacity: 0, y: 20 });
		if (subtitle) gsap.set(subtitle, { opacity: 0, y: 16 });
		if (items.length) gsap.set(items, { opacity: 0, x: -20, filter: "blur(6px)" });
		if (ctas.length) gsap.set(ctas, { opacity: 0, y: 14 });
		if (glow) gsap.set(glow, { opacity: 0.35, scale: 0.9 });
  
		tl.to(card, { opacity: 1, y: 0, scale: 1, duration: 0.7, ease: "power3.out" }, 0);
		if (badge)   tl.to(badge, { opacity: 1, y: 0, rotate: 0, duration: 0.5, ease: "back.out(1.8)" }, 0.05);
		if (title)   tl.to(title, { opacity: 1, y: 0, duration: 0.5, ease: "power2.out" }, 0.15);
		if (subtitle)tl.to(subtitle, { opacity: 1, y: 0, duration: 0.5, ease: "power2.out" }, 0.25);
		if (items.length) tl.to(items, { opacity: 1, x: 0, filter: "blur(0px)", duration: 0.55, ease: "power3.out", stagger: 0.06 }, 0.35);
		if (ctas.length)  tl.to(ctas,  { opacity: 1, y: 0, duration: 0.45, ease: "back.out(1.4)", stagger: 0.08 }, 0.55);
		if (glow)   tl.to(glow, { opacity: 0.6, scale: 1.08, duration: 0.8, ease: "sine.out" }, 0.2);
  
		if (accent) {
		  const underline = document.createElement("span");
		  Object.assign(underline.style, {
			position: "absolute", left: 0, right: "initial", bottom: "-6px", height: "4px",
			borderRadius: "999px", width: "0%", background: "linear-gradient(90deg,#60a5fa,#22d3ee,#34d399)", display: "block", pointerEvents: "none"
		  });
		  underline.setAttribute("aria-hidden", "true");
		  accent.style.position = "relative";
		  accent.appendChild(underline);
		  tl.to(underline, { width: "100%", duration: 0.7, ease: "power2.out" }, 0.2);
		}
  
		if (!prefersReduced && glow) {
		  gsap.to(glow, { opacity: 0.5, scale: 1.05, duration: 3, ease: "sine.inOut", repeat: -1, yoyo: true });
		}
  
		confetti.forEach((el, i) => {
		  const dur = gsap.utils.random(4.5, 7);
		  const xShift = gsap.utils.random(-30, 30);
		  const rot = gsap.utils.random(-180, 180);
		  const delay = gsap.utils.random(0, 2);
		  gsap.set(el, { y: -20, x: "+=" + gsap.utils.random(-10, 10), rotate: rot });
		  gsap.to(el, {
			y: gsap.utils.random(200, 320), x: `+=${xShift}`, rotate: `+=${gsap.utils.random(180, 540)}`,
			opacity: gsap.utils.random(0.4, 0.9), duration: dur, ease: "none", repeat: -1, delay,
			onRepeat: () => gsap.set(el, { y: -20, x: "+=" + gsap.utils.random(-10, 10) })
		  });
		});
  
		// Magnetic buttons
		const magneticize = (btn) => {
		  const strength = 18;
		  const rect = () => btn.getBoundingClientRect();
		  const move = (e) => {
			const r = rect();
			const relX = e.clientX - r.left - r.width / 2;
			const relY = e.clientY - r.top - r.height / 2;
			gsap.to(btn, { x: (relX / (r.width / 2)) * strength, y: (relY / (r.height / 2)) * strength, duration: 0.2, ease: "power3.out" });
		  };
		  const reset = () => gsap.to(btn, { x: 0, y: 0, duration: 0.35, ease: "power3.out" });
		  btn.addEventListener("mousemove", move);
		  btn.addEventListener("mouseleave", reset);
		};
		ctas.forEach(magneticize);
  
		// Card tilt (subtle)
		const tiltStrength = 8;
		const tilt = (e) => {
		  const r = card.getBoundingClientRect();
		  const cx = r.left + r.width / 2;
		  const cy = r.top + r.height / 2;
		  const dx = (e.clientX - cx) / (r.width / 2);
		  const dy = (e.clientY - cy) / (r.height / 2);
		  gsap.to(card, { rotationY: dx * tiltStrength, rotationX: -dy * tiltStrength, transformPerspective: 800, transformOrigin: "center", duration: 0.3, ease: "power2.out" });
		};
		const resetTilt = () => gsap.to(card, { rotationY: 0, rotationX: 0, duration: 0.5, ease: "power3.out" });
		card.addEventListener("mousemove", (e) => !prefersReduced && tilt(e));
		card.addEventListener("mouseleave", resetTilt);
  
		// Highlight list items on scroll progress
		if (items.length) {
		  gsap.to(items, {
			color: "#ffffff",
			backgroundColor: "rgba(255,255,255,0.06)",
			borderColor: "rgba(255,255,255,0.22)",
			scrollTrigger: { trigger: card, start: "top 80%", end: "bottom 20%", scrub: 0.5 },
			stagger: 0.05
		  });
		}
	  })();
	} // end gsapReady
  
	/*=============================================
	=                Contact focus (safe)
	=============================================*/
	(function () {
	  const inputs = document.querySelectorAll(".input");
	  if (!inputs.length) return;
	  function focusFunc() { this.parentNode.classList.add("focus"); }
	  function blurFunc()  { if (this.value === "") this.parentNode.classList.remove("focus"); }
	  inputs.forEach((input) => { input.addEventListener("focus", focusFunc); input.addEventListener("blur", blurFunc); });
	})();
  
	/*=============================================
	=                Demo modal
	=============================================*/
	document.addEventListener("DOMContentLoaded", () => {
	  const modal   = document.getElementById("demoModal");
	  if (!modal) return;
	  const openBtn = document.getElementsByClassName("openDemo");
	  const closeBtn = document.querySelector(".demo-close");
	  Array.from(openBtn).forEach((btn) => {
		btn.addEventListener("click", () => { modal.style.display = "flex"; document.body.style.overflow = "hidden"; });
	  });
	  if (closeBtn) {
		closeBtn.addEventListener("click", () => { modal.style.display = "none"; document.body.style.overflow = "auto"; });
	  }
	  window.addEventListener("click", (e) => {
		if (e.target === modal) { modal.style.display = "none"; document.body.style.overflow = "auto"; }
	  });
	});
  
	/*=============================================
	=                FAQ accordion
	=============================================*/
	(function () {
	  const faqItems = document.querySelectorAll('.faq-item');
	  if (!faqItems.length) return;
	  faqItems.forEach(item => {
		const question = item.querySelector('.faq-question');
		if (!question) return;
		question.addEventListener('click', () => {
		  faqItems.forEach(el => { if (el !== item) el.classList.remove('active'); });
		  item.classList.toggle('active');
		});
	  });
	})();




	/*=============================================*/
	// video
  

	



  })(jQuery);