@extends('client.layouts.app')
@section('content')

<div class="case_study_area">
    <div class="main-hero-content" style="background-color: {{ @$caseStudy->banner_color }}">
        <!-- <div class="bg-pattern"></div> -->
        <div class="container-fluid hero-content" style="">
            <div class="text-center mb-5">
                @if(!empty($caseStudy->client_logo))
                <img class="img-fluid" src="{{ asset('storage/' . @$caseStudy->client_logo) }}" alt="" />
                @endif
                <h1 class="display-3 maintext text-white fw-bold mb-4">
                    {{ @$caseStudy->title }}
                </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <img class="img-fluid" src="{{ asset('storage/' . @$caseStudy->banner_image) }}" alt="" />
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container content-section">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="content-title">{{ @$caseStudy->title }}</h2>
                    <p>
                        {{ @$caseStudy->summary	 }}
                    </p>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="pb-md-2 pb-0">
                        <h5>Task</h5>
                        <p>
                            {{ @$caseStudy->task }}
                        </p>
                    </div>
                    <div class="container-fluid ps-0 pe-0">
                        <div class="row">
                            <div class="col-md-4">
                                @php
                                // Decode the JSON string into an array
                                $services = json_decode($caseStudy->services);
                                @endphp

                                <div class="task-details">
                                    <h5 class="pt-3">Services</h5>
                                    @if(is_array($services) && count($services) > 0)
                                    @foreach($services as $service)
                                    <p>{{ $service }}</p>
                                    @endforeach
                                    @else
                                    <p>No services available</p>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="task-details">
                                    <h5 class="pt-3">Duration</h5>
                                    <p>{{ @$caseStudy->duration }} Months</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="task-details">
                                    <h5 class="pt-3">Client</h5>
                                    <p>{{ @$caseStudy->client_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(@$caseStudy->challenge_title != null && @$caseStudy->challenge_desc != null)
    <section class="bg_color">
        <div class="container content-section">
            <div class="row">
                <div class="col-lg-5">
                    <h6>The Challenge</h6>
                    <h3 class="content-title2">
                        {{ @$caseStudy->challenge_title }}
                    </h3>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="pb-2">
                        <p>
                            {{ @$caseStudy->challenge_desc }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @foreach($caseStudy->sections as $section)
    <section class="pb-sm-0">
        <div class="container content-section">
            <div class="row">
                @if(!empty($section->heading))
                <div class="col-lg-5">
                    <h6>{{ @$section->section_type }}</h6>
                    <h3 class="content-title2">{{ @$section->heading }}</h3>
                </div>
                @endif
                <div class="col-lg-2"></div>
                @if(!empty($section->content))
                <div class="col-lg-5">
                    <div class="pb-md-2 pb-0">
                        <p class="mb-0">{{ @$section->content }}</p>
                    </div>
                </div>
                @endif

               
            </div>
        </div>
         <!-- Check if section has an image -->
         @if($section->image)
         <div class="col-lg-12">
             <!-- Handle different images for desktop and mobile -->
             <img class="img-fluid w-100" src="{{ asset('storage/' . @$section->image) }}" alt="{{ $section->title }}" />
             {{-- <img class="img-fluid w-100 d-lg-none d-md-none d-block" src="{{ asset('storage/' . @$section->mobile_image) }}" alt="{{ $section->title }}" /> --}}
         </div>
         @endif
    </section>
    @endforeach


    <section style="background: #efeded">
        <div class="container content-section">
            <div class="row">
                <div class="col-lg-5">
                    <h6>The Solution</h6>
                    <h3 class="content-title2">
                        {{ @$caseStudy->solution_title }}
                    </h3>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="pb-2">
                        {{ @$caseStudy->solution_desc }}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="project_silder_wapper">
                    <!-- <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/1.1.webp') }}" alt="Slide 1" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/1.2.webp') }}" alt="Slide 2" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/3.web') }}p" alt="Slide 3" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/4.webp') }}" alt="Slide 4" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/5.webp') }}" alt="Slide 5" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/6.webp') }}" alt="Slide 6" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/7.webp') }}" alt="Slide 7" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/8.webp') }}" alt="Slide 8" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/9.webp') }}" alt="Slide 9" />
                    </div>
                    <div class="slide-content">
                        <img src="{{ asset('client/casestudy/silderimg/10.webp') }}" alt="Slide 10" />
                    </div> -->
                    @if($caseStudy->images && $caseStudy->images->count() > 0)
                    @foreach($caseStudy->images as $image)
                    <div class="slide-content">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->alt_text ?? 'Slide Image' }}" />
                    </div>
                    @endforeach
                    @else
                    <p>No images available</p>
                    @endif
                </div>
            </div>
        </div>
</div>
</section>

<section class="">
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-3 pb-2 pb-lg-0">
                <h6>Statistics</h6>
                <h3 class="content-title2">Problems we solved</h3>
            </div>
            <div class="col-lg-1"></div>

            @if(!empty($statistics) && is_array($statistics))
            @foreach($statistics as $key => $stat)
            <div class="col-md-4 mb-lg-4 mb-0">
                <div class="stats-box">
                    <div class="d-flex align-items-center">
                        <!-- Dynamic Icon Based on Index -->
                        <img src="{{ asset('client/casestudy/prblemicon' . ($key + 1) . '.svg') }}" alt="Icon {{ $key + 1 }}" />
                        @if ($key == 0)
                        <h4 class="display-6 fw-bold mb-0 ps-2">{{ $stat['percentage'] }}%</h4>
                        @elseif ($key == 1)
                        <h4 class="display-6 fw-bold mb-0 ps-2">{{ $stat['percentage'] }}+</h4>
                        @else
                        <h4 class="display-6 fw-bold mb-0 ps-2">{{ $stat['percentage'] }}%</h4>
                        @endif
                    </div>
                    <h5>{{ $stat['title'] }}</h5>
                    <p>{{ $stat['description'] }}</p>
                </div>
            </div>
            @endforeach
            @else
            <p>No statistics available.</p>
            @endif
        </div>
    </div>
</section>


<section class="bg_color">
    <div class="container content-section">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <h6>Lessons Learned</h6>
                <h3 class="content-title2">{{ $caseStudy->lessons_title ?? 'Default Title' }}</h3>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-7">
                <div class="row">
                    <!-- Display the first description -->
                    @if(!empty($caseStudy->lessons_desc_1))
                    <div class="pb-2 col-lg-6">
                        <p>{{ $caseStudy->lessons_desc_1 }}</p>
                    </div>
                    @endif

                    <!-- Conditionally display the second description if it exists -->
                    @if(!empty($caseStudy->lessons_desc_2))
                    <div class="pb-2 col-lg-6">
                        <p>{{ $caseStudy->lessons_desc_2 }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

</div>


@endsection