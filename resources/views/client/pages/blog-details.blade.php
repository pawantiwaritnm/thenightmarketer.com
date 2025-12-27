@extends('client.layouts.app')

@section('pageStyle')
@php
    use Illuminate\Support\Str;

    // Safe helpers
    $postUrl      = url()->current();
    $siteUrl      = url('/');
    $title        = trim($blog->title ?? '');
    $imageUrl     = isset($blog->image) ? asset('storage/' . $blog->image) : null;
    $categoryName = optional($blog->category)->name ?? 'Blog';
    $published    = \Carbon\Carbon::parse($blog->date ?? $blog->created_at)->toIso8601String();
    $modified     = \Carbon\Carbon::parse($blog->updated_at ?? $blog->date ?? now())->toIso8601String();

    // Derive description, keywords, word count, read time
    $plain        = trim(preg_replace('/\s+/', ' ', strip_tags($blog->desc ?? '')));
    $description  = Str::limit($plain, 160, '');
    $keywords     = collect(explode(',', (string)($blog->tags ?? '')))
                    ->map(fn($t) => trim($t))
                    ->filter()->values()->all();

    $wordCount    = str_word_count($plain);
    $minutes      = max(1, (int)ceil($wordCount / 200)); // ~200 wpm
    $timeRequired = "PT{$minutes}M";

    // Publisher
    $publisher = [
        "@type" => "Organization",
        "name"  => "The Night Marketer",
        "url"   => $siteUrl,
        "logo"  => [
            "@type" => "ImageObject",
            "url"   => asset('images/logo.png'),
        ],
    ];

    // Author
    $authorName = 'Team TNM';

    $blogPosting = [
        "@context"           => "https://schema.org",
        "@type"              => "BlogPosting",
        "mainEntityOfPage"   => [
            "@type" => "WebPage",
            "@id"   => $postUrl,
        ],
        "headline"           => $title,
        "description"        => $description,
        "image"              => $imageUrl ?: null,
        "articleSection"     => $categoryName,
        "keywords"           => $keywords,
        "inLanguage"         => "en",
        "isAccessibleForFree"=> true,
        "wordCount"          => $wordCount,
        "timeRequired"       => $timeRequired,
        "datePublished"      => $published,
        "dateModified"       => $modified,
        "author"             => [
            "@type" => "Person",
            "name"  => $authorName,
        ],
        "publisher"          => $publisher,
    ];

    // Breadcrumbs
    $breadcrumbs = [
        "@context"       => "https://schema.org",
        "@type"          => "BreadcrumbList",
        "itemListElement"=> [
            [
                "@type"   => "ListItem",
                "position"=> 1,
                "name"    => "Blog",
                "item"    => route('blogs'),
            ],
            [
                "@type"   => "ListItem",
                "position"=> 2,
                "name"    => $title,
                "item"    => $postUrl,
            ],
        ],
    ];

    $jsonLd = json_encode([$blogPosting, $breadcrumbs], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

    $currentUrl  = url()->current();
    $encodedUrl  = urlencode($currentUrl);
    $shareTitle  = urlencode($blog->title ?? config('app.name'));
@endphp

<script type="application/ld+json">{!! $jsonLd !!}</script>
@endsection

@section('content')
<style>
   body {
    background: #F7F7F7;
   }

    nav.navbar.navbar-expand-lg.navbar-dark.px-0 {
        background: #141318 !important;
    }

    /* --- Main Blog Title --- */
    .blog-main-title {
        font-size: 30px;
        font-weight: 700;
        line-height: 1.3;
        color: #111827;
        margin-bottom: 1rem;
    }

    /* --- Sticky Left TOC --- */
    .toc-sidebar {
        position: sticky;
        top: 120px;
        max-height: calc(100vh - 140px);
        overflow-y: auto;
        padding: 12px;
        border: 1px solid #fff;
        border-radius: 12px;
        background: #ffff;
        align-self: flex-start;
    }

    .toc-title {
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .toc-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .toc-list li {
        margin: 6px 0;
        line-height: 1.4;
    }

    .toc-list a {
        display: block;
        padding: 8px 10px;
        border-radius: 14px;
        text-decoration: none;
        color: #1f2937;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #fff;
    border: 1px solid #F0CF22;
    }

    .toc-list a:hover {
        background: #FCF7D8;
        border: 1px solid #F0CF22;
    }

    .toc-h1 {
        margin-left: 0;
        font-weight: 700;
    }

    .toc-h2 {
        margin-left: 0;
    }

    .toc-h3 {
        margin-left: 24px;
        font-size: 0.95rem;
    }

    .toc-list a.active {
        background: #FCF7D8;
        color: #000;
        font-weight: 400;
        border: 1px solid #F0CF22;
    }

    /* Mobile TOC */
    #table-of-contents {
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f7f7f7;
        font-family: Arial, sans-serif;
        width: 100%;
        margin: 20px 0;
        border-radius: 8px;
    }

    #table-of-contents h2 {
        font-size: 1.3rem;
        margin-bottom: 15px;
    }

    /* --- Content Area --- */
    #blogContent h1,
    #blogContent h2,
    #blogContent h3 {
        scroll-margin-top: 100px;
    }

    div#blogContent h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: #111827;
    }

    div#blogContent h2 {
        font-size: 1.75rem;
        font-weight: 400;
        margin-top: 1.75rem;
        margin-bottom: 0.875rem;
        color: #111827;
    }


    div#blogContent h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        color: #374151;
    }

    div#blogContent p {
        line-height: 1.75;
        margin-bottom: 1.25rem;
        color: #374151;
        font-size: 16px;
    }

    div#blogContent p:first-of-type {
        font-size: 17px;
        line-height: 1.8;
    }

    .featured-blog-image {
        width: 100%;
        margin-bottom: 30px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .featured-blog-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .blog-intro-text {
        font-size: 17px;
        line-height: 1.8;
        color: #4B5563;
        margin-bottom: 2rem;
        font-weight: 400;
    }

    .category-date-meta {
        font-size: 0.9rem;
        color: #6B7280;
        margin-bottom: 1.5rem;
        font-weight: 500;
    }

    .category-date-meta span {
        color: #111827;
        font-weight: 600;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
    }

    .table-responsive table {
        width: 100%;
        max-width: 100%;
        border-collapse: collapse;
    }

    /* --- Author Profile --- */
    .author-profile {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 30px;
    }

    .author-profile p {
        font-size: 0.8rem;
    }

    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #0048fc;
    }

    .author-name {
        font-size: 18px;
        font-weight: 700;
        margin-top: 0px;
    }

    .author-profile p.author-title {
        font-size: 16px;
        margin-bottom: 0px;
    }

    /* --- Share Bar --- */
    .share-container {
        margin: 20px 0;
        padding: 20px;
        background: #f9fafb;
        border-radius: 8px;
    }

    .share-bar {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        margin: 10px 0;
    }

    .share-label {
        font-weight: 700;
        margin-right: 10px;
        font-size: 16px;
        color: #111827;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 18px;
    }

    .share-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .share-btn.whatsapp {
        background: #25D366;
        color: white;
    }

    .share-btn.twitter {
        background: #1DA1F2;
        color: white;
    }

    .share-btn.facebook {
        background: #1877F2;
        color: white;
    }

    .share-btn.linkedin {
        background: #0A66C2;
        color: white;
    }

    .share-btn.email {
        background: #EA4335;
        color: white;
    }

    .share-btn.copy-link {
        background: #6B7280;
        color: white;
    }

    .share-btn.copy-link.copied {
        background: #10B981;
    }

    .share-counter {
        font-size: 14px;
        color: #6B7280;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .share-counter strong {
        color: #111827;
        font-weight: 700;
    }

    /* --- Tags --- */
    .tag-badge {
        background: #f0cf2285;
        color: #374151;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.875rem;
        margin: 4px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* --- Related Posts --- */
    .related-post-card {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 1rem;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: all 0.3s ease;
    }

    .related-post-card:hover {
        border-color: #f0cf2285;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .related-post-image {
        position: relative;
        height: 187px;
        border-radius: 8px;
        overflow: hidden;
        background-color: #dbeafe;
    }

    @media screen and (max-width: 1500px) {
 
            .related-post-image {
            height: 113px;
            }
        }

    .related-post-image .related-post-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    /* --- Sidebar Form --- */
    .form-sidebar-sticky {
        position: sticky;
        top: 120px;
        z-index: 4;
    }

    .sidebar-card {
        background: #fff;
        /* border: 1px solid #e5e7eb; */
        border-radius: 12px;
        /* box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05); */
        padding: 10px;
    }

    .sidebar-card h5 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #111827;
    }

    .btn-blog-from {
        background: #f0cf22;
        color: #000;
        font-weight: 500;
        border-radius: 10px;
        padding: 12px 25px;
        border-color: #f0cf22;
    }

    .form-control-blog-details {
        width: 100%;
        margin-bottom: 10px;
        height: 52px;
        padding: 0px 15px;
        outline: none;
        border-radius: 50px;
        border: 1.466px solid #000;
        background: transparent;
        color: #000;
    }

    .form-control-blog-details::placeholder {
        color: #000;
        padding: 10px;
    }

    .form-control-blog-details:focus {
        border-color: #000;
        outline: none;
        box-shadow: none;
    }

    .success-message {
        color: green;
        font-weight: bold;
        margin-top: 10px;
    }

    .d-none {
        display: none;
    }

    /* --- Responsive --- */
    @media screen and (min-width: 600px) {
        section.get-box.blog_page_details {
            padding-top: 30px !important;
        }
    }

    @media (max-width: 1024px) {
        .toc-sidebar {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .related-post-image {
            height: 250px;
        }

        .blog-main-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .blog-main-title {
            font-size: 1.5rem;
            line-height: 1.4;
        }

        .related-post-image {
            height: 120px;
        }

        .author-avatar {
            width: 45px !important;
            height: 45px !important;
        }
    }
</style>

<!-- Main Content Section -->
<section class="get-box blog_page_details" style="margin-top: 120px; padding-top: 30px;">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <!-- LEFT: Sticky ToC (desktop only) -->
            <aside class="col-lg-3 d-none d-lg-block">
                <div class="col-lg-3">
                <a href="{{ route('blogs') }}" class="btn btn-outline-dark mb-3 d-inline-flex align-items-center" style="gap:6px;">
                    <i class="fas fa-arrow-left"></i> Back
                </a></div>
                <nav id="toc-sidebar" class="toc-sidebar">
                    <div class="toc-title">Table of Contents</div>
                    <ul id="toc-list-sidebar" class="toc-list"></ul>
                </nav>
            </aside>

            <!-- MIDDLE: Blog content -->
            <div class="col-lg-6 col-md-8">
                <!-- Back Button -->
                

                <!-- Blog Title -->
                <h1 class="blog-main-title mb-3">{{ $blog->title }}</h1>

                <!-- Category & Date -->
                <p class="category-date-meta">
                    <span>{{ @$blog->category->name }}</span> | {{ \Carbon\Carbon::parse($blog->date)->format('d M y') }}
                </p>

                <!-- Featured Image -->
                @if(!empty($blog->image))
                <div class="featured-blog-image">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" />
                </div>
                @endif

                <!-- Mobile TOC -->
                <div id="table-of-contents" class="d-lg-none">
                    <h2>Table of Contents</h2>
                    <ul id="toc-list" class="toc-list"></ul>
                </div>

                <!-- Blog Content -->
                <div class="blog_detail_content" id="blogContent">
                    {!! @$blog->desc !!}
                </div>

                <!-- Key Takeaways -->
                @if (!empty($blog->key_takeaways))
                    <div class="mt-4">
                        <h5 class="fw-semibold mb-3">Key Takeaways</h5>
                        <div class="blog_detail_content">
                            {!! @$blog->key_takeaways !!}
                        </div>
                    </div>
                @endif

                <!-- Tags -->
                @if (!empty($blog->tags))
                    <div class="mt-4">
                        <h5 class="fw-semibold mb-3">Tags</h5>
                        <div class="mb-4">
                            @foreach (explode(',', $blog->tags) as $tag)
                                <span class="tag-badge"><i class="fas fa-tag"></i> {{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <hr />

                <!-- Author Profile -->
                <div class="author-profile">
                    <div>
                        <img src="{{ asset('images/team_tnm.png') }}" alt="Author avatar" class="author-avatar">
                    </div>
                    <div>
                        <b style="font-size: 14px;">Written by:</b>
                        <div class="author-name">Team TNM</div>
                        <p class="author-title">The Night Marketer (TNM) is a results-driven digital marketing agency specializing in e-commerce, SEO, and brand strategy.</p>
                        <p class="author-bio"><b>Published Date:</b> {{ \Carbon\Carbon::parse(@$blog->date)->format('d M y') }}</p>
                    </div>
                </div>

                <!-- Share Section -->
                <div class="share-container mt-4">
                    <div class="share-counter">
                        <strong id="share-counter-{{ $blog->id }}">{{ $blog->share_cnt ?? 0 }}</strong> Shares
                    </div>
                    <span class="share-label">Share:</span>
                    <div class="share-bar">
                        <a class="share-btn whatsapp" href="https://api.whatsapp.com/send?text={{ $shareTitle }}%20{{ $encodedUrl }}" target="_blank" onclick="incrementShare({{ $blog->id }})" title="Share on WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="share-btn twitter" href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $encodedUrl }}" target="_blank" onclick="incrementShare({{ $blog->id }})" title="Share on Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="share-btn facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}" target="_blank" onclick="incrementShare({{ $blog->id }})" title="Share on Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="share-btn linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url={{ $encodedUrl }}" target="_blank" onclick="incrementShare({{ $blog->id }})" title="Share on LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="share-btn email" href="mailto:?subject={{ rawurlencode($blog->title ?? 'Check this out') }}&body={{ $encodedUrl }}" onclick="incrementShare({{ $blog->id }})" title="Share via Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <button type="button" class="share-btn copy-link" id="copyLinkBtn" data-url="{{ $currentUrl }}" title="Copy Link">
                            <i class="fas fa-link"></i>
                        </button>
                    </div>
                </div>

                <!-- Related Posts -->
                <div class="mt-5">
                    <h4 class="mb-4">Related Posts</h4>
                    
                    <div class="related-post-slider">
                        @foreach ($latestBlogs as $latest)
                            <div class="px-2"> <a href="{{ route('blogDetails', @$latest->slug) }}" class="related-post-card d-block text-decoration-none">
                                    <div class="related-post-image position-relative mb-2">
                                        <img src="{{ asset('storage/' . $latest->image) }}" alt="{{ @$latest->title }}" class="img-fluid rounded shadow-sm" style="width: 100%; height: auto; object-fit: cover;" />
                                    </div>
                                    <h6 class="fw-semibold text-dark">{{ @$latest->title }}</h6>
                                    <p class="text-muted small mb-0">
                                        {{ \Carbon\Carbon::parse($latest->date)->format('F d, Y') }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- RIGHT: Sidebar Form -->
            <div class="col-lg-3 col-md-4">
                <div class="form-sidebar-sticky">
                    <div class="sidebar-card">
                        <img class="img-fluid pb-3" src="{{ asset('images/contactform.png') }}" alt="">
                        <div id="contactSuccessMessage" class="d-none success-message"></div>

                        <form action="" method="POST" id="contactForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">

                            <div class="mb-3">
                                <input type="text" class="form-control form-control-blog-details" id="name" name="name" placeholder="Name" required />
                                <span class="error-message text-danger" id="nameError"></span>
                            </div>

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-control-blog-details" id="email" placeholder="Email Address" required />
                                <span class="error-message text-danger" id="emailError"></span>
                            </div>

                            <div class="mb-3">
                                <input type="tel" name="phone" class="form-control form-control-blog-details" id="phone" placeholder="Phone Number" />
                            </div>

                            <div class="mb-3">
                                <input type="text" name="message" class="form-control form-control-blog-details" id="message" placeholder="Message" />
                            </div>

                            <div class="mb-3">
                                <div class="h-captcha" data-sitekey="15f8030e-6840-470e-8e24-791657d65e0e"></div>
                                @error('h-captcha-response')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="button" id="submitButton" class="btn btn-blog-from w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('pageJs')
<script>
// Wrap tables for responsiveness
document.addEventListener("DOMContentLoaded", function() {
    const blogContent = document.getElementById('blogContent');
    if (blogContent) {
        const tables = blogContent.getElementsByTagName('table');
        for (let i = 0; i < tables.length; i++) {
            const wrapper = document.createElement('div');
            wrapper.className = 'table-responsive';
            tables[i].parentNode.insertBefore(wrapper, tables[i]);
            wrapper.appendChild(tables[i]);
        }
    }
});
</script>

<script>
// Table of Contents Generation & Scroll Spy
(function(){
    const CONTENT = document.getElementById('blogContent');
    if (!CONTENT) return;

    // Get H1 and H2 headings, excluding those in .blog_cta
    const headings = Array.from(document.querySelectorAll('#blogContent h1, #blogContent h2'))
        .filter(h => !h.closest('.blog_cta'));

    // Generate slugs for IDs
    const slug = (txt) => txt.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-')
        .substring(0, 80);
    
    const used = new Set();
    headings.forEach(h => {
        if (!h.id) {
            let base = slug(h.textContent || 'section');
            let id = base, n = 2;
            while (used.has(id) || document.getElementById(id)) id = `${base}-${n++}`;
            h.id = id; 
            used.add(id);
        }
    });

    // Build TOC list item
    function makeItem(h){
        const li = document.createElement('li');
        li.classList.add(h.tagName.toLowerCase() === 'h1' ? 'toc-h1' : 'toc-h2');

        const a = document.createElement('a');
        a.href = 'javascript:void(0)';
        a.setAttribute('role', 'button');
        a.setAttribute('tabindex', '0');
        a.dataset.targetId = h.id;
        a.textContent = h.textContent.trim();

        const scrollToTarget = () => {
            const y = h.getBoundingClientRect().top + window.scrollY - 120;
            window.scrollTo({ top: y, behavior: 'smooth' });
        };

        a.addEventListener('click', (e) => { e.preventDefault(); scrollToTarget(); });
        a.addEventListener('keydown', (e) => { 
            if (e.key === 'Enter' || e.key === ' ') { 
                e.preventDefault(); 
                scrollToTarget(); 
            }
        });

        li.appendChild(a);
        return li;
    }

    function populate(listEl){
        if (!listEl) return;
        listEl.innerHTML = '';
        headings.forEach(h => listEl.appendChild(makeItem(h)));
    }

    populate(document.getElementById('toc-list'));          // mobile
    populate(document.getElementById('toc-list-sidebar'));  // desktop

    // Scrollspy
    const links = document.querySelectorAll('#toc-list a, #toc-list-sidebar a');
    const linkMap = new Map();
    links.forEach(a => {
        const id = a.dataset.targetId;
        if (!linkMap.has(id)) linkMap.set(id, []);
        linkMap.get(id).push(a);
    });

    let activeId = null;
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) activeId = entry.target.id;
        });
        links.forEach(a => { 
            a.classList.remove('active'); 
            a.removeAttribute('aria-current'); 
        });
        if (activeId && linkMap.has(activeId)) {
            linkMap.get(activeId).forEach(a => { 
                a.classList.add('active'); 
                a.setAttribute('aria-current', 'true'); 
            });
        }
    }, {
        root: null,
        rootMargin: '-50% 0px -50% 0px',
        threshold: 0
    });

    headings.forEach(h => observer.observe(h));
})();
</script>

