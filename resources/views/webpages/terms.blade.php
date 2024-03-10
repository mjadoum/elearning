<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Terms of Service</title>
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
                    <h2 class="text-center font-semibold">CodeFlexi - Terms of Service </h2> 
                    <hr class="my-3">
                    <p class="text-sm text-justify my-4">
                        "Welcome to CodeFlexi eLearning, the online education platform provided by CodeFlexi LLC (“CodeFlexi,” “we,” or “us”). This page outlines the terms and conditions governing your use of our website, mobile services, and software offered through our platform (referred to collectively as the “Service”).<br> By accessing or utilizing the Service, you acknowledge that you have reviewed, comprehended, and consent to abide by the terms laid out in this Terms of Service Agreement (“Agreement”), as well as the collection and utilization of your data in accordance with the CodeFlexi Privacy Policy, irrespective of whether you are a registered user of our Service. These terms are applicable to all individuals, including visitors, users, and any other parties accessing the Service (“Users”).

                        <br><br>PLEASE REVIEW THIS AGREEMENT THOROUGHLY TO ENSURE FULL UNDERSTANDING OF EACH CLAUSE. THIS AGREEMENT INCLUDES A BINDING ARBITRATION CLAUSE THAT MANDATES THE USE OF ARBITRATION ON AN INDIVIDUAL BASIS FOR RESOLVING DISPUTES, IN LIEU OF JURY TRIALS OR CLASS ACTIONS."
                    </p>
                </div>

        </div>
</div>
<div class="container">
  <div class="row mx-0">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box" style="margin-top:-20px;">
          <h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">1. Use of Our Service</h3>
            <p class="text-sm text-justify my-3">
           CodeFlexi provides an online interactive platform for taking and creating coding classes.
            </p>
          <h4  style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">A. Eligibility</h4>
          <p class="text-sm text-justify my-3">
            This agreement constitutes a legally binding contract between you and CodeFlexi. You are required to carefully read and agree to these terms prior to utilizing the CodeFlexi Service. If you do not consent to these terms, you are not permitted to use the Service. To use the Services, you must be at least 16 years of age. If you are under the age of 18 and wish to register for any part of the Services, please ensure that your parent or legal guardian reviews and agrees to these terms on your behalf before you access any portion of the Services, or they may complete the purchase or registration process on your behalf. Certain Services may be subject to additional terms and conditions, such as rules governing specific competitions, promotions, services, or other activities, or terms associated with particular content accessible through the Services. These supplemental terms and conditions will be provided to you in conjunction with the relevant competition, service, or activity. Any additional terms and conditions are supplementary to these terms and, in case of conflict, take precedence over these terms. The Service is not accessible to any Users who have previously been barred from using the Service by CodeFlexi.
          </p>

          <h4  style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">B. CodeFlexi Service</h4>
          <p class="text-sm text-justify my-3">
            Subject to the terms and conditions outlined in this Agreement, you are hereby granted a non-exclusive, limited, non-transferable, and revocable license to utilize the Service for your personal, non-commercial purposes only, and as permitted by the functionalities of the Service. CodeFlexi retains all rights not explicitly granted herein in the Service and the CodeFlexi Content (as defined below). CodeFlexi reserves the right to terminate this license at its discretion, for any reason or without reason, at any time
          </p>

          <h4  style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">C. CodeFlexi Accounts</h4>
          <p class="text-sm text-justify my-3">
            Your CodeFlexi account grants you access to the services and features that we may establish and maintain periodically and at our sole discretion. By linking your CodeFlexi account with a third-party service (such as Facebook or Twitter), you authorize us to access and utilize your information from that service in accordance with its terms, and to securely store your login credentials for that service.
            <br><br>
            You are strictly prohibited from using another user's account without their explicit permission. When setting up your account, it is imperative to provide accurate and complete information. You are solely responsible for all activities carried out under your account, and it is your responsibility to safeguard your account password. We recommend using strong passwords (combinations of uppercase and lowercase letters, numbers, and symbols) for your account. Promptly inform CodeFlexi of any security breaches or unauthorized use of your account. CodeFlexi cannot be held liable for any losses resulting from unauthorized account usage.
            <br><br>
            You have control over your user profile and interaction with the Service through the settings available in your "account settings" page. By providing CodeFlexi with your email address, you consent to receiving Service-related notices via email, including those mandated by law, instead of traditional mail communication. Additionally, we may use your email address to send you other messages, such as updates on Service features and special offers. If you prefer not to receive such email communications, you can opt out or adjust your preferences in the "account settings" page. However, opting out may result in you missing important updates, enhancements, or promotional offers.
          </p>
          <hr class="my-3">
          <h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">2. User Content</h3>
            <p class="text-sm text-justify my-3">
           Within certain sections of the Service, Users may contribute content such as profile information, comments, questions, course materials, and other information (referred to as "User Content"). Access to these features may be restricted based on age. We do not claim ownership rights over User Content created by you. The User Content you generate remains your property; however, by sharing User Content through the Service, you consent to allowing others to view, edit, and/or share your User Content as per your settings and this Agreement. CodeFlexi reserves the right (but is not obligated) to remove any User Content shared via the Service at its sole discretion.
