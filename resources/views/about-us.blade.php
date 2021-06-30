@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
         <h1>About Us</h1>
    </div>
     <div class="section section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                   <h3 class="heading-bottom">We Have 35 Years Experience</h3>
                   <p>Welcome to Maid Management Services Pte Ltd. (formerly known as Maid Management Services &ndash; Sole Proprietorship). At Maid Management Services Pte Ltd., people are our business. Founded in 1986, Maid Management Services Pte Ltd., is one of the longest serving and most trusted maid agency in Singapore.</p>
                   <div class="red-box text-white">
                       <p>Maid Management Services calls.</p>
                       <h3 class="text-white"><img src="images/call-icon-1.svg" alt=""> +65 6345 9978 / 6466 6136</h3>
                       <a href="{{route('contact')}}" class="btn white-btn">Contact Us</a>
                   </div>
                </div>
                <div class="col-md-6">
                    <img src="images/About-img.png" alt="">
                </div>
            </div>
        </div>
     </div>
     <div class="sections">
        <div class="container">
         
            <div class="row section-padding-top">
                <div class="col-md-12">
                    <p>We are committed to provide the best helpers and caregivers for your household needs. Over the years since inception, we have successfully assisted and matched domestic helpers and caregivers for thousands of employers and many of them remain as customers. We specialize in the placement of foreign domestic helpers and caregivers mainly from the Philippines, Indonesia and Myanmar. As our valued Client, you enjoy access to our comprehensive range of maid services, from problem solving to work permit renewals to travel and documentary arrangements for your maid&rsquo;s home leave. These services are available for as long as you employ a maid from us. Engaging a maid or caregiver is costly. If your maid does not work out, a replacement will add to your cost. Worse, if she runs away, there can be no immediate replacement under Work Permit regulations.</p>
                    <p>We fully understand how frustrating it can be to experience maid problems. Fortunately, many such problems are preventable. To minimize your risk, Maid Management Services Pte Ltd enforces three essential quality control measures:</p>
                    <ul class="common-list">
                        <li>First, we personally interview and select the maids ourselves. We then put our maids through an intensive residential training programme to thoroughly assess their competence and suitability.</li>
                        <li>Second, we match a maid to your family&rsquo;s requirements to optimize your chance of success.</li>
                        <li>Third, if you experience problems, you can count on our professional counselling support to help sort them out.</li>
                       
                    </ul>
                    <p>Take confidence from our over 90% success rate and rest assured, Maid Management Services Pte Ltd will do all we can to ensure you succeed with your maid because your success is our success.
                    </p>
                    <blockquote>
                         <h4>Our Philosophy</h4>
                         <p>We believe in full transparency in our pricing and providing the strictest and most accurate information to the best of our knowledge. We take great pride in building trust and establishing good long-term relationship with our customers.</p>
                       
                      </blockquote>
                </div>
            </div>
        </div>
     </div>
     <div class="section-padding text-center" style="background-color: #FFF6F6;">
         <h2>Why Choose Us?</h2>
     </div>
     <div class="section-padding">
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <div class="padding-box">
                          <h3 class="heading-bottom para-family">Our Philosophy</h3>
                          <p>Our experience of more than 35 years is your best assurance. Over the years since inception, we have assisted and matched domestic helpers and caregivers for thousands of employers and many of them remain as customers.</p>
                     </div>
                 </div>
                 <div class="col-md-6">
                    <div class="padding-box">
                         <h3 class="heading-bottom para-family">Building long-term relationship</h3>
                         <p>At Maid Management Services Pte Ltd., people are our business. We are dedicated to serving you, and believe that honesty and transparency are the best policy towards building a long-lasting relationship that extends beyond the initial sale. Our commitment to developing long-term relationship is why over 90% of our clients are repeat customers.</p>
                    </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="padding-box">
                         <h3 class="heading-bottom para-family">Value-added service</h3>
                         <p>As our valued client, you enjoy access to our comprehensive range of maid services, from problem solving to work permit applications and renewals to travel and documentary arrangements for your maid&rsquo;s home leave. These services are available for as long as you employ a maid from us. Each client has a dedicated service consultant and we believe in going the extra mile for both our employers and helpers.</p>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="padding-box">
                        <h3 class="heading-bottom para-family">Dedication You Can Trust</h3>
                        <p>In striving to provide you with the best service level possible, we take pride as being the first maid agency to be accredited with the ISO 9001 (international quality management) in 1995 and CASE TRUST accredited for good business practices in the year 2005. These testaments indicate our strong commitment towards excellence in service standards.</p>
                   </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="padding-box">
                         <h3 class="heading-bottom para-family">&ldquo;Exclusive&rdquo; Candidates (FDWs)</h3>
                         <p>We take the selection process and training very seriously. Working closely with our overseas partners in the Philippines, Indonesia and Myanmar our commitment to a highly selective hiring process has allowed us to deliver the largest pool of selection of &ldquo;exclusive&rdquo; foreign domestic workers among all employment agencies in Singapore.
                            Unlike at other employment agencies where candidate files are shared among multiple competing agencies, at Maid Management you will find &ldquo;exclusive&rdquo; candidates that you can&rsquo;t find anywhere else.</p>
                    </div>
                </div>
              
            </div>
         </div>
     </div>
@endsection