@extends('client.layouts.app')
@section('content')
<style>
    :root {
        --primary: #6366f1;
        --secondary: #8b5cf6;
        --accent: #0ea5e9;
        --bg-body: #f8fafc;
        --bg-card: #ffffff;
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --glass-bg: rgba(255, 255, 255, 0.8);
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        --radius: 12px;
    }

    h1,
    h2,
    h3,
    h4 {
        line-height: 1.2;
    }

    a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
    }

    button {
        cursor: pointer;
        border: none;
        font-family: inherit;
    }

    .text-primary-custom {
        color: var(--primary);
    }

    .text-gradient {
        background: linear-gradient(to right, var(--accent), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hidden {
        display: none !important;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    @keyframes pulse-slow {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    .navbar {
        background-color: #0f0000ff;
    }

    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding-top: 96px;
        background: white;
        overflow: hidden;
    }

    .glow-spot {
        position: absolute;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.15;
        z-index: 1;
    }

    .glow-1 { top: -10%; left: -10%; background: #60a5fa; }
    .glow-2 { bottom: -10%; right: -10%; background: #a78bfa; }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        margin-bottom: 24px;
        color: var(--text-main);
    }

    .hero-desc {
        font-size: 1.25rem;
        color: var(--text-muted);
        max-width: 500px;
        margin-bottom: 40px;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        color: var(--primary);
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 24px;
    }

    .hero-badge .dot {
        width: 8px;
        height: 8px;
        background: var(--primary);
        border-radius: 50%;
        animation: pulse 3s infinite ease-in-out;
    }

    @keyframes pulse {
        0% {
            opacity: 0.5;
            transform: scale(0.8);
        }
        50% {
            opacity: 1;
            transform: scale(1.2);
        }
        100% {
            opacity: 0.5;
            transform: scale(0.8);
        }
    }

    .hero-btn-group {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .tnm-btn-primary {
        background: var(--primary);
        color: white !important;
        padding: 16px 32px;
        border-radius: 8px;
        font-weight: 700;
        transition: all 0.3s;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .tnm-btn-primary:hover {
        background: var(--secondary);
        transform: translateY(-2px);
    }

    .tnm-btn-outline {
        background: white;
        border: 1px solid var(--border-color);
        color: var(--text-muted) !important;
        padding: 16px 32px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .tnm-btn-outline:hover {
        border-color: var(--text-muted);
        color: var(--text-main) !important;
    }

    .hero-visual {
        position: relative;
        animation: float 6s ease-in-out infinite;
        z-index: 2;
    }

    .card-visual {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        padding: 20px;
        transform: rotate(-3deg);
        max-width: 400px;
        margin: 0 auto;
    }

    .fake-header {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
    }

    .fake-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .fake-dot.red { background: #f87171; }
    .fake-dot.yellow { background: #facc15; }
    .fake-dot.green { background: #4ade80; }

    .stat-box-main {
        background: linear-gradient(to right, #eff6ff, #f3e8ff);
        border-radius: 12px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .stat-num {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-main);
    }

    .stat-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
    }

    .stats-section {
        padding: 60px 0;
        background: var(--bg-body);
        border-top: 1px solid var(--border-color);
        border-bottom: 1px solid var(--border-color);
    }

    .stat-item h3 {
        font-size: 2.5rem;
        color: var(--text-main);
        margin-bottom: 4px;
        font-weight: 800;
    }

    .stat-item p {
        font-size: 0.9rem;
        color: var(--text-muted);
        font-weight: 500;
    }

    .values-section {
        padding: 100px 0;
        background: white;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 16px;
        color: var(--text-main);
    }

    .value-card {
        background: white;
        border: 1px solid var(--border-color);
        padding: 32px;
        border-radius: 16px;
        transition: all 0.3s;
        height: 100%;
    }

    .value-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary);
        box-shadow: var(--shadow-lg);
    }

    .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-bottom: 24px;
    }

    .icon-blue { background: #eff6ff; color: var(--primary); }
    .icon-purple { background: #f3e8ff; color: var(--secondary); }
    .icon-pink { background: #fce7f3; color: #ec4899; }

    .jobs-section {
        padding: 100px 0;
        background: var(--bg-body);
        border-top: 1px solid var(--border-color);
    }

    .filter-btn-custom {
        background: white;
        border: 1px solid var(--border-color);
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text-muted);
        transition: all 0.2s;
    }

    .filter-btn-custom:hover {
        color: var(--primary);
        border-color: var(--primary);
    }

    .filter-btn-custom.active {
        background: var(--text-main);
        color: white;
        border-color: var(--text-main);
    }

    .job-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 24px;
        position: relative;
        transition: all 0.3s;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .job-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary);
        box-shadow: 0 20px 25px -5px rgba(99, 102, 241, 0.1);
    }

    .job-icon-bg {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 4rem;
        opacity: 0.03;
        color: var(--text-main);
        transition: opacity 0.3s;
    }

    .job-card:hover .job-icon-bg {
        opacity: 0.1;
    }

    .job-tag {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        margin-bottom: 16px;
        background-color: #eff6ff;
        color: var(--primary);
        border: 1px solid #dbeafe;
        width: fit-content;
    }

    .tag-dev { background: #eff6ff; color: var(--primary); border: 1px solid #dbeafe; }
    .tag-design { background: #f3e8ff; color: var(--secondary); border: 1px solid #e9d5ff; }
    .tag-marketing { background: #fce7f3; color: #ec4899; border: 1px solid #fbcfe8; }

    .job-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: var(--text-main);
    }

    .job-meta {
        display: flex;
        gap: 16px;
        margin-bottom: 16px;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-muted);
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .job-desc {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin-bottom: 20px;
        flex-grow: 1;
        line-height: 1.6;
    }

    .skills-row {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .skill-pill {
        background: var(--bg-body);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .job-footer {
        padding-top: 16px;
        border-top: 1px solid var(--bg-body);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .location {
        font-size: 0.8rem;
        color: var(--text-muted);
        font-weight: 500;
    }

    .btn-apply-text {
        color: var(--text-main);
        font-weight: 700;
        font-size: 0.9rem;
        background: none;
        display: flex;
        align-items: center;
        gap: 6px;
        border: none;
        transition: color 0.3s;
    }

    .job-card:hover .btn-apply-text {
        color: var(--primary);
    }

    footer {
        background: #0f172a;
        color: #cbd5e1;
        padding: 60px 0 30px;
    }

    .footer-logo {
        font-size: 1.5rem;
        color: white;
        font-weight: 700;
    }

    .social-link-custom {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        transition: 0.3s;
    }

    .social-link-custom:hover {
        background: var(--primary);
        color: white;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 30px;
        display: flex;
        justify-content: space-between;
        font-size: 0.8rem;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tnm-modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s;
    }

    .tnm-modal-backdrop.active {
        opacity: 1;
        pointer-events: all;
    }

    .tnm-modal-content {
        background: white;
        padding: 32px;
        border-radius: 16px;
        width: 90%;
        max-width: 500px;
        transform: translateY(20px);
        transition: transform 0.3s;
        box-shadow: var(--shadow-lg);
    }

    .tnm-modal-backdrop.active .tnm-modal-content {
        transform: translateY(0);
    }

    .tnm-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .tnm-close-btn {
        background: none;
        font-size: 1.5rem;
        color: var(--text-muted);
        border: none;
    }

    .form-label-custom {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
    }

    .form-control {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 0.9rem;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .file-upload {
        border: 2px dashed var(--border-color);
        padding: 24px;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
    }

    .file-upload:hover {
        border-color: var(--primary);
        background: #eff6ff;
    }

    .btn-submit {
        width: 100%;
        background: var(--primary);
        color: white;
        padding: 14px;
        border-radius: 8px;
        font-weight: 700;
        margin-top: 10px;
        border: none;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--text-muted);
        opacity: 0.3;
        margin-bottom: 20px;
    }

    .empty-state p {
        color: var(--text-muted);
        font-size: 1.1rem;
    }

    @media (max-width: 991.98px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-desc {
            margin-inline: auto;
        }

        .hero-section {
            text-align: center;
            min-height: 100%;
        }

        .hero-btn-group {
            justify-content: center;
        }

        .hero-visual {
            display: none;
        }
    }
</style>

<main>
    <!-- <header class="hero-section">
        <div class="glow-spot glow-1"></div>
        <div class="glow-spot glow-2"></div>

        <div class="container position-relative z-1">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <div class="hero-badge">
                            <span class="dot"></span> We are Hiring
                        </div>
                        <h1 class="hero-title">
                            Join The<br>
                            <span class="text-gradient">Night Marketers</span>
                        </h1>
                        <p class="hero-desc">
                            We are a team of 30+ builders generating $56M+ for clients. We don't just market; we
                            engineer growth using AI, code, and creativity.
                        </p>
                        <div class="hero-btn-group">
                            <a href="#open-positions" class="tnm-btn-primary">See Open Positions</a>
                            <a href="#" class="tnm-btn-outline">Read Our Story</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-visual">
                        <div class="card-visual">
                            <div class="fake-header">
                                <div class="fake-dot red"></div>
                                <div class="fake-dot yellow"></div>
                                <div class="fake-dot green"></div>
                            </div>
                            <div class="stat-box-main">
                                <span class="stat-num">$56M+</span>
                                <span class="stat-label">Revenue Generated</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="stats-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title" style="font-size: 1.8rem; margin-bottom: 8px;">
                    Our Trusted Clients
                </h2>
                <p style="color: var(--text-muted); font-size: 0.95rem;">
                    Brands and businesses that trust The Night Marketer to build and grow their digital presence.
                </p>
            </div>
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="counter" data-target="450">0</h3>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="counter" data-target="30">0</h3>
                        <p>Team Members</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="counter" data-target="100">0</h3>
                        <p>AI Powered</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="counter" data-target="4.9">0</h3>
                        <p>Employee Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- JOBS -->
    <section class="jobs-section mt-3" id="open-positions">
        <div class="container">
            <div class="d-flex flex-column mb-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div>
                        <h2 class="section-title" style="font-size: 2rem; margin-bottom: 8px;">Open Positions</h2>
                        <p style="color: var(--text-muted);">Find your place in The Night Marketers.</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button class="filter-btn-custom active" data-filter="all">All Roles</button>
                        @foreach ($departments as $dept)
                        <button class="filter-btn-custom" data-filter="{{ $dept->id }}">{{ $dept->name }}</button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row g-3" id="job-grid">
                @forelse ($jobs as $job)
                <div class="col-md-6 col-lg-4 job-card-wrapper" data-category="{{ $job->department->id ?? '' }}">
                    <div class="job-card" data-url="{{ route('career.details', $job->slug) }}" style="cursor:pointer;">
                        <i class="fa-solid {{ $job->icon ?? 'fa-briefcase' }} job-icon-bg"></i>
                        
                        <span class="job-tag">
                            {{ $job->department->name ?? 'General' }}
                        </span>
                        
                        <h3 class="job-title">{{ $job->title }}</h3>

                        <div class="job-meta">
                            <span class="meta-item">
                                <i class="fa-solid fa-briefcase text-primary-custom"></i>
                                {{ $job->type->name ?? 'Full-Time' }}
                            </span>
                            <span class="meta-item">
                                <i class="fa-solid fa-clock text-primary-custom"></i>
                                {{ $job->minimum_exp ?? '0' }}
                            </span>
                        </div>

                        <p class="job-desc">{{ Str::limit($job->short_desc ?? 'Exciting opportunity to grow with us.', 120) }}</p>

                        <div class="skills-row">
                            @php
                                $skillsString = $job->skills_req ?? '';
                                $skills = array_map('trim', explode(',', $skillsString));
                                $skills = array_filter($skills); // Remove empty values
                                $skills = array_slice($skills, 0, 5); // Show max 5 skills
                            @endphp
                            @foreach ($skills as $skill)
                                @if(!empty($skill))
                                <span class="skill-pill">{{ $skill }}</span>
                                @endif
                            @endforeach
                        </div>

                        <div class="job-footer">
                            <span class="location">
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $job->location ?? 'New Delhi' }}
                            </span>
                            <button class="btn-apply-text" onclick="event.stopPropagation(); window.location.href='{{ route('career.details', $job->slug) }}'">
                                Apply Now <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fa-solid fa-briefcase"></i>
                        <p>No positions available at the moment. Check back soon!</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- VALUES -->
    <section class="values-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Why work with us?</h2>
                <p class="hero-desc mx-auto" style="font-size: 1rem; margin-bottom: 0;">
                    We build a culture where innovation meets execution. No corporate fluff, just high-impact work.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="icon-box icon-blue">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h3 class="job-title">Cutting-Edge Stack</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">
                            We don't do legacy. Work with React, Node.js, AI Agents, and modern tools.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="value-card">
                        <div class="icon-box icon-purple">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h3 class="job-title">Impact & Growth</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">
                            Meritocracy over seniority. Clear paths for promotion and leading projects.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="value-card">
                        <div class="icon-box icon-pink">
                            <i class="fa-solid fa-house-laptop"></i>
                        </div>
                        <h3 class="job-title">Flexibility</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">
                            We value output over hours. Enjoy hybrid and remote options.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CUSTOM MODAL -->
    <div class="tnm-modal-backdrop" id="applyModal">
        <div class="tnm-modal-content">
            <div class="tnm-modal-header">
                <h3 style="font-size: 1.25rem;">Apply for <span class="text-primary-custom" id="modalRoleName">Role</span></h3>
                <button class="tnm-close-btn" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="applyForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="job_id" id="jobId">
                
                <div class="mb-3">
                    <label class="form-label form-label-custom">Full Name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="John Doe" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label form-label-custom">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="john@example.com" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label form-label-custom">Portfolio / LinkedIn</label>
                    <input type="url" class="form-control" name="portfolio_url" placeholder="https://...">
                </div>
                
                <div class="mb-3">
                    <label class="form-label form-label-custom">Resume</label>
                    <div class="file-upload">
                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 1.5rem; color: #94a3b8; margin-bottom: 8px;"></i>
                        <p style="font-size: 0.8rem; color: #64748b;">Click to upload PDF</p>
                        <input type="file" name="resume" accept=".pdf" style="display:none;" id="resumeInput" required>
                    </div>
                </div>
                
                <button type="submit" class="btn-submit">Submit Application</button>
            </form>
        </div>
    </div>
</main>

<script>
    // --- FILTERING BY DEPARTMENT ---
    const filterBtns = document.querySelectorAll('.filter-btn-custom');
    const jobWrappers = document.querySelectorAll('.job-card-wrapper');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            jobWrappers.forEach(wrapper => {
                const category = wrapper.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    wrapper.classList.remove('hidden');
                    wrapper.style.animation = 'pulse-slow 0.5s';
                } else {
                    wrapper.classList.add('hidden');
                }
            });
        });
    });

    // --- CLICKABLE JOB CARDS ---
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.job-card').forEach(card => {
            card.addEventListener('click', (e) => {
                // Don't trigger if clicking on button or link
                if (e.target.closest('button, a')) return;
                
                const url = card.dataset.url;
                if (url) window.location.href = url;
            });
        });
    });

    // --- MODAL ---
    const modal = document.getElementById('applyModal');
    const modalRoleName = document.getElementById('modalRoleName');

    function openModal(roleName) {
        modalRoleName.textContent = roleName;
        modal.classList.add('active');
    }

    function closeModal() {
        modal.classList.remove('active');
    }

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // --- FILE UPLOAD ---
    const fileUpload = document.querySelector('.file-upload');
    const resumeInput = document.getElementById('resumeInput');

    if (fileUpload && resumeInput) {
        fileUpload.addEventListener('click', () => {
            resumeInput.click();
        });

        resumeInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                const fileName = e.target.files[0].name;
                fileUpload.querySelector('p').textContent = fileName;
            }
        });
    }

    // --- NAVBAR SCROLL ---
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.9)';
                navbar.style.boxShadow = '0 4px 6px -1px rgba(0,0,0,0.05)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.7)';
                navbar.style.boxShadow = 'none';
            }
        });
    }

    // --- COUNTER ANIMATION ---
    const counters = document.querySelectorAll(".counter");
    let statsPlayed = false;

    function animateCounters() {
        counters.forEach(counter => {
            let target = +counter.getAttribute("data-target");
            let duration = 2000; // 2 sec
            let startTime = null;

            function updateCounter(timestamp) {
                if (!startTime) startTime = timestamp;
                let progress = timestamp - startTime;
                let value = Math.min(progress / duration * target, target);

                counter.textContent = target % 1 !== 0 ? value.toFixed(1) : Math.floor(value) + "+";

                if (progress < duration) {
                    requestAnimationFrame(updateCounter);
                }
            }

            requestAnimationFrame(updateCounter);
        });
    }

    // Trigger when section appears
    const observer = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting && !statsPlayed) {
            animateCounters();
            statsPlayed = true; // run only once
        }
    }, { threshold: 0.4 });

    const statsSection = document.querySelector(".stats-section");
    if (statsSection) {
        observer.observe(statsSection);
    }
</script>

@endsection