<br><br>
You agree not to post User Content that:
<br>(i) poses a risk of harm, loss, physical or mental injury, emotional distress, death, disability, disfigurement, or physical or mental illness to yourself, any other person, or any animal;
<br>(ii) poses a risk of loss or damage to any person or property;
<br>(iii) seeks to harm or exploit children by exposing them to inappropriate content, soliciting personally identifiable information, or otherwise;
<br>(iv) may constitute or contribute to a crime or tort;
<br>(v) contains any unlawful, harmful, abusive, racially or ethnically offensive, defamatory, infringing, invasive of personal privacy or publicity rights, harassing, humiliating to others (publicly or otherwise), libelous, threatening, profane, or otherwise objectionable information or content;
<br>(vi) contains any illegal information or content (including, without limitation, the disclosure of insider information under securities law or another party’s trade secrets);
<br>(vii) contains any information or content that you do not have the right to make available under any law or under contractual or fiduciary relationships;
<br>(viii) contains any inaccurate or outdated information or content; or
<br>(ix) violates any school or other applicable policy, including those related to cheating or ethics. <br><br>You agree that any User Content you post does not and will not violate any third-party rights of any kind, including, without limitation, any Intellectual Property Rights (as defined below) or rights of privacy. <br><br>CodeFlexi reserves the right, but is not obligated, to reject and/or remove any User Content that CodeFlexi believes, in its sole discretion, violates these provisions. You understand that publishing your User Content on the Service does not substitute for registering it with the U.S. Copyright Office, the Writer’s Guild of America, or any other rights organization.
            </p>
<hr class="my-3">
          <h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">3. Mobile Software</h3>
<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">A. Mobile Software.</h4>
<p class="text-sm text-justify my-3">
    CodeFlexi may offer mobile software ("Mobile Software") to access the platform via a mobile device. To use the Mobile Software, you need a compatible mobile device. We do not guarantee compatibility with all devices. By using the Mobile Software, you are granted a non-exclusive, non-transferable license to use a compiled code copy of the Mobile Software for one CodeFlexi account on one mobile device owned or leased solely by you, for personal use only.
    <br><br>
    You are prohibited from: (i) modifying, disassembling, decompiling, or reverse engineering the Mobile Software, except as expressly prohibited by law; (ii) renting, leasing, loaning, reselling, sublicensing, distributing, or transferring the Mobile Software to any third party or using it to provide services for any third party; (iii) making any copies of the Mobile Software; (iv) removing, circumventing, disabling, damaging, or interfering with security-related features of the Mobile Software, features that prevent or restrict use or copying of any content accessible through the Mobile Software, or features that enforce limitations on its use; or (v) deleting the copyright and other proprietary rights notices on the Mobile Software.
    <br><br>
    You acknowledge that CodeFlexi may issue upgraded versions of the Mobile Software from time to time and may automatically upgrade the version on your mobile device. You consent to such automatic upgrades and agree that this Agreement applies to all upgrades. Any third-party code incorporated into the Mobile Software is subject to the applicable open-source or third-party license.
    <br><br>
    This license does not constitute a sale of the Mobile Software, and CodeFlexi retains all rights, title, and interest in it. Any attempt to transfer any rights, duties, or obligations under this Agreement, except as expressly provided for, is void. CodeFlexi reserves all rights not expressly granted herein.
    <br><br>
    If the Mobile Software is acquired on behalf of the United States Government, it will be deemed "commercial computer software" and "commercial computer software documentation," respectively, subject to applicable regulations. Any use, reproduction, release, performance, display, or disclosure of the Service and documentation by the U.S. Government will be governed solely by these Terms of Service and is prohibited except as expressly permitted.
    <br><br>
    The Mobile Software originates in the United States and is subject to U.S. export laws and regulations. It may not be exported or re-exported to certain countries or persons/entities prohibited from receiving exports from the United States. Additionally, it may be subject to import and export laws of other countries. You agree to comply with all U.S. and foreign laws related to the use of the Mobile Software and the CodeFlexi Service.
