<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Privacy Policy</title>
        {{-- Bootstrap 5 links --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/db676e76a0.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;1,6..12,200;1,6..12,300;1,6..12,400&family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
          
      
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
  <style>


/* Mixin */
.white-gradient {
  background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
}

/* Variables */
:root {
  --animation-speed: 40s;
}

/* Animation */
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(calc(-250px * 7));
  }
}

/* Styling */
.slider {
  /* background: white; */
  box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
  height: 100px;
  margin: auto;
  overflow: hidden;
  position: relative;
  width:100%;
}

.slider::before,
.slider::after {
  content: "";
  height: 100px;
  position: absolute;
  width: 200px;
  z-index: 2;
  background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
}

.slider::after {
  right: 0;
  top: 0;
  transform: rotateZ(180deg);
}

.slider::before {
  left: 0;
  top: 0;
}

.slide-track {
  animation: scroll var(--animation-speed) linear infinite;
  display: flex;
  width: calc(250px * 14);
}

.slide-logo {
  height: 100px;
  width: 250px;
}
.proud h3{
     color:#ff6347 !important;
     font-weight:600 !important;
     font-size:25px;
     font-family: "Lato", sans-serif !important;
}

.proud-img{
    width: 75px !important;
    margin-bottom: 10px !important;
}

/* Responsive styling for mobile devices */
@media (max-width: 991px) {
  .slider {
    width: 100%; /* Adjust width for smaller screens */
  }
  .last-section-img{
max-width: 20rem !important;
}
.slider::before,
.slider::after {
 
  width: 75px;
 
}
  .logo-title{
    font-size:22px !important;
  }
.proud-img{
    width: 100px !important;
    margin-bottom: 10px !important;
}
 .about-card{


height:21rem !important;

}
.about-col{
  margin-bottom: 30px !important;
}
}

@media (min-width: 992px) {
.last-section-img{
max-width: 22rem !important;
}
}
.about-card{
box-shadow: 0 8px 6px 0 rgba(52, 152, 219, 0.2);
border:1px solid #0072bb;
height:100% !important;
border-radius:5px;
margin-top:10px;

}
.about-card h3{
color:#0373BC;
font-weight:500 !important;
border-bottom:1px solid #0072bb;
padding-bottom:15px;


}
.about-card p{
font-size:16px;


}
</style>
</head>
<body >
  <x-app-layout>
            
<div class="container">

        <div class="row mt-4">
            <!-- Overlay -->
            <div class="overlaymessage" id="overlay_message">
                <div class="overlay-message" id="overlayMessage"></div>
            </div>
        </div>

        <div class="row mb-1 mx-0">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                    <h2 class="text-center font-semibold">CodeFlexi - Privacy Policy </h2> 
                    <hr class="my-3">
                    <p class="text-sm text-justify my-3">
    CodeFlexi LLC (“CodeFlexi,” “we,” “our,” or “us”) is dedicated to safeguarding your privacy. Our Privacy Policy (the “Policy”) elucidates how we collect, use, disclose, and protect information pertaining to you or associated with you (“personal information”), and your options regarding the collection and utilization of your information. This Privacy Policy pertains to the online services provided by CodeFlexi, including our website at www.codeflexi.com, our mobile app CodeFlexi Go, and any other online service location (collectively the “Service”) that makes this Privacy Policy accessible to you.
</p>
<p class="text-sm text-justify my-3">
    By utilizing the Service, you agree to our Terms of Use and consent to our collection, use, and disclosure practices, as well as other activities as outlined in this Privacy Policy. If you do not agree and consent, please discontinue using the Service.
</p>
<p class="text-sm text-justify my-3">
    Depending on your location or residence, you may be entitled to additional rights.
</p>
<ul class="list-disc text-sm text-justify my-3">
    <li>If you are a data subject in the European Union, please see the “Additional Disclosures for People in Europe” section below;</li>
    <li>If you are a California resident, please see the “Additional Disclosures for California Residents” section below; and</li>
    <li>If you are a Nevada resident, please see the “Additional Disclosures for Nevada Residents” section below.</li>
</ul>

                </div>

        </div>
</div>
<div class="container">
  <div class="row mx-0">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box" style="margin-top:-20px;">
          <h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">Information Collection</h3>
<p class="text-sm text-justify my-3">
    This section outlines the types of information collected, including categories of information that (1) you provide to us directly, (2) are collected automatically by us, and (3) we receive from third-party sources.
</p>

<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">1. Information You Provide Directly to Us</h4>
<p class="text-sm text-justify my-3">
    You can browse our site without providing personal information, but registration is required to access most of the Service's features. Certain personal information—such as a username, email address—is necessary to create an account. However, after setting up an account, you may choose what additional information to share through public profiles, including your name, location, website, links to your social media profiles, and other information considered personal. Similarly, if you engage in messaging through the Service, the contents of such messages may be processed and saved by us. You may voluntarily provide other information to us that we do not request, and, in such instances, you are solely responsible for such information.
