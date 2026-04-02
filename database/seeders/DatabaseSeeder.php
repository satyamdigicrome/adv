<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@skdocumentcentre.in'],
            [
                'name' => 'SK Admin',
                'email' => 'admin@skdocumentcentre.in',
                'password' => bcrypt('Admin@123'),
            ]
        );

        // Call the comprehensive seeder
        $this->call(ServiceAttestationsSeeder::class);

        // Sample Content Pages
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'subtitle' => 'Leading document attestation services since 2009',
                'meta_title' => 'About S K Document Centre | Trusted Attestation Agency India',
                'meta_description' => 'Learn about S K Document Centre — India\'s trusted attestation agency with 15+ years of experience in document attestation, apostille and legalization services.',
                'content' => '<h2>About S K Document Centre</h2>
<p>S K Document Centre is a leading provider of specialised document services, dedicated to ensuring that your legal and administrative needs are met with precision and efficiency. Founded by <strong>Sushant Poddar</strong>, we have been serving clients across India since 2009.</p>
<h3>Our Mission</h3>
<p>Our mission is to make document attestation simple, reliable, and stress-free for every client — whether you are an individual, a business, or an institution. We believe in transparency, speed, and delivering results you can trust.</p>
<h3>What We Do</h3>
<p>We specialize in a wide range of document services including:</p>
<ul>
<li>Notary Attestation for all document types</li>
<li>HRD (Human Resource Department) Attestation for educational certificates</li>
<li>MEA (Ministry of External Affairs) Attestation</li>
<li>MEA Apostille for Hague Convention countries</li>
<li>Embassy and Consulate Attestation for 50+ countries</li>
<li>MOFA Attestation for Gulf countries</li>
<li>Document Translation Services in 50+ languages</li>
</ul>
<h3>Why Choose Us?</h3>
<ul>
<li><strong>15+ Years of Experience</strong> — Established in 2009, we have processed over 50,000 documents</li>
<li><strong>ISO 9001:2015 Certified</strong> — Our processes meet international quality standards</li>
<li><strong>100% Authentic</strong> — All attestations done through official government channels</li>
<li><strong>Pan India Service</strong> — Pickup and delivery across all major cities</li>
<li><strong>Transparent Pricing</strong> — No hidden charges, complete quote upfront</li>
<li><strong>Dedicated Support</strong> — Assigned relationship manager for your documents</li>
</ul>
<h3>Our Location</h3>
<p>We are conveniently located at <strong>C-260, Ground Floor, New Ashok Nagar, New Delhi – 110096</strong>. We serve clients from Delhi, Noida, Gurgaon, and all across India through our pickup and delivery network.</p>',
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'subtitle' => 'How we collect, use and protect your personal information',
                'meta_title' => 'Privacy Policy | S K Document Centre',
                'meta_description' => 'Read S K Document Centre\'s privacy policy to understand how we collect, use and protect your personal information.',
                'content' => '<h2>Privacy Policy</h2>