</p>
<hr class="my-3">
<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">4. Our Proprietary Rights</h3>
<p class="text-sm text-justify my-3">
    Except for your User Content, all materials within the CodeFlexi platform, including software, images, text, graphics, illustrations, logos, patents, trademarks, service marks, copyrights, photographs, audio, videos, music, and User Content belonging to other Users (the "CodeFlexi Content"), and all Intellectual Property Rights related thereto, are the exclusive property of CodeFlexi and its licensors (including other Users who post User Content to the Service). 
    <br><br>
    Except as explicitly provided herein, nothing in this Agreement shall be deemed to create a license in or under any such Intellectual Property Rights, and you agree not to sell, license, rent, modify, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit, or create derivative works from any CodeFlexi Content. 
    <br><br>
    Use of the CodeFlexi Content for any purpose not expressly permitted by this Agreement is strictly prohibited.
    <br><br>
    You may choose to or we may invite you to submit comments or ideas about the CodeFlexi platform, including without limitation how to improve the Service or our products ("Ideas"). By submitting any Idea, you agree that your disclosure is gratuitous, unsolicited, and without restriction and will not place CodeFlexi under any fiduciary or other obligation. 
    <br><br>
    We are free to use the Idea without any additional compensation to you and/or to disclose the Idea on a non-confidential basis or otherwise to anyone. You further acknowledge that, by acceptance of your submission, CodeFlexi does not waive any rights to use similar or related ideas previously known to CodeFlexi, or developed by its employees, or obtained from sources other than you.
</p>
<hr class="my-3">
<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">5. Privacy</h3>
<p class="text-sm text-justify my-3">
    At CodeFlexi, we prioritize the privacy of our Users. By using our Services, you consent to the collection, use, and disclosure of your personally identifiable information and aggregate data as outlined in our Privacy Policy. You also agree to have your personally identifiable information collected, used, transferred to, and processed in the United States.
</p>
<hr class="my-3">
<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">6. Security</h3>
<p class="text-sm text-justify my-3">
    CodeFlexi values the integrity and security of your personal information. While we take measures to protect your data, we cannot guarantee that unauthorized third parties will never breach our security measures or misuse your personal information. You acknowledge that you provide your personal information at your own risk.
</p><hr class="my-3">

<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">7. DMCA Notice</h3>
<p class="text-sm text-justify my-3">
    As a platform that respects artist and content owner rights, it is our policy to respond to alleged infringement notices that comply with the Digital Millennium Copyright Act of 1998 ("DMCA").
    <br><br>
    If you believe that your copyrighted work has been copied in a way that constitutes copyright infringement and is accessible via our Service, please notify our copyright agent as outlined in the DMCA. For your complaint to be valid under the DMCA, you must provide the following information in writing:
    <br><br>
    - An electronic or physical signature of a person authorized to act on behalf of the copyright owner;
    <br>
    - Identification of the copyrighted work that you claim has been infringed;
    <br>
    - Identification of the material claimed to be infringing and its location on the Service;
    <br>
    - Information reasonably sufficient to permit us to contact you, such as your address, telephone number, and email address;
    <br>
    - A statement that you have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or law; and
    <br>
    - A statement, made under penalty of perjury, that the above information is accurate, and that you are the copyright owner or are authorized to act on behalf of the owner.
    <br><br>
    The above information must be submitted to the following DMCA Agent:
    <br><br>
    Attn: DMCA Notice CodeFlexi Inc.
    <br>
    Address: Scotland - Glasgow
    <br>
    Email: info@codeflexi.com
    <br><br>
    Please note that knowingly misrepresenting that online material is infringing may lead to criminal prosecution for perjury and civil penalties. This procedure is exclusively for notifying CodeFlexi and its affiliates of alleged copyright infringement and does not constitute legal advice.
</p>
<hr class="my-3">
<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">8. Third-Party Links</h3>
<p class="text-sm text-justify my-3">
    The CodeFlexi platform may contain links to third-party websites, advertisers, services, special offers, or other events or activities that are not owned or controlled by us. We do not endorse or assume any responsibility for any such third-party sites, information, materials, products, or services. Your access to any third-party website from our Service is at your own risk, and you understand that this Agreement and our Privacy Policy do not apply to your use of such sites. 
    <br><br>
    You relieve CodeFlexi from any liability arising from your use of any third-party website, service, or content. Additionally, any dealings or participation in promotions of advertisers found on our Service are solely between you and such advertisers. CodeFlexi shall not be responsible for any loss or damage relating to your dealings with such advertisers.
</p>
<hr class="my-3">
<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">9. Governing Law and Arbitration</h3>
<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">A. Governing Law</h4>
<p class="text-sm text-justify my-3">
    You agree that the CodeFlexi platform is solely based in New York, and its use shall be deemed as passive, not giving rise to personal jurisdiction over CodeFlexi outside of New York. This Agreement shall be governed by the internal substantive laws of the State of New York, without regard to its conflict of laws principles. The parties acknowledge that this Agreement involves interstate commerce. Despite the substantive law governing this Agreement, any arbitration conducted shall be governed by the Federal Arbitration Act (9 U.S.C. §§ 1-16). The United Nations Convention on Contracts for the International Sale of Goods is expressly excluded. You consent to the personal jurisdiction of the federal and state courts located in New York County, New York, for any actions for which CodeFlexi retains the right to seek injunctive or other equitable relief.
