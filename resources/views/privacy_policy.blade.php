	<head>
		@include('layout.head')
		<title>Dalit Congres</title>
	</head>
<main>
	@include('includes.top-menu')
	<!-- <div class="banner" style="background-image: url({{ STATIC_BASE_URL . '/images/copy1.jpg' }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="key-people">
						<center>
							<div class="key-people-text mt-2">
								Latest Videos
							</div>
						</center>
					</h3>
				</div>
			</div>
		</div>
	</div> -->
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="upcoming-event mt-2">
    				<h3 class="key-peoples">
						<center>
							<div class="terms">Privacy Policy</div>
						</center>
					</h3>
					<div class="about-description">
						<p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Thank you for visiting the website of Dalit Congress (Site)
						</p>
						The Privacy Policy is applicable to the websites of Indian National Congress. This privacy statement also does not apply to the websites of our partners, affiliates, agents or to any other third parties, even if their websites are linked to Site. We recommend you review the privacy statements of the other parties with whom you interact.<br>

                       For the purposes of this privacy policy, "affiliates " means any entity or project or  venture that is wholly or partially owned or controlled by Indian  National Congress. "agents" means any subcontractor, vendor or other entity with whom we have an ongoing business relationship to provide products, services, or information.<br>
                       The following terms governs the collection, use and protection of your personal Information by the Site. This Privacy Policy shall be applicable to users who visit the Site. By visiting and/ or using the Site you have agreed to the following Privacy Policy. the Privacy Policy for an understanding of how we collect, use and disclose the identifiable information from our users.<br><br>
						<p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Introduction:
						</p>As a registered member of the Site and/or as a visitor (if applicable and as the case may be), you will to get an insight on the updates and detailed information of the happenings and developments within and by the organisation. In addition, look forward to receiving monthly newsletters and updates from the Indian National congress.<br>

                        That's why we've provided this Privacy Policy, which sets forth our policies regarding the collection, use and protection of the Personal Information of those using or visiting the Site<br><br>
						<p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Personal Information
						</p>Personal Information means and includes all information that can be linked to a specific individual or to identify any individual, such as name, address, mailing address, telephone number, e - mail address, aadhar number, constituency, voter details, credit card number, cardholder name, expiration date, information about the constituency, and any and all details that may be requested while any user visits or uses the website.<br>
                        When you browse the Website, Indian National Congress  may collect information regarding the domain and host from which you access the Internet, the Internet Protocol address of the computer or Internet Service Provider you are using, and anonymous site statistical data. The Website uses cookie and tracking technology depending on the features offered. Personal Information will not be collected via cookies and other tracking technology; however, if you previously provided personally identifiable information, cookies may be tied to such information. Aggregate cookie and tracking information may be shared with third parties.<br>
                        We encourage you to review our Privacy Policy, and become familiar with it, but you should know that we do not sell or rent our users' Personal Information to third parties<br>
                        Please note that we review our Privacy Policy from time to time, and we may make periodic changes to the policy in connection with that review. Therefore, you may wish to bookmark this page and/or periodically review this page to make sure you have the latest version. Regardless of later updates, we will abide by the privacy practices described to you in this Privacy Policy at the time you provided us with your Personal Information.Information we collect from you?.<br>
                       When browsing our Website, you are not required to provide any Personal Information unless and until you choose to sign up for one of our e-mail newsletters or other services as is described in the Website from time to time.<br>

                        <br><br>
                        <p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Registration
						</p>If you choose to become a member of Indian National Congress, you may be required to provide your name, address, telephone number, e-mail address. Wherein if at any time you chose to accept to become a member of the website in addition to the information before stated you will also be required to provide a unique login name, password, and password validation, and a password hint to help you remember your password. This information is collected on the registration form for several reasons including but not limited to.
						<ol>
							<li>Personal identification</li>
							<li>To make product or other improvements to our site. In addition, we need your e - mail address to confirm your new member registration. As a Website member you will also occasionally receive updates from us about Indian National Congress’ activities in your area, new Website services, and other noteworthy items. However, you may choose at any time to no longer receive these types of e - mail messages. Please see our Opt - Out Policy described below for details.</li>
						</ol><br><br>
						
                        <p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Online Surveys
						</p>Indian National Congress values opinions and comments from users, so we may conduct online surveys. Participation in these surveys is entirely optional. Typically, the information is aggregated, and used to make improvements to the Website and its services and to develop appealing content, features and promotions for Website users. Survey participants are anonymous unless otherwise stated in the survey.<br>
                        <br>
                        <p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Cookies
						</p>"Cookies" are small pieces of information that are stored by your browser on your computer's hard drive. There are many myths circulating about cookies, but you should know that cookies are only read by the server that placed them, and are unable to do such things as run programs on your computer, plant viruses or harvest your Personal Information. The use of cookies is very common on the Internet and Indian National Congress' use of cookies is similar to that of such Websites as any other reputable online portal.
<br>
                        First and foremost, you can rest assured that no personally identifiable information ("PII") about you (e.g., name, address, etc.) is gathered or stored in the cookies placed by the Website and, as a result, none can be passed on to any third parties.
<br>
                        Cookies allow us to serve you better and more efficiently, and to personalize your experience at our Website. Indian National Congress may use cookies to personalize your experience on the Website as these types of cookies allow you to log in without having to type your log - in name each time (only your password is needed. None of this information is passed to any third party, and is used solely by us to provide you with a better user experience on the Website<br>

					</div>
    			</div>
    		</div>
    	</div>
    </div>
	@include('includes.footers')
</main>
@section('scripts')
	<script type="text/javascript">
		var swiper = new Swiper('.swiper-container', {
	      pagination: {
	        el: '.swiper-pagination',
	      },
	    });
	</script>
@endsection