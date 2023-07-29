@extends('layout.app')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="landing/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Privacy Policy</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="blog-bg-1 space-top space-extra-bottom">
    <div class="container">
        <p>
            At MarkSoulDigital ("we," "our," or "us"), we are committed to protecting your privacy and ensuring the
            security of your personal information. This Privacy Policy outlines how we collect, use, share, and
            safeguard the data provided by you when accessing our website, MarkSoulDigital.com ("the Website"). By using
            our Website, you consent to the practices described in this policy.
        </p>
        <h2>1. Information We Collect</h2>
        <p>
            We collect various types of information when you interact with our Website, including:
        </p>

        <h2>a. Personal Information:</h2>
        <p>
            Your name, email address, and contact information when you sign up for an account or subscribe to our
            newsletter.
            Financial information, such as payment details, when you engage in transactions on our platform.
        </p>

        <h2>b. Usage Information:</h2>
        <p>
            Technical information, including IP addresses, browser details, device information, and pages visited,
            collected through cookies and similar technologies to enhance user experience and analyze Website usage.
        </p>

        <h2>c. Communication Data:</h2>
        <p>
            Records of your interactions with us, including emails and live chat conversations.
        </p>

        <h2>2. How We Use Your Information</h2>
        <p>
            We use the collected information for the following purposes:<br>

            To create and manage your account and process transactions. <br>
            To communicate with you regarding your account, updates, promotions, and newsletters.<br>
            To improve our Website's functionality, content, and user experience.<br>
            To personalize your interactions with our Website based on your preferences.<br>
            To analyze and monitor Website usage, trends, and performance.
        </p>

        <h2>3. Cookies and Similar Technologies</h2>
        <p>
            We use cookies and similar technologies to enhance your browsing experience on our Website. Cookies are
            small text files stored on your device when you visit our Website. They help us recognize your preferences,
            remember your login details, and analyze user behavior. You can manage cookie preferences through your
            browser settings, but disabling cookies may affect certain functionalities on our Website.
        </p>

        <h2>4. How We Protect Your Information</h2>
        <p>
            We implement industry-standard security measures to protect your personal information from unauthorized
            access, alteration, or disclosure. Our Website uses encryption (HTTPS) to secure data transmission.
        </p>

        <h2>5. Sharing Your Information</h2>
        <p>
            We may share your information with trusted third-party service providers who assist us in operating our
            Website and providing services to you. These third parties are bound by confidentiality agreements and are
            prohibited from using your information for purposes other than those specified by us. <br>
            We may also disclose your information to comply with legal obligations, enforce our Terms & Conditions, or
            protect our rights, property, or safety.
        </p>

        <h2>6. Children's Privacy</h2>
        <p>
            Our Website is not intended for use by individuals under the age of 18. We do not knowingly collect personal
            information from children. If you believe we have unknowingly collected information from a child, please
            contact us immediately, and we will take appropriate steps to remove such data from our records.
        </p>

        <h2>7. Your Rights</h2>
        <p>
            You have the right to access, correct, update, or delete your personal information held by us. You may also
            withdraw your consent to process your information, object to its processing, or request data portability. To
            exercise these rights or raise concerns about data handling, please contact us using the information
            provided in the "Contact Us" section below.
        </p>

        <h2>8. Changes to this Privacy Policy</h2>
        <p>
            We may update this Privacy Policy periodically to reflect changes in our practices and services. The updated
            policy will be posted on our Website, and the "Last Updated" date will be revised accordingly. We encourage
            you to review this policy regularly for any updates.
        </p>

        <h2>9. Contact Us</h2>
        <p>
            If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please
            contact us via:
            <br>
            Email: privacy@marksouldigital.com
            <br>
            Postal Address: {{env('APP_ADDRESS')}}
            <br>
            We value your privacy and strive to address any inquiries promptly and transparently.
            <br>
            Thank you for entrusting MarkSoulDigital with your information.


        </p>

    </div>
</section>
@endsection