</p>

<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">B. Arbitration</h4>
<p class="text-sm text-justify my-3">
    PLEASE READ THIS SECTION CAREFULLY AS IT REQUIRES ARBITRATION OF DISPUTES AND LIMITS YOUR ABILITY TO SEEK RELIEF FROM CODEFLEXI. <br><br>In the event of a dispute that cannot be resolved within 60 days, both parties agree to resolve any claim, dispute, or controversy arising out of or relating to these Terms of Service through binding arbitration conducted by the Judicial Mediation and Arbitration Services (“JAMS”). The arbitration will be held in New York County, New York, unless otherwise agreed upon. Each party shall bear responsibility for their respective JAMS filing, administrative, and arbitrator fees. The arbitrator's award shall include arbitration costs, reasonable attorneys' fees, costs for expert witnesses, and any judgment on the award may be entered in any court of competent jurisdiction. CodeFlexi reserves the right to seek injunctive or other equitable relief from the courts to protect its proprietary interests.<br><br> ALL CLAIMS MUST BE BROUGHT IN INDIVIDUAL CAPACITY, NOT AS A PLAINTIFF OR CLASS MEMBER IN ANY CLASS ACTION LAWSUIT. BY AGREEING TO THESE TERMS OF SERVICE, YOU AND CODEFLEXI WAIVE THE RIGHT TO A TRIAL BY JURY OR PARTICIPATION IN A CLASS ACTION LAWSUIT. THE ARBITRATOR MAY NOT CONSOLIDATE MORE THAN ONE PERSON'S CLAIMS UNLESS AGREED OTHERWISE.
</p>
<hr class="my-3">
<h3 style="color: #0072bb !important;font-weight: 500 !important; font-size: 26px;">General</h3>
<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">A. Assignment</h4>
<p class="text-sm text-justify my-3">
    This Agreement, along with any rights and licenses granted hereunder, may not be transferred or assigned by you but may be assigned by CodeFlexi without restriction. Any attempted transfer or assignment in violation hereof shall be null and void.
</p>

<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">B. Notification Procedures and Changes to the Agreement</h4>
<p class="text-sm text-justify my-3">
    CodeFlexi may provide notifications to you via email notice, written or hard copy notice, or through posting of such notice on our website, as determined by CodeFlexi in our sole discretion. We reserve the right to determine the form and means of providing notifications to our Users. We are not responsible for any automatic filtering you or your network provider may apply to email notifications we send to the email address you provide us. CodeFlexi may modify or update this Agreement from time to time, and you should review this page periodically. Your continued use of the Service after any such change constitutes your acceptance of the new Terms of Service.
</p>

<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">C. Entire Agreement/Severability</h4>
<p class="text-sm text-justify my-3">
    This Agreement, together with any amendments and any additional agreements you may enter into with CodeFlexi in connection with the Service, shall constitute the entire agreement between you and CodeFlexi concerning the Service. If any provision of this Agreement is deemed invalid by a court of competent jurisdiction, the invalidity of such provision shall not affect the validity of the remaining provisions of this Agreement, which shall remain in full force and effect, except that in the event of unenforceability of the universal Class Action/Jury Trial Waiver, the entire arbitration agreement shall be unenforceable.
</p>



<h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">D. Government Use Rights</h4>
<p class="text-sm text-justify my-3">
    If the Service is licensed to the United States government or any agency thereof, then the Service will be deemed to be “commercial computer software” and “commercial computer software documentation,” respectively, pursuant to DFAR Section 227.7202 and FAR
</p>
    <h4 class="text-justify my-3" style="color: #ff6347 !important;font-weight: 500 !important; text-align:left !important;">F. Contact</h4>
<p class="text-sm text-justify my-3">
    For legal notices please mail or serve us at " Scotland - Glasgow ". <br> You can also contact us via: <a href="mailto:info@codeflexi.com">info<b>@</b>codeflexi.com</a>
  </p>
         </div> 
         
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box" style="margin-top:-20px;">
         <p class="text-md text-center my-3">
            This Agreement was last modified on <b>February 13st, 2023</b>.
          </p>
         </div>
         <a class="text-center mb-5" href="{{ route('index') }}" style="color:#FF6347;"> <span class="fa fa-fw fa-home " ></span> Return back</a>
  </div>
</div>







  </x-app-layout>
</body