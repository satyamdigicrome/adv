<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController    as AdminServiceController;
use App\Http\Controllers\Admin\AttestationController as AdminAttestationController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\AttestationController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Admin\ContactController  as AdminContactController;
use App\Http\Controllers\Admin\PageController     as AdminPageController;
use App\Http\Controllers\Admin\BlogController     as AdminBlogController;
use App\Http\Controllers\Admin\ReviewController   as AdminReviewController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes - S K Document Centre
|--------------------------------------------------------------------------
*/

// ==========================================
// FRONTEND ROUTES
// ==========================================


// Migrate ROute
Route::get('migrate',function(){
    Artisan::call('migrate');
    Artisan::call('db:seed');
    return "Migrated and Seeded!";
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache Cleared!";
});
// Home
Route::get('/', function () {
    $latestServices     = \App\Models\Service::active()->ordered()->limit(3)->get();
    $latestAttestations = \App\Models\Attestation::active()->ordered()->limit(3)->get();
    $latestBlogs        = \App\Models\Blog::active()->published()->latest('published_at')->limit(3)->get();
    $latestReviews      = \App\Models\Review::active()->ordered()->limit(3)->get();
    return view('welcome', compact('latestServices', 'latestAttestations', 'latestBlogs', 'latestReviews'));
})->name('home');

// About Us
Route::get('/about', function () { return view('about'); })->name('about');

// Services (Dynamic)
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::post('/services/{slug}/enquire', [ServiceController::class, 'enquire'])->name('services.enquire');

// Attestations (Dynamic)
Route::get('/attestation-services', [AttestationController::class, 'index'])->name('attestations');
Route::get('/attestation-services/{slug}', [AttestationController::class, 'show'])->name('attestations.show');
Route::post('/attestation-services/{slug}/enquire', [AttestationController::class, 'enquire'])->name('attestations.enquire');

// Blog (Dynamic)
Route::get('/blog',        [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

// Static pages
Route::get('/attestation-process', function () { return view('attestation-process'); })->name('attestation.process');

// Dynamic content pages (About, Privacy Policy, Terms etc)
Route::get('/about', function () {
    $page = \App\Models\Page::active()->where('slug', 'about-us')->first();
    return view('page', compact('page'));
})->name('about');
Route::get('/privacy-policy', function () {
    $page = \App\Models\Page::active()->where('slug', 'privacy-policy')->first();
    return view('page', compact('page'));
})->name('privacy.policy');
Route::get('/terms-conditions', function () {
    $page = \App\Models\Page::active()->where('slug', 'terms-conditions')->first();
    return view('page', compact('page'));
})->name('terms.conditions');
Route::get('/pages/{slug}', function ($slug) {
    $page = \App\Models\Page::active()->where('slug', $slug)->firstOrFail();
    return view('page', compact('page'));
})->name('page.show');


// ==========================================
// ADMIN ROUTES
// ==========================================

// Auth (no middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Protected Admin Routes
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {

    // Dashboard
    Route::get('/',          [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Services CRUD
    Route::get('/services',                   [AdminServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create',            [AdminServiceController::class, 'create'])->name('services.create');
    Route::post('/services',                  [AdminServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit',    [AdminServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}',         [AdminServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}',      [AdminServiceController::class, 'destroy'])->name('services.destroy');
    Route::patch('/services/{service}/toggle',[AdminServiceController::class, 'toggleStatus'])->name('services.toggle');

    // Attestations CRUD
    Route::get('/attestations',                        [AdminAttestationController::class, 'index'])->name('attestations.index');
    Route::get('/attestations/create',                 [AdminAttestationController::class, 'create'])->name('attestations.create');
    Route::post('/attestations',                       [AdminAttestationController::class, 'store'])->name('attestations.store');
    Route::get('/attestations/{attestation}/edit',     [AdminAttestationController::class, 'edit'])->name('attestations.edit');
    Route::put('/attestations/{attestation}',          [AdminAttestationController::class, 'update'])->name('attestations.update');
    Route::delete('/attestations/{attestation}',       [AdminAttestationController::class, 'destroy'])->name('attestations.destroy');
    Route::patch('/attestations/{attestation}/toggle', [AdminAttestationController::class, 'toggleStatus'])->name('attestations.toggle');

    // FAQs CRUD
    Route::get('/faqs',              [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/create',       [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs',             [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{faq}/edit',   [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{faq}',        [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}',     [FaqController::class, 'destroy'])->name('faqs.destroy');

    // Enquiries
    Route::get('/enquiries',                        [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries/{enquiry}',              [EnquiryController::class, 'show'])->name('enquiries.show');
    Route::patch('/enquiries/{enquiry}/status',     [EnquiryController::class, 'updateStatus'])->name('enquiries.status');
    Route::delete('/enquiries/{enquiry}',           [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

    // Contacts (Contact Form Submissions)
    Route::get('/contacts',                     [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}',           [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('/contacts/{contact}/status',  [AdminContactController::class, 'updateStatus'])->name('contacts.status');
    Route::delete('/contacts/{contact}',        [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Pages (Content Pages)
    Route::get('/pages',                [AdminPageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create',         [AdminPageController::class, 'create'])->name('pages.create');
    Route::post('/pages',               [AdminPageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{page}/edit',    [AdminPageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{page}',         [AdminPageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}',      [AdminPageController::class, 'destroy'])->name('pages.destroy');

    // Blog CRUD
    Route::get('/blogs',                    [AdminBlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create',             [AdminBlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs',                   [AdminBlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit',        [AdminBlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}',             [AdminBlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}',          [AdminBlogController::class, 'destroy'])->name('blogs.destroy');
    Route::patch('/blogs/{blog}/toggle',    [AdminBlogController::class, 'toggleStatus'])->name('blogs.toggle');

    // Reviews (Google Reviews)
    Route::get('/reviews',                  [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/create',           [AdminReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews',                 [AdminReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit',    [AdminReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}',         [AdminReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}',      [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::patch('/reviews/{review}/toggle',[AdminReviewController::class, 'toggleStatus'])->name('reviews.toggle');
});
