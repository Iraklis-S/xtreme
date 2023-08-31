@extends('layout.header-footer')

@section('css')
<link rel="stylesheet" href="{{ asset('project/css/about.css') }}">
@endsection



@section('body-content')



    <h1>INVEST IN THE FUTURE !</h1>
    
    
    
    <div class="container2">
      <div class="eleMent1">200kUsers Trusted US</div>
      <div class="eleMent2">2Mio.$ in Trading Volume Daily</div>
    </div>
    

<div class="about-section">
    <h2>ABOUT US </h2>
    <div class="about" id="about">
        <p>Welcome to<span> Xtreme Traders</span> , your trusted partner in the financial market. With a solid presence of one year, we have experienced remarkable growth and established ourselves as a reliable company.</p>
        <p>At <span> Xtreme Traders</span> , we prioritize honesty and transparency. We believe in building long-term relationships with our clients based on trust and integrity. We are proud to uphold a policy of no hidden fees, ensuring that you have a clear understanding of the costs associated with our services.</p>
        <p>Our commitment to excellence extends to our valued clients. We have fostered a community of loyal and satisfied traders who appreciate our dedication to providing exceptional service and support. We strive to meet your needs and exceed your expectations, ensuring a seamless trading experience.</p>
        <p>As a responsible financial institution, <span> Xtreme Traders </span> operates in accordance with the law and is registered with the Financial Conduct Authority (FCA). This regulatory oversight underscores our commitment to maintaining the highest standards of professionalism and compliance.</p>
        <p>Join us on this exciting journey in the financial market. Experience the <span> Xtreme</span>  difference and unlock your trading potential. Whether you are a seasoned trader or new to the world of finance, we are here to empower you with the tools, knowledge, and resources you need to succeed.</p>
        <p>Choose <span> Xtreme Traders</span>  for a trustworthy, secure, and rewarding trading experience. Together, let's navigate the markets and achieve financial prosperity.</p></div>    
</div>
    


    <section>
    
      <!-- Swiper -->
      <div class="positioned-swiper">
        <h2>REVIEWS </h2>
          <div class="swiper mySwiper2">
              <div class="swiper-wrapper">

                  @foreach ($reviews as $review)
                      <div class="swiper-slide">
                          <div class="card" >
                              <div class="card-body">
                          
                                  <p class="card-text">{{ $review->review_text }}</p>
                                  <div class="card-stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach



              </div>
              {{-- <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div> --}}
              {{-- <div class="swiper-pagination"></div> --}}
          </div>
      </div>

    </section>



<div class="legal">
    <div class="legal-btns">
        
        <div class="p-policy">
            <button id="privacy-btn">PRIVACY POLICY</button>
        </div>
        <div class="terms">
            <button id="terms-btn">Terms of Use</button>
        </div>
        <div class="r-disc">
            <button id="risk-btn">Risk Disclosure</button>
        </div>
    </div>

