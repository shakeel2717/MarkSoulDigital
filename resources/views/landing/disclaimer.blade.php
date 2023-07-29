@extends('layout.app')
@section('content')
    <div class="breadcumb-wrapper " data-bg-src="landing/img/bg/header-bg-1-1.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Disclaimer</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Disclaimer</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-bg-1 space-top space-extra-bottom">
        <div class="container">
            <p>
                The information provided on MarkSoulDigital's website (the "Website") is for educational and informational
                purposes only and should not be considered as financial, investment, or trading advice. By accessing or
                using our Website, you acknowledge and agree to the following disclaimers:
            </p>
            <h2>1. No Financial Advice</h2>
            <p>
                MarkSoulDigital does not provide financial, investment, or trading advice. The content and materials on our
                Website are not intended to offer personalized financial recommendations or investment strategies. Trading
                in the forex market involves significant risks, and the information provided should not be construed as a
                substitute for professional financial advice. You should consult with a qualified financial advisor before
                making any investment decisions.
            </p>

            <h2>2. Risk of Trading</h2>
            <p>
                Trading in the forex market involves substantial risks and may not be suitable for everyone. Past
                performance is not indicative of future results, and no representation is made that any account will or is
                likely to achieve profits or losses similar to those discussed on our Website. The potential for profits is
                accompanied by an equal potential for losses, and you should not invest money that you cannot afford to
                lose.
            </p>

            <h2>3. Market Fluctuations</h2>
            <p>
                The forex market is highly volatile and subject to rapid and unpredictable fluctuations. The prices of
                currency pairs can be influenced by various factors, including economic indicators, geopolitical events, and
                market sentiment. MarkSoulDigital does not guarantee the accuracy or timeliness of the information provided
                on our Website, and we are not responsible for any losses resulting from market fluctuations.
            </p>

            <h2>4. Expert Traders</h2>
            <p>
                MarkSoulDigital may collaborate with expert traders who provide their insights and strategies. However, the
                performance and results of these expert traders are not guaranteed. Trading outcomes may vary based on
                individual strategies, market conditions, and other factors beyond our control.
            </p>

            <h2>5. Third-Party Content</h2>
            <p>
                Our Website may contain links to third-party websites or resources for additional information.
                MarkSoulDigital does not endorse or assume any responsibility for the content, accuracy, or practices of
                these third-party websites. Your interactions with such websites are at your own risk.
            </p>

            <h2>6. Technical Issues</h2>
            <p>
                While we strive to maintain the availability and functionality of our Website, MarkSoulDigital does not
                guarantee that the Website will be uninterrupted, error-free, or free from technical issues. We are not
                liable for any disruptions, delays, or data loss that may occur during your use of our Website.
            </p>

            <h2>7. Indemnification</h2>
            <p>
                By using our Website, you agree to indemnify and hold harmless MarkSoulDigital and its officers, directors,
                employees, and affiliates from any claims, damages, liabilities, and expenses, including attorney fees,
                arising from your use of the Website or reliance on the information provided.
            </p>

            <h2>8. Changes to the Disclaimer</h2>
            <p>
                MarkSoulDigital reserves the right to modify or update this Disclaimer at any time without prior notice. The
                updated version will be posted on our Website, and your continued use of the Website after such changes
                constitutes your acceptance of the updated Disclaimer.
            </p>

            <h2>9. Contact Us</h2>
            <p>
                If you have any questions, concerns, or inquiries regarding this Disclaimer, please contact us via:
                <br>
                Email: info@marksouldigital.com
                <br>
                Postal Address: {{ env('APP_ADDRESS') }}
                <br>
                We value your privacy and strive to address any inquiries promptly and transparently.
                <br>
                Thank you for reviewing our Disclaimer. Please carefully read and understand these disclaimers before using
                our Website. By using our Website, you acknowledge and accept these disclaimers and agree to be bound by all
                applicable laws and regulations.
            </p>
        </div>
    </section>
@endsection
