<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeepseekController;
use App\Http\Controllers\DeepseekImagesNotSupportedController;
use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\DueController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\JobDepartmentController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\PageMetaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DeepseekJanusController;
use App\Http\Controllers\SecurePdfController;
use App\Http\Controllers\CompanyProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//  Route::get('/', 'Admin\BlogController@index');

// if (env('APP_ENV') === 'production') {
//     URL::forceSchema('https');
// }
Route::fallback(function () {
    return redirect('https://thenightmarketer.com/');
});
Route::get('/deepseek', function () {
    return view('deepseek');
});
Route::post('/demo-requests', [DemoRequestController::class, 'store'])->name('demo-requests.store');
// Example: In your routes/web.php

Route::post('login', 'CustomLoginController@index')->name('admin-login');

Route::post('admin/logout', 'CustomLoginController@logout')->name('admin.logout');

Route::get('admin/login', 'CustomLoginController@index')->name('login');

Route::post('/ai/chat', [DeepSeekController::class, 'chat'])->name('ai.chat');

// Optional: keep your workflow stable; returns 501 so you can bypass image step.
Route::post('/ai/image', [DeepseekImagesNotSupportedController::class, 'generate'])
    ->name('ai.image');
Route::post('/ai/image', [DeepseekJanusController::class, 'generate'])->name('ai.image');


// Public viewer page (no auth)
Route::get('/secure-pdf/view/{id}', [SecurePdfController::class, 'viewerPage'])
    ->name('secure.pdf.viewer');

Route::get('/secure-pdf/stream/{id}', [SecurePdfController::class, 'stream'])
    ->name('secure.pdf.stream');

Route::get('/secure-pdf/signed/{id}', [SecurePdfController::class, 'signedLink'])
    ->name('secure.pdf.signed');


Route::post('/company-profile/store', [CompanyProfileController::class, 'store'])->name('company.profile.store');



