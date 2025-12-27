<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\PageMeta;
use App\Models\BlogCategory;
use App\Models\CaseStudy;
use App\Models\Team;
use App\Models\Industry;
use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Models\EbookContact;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\EbookContactMail;
use App\Models\Career;
use App\Mail\CareerApplicationMail;
use App\Mail\GraphicDesignAssignmentMail;
use App\Mail\FrontendAssignmentMail;
use Illuminate\Support\Facades\Http;
use App\Models\JobListing;
use App\Models\JobDepartment;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'home')->first();

        $blogs = Blog::orderBy('id', 'desc')->paginate(3);
        $caseStudies = caseStudy::where('status', 1)->with(['tags'])->orderBy('id', 'desc')->take(1)->get();
        return view('client.pages.index', compact('blogs', 'pageMeta', 'caseStudies'));
    }
    public function leadNets(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'home')->first();

        return view('client.products.leadnests', compact('pageMeta'));
    }
    public function index1(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'home')->first();

        $blogs = Blog::orderBy('id', 'desc')->paginate(3);
        $caseStudies = caseStudy::where('status', 1)->with(['tags'])->orderBy('id', 'desc')->take(4)->get();
        return view('client.pages.index1', compact('blogs', 'pageMeta', 'caseStudies'));
    }
    public function caseStudy(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'case-study')->first();

        $tabs = ['Development', 'CRMs & ERPs', 'UI/UX', 'Branding', 'Social Media', 'Marketing'];
        $caseStudy = [];
        $caseStudiesLoaded = collect(); // Track already loaded case studies

        foreach ($tabs as $tab) {
            $tabStudies = CaseStudy::where('status', 1)->whereHas('tags', function ($query) use ($tab) {
                $query->where('name', $tab);
            })
                ->with(['tags'])
                ->get()
                ->reject(function ($study) use ($caseStudiesLoaded) {
                    // Reject studies already added to avoid duplication
                    return $caseStudiesLoaded->contains($study->id);
                });

            // Add these studies to the loaded collection
            $caseStudiesLoaded = $caseStudiesLoaded->merge($tabStudies->pluck('id'));

            $caseStudy[$tab] = $tabStudies;
        }

        return view('client.pages.case-study', compact('caseStudy', 'pageMeta'));
    }


    public function caseStudyDetails(Request $request, $slug)
    {
        $pageMeta = PageMeta::where('slug', $slug)->first();

        $caseStudy = CaseStudy::with(['sections', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        $statistics = json_decode($caseStudy->statistics, true);
        return view('client.pages.case-study-detail', compact('caseStudy', 'statistics', 'pageMeta'));
    }


    // custom case study
    public function frenchfactor(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'french-factor')->first();


        return view('client.pages.case-studies.french-factor', compact('pageMeta'));
    }
    public function ozarLuxury(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'ozar-luxury')->first();


        return view('client.pages.case-studies.ozar-luxury', compact('pageMeta'));
    }
    public function fuelYourBody(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'fuel-your-body')->first();


        return view('client.pages.case-studies.fuel-your-body', compact('pageMeta'));
    }
    public function leadManagement(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'lead-management')->first();


        return view('client.pages.case-studies.lead-management', compact('pageMeta'));
    }
    // end
    public function greenLeaf(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'green-leaf')->first();


        return view('client.pages.case-studies.green-leaf', compact('pageMeta'));
    }
    public function sorbet(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'sorbet')->first();


        return view('client.pages.case-studies.sorbet', compact('pageMeta'));
    }
    public function rajdhani(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'rajdhani')->first();


        return view('client.pages.case-studies.rajdhani', compact('pageMeta'));
    }


    public function services(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'services')->first();
        $services = Service::with([
            'sections.items'
        ])->get();


        return view('client.pages.service', compact('services', 'pageMeta'));
    }
    public function serviceDetails(Request $request, $slug)
    {
        $pageMeta = PageMeta::where('slug', $slug)->first();
        $service = Service::with(['sections.items', 'faqs'])
            ->where('slug', $slug)
            ->firstOrFail();

        $sections = ServiceSection::where('service_id', $service->id)->with('items')->get();

        return view('client.pages.service-details', compact('service', 'pageMeta', 'sections'));
    }

    public function contactUs()
    {
        $pageMeta = PageMeta::where('slug', 'contact-us')->first();


        $countriesPath = public_path('countries.json');
        $countries = json_decode(File::get($countriesPath), true);


        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $captchaAnswer = $num1 + $num2;

        session(['custom_captcha' => $captchaAnswer]);

        return view('client.pages.contact-us', compact('pageMeta', 'countries', 'num1', 'num2'));
    }
    public function handleContactUs(Request $request)
    {
        // Check for spam words in all inputs
        $spamWords = ['free', 'money', 'win', 'viagra', 'drug', 'lottery', 'prize', 'cash', 'credit', 'debt', 'offer', 'guarantee', 'investment', 'rich', 'no cost', 'cashback', 'discount', 'earn', 'promotion', 'congratulations', 'exclusive', 'winner', 'deal', 'work from home', 'make money', 'limited time', 'get rich', 'luxury', 'claim', 'urgent', 'invest now', 'winner', 'click here', 'special offer', 'risk-free', 'unsecured loan', 'no obligation', 'instant approval', 'guaranteed', 'save big', 'today only', 'limited supply', 'never before', 'final chance', 'exclusive offer', 'get started', 'no purchase necessary', 'sign up now', 'act now', 'apply now'];

        // foreach ($request->all() as $input) {
        //     if (is_array($input)) {
        //         foreach ($input as $item) {
        //             foreach ($spamWords as $word) {
        //                 if (stripos($item, $word) !== false) {
        //                     return redirect()->back()->with('error', 'Spam detected!');
        //                 }
        //             }
        //         }
        //     } else {
        //         foreach ($spamWords as $word) {
        //             if (stripos($input, $word) !== false) {
        //                 return redirect()->back()->with('error', 'Spam detected!');
        //             }
        //         }
        //     }
        // }

        // Honeypot check for potential bots
        if ($request->honeypot) {
            return redirect()->back()->with('error', 'Bot detected!');
        }

        // Validate required inputs including hCaptcha response
        $validator = Validator::make($request->all(), [
            'name'               => 'required|string|max:255',
            'email'              => 'required|email',
            'phone'              => 'required|numeric',
            'country'            => 'required|string',
            'country_code'       => 'required|string',
            'message'            => 'nullable|string',
            'h-captcha-response' => 'required|string',
            'services'           => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Verify hCaptcha response
        $hcaptchaResponse = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            // 'secret'   => env('HCAPTCHA_SECRET'),
            'secret'   => "ES_5a75c86679674398a37f41ee20f847ff",
            'response' => $request->input('h-captcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$hcaptchaResponse->json('success')) {
            return redirect()->back()
                ->with('error', 'Invalid CAPTCHA. Please try again.')
                ->withInput();
        }

        // Proceed with creating the contact record
        $services = json_encode($request->input('services'));

        $contact = Contact::create([
            'name'         => $request->input('name'),
            'email'        => $request->input('email'),
            'phone'        => $request->input('phone'),
            'country'      => $request->input('country'),
            'country_code' => $request->input('country_code'),
            'message'      => $request->input('message'),
            'service'      => $services,
        ]);

        // Send email notification
        // Mail::to('thenightmarketer@gmail.com')->send(new ContactUsMail($contact));
        // Send email notification
        try {
            Mail::to('thenightmarketer@gmail.com')->send(new ContactUsMail($contact));
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Email sending failed: ' . $e->getMessage(), [
                'contact' => $contact->toArray(),
                'error' => $e->getTraceAsString(),
            ]);
        }

        return redirect()->back()
            ->with('success', 'Your message has been sent successfully! A dedicated team member will reach out to you shortly.');
    }
    public function handleContactUsJson(Request $request)
    {
        // Spam detection
        $spamWords = ['free', 'money', 'win', 'viagra', 'drug', 'lottery', 'prize', 'cash', 'credit', 'debt', 'offer', 'guarantee', 'investment', 'rich', 'no cost', 'cashback', 'discount', 'earn', 'promotion', 'congratulations', 'exclusive', 'winner', 'deal', 'work from home', 'make money', 'limited time', 'get rich', 'claim', 'urgent', 'invest now', 'winner', 'click here', 'special offer', 'risk-free', 'unsecured loan', 'no obligation', 'instant approval', 'guaranteed', 'save big', 'today only', 'limited supply', 'never before', 'final chance', 'exclusive offer', 'get started', 'no purchase necessary', 'sign up now', 'act now', 'apply now'];

        // foreach ($request->all() as $input) {
        //     if (is_array($input)) {
        //         foreach ($input as $item) {
        //             foreach ($spamWords as $word) {
        //                 if (stripos($item, $word) !== false) {
        //                     return response()->json(['error' => 'Spam detected!'], 400);
        //                 }
        //             }
        //         }
        //     } else {
        //         foreach ($spamWords as $word) {
        //             if (stripos($input, $word) !== false) {
        //                 return response()->json(['error' => 'Spam detected!'], 400);
        //             }
        //         }
        //     }
        // }

        // Honeypot check for bots
        if ($request->honeypot) {
            return response()->json(['error' => 'Bot detected!'], 400);
        }

        // Validate input, including hCaptcha response
        $validator = Validator::make($request->all(), [
            'name'               => 'required|string|max:255',
            'email'              => 'required|email',
            'phone'              => 'required|numeric',
            'country'            => 'nullable|string',
            'country_code'       => 'nullable|string',
            'message'            => 'nullable|string',
            'services'           => 'nullable|array',
            'h-captcha-response' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Verify hCaptcha
        $hcaptchaResponse = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            // 'secret'   => env('HCAPTCHA_SECRET'),
            'secret'   => "ES_5a75c86679674398a37f41ee20f847ff",
            'response' => $request->input('h-captcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$hcaptchaResponse->json('success')) {
            return response()->json(['error' => 'hCaptcha verification failed. Please try again.'], 400);
        }

        // Process services selection
        $services = json_encode($request->input('services'));

        // Store contact data in the database
        $contact = Contact::create([
            'name'         => $request->input('name'),
            'email'        => $request->input('email'),
            'phone'        => $request->input('phone'),
            'country'      => $request->input('country'),
            'country_code' => $request->input('country_code'),
            'message'      => $request->input('message'),
            'service'      => $services,
        ]);

        // Send email notification
        // Mail::to('thenightmarketer@gmail.com')->send(new ContactUsMail($contact));
        // Send email notification
        try {
            Mail::to('thenightmarketer@gmail.com')->send(new ContactUsMail($contact));
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Email sending failed: ' . $e->getMessage(), [
                'contact' => $contact->toArray(),
                'error' => $e->getTraceAsString(),
            ]);
        }

        return response()->json(['success' => 'Your message has been sent successfully! A dedicated team member will reach out to you shortly.'], 200);
    }


    public function aboutUs(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'about-us')->first();
        $tabs = ['Development', 'CRMs & ERPs', 'UI/UX', 'Branding', 'Social Media', 'Marketing'];
        $caseStudy = [];
        $caseStudiesLoaded = collect(); // Track already loaded case studies

        $teams = Team::where('status', 1)->where('is_director', 0)->get();
        $director = Team::where('status', 1)->where('is_director', 1)->first();

        foreach ($tabs as $tab) {
            $tabStudies = CaseStudy::where('status', 1)->whereHas('tags', function ($query) use ($tab) {
                $query->where('name', $tab);
            })
                ->with(['tags'])
                ->get()
                ->reject(function ($study) use ($caseStudiesLoaded) {
                    // Reject studies already added to avoid duplication
                    return $caseStudiesLoaded->contains($study->id);
                });

            // Add these studies to the loaded collection
            $caseStudiesLoaded = $caseStudiesLoaded->merge($tabStudies->pluck('id'));

            $caseStudy[$tab] = $tabStudies;
        }


        return view('client.pages.about-us', compact('pageMeta', 'caseStudy', 'teams', 'director'));
    }



    public function designservice(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'design-service')->first();
        $tabs = ['Development', 'CRMs & ERPs', 'UI/UX', 'Branding', 'Social Media', 'Marketing'];
        $caseStudy = [];
        $caseStudiesLoaded = collect(); // Track already loaded case studies

        $teams = Team::where('status', 1)->where('is_director', 0)->get();
        $director = Team::where('status', 1)->where('is_director', 1)->first();

        foreach ($tabs as $tab) {
            $tabStudies = CaseStudy::where('status', 1)->whereHas('tags', function ($query) use ($tab) {
                $query->where('name', $tab);
            })
                ->with(['tags'])
                ->get()
                ->reject(function ($study) use ($caseStudiesLoaded) {
                    // Reject studies already added to avoid duplication
                    return $caseStudiesLoaded->contains($study->id);
                });

            // Add these studies to the loaded collection
            $caseStudiesLoaded = $caseStudiesLoaded->merge($tabStudies->pluck('id'));

            $caseStudy[$tab] = $tabStudies;
        }


        return view('client.pages.design-service', compact('pageMeta', 'caseStudy', 'teams', 'director'));
    }
    public function careerTest(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'career')->first();
        $jobs = JobListing::where('status', '1')
            ->with(['department', 'type']) // Eager load relationships
            ->orderBy('sort_order')
            ->get();
        $departments = JobDepartment::where('status', 1)->get();

        return view('client.pages.career', compact('pageMeta', 'jobs', 'departments'));
    }
    public function career(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'career')->first();
        $jobs = JobListing::where('status', '1')->orderBy('sort_order')->get();
        $departments = JobDepartment::where('status', 1)->get();

        return view('client.pages.career-test', compact('pageMeta', 'jobs', 'departments'));
    }
    public function careerDetails($slug)
    {
        $job = JobListing::where('slug', $slug)->firstOrFail();
        $allJobs = JobListing::where('status', 1)->pluck('title', 'id');

        $pageMeta = [
            'meta_title'        => $job->title ?? null,
            'meta_description'  => $job->short_desc ?? null,
            'meta_keyword'      => $job->skills_req ?? null,
        ];
        // dd($allJobs);
        return view('client.pages.career-detail', compact('job', 'allJobs', 'pageMeta'));
    }
    public function careerDetailsTest()
    {
        $job = JobListing::where('slug', 'video-editor')->firstOrFail();
        $allJobs = JobListing::where('status', 1)->pluck('title', 'id');

        $pageMeta = [
            'meta_title'        => $job->title ?? null,
            'meta_description'  => $job->short_desc ?? null,
            'meta_keyword'      => $job->skills_req ?? null,
        ];

        // dd($allJobs);
        return view('client.pages.career-detail-test', compact('job', 'allJobs', 'pageMeta'));
    }

    public function cloud(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'cloud')->first();

        return view('client.pages.cloud', compact('pageMeta'));
    }
    public function videoEditing(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'video-editing')->first();

        return view('client.pages.video-editing', compact('pageMeta'));
    }
    public function service_new(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'service-new')->first();

        return view('client.pages.service-new', compact('pageMeta'));
    }
    public function termsConditions(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'terms-conditions')->first();


        return view('client.pages.terms-conditions', compact('pageMeta'));
    }


    public function clientAndPartners(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'client-and-partners')->first();

        $industries = Industry::with(['clients' => function ($query) {
            $query->where('status', '1');
        }])->where('status', '1')->get();

        $clientsByIndustry = $industries->mapWithKeys(function ($industry) {
            return [$industry->industry_name => $industry->clients];
        });

        return view('client.pages.client-and-partners', compact('pageMeta', 'clientsByIndustry'));
    }

    public function blogs(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'blogs')->first();

        $query = Blog::where('status', 1)->where('is_approved', 1);

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('blog_category_id', $request->category);
        }

        if ($request->filled('tag') && $request->tag !== 'all') {
            $query->whereJsonContains('tags', $request->tag);
        }

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('desc', 'like', "%{$keyword}%");
            });
        }

        $blogs = $query->orderBy('date', 'DESC')->paginate(9);

        // Decode JSON tags for each blog
        foreach ($blogs as $blog) {
            $blog->tags = json_decode($blog->tags, true) ?? [];
        }

        // ✅ Get unique categories and tags from DB
        $categoryIds = Blog::where('status', 1)->where('is_approved', 1)->pluck('blog_category_id')->unique()->filter();

        $categories = BlogCategory::whereIn('id', $categoryIds)->orderBy('name')->get();

        $tagsCollection = Blog::where('status', 1)->where('is_approved', 1)->pluck('tags')->filter();
        $tags = collect();
        foreach ($tagsCollection as $tagJson) {
            $decoded = json_decode($tagJson, true);
            if (is_array($decoded)) {
                $tags = $tags->merge($decoded);
            }
        }
        $tags = $tags->unique()->sort()->values();

        if ($request->ajax()) {
            return view('client.utils.blog-posts', compact('blogs'))->render();
        }

        return view('client.pages.blogs', compact('pageMeta', 'blogs', 'categories', 'tags'));
    }
    public function blogsTest(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'blogs')->first();

        $query = Blog::where('status', 1)->where('is_approved', 1);

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('blog_category_id', $request->category);
        }

        if ($request->filled('tag') && $request->tag !== 'all') {
            $query->whereJsonContains('tags', $request->tag);
        }

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('desc', 'like', "%{$keyword}%");
            });
        }

        $blogs = $query->orderBy('date', 'DESC')->paginate(9);

        // Decode JSON tags for each blog
        foreach ($blogs as $blog) {
            $blog->tags = json_decode($blog->tags, true) ?? [];
        }

        // ✅ Get unique categories and tags from DB
        $categoryIds = Blog::where('status', 1)->where('is_approved', 1)->pluck('blog_category_id')->unique()->filter();

        $categories = BlogCategory::whereIn('id', $categoryIds)->orderBy('name')->get();

        $tagsCollection = Blog::where('status', 1)->where('is_approved', 1)->pluck('tags')->filter();
        $tags = collect();
        foreach ($tagsCollection as $tagJson) {
            $decoded = json_decode($tagJson, true);
            if (is_array($decoded)) {
                $tags = $tags->merge($decoded);
            }
        }
        $tags = $tags->unique()->sort()->values();

        if ($request->ajax()) {
            return view('client.utils.blog-posts', compact('blogs'))->render();
        }

        return view('client.pages.blogs-test', compact('pageMeta', 'blogs', 'categories', 'tags'));
    }



    // --------------------------------------Test--------------------------- 
    public function blogdetailspagestest(Request $request)
    {
        $pageMeta = PageMeta::where('slug', 'blogs')->first();

        $query = Blog::where('status', 1)->where('is_approved', 1);

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('blog_category_id', $request->category);
        }

        if ($request->filled('tag') && $request->tag !== 'all') {
            $query->whereJsonContains('tags', $request->tag);
        }

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('desc', 'like', "%{$keyword}%");
            });
        }

        $blogs = $query->orderBy('date', 'DESC')->paginate(9);

        // Decode JSON tags for each blog
        foreach ($blogs as $blog) {
            $blog->tags = json_decode($blog->tags, true) ?? [];
        }

        // ✅ Get unique categories and tags from DB
        $categoryIds = Blog::where('status', 1)->where('is_approved', 1)->pluck('blog_category_id')->unique()->filter();

        $categories = BlogCategory::whereIn('id', $categoryIds)->orderBy('name')->get();

        $tagsCollection = Blog::where('status', 1)->where('is_approved', 1)->pluck('tags')->filter();
        $tags = collect();
        foreach ($tagsCollection as $tagJson) {
            $decoded = json_decode($tagJson, true);
            if (is_array($decoded)) {
                $tags = $tags->merge($decoded);
            }
        }
        $tags = $tags->unique()->sort()->values();

        if ($request->ajax()) {
            return view('client.utils.blog-posts', compact('blogs'))->render();
        }

        return view('client.pages.blog-details-pages-test', compact('pageMeta', 'blogs', 'categories', 'tags'));
    }
    public function blogDetails(Request $request, $slug)
    {
        $blog   =   Blog::with(['category', 'author'])->where('slug', $slug)->first();

        // Top categories based on blog_category_id
        $topCategories = \DB::table('blogs')
            ->select('blog_categories.id', 'blog_categories.name', \DB::raw('COUNT(blogs.id) as blog_count'))
            ->join('blog_categories', 'blog_categories.id', '=', 'blogs.blog_category_id')
            ->where('blogs.status', 1)
            ->where('blogs.is_approved', 1)
            ->groupBy('blog_categories.id', 'blog_categories.name')
            ->orderBy('blog_count', 'DESC')
            ->take(5)
            ->get();

        $latestBlogs = Blog::with('category')
            ->where('status', 1)
            ->where('id', '!=', $blog->id)
            ->where('is_approved', 1)
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();

        $pageMeta = [
            'meta_title'        => $blog->metaTitle ?? null,
            'meta_description'  => $blog->metaDesc ?? null,
            'meta_keyword'      => $blog->metaKeyword ?? null,
        ];


        return view('client.pages.blog-details', compact('blog', 'latestBlogs', 'pageMeta', 'topCategories'));
    }
    public function blogDetailsTest(Request $request, $slug)
    {
        $blog   =   Blog::with(['category', 'author'])->where('slug', $slug)->first();

        // Top categories based on blog_category_id
        $topCategories = \DB::table('blogs')
            ->select('blog_categories.id', 'blog_categories.name', \DB::raw('COUNT(blogs.id) as blog_count'))
            ->join('blog_categories', 'blog_categories.id', '=', 'blogs.blog_category_id')
            ->where('blogs.status', 1)
            ->where('blogs.is_approved', 1)
            ->groupBy('blog_categories.id', 'blog_categories.name')
            ->orderBy('blog_count', 'DESC')
            ->take(5)
            ->get();

        $latestBlogs = Blog::with('category')
            ->where('status', 1)
            ->where('id', '!=', $blog->id)
            ->where('is_approved', 1)
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();

        $pageMeta = [
            'meta_title'        => $blog->metaTitle ?? null,
            'meta_description'  => $blog->metaDesc ?? null,
            'meta_keyword'      => $blog->metaKeyword ?? null,
        ];


        return view('client.pages.blog-details-test', compact('blog', 'latestBlogs', 'pageMeta', 'topCategories'));
    }
    public function submitEbookContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'website_url' => 'required|url',
            'h-captcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Verify hCaptcha
        $hcaptchaResponse = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            // 'secret' => env('HCAPTCHA_SECRET'),
            'secret' => "ES_5a75c86679674398a37f41ee20f847ff",
            'response' => $request->input('h-captcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$hcaptchaResponse->json('success')) {
            return response()->json(['error' => 'hCaptcha verification failed.'], 400);
        }

        // Store form data in the database
        EbookContact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'website_url' => $request->website_url,
        ]);

        // Send email notification
        $adminEmail = 'thenightmarketer@gmail.com';
        Mail::to($adminEmail)->send(new EbookContactMail($request->all()));

        return response()->json([
            'success' => true,
            'message' => 'We’ve received your information! A detailed audit report will be shared within 48 hours.',
        ]);
    }
    public function submitCareer(Request $request)
    {

        if ($request->honeypot) {
            return response()->json(['error' => 'Bot detected!'], 400);
        }

        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email',
            'phone'                 => 'required|numeric',
            'role'                  => 'required|string|max:255',
            'resume'                => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover'                 => 'nullable|string',
            'linkedin'              => 'nullable|string',
            'state'                 => 'required|string|max:255',
            'experience'            => 'required|string|max:50',
            'h-captcha-response'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Verify hCaptcha
        $hcaptchaResponse = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            // 'secret'   => env('HCAPTCHA_SECRET'),
            'secret'   => "ES_5a75c86679674398a37f41ee20f847ff",
            'response' => $request->input('h-captcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$hcaptchaResponse->json('success')) {
            return response()->json(['error' => 'hCaptcha verification failed.'], 400);
        }

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        } else {
            return response()->json(['error' => 'Resume upload failed.'], 400);
        }

        $career = Career::create([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'phone'         => $request->input('phone'),
            'role'          => $request->input('role'),
            'state'         => $request->input('state'),
            'experience'    => $request->input('experience'),
            'linkedin'      => $request->input('linkedin') ?? null,
            'resume_path'   => $resumePath,
            'cover'         => $request->input('cover'),
        ]);

        // Send email to admin
        Mail::to('jobs@thenightmarketer.com')->send(new CareerApplicationMail($career));

        // Send assignment email based on role
        if ($career['role'] == "Graphic Designer") {
            Mail::to($career['email'])->send(new GraphicDesignAssignmentMail($career['name'], $career['email']));
            return response()->json([
                'success' => 'Thank you for showing interest in the Graphic Designer role. A design task has been sent to your email — please take a moment to check it.'
            ], 200);
        }
        if ($career['role'] == "Senior Frontend Developer") {
            Mail::to($career['email'])->send(new FrontendAssignmentMail($career['name'], $career['email']));
        }

        return response()->json([
            'success' => 'Your application has been submitted successfully!'
        ], 200);
    }



    // Private function to validate Google reCAPTCHA
    private function checkRecaptcha($recaptchaResponse)
    {
        $recaptchaSecret = env('GOOGLE_RECAPTCHA_SECRET');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
        $responseKeys = json_decode($response, true);

        return $responseKeys['success'] ?? false;
    }
    public function servicesTest(Request $request, $slug)
    {
        $pageMeta = PageMeta::where('slug', $slug)->first();
        $service = Service::with(['sections.items', 'faqs'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('client.service-multiple.custom', compact('pageMeta', 'service'));
    }
}
