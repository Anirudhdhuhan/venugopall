@extends('appointment.layout')

@section('content')
    <div id="fullscreen-container" class="container bg-white mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="status-section mt-2 p-1">
                    <div class="media">
                        <img src="{{ STATIC_BASE_URL . '/images/pinc12.jpg' }}" class="round-status-image">
                        <div class="media-body">
                            <h5 class="mt-0" style=""><u>Message By Preetham Nagarigari</u></h5>
                            <p class="mb-0" style="white-space:pre-line;">   @if($status)
                                    {{ str_limit($status->status, 500, '...') }}
                                @else
                                    Data not available
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-md-9">
                        <div id="appointment_button">
                            @foreach($offices as $office)
                                @if($office->mla_id||$office->mp_id)
                                    <a class="state book-appointment" style="color:#fff; padding:5px; background-color:{{$_REQUEST['mla']==$office->mla_id?'#0b446a':($_REQUEST['mp']==$office->mp_id?'#0b446a':'#013659')}}" href="{{url('/appointment/'.$office->state.'?mla='.$office->mla_id.'&mp='.$office->mp_id)}}">{{ucwords($office->mla?:$office->mp)}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <button class="book-appointment center-block" data-toggle="modal" data-target="#myModal6">Book Your Appointment</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.issue_modal')
        <div class="row">
            <div class="col-md-9 mt-1">
                <div class="appointment-box">
                    <div class="bg-success text-white p-2 mt-2">
                        <i class="fa fa-calendar white" aria-hidden="true"></i> Today Appointments, {{date('d-m-yy')}}
                        <span id="fullscreen">&ensp; 
                            <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M6.426 10.668l-3.547-3.547-2.879 2.879v-10h10l-2.879 2.879 3.547 
                                3.547-4.242 4.242zm11.148 2.664l3.547 3.547 2.879-2.879v10h-10l2.879-2.879-3.547-3.547 
                                4.242-4.242zm-6.906 4.242l-3.547 3.547 2.879 2.879h-10v-10l2.879 2.879 3.547-3.547 
                                4.242 4.242zm2.664-11.148l3.547-3.547-2.879-2.879h10v10l-2.879-2.879-3.547 3.547-4.242-4.242z"/>
                            </svg>
                        </span>
                    </div>
                    <div id="appointment_tbody">
                        @if($appointment)
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr class="">
                                    <th class="py-1" scope="col">S.
                                        No.</th>
                                    <th class="py-1" scope="col">Name</th>
                                    <th class="py-1" scope="col">UIN</th>
                                    <th class="py-1" scope="col">Assigned to</th>
                                    <th class="py-1" scope="col">Time</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                @foreach($appointment as  $index=>$appoint)
                                    <tr>
                                        <th scope="row">{{$index+ 1  }}</th>
                                        <td class="h4">{{$appoint['name'][0]}}</td>
                                        <td class="h4">
                                            @if(count($appoint['uin']))
                                                {{join(',', $appoint['uin'])}}
                                            @else
                                                Not available
                                            @endif
                                        </td>
                                        <td class="h5">{{join(',', $appoint['assigned_to'])}}</td>

                                        <td class="h4 text-muted">{{$appoint['created_at'][0]}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="p-1 no appoint">
                                <center>
                                    <img src="{{ STATIC_BASE_URL . '/images/cal.svg' }}" height="50px;" class="mt-3 center-block"><br> 
                                    No appointment found
                                </center>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-1">
                <div class="upcoming-events-appoint mt-2">
                    <div class="bot-line">
                        <img src="{{ STATIC_BASE_URL . '/images/cal.svg' }}" class="margeen-4">
                        <span class="upcoming-event-text-blue">Upcoming Events</span>
                        <!-- <a href="{{ STATIC_BASE_URL . '/event_schedule' }}"> -->
                            <div class="survey-view pull-right" style="color:#fff; font-size:14px;">
                                <div id="wrapper">
                                    <div class="social">
                                        <ul>
                                            <li class="entypo-twitter share" role="button" title="Twitter"   data-type="twitter" data-url="">
                                                <a href="https://twitter.com/share?url={{secure_base_url('/?modal=event')}}">
                                                    <i class="fa fa-twitter" style="transform: rotate(-90deg);"  aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="entypo-facebook share" role="button" title="Facebook"   data-type="facebook"  data-url="">
                                                <a href ="https://www.facebook.com/sharer/sharer.php?u={{secure_base_url('/?modal=event')}}">
                                                    <i class="fa fa-facebook" style="transform: rotate(-90deg);" aria-hidden="true"></i>
                                                </a>
                                            </li>    

                                            <li class="entypo-pintrest share" data-type="pinterest" data-url=''>
                                                <a href ="https://in.pinterest.com/pin/create/button/?url={{secure_base_url('/?modal=event')}}">
                                                    <i class="fa fa-pinterest" style="transform: rotate(-90deg);" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="entypo-pintrest share copy_link" data-url="{{secure_base_url('/?modal=event')}}">
                                                <i class="fa fa-link" style="transform: rotate(-90deg);" aria-hidden="true"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- </a> -->
                    </div>
                    <div class="row">
                        @if(!count($events))
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 class="no-upcoming-event">No Upcoming Event</h3>
                        </div>
                        @endif
                        @foreach($events as $row)
                            <div class="col-md-12" style="border-bottom: solid 2px #0144;">
                                <p class="upcoming-text-blue mt-1">{{ $row->name }}</p>
                                <p class="upcoming-time-blue mt-1" style="font-size: 14px !important;">
                                    <i class="fa fa-calendar blue" aria-hidden="true"></i> &nbsp;{{ $row->date }}
                                </p>
                                <p class="upcoming-time-blue mb-2" style="font-size: 14px !important;">
                                    <i class="fa fa-clock blue" aria-hidden="true"></i> &nbsp;{{ $row->time }}
                                </p>
                                <p class="upcoming-time-blue mb-3" style="font-size: 16px !important;">
                                    <i class="fa fa-map-marker blue" aria-hidden="true"></i>&nbsp;
                                    {{ $row->location1 }}<span>&nbsp;{{ $row->location2 }}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="text" name="myInput" value="" id="myInput" style="border:none;color:#fff;">
     <style type="text/css">

        .status-section {
            min-height: 100px;
            display: flex;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05);
        }

        .round-status-image {
            height: 120px;
            width: 120px;
            border-radius: 50%;
            border: solid 4px #003f70;
            margin: 15px;
        }
        .table thead tr th{
            font-size: 16px !important;
            color: #333;
            opacity: 0.9;
        }
        .table tbody tr td{
            font-size: 16px !important;
            color: #0b446a;
            opacity: 0.9;
        }


        #wrapper {
          text-align:center;
          position:absolute;
          /*left:0;*/
          right:0;
          margin: 22px 15px;
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
          height:35px;
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

/*li[class*="twitter"] {background:#6CDFEA;padding:12px 0;}
li[class*="gplus"] {background:#E34429;padding:12px 0;}
li[class*="dropbox"] {background:#8DC5F2;padding:12px 0;}
li[class*="github"] {background:#9C7A5B;padding:12px 0;}
li[class*="instagram"] {background:#0E68CE;padding:12px 0;}
li[class*="youtube"] {background:#CC181E;padding:12px 0;}*/


    </style>
   <script>
        var base_url = "{{ secure_base_url('/') }}";

            function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("link: " + copyText.value+" copied to clipboard.");
        }
        $('.copy_link').click(function (e) {
                var link=$(this).data('url');
                // alert(link);
                $('#myInput').attr('value',link);
                myFunction();

        });
        
        $(document).ready(function() {
            $('body').on('submit', "#essay-submit", function(e){
                e.preventDefault();
                if($("#issue_terms_cond").prop('checked') == false)
                {
                    alert("Please accept our tems and conditions!!");
                    return false;
                }
                
                var length = $("#issue_mobile").val().length;
                /*issue length validation*/
                var words = $('#issue_essay_details').val().split(' ');
                var issue_length = words.length;
                /*all validation*/
                if(($("#issue_name").val() =="") && ($("#issue_profession").val() =="") && ($("#issue_address").val() =="") && ($("#eassy-state").val() =="") && ($("#eassy-district").val() =="") && ($("#issue_email").val() =="") && ($("#issue_mobile").val() =="") && ($("#issue_essay_details").val() =="") && ($("#issue_terms_cond").val() ==""))
                {
                    alert("All fields are required!!");
                    return false;
                }
                else if(length < 10)
                {
                    $('#contact-err').html('Please enter valid contact number');
                    return false;
                }
                else if(!$.isNumeric($("#issue_mobile").val()))
                {
                    $('#contact-err').html('Please enter valid number');
                    return false;
                }
                else if(issue_length > 2000)
                {
                    $('#contact-err').html('');
                    alert("Length of the eassy should be less than 2000!!");
                    return false;
                }
                else if (!validateEmail($("#issue_email").val())) 
                {
                    alert("Please enter valid email number!!");
                    return false;
                }
                else{
                    $(".loader").show();
                    var data = $('#essay-submit').serialize();
                    $.ajax({
                        url: base_url + '/essay',
                        type: "post",
                        data: {data},
                        success: function(data) {
                            $('#myessay').modal('hide');
                            $(".loader").hide();
                            $('#submited').modal('show');
                            $('#essay-submit')[0].reset();
                        }
                    });
                }
            });
            $('body').on('submit', "#video-submit", function(e){
                e.preventDefault();
                var length = $("#video_issue_mobile").val().length;
                /*issue length validation*/
                var issue_length = $("#issue_essay_details").val().length;

                if($("#video_issue_terms_cond").prop('checked') == false)
                {
                    alert("Please accept our tems and conditions!!");
                    return false;
                }
                /*all validation*/
                if(($("#video_issue_name").val() =="") && ($("#video_issue_profession").val() =="") && ($("#video_issue_address").val() =="") && ($("#video-state").val() =="") && ($("#video-district").val() =="") && ($("#video_issue_email").val() =="") && ($("#video_issue_mobile").val() =="") && ($("#videoToUpload").val() =="") && ($("#video_issue_terms_cond").val() ==""))
                {
                    alert("All fields are required!!");
                    return false;
                }
                else if(length < 10)
                {
                    $('#video-contact-err').html('Please enter valid contact number');
                    return false;
                }
                else if(!$.isNumeric($("#video_issue_mobile").val()))
                {
                    $('#video-contact-err').html('Please enter valid number');
                    return false;

                }
                else if (!validateEmail($("#video_issue_email").val())) 
                {
                    alert("Please enter valid email number!!");
                    return false;
                }
                else{
                    $(".loader").show();
                    $(".message").show();
                    $("input[type=submit]").attr("disabled", "disabled");
                    var data = $('#video-submit').serialize();
                    var file_data = $('#videofile').prop('files')[0]; 
                
                    $.ajax({

                        method : "post",
                        url : base_url + '/video',
                        data :new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(data)
                        {
                            $('#myvideo').modal('hide');
                            $('#video-submit')[0].reset();
                            $('input[type=submit]').removeAttr("disabled");
                            $(".loader").hide();
                            $(".message").hide();
                            $('#submited').modal('show');
                        }
                    });
                }
            });
            /*video upload validation*/
            $("#videofile").change(function (){
                var iSize = ($("#videofile")[0].files[0].size/1024/1024);
                if(iSize > 25)
                {
                    alert("Max file size 25 MB!!");
                    $("#videofile").val(null);
                    return false;
                }
            });
            $("#eassy-state").on("change", function(){
                $.ajax({
                    url: base_url + '/locations/' + $('#eassy-state').val(),
                    type: "get",
                    data: {},
                    success: function(data) {
                        var district = data.data.district;

                        $('#eassy-district').empty();

                        $('#eassy-district').append($('<option>').text('Select District').attr('value', 0));
                        for (i = 0; i < district.length; i++) {
                            $('#eassy-district').append($('<option>').text(district[i].key).attr('value', district[i].value));
                        }
                    }
                });
            });
            $("#video-state").on("change", function(){
                $.ajax({
                    url: base_url + '/locations/' + $('#video-state').val(),
                    type: "get",
                    data: {},
                    success: function(data) {
                        var district = data.data.district;

                        $('#video-district').empty();

                        $('#video-district').append($('<option>').text('Select District').attr('value', 0));
                        for (i = 0; i < district.length; i++) {
                            $('#video-district').append($('<option>').text(district[i].key).attr('value', district[i].value));
                        }
                    }
                });
            });
            $('body').on('submit', "#subscribe_user", function(e){
                e.preventDefault();
                var email = $('#subscribe_email').val();
                $.ajax(
                {
                    method : "post",
                    url : base_url + '/subscribe-user',
                    data:
                    {
                        'email' :   email,
                    },
                    dataType: "json",
                    success:function(data)
                    {
                        if(data == "1")
                        {
                            alert("Thank you for subscribe!!");
                        }else if(data == "2"){
                            alert("Already subscribed");
                        }
                        else{
                            alert("Something went wrong, Please re-enter your email id");
                        }
                        $('#subscribe_user').modal('hide');
                        location.reload();
                        
                    }
                });
            });
        });
        $(document).ready(function() {
            var fullscreen = document.getElementById("fullscreen");
            var fullscreenContainer = document.getElementById("fullscreen-container");
            fullscreen.addEventListener("click", function () {
                if (fullscreenContainer.requestFullscreen) {
                    fullscreenContainer.requestFullscreen();
                } else if (fullscreenContainer.mozRequestFullScreen) { /* Firefox */
                    fullscreenContainer.mozRequestFullScreen();
                } else if (fullscreenContainer.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
                    fullscreenContainer.webkitRequestFullscreen();
                } else if (fullscreenContainer.msRequestFullscreen) { /* IE/Edge */
                    fullscreenContainer.msRequestFullscreen();
                }
            })
            $('body').on('input', '#contact', function(){
                var length = this.value.length;
                if($.isNumeric($(this).val()))
                {
                    if(length > 10)
                    {
                        $('#contact-span').html('Please enter valid contact number');
                        return;
                    }
                    if (length == 10) {
                        $('.issue-loading-img').show();
                        $.ajax({
                            url: base_url + '/issue-verification',
                            type: "get",
                            data: {
                                'contact': this.value,
                            },
                            success: function(data) {
                                $('#contact-span').html('OTP sent to above number (Wait for 120 seconds)');
                                $('.issue-loading-img').hide();
                                $('.mobile-number-validation').hide();
                            }
                        });
                    }
                }else{
                    $('#contact-span').html('Please enter valid number');
                    return;
                }
                
            });
            $('body').on('input', '#otp',function(){
                var length = this.value.length;
                if (length >= 6) {
                    $.ajax({
                        url: base_url + '/issue-verification-otp',
                        type: "get",
                        data: {
                            'contact': $('#contact').val(),
                            'otp': this.value,
                        },
                        success: function(data) {
                            if (data == 1) {
                                $('.issue-element').prop("disabled", false);
                                $('.view-btn').prop("disabled", false);
                                $('#check-icon').show();
                                $('#wrong-icon').hide();
                                $('#issue-submit').prop("disabled",false);
                            } else {
                                $('#otp-span').html('Wrong OTP Entered');
                                $('#wrong-icon').show();
                                $('#check-icon').hide();
                            }
                        }
                    });
                }
            });
            $("#issue-state").on("change", function(){
                $.ajax({
                    url: base_url + '/locations/' + $('#issue-state').val(),
                    type: "get",
                    data: {},
                    success: function(data) {
                        var mla = data.data.mla;
                        var mp = data.data.mp;
                        var district = data.data.district;

                        $('#issue-district').empty();
                        $('#issue-mla').empty();
                        $('#issue-mp').empty();

                        $('#issue-mp').append($('<option>').text('Select MP Constituency').attr('value', 0));
                        for (i = 0; i < mp.length; i++) {
                            $('#issue-mp').append($('<option>').text(mp[i].key).attr('value', mp[i].value));
                        }

                        $('#issue-mla').append($('<option>').text('Select MLA Constituency').attr('value', 0));
                        for (i = 0; i < mla.length; i++) {
                            $('#issue-mla').append($('<option>').text(mla[i].key).attr('value', mla[i].value));
                        }

                        $('#issue-district').append($('<option>').text('Select District').attr('value', 0));
                        for (i = 0; i < district.length; i++) {
                            $('#issue-district').append($('<option>').text(district[i].key).attr('value', district[i].value));
                        }
                    }
                });
            });
            $('body').on('change', "#issue-mla", function(){
                $.ajax({
                    url: base_url + '/villagelist',
                    method: "post",
                    data: {
                        'constituency_id': $('#issue-mla').val(),
                    },
                    success: function(data) {
                        var village = data.villageArray;
                        $('#issue-village').empty();
                        $.each(village, function(index, value) {
                            $('#issue-village').append($('<option>').text(value).attr('value', index));
                        });

                        $("#issue-village").append($("#issue-village option").remove().sort(function(a, b) {
                            var at = $(a).text(),
                                bt = $(b).text();
                            return (at > bt) ? 1 : ((at < bt) ? -1 : 0);
                        }));

                        $('#issue-village').prepend($('<option>').text('Select Village').attr('value', ''));
                        $('#issue-village').val('');
                    }
                });
            });
            $('#issue-submit').click(function(){
                var data = $('.issue-element').serialize();
                if(!validateIssueForm())
                    return;
                $.ajax({
                    url: base_url + '/issue?' + data,
                    type: "post",
                    data: {},
                    success: function(data) {
                        alert('Thanks, Your issue has been submitted!');
                        $('#myModal6').hide();
                        $(".modal-backdrop").remove();
                        $('.book-appointment').click();
                    }
                });
                
                
            });
        });
        function validateIssueForm(){
            if(!$('#contact').val().trim()){
                alert('Contact Number required');return false;
            }
            if(!$('#otp').val().trim()){
                alert('OTP required');return false;
            }
            if(!$('#issue-name').val().trim()){
                alert('Name required');return false;
            }
            if(!$('#issue-state').val().trim()){
                alert('State required');return false;
            }
            if(!$('#issue-topic').val().trim()){
                alert('Topic required');return false;
            }
            if(!$('#issue-description').val().trim()){
                alert('Description required');return false;
            }
            return true
        }
        // Function that validates email address through a regular expression.
        function validateEmail(sEmail) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(sEmail)) {
                return true;
            }
            else {
                return false;
            }
        }
        function render(data) {
            var output = [];
            var html = '';
            data.forEach(function (appoint, index) {
                index = index + 1;
                appoint.uin = appoint.uin.join(',');
                appoint.assigned_to = appoint.assigned_to.join(',');
                appoint.created_at =  appoint.created_at[0]['date'].replace('.000000', '') || 0;
                appoint.name = appoint.name[0] || '';

                html = "  <tr>\n" +
                    "     <th scope=\"row\"> " + index + "</th>\n" +
                    "     <td class=\"h4\">" + appoint.name + "</td>\n" +
                    "     <td class=\"h4\"> " + appoint.uin + "</td>\n" +
                    "     <td class=\"h5\"> " + appoint.assigned_to + "</td>\n" +
                    "     <td class=\"h4 text-muted\">" + appoint.created_at + "</td>\n" +
                    "     </tr>";

                output.push(html)

            });
            if ($('#tbody').length)
                document.getElementById("tbody").innerHTML = output.join(' ');
            else if(output.length){
                var table=  "<table class=\"table table-striped table-bordered\">\
                            <thead>\
                                <tr class=\"\">\
                                    <th class=\"py-1\" scope=\"col\">S.No.</th>\
                                    <th class=\"py-1\" scope=\"col\">Name</th>\
                                    <th class=\"py-1\" scope=\"col\">UIN</th>\
                                    <th class=\"py-1\" scope=\"col\">Assigned to</th>\
                                    <th class=\"py-1\" scope=\"col\">Time</th>\
                                </tr>\
                                </thead>\
                                <tbody id=\"tbody\">"+output.join(' ')+"</tbody>\
                            </table>";
                document.getElementById("appointment_tbody").innerHTML =table;

            }
        }
        function laodAppointment() {
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                if (this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var output=[];
                    var html='',text='',q_string1='mla=',q_string2='mp=',color='';
                    if (data.offices) {
                        var offices=data.offices;
                        var url_var=getUrlVars();
                        offices.forEach(function (office, index) {
                            color='#0b44ff';
                            if(office.mla_id||office.mp_id){
                                if(office.mla)
                                    text=office.mla;
                                else
                                    text=office.mp;
                                if(office.mla_id)
                                    q_string1+=office.mla_id;
                                if(office.mp_id)
                                    q_string2+=office.mp_id;
                                if(url_var.mla&&parseInt(url_var.mla)==office.mla_id){
                                    color="#0b446a";
                                }
                                if(url_var.mp&&parseInt(url_var.mp)==office.mp_id){
                                    color="#0b446a";
                                }
                                html="<a class=\"state\" style=\"background-color:"+color+"\" href=\""+base_url+"/appointment/"+office.state+"?"+q_string1+"&"+q_string2+"\">"+text+"</a>";
                                output.push(html);
                            }
                        });
                        document.getElementById("appointment_button").innerHTML =output.join(' ');
                    }else{
                        document.getElementById("appointment_button").innerHTML ="";
                    }
                    if (data.appointment) {
                        render(data.appointment)
                    }
                    
                }
            };
            if(window.location.href.indexOf('?')!= -1)
                xhttp.open("GET", window.location.href + '&is_ajax=1');
            else
                xhttp.open("GET", window.location.href + '?is_ajax=1');
            xhttp.send();
        }
        function getUrlVars()
        {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars[hash[0]] = hash[1];
            }
            return vars;
        }
        function init() {
            setInterval(function () {
                laodAppointment();
            }, 10000)
        }
        init();
    </script>

@endsection