<section class="form-section bg-black 
     ">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="testimonial-section-left">
                        {{-- <p class="testimonial-p">Get a Free eBook</p> --}}
                        <h3 class="testimonial-text d-none d-lg-block d-md-block">Get your first Website <br>Audit
                            Report<br>
                            for Free</h3>
                        <h3 class="testimonial-text d-block d-lg-none d-md-none">Get your first Website Audit Report
                            for Free</h3>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-6 col-sm-12 ">

                    <form id="ebookContactForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-lg-0 mt-md-0 mt-3">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Name" required>
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Phone Number" required>
                                    <span class="text-danger error-text phone_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-md-0 mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email Address" required>
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-md-0 mb-3">
                                    <input type="url" class="form-control" id="website_url" name="website_url"
                                        placeholder="Website / URL" required>
                                    <span class="text-danger error-text website_url_error"></span>
                                </div>
                            </div>
                           {{-- <div class="mb-3 pt-3">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE') }}"></div>
                                <span class="text-danger error-text g-recaptcha-response_error"></span>
                            </div>--}}
                            <div class="mb-3 pt-3">
                                <div class="h-captcha" data-sitekey="15f8030e-6840-470e-8e24-791657d65e0e"></div>
                                <span class="text-danger error-text h-captcha-response_error"></span>
                            </div>

                        </div>
                    </form>

                    <!-- Custom Trigger Button -->
                    <div class="row">
                        <div class="col-lg-6 col-md-10 col-sm-12">
                            <button id="customTriggerButton" class="book-call-btn button-success-home w-100 cro_cta_buttom mt-0">Get a Free
                                Report</button>
                        </div>
                    </div>

                    <div id="successMessage" class="alert alert-success  d-none mt-3"></div>


                </div>
            </div>
        </div>
    </section>