<div class="modal fade" id="myModal6" role="dialog">  
    <div class="modal-dialog modal-md"> 
        <div class="modal-content modal-content-block">
            <div class="modal-header no-btm-bdr"> 
                <center><div class="news-wrapper-headings">{{isset($isAppointmentPage)&&$isAppointmentPage?'Book Your Appointment':'Issues'}}</div></center>
                <button type="button" class="close btn-large" data-dismiss="modal" style="margin-top: -35px!important;">&times;</button> 
            </div>
            <div class="modal-body each-modal-pding"> 
                <div class="row">
                    <div id="wrapper">
                        <div class="social">
                            <ul>
                                <li class="entypo-twitter share" role="button" title="Twitter"   data-type="twitter" data-url="">
                                    <a href ="https://twitter.com/share?url={{secure_base_url('/?modal=ryv')}}"><i class="fa fa-twitter" style="transform: rotate(-90deg);"  aria-hidden="true"></i></a>
                                </li>
                                <li class="entypo-facebook share" role="button" title="Facebook"   data-type="facebook"  data-url="">
                                    <a href ="https://www.facebook.com/sharer/sharer.php?u={{secure_base_url('/?modal=ryv')}}"><i class="fa fa-facebook" style="transform: rotate(-90deg);" aria-hidden="true"></i></a>
                                </li>    

                                <li class="entypo-pintrest share" data-type="pinterest" data-url=''>
                                    <a href ="https://in.pinterest.com/pin/create/button/?url={{secure_base_url('/?modal=ryv')}}"><i class="fa fa-pinterest" style="transform: rotate(-90deg);" aria-hidden="true"></i></a>
                                </li>
                                <li class="entypo-pintrest share copy_link" data-url="{{secure_base_url('/?modal=ryv')}}">
                                    <i class="fa fa-link" style="transform: rotate(-90deg);" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        @if(isset($isAppointmentPage)&&$isAppointmentPage)
                            <p style="color:red; font-size:11px;">Submit your issue and an appointment time will be conveyed telephonically</p>
                        @endif
                        <p class="mobile-number-validation" style="color:red; font-size:12px;">Firstly please enter the mobile number</p>
                        <div class="issues-input form-group">
                            <input type="text" name="contact" placeholder="Enter 10 digit mobile number*" class="inputs issue-element" id="contact" maxlength="10">
                            <div class="issue-loading-img"></div>
                            <span id="contact-span"></span>
                        </div>
                        <!-- <div class="issues-input  form-group">
                            <input type="text" name="otp" placeholder="OTP*" class="inputs issue-element" id="otp" maxlength="6">
                            <div class="otp-check-img">
                                <span class="otp-img" id="check-icon"><img src="/images/check-icon.png"></span>
                                <span class="otp-img" id="wrong-icon"><img src="/images/wrong-icon.png"></span>
                            </div>
                            <span id="otp-span"></span>
                        </div> -->
                        <div class="issues-input  form-group">
                            <input type="text" id="issue-name" name="name" placeholder="Enter Name | Gender | Age" class="inputs issue-element" >
                            <span id="name-span"></span>
                        </div>
                        <div class=" form-group">
                            {!! Form::select('issue-state',$stateArray,'', array('id' => 'issue-state','class' => 'form-control select-inputs issue-element', 'id' => 'issue-state')) !!}
                            <span id="state-span"></span>
                        </div>
                        <div class="  form-group">
                            {!! Form::select('issue-district',$districtArray,null, array('id' => 'issue-district','class' => 'form-control select-inputs issue-element', 'id' => 'issue-district', 'disabled')) !!}
                            <span id="district-span"></span>
                        </div>
                        <div class=" form-group">
                            {!! Form::select('issue-mp',$mpArray,null, array('id' => 'issue-mp','class' => 'form-control select-inputs issue-element', 'id' => 'issue-mp', 'disabled')) !!}
                            <span id="mp-span"></span>
                        </div>
                        <div class=" form-group">
                            {!! Form::select('issue-mla',$mlaArray,null, array('id' => 'issue-mla','class' => 'form-control select-inputs issue-element', 'id' => 'issue-mla', 'disabled')) !!}
                            <span id="mla-span"></span>
                        </div>
                        <div class="issues-input  form-group">
                            <select class="form-control select-inputs issue-element" id="issue-village" name="issue-village" disabled>
                                <option value = "0">Select Village</option>
                            </select> 
                            <span id="village-span"></span>
                        </div>
                        <div class="issues-input  form-group">
                            <input type="text" name="topic" placeholder="Issue Topic*" class="inputs issue-element" name="issue-topic" id="issue-topic"  disabled>
                            <span id="topic-span"></span>
                        </div>
                        <div class="issues-textarea form-group">
                            <textarea placeholder="Issue Description*" class="issues-textarea-inputs issue-element" name="issue-description" id="issue-description" rows="5" disabled ></textarea>
                            <span id="issue-description-span"></span>
                        </div>      

                        <!-- <div class="issues-input form-group">
                            <input style="height: auto !important; padding:2px 0; margin-bottom: 15px;" disabled  id="upload-image" type="file" accept="image/*"  class="inputs" >
                            <div id="viewer" style="display: flex; flex-wrap:wrap; width: 100%;"  >
                            </div>
                        </div> -->

                      

                        <div class="issues-textarea form-group">
                            <input type="submit" value="Submit" name="submit" class="btn btn-primary pull-right view-btns mrgnTop25px" id="issue-submit" disabled >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
#wrapper {
  text-align:center;
  position:absolute;
  /*left:0;*/
  right:0;
  margin: 22px 0px;
  /*margin: 100px auto;*/
  width:160px;
}

input[type="checkbox"]{display:none;}

.checkbox:checked + .label{
    background: #0b446a;
    color: #fff;
    border-radius: 50%;
}

.checkbox:checked ~ .social {
  opacity:0;
  /*transform:scale(1) translateY(-90px);*/
  transform: rotate(90deg);
}

.label {
  background:#0b446a;
  font-size:16px;
  cursor:pointer;
  margin:0;
  padding:10px 12px;
  border-radius:50%;
  color:#fff;
}

.social {
  transform-origin:58% 235%;
  /*transform:scale(0) translateY(-190px);*/
  transform: rotate(90deg);
  opacity:1 !important;
  transition:.5s;
}
.social ul {
  position:relative;
  left:0;
  right:0;
  margin:-5px auto 0;
  color:#fff;
  height:30px;
  width:160px;
  /*width: 80px;*/
  background:#0b446a;
  padding:0;
  list-style:none;
  border-radius: 4px;
}

.social ul li {
  font-size:20px;
  cursor:pointer;
  width:40px;
  margin:0;
  padding:4px 0;
  text-align:center;
  float:left;
  display:block;
  height:22px;}

.social ul li:hover {
  color:rgba(0,0,0,.5);
}

.social ul:after {
    content:'';
    display:block;
    position:absolute;
    left:0;
    right:0;
    /*margin:35px auto;*/
    margin: 25px 5px;
    height:0;
    width:0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-top: 20px solid #0b446a;
}
</style>
