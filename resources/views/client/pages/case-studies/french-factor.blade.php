@extends('client.layouts.app')
@section('content')

<style>
    .brand-color-box-inner {
    height: 241px;
    }

    @media (max-width: 480px) {
        .brand-color-box-inner {
            height: 100px !important;
            margin-bottom: 10px;
        }
    }
</style>
    <div class="case_study_area">
        <div class="main-hero-content-french">
            <!-- <div class="bg-pattern"></div> -->
            <div class="hero-content-french">
                <div class="text-center mb-5">

                    <img class="img-fluid" src="{{ asset('client/images/other-case-std/french-bottle.webp') }}"
                        alt="" />

                    {{-- <h2 class="display-3 maintext text-white fw-bold mb-4">
                    French Factor
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <img class="img-fluid" src="" alt="" />
                </div>
            </div> --}}
                </div>
            </div>
        </div>

            <section class="pt-0">
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2 class="content-title">French Factor</h2>
                            <p>
                                French Factor is premium perfume brand based in USA. The website, a masterpiece of design
                                and development, reflects the brand's luxurious ethos with its seamless animations and
                                refined aesthetics. Each element is crafted to offer a classic and immersive experience,
                                echoing the timeless sophistication of French perfumery. The site's design is not only
                                visually stunning but also a testament to the brand's commitment to quality and elegance.
                            </p>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <h5>Task</h5>
                                <p>
                                    We were assigned to design and develop 20 premium product pages for French Factor, each
                                    capturing the essence of their men's and women's perfumes. Over three months, we also
                                    integrated seamless animations to elevate the site's luxurious experience.
                                </p>
                            </div>
                            <div class="container-fluid ps-0 pe-0">
                                <div class="row">
                                    <div class="col-md-4">


                                        <div class="task-details">
                                            <h5 class="pt-3 fw-bold">Services</h5>
                                            <p>UX Research</p>
                                            <p>UI Design</p>
                                            <p>Custom Shopify</p>
                                            <p>Animations</p>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="task-details">
                                            <h5 class="pt-3 fw-bold">Duration</h5>
                                            <p>3 Months</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="task-details">
                                            <h5 class="pt-3 fw-bold">Client</h5>
                                            <p>French Factor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg_color-french">
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <h6>Plan of Actions</h6>
                            <h3 class="content-title2">
                                Plan of action to achieve the extraordinary results.
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    We engaged in extensive discussions with French Factor’s stakeholders to deeply
                                    understand and align with the brand vision, ensuring every detail was in harmony with
                                    their luxury ethos.


                                </p>

                                <p>
                                    Dedicated to designing the product pages, where critical thinking was applied to bridge
                                    stakeholder expectations with eCommerce business goals. This meticulous approach ensured
                                    that the final designs not only met but exceeded expectations, delivering an
                                    extraordinary and seamless digital experience for French Factor.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <!-- Handle different images for desktop and mobile -->
                            <img class="img-fluid w-100"
                                src="{{ asset('client/images/other-case-std/plan-action-img.webp') }}" />
                            {{-- <img class="img-fluid w-100 d-lg-none d-md-none d-block" src="{{ asset('storage/' . @$section->mobile_image) }}" alt="{{ $section->title }}" /> --}}
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="{{ asset('client/images/other-case-std/Frame 11752.webp') }}" />
                        </div>
                        <div class="offset-lg-2 col-lg-4 align-content-center mt-3 mt-lg-0">
                            <div>
                                <img class="img-fluid img_height" 
                                    src="{{ asset('client/images/other-case-std/Group 1000014037.webp') }}" alt="">
                                <div class="mt-3">
                                    <h6 class="fw-bold ">French Factor</h6>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>


            <section>
                <div class="container content-section content-section-french">
                    <div class="row">

                        <div class="col-lg-5">
                            <h6>Our Design Approach</h6>
                            <h3 class="content-title2">Challenges we faced in French Factor and how we overcome.</h3>
                        </div>



                        <div class="offset-lg-2 col-lg-4">
                            <div class="pb-2">
                                <div class="d-flex flex-column gap-4">
                                    <!-- Feature 1 -->
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="feature-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                viewBox="0 0 36 36" fill="none">
                                                <path
                                                    d="M33 25.11V7.00504C33 5.20504 31.53 3.87004 29.745 4.02004H29.655C26.505 4.29004 21.72 5.89504 19.05 7.57504L18.795 7.74004C18.36 8.01004 17.64 8.01004 17.205 7.74004L16.83 7.51504C14.16 5.85004 9.39 4.26004 6.24 4.00504C4.455 3.85504 3 5.20504 3 6.99004V25.11C3 26.55 4.17 27.9 5.61 28.08L6.045 28.14C9.3 28.575 14.325 30.225 17.205 31.8L17.265 31.83C17.67 32.055 18.315 32.055 18.705 31.83C21.585 30.24 26.625 28.575 29.895 28.14L30.39 28.08C31.83 27.9 33 26.55 33 25.11Z"
                                                    stroke="#222134" stroke-width="2.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M18 8.23499V30.735" stroke="#222134" stroke-width="2.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.625 12.735H8.25" stroke="#222134" stroke-width="2.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.75 17.235H8.25" stroke="#222134" stroke-width="2.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="feature-text">
                                            Strict on Brand Identity Guidelines
                                        </div>
                                    </div>

                                    <!-- Feature 2 -->
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="feature-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                viewBox="0 0 36 36" fill="none">
                                                <path
                                                    d="M33 18C33 26.28 26.28 33 18 33C9.72 33 3 26.28 3 18C3 9.72 9.72 3 18 3C26.28 3 33 9.72 33 18Z"
                                                    stroke="#222134" stroke-width="2.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M23.5651 22.77L18.9151 19.995C18.1051 19.515 17.4451 18.36 17.4451 17.415V11.265"
                                                    stroke="#222134" stroke-width="2.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="feature-text">
                                            Launch Delivery Time
                                        </div>
                                    </div>

                                    <!-- Feature 3 -->
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="feature-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                viewBox="0 0 36 36" fill="none">
                                                <path
                                                    d="M6.03 8.955C4.125 11.475 3 14.61 3 18C3 26.28 9.72 33 18 33C26.28 33 33 26.28 33 18C33 9.72 26.28 3 18 3"
                                                    stroke="#222134" stroke-width="2.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7.5 18C7.5 23.805 12.195 28.5 18 28.5C23.805 28.5 28.5 23.805 28.5 18C28.5 12.195 23.805 7.5 18 7.5"
                                                    stroke="#222134" stroke-width="2.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M18 24C21.315 24 24 21.315 24 18C24 14.685 21.315 12 18 12"
                                                    stroke="#222134" stroke-width="2.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="feature-text">
                                            Seamless Animation on Design & Development
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>

            <section class="bg_color-french">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <img class="img-fluid w-100"
                                src="{{ asset('client/images/other-case-std/Group 1000014064.webp') }}" />
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container content-section content-section-Step-One">
                    <div class="row ">

                        <div class="col-lg-6">
                            <h6 class="mb-lg-4">Step One: Preparing IA</h6>
                            <h3 class="content-title2">Finalizing<br>
                                the Information<br>
                                Architecture of Product</h3>
                        </div>



                        <div class=" col-lg-6">
                            <div class="pb-2">
                                <p>We’ve divided each product page into 8 Sections. Navigation and Footer will generics for
                                    all Products to keep the consistency all over the website.</p>

                                <ol>
                                    <li>Hero Section</li>
                                    <li>Product Page</li>
                                    <li>Key Notes</li>
                                    <li>USPs (Unique Selling Points)</li>
                                    <li>Product Reviews</li>
                                    <li>Upselling Other Family Products</li>
                                </ol>
                            </div>
                        </div>


                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 pe-lg-4">
                            <img class="img-fluid w-100 farch-h-lg-100"
                                src="{{ asset('client/images/other-case-std/Frame 11758.webp') }}" />
                        </div>

                        <div class="col-lg-6 ps-lg-4 mt-3 mt-lg-0">
                            <img class="img-fluid w-100 farch-h-lg-100"
                                src="{{ asset('client/images/other-case-std/Frame 11759.webp') }}" />
                        </div>

                    </div>
                </div>
            </section>


            <section class="pt-0">
                <div class="container content-section ">
                    <div class="row content-section-user-goal">

                        <div class="col-lg-5">
                            <h6 class="h4 fw-bold">User’s Goal</h6>
                            <p>The user's goal is to connect with the story behind each perfume before making a purchase.
                                They want to know what kind of fragrance it offers, the elements French Factor used to
                                create it, and ultimately, what makes it special. This connection gives them a compelling
                                reason to buy, as they feel more attached to the story and the essence of the perfume.</p>
                        </div>

                        <div class="col-lg-2"></div>

                        <div class="col-lg-5">
                            <h6 class="h4 fw-bold">Brand’s Goal</h6>
                            <p>The user's goal is to connect with the story behind each perfume before making a purchase.
                                They want to know what kind of fragrance it offers, the elements French Factor used to
                                create it, and ultimately, what makes it special. This connection gives them a compelling
                                reason to buy, as they feel more attached to the story and the essence of the perfume.</p>
                        </div>


                    </div>
                </div>
            </section>

            <section>
                <div class="container content-section">
                    <div class="row">

                        <div class="col-lg-6">
                            <h6>Step Two: Kick Off Design Iterations</h6>
                            <h3 class="content-title2">Initiate Design<br>
                                Iterations</h3>
                        </div>



                        <div class="col-lg-6">
                            <div class="pb-2">
                                <p>This is where we designed over 4+ Hero Screen banners for each perfume, carefully
                                    designed according to the stakeholders' brief. We focused on finalizing the hero section
                                    that best matches the personality of each fragrance, ensuring it resonates with the
                                    story and essence of the perfume.</p>
                            </div>
                        </div>

                        <div class="row mt-5 mx-auto">
                            <div class="col-lg-9">
                                <img class="img-fluid farch-h-lg-100 "
                                    src="{{ asset('client/images/other-case-std/image.webp') }}" />
                            </div>
                            <div class="col-lg-3 mt-4 mt-lg-0">
                                <img class="img-fluid farch-h-lg-100 "
                                    src="{{ asset('client/images/other-case-std/image2.webp') }}" />
                            </div>
                            <div class="col-lg-3 mt-4 farch-h-lg-100 ">
                                <img class="img-fluid"
                                    src="{{ asset('client/images/other-case-std/image3.webp') }}" />
                            </div>

                            <div class="col-lg-9 mt-4 farch-h-lg-100 mt-lg-0 mt-4">
                                <img class="img-fluid"
                                    src="{{ asset('client/images/other-case-std/image4.webp') }}" />
                            </div>

                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="container content-section">
                    <div class="row">

                        <div class="col-lg-6">
                            <h6>Step Three: Finalization</h6>
                            <h3 class="content-title2">Finalizing a<br>
                                Product Page</h3>
                        </div>



                        <div class="col-lg-6">
                            <div class="pb-2">
                                <p>When finalizing a product page, it's essential to include key elements that effectively
                                    convey the perfume's identity. The page should start with a captivating Hero Section
                                    that reflects the fragrance's essence, followed by a detailed Product Description.
                                    Highlight the Key Notes to emphasize the primary scents and ingredients, and clearly
                                    present the USPs that set the perfume apart. Including Product Reviews adds credibility,
                                    while Upselling Other Family Products enhances the shopping experience by offering
                                    complementary options.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="container content-section">
                    <div class="row">

                        <div class="col-lg-6">
                            <h6>Should follow the Brand Guidelines</h6>
                            <h3 class="content-title2">Brand Identity<br>
                                Guidelines</h3>
                        </div>



                        <div class="col-lg-6">
                            <div class="pb-2">
                                <h6>Brand Colors</h6>
                                <div class="container-fluid mt-4">
                                    <div class="row">
                                        <div class="col-md-4 ps-md-0">
                                            <div class="brand-color-box">
                                                <div class="brand-color-box-inner"
                                                    style="border-radius: 30px; background: #2D2926; width: 100%; ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="brand-color-box">
                                                <div class="brand-color-box-inner"
                                                    style="border-radius: 25px; background: #C6AA76; width: 100%; ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="brand-color-box">
                                                <div class="brand-color-box-inner"
                                                    style="border-radius: 25px; background: #CBC4BC; width: 100%; ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="brand-color-box">
                                                <div class="brand-color-box-inner"
                                                    style="border-radius: 25px; background: #E8E4E0; width: 100%; ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="brand-color-box">
                                                <div class="brand-color-box-inner"
                                                    style="border-radius: 30px; background: #FFF; width: 100%;  border: 1px solid rgba(0, 0, 0, 0.17)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pb-2 mt-4 d-flex flex-column gap-3">
                                <h6>Typeface</h6>
                                <img class="img-fluid w-25"
                                    src="{{ asset('client/images/other-case-std/Cralika.webp') }}" alt="">
                                <img class="img-fluid w-25"
                                    src="{{ asset('client/images/other-case-std/Adam.CG.webp') }}" alt="">
                                <img class="img-fluid w-25"
                                    src="{{ asset('client/images/other-case-std/Roboto Regular.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="bg_color-french pb-0">
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <h6>Animations & Interactions</h6>
                            <h3 class="content-title2">
                                Animations & Interactions in Figma
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    Jitter was instrumental in animating each product page in Figma, helping us create
                                    smooth and engaging interactions. This tool allowed us to enhance the user experience,
                                    making the pages more dynamic and visually aligned with the luxury of the French Factor
                                    brand.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-8 mx-auto position-relative">
                            <video width="100%" autoplay muted loop>
                                <source src="{{ asset('client/images/other-case-std/video1.mp4') }}" type="video/mp4">
                            </video>
                            <img class="section65-img-float floating"
                                src="{{ asset('client/images/other-case-std/image-4.webp') }}" alt="">
                            <img class="section66-img-float floating"
                                src="{{ asset('client/images/other-case-std/image-5.webp') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <h6>Development</h6>
                            <h3 class="content-title2">
                                Initiating</br>
                                Development Phase
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    As we transition into the development phase, our team is focused on translating the
                                    creative designs into a fully functional digital experience. This phase involves coding
                                    the layouts, integrating essential features, and ensuring seamless interactions across
                                    devices.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-5">
                            <!-- Handle different images for desktop and mobile -->
                            <img class="img-fluid w-100"
                                src="{{ asset('client/images/other-case-std/image-6.webp') }}" />
                            {{-- <img class="img-fluid w-100 d-lg-none d-md-none d-block" src="{{ asset('storage/' . @$section->mobile_image) }}" alt="{{ $section->title }}" /> --}}
                        </div>



                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 ">
                            <h3 class="content-title2">
                                Technical Challenges<br>
                                in Development
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    To address the challenge of making custom pages on Shopify with smooth animations and an
                                    enhanced eCommerce flow, here are some specific problems and solutions
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section class="bg_color-french">
                <div class="container content-section">
                    <div class="row">

                        <div class="col-lg-5">
                            <h6 class="h4 fw-bold">Major Problem</h6>
                            <p>Complex animations or custom interactions can cause page loading issues or slow down the
                                performance, especially on mobile devices, which can negatively impact the user experience.
                            </p>
                            <p class="mt-lg-5 mt-0">Shopify’s built-in themes often have limited customization options for
                                advanced animations or highly personalized user flows, which can restrict creativity and
                                brand-specific designs.</p>
                        </div>

                        <div class="col-lg-2"></div>

                        <div class="col-lg-5">
                            <h6 class="h4 fw-bold">Its Solution</h6>
                            <p>Optimize animations by using lightweight CSS animations rather than heavy JavaScript-based
                                ones. Also, consider lazy-loading elements and animations that only trigger when needed.
                                Tools like WebP for images and minifying CSS and JS files can improve performance while
                                keeping animations fluid.</p>
                            <p class="mt-lg-5 mt-0">Use Shopify’s custom Liquid code to go beyond standard theme templates.
                                For animations, integrate custom JavaScript or CSS animations within the Liquid files.
                                Shopify also allows for embedding third-party animation libraries like GSAP or ScrollMagic
                                to create smooth, responsive animations.</p>
                        </div>




                    </div>
                </div>
            </section>


            <section>
                <div class="container content-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <h3 class="content-title2">
                                Quality<br>
                                Check Phase
                            </h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="pb-2">
                                <p>
                                    Jitter was instrumental in animating each product page in Figma, helping us create
                                    smooth and engaging interactions. This tool allowed us to enhance the user experience,
                                    making the pages more dynamic and visually aligned with the luxury of the French Factor
                                    brand.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-11 mx-auto position-relative">
                            <div class="img-bg-effect">
                                <img class="img-fluid w-100"
                                    src="{{ asset('client/images/other-case-std/Rectangle.webp') }}" alt="">
                            </div>

                            <div class="frature_section-pointer mt-4">

                                <div class="feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                        viewBox="0 0 38 38" fill="none">
                                        <g clip-path="url(#clip0_193_1878)">
                                            <path
                                                d="M18.8333 0C8.44822 0 0 8.44822 0 18.8333C0 29.2185 8.44822 37.6667 18.8333 37.6667C29.2185 37.6667 37.6667 29.2185 37.6667 18.8333C37.6667 8.44822 29.2185 0 18.8333 0Z"
                                                fill="#F0CF22" />
                                            <path
                                                d="M28.3788 14.8426L18.1773 25.0438C17.8712 25.3498 17.4695 25.5038 17.0677 25.5038C16.666 25.5038 16.2642 25.3498 15.9582 25.0438L10.8576 19.9432C10.2438 19.3296 10.2438 18.3376 10.8576 17.7241C11.4711 17.1102 12.4629 17.1102 13.0767 17.7241L17.0677 21.7151L26.1597 12.6235C26.7732 12.0096 27.765 12.0096 28.3788 12.6235C28.9923 13.237 28.9923 14.2287 28.3788 14.8426Z"
                                                fill="#FAFAFA" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_193_1878">
                                                <rect width="37.6667" height="37.6667" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    All Platform Friendly
                                </div>


                                <div class="feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                        viewBox="0 0 38 38" fill="none">
                                        <g clip-path="url(#clip0_193_1878)">
                                            <path
                                                d="M18.8333 0C8.44822 0 0 8.44822 0 18.8333C0 29.2185 8.44822 37.6667 18.8333 37.6667C29.2185 37.6667 37.6667 29.2185 37.6667 18.8333C37.6667 8.44822 29.2185 0 18.8333 0Z"
                                                fill="#F0CF22" />
                                            <path
                                                d="M28.3788 14.8426L18.1773 25.0438C17.8712 25.3498 17.4695 25.5038 17.0677 25.5038C16.666 25.5038 16.2642 25.3498 15.9582 25.0438L10.8576 19.9432C10.2438 19.3296 10.2438 18.3376 10.8576 17.7241C11.4711 17.1102 12.4629 17.1102 13.0767 17.7241L17.0677 21.7151L26.1597 12.6235C26.7732 12.0096 27.765 12.0096 28.3788 12.6235C28.9923 13.237 28.9923 14.2287 28.3788 14.8426Z"
                                                fill="#FAFAFA" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_193_1878">
                                                <rect width="37.6667" height="37.6667" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    28Hrs of Quality Check
                                </div>

                                <div class="feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                        viewBox="0 0 38 38" fill="none">
                                        <g clip-path="url(#clip0_193_1878)">
                                            <path
                                                d="M18.8333 0C8.44822 0 0 8.44822 0 18.8333C0 29.2185 8.44822 37.6667 18.8333 37.6667C29.2185 37.6667 37.6667 29.2185 37.6667 18.8333C37.6667 8.44822 29.2185 0 18.8333 0Z"
                                                fill="#F0CF22" />
                                            <path
                                                d="M28.3788 14.8426L18.1773 25.0438C17.8712 25.3498 17.4695 25.5038 17.0677 25.5038C16.666 25.5038 16.2642 25.3498 15.9582 25.0438L10.8576 19.9432C10.2438 19.3296 10.2438 18.3376 10.8576 17.7241C11.4711 17.1102 12.4629 17.1102 13.0767 17.7241L17.0677 21.7151L26.1597 12.6235C26.7732 12.0096 27.765 12.0096 28.3788 12.6235C28.9923 13.237 28.9923 14.2287 28.3788 14.8426Z"
                                                fill="#FAFAFA" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_193_1878">
                                                <rect width="37.6667" height="37.6667" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Device Friendly Design
                                </div>

                                <div class="feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                        viewBox="0 0 38 38" fill="none">
                                        <g clip-path="url(#clip0_193_1878)">
                                            <path
                                                d="M18.8333 0C8.44822 0 0 8.44822 0 18.8333C0 29.2185 8.44822 37.6667 18.8333 37.6667C29.2185 37.6667 37.6667 29.2185 37.6667 18.8333C37.6667 8.44822 29.2185 0 18.8333 0Z"
                                                fill="#F0CF22" />
                                            <path
                                                d="M28.3788 14.8426L18.1773 25.0438C17.8712 25.3498 17.4695 25.5038 17.0677 25.5038C16.666 25.5038 16.2642 25.3498 15.9582 25.0438L10.8576 19.9432C10.2438 19.3296 10.2438 18.3376 10.8576 17.7241C11.4711 17.1102 12.4629 17.1102 13.0767 17.7241L17.0677 21.7151L26.1597 12.6235C26.7732 12.0096 27.765 12.0096 28.3788 12.6235C28.9923 13.237 28.9923 14.2287 28.3788 14.8426Z"
                                                fill="#FAFAFA" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_193_1878">
                                                <rect width="37.6667" height="37.6667" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Bug & Issue Free
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

     
            </section>


            <section>
            <div class="container content-section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pb-2">
                            <img class="img-fluid" src="{{ asset('client/images/other-case-std/image-7.webp') }}"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-1"></div>


                    <div class="col-lg-5 align-content-center">

                        <h3 class="content-title2">Flawless
                            <br>
                            testing across devices
                        </h3>
                        <p>The website has undergone rigorous testing on each device, ensuring optimal performance and
                            consistency across various platforms, including Windows, Mac, iOS, and Android. This thorough
                            process guarantees a flawless user experience, regardless of the device used to access the site.
                        </p>
                    </div>

                </div>
            </div>
            </section>



            <section class="bg_color-french">
            <div class="container content-section">
                <div class="row">
                    <div class="col-lg-5">

                        <h3 class="content-title2">
                            Website Launched Successfully
                        </h3>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <div class="pb-2">
                            <p>The website has been successfully launched, delivering a seamless and polished experience
                                across all devices. After thorough testing and refinement, we’re excited to see it live and
                                ready for users to explore.</p>
                            <a href="#" class="visit-website">Visit Website</a>
                        </div>
                    </div>
                </div>
       
            </section>
    </div>
@endsection
