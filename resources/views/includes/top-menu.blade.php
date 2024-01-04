<div class="header-one hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-7">
                <a href="https://www.facebook.com/preethamnagarigari/" target="_blank">
                    <img src="/images/facebook.svg" class="padding-img">
                </a>
                <a href=" https://twitter.com/Preetham_INC" target="_blank">
                    <img src="/images/twitter.svg" class="padding-img">
                </a>
                <a href="https://www.youtube.com/channel/UCDgjkXyjmwK51MMqL4sWa3w" target="_blank">
                    <img src="/images/youtube.svg" class="padding-img">
                </a>
                <a href="https://www.instagram.com/preethamnagarigari/?hl=en" target="_blank">
                    <img src="/images/insta.png" height="22px">
                </a>
                <a href="https://www.molitics.in/leader/17049/Preetham-Nagarigari" target="_blank">
                    <img src="/images/moliticslogo.png" class="padding-img" height="48px">
                </a>
            </div>
            <div class="col-md-4 hidden-xs">
                <button type="button" class="btn btn-primary" style="margin-top: 7px; background: #efefef; border: none;font-size: 16px;text-align: center; color:blue;">
                    <a href="/dharni-portal">
                        <img src="https://listimg.pinclipart.com/picdir/s/8-85913_click-png-icon-click-icon-transparent-background-clipart.png" height="29px" style="border-radius:10px;">
                        <u>Dharani Portal - Land issues Form</u>
                    </a>
                </button>
            </div>
            <div class="col-md-4 col-xs-5">
                <div class="pull-right">
                    <button class="subscribe" id="btns">Subscribe</button>
                    <a href="{{secure_base_url('/appointment/'.(isset($office)&&$office?$office->state.'?mla='.$office->mla_id.'&mp='.$office->mp_id:(isset($candidate)&&$candidate?$candidate->state.'?mla='.$candidate->mla_constituency.'&mp='.$candidate->mp_constituency:'')))}}">
                        <button class="login">Appointment</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-two hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3 class="logo-text">
                    <a href="{{STATIC_BASE_URL . '/' }}">
                        <img src="/images/newlogo.png" class="logo-congress">
                    </a>
                </h3>
            </div>
            <div class="col-md-9">
                <div class="menu-box">
                    <ul><!--reverse code-->
                        <li><a href="/contact_us" class=" @if(Session::get('clicked_link') == 'join_the_movement') menu_active @endif">Join the Movement</a></li>
                        <li><a href="/know-more" class=" @if(Session::get('clicked_link') == 'know-more') menu_active @endif">About</a></li>
                        <li><a href="/video_gallery" class=" @if(Session::get('clicked_link') == 'media') menu_active @endif">Media</a></li>
                        <li><a href="/key-issue/1" class=" @if(Session::get('clicked_link') == 'key_issue') menu_active @endif">Key Issues</a></li>
                        <li><a href="/mission" class=" @if(Session::get('clicked_link') == 'mission') menu_active @endif">Mission & Vision</a></li>
                        <li><a href="/" class=" @if(Session::get('clicked_link') == 'home') menu_active @endif" >Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<header class="hidden-lg hidden-md" style="margin-top: 90px;">
    <div class="mobi-head">
        <div class="header-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-7">
                        <a href="https://www.facebook.com/preethamnagarigari/" target="_blank">
                            <img src="/images/facebook.svg" class="padding-img">
                        </a>
                        <a href="https://twitter.com/Preetham_INC" target="_blank">
                            <img src="/images/twitter.svg" class="padding-img">
                        </a>
                        <a href="https://www.youtube.com/channel/UCDgjkXyjmwK51MMqL4sWa3w">
                            <img src="/images/youtube.svg" class="padding-img">
                        </a>
                        <a href="https://www.instagram.com/preethamnagarigari/?hl=en" target="_blank">
                            <img src="/images/insta.png" height="22px">
                        </a>
                        <a href="//www.molitics.in/leader/17049/Preetham-Nagarigari">
                            <img src="/images/moliticslogo.png" class="padding-img" height="48px">
                        </a>					
                    </div>
                    <div class="col-md-6 hidden-xs"></div>
                    <div class="col-md-2 col-xs-5 ">
                        <div class="pull-right">
                            <button class="subscribe" id="btns">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-ones">
            <span class="mobi-head-tgl" onclick="openNav()" onclick="closeNav()">
                <img src="/images/menu.svg" class="toogle-icons">
            </span>
            <span class="dalitlogo">
                <a href="{{STATIC_BASE_URL }}">
                    <img src="/images/prewhite.png" alt="molitics-logo" class="dalitlogo">
                </a>
            </span>						
        </div>
        <div class="temp message hidden-md hidden-lg">
            <p class="app-add">
                <a href="/dharni-portal">
                    <img src="https://listimg.pinclipart.com/picdir/s/8-85913_click-png-icon-click-icon-transparent-background-clipart.png" height="18px">
                    <u>Dharani Portal - Land issues Form</u>
                   <!-- <img src="{{ URL::to('/') . '/images/close.svg' }}" class="ml-1 alert-close"> -->
                </a>
            </p>
        </div>
        <div id="mySidenav" class="sidenav">
            <div class="mobi-register">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <img src="/images/prewhite.png" class="sidenav-logo" height="50px">
            </div>
            <ul>
                <li class="mobi-menu col-sm-6 col-xs-12">
                    <a href="/" class=" @if(Session::get('clicked_link') == 'home') menu_active lc-1 @endif" >Home</a>
                </li>
                <li class="mobi-menu col-sm-6 col-xs-12">
                    <a href="/key-issue/1" class=" @if(Session::get('clicked_link') == 'key_issue') menu_active lc-1 @endif">Key Issues</a>
                </li>
                <li class="mobi-menu col-sm-6 col-xs-12">
                    <a href="/mission" class=" @if(Session::get('clicked_link') == 'mission') menu_active lc-1 @endif">Mission & Vision</a>
                </li>
                <li class="mobi-menu col-sm-6 col-xs-12">
                    <a href="/video_gallery" class=" @if(Session::get('clicked_link') == 'media') menu_active lc-1 @endif">Media</a>
                </li>
                <li class="mobi-menu col-sm-6 col-xs-12">
                    <a href="/know-more" class=" @if(Session::get('clicked_link') == 'know-more') menu_active lc-1 @endif">About</a>
                </li>
                <li class="mobi-menu col-sm-6 col-xs-12">
                    <a href="/contact_us" class=" @if(Session::get('clicked_link') == 'join_the_movement') menu_active lc-1 @endif">Join the Movement</a>
                </li>
            </ul>								
        </div>
    </div>