<div class="legal-paras">
    <div id="privacy-policy">
        <p>Privacy Policy:</p>
        <p>At x-Treme Traders, we take your privacy seriously. We are committed to protecting the personal information you provide us and ensuring its confidentiality. This Privacy Policy outlines how we collect, use, and safeguard your information when you use our website.</p>
        <p>Collection of Information: We may collect certain personal information, such as your name, contact details, and financial information, when you register an account or use our services. We may also collect non-personal information, such as your IP address and browsing behavior, to enhance your user experience.</p>
        <p>Use of Information: The information we collect is used to provide and improve our services, personalize your experience, process transactions, and communicate with you. We may also use your information for marketing purposes, but we will always give you the option to opt-out of such communications.</p>
        <p>Security Measures: We implement various security measures to protect your information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
        <p>Sharing of Information: We may share your personal information with trusted third parties, such as financial institutions, to facilitate the provision of our services. We ensure that these parties adhere to strict confidentiality and data protection standards.</p>
        <p>Cookies and Tracking Technologies: We use cookies and similar tracking technologies to enhance your browsing experience and collect information about how you use our website. You have the option to disable cookies, but this may limit certain features and functionalities.</p>
        <p>Third-Party Links: Our website may contain links to third-party websites or services. We are not responsible for the privacy practices or content of these third parties. We recommend reviewing their privacy policies before providing any personal information.</p>
        <p>Changes to the Privacy Policy: We may update this Privacy Policy from time to time. We will notify you of any significant changes through the email address provided or by posting a prominent notice on our website.</p>
        <p>By using x-Treme Traders' website, you acknowledge that you have read and understood this Privacy Policy and agree to the collection, use, and disclosure of your information as described herein. If you have any questions or concerns regarding our Privacy Policy, please contact us at [contact email].</p>
      </div>

      <div id="terms-of-use">
        <p>Terms of Use:</p>
        <p>Welcome to x-Treme Traders! These Terms of Use govern your use of our website and services. By accessing or using our website, you agree to comply with these terms. If you do not agree with any part of these terms, please refrain from using our website.</p>
        <p>Eligibility: You must be at least 18 years old to use our website and services. By using our website, you represent and warrant that you are of legal age and have the capacity to enter into a binding agreement.</p>
        <p>Registration and Account: To access certain features of our website, you may need to create an account. You are responsible for maintaining the confidentiality of your account information and ensuring that it is accurate and up to date.</p>
        <p>User Conduct: You agree to use our website and services in compliance with applicable laws and regulations. You must not engage in any activity that may disrupt or interfere with the functioning of our website or infringe upon the rights of others.</p>
        <p>Intellectual Property: All content on x-Treme Traders' website, including text, graphics, logos, and images, is protected by intellectual property laws and belongs to us or our licensors. You may not reproduce, distribute, or modify any content without our prior written consent.</p>
        <p>Disclaimer of Warranty: While we strive to provide accurate and up-to-date information, we do not warrant the completeness, reliability, or accuracy of the content on our website. We disclaim any warranties, express or implied, regarding the use or results of our website.</p>
        <p>Limitation of Liability: We shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising from your use of our website or services. This includes any loss of profits, data, or business opportunities.</p>
        <p>Governing Law: These Terms of Use are governed by the laws of [Jurisdiction]. Any disputes arising from these terms shall be subject to the exclusive jurisdiction of the courts in [Jurisdiction].</p>
        <p>Changes to the Terms of Use: We reserve the right to modify or update these Terms of Use at any time. Any changes will be effective immediately upon posting on our website. It is your responsibility to review these terms periodically for any updates.</p>
        <p>By using x-Treme Traders' website, you agree to abide by these Terms of Use. If you have any questions or concerns regarding these terms, please contact us at [contact email].</p>
      </div>

      <div id="risk-disclosure">
        <p>Risk Disclosure:</p>
        <p>Trading CFDs (Contracts for Difference) involves a high level of risk and may not be suitable for everyone. Before engaging in any trading activities on x-Treme Traders, it is important to understand the risks associated with CFD trading. Please consider the following:</p>
        <p>Volatility and Market Risk: CFD trading involves the speculation on the price movements of various financial instruments, such as stocks, commodities, or currencies. These markets can be highly volatile, and prices can fluctuate rapidly. As a result, you may incur substantial losses or achieve significant gains.</p>
        <p>Leverage: CFD trading typically involves the use of leverage, which allows you to control a larger position with a smaller amount of capital. While leverage can amplify profits, it can also magnify losses. It is important to carefully manage your leverage and understand the potential impact on your trades.</p>
        <p>Counterparty Risk: When trading CFDs, you enter into a contract with x-Treme Traders as the counterparty. This means that your profits or losses are determined by the performance of x-Treme Traders as the market maker. In the event of x-Treme Traders' insolvency or inability to fulfill its contractual obligations, you may face financial losses.</p>
        <p>Information and Analysis: CFD trading requires knowledge and understanding of market conditions, analysis techniques, and trading strategies. It is important to conduct thorough research, stay informed about market trends, and exercise sound judgment when making trading decisions.</p>
        <p>Financial and Tax Considerations: CFD trading may have financial and tax implications. It is advisable to consult with a financial advisor or tax professional to understand the potential impact on your personal financial situation.</p>
        <p>Regulatory Compliance: x-Treme Traders is regulated by the Financial Conduct Authority (FCA) [or relevant regulatory authority]. However, regulatory oversight does not eliminate all risks associated with CFD trading. It is important to familiarize yourself with the regulatory framework and comply with any applicable laws and regulations.</p>
        <p>Please note that this Risk Disclosure is provided for informational purposes only and does not constitute financial advice. You should carefully consider your financial situation, risk tolerance, and trading objectives before engaging in CFD trading. If you have any doubts or concerns, seek independent financial advice.</p>
      </div>

</div>

</div>
@endsection

@section('js')
<script src="{{ asset('project/js/about.js') }}"></script>
<script src="{{ asset('project/js/legal.js') }}"></script>

@endsection