Route::group(['prefix' => 'admin', 'middleware' => ['authadmin']], function () {

    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('careers/{career}/status', [CareerController::class, 'updateStatus'])->name('careers.status');

    Route::post('/admin/career/send-task/{id}', [CareerController::class, 'sendTask'])->name('career.sendTask');

    Route::resource('team', TeamController::class);
    Route::post('team/{id}/toggle-status', [TeamController::class, 'toggleStatus'])->name('team.toggleStatus');

    Route::get('/careers/filtered', [CareerController::class, 'filteredCareers'])->name('career-filtered');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories/status/{id}', [CategoryController::class, 'updateStatus'])->name('categories.update-status');

    Route::resource('industries', IndustryController::class)->names('industries');
    // Admin routes for clients
    Route::resource('clients', ClientController::class)->names('clients');

    // Case Study Routes with Permissions
    Route::get('/case-studies', [CaseStudyController::class, 'index'])->name('admin.case-study.index')->middleware('permission:Case Studies,view');
    Route::get('/case-study/create', [CaseStudyController::class, 'create'])->name('admin.case-study.create')->middleware('permission:Case Studies,add');
    Route::post('/case-study/store', [CaseStudyController::class, 'store'])->name('admin.case-study.store')->middleware('permission:Case Studies,add');
    Route::get('/case-studies/{id}/edit', [CaseStudyController::class, 'edit'])->name('admin.case-study.edit')->middleware('permission:Case Studies,edit');
    Route::put('/case-study/{id}', [CaseStudyController::class, 'update'])->name('admin.case-study.update')->middleware('permission:Case Studies,edit');

    // Route::get('/login',function(){
    //     return view("admin.pages.login");
    // })->name('admin-login');
    Route::post('/update-blog-status/{id?}', 'BlogController@updateBlogStatus');
    Route::post('/update-user-status/{id?}', 'AdminController@updateUserStatus');

    // Blog Routes with Permissions
    Route::match(['get'], '/blog', 'BlogController@index')->name('blog-list')->middleware('permission:Blogs,view');
    Route::match(['get'], '/pending-blog', 'BlogController@pendingBlogs')->name('pending-blogs')->middleware('permission:Blogs,view');
    Route::match(['get', 'post'], '/blog-create', 'BlogController@create')->name('blog-create')->middleware('permission:Blogs,add');
    Route::match(['get', 'post'], '/blog-store', 'BlogController@store')->name('blog-store')->middleware('permission:Blogs,add');
    Route::match(['get', 'post'], '/blog-edit/{id?}', 'BlogController@edit')->name('blog-edit')->middleware('permission:Blogs,edit');
    Route::put('/blog-update/{id?}', [BlogController::class, 'update'])->name('blog-update')->middleware('permission:Blogs,edit');
    Route::delete('/blog-destroy/{id}', [BlogController::class, 'destroy'])->name('blog-destroy')->middleware('permission:Blogs,delete');
    Route::delete('/deleteFeaturedImage', [BlogController::class, 'deleteImage'])->name('deleteFeaturedImage')->middleware('permission:Blogs,edit');
    Route::post('update-blog-approval/{id}', [BlogController::class, 'updateBlogApproval'])->name('update-blog-approval')->middleware('permission:Blogs,edit');




    // Blog Category Routes with Permissions
    Route::match(['get', 'post'], '/blog-category', 'BlogCategoryController@index')->name('blog-category-list')->middleware('permission:Blog Categories,view');
    Route::match(['get', 'post'], '/blog-category-create', 'BlogCategoryController@create')->name('blog-category-create')->middleware('permission:Blog Categories,add');
    Route::match(['get', 'post'], '/blog-category-store', 'BlogCategoryController@store')->name('blog-category-store')->middleware('permission:Blog Categories,add');
    Route::match(['get', 'post'], '/blog-category-edit/{id?}', 'BlogCategoryController@edit')->name('blog-category-edit')->middleware('permission:Blog Categories,edit');
    Route::match(['get', 'post'], '/blog-category-update/{id?}', 'BlogCategoryController@update')->name('blog-category-update')->middleware('permission:Blog Categories,edit');
    Route::delete('/blog-category-destroy/{id}', [BlogCategoryController::class, 'destroy'])->name('blog-category-destroy')->middleware('permission:Blog Categories,delete');


    // Services Routes with Permissions
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index')->middleware('permission:Services,view');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create')->middleware('permission:Services,add');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store')->middleware('permission:Services,add');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit')->middleware('permission:Services,edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update')->middleware('permission:Services,edit');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy')->middleware('permission:Services,delete');



    Route::match(['get', 'post'], '/due-create', 'DueController@create')->name('due-create');
    Route::match(['get'], '/due-date', 'DueController@index')->name('due-list');
    Route::put('/due-update/{id?}', [DueController::class, 'update'])->name('due-update');
    Route::match(['get', 'post'], '/due-store', 'DueController@store')->name('due-store');
    Route::match(['get', 'post'], '/due-edit/{id?}', 'DueController@edit')->name('due-edit');
    Route::delete('/due-destroy/{id}', [DueController::class, 'destroy'])->name('due-destroy');

    Route::match(['get', 'post'], '/userservices', 'UserservicesController@index')->name('userservices');



    Route::match(['get', 'post'], '/payments', 'PaymentAdviceController@index')->name('payments');
    Route::match(['get', 'post'], '/testimonials', 'TestimonialsController@index')->name('testimonials-list');


    Route::match(['get', 'post'], '/contact-create', 'ContactController@create')->name('contact-create');
    Route::match(['get', 'post'], '/contact', 'ContactController@index')->name('contact-list');
    Route::match(['get', 'post'], '/career', 'CareerController@index')->name('career-list');
    Route::match(['get', 'post'], '/contact-update/{$id}', 'ContactController@update')->name('contact-update');
    Route::match(['get', 'post'], '/contact-store', 'ContactController@store')->name('contact-store');

    // Admin Users Routes (Super Admin Only)
    Route::match(['get', 'post'], '/user', 'AdminController@index')->name('user-list')->middleware('superadmin');
    Route::match(['get', 'post'], '/user-create', 'AdminController@create')->name('user-create')->middleware('superadmin');
    Route::match(['get', 'post'], '/user-store', 'AdminController@store')->name('user-store')->middleware('superadmin');
    Route::match(['get', 'post'], '/user-edit/{id?}', 'AdminController@edit')->name('user-edit')->middleware('superadmin');
    Route::put('/user-update/{id?}', [AdminController::class, 'update'])->name('user-update')->middleware('superadmin');
    Route::post('/user-reset-password/{id}', [AdminController::class, 'resetPassword'])->name('user-reset-password')->middleware('superadmin');


    // Display a listing of PageMeta records
    Route::get('/pagemeta', [PageMetaController::class, 'index'])->name('pagemeta.index');
    Route::get('/pagemeta/create', [PageMetaController::class, 'create'])->name('pagemeta.create');
    Route::post('/pagemeta', [PageMetaController::class, 'store'])->name('pagemeta.store');
    Route::get('/pagemeta/{id}/edit', [PageMetaController::class, 'edit'])->name('pagemeta.edit');
    Route::put('/pagemeta/{id}', [PageMetaController::class, 'update'])->name('pagemeta.update');
    Route::delete('/pagemeta/{id}', [PageMetaController::class, 'destroy'])->name('pagemeta.destroy');

    Route::post('/update-client-is-home/{client}', [ClientController::class, 'updateIsHome'])->name('clients.updateIsHome');
    Route::post('/update-client-status/{client}', [ClientController::class, 'updateStatus'])->name('clients.updateStatus');


    // Route::resource('/due', DueController::class);
    // Route::resource('/service', ServiceController::class);
    // Route::resource('/contact', ContactController::class);
    // Route::resource('/admin_test', AdminController::class);
    // Route::resource('/blog_category', BlogCategoryController::class);

    Route::prefix('job-listings')->group(function () {
        Route::get('/', [JobListingController::class, 'index'])->name('job.listings.index');
        Route::get('/create', [JobListingController::class, 'create'])->name('job.listings.create');
        Route::post('/store', [JobListingController::class, 'store'])->name('job.listings.store');
        Route::get('/edit/{id}', [JobListingController::class, 'edit'])->name('job.listings.edit');
        Route::post('/update/{id}', [JobListingController::class, 'update'])->name('job.listings.update');
        Route::post('/update-status/{id}', [JobListingController::class, 'updateStatus'])->name('job.listings.updateStatus');
    });
    // Departments
    Route::prefix('departments')->group(function () {
        Route::get('/', [JobDepartmentController::class, 'index'])->name('departments.index');
        Route::get('create', [JobDepartmentController::class, 'create'])->name('departments.create');
        Route::post('store', [JobDepartmentController::class, 'store'])->name('departments.store');
        Route::get('edit/{id}', [JobDepartmentController::class, 'edit'])->name('departments.edit');
        Route::post('update/{id}', [JobDepartmentController::class, 'update'])->name('departments.update');
    });

    // Types
    Route::prefix('types')->group(function () {
        Route::get('/', [JobTypeController::class, 'index'])->name('types.index');
        Route::get('create', [JobTypeController::class, 'create'])->name('types.create');
        Route::post('store', [JobTypeController::class, 'store'])->name('types.store');
        Route::get('edit/{id}', [JobTypeController::class, 'edit'])->name('types.edit');
        Route::post('update/{id}', [JobTypeController::class, 'update'])->name('types.update');
    });

    // ==================== CRM ROUTES ====================

    // Projects Resource Routes
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->names('admin.projects');
    Route::post('projects/update-priority', [\App\Http\Controllers\Admin\ProjectController::class, 'updatePriority'])->name('admin.projects.updatePriority');
    Route::post('projects/update-status', [\App\Http\Controllers\Admin\ProjectController::class, 'updateStatus'])->name('admin.projects.updateStatus');

    // Notes Resource Routes
    Route::resource('notes', \App\Http\Controllers\Admin\NoteController::class)->names('admin.notes');
    Route::post('notes/update-status', [\App\Http\Controllers\Admin\NoteController::class, 'updateStatus'])->name('admin.notes.updateStatus');

    // Clients Resource Routes (CRM)
    Route::prefix('crm')->group(function() {
        Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class)->names('admin.clients');
        Route::post('clients/update-status', [\App\Http\Controllers\Admin\ClientController::class, 'updateStatus'])->name('admin.clients.updateStatus');
    });

    // Reminders Resource Routes
    Route::resource('reminders', \App\Http\Controllers\Admin\ReminderController::class)->names('admin.reminders');
    Route::post('reminders/update-status', [\App\Http\Controllers\Admin\ReminderController::class, 'updateStatus'])->name('admin.reminders.updateStatus');

    // Portfolio Resource Routes
    Route::resource('portfolios', \App\Http\Controllers\Admin\PortfolioController::class)->names('admin.portfolios');
    Route::post('portfolios/update-status', [\App\Http\Controllers\Admin\PortfolioController::class, 'updateStatus'])->name('admin.portfolios.updateStatus');

    // Meetings Resource Routes
    Route::resource('meetings', \App\Http\Controllers\Admin\MeetingController::class)->names('admin.meetings');
    Route::post('meetings/update-status', [\App\Http\Controllers\Admin\MeetingController::class, 'updateStatus'])->name('admin.meetings.updateStatus');

    // SEO Resource Routes
    Route::resource('seo', \App\Http\Controllers\Admin\SeoController::class)->names('admin.seo');
    Route::post('seo/update-status', [\App\Http\Controllers\Admin\SeoController::class, 'updateStatus'])->name('admin.seo.updateStatus');

    // SMM Resource Routes
    Route::resource('smm', \App\Http\Controllers\Admin\SmmController::class)->names('admin.smm');
    Route::post('smm/update-status', [\App\Http\Controllers\Admin\SmmController::class, 'updateStatus'])->name('admin.smm.updateStatus');

    // Assets Resource Routes
    Route::resource('assets', \App\Http\Controllers\Admin\AssetController::class)->names('admin.assets');
    Route::post('assets/update-status', [\App\Http\Controllers\Admin\AssetController::class, 'updateStatus'])->name('admin.assets.updateStatus');
    Route::get('assets/{id}/documents', [\App\Http\Controllers\Admin\AssetController::class, 'viewDocuments'])->name('admin.assets.documents');

    // Legacy CRM Routes
    Route::get('/old-projects', [\App\Http\Controllers\Admin\AdminController::class, 'project_list'])->name('admin.old.projects.index');
    Route::get('/old-projects/add', [\App\Http\Controllers\Admin\AdminController::class, 'add_project'])->name('admin.old.projects.add');

    // CRM Users
    Route::get('/users', [\App\Http\Controllers\Admin\AdminController::class, 'user_list'])->name('admin.users.index');
    Route::get('/users/add', [\App\Http\Controllers\Admin\AdminController::class, 'add_user'])->name('admin.users.add');
    Route::post('/users/create', [\App\Http\Controllers\Admin\AdminController::class, 'role_form_create'])->name('admin.users.create');

    // Role Management (Super Admin Only)
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class)->names('admin.roles')->middleware('superadmin');
    Route::post('roles/{id}/toggle-status', [\App\Http\Controllers\Admin\RoleController::class, 'toggleStatus'])->name('admin.roles.toggleStatus')->middleware('superadmin');

    // CRM Roles (Legacy)
    Route::get('/old-roles', [\App\Http\Controllers\Admin\AdminController::class, 'role_list'])->name('admin.old.roles.index');
    Route::get('/old-roles/add', [\App\Http\Controllers\Admin\AdminController::class, 'add_role'])->name('admin.old.roles.add');

    // CRM Apps
    Route::get('/apps', [\App\Http\Controllers\Admin\AdminController::class, 'all_app_list'])->name('admin.apps.index');
    Route::get('/apps/add', [\App\Http\Controllers\Admin\AdminController::class, 'add_app'])->name('admin.apps.add');

    // CRM Requirements
    Route::get('/requirements', [\App\Http\Controllers\Admin\AdminController::class, 'requirements_list'])->name('admin.requirements.index');
    Route::get('/requirements/add', [\App\Http\Controllers\Admin\AdminController::class, 'add_requirements'])->name('admin.requirements.add');

    // Common Actions
    Route::post('/update-status', [\App\Http\Controllers\Admin\AdminController::class, 'update_status'])->name('admin.update_status');
    Route::post('/delete-data', [\App\Http\Controllers\Admin\AdminController::class, 'delete_data'])->name('admin.delete_data');
});
// Route::get('/admin', function () {
//     return redirect()->route("admin-login");
// });