</header>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;">Registration as a Voter in Nalgonda, Warangal, and Khammam Graduate Constituencies</h5>
            </div>
            <div class="modal-body">
                <form style="padding:10px 25px;"  id="graduate_user" action="{{secure_base_url('/graduate-user')}}" method="post">
                    <div class="form-group">
                        <input class="form-control" name="name" id="register-name" type="text" placeholder="Enter Your Name" >
                    </div>
                    <div class="form-group">
                        <input class="form-control dwnld-email" id="register-contact" type="text" name="contact" placeholder="Enter Your Contact Number">
                    </div>
                    <div class="form-group">
                        <input class="form-control dwnld-email" id="register-email"  type="email" name="email" placeholder="Enter Your Email Address">
                    </div>
                    <div class="form-group">
                        <select id="register-qualification" style="box-shadow:inset 0 1px 1px rgba(0,0,0,.075); height:35px; width:100%; border:solid 1px #ccc; border-radius:4px; font-size:15px; opacity:0.8; padding:5px 10px;">
                            <option value="0">Select Your Qualification</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Post-Graduate">Post Graduate</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="register-constituency" style="box-shadow:inset 0 1px 1px rgba(0,0,0,.075); height:35px; width:100%; border:solid 1px #ccc; border-radius:4px; font-size:15px; opacity:0.8; padding:5px 10px;">
                            <option value="0">Select Your Constituency</option>
                            <option value="Nalgonda">Nalgonda</option>
                            <option value="Warangal">Warangal</option>
                            <option value="Khammam">Khammam</option>
                        </select>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary center-block register-voter" value="submit" id="contact_us_form_submit"> Submit</button> -->
                    <input type="button" class="btn btn-color btn-md btn-block" value="Submit" id="contact_us_form_submit" style="background-color:#0b446a; color:#fff;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>


<div id="subscribeModal">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <p class="news-letter">Subscribe For Newsletter</p>
    <form id="subscribe_user" class="newsletter-form">
        <center>
            <input type="email" name="email"  id="subscribe_email" class="forms-style" placeholder="Please Enter Your Email" required>
        </center>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
        <button type="submit" class="subscribe-btn center-block" value="submit">Subscribe</button>
    </form>
</div>

<script>
    var base_url = "{{ STATIC_BASE_URL }}";
    var ajax_submit=true;
    $("body").on('click','#contact_us_form_submit',function(e)
    {
        // alert('hii');
        e.preventDefault();
        var name = $('#register-name').val();
        if(name==''){
            alert("Please Enter Your Name");
            return;
        }

        var mobile = $('#register-contact').val();
        if((!mobile)||mobile.length > 10 || mobile.length < 10){
            alert("Please Enter Valid Phone Number");
            return;
        }

        // var email = $('#register-email').val();
        // if(email == ''){
        //     alert("Please Enter Valid Email Address");
        //     return;
        // }
        var email = $('#register-email').val();

        var qualifications = $('#register-qualification').val();
        if(qualifications == '0'){
            alert("Please Select Qualification");
            return;
        }

        var constituency = $('#register-constituency').val();
        if(constituency == '0'){
            alert("Please Select Constituency");
            return;
        }

        
        if(ajax_submit){
            ajax_submit=false;
            $.ajax(
            {
                method : "post",
                url : base_url + '/graduate-user',
                data :{
                    name:name,
                    email:email,
                    mobile:mobile,
                    qualifications:qualifications,
                    constituency:constituency
                },
                // contentType: false,
                // cache: false,
                // processData:false,
                success:function(data)
                {
                    ajax_submit=true;
                    if (data&&data.success) {
                        alert('Thanks for your interest. We will contact you shortly.');
                        // window.location.reload();
                        window.location.replace("https://ceotserms1.telangana.gov.in/MLC/Form18.aspx");
                    }
                    
                }
            });
        }

    });
</script>

<script type="text/javascript">
    $('.subscribe').click(function (e) {
        $("#subscribeModal").css({
            'position': 'absolute',
            'left': $(this).offset().left,
            'top': $(this).offset().top + $(this).height() + 5
        }).show("slow");
    });

    $('.close').click(function (e) {
        $("#subscribeModal").hide();
    });


    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    $(document).ready(function (c) {
        $('.alert-close').on('click', function (c) {
            $('.message').hide('fast', function (c) {
                $('.message').hide();
            });
        });
    });
</script>