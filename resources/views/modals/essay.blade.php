<div class="container">
	<div id="myessay" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title bramb">
						<img src="{{ URL::to('/') . '/images/clipbord.svg'}}">&nbsp;ESSAY WRITING | 
						<span class="contest-text">Dr. B.R Amedkar  "Save Constitution Contest" </span>
					</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form id="essay-submit" method="post">
								<div class="col-md-6">
									<div class="form-group">
									    <label for="usr">Full Name:</label>
									    <input type="text" id="issue_name" name="name" class="form-control essay-element" placeholder="Enter your name" required >
									</div>
								</div>
								<div class="col-md-6 ">
									<div class="form-group">
									    <label for="usr">Profession:</label>
									    <input type="text" id="issue_profession" name="profession" class="form-control essay-element" placeholder="Enter your profession" required >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									    <label for="usr">Permanent Address:</label>
									    <input type="text" id="issue_address" name="address" class="form-control essay-element" placeholder="Enter your permanent address" required >
									</div>
								</div>
								<div class="col-md-6">
									<div class=" form-group">
										<label for="usr">State:</label>
										{!! Form::select('eassy_state',$stateArray,'', array('id' => 'eassy-state','class' => 'form-control select-inputs essay-element ','required ')) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class=" form-group">
										<label for="usr">City:</label>
										{!! Form::select('eassy_district',$districtArray,null, array('id' => 'eassy-district','class' => 'form-control select-inputs essay-element','required')) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="issues-input  form-group">
										<label for="usr">Email Id:</label>
										<input type="text" id="issue_email" name="email" class="form-control essay-element" placeholder="Enter your name" required >
									</div>
								</div>
								<div class="col-md-6 cl-xs-12">
									<div class="issues-input  form-group">
										<label for="usr">Mobile Number:</label>
										<input type="text" id="issue_mobile" name="mobile" class="form-control essay-element" placeholder="Enter your name" required >
										<span style="color:red;" id="contact-err"></span>
									</div>
								</div>
								<div class="col-md-12">
									<div class="issues-textarea form-group">
										<label for="usr">Essay:</label>
										<textarea name="essay" id="issue_essay_details" placeholder="Write Essay in not more than 2000 words" class="issues-textarea-inputs essay-element" rows="5" required ></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkbox">
									    <label><input id="issue_terms_cond" name="terms_condition" type="checkbox" value="" required >I accept all Terms and Conditions and agree to participate in the Contest.</label>
									</div>
								</div>
								<div class="col-md-12">
									<input type="submit" value="Submit" name="submit" class="essay"  >
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>