// Route::fallback(function(){
//     return "<h1>Page Not Found</h1>";contact
// });

Route::match(['get'], 'services', 'UserController@services')->name('service');


Route::post('/submit-ebook-contact', 'UserController@submitEbookContact')->name('ebook.contact.submit');
Route::post('/submit-career', 'UserController@submitCareer')->name('submit.career');
Route::post('/blogs/{id}/increment-share', 'BlogController@incrementShareCount')->name('blogs.incrementShare');

Route::match(['get'], '/', 'UserController@index')->name('home');
Route::match(['get'], 'index-test', 'UserController@index1')->name('home-1');
Route::match(['get'], 'case-study', 'UserController@caseStudy')->name('case-study');
Route::match(['get'], 'case-study/french-factor', 'UserController@frenchfactor')->name('french-factor');
Route::match(['get'], 'case-study/ozar-luxury', 'UserController@ozarLuxury')->name('ozar-luxury');
Route::match(['get'], 'case-study/fuel-your-body', 'UserController@fuelYourBody')->name('fuel-your-body');
Route::match(['get'], 'case-study/green-leaf', 'UserController@greenLeaf')->name('green-leaf');
Route::match(['get'], 'case-study/sorbet', 'UserController@sorbet')->name('sorbet');
Route::match(['get'], 'case-study/rajdhani', 'UserController@rajdhani')->name('rajdhani');
Route::match(['get'], 'case-study/lead-management', 'UserController@leadManagement')->name('lead-management');
Route::match(['get'], 'contact-us', 'UserController@contactUs')->name('contact-us');
Route::match(['post'], 'contact-us', 'UserController@handleContactUs')->name('contact.us.submit');
Route::match(['post'], 'contact-us-json', 'UserController@handleContactUsJson')->name('contact-us-json');
Route::match(['get'], 'career', 'UserController@career')->name('career');
Route::match(['get'], 'career-test', 'UserController@careerTest')->name('career.test');
Route::match(['get'], 'careers/{slug}', 'UserController@careerDetails')->name('career.details');
Route::match(['get'], 'career-detail-test', 'UserController@careerDetailsTest')->name('career.details.test');
Route::match(['get'], 'service/cloud', 'UserController@cloud')->name('cloud');
Route::match(['get'], 'service/video-editing', 'UserController@videoEditing')->name('video-editing');
Route::match(['get'], 'service-new', 'UserController@service_new')->name('service-new');
Route::match(['get'], 'about-us', 'UserController@aboutUs')->name('about-us');
Route::match(['get'], 'design-service', 'UserController@designservice')->name('design-service');
Route::match(['get'], 'terms-conditions', 'UserController@termsConditions')->name('terms-conditions');
Route::match(['get'], 'case-study/{slug}', 'UserController@caseStudyDetails')->name('case-study-details');

