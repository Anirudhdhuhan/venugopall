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
							<div class="compt">Video clip & Essay competition on the Constitution of India</div>
							<div class="compt mt-2">( संविधान पर चर्चा )</div>
						</center>
					</h3>
					<div class="about-description">
						To commemorate the Constitution Day celebration on 26th November 2018 in continuation of 90 days outreach program “Samvidhan se Samman”, the SC Department, All India Congress Committee (AICC) invites the entries from the people at large to participate in the<br>
						<ol>
							1. Best Video clip competition and<br>
							2. Essay Competition on “Samvidhan, kal, Aaj aur Kal” (Indian Constitution, Yesterday, Today and Tomorrow).
						</ol><br>
						<p>
							<b>Starting day :</b> <i>26th November 2018</i><br>

							<b>Last date of submission:</b> <i>26th January 2019</i><br>

							<strong>Entries for video competition will be accepted online. However for essay competition entries will be accepted offline as well.</strong><br>

							The Online entries can be sent to the designated Email ID as mentioned below. <br>

							<b><u>Email ID: essay4samvidhan@gmail.com </u></b><br>
						</p>
						<p class="mt-2">
							<strong>Criteria :-</strong>
						</p>
						<p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Guidelines for video submission
						</p>

						1. The submissions should be made online.<br>
						2. Only one entry per person is allowed.<br>
						3. The submission should be up to a maximum of 3 minutes and sent  as an attachment of less than 25 MB file.
						<br>
						4. The candidate must certify the originality of the Video clip submitted.<br>
				        5. The Video clip should not be longer than 3 minutes and include not more than 10 references. It must be in the MP4, MPEG, AVI, WMV & FLV format<br><br>
						<p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Guidelines for essay submission
						</p>
						  1.  The submissions should be made online or to respective Chairman’s<br>
							2. Only one entry per person is allowed.<br>
							3. The submission should be up to a maximum of 2000 words (special charactersnot included) in text format with Figures, tables, charts and photographs (if any)as attachments. Maximum of 2 attachments are allowed of 1 MB each.<br>
							4. All entries should be in Times New Roman font of size 12 pt with double line spacing.
							5. The candidate must certify the originality of the essay submitted.<br>
							6. The essay should be no longer than 2,000 words and include no more than 10references. It must be in the form of Vancouver style referencing, including a maximum of one table or figure, and be submitted in the format of a word document double-spaced and on a white background<br><br>

						    <b>The Competition is open for submission of essay online from November 26,2018, 12:00 am -January 26, 2019, till 11:59 pm. </b>

							<b>After the initial evaluation, shortlisted candidates will be notified. SC Department,
							AICC reserves the right to reject the application of shortlisted candidates if the
							person fails to provide authentication.</b><br><br>
                        <p class="survey-text">
							<img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">&nbsp;Terms and Condition
						</p>
						1. The competition is open only to Indian Nationals.<br>
						2. Online entries must be in English/ Hindi only.<br>
						3. All entries will be subjected to plagiarism check and those found unsuitable will be rejected
						   The Video clip should be an original piece of work.  copied from articles or from the internet will be liable for rejection.<br>
						4. By entering into the competition, entrant agrees upon that the Video clip to be published by SC 
						   Department, AICC and displayed on the SC Department, AICC website.<br>
						5. The Video clips which are not complete in all respect will stand cancelled.<br>
						6. The final decision in case of a dispute would rest with Chairman, of SC Department, AICC.
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