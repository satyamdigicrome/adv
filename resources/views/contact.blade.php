@extends('layouts.app')

@section('meta_title', 'Contact Us | S K Document Centre')
@section('meta_description',
    'Get in touch with S K Document Centre for document attestation, apostille, MEA, embassy
    attestation services. Located in New Delhi. Call +91-9354234462.')
@section('meta_keywords', 'contact attestation services, S K Document Centre contact, document attestation Delhi')
@section('canonical', route('contact'))

@section('content')

    <!-- Hero -->
    <div
        style="background:linear-gradient(135deg,#0f2044 0%,#1a3460 100%);padding:80px 0 60px;position:relative;overflow:hidden;">
        <div
            style="position:absolute;top:-80px;right:-80px;width:350px;height:350px;border-radius:50%;background:rgba(201,168,76,0.06);pointer-events:none;">
        </div>
        <div class="container position-relative">
            <div class="text-center" data-aos="fade-up">
                <div
                    style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.12);border:1px solid rgba(201,168,76,0.25);border-radius:50px;padding:6px 16px;margin-bottom:16px;">
                    <i class="fas fa-headset" style="color:var(--gold);font-size:12px;"></i>
                    <span
                        style="color:var(--gold);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Contact
                        Us</span>
                </div>
                <h1
                    style="font-family:'Playfair Display',serif;color:#fff;font-size:clamp(30px,5vw,48px);font-weight:700;margin-bottom:14px;">
                    Get In Touch With Us
                </h1>
                <p style="color:rgba(255,255,255,0.65);font-size:15px;max-width:520px;margin:0 auto;">
                    Have questions about attestation? Need a quote? Our experts are ready to assist you with any document
                    service need.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Info Strip -->
    <div style="background:var(--gold);padding:0;">
        <div class="container">
            <div class="row g-0 text-center">
                @php
                    $sitePhone = $siteSettings->phone ?? '+91-9354234462';
                    $phoneHref = 'tel:' . preg_replace('/\D/', '', $sitePhone);
                    $siteEmail = $siteSettings->email ?? 'info@skdocumentcentre.in';
                    $siteAddress = $siteSettings->address ?? 'C-260, New Ashok Nagar, New Delhi-110096';
                @endphp
                @foreach ([['fas fa-phone-alt', 'Call Us', $sitePhone, $phoneHref], ['fas fa-envelope', 'Email Us', $siteEmail, 'mailto:' . $siteEmail], ['fab fa-whatsapp', 'WhatsApp', $sitePhone, 'https://wa.me/' . preg_replace('/\D/', '', $sitePhone)], ['fas fa-clock', 'Working Hours', 'Mon–Sat: 9AM–6PM', '#']] as $info)
                    <div class="col-6 col-md-3" style="border-right:1px solid rgba(15,32,68,0.12);padding:18px 16px;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:10px;">
                            <i class="{{ $info[0] }}" style="color:var(--primary);font-size:18px;"></i>
                            <div style="text-align:left;">
                                <div
                                    style="font-size:10px;color:rgba(15,32,68,0.6);font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">
                                    {{ $info[1] }}</div>
                                <a href="{{ $info[3] }}"
                                    style="font-size:12.5px;font-weight:700;color:var(--primary);text-decoration:none;">{{ $info[2] }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section style="padding:80px 0;background:#f8fafc;">
        <div class="container">
            <div class="row g-5">

                <!-- Contact Form -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div
                        style="background:#fff;border-radius:20px;padding:40px;box-shadow:0 4px 24px rgba(15,32,68,0.07);border:1px solid #edf1f8;">
                        <h2
                            style="font-family:'Playfair Display',serif;font-size:26px;font-weight:700;color:var(--primary);margin-bottom:6px;">
                            Send Us a Message
                        </h2>
                        <p style="font-size:13.5px;color:#8a99b0;margin-bottom:28px;">We typically respond within 2–4 hours
                            during business hours.</p>

                        @if (session('contact_success'))
                            <div
                                style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.25);color:#16a34a;border-radius:12px;padding:16px 20px;font-size:14px;margin-bottom:24px;">
                                <i class="fas fa-check-circle me-2"></i> {{ session('contact_success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div
                                style="background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.2);color:#dc2626;border-radius:10px;padding:14px 18px;font-size:13.5px;margin-bottom:20px;">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label
                                        style="font-size:13px;font-weight:600;color:var(--primary);margin-bottom:6px;display:block;">Full
                                        Name <span style="color:#dc2626;">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Your full name" required
                                        style="border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 16px;font-size:14px;transition:all 0.2s;">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label
                                        style="font-size:13px;font-weight:600;color:var(--primary);margin-bottom:6px;display:block;">Email
                                        Address <span style="color:#dc2626;">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="your@email.com" required
                                        style="border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 16px;font-size:14px;">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label
                                        style="font-size:13px;font-weight:600;color:var(--primary);margin-bottom:6px;display:block;">Phone
                                        Number</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        placeholder="+91 XXXXX XXXXX"
                                        style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 16px;font-size:14px;outline:none;font-family:inherit;transition:border-color 0.2s;"
                                        onfocus="this.style.borderColor='var(--gold)'"
                                        onblur="this.style.borderColor='#e2e8f0'">
                                </div>
                                <div class="col-md-6">
                                    <label
                                        style="font-size:13px;font-weight:600;color:var(--primary);margin-bottom:6px;display:block;">Subject</label>
                                    <select name="subject"
                                        style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 16px;font-size:14px;outline:none;font-family:inherit;background:#fff;cursor:pointer;"
                                        onfocus="this.style.borderColor='var(--gold)'"
                                        onblur="this.style.borderColor='#e2e8f0'">
                                        <option value="">— Select Subject —</option>
                                        @php $navServices = \App\Models\Service::active()->ordered()->get(); @endphp
                                        @foreach ($navServices as $s)
                                            <option value="{{ $s->title }}"
                                                {{ old('subject') == $s->title ? 'selected' : '' }}>{{ $s->title }}
                                            </option>
                                        @endforeach
                                        <option value="UAE Attestation"
                                            {{ old('subject') == 'UAE Attestation' ? 'selected' : '' }}>UAE Attestation
                                        </option>
                                        <option value="Saudi Arabia Attestation"
                                            {{ old('subject') == 'Saudi Arabia Attestation' ? 'selected' : '' }}>Saudi
                                            Arabia Attestation</option>
                                        <option value="General Enquiry"
                                            {{ old('subject') == 'General Enquiry' ? 'selected' : '' }}>General Enquiry
                                        </option>
                                        <option
                                            value="{{ old('subject') && !in_array(old('subject'), ['UAE Attestation', 'Saudi Arabia Attestation', 'General Enquiry']) ? old('subject') : 'Other' }}">
                                            Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label
                                        style="font-size:13px;font-weight:600;color:var(--primary);margin-bottom:6px;display:block;">Message</label>
                                    <textarea name="message" rows="5" placeholder="Describe your requirement in detail..."
                                        style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 16px;font-size:14px;outline:none;font-family:inherit;resize:vertical;transition:border-color 0.2s;"
                                        onfocus="this.style.borderColor='var(--gold)'" onblur="this.style.borderColor='#e2e8f0'">{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                        style="background:var(--primary);color:#fff;border:none;border-radius:12px;padding:15px 40px;font-size:15px;font-weight:700;cursor:pointer;transition:all 0.2s;font-family:inherit;"
                                        onmouseover="this.style.background='var(--gold)';this.style.color='var(--primary)'"
                                        onmouseout="this.style.background='var(--primary)';this.style.color='#fff'">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                    <p style="font-size:12px;color:#8a99b0;margin-top:10px;margin-bottom:0;">
                                        <i class="fas fa-lock me-1"></i> Your information is 100% secure and will not be
                                        shared.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info + Map -->
                <div class="col-lg-5" data-aos="fade-left">

                    <!-- Info Cards -->
                    <div
                        style="background:#fff;border-radius:20px;padding:32px;box-shadow:0 4px 24px rgba(15,32,68,0.07);border:1px solid #edf1f8;margin-bottom:24px;">
                        <h3
                            style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--primary);margin-bottom:24px;">
                            Our Office
                        </h3>
                        @foreach ([['fas fa-map-marker-alt', 'Address', 'C-260, Ground Floor, New Ashok Nagar,<br>New Delhi, Delhi – 110096'], ['fas fa-phone-alt', 'Phone', '<a href="tel:+919354234462" style="color:var(--primary);font-weight:700;text-decoration:none;">+91-9354234462</a>'], ['fas fa-envelope', 'Email', '<a href="mailto:info@skdocumentcentre.in" style="color:var(--primary);font-weight:700;text-decoration:none;">info@skdocumentcentre.in</a>'], ['fas fa-clock', 'Hours', 'Monday – Saturday: 9:00 AM – 6:00 PM<br><span style="color:#8a99b0;font-size:12px;">Closed on Sundays & National Holidays</span>']] as $info)
                            <div style="display:flex;gap:14px;margin-bottom:20px;align-items:flex-start;">
                                <div
                                    style="width:44px;height:44px;background:rgba(201,168,76,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i class="{{ $info[0] }}" style="color:var(--gold);font-size:16px;"></i>
                                </div>
                                <div>
                                    <div
                                        style="font-size:11.5px;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#8a99b0;margin-bottom:4px;">
                                        {{ $info[1] }}</div>
                                    <div style="font-size:13.5px;color:var(--primary);line-height:1.6;">
                                        {!! $info[2] !!}</div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Social Links -->
                        <div style="padding-top:16px;border-top:1px solid #f0f3f8;">
                            <div
                                style="font-size:12px;font-weight:700;color:#8a99b0;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:12px;">
                                Follow Us</div>
                            <div style="display:flex;gap:10px;">
                                @foreach ([['fab fa-facebook-f', '#', '#1877f2'], ['fab fa-twitter', '#', '#1da1f2'], ['fab fa-instagram', '#', '#e1306c'], ['fab fa-linkedin-in', '#', '#0a66c2'], ['fab fa-whatsapp', 'https://wa.me/919354234462', '#25D366']] as $s)
                                    <a href="{{ $s[1] }}" target="_blank"
                                        style="width:36px;height:36px;border-radius:8px;background:rgba(15,32,68,0.06);display:flex;align-items:center;justify-content:center;text-decoration:none;transition:all 0.2s;"
                                        onmouseover="this.style.background='{{ $s[2] }}';this.querySelector('i').style.color='#fff'"
                                        onmouseout="this.style.background='rgba(15,32,68,0.06)';this.querySelector('i').style.color='var(--primary)'">
                                        <i class="{{ $s[0] }}" style="color:var(--primary);font-size:14px;"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Google Map -->
                    <div
                        style="border-radius:20px;overflow:hidden;box-shadow:0 4px 24px rgba(15,32,68,0.07);border:1px solid #edf1f8;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.475675256723!2d77.30484847464757!3d28.59496918578702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5456606cf8d%3A0xef69eb7c73303f66!2sS%20K%20Document%20Centre%20%7C%20Notary%2CAttestation%2C%20Apostille%2C%20MEA%2C%20HRD%2C%20UAE%20Embassy%20Services!5e1!3m2!1sen!2sin!4v1775135847016!5m2!1sen!2sin"
                            width="100%" height="280" style="border:0;display:block;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="S K Document Centre Location">
                        </iframe>
                        <div style="background:#fff;padding:14px 18px;border-top:1px solid #edf1f8;">
                            <a href="https://maps.google.com/?q=C-260,+Ground+Floor,+New+Ashok+Nagar,+New+Delhi,+110096" target="_blank"
                                style="font-size:13px;font-weight:700;color:var(--primary);text-decoration:none;">
                                <i class="fas fa-directions me-2" style="color:var(--gold);"></i>
                                Get Directions on Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section style="padding:60px 0;background:#fff;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span
                    style="color:var(--gold);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:2px;">Got
                    Questions?</span>
                <h2
                    style="font-family:'Playfair Display',serif;color:var(--primary);font-size:clamp(22px,4vw,34px);font-weight:700;margin-top:8px;">
                    Quick Answers</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="contactFaq">
                        @foreach ([['How long does attestation take?', 'Processing time typically ranges from 7–15 working days depending on the country and document type. Express services are available for urgent cases (3–5 days).'], ['Do you provide pickup and delivery?', 'Yes! We offer door-to-door pickup and delivery service across all major cities in India including Delhi, Mumbai, Chennai, Bengaluru, Hyderabad, Pune, and more.'], ['What are your service charges?', 'Charges vary based on document type, country, and processing speed. Contact us for a free, transparent quote — no hidden fees.'], ['Is my document safe with you?', 'Absolutely. We have handled 10,000+ documents with zero loss incidents. We provide tracking updates throughout the process.']] as $i => $faq)
                            <div class="accordion-item"
                                style="border:1.5px solid #edf1f8;border-radius:12px;margin-bottom:10px;overflow:hidden;"
                                data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                                <h2 class="accordion-header">
                                    <button class="accordion-button {{ $i === 0 ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cfaq{{ $i }}"
                                        style="font-size:14.5px;font-weight:600;color:var(--primary);background:{{ $i === 0 ? 'rgba(201,168,76,0.06)' : '#fff' }};">
                                        <i class="fas fa-question-circle me-2" style="color:var(--gold);"></i>
                                        {{ $faq[0] }}
                                    </button>
                                </h2>
                                <div id="cfaq{{ $i }}"
                                    class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}"
                                    data-bs-parent="#contactFaq">
                                    <div class="accordion-body"
                                        style="font-size:14px;color:#637082;padding:16px 20px;border-top:1px solid #edf1f8;">
                                        {{ $faq[1] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .form-control:focus {
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.12) !important;
        }

        .accordion-button:not(.collapsed) {
            color: var(--primary);
            background: rgba(201, 168, 76, 0.06);
        }

        .accordion-button:focus {
            box-shadow: none;
        }
    </style>
@endpush