Route::match(['get'], 'client-and-partners', 'UserController@clientAndPartners')->name('clients.partners');
Route::match(['get'], 'blogs', 'UserController@blogs')->name('blogs');
// Route::match(['get'], 'blogsTest', 'UserController@blogsTest')->name('blogsTest');
Route::match(['get'], 'leadnests', 'UserController@leadNets')->name('leadNets');
Route::match(['get'], 'blog-details-pages-test', 'UserController@blogdetailspagestest')->name('blog-details-pages-test');
Route::match(['get'], 'blog/{slug}', 'UserController@blogDetails')->name('blogDetails');
// Route::match(['get'], 'blog-test/{slug}', 'UserController@blogDetailsTest')->name('blogDetailsTest');

Route::match(['get'], 'services/{slug}', 'UserController@servicesTest')->name('service.custom');

Route::get('service/{slug}', 'UserController@serviceDetails')
    ->where('slug', '[a-zA-Z0-9\-]+')
    ->name('service.details');
Route::get('https://test.thenightmarketer.com/blog/loop-subscription-vs-recharge-subscription', function () {
    return redirect('https://thenightmarketer.com/blog/loop-subscription-vs-recharge-subscription', 301);
});


//redirects
Route::get('https://test.thenightmarketer.com/blog/loop-subscription-vs-recharge-subscription', function () {
    return redirect('https://thenightmarketer.com/blog/loop-subscription-vs-recharge-subscription', 301);
});

