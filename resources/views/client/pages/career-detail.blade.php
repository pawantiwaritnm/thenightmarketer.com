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
        }




        body {
            background-color: #f8fafc;
            color: #334155;
            background-image: 
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(139, 92, 246, 0.08) 0px, transparent 50%);
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .gradient-text {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .custom-file-upload {
            border: 2px dashed #cbd5e1;
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #f1f5f9;
        }

        .custom-file-upload:hover {
            border-color: #8b5cf6;
            background-color: rgba(139, 92, 246, 0.05);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f8fafc;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .navbar{
            background-color: #000000;
        }

        .badge-custom {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            color: #1d4ed8;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .icon-box {
            width: 2rem;
            height: 2rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-box {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            background-color: white;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 0.875rem;
            font-weight: 500;
            color: #475569;
        }

        .responsibility-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 0.75rem;
            background-color: white;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .responsibility-item:hover {
            border-color: #d8b4fe;
        }

        .responsibility-icon {
            color: #8b5cf6;
            margin-top: 0.25rem;
            flex-shrink: 0;
        }

        .skill-card {
            padding: 1.25rem;
            border-radius: 0.75rem;
            background-color: white;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            background-color: #f1f5f9;
            color: #475569;
            font-size: 0.875rem;
            border: 1px solid #e2e8f0;
        }

        .perks-section {
            padding: 1.5rem;
            border-radius: 1rem;
            background: linear-gradient(to right, #f0f4ff, #faf5ff);
            border: 1px solid #e0e7ff;
        }

        .perk-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #475569;
            font-size: 0.875rem;
        }

        .form-control-custom {
            background-color: #f1f5f9 !important;
            border: 1px solid #e2e8f0 !important;
            color: #1e293b !important;
        }

        .form-control-custom:focus {
            background-color: #f1f5f9 !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25) !important;
        }

        .form-control-custom::placeholder {
            color: #94a3b8 !important;
        }

        .btn-submit {
            background: linear-gradient(to right, #2563eb, #7c3aed);
            border: none;
            color: white;
            font-weight: 600;
            padding: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .btn-submit:hover {
            background: linear-gradient(to right, #1d4ed8, #6d28d9);
            color: white;
            transform: translateY(-2px);
        }

        .sticky-form {
            position: sticky;
            top: 6rem;
        }

        .hero-section {
            padding-top: 8rem;
            padding-bottom: 5rem;
            position: relative;
            overflow: hidden;
        }

        .blur-element {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
            opacity: 0.3;
        }

        .blur-blue {
            width: 24rem;
            height: 24rem;
            background-color: #dbeafe;
            top: 5rem;
            left: 25%;
            z-index: -1;
        }

        .blur-purple {
            width: 24rem;
            height: 24rem;
            background-color: #f3e8ff;
            bottom: 0;
            right: 25%;
            z-index: -1;
        }
    </style>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="blur-element blur-blue"></div>
        <div class="blur-element blur-purple"></div>
        
        <div class="container text-center position-relative" style="z-index: 10;">
            <!-- Badge -->
            <div class="mb-4">
                <div class="badge-custom d-inline-flex">
                    <span class="position-relative d-inline-flex" style="height: 0.5rem; width: 0.5rem; margin-right: 0.5rem;">
                        <span class="position-absolute top-0 start-0 h-100 w-100 bg-info rounded-circle opacity-75" style="animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;"></span>
                        <span class="position-relative rounded-circle bg-info" style="height: 0.5rem; width: 0.5rem;"></span>
                    </span>
                    We are hiring
                </div>
            </div>

            <!-- Heading -->
            <h1 class="display-3 fw-bold text-dark mb-4" style="letter-spacing: -0.025em;">
                {{ $job->title_part1 ?? explode(' ', $job->title)[0] }} <span class="gradient-text">{{ $job->title_part2 ?? (count(explode(' ', $job->title)) > 1 ? implode(' ', array_slice(explode(' ', $job->title), 1)) : '') }}</span>
            </h1>

            <!-- Description -->
            <p class="fs-5 text-secondary mb-5" style="max-width: 42rem; margin-left: auto; margin-right: auto; line-height: 1.75;">
                {{ $job->short_desc }}
            </p>

            <!-- Stats -->
            <div class="d-flex flex-wrap justify-content-center gap-3 gap-md-4">
                <div class="stat-box">
                    <i class="bi bi-geo-alt" style="color: #8b5cf6;"></i>
                    {{ $job->location }}
                </div>
                <div class="stat-box">
                    <i class="bi bi-clock" style="color: #3b82f6;"></i>
                    {{ $job->type->name ?? 'Full-Time' }}
                </div>
                <div class="stat-box">
                    <i class="bi bi-briefcase" style="color: #ec4899;"></i>
                    {{ $job->minimum_exp }}
                </div>
                @if($job->salary_range)
                <div class="stat-box">
                    <i class="bi bi-currency-rupee" style="color: #22c55e;"></i>
                    {{ $job->salary_range }}
                </div>
                @endif
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pb-5">
        <div class="container">
            <div class="row g-5">
                
                <!-- Left Column -->
                <div class="col-lg-7">
                    
                    <!-- About -->
                    <section>
                        <div class="section-heading">
                            <div class="icon-box" style="background-color: #eff6ff; color: #3b82f6;">
                                <i class="bi bi-file-text"></i>
                            </div>
                            <h2 class="mb-0" style="color: #0f172a;">About the Role</h2>
                        </div>
                        <div class="text-secondary" style="line-height: 1.75;">
                            {!! $job->long_desc !!}
                        </div>
                    </section>

                    <!-- Skills Required -->
                    @if($job->skills_req)
                    <section class="mb-5">
                        <div class="section-heading">
                            <div class="icon-box" style="background-color: #ffe4e9; color: #ec4899;">
                                <i class="bi bi-lightning"></i>
                            </div>
                            <h2 class="mb-0" style="color: #0f172a;">Required Skills</h2>
                        </div>
                        <div class="row g-3">
                            @foreach(array_map('trim', explode(',', $job->skills_req)) as $index => $skill)
                            <div class="col-md-6">
                                <div class="skill-card">
                                    <h5 class="fw-semibold text-dark mb-2">{{ $skill }}</h5>
                                    <p class="small text-secondary mb-0">Required for this position</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    <!-- Perks -->
                    @if(isset($benefits) && count($benefits) > 0)
                    <div class="perks-section mb-5">
                        <h4 class="fw-bold text-dark mb-3">Why Join The Night Marketers?</h4>
                        <div class="row g-3">
                            @foreach($benefits as $benefit)
                            <div class="col-6 perk-item">
                                <i class="bi {{ $benefit['icon'] }}" style="color: {{ $benefit['color'] ?? '#3b82f6' }};"></i>
                                {{ $benefit['title'] }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="perks-section mb-5">
                        <h4 class="fw-bold text-dark mb-3">Why Join The Night Marketers?</h4>
                        <div class="row g-3">
                            <div class="col-6 perk-item">
                                <i class="bi bi-people" style="color: #3b82f6;"></i>
                                Great Team & Culture
                            </div>
                            <div class="col-6 perk-item">
                                <i class="bi bi-rocket" style="color: #8b5cf6;"></i>
                                Rapid Growth
                            </div>
                            <div class="col-6 perk-item">
                                <i class="bi bi-palette" style="color: #eab308;"></i>
                                Creative Freedom
                            </div>
                            <div class="col-6 perk-item">
                                <i class="bi bi-award" style="color: #ec4899;"></i>
                                Career Advancement
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right Column - Application Form -->
                <div class="col-lg-5">
                    <div class="sticky-form">
                        <div class="glass-panel rounded-4 p-4 p-md-5" style="box-shadow: 0 20px 25px rgba(51, 65, 85, 0.1);">
                            <div style="position: absolute; top: 0; right: 0; width: 8rem; height: 8rem; background-color: rgba(191, 219, 254, 0.5); border-radius: 50%; filter: blur(50px); pointer-events: none;"></div>

                            <h3 class="fw-bold text-dark mb-2 position-relative" style="z-index: 1;">Apply Now</h3>
                            <p class="text-secondary small mb-4 position-relative" style="z-index: 1;">Fill out the form below to apply for this position.</p>

                            <div id="successMessage" class="alert alert-success d-none position-relative" style="z-index: 1;" role="alert"></div>

                            <form id="careerForm" enctype="multipart/form-data" class="position-relative" style="z-index: 1;">
                                @csrf
                                
                                <!-- Full Name -->
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-secondary">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" required class="form-control form-control-custom" placeholder="John Doe">
                                </div>

                                <!-- Email & Phone -->
                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium text-secondary">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" required class="form-control form-control-custom" placeholder="john@example.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium text-secondary">Phone <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" required class="form-control form-control-custom" placeholder="+91 98765 43210">
                                    </div>
                                </div>

                                <!-- Position -->
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-secondary">Position Applying For <span class="text-danger">*</span></label>
                                    <select class="form-select form-control-custom" name="role" required>
                                        @foreach($allJobs as $id => $title)
                                        <option value="{{ $title }}" {{ $job->title === $title ? 'selected' : '' }}>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- State & Experience -->
                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium text-secondary">State <span class="text-danger">*</span></label>
                                        <select name="state" required class="form-select form-control-custom">
                                            <option value="" disabled selected>Select State</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="West Bengal">West Bengal</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium text-secondary">Experience <span class="text-danger">*</span></label>
                                        <select name="experience" required class="form-select form-control-custom">
                                            <option value="" disabled selected>Years</option>
                                            <option value="0-1">0 - 1 Years</option>
                                            <option value="1-3">1 - 3 Years</option>
                                            <option value="3-5">3 - 5 Years</option>
                                            <option value="5+">5+ Years</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Portfolio/LinkedIn -->
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-secondary">Portfolio / LinkedIn URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text form-control-custom" style="border: 1px solid #e2e8f0; background-color: #f1f5f9;">
                                            <i class="bi bi-link text-secondary"></i>
                                        </span>
                                        <input type="url" name="linkedin" class="form-control form-control-custom" placeholder="https://">
                                    </div>
                                </div>

                                <!-- Resume Upload -->
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-secondary">Resume (PDF) <span class="text-danger">*</span></label>
                                    <div class="custom-file-upload" onclick="document.getElementById('resume').click()">
                                        <i class="bi bi-cloud-upload d-block mb-2" style="font-size: 2rem; color: #3b82f6;"></i>
                                        <p class="small fw-medium text-dark mb-1">Click to upload or drag and drop</p>
                                        <p class="text-secondary" style="font-size: 0.75rem;">PDF (Max 5MB)</p>
                                        <input type="file" name="resume" id="resume" class="d-none" accept=".pdf" required onchange="updateFileName(this)">
                                    </div>
                                    <p id="file-name" class="small text-primary mt-2 text-center d-none"></p>
                                </div>

                                <!-- Cover Letter -->
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-secondary">Cover Letter (Optional)</label>
                                    <textarea name="cover" rows="3" class="form-control form-control-custom" placeholder="Tell us why you're the best fit..."></textarea>
                                </div>

                                <!-- hCaptcha -->
                                <div class="mb-3">
                                    <div class="h-captcha" data-sitekey="15f8030e-6840-470e-8e24-791657d65e0e"></div>
                                    <span class="text-danger error-text h-captcha-response_error"></span>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-submit w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-send"></i>
                                    Submit Application
                                </button>

                                <p class="text-secondary mt-2 text-center" style="font-size: 0.625rem;">
                                    By clicking submit, you agree to our Terms & Privacy Policy.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@section('pageJs')
<script src="https://js.hcaptcha.com?render=explicit"></script>
    
<script>
    // File Upload Handler
    function updateFileName(input) {
        const fileNameDisplay = document.getElementById('file-name');
        if (input.files && input.files.length > 0) {
            fileNameDisplay.textContent = `Selected: ${input.files[0].name}`;
            fileNameDisplay.classList.remove('d-none');
        } else {
            fileNameDisplay.classList.add('d-none');
        }
    }

    // Form Submission Handler
    $(document).ready(function() {
        $('#careerForm').on('submit', function(e) {
            e.preventDefault();

            $('.error-text').text('');
            $('#successMessage').addClass('d-none').text('');

            const submitBtn = $('button[type="submit"]');
            const originalHTML = submitBtn.html();
            
            submitBtn.attr('disabled', true)
                .html('<span class="spinner-border spinner-border-sm me-2"></span> Submitting...');

            // Get hCaptcha response
            const hCaptchaResponse = hcaptcha.getResponse();

            if (!hCaptchaResponse) {
                $('.h-captcha-response_error').text('Please verify you are not a robot.');
                submitBtn.attr('disabled', false).html(originalHTML);
                return;
            }

            const formData = new FormData(this);
            formData.append('h-captcha-response', hCaptchaResponse);

            $.ajax({
                url: "{{ route('submit.career') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#successMessage').removeClass('d-none alert-danger')
                        .addClass('alert-success')
                        .text(response.success);

                    $('#careerForm')[0].reset();
                    hcaptcha.reset();
                    $('#file-name').addClass('d-none');

                    submitBtn.attr('disabled', false).html(originalHTML);

                    setTimeout(() => {
                        $('#successMessage').addClass('d-none').text('');
                    }, 10000);
                },
                error: function(xhr) {
                    submitBtn.attr('disabled', false).html(originalHTML);

                    let errorMessage = "An error occurred. Please try again.";
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = typeof xhr.responseJSON.error === 'string' ?
                            xhr.responseJSON.error :
                            Object.values(xhr.responseJSON.error).join('<br>');
                    }

                    $('#successMessage').removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .html(errorMessage);

                    setTimeout(() => {
                        $('#successMessage').addClass('d-none').text('');
                    }, 10000);
                }
            });
        });
    });

    // Ping animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ping {
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection
@endsection