<script>
// Copy Link functionality
document.addEventListener('DOMContentLoaded', function () {
    const copyBtn = document.getElementById('copyLinkBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', async function () {
            const url = this.getAttribute('data-url');
            try {
                await navigator.clipboard.writeText(url);
                const icon = this.querySelector('i');
                icon.className = 'fas fa-check';
                this.classList.add('copied');
                setTimeout(() => {
                    icon.className = 'fas fa-link';
                    this.classList.remove('copied');
                }, 1500);
            } catch {
                const ta = document.createElement('textarea');
                ta.value = url;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                document.body.removeChild(ta);
                const icon = this.querySelector('i');
                icon.className = 'fas fa-check';
                this.classList.add('copied');
                setTimeout(() => {
                    icon.className = 'fas fa-link';
                    this.classList.remove('copied');
                }, 1500);
            }
        });
    }
});
</script>

<script>
// Increment share count
function incrementShare(blogId) {
    fetch('/blog/increment-share/' + blogId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content || '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.share_count) {
            document.getElementById('share-counter-' + blogId).textContent = data.share_count;
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>

<script>
// Form validation and submission
$(document).ready(function() {
    function validateAndSubmitForm() {
        $('.error-message').text('');
        var valid = true;

        if ($('#name').val() == '') {
            $('#nameError').text('Name is required.');
            valid = false;
        }

        if ($('#email').val() == '') {
            $('#emailError').text('Email is required.');
            valid = false;
        } else if (!validateEmail($('#email').val())) {
            $('#emailError').text('Please enter a valid email.');
            valid = false;
        }

        if (!valid) return;

        var formData = new FormData($('#contactForm')[0]);

        $.ajax({
            url: "{{ route('contact-us-json') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#contactSuccessMessage').text(response.success).removeClass('d-none');
                    $('#contactForm')[0].reset();
                } else {
                    $.each(response.errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    $('#submitButton').on('click', function() {
        validateAndSubmitForm();
    });
});

function validateEmail(email) {
    var re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return re.test(String(email).toLowerCase());
}
</script>

<script>
    $(document).ready(function(){
        $('.related-post-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2, // Number of posts to show at once
            slidesToScroll: 1,
            arrows: false, // Set to true if you want navigation arrows
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
    </script>
@endsection