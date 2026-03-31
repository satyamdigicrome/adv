<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Attestation;
use App\Models\Faq;
use Illuminate\Database\Seeder;

class ServiceAttestationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===== SERVICES (10+) =====
        $services = [
            [
                'title' => 'Notary Attestation',
                'slug' => 'notary-attestation',
                'icon' => 'fas fa-stamp',
                'short_description' => 'Official notarization services for all types of legal documents for domestic and international use.',
                'long_description' => '<h3>Notary Attestation Services</h3>
<p>Notary Attestation is the first step in the document authentication chain. Our certified notaries are authorized to authenticate signatures, seals, and documents as per the Notaries Act, 1952.</p>
<h4>What We Notarize:</h4>
<ul>
<li>Educational certificates and diplomas</li>
<li>Birth, death, and marriage certificates</li>
<li>Commercial agreements and contracts</li>
<li>Power of Attorney documents</li>
<li>Bank statements and financial documents</li>
<li>Police Clearance Certificates (PCC)</li>
<li>Medical reports and prescriptions</li>
<li>Company incorporation documents</li>
</ul>
<h4>Processing Timeline:</h4>
<p>Notary attestation is typically completed within <strong>1-2 working days</strong>. We offer same-day services for urgent requirements at an additional cost.</p>
<h4>Required Documents:</h4>
<ul>
<li>Original document to be attested</li>
<li>Valid photo ID (Passport, PAN, Aadhaar, or Driving License)</li>
<li>Address proof (utility bill, rental agreement, or lease deed)</li>
<li>Affidavit (if required for specific document types)</li>
</ul>
<h4>Our Advantages:</h4>
<ul>
<li>Experienced notaries with 15+ years of practice</li>
<li>Government-authorized services</li>
<li>Transparent and competitive pricing</li>
<li>Pan-India pickup and delivery</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Preparation',
                        'description' => 'Gather all required original documents and ensure they are in proper condition for notarization.'
                    ],
                    [
                        'heading' => 'Identity Verification',
                        'description' => 'Present valid photo ID and address proof to the notary for identity verification.'
                    ],
                    [
                        'heading' => 'Notary Authentication',
                        'description' => 'Notary verifies the document authenticity and applies official signature and stamp.'
                    ],
                    [
                        'heading' => 'Quality Check',
                        'description' => 'Final verification of the notarized document to ensure all requirements are met.'
                    ],
                    [
                        'heading' => 'Document Delivery',
                        'description' => 'Receive the notarized document ready for next attestation level (HRD/MEA).'
                    ]
                ],
                'meta_title' => 'Notary Attestation Services | S K Document Centre',
                'meta_description' => 'Professional notary attestation for educational, personal, and commercial documents. Authorized notaries with fast service.',
            ],
            [
                'title' => 'HRD Attestation (Educational Certificates)',
                'slug' => 'hrd-attestation',
                'icon' => 'fas fa-graduation-cap',
                'short_description' => 'Human Resource Department attestation for educational certificates, degrees, diplomas, and academic documents.',
                'long_description' => '<h3>HRD Attestation Services</h3>
<p>HRD (Human Resource Department) Attestation is essential for verifying the authenticity of educational documents issued by government and private institutions. This attestation is mandatory for job applications, higher education admissions, and overseas placements.</p>
<h4>Documents We Attest:</h4>
<ul>
<li>Bachelor\'s degree certificates</li>
<li>Master\'s degree certificates</li>
<li>Diploma certificates</li>
<li>Mark sheets and transcripts</li>
<li>Professional certifications (CA, CS, CMA, etc.)</li>
<li>Course completion certificates</li>
<li>School leaving certificates</li>
<li>University character certificates</li>
</ul>
<h4>Processing Timeline:</h4>
<p>HRD attestation typically takes <strong>5-7 working days</strong> depending on the state and whether additional documentation is required.</p>
<h4>State Wise Attestation:</h4>
<p>We handle HRD attestation from all major states including Delhi, Uttar Pradesh, Maharashtra, Karnataka, Tamil Nadu, Telangana, and others.</p>
<h4>Required Documents:</h4>
<ul>
<li>Original or notarized copy of the certificate/degree</li>
<li>Passport (copy of first and last page)</li>
<li>Valid photo ID</li>
<li>Signed authorization letter</li>
</ul>
<h4>Why Choose Us:</h4>
<ul>
<li>State-wise expertise for multiple HRD departments</li>
<li>Knowledge of specific requirements for different states</li>
<li>Fast processing without delays</li>
<li>Complete documentation assistance</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Submission',
                        'description' => 'Submit original educational documents with notarized copies and required forms.'
                    ],
                    [
                        'heading' => 'State HRD Verification',
                        'description' => 'Documents are verified by the respective state HRD department for authenticity.'
                    ],
                    [
                        'heading' => 'Attestation Stamp',
                        'description' => 'Official HRD stamp and signature are applied to the documents.'
                    ],
                    [
                        'heading' => 'Quality Assurance',
                        'description' => 'Final check to ensure all stamps and signatures are properly applied.'
                    ],
                    [
                        'heading' => 'Return Processing',
                        'description' => 'Documents are returned ready for MEA attestation or embassy processing.'
                    ]
                ],
                'meta_title' => 'HRD Attestation for Educational Documents | S K Document Centre',
                'meta_description' => 'Get HRD attestation for degrees, diplomas, and certificates. Trusted by thousands for education verification.',
            ],
            [
                'title' => 'MEA Attestation (Ministry of External Affairs)',
                'slug' => 'mea-attestation',
                'icon' => 'fas fa-globe-asia',
                'short_description' => 'Ministry of External Affairs attestation for international document verification required by foreign countries.',
                'long_description' => '<h3>MEA Attestation Services</h3>
<p>MEA (Ministry of External Affairs) Attestation is a crucial step in the document authentication chain for foreign travel, employment, or education abroad. It certifies that documents have been properly attested by authorized Indian government agencies.</p>
<h4>Why MEA Attestation is Required:</h4>
<ul>
<li>Mandatory for all countries outside the Hague Convention</li>
<li>Required by foreign embassies and employers</li>
<li>Essential for international business transactions</li>
<li>Needed for overseas educational enrollment</li>
<li>Required for foreign job applications</li>
</ul>
<h4>Documents Attested:</h4>
<ul>
<li>Educational certificates (HRD attested)</li>
<li>Birth and marriage certificates</li>
<li>Police Clearance Certificates</li>
<li>Commercial and business documents</li>
<li>Affidavits and notarized documents</li>
<li>Medical certificates</li>
<li>Personal identification documents</li>
</ul>
<h4>MEA Attestation Process:</h4>
<p>The MEA attestation process involves verification by the Ministry and issuing an official stamp confirming the authenticity of prior attestations (Notary and HRD).</p>
<h4>Processing Timeline:</h4>
<p>MEA attestation takes approximately <strong>3-5 working days</strong> after document submission.</p>
<h4>Required Documents:</h4>
<ul>
<li>Properly notarized and HRD-attested document</li>
<li>Passport copy (first and last page)</li>
<li>Covering letter with sender details</li>
</ul>
<h4>Our MEA Expertise:</h4>
<ul>
<li>Direct MEA processing with no intermediaries</li>
<li>Knowledge of specific country requirements</li>
<li>Fast-track processing options available</li>
<li>Complete documentation support</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Preparation',
                        'description' => 'Ensure all documents have proper notary and HRD attestation before MEA submission.'
                    ],
                    [
                        'heading' => 'MEA Application',
                        'description' => 'Submit documents to MEA with covering letter and required forms.'
                    ],
                    [
                        'heading' => 'Ministry Verification',
                        'description' => 'MEA officials verify the authenticity of previous attestations.'
                    ],
                    [
                        'heading' => 'Official Stamp',
                        'description' => 'MEA applies official stamp and signature confirming document validity.'
                    ],
                    [
                        'heading' => 'Document Collection',
                        'description' => 'Collect attested documents ready for embassy attestation.'
                    ]
                ],
                'meta_title' => 'MEA Attestation - Ministry of External Affairs | S K Document Centre',
                'meta_description' => 'Professional MEA attestation for international documents. Required for employment and education abroad.',
            ],
            [
                'title' => 'Apostille Certification (Hague Convention)',
                'slug' => 'apostille-certification',
                'icon' => 'fas fa-certificate',
                'short_description' => 'Apostille certification for countries under the Hague Convention for direct global document recognition.',
                'long_description' => '<h3>Apostille Certification Services</h3>
<p>An Apostille is an official certification issued by competent authorities under the Hague Convention (1961) that authenticates the origin of a public document. It\'s the fastest way to get documents recognized internationally.</p>
<h4>Apostille vs Traditional Attestation:</h4>
<table style="width:100%;border-collapse:collapse;">
<tr style="background:#f5f5f5;">
<td style="border:1px solid #ddd;padding:8px;"><strong>Feature</strong></td>
<td style="border:1px solid #ddd;padding:8px;"><strong>Apostille</strong></td>
<td style="border:1px solid #ddd;padding:8px;"><strong>Embassy Attestation</strong></td>
</tr>
<tr>
<td style="border:1px solid #ddd;padding:8px;">Processing Time</td>
<td style="border:1px solid #ddd;padding:8px;">1-3 days</td>
<td style="border:1px solid #ddd;padding:8px;">7-15 days</td>
</tr>
<tr>
<td style="border:1px solid #ddd;padding:8px;">Required for</td>
<td style="border:1px solid #ddd;padding:8px;">Hague Convention countries</td>
<td style="border:1px solid #ddd;padding:8px;">Non-Hague countries</td>
</tr>
<tr>
<td style="border:1px solid #ddd;padding:8px;">Cost</td>
<td style="border:1px solid #ddd;padding:8px;">Lower</td>
<td style="border:1px solid #ddd;padding:8px;">Higher</td>
</tr>
</table>
<h4>Countries Accepting Apostille:</h4>
<p>USA, UK, Canada, Australia, New Zealand, Germany, France, Spain, Italy, Netherlands, Singapore, Japan, South Africa, and 150+ member countries.</p>
<h4>Documents We Process:</h4>
<ul>
<li>Educational certificates and transcripts</li>
<li>Birth, death, and marriage certificates</li>
<li>Police Clearance Certificates</li>
<li>Commercial documents and certificates</li>
<li>Degree diplomas and academic records</li>
</ul>
<h4>Processing Timeline:</h4>
<p>Apostille certification is completed within <strong>1-3 working days</strong> once documents are submitted.</p>
<h4>Why Apostille is Better:</h4>
<ul>
<li>Recognized by 150+ countries directly</li>
<li>No need for embassy attestation to follow</li>
<li>Faster processing (1-3 days)</li>
<li>Lower cost compared to embassy attestation</li>
<li>Direct government certification</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Eligibility Check',
                        'description' => 'Verify if the document type is eligible for apostille certification.'
                    ],
                    [
                        'heading' => 'Application Submission',
                        'description' => 'Submit documents to the designated apostille authority with required forms.'
                    ],
                    [
                        'heading' => 'Authority Verification',
                        'description' => 'Competent authority verifies document authenticity and origin.'
                    ],
                    [
                        'heading' => 'Apostille Stamp Application',
                        'description' => 'Official apostille stamp is affixed to the document.'
                    ],
                    [
                        'heading' => 'Final Authentication',
                        'description' => 'Document is ready for international use in Hague Convention countries.'
                    ]
                ],
                'meta_title' => 'Apostille Certification - Hague Convention | S K Document Centre',
                'meta_description' => 'Fast apostille certification for 150+ countries. 1-3 day processing. Recognized globally under Hague Convention.',
            ],
            [
                'title' => 'Embassy Attestation (50+ Countries)',
                'slug' => 'embassy-attestation',
                'icon' => 'fas fa-building',
                'short_description' => 'Official Embassy and Consulate attestation for all required foreign country documents.',
                'long_description' => '<h3>Embassy Attestation Services</h3>
<p>Embassy Attestation is the final step in the document authentication process. Our services cover attestation requirements for over 50 countries across the Middle East, Europe, North America, and Asia-Pacific regions.</p>
<h4>Countries We Cover:</h4>
<div style="display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin:15px 0;">
<div><strong>Middle East & Gulf:</strong> UAE, Saudi Arabia, Qatar, Kuwait, Bahrain, Oman, Iraq, Egypt</div>
<div><strong>Europe & Americas:</strong> USA, Canada, UK, Germany, France, Italy, Australia</div>
<div><strong>Asia Pacific:</strong> Singapore, Malaysia, Japan, Thailand, Vietnam</div>
<div><strong>Others:</strong> New Zealand, South Africa, and more</div>
</div>
<h4>Documents We Attest:</h4>
<ul>
<li>Educational certificates and degrees</li>
<li>Birth, death, and marriage certificates</li>
<li>Police Clearance Certificates and character certificates</li>
<li>Commercial and business documents</li>
<li>Financial records and bank statements</li>
<li>Medical reports and health certificates</li>
<li>Work experience and employment letters</li>
</ul>
<h4>Embassy Attestation Process:</h4>
<p>After notarization and HRD/MEA attestation, documents are submitted to the respective Embassy or Consulate for final verification and approval. This is typically the last step before documents can be used abroad.</p>
<h4>Processing Timeline:</h4>
<p>Embassy attestation typically takes <strong>7-15 working days</strong> depending on the country and workload of the embassy.</p>
<h4>Required Documents:</h4>
<ul>
<li>Properly notarized and MEA-attested documents</li>
<li>Passport photocopy (first and last page)</li>
<li>Visa copy (if applicable)</li>
<li>Covering letter with all required details</li>
</ul>
<h4>Our Advantages:</h4>
<ul>
<li>Direct embassy relationships and contacts</li>
<li>Knowledge of country-specific requirements</li>
<li>Multiple attestation lanes for faster processing</li>
<li>Complete follow-up and status tracking</li>
<li>Pan-India pickup and delivery service</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Pre-Embassy Preparation',
                        'description' => 'Ensure all documents have proper notary, HRD, and MEA attestation.'
                    ],
                    [
                        'heading' => 'Embassy Application',
                        'description' => 'Submit documents to the respective embassy with covering letter and forms.'
                    ],
                    [
                        'heading' => 'Embassy Verification',
                        'description' => 'Embassy officials verify document authenticity and previous attestations.'
                    ],
                    [
                        'heading' => 'Official Attestation',
                        'description' => 'Embassy applies official stamp and signature for final authentication.'
                    ],
                    [
                        'heading' => 'Document Collection',
                        'description' => 'Collect fully attested documents ready for international use.'
                    ]
                ],
                'meta_title' => 'Embassy Attestation - 50+ Countries | S K Document Centre',
                'meta_description' => 'Embassy attestation for UAE, Saudi, USA, UK, Canada, and 45+ countries. Expert processing by document professionals.',
            ],
            [
                'title' => 'MOFA Attestation (MARA Certificate)',
                'slug' => 'mofa-attestation',
                'icon' => 'fas fa-mosque',
                'short_description' => 'Ministry of Foreign Affairs attestation required specifically for Gulf country employment and residency.',
                'long_description' => '<h3>MOFA Attestation (Ministry of Foreign Affairs) Services</h3>
<p>MOFA Attestation (also known as MARA Certificate) is specifically required by Gulf countries like UAE, Saudi Arabia, Qatar, Kuwait, and Bahrain for employment, residency, and business purposes. It\'s issued by the respective country\'s Ministry.</p>
<h4>MOFA vs MEA Attestation:</h4>
<p><strong>MOFA:</strong> Issued by the Middle Eastern country\'s Ministry of Foreign Affairs after MEA attestation. It\'s the final authentication step for Gulf countries.</p>
<p><strong>MEA:</strong> Issued by India\'s Ministry of External Affairs for international document verification.</p>
<h4>When MOFA is Required:</h4>
<ul>
<li>Employment visa applications for Gulf countries</li>
<li>Work permit and residency visa processing</li>
<li>Educational enrollment in Gulf institutions</li>
<li>Business and commercial transactions</li>
<li>Spouse and dependent visa applications</li>
</ul>
<h4>Documents We Attest:</h4>
<ul>
<li>Educational certificates (B.A., B.Tech, M.A., M.Tech, etc.)</li>
<li>Professional certificates (CA, CS, CMA, MBA, etc.)</li>
<li>Birth and marriage certificates</li>
<li>Employment letters and experience certificates</li>
<li>Police Clearance Certificates</li>
<li>Medical fitness reports</li>
</ul>
<h4>Processing Timeline:</h4>
<p>MOFA attestation takes approximately <strong>10-14 working days</strong> including MEA time and embassy processing.</p>
<h4>Countries with MOFA Systems:</h4>
<ul>
<li>UAE (Saudi Arabia too uses similar system)</li>
<li>Saudi Arabia (with specific requirements)</li>
<li>Qatar</li>
<li>Kuwait</li>
<li>Bahrain</li>
<li>Oman</li>
</ul>
<h4>Why Choose Our MOFA Services:</h4>
<ul>
<li>Specialized team for Gulf countries</li>
<li>Understanding of country-specific requirements</li>
<li>Direct relationships with embassies</li>
<li>Fast processing with minimal delays</li>
<li>Complete documentation support</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Preparation',
                        'description' => 'Gather all required documents with proper MEA attestation.'
                    ],
                    [
                        'heading' => 'MOFA Application',
                        'description' => 'Submit documents to the respective Gulf country\'s MOFA office.'
                    ],
                    [
                        'heading' => 'Ministry Review',
                        'description' => 'MOFA officials review and verify document authenticity.'
                    ],
                    [
                        'heading' => 'MARA Certificate Issuance',
                        'description' => 'Official MOFA/MARA certificate is issued for the documents.'
                    ],
                    [
                        'heading' => 'Final Attestation',
                        'description' => 'Documents are fully attested and ready for visa processing.'
                    ]
                ],
                'meta_title' => 'MOFA Attestation (MARA Certificate) | S K Document Centre',
                'meta_description' => 'MOFA attestation for UAE, Saudi Arabia, Qatar, Kuwait. Ministry approval required for Gulf employment.',
            ],
            [
                'title' => 'Translation Services (50+ Languages)',
                'slug' => 'translation-services',
                'icon' => 'fas fa-language',
                'short_description' => 'Certified translation services in 50+ languages with government authorized translators.',
                'long_description' => '<h3>Certified Translation Services</h3>
<p>Our professional translation services bridge language barriers for international document processing. All translations are certified by government-authorized translators and accepted by embassies and international institutions.</p>
<h4>Languages We Translate:</h4>
<p><strong>European Languages:</strong> English, French, German, Spanish, Italian, Portuguese, Dutch, Swedish, Norwegian, Danish, Finnish, Polish, Czech, Hungarian</p>
<p><strong>Asian Languages:</strong> Mandarin, Japanese, Korean, Thai, Vietnamese, Indonesian, Tagalog, Malay, Hindi, Bengali, Punjabi, Urdu, Marathi, Gujarati, Tamil, Telugu, Kannada, Malayalam</p>
<p><strong>Middle Eastern Languages:</strong> Arabic, Hebrew, Turkish, Persian, Farsi</p>
<p><strong>African Languages:</strong> Swahili, Zulu, Xhosa</p>
<h4>Documents We Translate:</h4>
<ul>
<li>Educational certificates and transcripts</li>
<li>Birth, death, and marriage certificates</li>
<li>Passports and identity documents</li>
<li>Employment contracts and letters</li>
<li>Medical reports and prescriptions</li>
<li>Legal documents and affidavits</li>
<li>Commercial contracts and agreements</li>
<li>Technical and scientific documents</li>
</ul>
<h4>Translation Standards:</h4>
<ul>
<li>Certified by government-authorized translators</li>
<li>Accurate and context-sensitive translation</li>
<li>Maintains document formatting and structure</li>
<li>Accepted by all embassies and official institutions</li>
<li>Quality assurance by senior translator review</li>
</ul>
<h4>Processing Timeline:</h4>
<p>Standard translation: <strong>2-3 working days</strong>. Rush translation available within 24 hours for urgent requirements.</p>
<h4>Our Translation Advantages:</h4>
<ul>
<li>Native speaker translators for in-depth linguistic understanding</li>
<li>Subject-matter experts for technical and specialized documents</li>
<li>Government-certified translators accepted worldwide</li>
<li>Confidentiality and data security guaranteed</li>
<li>Quality assured multi-step review process</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Assessment',
                        'description' => 'Review the document to determine translation requirements and complexity.'
                    ],
                    [
                        'heading' => 'Translator Assignment',
                        'description' => 'Assign certified translator specializing in the required language pair.'
                    ],
                    [
                        'heading' => 'Translation Process',
                        'description' => 'Professional translation with attention to legal and technical terminology.'
                    ],
                    [
                        'heading' => 'Quality Review',
                        'description' => 'Senior translator reviews the translation for accuracy and completeness.'
                    ],
                    [
                        'heading' => 'Certification',
                        'description' => 'Apply official translator certification stamp and signature.'
                    ]
                ],
                'meta_title' => 'Certified Translation Services - 50+ Languages | S K Document Centre',
                'meta_description' => 'Professional certified translation in 50+ languages. Government authorized translators. Embassy accepted.',
            ],
            [
                'title' => 'Police Clearance Certificate (PCC)',
                'slug' => 'police-clearance-certificate',
                'icon' => 'fas fa-shield-alt',
                'short_description' => 'Police Clearance Certificate verification and attestation for employment and immigration purposes.',
                'long_description' => '<h3>Police Clearance Certificate (PCC) Services</h3>
<p>A Police Clearance Certificate (PCC) is an official document certifying that a person has no criminal record. It\'s essential for overseas employment, immigration, and international opportunities.</p>
<h4>When PCC is Required:</h4>
<ul>
<li>Work visa applications to any country</li>
<li>Immigration and residency permits</li>
<li>International job placements</li>
<li>Professional licensure in foreign countries</li>
<li>Adoption and family reunification cases</li>
<li>Higher education in foreign institutions</li>
</ul>
<h4>Types of PCC We Handle:</h4>
<ul>
<li><strong>Regular PCC:</strong> For local police verification</li>
<li><strong>CBI PCC:</strong> For inter-state transfers or centralized check</li>
<li><strong>Passport Authority PCC:</strong> For passport applications</li>
<li>Attested and certified PCCs</li>
</ul>
<h4>Processing Timeline:</h4>
<p>PCC processing takes <strong>5-7 working days</strong> depending on the local police verification. We assist in all documentation and police coordination.</p>
<h4>Required Documents:</h4>
<ul>
<li>Birth certificate or age proof</li>
<li>Address proof (voter ID, utility bill, etc.)</li>
<li>Passport photocopy (if applicable)</li>
<li>Affidavit with residential history</li>
<li>Completed PCC application form</li>
</ul>
<h4>Our PCC Services Include:</h4>
<ul>
<li>Form filling and documentation preparation</li>
<li>Police verification coordination</li>
<li>Address proof arrangements</li>
<li>Notarization of documents</li>
<li>Attestation and certification</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Application Preparation',
                        'description' => 'Complete PCC application form with all required personal details.'
                    ],
                    [
                        'heading' => 'Document Submission',
                        'description' => 'Submit application and supporting documents to police station.'
                    ],
                    [
                        'heading' => 'Police Verification',
                        'description' => 'Local police conduct background check and criminal record verification.'
                    ],
                    [
                        'heading' => 'PCC Issuance',
                        'description' => 'Police issue the clearance certificate if no criminal record found.'
                    ],
                    [
                        'heading' => 'Attestation',
                        'description' => 'Notarize and attest the PCC for international use.'
                    ]
                ],
                'meta_title' => 'Police Clearance Certificate (PCC) | S K Document Centre',
                'meta_description' => 'Police Clearance Certificate services for work visas, immigration, and employment abroad.',
            ],
            [
                'title' => 'Commercial & Business Document Attestation',
                'slug' => 'commercial-document-attestation',
                'icon' => 'fas fa-briefcase',
                'short_description' => 'Professional attestation for business documents, company registrations, and commercial agreements.',
                'long_description' => '<h3>Commercial & Business Document Attestation</h3>
<p>Businesses expanding internationally require certified documentation of their commercial records. Our specialized attestation services ensure your business documents are recognized and accepted worldwide.</p>
<h4>Documents We Attest:</h4>
<ul>
<li><strong>Company Documents:</strong> Certificate of Incorporation, Articles of Association, Memorandum of Association</li>
<li><strong>Financial Records:</strong> Audited balance sheets, profit & loss statements, tax returns, bank statements</li>
<li><strong>Legal Documents:</strong> Power of Attorney, Board resolutions, Directors\' certificates</li>
<li><strong>Contracts:</strong> Commercial agreements, partnership deeds, joint venture agreements</li>
<li><strong>Certificates:</strong> ISO certification, quality compliance certificates, export licenses</li>
<li><strong>Trade Documents:</strong> Bills of lading, invoices, shipping documents</li>
</ul>
<h4>Business Uses:</h4>
<ul>
<li>International business partnerships and joint ventures</li>
<li>Cross-border transactions and contracts</li>
<li>Import-export compliance and documentation</li>
<li>Foreign investment and expansion</li>
<li>International office opening and branch operations</li>
</ul>
<h4>Processing Timeline:</h4>
<p>Commercial attestation typically takes <strong>5-10 working days</strong> depending on document complexity and country requirements.</p>
<h4>Our Commercial Expertise:</h4>
<ul>
<li>Specialized team with business documentation knowledge</li>
<li>Understanding of international commerce requirements</li>
<li>Multi-country attestation capabilities</li>
<li>Chamber of Commerce coordination</li>
<li>Industry-specific knowledge (IT, Manufacturing, Services, etc.)</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Review',
                        'description' => 'Review business documents for completeness and attestation requirements.'
                    ],
                    [
                        'heading' => 'Chamber of Commerce',
                        'description' => 'Obtain Chamber of Commerce attestation for commercial documents.'
                    ],
                    [
                        'heading' => 'Notary Attestation',
                        'description' => 'Notarize all business documents and legal agreements.'
                    ],
                    [
                        'heading' => 'MEA Attestation',
                        'description' => 'Obtain MEA attestation for international business documents.'
                    ],
                    [
                        'heading' => 'Embassy Attestation',
                        'description' => 'Final embassy attestation for the target business country.'
                    ]
                ],
                'meta_title' => 'Commercial Document Attestation | S K Document Centre',
                'meta_description' => 'Business and commercial document attestation for international expansion and global compliance.',
            ],
            [
                'title' => 'Affidavit & Legal Document Attestation',
                'slug' => 'affidavit-attestation',
                'icon' => 'fas fa-gavel',
                'short_description' => 'Attestation for affidavits, legal documents, and court-verified documentation.',
                'long_description' => '<h3>Affidavit & Legal Document Attestation</h3>
<p>Affidavits and legal documents often require notarization and attestation for international validity. Our legal expertise ensures all documentation is properly prepared and authenticated.</p>
<h4>Documents We Attest:</h4>
<ul>
<li>Affidavits (personal, statutory, specific purpose affidavits)</li>
<li>Court orders and judicial documents</li>
<li>Legal agreements and contracts</li>
<li>Wills and succession documents</li>
<li>Property deeds and title documents</li>
<li>Power of Attorney documents</li>
<li>Debt acknowledgment letters</li>
<li>Divorce decrees and family court orders</li>
</ul>
<h4>Why Legal Attestation Matters:</h4>
<ul>
<li>Ensures international legal validity</li>
<li>Required for immigration and residency applications</li>
<li>Needed for property transactions abroad</li>
<li>Essential for inheritance and succession</li>
<li>Supports custody and guardianship cases</li>
</ul>
<h4>Our Legal Attestation Process:</h4>
<ol>
<li>Document review and legal verification</li>
<li>Notarization by authorized notary public</li>
<li>HRD/Home Department attestation (if applicable)</li>
<li>MEA attestation for international use</li>
<li>Embassy attestation (if required for specific country)</li>
</ol>
<h4>Processing Timeline:</h4>
<p>Legal document attestation takes <strong>7-14 working days</strong> depending on the complexity and number of attestation levels required.</p>
<h4>Our Legal Expertise:</h4>
<ul>
<li>Coordination with law firms and legal professionals</li>
<li>Understanding of Indian legal procedures</li>
<li>Knowledge of international legal requirements</li>
<li>Experience with immigration law documents</li>
<li>Family law document specialization</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Legal Document Review',
                        'description' => 'Review affidavits and legal documents for completeness and legal validity.'
                    ],
                    [
                        'heading' => 'Notary Public Attestation',
                        'description' => 'Present documents to notary for signature verification and attestation.'
                    ],
                    [
                        'heading' => 'Court/Home Department',
                        'description' => 'Obtain court or home department attestation for legal documents.'
                    ],
                    [
                        'heading' => 'MEA Attestation',
                        'description' => 'Ministry of External Affairs attestation for international legal validity.'
                    ],
                    [
                        'heading' => 'Embassy Legalization',
                        'description' => 'Final embassy attestation for use in the destination country.'
                    ]
                ],
                'meta_title' => 'Affidavit & Legal Document Attestation | S K Document Centre',
                'meta_description' => 'Professional attestation for affidavits, legal agreements, and court documents.',
            ],
            [
                'title' => 'Medical & Health Certificate Attestation',
                'slug' => 'medical-certificate-attestation',
                'icon' => 'fas fa-hospital-user',
                'short_description' => 'Attestation for medical reports, health certificates, and fitness documents for international travel.',
                'long_description' => '<h3>Medical & Health Certificate Attestation</h3>
<p>Healthcare professionals and individuals relocating internationally often need medical documentation verified. We handle attestation of medical reports, health certificates, and medical fitness records.</p>
<h4>Documents We Attest:</h4>
<ul>
<li>Medical fitness certificates for work visas</li>
<li>Health reports and diagnostic tests</li>
<li>Vaccination certificates and immunization records</li>
<li>Disability certificates</li>
<li>Mental health reports (for immigration purposes)</li>
<li>Maternity and reproductive health certificates</li>
<li>Medical degree and certificates (for healthcare professionals)</li>
<li>Lab and pathology reports</li>
</ul>
<h4>When Medical Attestation is Required:</h4>
<ul>
<li>Work visa applications (especially healthcare jobs)</li>
<li>Insurance claims filed internationally</li>
<li>Medical tourism and treatment abroad</li>
<li>Healthcare professional registration in foreign countries</li>
<li>Adoption proceedings with medical requirements</li>
<li>Sports and athletic certifications</li>
</ul>
<h4>Processing Timeline:</h4>
<p>Medical certificate attestation takes <strong>3-5 working days</strong> once documents are received.</p>
<h4>Privacy & Confidentiality:</h4>
<ul>
<li>Strict confidentiality of all medical information</li>
<li>HIPAA and privacy law compliance</li>
<li>Secure document handling and storage</li>
<li>Limited disclosure to authorized parties only</li>
</ul>
<h4>Our Medical Attestation Benefits:</h4>
<ul>
<li>Understanding of international health standards</li>
<li>Knowledge of country-specific health requirements</li>
<li>Direct coordination with medical institutions</li>
<li>Fast-track processing for urgent cases</li>
<li>Confidentiality guarantee</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Medical Document Review',
                        'description' => 'Review medical certificates and reports for attestation requirements.'
                    ],
                    [
                        'heading' => 'Hospital/Clinic Verification',
                        'description' => 'Verify medical documents with issuing hospital or clinic if required.'
                    ],
                    [
                        'heading' => 'Notary Attestation',
                        'description' => 'Notarize medical certificates and health reports.'
                    ],
                    [
                        'heading' => 'MEA Attestation',
                        'description' => 'Obtain MEA attestation for international medical documents.'
                    ],
                    [
                        'heading' => 'Embassy Health Clearance',
                        'description' => 'Final embassy attestation for medical documents.'
                    ]
                ],
                'meta_title' => 'Medical Certificate Attestation | S K Document Centre',
                'meta_description' => 'Medical fitness and health certificate attestation for work visas and international travel.',
            ],
        ];

        foreach ($services as $index => $svc) {
            Service::updateOrCreate(
                ['slug' => $svc['slug']],
                array_merge($svc, [
                    'is_active' => true,
                    'sort_order' => $index,
                ])
            );
        }

        // ===== ATTESTATIONS (10+) =====
        $attestations = [
            [
                'title' => 'UAE Embassy Attestation',
                'country' => 'UAE',
                'slug' => 'uae-embassy-attestation',
                'icon' => 'fas fa-flag',
                'short_description' => 'Complete attestation for UAE employment, education, and personal documents through UAE Embassy in New Delhi.',
                'long_description' => '<h3>UAE Embassy Attestation Services</h3>
<p>The United Arab Emirates is one of the most popular destinations for Indian professionals. Our specialized UAE Embassy Attestation services ensure smooth visa and employment processing.</p>
<h4>Documents We Attest for UAE:</h4>
<ul>
<li>Educational certificates and degrees</li>
<li>Birth, death, and marriage certificates</li>
<li>Employment offer letters and experience certificates</li>
<li>Police Clearance Certificates</li>
<li>Medical fitness reports</li>
<li>Commercial and trade documents</li>
<li>Power of Attorney documents</li>
</ul>
<h4>Complete Attestation Chain for UAE:</h4>
<ol>
<li><strong>Notary Attestation:</strong> 1-2 days</li>
<li><strong>HRD Attestation:</strong> 5-7 days (for educational documents)</li>
<li><strong>MEA Attestation:</strong> 3-5 days</li>
<li><strong>UAE Embassy Attestation:</strong> 7-10 days</li>
</ol>
<h4>UAE Visa Types & Requirements:</h4>
<ul>
<li><strong>Employment Visa:</strong> Requires attested employment letter and educational documents</li>
<li><strong>Free Visa (Sponsorship):</strong> Employer provides but needs notarized documents</li>
<li><strong>Tourist Visa:</strong> Generally doesn\'t require attestation</li>
<li><strong>Investment Visa:</strong> Requires commercial and financial documents attestation</li>
<li><strong>Residence Visa:</strong> Complete document package with family certificates</li>
</ul>
<h4>Common Challenges & Our Solutions:</h4>
<table style="width:100%;border-collapse:collapse;">
<tr style="background:#f5f5f5;">
<td style="border:1px solid #ddd;padding:8px;"><strong>Challenge</strong></td>
<td style="border:1px solid #ddd;padding:8px;"><strong>Our Solution</strong></td>
</tr>
<tr>
<td style="border:1px solid #ddd;padding:8px;">Long processing times</td>
<td style="border:1px solid #ddd;padding:8px;">Express services available (7-10 days total)</td>
</tr>
<tr>
<td style="border:1px solid #ddd;padding:8px;">Document rejection</td>
<td style="border:1px solid #ddd;padding:8px;">Complete quality check before submission</td>
</tr>
<tr>
<td style="border:1px solid #ddd;padding:8px;">Missing documents</td>
<td style="border:1px solid #ddd;padding:8px;">Comprehensive document checklist provided</td>
</tr>
</table>
<h4>Why Choose Us for UAE Attestation:</h4>
<ul>
<li>Direct UAE Embassy relationships and contacts</li>
<li>Over 5000+ successful UAE attestations completed</li>
<li>Knowledge of latest UAE employment regulations</li>
<li>Express processing options</li>
<li>100% document rejection guarantee (we correct any issues)</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Preparation',
                        'description' => 'Gather all documents with proper notary, HRD, and MEA attestation.'
                    ],
                    [
                        'heading' => 'UAE Embassy Application',
                        'description' => 'Submit documents to UAE Embassy with covering letter and forms.'
                    ],
                    [
                        'heading' => 'Embassy Verification',
                        'description' => 'UAE Embassy officials verify document authenticity and previous attestations.'
                    ],
                    [
                        'heading' => 'Official Attestation',
                        'description' => 'UAE Embassy applies official stamp and signature for final authentication.'
                    ],
                    [
                        'heading' => 'Document Collection',
                        'description' => 'Collect fully attested documents ready for UAE visa processing.'
                    ]
                ],
                'meta_title' => 'UAE Embassy Attestation | S K Document Centre',
                'meta_description' => 'UAE embassy attestation for employment, education visas. Complete chain from notary to embassy.',
            ],
            [
                'title' => 'Saudi Arabia Embassy Attestation',
                'country' => 'Saudi Arabia',
                'slug' => 'saudi-arabia-embassy-attestation',
                'icon' => 'fas fa-mosque',
                'short_description' => 'Official Saudi Arabia Embassy attestation for all document types including educational and personal certificates.',
                'long_description' => '<h3>Saudi Arabia Embassy Attestation Services</h3>
<p>Saudi Arabia offers countless employment opportunities with competitive salaries. Our specialized Saudi Embassy Attestation ensures your documents meet all official requirements.</p>
<h4>Saudi Arabia Visa Types:</h4>
<ul>
<li><strong>Employment Visa:</strong> Requires attested educational, employment, and character documents</li>
<li><strong>Sponsorship Visa:</strong> Employer-sponsored with attested personal documents</li>
<li><strong>Business Visa:</strong> For entrepreneurs and business professionals</li>
<li><strong>Resident Visa:</strong> For settled employment with complete family paperwork</li>
<li><strong>Hajj/Umrah Visa:</strong> For religious pilgrimage (limited document requirements)</li>
</ul>
<h4>Documents We Attest:</h4>
<ul>
<li>Educational certificates (B.A., B.Tech, M.A., M.Tech, Diploma)</li>
<li>Professional certificates (CA, CS, CMA, ICWA)</li>
<li>Birth and marriage certificates</li>
<li>Police Clearance Certificates</li>
<li>Medical fitness reports</li>
<li>Employment offer letters and experience certificates</li>
<li>Commercial and business documents</li>
</ul>
<h4>Saudi Attestation Process (MOFA System):</h4>
<p>Saudi Arabia uses a special MOFA (Ministry of Foreign Affairs) system where documents are attested in India first (Notary → HRD → MEA) and then verified by the Saudi Embassy.</p>
<h4>Processing Timeline:</h4>
<ul>
<li>Standard processing: 10-15 working days</li>
<li>Express processing: 7-10 working days</li>
<li>Urgent processing: 5-7 working days (with additional cost)</li>
</ul>
<h4>Key Documentation Points:</h4>
<ul>
<li>All documents must be in English or Arabic</li>
<li>Arabic translations often required (we arrange certified translators)</li>
<li>Recent medical fitness report mandatory (not older than 3 months)</li>
<li>Clean Police Clearance Certificate essential</li>
<li>Educational documents must be original government-issued only</li>
</ul>
<h4>Our Saudi Arabia Expertise:</h4>
<ul>
<li>15+ years facilitating Saudi placements</li>
<li>Understanding of Saudi business culture and requirements</li>
<li>Direct relationships with Saudi Embassy contacts</li>
<li>Arabic translation coordination</li>
<li>Complete visa guidance and documentation support</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Preparation',
                        'description' => 'Prepare documents with proper notary, HRD, and MEA attestation.'
                    ],
                    [
                        'heading' => 'Arabic Translation',
                        'description' => 'Arrange certified Arabic translation for required documents.'
                    ],
                    [
                        'heading' => 'Saudi Embassy Submission',
                        'description' => 'Submit documents to Saudi Embassy with all required forms.'
                    ],
                    [
                        'heading' => 'Embassy Verification',
                        'description' => 'Saudi Embassy officials verify document authenticity.'
                    ],
                    [
                        'heading' => 'MOFA Attestation',
                        'description' => 'Obtain final MOFA attestation for Saudi visa processing.'
                    ]
                ],
                'meta_title' => 'Saudi Arabia Embassy Attestation | S K Document Centre',
                'meta_description' => 'Saudi Arabia embassy attestation for employment and visa processing. MOFA system experts.',
            ],
            [
                'title' => 'Qatar Embassy Attestation',
                'country' => 'Qatar',
                'slug' => 'qatar-embassy-attestation',
                'icon' => 'fas fa-flag',
                'short_description' => 'Qatar Embassy attestation services for employment and educational documents required for Qatar visa processing.',
                'long_description' => '<h3>Qatar Embassy Attestation Services</h3>
<p>Qatar is a rapidly developing nation with high-paying jobs and excellent career opportunities. Our Qatar Embassy Attestation services are specifically designed for the Qatari employment and business requirements.</p>
<h4>Documents We Attest for Qatar:</h4>
<ul>
<li>Educational certificates and academic transcripts</li>
<li>Professional certifications and licenses</li>
<li>Birth and marriage certificates</li>
<li>Police Clearance Certificates</li>
<li>Medical fitness documents</li>
<li>Employment letters and offer letters</li>
<li>Experience certificates and references</li>
<li>Business and commercial documents</li>
</ul>
<h4>Qatar Visa Categories:</h4>
<ul>
<li><strong>Work Visa:</strong> Requires employer sponsorship and attested documents</li>
<li><strong>Dependent Visa:</strong> For spouses and children (with marriage/birth certificate attestation)</li>
<li><strong>Investor Visa:</strong> For business owners and entrepreneurs</li>
<li><strong>Business Certificate:</strong> For short-term business visits</li>
</ul>
<h4>Processing Timeline for Qatar:</h4>
<p><strong>Standard:</strong> 8-12 working days | <strong>Express:</strong> 5-7 working days | <strong>Urgent:</strong> 3-5 working days</p>
<h4>Documentation Checklist:</h4>
<ul>
<li>✓ Original certificates and documents</li>
<li>✓ Notarization from authorized notary</li>
<li>✓ HRD attestation for educational documents</li>
<li>✓ MEA attestation for international use</li>
<li>✓ Qatar Embassy final verification</li>
<li>✓ English language documents (translation available)</li>
</ul>
<h4>Special Requirements for Qatar:</h4>
<ul>
<li>Medical examination certificate required (we guide you through the process)</li>
<li>Character reference letters (from previous employers or institutions)</li>
<li>Proof of financial stability and savings</li>
<li>Employment contract finalization before visa approval</li>
</ul>
<h4>Why Choose Us for Qatar Attestation:</h4>
<ul>
<li>Dedicated team specializing in Qatar placements</li>
<li>Knowledge of Qatar human resources requirements</li>
<li>Direct embassy coordination and follow-up</li>
<li>Experience with multiple visa categories</li>
<li>Express and urgent processing options available</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Collection',
                        'description' => 'Gather all original documents and certificates required for Qatar visa.'
                    ],
                    [
                        'heading' => 'Initial Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'Qatar Embassy Submission',
                        'description' => 'Submit attested documents to Qatar Embassy with visa application.'
                    ],
                    [
                        'heading' => 'Embassy Verification',
                        'description' => 'Qatar Embassy officials verify document authenticity and compliance.'
                    ],
                    [
                        'heading' => 'MOFA Attestation',
                        'description' => 'Obtain final MOFA attestation for Qatar visa processing.'
                    ]
                ],
                'meta_title' => 'Qatar Embassy Attestation | S K Document Centre',
                'meta_description' => 'Qatar embassy attestation for work visa, dependent visa, and business documents.',
            ],
            [
                'title' => 'Kuwait Embassy Attestation',
                'country' => 'Kuwait',
                'slug' => 'kuwait-embassy-attestation',
                'icon' => 'fas fa-flag',
                'short_description' => 'Kuwait Embassy attestation for all professional and educational documents required for Kuwait visas.',
                'long_description' => '<h3>Kuwait Embassy Attestation Services</h3>
<p>Kuwait offers lucrative job opportunities across multiple sectors. Our specialized Kuwait attestation services streamline your document processing for employment and residency visas.</p>
<h4>Kuwait Visa Types & Attestation Needs:</h4>
<ul>
<li><strong>Work Visa (Category A):</strong> Management and professional positions</li>
<li><strong>Work Visa (Category B):</strong> Skilled labor and technical positions</li>
<li><strong>Work Visa (Category C):</strong> Semi-skilled and general labor</li>
<li><strong>Family Visa:</strong> Spouses and dependent family members</li>
<li><strong>Business Visa:</strong> Self-employed and entrepreneurs</li>
</ul>
<h4>Documents We Attest:</h4>
<ul>
<li>Educational qualifications and degrees</li>
<li>Professional licenses and certifications</li>
<li>Birth, marriage, and divorce certificates</li>
<li>Police Clearance Certificates</li>
<li>Medical examination reports</li>
<li>Employment offer letters</li>
<li>Experience and reference letters</li>
<li>Salary certificates and financial documents</li>
</ul>
<h4>Complete Kuwait Attestation Process:</h4>
<ol>
<li><strong>Notary Attestation:</strong> 1-2 days</li>
<li><strong>HRD/Home Department Attestation:</strong> 5-7 days (for educational documents)</li>
<li><strong>MEA Attestation:</strong> 3-5 days</li>
<li><strong>Kuwait Embassy Attestation:</strong> 7-10 days</li>
</ol>
<h4>Timeline:</h4>
<p><strong>Regular:</strong> 15-20 working days | <strong>Express:</strong> 8-12 working days | <strong>Urgent:</strong> 5-7 working days</p>
<h4>Kuwait-Specific Requirements:</h4>
<ul>
<li>Medical examination at approved centers (we can guide you)</li>
<li>Language proficiency (for specific job categories)</li>
<li>Employment contract that meets Kuwait labor law standards</li>
<li>Salary expectations and cost of living considerations</li>
<li>Accommodation and sponsorship confirmation</li>
</ul>
<h4>Sectors with High Demand in Kuwait:</h4>
<ul>
<li>Healthcare and nursing</li>
<li>Oil and gas industries</li>
<li>Construction and engineering</li>
<li>Finance and banking</li>
<li>Information technology</li>
<li>Education and training</li>
</ul>
<h4>Why Choose Our Kuwait Attestation Services:</h4>
<ul>
<li>12+ years of successful Kuwait placements</li>
<li>Updated knowledge of Kuwait labor regulations</li>
<li>Direct Kuwait Embassy coordination</li>
<li>Strong network with Kuwaiti employers</li>
<li>Complete visa guidance and support</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Verification',
                        'description' => 'Verify all required documents and ensure they meet Kuwait visa standards.'
                    ],
                    [
                        'heading' => 'Initial Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'Medical Examination',
                        'description' => 'Complete medical examination at approved Kuwait centers.'
                    ],
                    [
                        'heading' => 'Kuwait Embassy Submission',
                        'description' => 'Submit attested documents to Kuwait Embassy with visa application.'
                    ],
                    [
                        'heading' => 'Embassy Attestation',
                        'description' => 'Obtain final Kuwait Embassy attestation for visa processing.'
                    ]
                ],
                'meta_title' => 'Kuwait Embassy Attestation | S K Document Centre',
                'meta_description' => 'Kuwait embassy attestation for work visas and professional employment opportunities.',
            ],
            [
                'title' => 'Oman Embassy Attestation',
                'country' => 'Oman',
                'slug' => 'oman-embassy-attestation',
                'icon' => 'fas fa-flag',
                'short_description' => 'Complete Oman Embassy attestation services for employment and residency documents for Oman visa.',
                'long_description' => '<h3>Oman Embassy Attestation Services</h3>
<p>Oman is steadily growing as an economic hub with emerging employment opportunities. Our Oman Embassy Attestation services ensure seamless visa processing for careers in Oman.</p>
<h4>Documents We Attest for Oman:</h4>
<ul>
<li>Educational certificates and academic records</li>
<li>Professional and technical certifications</li>
<li>Birth and marriage certificates</li>
<li>Police Clearance Certificates</li>
<li>Medical fitness reports</li>
<li>Employment and offer letters</li>
<li>Experience and work reference letters</li>
<li>Commercial and business documents</li>
</ul>
<h4>Oman Visa Categories:</h4>
<ul>
<li><strong>Work Permit:</strong> For employment in private and government sectors</li>
<li><strong>Residence Visa:</strong> For settled employment and family sponsorship</li>
<li><strong>Business Visa:</strong> For entrepreneurs and traders</li>
<li><strong>Tourist Visa:</strong> For temporary visits (limited attestation needed)</li>
</ul>
<h4>Processing Timeline:</h4>
<p><strong>Standard:</strong> 12-15 working days | <strong>Express:</strong> 7-10 working days</p>
<h4>Documentation Required:</h4>
<ul>
<li>Original certificates and documents</li>
<li>Full notarization chain completion</li>
<li>HRD attestation for educational documents</li>
<li>MEA attestation for international validity</li>
<li>Oman Embassy final verification</li>
<li>English or Arabic language documents</li>
</ul>
<h4>Key Points for Oman Employment:</h4>
<ul>
<li>Omanis are preferred for government jobs (sponsored jobs available for expatriates)</li>
<li>Various salary scales based on qualification and experience</li>
<li>Benefits include housing, healthcare, and insurance</li>
<li>Multiple sectors: oil, hospitality, healthcare, IT, manufacturing</li>
<li>Expatriate quota system (document authenticity crucial)</li>
</ul>
<h4>Our Oman Attestation Services Include:</h4>
<ul>
<li>Document verification and quality check</li>
<li>Complete notary to embassy chain processing</li>
<li>Arabic translation coordination (if required)</li>
<li>Fast-track processing options</li>
<li>Employment guidance and visa counseling</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Preparation',
                        'description' => 'Collect and prepare all required documents for Oman visa processing.'
                    ],
                    [
                        'heading' => 'Initial Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'Arabic Translation',
                        'description' => 'Arrange certified Arabic translation if required for documents.'
                    ],
                    [
                        'heading' => 'Oman Embassy Submission',
                        'description' => 'Submit attested documents to Oman Embassy with visa application.'
                    ],
                    [
                        'heading' => 'Embassy Attestation',
                        'description' => 'Obtain final Oman Embassy attestation for visa processing.'
                    ]
                ],
                'meta_title' => 'Oman Embassy Attestation | S K Document Centre',
                'meta_description' => 'Oman embassy attestation for work permits and employment visas. Fast processing available.',
            ],
            [
                'title' => 'Bahrain Embassy Attestation',
                'country' => 'Bahrain',
                'slug' => 'bahrain-embassy-attestation',
                'icon' => 'fas fa-flag',
                'short_description' => 'Official Bahrain Embassy attestation for employment, education, and personal documents for Bahrain visa.',
                'long_description' => '<h3>Bahrain Embassy Attestation Services</h3>
<p>Bahrain is a thriving financial hub with diverse employment opportunities. Our Bahrain Embassy Attestation ensures your documents meet all official requirements for visa processing.</p>
<h4>Documents We Attest for Bahrain:</h4>
<ul>
<li>Educational certificates and degrees</li>
<li>Professional and vocational certifications</li>
<li>Birth, marriage, and death certificates</li>
<li>Police Clearance Certificates</li>
<li>Medical examination reports</li>
<li>Employment offer letters and contracts</li>
<li>Experience certificates and references</li>
<li>Bank statements and financial documents</li>
<li>Commercial and business documents</li>
</ul>
<h4>Bahrain Visa Types:</h4>
<ul>
<li><strong>Employment Visa (Work Permit):</strong> For employed individuals</li>
<li><strong>Investor Visa:</strong> For business owners and entrepreneurs</li>
<li><strong>Family Visa:</strong> For spouse and dependent family members</li>
<li><strong>Project Visa:</strong> For contract-based employment</li>
<li><strong>Domestic Worker Visa:</strong> For household staff</li>
</ul>
<h4>Processing Timeline for Bahrain:</h4>
<p><strong>Standard:</strong> 10-14 working days | <strong>Express:</strong> 6-8 working days | <strong>Urgent:</strong> 3-5 working days</p>
<h4>Complete Attestation Chain:</h4>
<ol>
<li>Notary public attestation (1-2 days)</li>
<li>HRD/Department attestation (5-7 days)</li>
<li>MEA attestation (3-5 days)</li>
<li>Bahrain Embassy verification (7-10 days)</li>
</ol>
<h4>Prominent Employment Sectors in Bahrain:</h4>
<ul>
<li>Banking and financial services</li>
<li>Oil and gas refining</li>
<li>Hospitality and tourism</li>
<li>Healthcare and pharmaceutical</li>
<li>Information technology</li>
<li>Manufacturing and trading</li>
</ul>
<h4>Bahrain-Specific Considerations:</h4>
<ul>
<li>Bahrain has a well-developed financial sector with higher salaries</li>
<li>Best of Middle East benefits and work facilities</li>
<li>Strategic location for international business</li>
<li>Document authenticity is strictly verified</li>
<li>Medical examination mandatory (approved centers available)</li>
</ul>
<h4>Why Choose Us for Bahrain Attestation:</h4>
<ul>
<li>Specialized Bahrain visa expertise</li>
<li>Direct relationship with Bahrain Embassy officials</li>
<li>Knowledge of Bahrain labor and visa regulations</li>
<li>Express and urgent processing available</li>
<li>Complete employment and visa counseling</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Verification',
                        'description' => 'Verify all documents meet Bahrain visa requirements and standards.'
                    ],
                    [
                        'heading' => 'Initial Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'Medical Examination',
                        'description' => 'Complete mandatory medical examination at approved Bahrain centers.'
                    ],
                    [
                        'heading' => 'Bahrain Embassy Submission',
                        'description' => 'Submit attested documents to Bahrain Embassy with visa application.'
                    ],
                    [
                        'heading' => 'Embassy Attestation',
                        'description' => 'Obtain final Bahrain Embassy attestation for visa processing.'
                    ]
                ],
                'meta_title' => 'Bahrain Embassy Attestation | S K Document Centre',
                'meta_description' => 'Bahrain embassy attestation for work visas, employment, family visas.',
            ],
            [
                'title' => 'USA Visa Attestation & Travel Documents',
                'country' => 'USA',
                'slug' => 'usa-visa-attestation',
                'icon' => 'fas fa-flag-usa',
                'short_description' => 'Attestation for USA visa and travel document verification including educational and professional certificates.',
                'long_description' => '<h3>USA Visa Attestation & Travel Documents</h3>
<p>The USA is the world\'s largest economy with unlimited opportunities for professionals, students, and entrepreneurs. Our USA visa attestation services ensure your documents meet USCIS and embassy requirements.</p>
<h4>USA Visa Categories:</h4>
<ul>
<li><strong>H-1B Visa:</strong> For specialty occupation workers (IT, Engineering, Healthcare)</li>
<li><strong>L-1 Visa:</strong> For intra-company transferees</li>
<li><strong>O-1 Visa:</strong> For individuals with extraordinary ability</li>
<li><strong>F-1 Visa:</strong> For international students</li>
<li><strong>J-1 Visa:</strong> For exchange visitors and interns</li>
<li><strong>EB Green Card:</strong> For employment-based permanent residency</li>
<li><strong>Investor/EB-5:</strong> For business investors</li>
</ul>
<h4>Documents We Attest:</h4>
<ul>
<li>Educational degrees and transcripts</li>
<li>Professional qualifications and licenses</li>
<li>Birth and marriage certificates (for visa applicants)</li>
<li>Police clearance (FBI clearance equivalent)</li>
<li>Medical examination results (I-693 form)</li>
<li>Employment letters and experience certificates</li>
<li>Financial documents and bank statements</li>
<li>Tax returns (Individual and Business)</li>
<li>Proof of relationship documents (for family-based visas)</li>
</ul>
<h4>USA Visa Processing Timeline:</h4>
<p><strong>H-1B:</strong> 6-8 weeks | <strong>F-1 Student:</strong> 4-6 weeks | <strong>Green Card:</strong> Several months-years | <strong>Tourist/Business:</strong> 2-4 weeks</p>
<h4>Special Requirements for USA Visas:</h4>
<ul>
<li>USCIS Form I-134 (Affidavit of Support) - for dependent applicants</li>
<li>Medical examination with designated USCIS panel physicians</li>
<li>DS-160 (Online Nonimmigrant Visa Application)</li>
<li>Police certificates from all countries of residence</li>
<li>Translated documents (official certified translations required)</li>
</ul>
<h4>H-1B Work Visa Requirements:</h4>
<ul>
<li>Bachelor\'s degree minimum (in related field)</li>
<li>Job offer from US employer</li>
<li>Labor Condition Application (LCA) approval</li>
<li>Educational document attestation</li>
<li>Experience verification</li>
<li>Medical clearance</li>
</ul>
<h4>USA Student Visa (F-1) Requirements:</h4>
<ul>
<li>University admission letter</li>
<li>Educational background verification</li>
<li>Financial proof and bank statements</li>
<li>I-20 form from educational institution</li>
<li>SEVIS fee payment</li>
<li>Medical examination at approved clinic</li>
</ul>
<h4>Why Choose Us for USA Visa Assistance:</h4>
<ul>
<li>10+ years processing USA work and student visas</li>
<li>Knowledge of USCIS requirements and procedures</li>
<li>Direct experience with various visa categories</li>
<li>Coordination with US embassy officials</li>
<li>Medical examination clinic coordination</li>
<li>Translation service for official documents</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Preparation',
                        'description' => 'Gather and prepare all required documents for USA visa application.'
                    ],
                    [
                        'heading' => 'Initial Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'USCIS Medical Examination',
                        'description' => 'Complete medical examination at USCIS-approved panel physician.'
                    ],
                    [
                        'heading' => 'US Embassy Submission',
                        'description' => 'Submit attested documents to US Embassy with visa application.'
                    ],
                    [
                        'heading' => 'Visa Interview & Approval',
                        'description' => 'Attend visa interview and obtain final visa approval.'
                    ]
                ],
                'meta_title' => 'USA Visa Attestation & Travel Documents | S K Document Centre',
                'meta_description' => 'USA visa attestation for H-1B, F-1, student visas, and green card applications.',
            ],
            [
                'title' => 'UK Visa Attestation & Settlement Documents',
                'country' => 'UK',
                'slug' => 'uk-visa-attestation',
                'icon' => 'fas fa-flag',
                'short_description' => 'UK visa attestation for study, work, family settlement, and permanent residency documentation.',
                'long_description' => '<h3>UK Visa Attestation & Settlement Documents</h3>
<p>The United Kingdom attracts thousands of Indian professionals and students annually. Our UK visa attestation services handle all document requirements for successful visa processing.</p>
<h4>UK Visa Categories We Support:</h4>
<ul>
<li><strong>Skilled Worker Visa:</strong> For employment in skilled occupations</li>
<li><strong>Student Visa (Tier 4):</strong> For international students</li>
<li><strong>Family Settlement Visa:</strong> For family reunification</li>
<li><strong>Entrepreneur/Innovator Visa:</strong> For business owners</li>
<li><strong>Global Talent Visa:</strong> For leaders in their field</li>
<li><strong>Graduate Visa:</strong> Post-study work authorization</li>
<li><strong>UK Ancestry Visa:</strong> For Commonwealth citizens with UK ancestry</li>
<li><strong>Permanent Residency/Indefinite Leave to Remain:</strong> For long-term settlement</li>
</ul>
<h4>Documents We Attest for UK Visas:</h4>
<ul>
<li>Educational qualifications and certificates</li>
<li>Professional licenses and credentials</li>
<li>Birth, marriage, and relationship documents</li>
<li>Police clearance certificates</li>
<li>Medical examination results (TB test for India)</li>
<li>Employment letters and salary proof</li>
<li>Bank statements and financial documents</li>
<li>Tenancy agreements and accommodation proof</li>
<li>Divorce decrees and custody documents (if applicable)</li>
</ul>
<h4>Processing Timeline:</h4>
<p><strong>Skilled Worker Visa:</strong> 1-3 months | <strong>Student Visa:</strong> 3-4 weeks | <strong>Family Visa:</strong> 6 weeks - 4 months | <strong>Settlement:</strong> 6+ months</p>
<h4>Points-Based System (Skilled Worker Visa):</h4>
<p>The UK uses a points-based immigration system. Required points include:</p>
<ul>
<li>Sponsorship by an approved employer (20 points)</li>
<li>Appropriate salary level (20 points)</li>
<li>English language proficiency (10 points)</li>
<li>Maintenance of funds (10 points)</li>
</ul>
<h4>Student Visa Requirements:</h4>
<ul>
<li>Unconditional university offer letter</li>
<li>CAS (Confirmation of Acceptance for Studies)</li>
<li>Educational background verification</li>
<li>Financial proof (tuition + living expenses)</li>
<li>English language qualification (IELTS/TOEFL)</li>
<li>TB test certificate (for Indian nationals)</li>
</ul>
<h4>Family Settlement Visa Requirements:</h4>
<ul>
<li>Relationship proof documents</li>
<li>Sponsor\'s financial proof</li>
<li>Accommodation proof in UK</li>
<li>Police clearance certificates</li>
<li>Medical examination</li>
<li>Birth certificates of dependent children</li>
</ul>
<h4>Why Choose Us for UK Visa Services:</h4>
<ul>
<li>12+ years UK visa expertise</li>
<li>Knowledge of latest immigration rules and updates</li>
<li>Direct coordination with UK embassy and UKVI</li>
<li>Experience with multiple visa categories</li>
<li>TB test center coordination in Delhi</li>
<li>Translation services in required languages</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Collection',
                        'description' => 'Gather all required documents including educational certificates and police clearance.'
                    ],
                    [
                        'heading' => 'Initial Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'TB Test & Medical',
                        'description' => 'Complete mandatory TB test and medical examination at approved centers.'
                    ],
                    [
                        'heading' => 'UK Embassy Submission',
                        'description' => 'Submit attested documents to UK Embassy with visa application.'
                    ],
                    [
                        'heading' => 'Visa Approval',
                        'description' => 'Obtain final UK visa approval and biometric enrollment.'
                    ]
                ],
                'meta_title' => 'UK Visa Attestation & Immigration Documents | S K Document Centre',
                'meta_description' => 'UK visa attestation for skilled work, student visas, family settlement, and permanent residency.',
            ],
            [
                'title' => 'Canada Visa Attestation & Immigration',
                'country' => 'Canada',
                'slug' => 'canada-visa-attestation',
                'icon' => 'fas fa-maple-leaf',
                'short_description' => 'Canada visa and immigration document attestation for work permits, student visas, and permanent residency.',
                'long_description' => '<h3>Canada Visa Attestation & Immigration Services</h3>
<p>Canada welcomes skilled professionals and international students through multiple immigration pathways. Our Canada visa attestation services streamline document processing for all visa categories.</p>
<h4>Canada Immigration Programs:</h4>
<ul>
<li><strong>Express Entry (Skilled Immigration):</strong> Fast-tracked professional immigration</li>
<li><strong>Federal Skilled Worker Program (FSWP):</strong> For high-skill occupations</li>
<li><strong>Federal Skilled Trades Program (FSTP):</strong> For skilled trades workers</li>
<li><strong>Canadian Experience Class (CEC):</strong> For those with Canadian work experience</li>
<li><strong>Work Permit:</strong> Temporary work authorization</li>
<li><strong>Student Visa (Study Permit):</strong> For international students</li>
<li><strong>Family Sponsorship:</strong> For family reunification</li>
<li><strong>Provincial Nominee Program (PNP):</strong> Provincial-level immigration</li>
</ul>
<h4>Documents We Attest:</h4>
<ul>
<li>Educational diplomas and degrees</li>
<li>Language proficiency test results (IELTS/TOEFL/CELPIP)</li>
<li>Work experience letters and employment records</li>
<li>Educational transcripts and course descriptions</li>
<li>Birth and marriage certificates</li>
<li>Police clearance certificates</li>
<li>Medical examination results (IRCC approved doctors)</li>
<li>Financial documents and bank statements</li>
<li>Tax returns and employment records</li>
<li>Educational credential assessment (ECA) documents</li>
</ul>
<h4>Express Entry Processing Timeline:</h4>
<p><strong>Processing Time:</strong> 6 months from application to decision | <strong>Invite to Apply Window:</strong> Every 2 weeks</p>
<h4>Express Entry Points System (CRS - Comprehensive Ranking System):</h4>
<ul>
<li>Age (up to 500 points)</li>
<li>Language proficiency (up to 500 points)</li>
<li>Education (up to 500 points)</li>
<li>Work experience (up to 500 points)</li>
<li>Provincial nomination (600 points - highest priority)</li>
</ul>
<h4>Student Visa (Study Permit) Requirements:</h4>
<ul>
<li>Unconditional acceptance letter from Canadian institution</li>
<li>Proof of financial support (tuition + living expenses)</li>
<li>Educational transcripts and certificates</li>
<li>Language proficiency (if applicable)</li>
<li>Medical examination (if required)</li>
<li>Police clearance (for some applicants)</li>
<li>Purpose of visit letter</li>
</ul>
<h4>Educational Credential Assessment (ECA) Information:</h4>
<p>For Express Entry applications, foreign education credentials must be assessed by approved organizations like WES, ICES, or NACES.</p>
<h4>Language Proficiency Requirements:</h4>
<uint>
<li>IELTS for English (minimum CLB 7 for most programs)</li>
<li>CELPIP as alternative English test</li>
<li>TCF/TEF for French proficiency</li>
</ul>
<h4>Why Choose Us for Canada Immigration:</h4>
<ul>
<li>15+ years facilitating Canadian immigration</li>
<li>Knowledge of recent immigration policy changes</li>
<li>Help with Express Entry profile creation and optimization</li>
<li>ECA preparation and submission support</li>
<li>Medical examination clinic coordination</li>
<li>Language test center guidance</li>
<li>First-hand experience with all visa categories</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Document Assessment',
                        'description' => 'Evaluate all documents and prepare for ECA if required for Express Entry.'
                    ],
                    [
                        'heading' => 'Initial Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'Medical & Police Clearance',
                        'description' => 'Complete IRCC-approved medical examination and police clearance.'
                    ],
                    [
                        'heading' => 'Express Entry Application',
                        'description' => 'Create Express Entry profile and submit application when invited.'
                    ],
                    [
                        'heading' => 'Visa Approval',
                        'description' => 'Obtain final visa approval and permanent residency.'
                    ]
                ],
                'meta_title' => 'Canada Visa Attestation & Immigration | S K Document Centre',
                'meta_description' => 'Canada immigration attestation for Express Entry, work permits, student visas, and provincial sponsorship.',
            ],
            [
                'title' => 'Australia Visa Attestation & Skilled Migration',
                'country' => 'Australia',
                'slug' => 'australia-visa-attestation',
                'icon' => 'fas fa-flag',
                'short_description' => 'Australia visa attestation for skilled migration, student visas, and permanent residency applications.',
                'long_description' => '<h3>Australia Visa Attestation & Skilled Migration</h3>
<p>Australia actively seeks skilled professionals and international students to support its growing economy. Our Australia visa attestation services handle all document requirements for visa processing.</p>
<h4>Australia Visa Categories:</h4>
<ul>
<li><strong>Skilled Independent Visa (Subclass 189):</strong> For skilled professionals without sponsor</li>
<li><strong>Skilled Sponsored Visa (Subclass 190):</strong> For state-sponsored skilled professionals</li>
<li><strong>Regional Sponsored Visa (Subclass 191):</strong> For regional area sponsorship</li>
<li><strong>Temporary Skill Shortage Visa (Subclass 482):</strong> For temporary work</li>
<li><strong>Skilled Trades Visa (Subclass 476):</strong> For recent graduates in skilled trades</li>
<li><strong>Student Visa (Subclass 500):</strong> For international students</li>
<li><strong>Partner Visa:</strong> For spouse of Australian citizen/PR</li>
<li><strong>Parent Visa:</strong> For sponsorship of parents</li>
</ul>
<h4>Documents We Attest for Australia:</h4>
<ul>
<li>Educational qualifications and transcripts</li>
<li>Professional licenses and certifications</li>
<li>Birth and marriage certificates</li>
<li>Police clearance certificates</li>
<li>Medical examination results (IMMI panel doctors)</li>
<li>Character assessment documents</li>
<li>Employment references and experience letters</li>
<li>Bank statements and financial documents</li>
<li>Tax returns and payslips</li>
<li>Australian skills assessment documents</li>
</ul>
<h4>Points-Based System (SkillSelect):</h4>
<p>Australia uses SkillSelect for skilled migration with required points including:</p>
<ul>
<li>Age (up to 45 points)</li>
<li>English language proficiency (up to 20 points)</li>
<li>Work experience (up to 20 points)</li>
<li>Australian work experience (up to 20 points)</li>
<li>Educational qualifications (up to 20 points)</li>
<li>Professional year (up to 5 points)</li>
<li>State sponsorship (5 points)</li>
</ul>
<h4>Australian Skills Assessment:</h4>
<ul>
<li>Required for all skilled migration visa applications</li>
<li>Conducted by professional bodies (Engineers Australia, ACS for IT, etc.)</li>
<li>Educational qualification verification</li>
<li>Work experience validation</li>
<li>English language requirement: IELTS (minimum 6.0 band score)</li>
</ul>
<h4>Student Visa (Subclass 500) Requirements:</h4>
<ul>
<li>Unconditional offer from Australian educational institution</li>
<li>Proof of financial capacity (tuition + living expenses)</li>
<li>English language proficiency (IELTS minimum 5.5)</li>
<li>Educational transcripts and certificates</li>
<li>Health insurance requirement (OSHC)</li>
<li>Medical examination (if required)</li>
</ul>
<h4>Occupations in Demand in Australia:</h4>
<ul>
<li>IT and Software professionals</li>
<li>Engineers (Mechanical, Civil, Electrical)</li>
<li>Healthcare professionals (Nurses, Doctors)</li>
<li>Accounting and Finance professionals</li>
<li>Tradespeople and skilled workers</li>
<li>Project managers and business analysts</li>
</ul>
<h4>Processing Timeline:</h4>
<p><strong>Skilled Independent Visa:</strong> 8-13 months | <strong>Skilled Sponsored Visa:</strong> 8-12 months | <strong>Student Visa:</strong> 2-4 weeks</p>
<h4>Why Choose Us for Australia Immigration:</h4>
<ul>
<li>14+ years assisting with Australian skilled migration</li>
<li>Knowledge of occupation lists (MLTSSL and other SOLs)</li>
<li>Skills assessment preparation and coordination</li>
<li>State sponsorship guidance for various states</li>
<li>Medical examination clinic coordination</li>
<li>English test center assistance (IELTS)</li>
<li>Comprehensive visa strategy and planning</li>
</ul>',
                'steps' => [
                    [
                        'heading' => 'Skills Assessment',
                        'description' => 'Complete skills assessment through relevant Australian professional bodies.'
                    ],
                    [
                        'heading' => 'Document Attestation',
                        'description' => 'Complete notary, HRD, and MEA attestation process.'
                    ],
                    [
                        'heading' => 'Medical & Police Check',
                        'description' => 'Complete IMMI-approved medical examination and police clearance.'
                    ],
                    [
                        'heading' => 'Expression of Interest',
                        'description' => 'Submit Expression of Interest through SkillSelect system.'
                    ],
                    [
                        'heading' => 'Visa Grant',
                        'description' => 'Receive visa grant and permanent residency approval.'
                    ]
                ],
                'meta_title' => 'Australia Visa Attestation & Skilled Migration | S K Document Centre',
                'meta_description' => 'Australia skilled migration attestation for independent, sponsored, and state-sponsored visas.',
            ],
        ];

        foreach ($attestations as $index => $att) {
            Attestation::updateOrCreate(
                ['slug' => $att['slug']],
                array_merge($att, [
                    'is_active' => true,
                    'sort_order' => $index,
                ])
            );
        }

        // ===== SERVICE FAQs =====
        $serviceFaqs = [
            ['question' => 'How long does notary attestation take?', 'answer' => '<p>Notary attestation is usually completed within <strong>1-2 working days</strong>. Same-day services are available for urgent requirements at nominal additional cost.</p>'],
            ['question' => 'What is the difference between Apostille and Embassy Attestation?', 'answer' => '<p><strong>Apostille:</strong> Recognized by 150+ countries under Hague Convention. Faster (1-3 days) and cheaper. Direct government certification.</p><p><strong>Embassy Attestation:</strong> Required for non-Hague countries. Takes 7-15 days. Embassy verifies document authenticity after MEA.</p>'],
            ['question' => 'Can I apply for attestation online?', 'answer' => '<p>Yes! You can submit documents through email or our website. We offer doorstep pickup and delivery services. However, personal visit to our office on C-260, Ground Floor, New Ashok Nagar is sometimes required for verification.</p>'],
            ['question' => 'What is HRD Attestation?', 'answer' => '<p>HRD (Human Resource Department) Attestation verifies the authenticity of educational certificates issued by government or private institutions. It\'s mandatory for applying to foreign universities or employment abroad.</p>'],
            ['question' => 'How much does MEA attestation cost?', 'answer' => '<p>MEA attestation charges vary by document type and quantity. Educational certificates typically cost ₹500-1000. Please contact us for specific pricing based on your requirements.</p>'],
            ['question' => 'Can you arrange Police Clearance Certificate?', 'answer' => '<p>Yes! We handle complete PCC processing from form submission to police verification coordination. We guide clients through the entire process and ensure timely completion.</p>'],
            ['question' => 'Do you offer same-day attestation services?', 'answer' => '<p>We offer expedited services for certain document types. Notary same-day processing is available. For other services, express processing (5-7 days) can be arranged at additional cost.</p>'],
            ['question' => 'What languages are available for translation?', 'answer' => '<p>We provide certified translation in 50+ languages including English, French, German, Arabic, Chinese, Japanese, Spanish, and all Indian regional languages.</p>'],
            ['question' => 'Is your attestation service recognized internationally?', 'answer' => '<p>Yes! All our attestations are government-authorized and follow the official chain (Notary → HRD/Department → MEA → Embassy). They are accepted by embassies and institutions worldwide.</p>'],
            ['question' => 'How do I track my document status?', 'answer' => '<p>You can track your documents through our website or contact your assigned relationship manager. We provide regular updates via email and SMS throughout the attestation process.</p>'],
        ];

        foreach ($serviceFaqs as $index => $faq) {
            $existingFaq = Faq::where('question', $faq['question'])->first();
            if (!$existingFaq) {
                Faq::create(array_merge($faq, ['sort_order' => $index, 'is_active' => true]));
            }
        }

        // ===== ATTESTATION-SPECIFIC FAQs =====
        $attestationFaqs = [
            ['question' => 'What is the minimum processing time for UAE attestation?', 'answer' => '<p>Complete UAE attestation chain typically takes <strong>15-20 working days</strong> from notary to embassy. We offer express processing in 8-12 days with additional charges.</p>'],
            ['question' => 'Do I need MOFA attestation for Gulf countries?', 'answer' => '<p>MOFA (Ministry of Foreign Affairs) attestation is specifically an additional step conducted by the respective Gulf country\'s Ministry after MEA attestation. The process varies by country. Our team guides you on specific requirements.</p>'],
            ['question' => 'Can you attest documents for all Gulf countries?', 'answer' => '<p>Yes! We handle attestation for UAE, Saudi Arabia, Qatar, Kuwait, Bahrain, and Oman. Each country has specific requirements which our specialized teams manage.</p>'],
            ['question' => 'What documents are required for Saudi Arabia employment visa?', 'answer' => '<p>Required documents include: Educational certificates, employment offer letter, police clearance, medical fitness report, birth/marriage certificate, and passport copies. We guide you through the complete list and ensure proper attestation.</p>'],
            ['question' => 'How much does a complete attestation cost?', 'answer' => '<p>Costs vary by document type and country. A typical educational certificate attestation for Gulf countries costs ₹2500-4500 depending on attestation chain required. Contact us for specific pricing.</p>'],
            ['question' => 'Can you arrange Arabic translation for Saudi Arabia?', 'answer' => '<p>Yes! We arrange certified Arabic translation for Australian, Saudi, and Qatari visa applications. Certified translators handle all documentation with government recognition.</p>'],
            ['question' => 'What if my document is rejected by the embassy?', 'answer' => '<p>We guarantee 100% document acceptance. If rejected, we identify the issue and resubmit free of charge. Our quality verification prevents any rejections.</p>'],
            ['question' => 'Can I apply for multiple countries\' attestation simultaneously?', 'answer' => '<p>Yes! You can apply for multiple countries\' attestation at once. We handle parallel processing for different embassies, which can be cost and time-effective.</p>'],
            ['question' => 'What is the USA H-1B visa attestation process?', 'answer' => '<p>For USA H-1B visas, you need education verification (apostille), employment letter attestation, medical examination, and background clearance. The complete process takes 6-8 weeks including US employer processing.</p>'],
            ['question' => 'Can you help with Canada/Australia skilled migration?', 'answer' => '<p>Yes! We assist with credential assessment preparation, document verification for Express Entry (Canada) and SkillSelect (Australia), language test guidance, and medical examination coordination.</p>'],
        ];

        foreach ($attestationFaqs as $index => $faq) {
            $existingFaq = Faq::where('question', $faq['question'])->first();
            if (!$existingFaq) {
                Faq::create(array_merge($faq, ['sort_order' => $index + 10, 'is_active' => true]));
            }
        }
    }
}
