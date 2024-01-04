<div class="container">
	<div id="myvideo" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title bramb">
						<img src="{{ URL::to('/') . '/images/clipbord.svg'}}">&nbsp;VIDEO UPLOADING | 
						<span class="contest-text">Dr. B.R Amedkar  "Save Constitution Contest" </span>
					</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<!-- <div class="col-md-12" style="color:red;">Please don't upload video more than 30 MB size.</div> -->
						<form id="video-submit" method="post" enctype="multipart/form-data">
							<div class="col-md-6">
								<div class="form-group">
								    <label for="usr">Full Name:</label>
								    <input type="text" id="video_issue_name" name="name" class="form-control video-element" placeholder="Enter your name" required >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								    <label for="usr">Profession:</label>
								    <input type="text" id="video_issue_profession" name="profession" class="form-control video-element" placeholder="Enter your profession" required >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								    <label for="usr">Permanent Address:</label>
								    <input type="text" id="video_issue_address" name="address" class="form-control video-element" placeholder="Enter your permanent address" required >
								</div>
							</div>
							<div class="col-md-6">
								<div class=" form-group">
									<label for="usr">State:</label>
									{!! Form::select('eassy_state',$stateArray,'', array('id' => 'video-state','class' => 'form-control select-inputs video-element','required ')) !!}
									<span id="state-span"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class=" form-group">
									<label for="usr">City:</label>
									{!! Form::select('eassy_district',$districtArray,null, array('id' => 'video-district','class' => 'form-control select-inputs video-element','required')) !!}
									<span id="district-span"></span> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="issues-input  form-group">
									<label for="usr">Email Id:</label>
									<input type="text" id="video_issue_email" name="email" class="form-control video-element" placeholder="Enter your name" required >
								</div>
							</div>
							<div class="col-md-6">
								<div class="issues-input  form-group">
									<label for="usr">Mobile Number:</label>
									<input type="text" id="video_issue_mobile" name="mobile" class="form-control video-element" placeholder="Enter your name" maxlength="10">
									<span id="video-contact-err" style="color:red;"></span>
								</div>
							</div>
							<div class="col-md-12">
								<div class="issues-textarea form-group">
									<label for="usr">Upload Video:</label>
									<p class="up-vid">
										<input type="file" class="form-control center-block mt-2 video-element" name="videofile" id="videofile" required >

									</p>
								</div>
							</div>
							<div class="loader">
								<center><img  src="{{ URL::to('/') . '/images/loading.gif' }}" class="loading-gif"> </center>
							</div>
							<div class="col-md-12">
								<div class="checkbox">
								    <label><input type="checkbox" id="video_issue_terms_cond" name="terms_condition"><a href="{{ URL::to('/') . '/samvidhan' }}" target="_blank">I accept all Terms and Conditions and agree to participate in the Contest.</a></label>
								</div>
							</div>
							<div class="col-md-12 message" style="color:red;display: none;">Please don't refresh or close window.</div>
							<div class="col-md-12">
								<button class="essay">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>