<p><em>Last updated: ' . date('d F Y') . '</em></p>
<p>S K Document Centre ("we", "our", "us") is committed to protecting your personal information and your right to privacy. This Privacy Policy describes how we collect, use, and share information about you when you use our services.</p>
<h3>Information We Collect</h3>
<p>We collect information you provide directly to us, including:</p>
<ul>
<li>Name, email address, phone number and address when you submit an enquiry or contact form</li>
<li>Document details required to process your attestation requests</li>
<li>Payment information when you engage our paid services</li>
</ul>
<h3>How We Use Your Information</h3>
<p>We use the information we collect to:</p>
<ul>
<li>Process and fulfill your document attestation requests</li>
<li>Communicate with you about your orders and enquiries</li>
<li>Send you updates about our services (with your consent)</li>
<li>Improve our services and website</li>
<li>Comply with legal obligations</li>
</ul>
<h3>Information Sharing</h3>
<p>We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:</p>
<ul>
<li>With government authorities as required for attestation processes</li>
<li>With courier partners for document delivery</li>
<li>When required by law or legal process</li>
</ul>
<h3>Data Security</h3>
<p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. Your documents are handled with the utmost care and confidentiality.</p>
<h3>Contact Us</h3>
<p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:info@skdocumentcentre.in">info@skdocumentcentre.in</a> or call <a href="tel:+919354234462">+91-9354234462</a>.</p>',
            ],
            [
                'title' => 'Terms & Conditions',
                'slug' => 'terms-conditions',
                'subtitle' => 'Please read these terms carefully before using our services',
                'meta_title' => 'Terms & Conditions | S K Document Centre',
                'meta_description' => 'Read S K Document Centre\'s terms and conditions for using our document attestation services.',
                'content' => '<h2>Terms & Conditions</h2>
<p><em>Last updated: ' . date('d F Y') . '</em></p>
<p>By using the services of S K Document Centre, you agree to be bound by the following terms and conditions. Please read them carefully.</p>
<h3>1. Services</h3>
<p>S K Document Centre provides document attestation, apostille, translation and related services. The specific services, timelines and charges will be agreed upon at the time of order confirmation.</p>
<h3>2. Document Submission</h3>
<ul>
<li>All original documents must be submitted in good condition</li>
<li>You are responsible for ensuring documents are genuine and authentic</li>
<li>We are not responsible for rejection due to defective or fraudulent documents</li>
<li>Processing timelines are estimates and may vary based on government authority schedules</li>
</ul>
<h3>3. Payment Terms</h3>
<ul>
<li>Service charges must be paid as agreed before or during processing</li>
<li>Government fees and embassy charges are additional and may vary</li>
<li>Refunds are subject to our refund policy and the stage of processing</li>
</ul>
<h3>4. Liability</h3>
<p>S K Document Centre shall not be liable for delays caused by government authorities, force majeure events, or circumstances beyond our control. Our liability is limited to the service fee paid.</p>
<h3>5. Confidentiality</h3>
<p>We maintain strict confidentiality of all documents and personal information entrusted to us. Documents will not be shared with unauthorized parties.</p>
<h3>6. Governing Law</h3>
<p>These terms shall be governed by the laws of India. Any disputes shall be subject to the jurisdiction of courts in New Delhi.</p>
<h3>Contact</h3>
<p>For queries regarding these terms, contact us at <a href="mailto:info@skdocumentcentre.in">info@skdocumentcentre.in</a>.</p>',
            ],
        ];

        foreach ($pages as $page) {
            \App\Models\Page::updateOrCreate(
                ['slug' => $page['slug']],
                array_merge($page, ['is_active' => true])
            );
        }

        // Default site settings
        \App\Models\Setting::firstOrCreate([], [
            'site_name' => config('app.name', 'S K Document Centre'),
            'phone' => '+91-9354234462',
            'email' => 'info@skdocumentcentre.in',
            'address' => 'C-260, Ground Floor, New Ashok Nagar, New Delhi, Delhi – 110096',
            'facebook_url' => '',
            'instagram_url' => '',
            'twitter_url' => '',
            'linkedin_url' => '',
            'why_choose_title' => 'Your Trusted Partner',
            'why_choose_subtitle' => 'Expert document attestation services with fast delivery and transparent pricing.',
            'why_choose_items' => [
                ['icon' => 'fas fa-shield-alt', 'title' => 'Safe & Reliable Service', 'desc' => 'Documents handled with maximum care and security.'],
                ['icon' => 'fas fa-certificate', 'title' => 'Certified Translation', 'desc' => 'Professional translations accepted by government authorities.'],
                ['icon' => 'fas fa-map-marked-alt', 'title' => 'Embassy & Apostille Experts', 'desc' => 'Complete end-to-end attestation for UAE, Qatar, Bahrain and more.'],
                ['icon' => 'fas fa-tag', 'title' => 'Transparent Pricing', 'desc' => 'No hidden costs, clear and competitive rates.'],
            ],
            'how_it_works_title' => 'How It Works',
            'how_it_works_subtitle' => 'Follow our smooth 4-step process to get documents attested and delivered.',
            'how_it_works_items' => [
                ['step' => '1', 'title' => 'Submit Documents', 'desc' => 'Upload your documents through our secure portal or visit our office.'],
                ['step' => '2', 'title' => 'Document Verification', 'desc' => 'Our experts verify and prepare your documents for attestation.'],
                ['step' => '3', 'title' => 'Attestation Process', 'desc' => 'We handle notary, SDM, MEA, and embassy attestation as required.'],
                ['step' => '4', 'title' => 'Delivery', 'desc' => 'Receive your attested documents via courier or pickup.'],
            ],
        ]);

        // Sample tied-up companies
        \App\Models\TiedUpCompany::firstOrCreate(['name' => 'ABC Logistics'], ['image' => '', 'sort_order' => 1, 'is_active' => true]);
        \App\Models\TiedUpCompany::firstOrCreate(['name' => 'Global Express'], ['image' => '', 'sort_order' => 2, 'is_active' => true]);
        \App\Models\TiedUpCompany::firstOrCreate(['name' => 'World Couriers'], ['image' => '', 'sort_order' => 3, 'is_active' => true]);
        \App\Models\TiedUpCompany::firstOrCreate(['name' => 'Passport Services Co.'], ['image' => '', 'sort_order' => 4, 'is_active' => true]);

        // Sample Blog Posts
        $blogs = [
            [
                'title' => 'Certificate Apostille & Attestation Services – Complete Guide 2025',
                'category' => 'Apostille',
                'author' => 'SK Admin',
                'short_description' => 'An Apostille is a form of authentication issued to documents for use in countries that participate in the Hague Convention. Learn how it works and what documents are eligible.',
                'long_description' => '<h2>What is an Apostille?</h2><p>An Apostille is a certificate that authenticates the origin of a public document. It is issued under the terms of the Hague Convention of 5 October 1961. Countries party to the Convention mutually recognize apostilles affixed by other countries.</p><h3>Why do you need Apostille?</h3><p>If you are moving to a Hague Convention country like Germany, USA, UK, Australia, France, Netherlands etc., you need an Apostille stamp on your documents instead of Embassy attestation.</p><h3>Documents Eligible for Apostille</h3><ul><li>Educational certificates (degree, diploma, marksheet)</li><li>Birth certificate</li><li>Marriage certificate</li><li>Death certificate</li><li>Police Clearance Certificate</li><li>Commercial documents</li></ul><h3>Apostille Process in India</h3><p>The Apostille process in India involves: (1) Notarization from a Public Notary → (2) State Authentication (HRD for educational docs, Home Department for personal docs) → (3) MEA Apostille Stamp. S K Document Centre handles the complete process on your behalf.</p>',
                'meta_title' => 'Certificate Apostille Services India – Complete Guide | SK Document Centre',
                'meta_description' => 'Learn about Apostille services in India. S K Document Centre provides fast MEA Apostille for all document types. Complete guide for 2025.',
                'meta_keywords' => 'apostille india, mea apostille, certificate apostille, document apostille',
                'sort_order' => 1,
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Diploma Certificate Attestation Services – UAE, Saudi & GCC Countries',
                'category' => 'Embassy Attestation',
                'author' => 'SK Admin',
                'short_description' => 'Planning to work in UAE or Saudi Arabia? Get your diploma attested through the proper channels – HRD, MEA and Embassy attestation explained step by step.',
                'long_description' => '<h2>Diploma Certificate Attestation for Gulf Countries</h2><p>If you are applying for a work visa to UAE, Saudi Arabia, Qatar, Kuwait, Oman, or Bahrain, your educational certificates including degree and diploma must be attested by the respective Embassy.</p><h3>Attestation Process for Educational Certificates</h3><ol><li><strong>Notary Attestation</strong> – First step, notarizing the original document</li><li><strong>HRD Attestation</strong> – State Human Resource Department authentication</li><li><strong>MEA Attestation</strong> – Ministry of External Affairs, New Delhi</li><li><strong>Embassy Attestation</strong> – Respective Embassy of the destination country</li><li><strong>MOFA Attestation</strong> – Ministry of Foreign Affairs (in the destination country)</li></ol><h3>Documents Required</h3><ul><li>Original degree/diploma certificate</li><li>University consolidated marksheet</li><li>Passport copy (first and last page)</li><li>Visa copy (if available)</li></ul><p>S K Document Centre provides end-to-end attestation services for all Gulf countries with fast turnaround times.</p>',
                'meta_title' => 'Diploma Certificate Attestation for UAE, Saudi Arabia | SK Document Centre',
                'meta_description' => 'Get your diploma certificate attested for UAE, Saudi Arabia, Qatar, Kuwait. Complete HRD-MEA-Embassy attestation service. Fast and reliable.',
                'meta_keywords' => 'diploma attestation, UAE attestation, Saudi Arabia attestation, educational certificate attestation',
                'sort_order' => 2,
                'is_active' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Marriage Certificate Attestation Services – Process & Requirements',
                'category' => 'Document Guide',
                'author' => 'SK Admin',
                'short_description' => 'Marriage certificate attestation is required for dependent visa, family visa, and many other immigration processes. Know the complete procedure and requirements.',
                'long_description' => '<h2>Marriage Certificate Attestation</h2><p>Marriage certificate attestation is required when you want to bring your spouse to a foreign country on a dependent visa, or for various legal purposes abroad. The process involves authenticating your Indian marriage certificate to make it legally valid internationally.</p><h3>When is Marriage Certificate Attestation Required?</h3><ul><li>Applying for dependent/family visa</li><li>Spouse visa applications</li><li>Property transactions abroad</li><li>Insurance claims</li><li>Name change procedures in foreign countries</li></ul><h3>Attestation Process</h3><ol><li>Notary Attestation</li><li>Home Department / SDM Attestation</li><li>MEA Attestation or Apostille (depending on destination country)</li><li>Embassy Attestation (for non-Hague countries)</li></ol><h3>Processing Time</h3><p>Marriage certificate attestation typically takes 10-15 working days. Express service available in 5-7 days with an additional charge. Contact S K Document Centre for exact timelines and charges.</p>',
                'meta_title' => 'Marriage Certificate Attestation Services India | SK Document Centre',
                'meta_description' => 'Complete marriage certificate attestation services for visa, immigration and legal purposes. Fast, reliable and government-authorized process.',
                'meta_keywords' => 'marriage certificate attestation, marriage certificate apostille, spouse visa attestation',
                'sort_order' => 3,
                'is_active' => true,
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($blogs as $blog) {
            \App\Models\Blog::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($blog['title'])],
                array_merge($blog, ['slug' => \Illuminate\Support\Str::slug($blog['title'])])
            );
        }

        // Sample Reviews
        $reviews = [
            ['reviewer_name' => 'Rahul Sharma', 'reviewer_location' => 'Delhi', 'rating' => 5, 'review_text' => 'Excellent service! They helped me get my degree certificate attested for UAE in record time. The team was professional, responsive and the pricing was transparent. Highly recommend SK Document Centre to anyone needing attestation services!', 'source' => 'Google', 'sort_order' => 1, 'is_active' => true],
            ['reviewer_name' => 'Priya Gupta', 'reviewer_location' => 'Mumbai', 'rating' => 5, 'review_text' => 'SK Document Centre handled my marriage certificate attestation for a Kuwait visa. They guided me through every step and delivered the attested documents on time. Best attestation service in India. Very satisfied with their work.', 'source' => 'Google', 'sort_order' => 2, 'is_active' => true],
            ['reviewer_name' => 'Ahmed Khan', 'reviewer_location' => 'Hyderabad', 'rating' => 5, 'review_text' => 'Best attestation service in India. They guided me through the Apostille process for my documents and got it done quickly. Very professional staff and excellent customer support throughout the process.', 'source' => 'Google', 'sort_order' => 3, 'is_active' => true],
            ['reviewer_name' => 'Sunita Verma', 'reviewer_location' => 'Bangalore', 'rating' => 5, 'review_text' => 'I needed my documents attested urgently for Saudi Arabia and they completed it within 5 days. The staff was very helpful and kept me updated at every stage. Truly a reliable and trusted service.', 'source' => 'Google', 'sort_order' => 4, 'is_active' => true],
            ['reviewer_name' => 'Mohammed Ali', 'reviewer_location' => 'Chennai', 'rating' => 5, 'review_text' => 'Got my degree and birth certificate attested from here. Very smooth process, no hassles at all. They picked up and delivered the documents to my doorstep. Would definitely recommend to friends and family.', 'source' => 'Google', 'sort_order' => 5, 'is_active' => true],
        ];

        foreach ($reviews as $review) {
            \App\Models\Review::updateOrCreate(
                ['reviewer_name' => $review['reviewer_name'], 'reviewer_location' => $review['reviewer_location']],
                $review
            );
        }
    }
}
