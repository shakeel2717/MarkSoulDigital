@extends('layout.app')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="landing/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Terms and Conditions</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Terms and Conditions</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="blog-bg-1 space-top space-extra-bottom">
    <div class="container">
        <p>
            Welcome to MarkSoulDigital ("we," "our," or "us"). Please read these Terms and Conditions carefully before
            using our website, MarkSoulDigital.com ("the Website"). By accessing or using our Website, you agree to
            comply with and be bound by these Terms and Conditions. If you do not agree with any part of these terms,
            please refrain from using our Website.
        </p>
        <h2>1. Eligibility</h2>
        <p>
            You must be at least 18 years old and legally capable of forming a binding contract to use our Website. If
            you are accessing our Website on behalf of a company or other legal entity, you represent that you have the
            authority to bind such entity to these Terms and Conditions.
        </p>

        <h2>2. Account Registration</h2>
        <p>
            To access certain features on our Website, you may need to create an account. You are responsible for
            maintaining the confidentiality of your account credentials and all activities that occur under your
            account. You agree to notify us immediately of any unauthorized use of your account or any other security
            breach.
        </p>

        <h2>3. Intellectual Property</h2>
        <p>
            All content and materials on our Website, including but not limited to text, graphics, logos, images,
            videos, and software, are the property of MarkSoulDigital or its licensors and are protected by copyright,
            trademark, and other intellectual property laws. You may not use, reproduce, distribute, or modify any
            content from our Website without our prior written consent.
        </p>

        <h2>4. Prohibited Activities</h2>
        <p>
            You agree not to engage in the following activities while using our Website:
        <ul>
            <li>Violating any applicable laws, regulations, or third-party rights.</li>
            <li>Using our Website for any unlawful or fraudulent purposes.</li>
            <li>Impersonating another person or entity.</li>
            <li>Interfering with or disrupting the security or functionality of our Website.</li>
            <li>Uploading, transmitting, or distributing any harmful or malicious content.</li>
        </ul>
        </p>

        <h2>5. Third-Party Links</h2>
        <p>
            Our Website may contain links to third-party websites or services that are not owned or controlled by
            MarkSoulDigital. We do not endorse or assume any responsibility for the content or practices of these
            third-party websites. Your interactions with such websites are at your own risk, and you should review their
            respective terms and privacy policies.
        </p>

        <h2>6. Financial Disclaimer</h2>
        <p>
            Trading in the forex market involves significant risks, and past performance is not indicative of future
            results. The information and materials provided on our Website are for educational and informational
            purposes only and should not be considered as financial advice. You should consult with a qualified
            financial advisor before making any investment decisions.
        </p>

        <h2>7. Limitation of Liability</h2>
        <p>
            To the fullest extent permitted by law, MarkSoulDigital and its affiliates shall not be liable for any
            direct, indirect, incidental, consequential, or punitive damages arising out of or related to the use of our
            Website. Your use of the Website is at your sole risk.
        </p>

        <h2>8. Indemnification</h2>
        <p>
            You agree to indemnify, defend, and hold harmless MarkSoulDigital and its officers, directors, employees,
            and affiliates from any claims, damages, liabilities, and expenses, including attorney fees, arising from
            your use of our Website or violation of these Terms and Conditions.
        </p>

        <h2>9. Modification of Terms</h2>
        <p>
            MarkSoulDigital reserves the right to modify or update these Terms and Conditions at any time without prior
            notice. The updated version will be posted on our Website, and your continued use of the Website after such
            changes constitutes your acceptance of the updated Terms and Conditions.
        </p>

        <h2>10. Termination</h2>
        <p>
            We may, at our sole discretion, terminate or suspend your access to our Website without prior notice for any
            reason, including violation of these Terms and Conditions.
        </p>

        <h2>11. Governing Law and Jurisdiction</h2>
        <p>
            These Terms and Conditions shall be governed by and construed in accordance with the laws of [Your
            Jurisdiction]. Any disputes arising out of or in connection with these Terms and Conditions shall be subject
            to the exclusive jurisdiction of the courts.
        </p>

        <h2>9. Contact Us</h2>
        <p>
            If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please
            contact us via:
            <br>
            Email: info@marksouldigital.com
            <br>
            Postal Address: {{env('APP_ADDRESS')}}
            <br>
            We value your privacy and strive to address any inquiries promptly and transparently.
            <br>
            Thank you for reviewing our Terms and Conditions. By using our Website, you agree to be bound by these terms
            and comply with all applicable laws and regulations.
        </p>
    </div>
</section>
@endsection