Route::redirect('/google-ads-services', '/service/google-ads-services', 301);
Route::redirect('/search-engine-optimization', '/service/search-engine-optimization', 301);
Route::redirect('/performance-marketing', '/service/performance-marketing', 301);
Route::redirect('/email-marketing', '/service/email-marketing', 301);
Route::redirect('/ai-agent', '/service/ai-agent', 301);
Route::redirect('/email-automation', '/service/email-automation', 301);
Route::redirect('/social-media-marketing', '/service/social-media-marketing', 301);
Route::redirect('/cloud', '/service/cloud', 301);
Route::redirect('/ui-design-services', '/service/ui-design-services', 301);
Route::redirect('/ux-design-services', '/service/ux-design-services', 301);
Route::redirect('/graphic-design-services', '/service/graphic-design-services', 301);
Route::redirect('/branding-services', '/service/branding-services', 301);
Route::redirect('/conversion-rate-optimization', '/service/conversion-rate-optimization', 301);
Route::redirect('/video-editing', '/service/video-editing', 301);
Route::redirect('/shopify-development-company', '/service/shopify-development-company', 301);
Route::redirect('/wordpress-development', '/service/wordpress-development', 301);
Route::redirect('/custom-frontend-and-backend', '/service/custom-frontend-and-backend', 301);
Route::redirect('/erp-crm', '/service/erp-crm', 301);
Route::redirect('/mobile-app-development', '/service/mobile-app-development', 301);