</p>

<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">2. Information Collected Automatically</h4>
<p class="text-sm text-justify my-3">
    Additionally, we automatically collect information when you use the Service. The categories of information we automatically collect and have collected in the last 12 months include:
</p>
<ul class="text-sm text-justify my-3">
    <li>Service Use Data: This includes data about the features you use, pages you visit, emails and advertisements you view, products and services you view and purchase, the time of day you browse, and your referring and exiting pages.</li>
    <li>Device Data: This encompasses data about the type of device or browser you use, your device’s operating software, your internet service provider, your device’s regional and language settings, and device identifiers such as IP address and Ad Id.</li>
    <li>Location Data: This includes imprecise location data (such as location derived from an IP address or data that indicates a city or postal code level) and, with your consent, precise location data (such as latitude/longitude data).</li>
</ul>

<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">Use of Information</h3>
<p class="text-sm text-justify my-3">
    This section outlines how collected information is utilized by CodeFlexi.
</p>
<p class="text-sm text-justify my-3">
    We collect this information for various business purposes, including operating, maintaining, and providing you with the features and functionality of the Service, as well as communicating directly with you, such as sending you email messages.
</p>

<p class="text-sm text-justify my-3">
    Notwithstanding the above, we may use information that does not identify you (including information that has been aggregated or de-identified) for any purpose except as prohibited by applicable law. For information on your rights and choices regarding how we use information about you, please see the “Your Rights and Choices” section below.
</p>


<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">Your Rights and Choices</h3>
<p class="text-sm text-justify my-3">
    This section outlines your rights and choices regarding information related to you, with variations depending on the category of information and its subsequent use. Please review the following details:
</p>
<ol class="list-decimal text-sm text-justify my-3">
    <li><strong>Account Information:</strong> You can access, update, or remove certain information provided through your account by visiting your account settings. Please note that we may retain and use your information as necessary to comply with legal obligations, resolve disputes, and enforce agreements.</li>
    <li><strong>Tracking Technology Choices:</strong>
        <ul class="list-disc text-sm text-justify my-3">
            <li><strong>Cookies and Pixels:</strong> You can instruct your browser to decline or delete cookies by changing its settings. Note that your ability to limit cookies is subject to browser settings and limitations.</li>
            <li><strong>Do Not Track:</strong> Your browser settings may transmit a “Do Not Track” signal to online services you visit. However, we do not monitor or take action with respect to these signals unless required by law.</li>
            <li><strong>App and Location Technologies:</strong> You can stop information collection via an app by uninstalling it or resetting your device Ad ID. You can also withdraw consent for precise location data collection through your device settings.</li>
        </ul>
    </li>
    <li><strong>Analytics and Interest-Based Advertising:</strong> Google provides opt-out tools for Google Analytics and Google Analytics for Display Advertising. Additionally, you can opt out of targeted ads provided by companies participating in the DAA and/or NAI.</li>
    <li><strong>Communications:</strong>
        <ul class="list-disc text-sm text-justify my-3">
            <li><strong>E-mails:</strong> You can opt out of receiving promotional emails by following the unsubscribe instructions or contacting us.</li>
            <li><strong>Push Notifications:</strong> You can opt out of push notifications by adjusting permissions on your device or uninstalling the app.</li>
        </ul>
    </li>
</ol>
<p class="text-sm text-justify my-3">
    Please note that opt-out choices may be limited to specific browsers or devices and may not affect subsequent subscriptions or services.
</p>

<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">Data Security</h3>
<p class="text-sm text-justify my-3">
    CodeFlexi employs commercially reasonable administrative, technical, and physical security measures to safeguard the integrity and security of all information collected through the Service. However, no security system is impenetrable, and while we strive to maintain the security of our systems, we cannot guarantee its absolute security. In the event of a security breach compromising information under our control, we will take reasonable steps to investigate, notify affected individuals as required by law, and implement appropriate measures.
</p>


<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">Links to Other Websites and Services</h3>
<p class="text-sm text-justify my-3">
    The Service may contain links to websites, platforms, and services operated by third parties. Please note that these locations have their own privacy policies, and Codecademy does not accept responsibility or liability for their policies. We advise you to review the individual privacy policies of these locations before submitting any information.
</p>




         </div>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box" style="margin-top:-20px;">
         <p class="text-md text-center my-3">
            This Policy was last updated on <b>February 13st, 2023</b>.
          </p>
         </div>
         <a class="text-center mb-5" href="{{ route('index') }}" style="color:#FF6347;"> <span class="fa fa-fw fa-home " ></span> Return back</a>
  </div>
</div>







  </x-app-layout>
</body