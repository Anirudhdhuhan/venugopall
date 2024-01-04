<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    @include('layout.head')
    <title>Preetham Nagarigari</title>
</head>
<main>
    @include('includes.top-menu')
    <div class="banner hidden-xs" style="background-image: url({{ STATIC_BASE_URL . '/images/baba.jpg' }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="key-people">
                        <!-- <center>
							<div class="key-people-text mt-2">
								Direct Connect
							</div>
						</center> -->
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="banner hidden-xs" style="background-image: url({{ STATIC_BASE_URL . '/images/nagri4.jpeg' }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="key-people">
                    </h3>
                </div>
            </div>
        </div>
    </div> -->
    <div class="banner-mission hidden-lg hidden-md hidden-sm" style="background-image: url({{ STATIC_BASE_URL . '/images/nagri5.jpeg' }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="key-people">
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <section class="section-container">
        <div style="    background-color: white;">

            <div class="container paddingTtoBtm50">
                <div class="contact-container">
                    <div class="row">
                        <div class="">

                            <div class="news-wrapper-headings-css">Join The Movement</div>

                            <div class="contact-inputs">
                                <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                    <input type="text" name="name" class="submit-elements form-group inputs" placeholder="Name*" required id="volunteer-name">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                    <input type="text" name="phone_no" class="submit-elements form-group inputs" pattern="\d{10}" placeholder="Contact No*" required id="volunteer-contact" maxlength="10" onkeypress="phoneno('#volunteer-contact')">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                    {!! Form::select('state',$stateArray,'', array('id' => 'filter-state-list','class' => 'submit-elements form-control select-inputs', 'required')) !!}
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                    {!! Form::select('district',$districtArray,null, array('id' => 'filter-district-list','class' => 'submit-elements form-control select-inputs', 'required')) !!}
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                    {!! Form::select('mp',$mpArray,null, array('id' => 'filter-mp-list','class' => 'submit-elements form-control select-inputs')) !!}
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                    {!! Form::select('mla',$mlaArray,null, array('id' => 'filter-mla-list','class' => 'submit-elements form-control select-inputs')) !!}
                                </div>
                                <input type="submit" value="Join Us" name="submit" class="join-css" id='join'>
                                <!-- <div class="contact-card">
                                    <div class="contact-item">
                                        <i class="fas fa-phone"></i>
                                        <p>Phone Number</p>
                                        <p>91 9000000359</p>
                                    </div>
                                    <div class="contact-item">
                                        <i class="fas fa-envelope"></i>
                                        <p>Email Address</p>
                                        <p>office@preetham.info</p>
                                    </div>
                                    <div class="contact-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Address</p>
                                        <p>Telangana Pradesh Congress Committee 1st floor, Gandhi Bhavan Nampally, Hyderabad</p>
                                    </div>
                                </div>
                            </div> -->
                            </div>

                            <div class="row">

                                <div class="frame-629240-1Nq " id="1:1045">
                                    <p class="news-wrapper-headings-csss" id="1:1046">Contact Us</p>
                                    <div>

                                    </div>
                                    <div class="col-md-8 col-sm-12 hidden-sm col-xs-12 frame-629237-FY5" id="1:1047">
                                        <div class="frame-629235-o3o" id="1:1048">
                                            <div class="group-85-VSR" id="1:1049">
                                                <i class="fas fa-phone"></i>

                                            </div>
                                            <div class="frame-629234-gWu" id="1:1053">
                                                <p class="phone-number-SW5" id="1:1054">Phone Number</p>
                                                <p class="item-91-9000000359-NPj" id="1:1055">91 9000000359</p>
                                            </div>
                                        </div>
                                        <div class="frame-629236-QLR" id="1:1056">
                                            <div class="group-84-Ljs" id="1:1057">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="frame-629234-wjf" id="1:1062">
                                                <p class="email-address-hyj" id="1:1063">Email Address</p>
                                                <p class="officepreethaminfo-RPw" id="1:1064">office@preetham.info</p>
                                            </div>
                                        </div>
                                        <div class="frame-629236-QLR1" id="1:1056">
                                            <div class="group-84-Ljs1" id="1:1057">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="frame-629234-wjf1" id="1:1062">
                                                <p class="email-address-hyj" id="1:1063">Address</p>
                                                <p class="telangana-pradesh-congress-committee-1st-floor-gandhi-bhavan-nampally-hyderabad-pU1" id="1:1064">Telangana Pradesh Congress Committee 1st floor, Gandhi Bhavan Nampally, Hyderabad</p>
                                            </div>
                                        </div>
                                        <!-- <div class="frame-629237-YDf" id="1:1065">
                                            <div class="group-86-5jP" id="1:1066">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <div class="ellipse-31-csj" id="1:1070"></div>
                                            </div>
                                            <div class="frame-629234-8r5" id="1:1071">
                                                <p class="address-uM3" id="1:1072">Address</p>
                                                <p class="telangana-pradesh-congress-committee-1st-floor-gandhi-bhavan-nampally-hyderabad-pU1" id="1:1073">Telangana Pradesh Congress Committee 1st floor, Gandhi Bhavan Nampally, Hyderabad</p>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.footers')
</main>
<script type="text/javascript">
    var base_url = "{{ STATIC_BASE_URL }}";
    $('#filter-state-list').change(function() {
        var state = this.value;
        $.ajax({
            url: base_url + '/locations/' + state,
            type: "get",
            data: {},
            success: function(data) {
                var mla = data.data.mla;
                var mp = data.data.mp;
                var district = data.data.district;
                $('#filter-district-list').empty();
                $('#filter-mla-list').empty();
                $('#filter-mp-list').empty();

                $('#filter-mp-list').append($('<option>').text('Select MP Constituency').attr('value', 0));
                for (i = 0; i < mp.length; i++) {
                    $('#filter-mp-list').append($('<option>').text(mp[i].key).attr('value', mp[i].value));
                }

                $('#filter-mla-list').append($('<option>').text('Select MLA Constituency').attr('value', 0));
                for (i = 0; i < mla.length; i++) {
                    $('#filter-mla-list').append($('<option>').text(mla[i].key).attr('value', mla[i].value));
                }

                $('#filter-district-list').append($('<option>').text('Select District').attr('value', 0));
                for (i = 0; i < district.length; i++) {
                    $('#filter-district-list').append($('<option>').text(district[i].key).attr('value', district[i].value));
                }
            }
        });
    });

    $('#join').click(function() {
        if ($('#volunteer-name').val() == '') {
            alert('Please Enter Your Name');
            return;
        }
        if (isNaN($("#volunteer-contact").val())) {
            alert('Enter valid number');
            return;
        }

        if ($('#volunteer-contact').val() == '') {
            alert('Please Enter Your Contact Number');
            return;
        }
        var contact = $('#volunteer-contact').val();
        if (contact.length > 10 || contact.length < 10) {
            alert("please enter valid contact number");
            return;
        }
        if ($('#filter-state-list').val() == '') {
            alert('Please Select Your State');
            return;
        }
        if ($('#filter-district-list').val() == '') {
            alert('Please Select Your District');
            return;
        }

        var data = $('.submit-elements').serialize();
        $.ajax({
            url: base_url + '/add-volunteer?' + data,
            type: "post",
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    });

    function phoneno(id) {
        $(id).keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
                a.push(i);

            if (!(a.indexOf(k) >= 0)) {
                $(id).val('');
                e.preventDefault();
            }
        });
    }
</script>
<style>
    .join-css {
        align-items:
            center;
        background-color:
            #2a5577;
        border-radius:
            4.3rem;
        color:
            #ffffff;
        display:
            flex;
        flex-shrink:
            0;
        font-family:
            Inter, 'Source Sans Pro';
        font-size:
            1.2rem;
        font-weight:
            600;
        height:
            3.5rem;
        justify-content:
            center;
        line-height:
            1.5;
        text-align:
            center;
        text-transform:
            capitalize;
        white-space:
            nowrap;
        width:
            8.6rem;
        margin-left: 13px;
    }

    .news-wrapper-headings-css {
        /* font-size: 22px;
        color:
            #2a5577;
        position: relative;
        font-family: "montserratbold", Arial;
        text-align: center;
        border-bottom-lenght: 150px;
        border-bottom: solid 2px #289FDB;
        width: 50%; */
        margin-left: 31px;
        color:
            #2a5577;
        flex-shrink:
            0;
        font-family:
            DM Serif Display, 'Source Sans Pro';
        font-size:
            2.3rem;
        font-weight:
            400;
        line-height:
            0.37;
        margin-bottom:
            1.3rem;
        text-transform:
            capitalize;
        white-space:
            nowrap;
    }

    .frame-629240-1Nq {
        background-color:
            #ffffff;
        border-radius:
            1rem;
        box-shadow:
            0 0.2rem 0.2rem rgba(126, 126, 126, 0.1099999994);
        box-sizing:
            border-box;
        flex-shrink:
            0;
        padding:
            2.4rem;
        /* width:
            120rem; */
    }

    .contact-us-7wf {
        color:
            #2a5577;
        font-family:
            DM Serif Display, 'Source Sans Pro';
        font-size:
            2.8rem;
        font-weight:
            400;
        line-height:
            15.37;
        margin-bottom:
            -11.1rem;
        text-transform:
            capitalize;
        white-space:
            nowrap;
    }

    .frame-629237-FY5 {
        align-items:
            center;
        column-gap:
            2.4rem;
        display:
            flex;
        height:
            12.5rem;
        width:
            100%;
    }

    .frame-629235-o3o {
        align-items:
            center;
        border:
            solid 0.1rem #d0d4da;
        border-radius:
            1rem;
        box-sizing:
            border-box;
        display:
            flex;
        flex-shrink:
            0;
        /* height:
            100%; */
        /* padding:
            3.5rem 13rem 3.4rem 1.6rem; */
        padding: 0.5rem 2rem 1.4rem 2.6rem;
    }

    .group-85-VSR {
        background-color:
            rgba(42, 85, 119, 0.1000000015);
        border-radius:
            2.75rem;
        box-sizing:
            border-box;
        flex-shrink:
            0;
        margin:
            0rem 2.4rem 0.1rem 0rem;
        padding:
            1.6rem 1.5rem 1.5rem 1.6rem;
    }

    .fi-phone-AHf {
        height:
            2.4rem;
        object-fit:
            contain;
        vertical-align:
            top;
        width:
            2.4rem;
    }

    .frame-629234-gWu {
        display:
            flex;
        flex-direction:
            column;
        flex-shrink:
            0;
        height:
            100%;
    }

    .phone-number-SW5 {
        color:
            #1a1a1a;
        flex-shrink:
            0;
        font-family:
            Inter, 'Source Sans Pro';
        font-size:
            1.0rem;
        font-weight:
            500;
        line-height:
            1.2125;
        margin-bottom:
            1.1rem;
        text-transform:
            capitalize;
        white-space:
            nowrap;
    }

    .item-91-9000000359-NPj {
        color:
            #676767;
        flex-shrink:
            0;
        font-family:
            Inter, 'Source Sans Pro';
        font-size:
            1.rem;
        font-weight:
            500;
        line-height:
            1.2125;
        white-space:
            nowrap;
    }

    .frame-629236-QLR {
        align-items:
            center;
        border:
            solid 0.1rem #d0d4da;
        border-radius:
            1rem;
        box-sizing:
            border-box;
        display:
            flex;
        flex-shrink:
            0;
        /* height:
            100%; */
        /* padding:
            3.5rem 10.6rem 3.4rem 1.6rem; */
        padding: 0.5rem 2rem 1.4rem 2.6rem;
    }

    .group-84-Ljs {
        background-color:
            rgba(42, 85, 119, 0.1000000015);
        border-radius:
            2.75rem;
        box-sizing:
            border-box;
        flex-shrink:
            0;
        margin:
            0rem 2.4rem 0.1rem 0rem;
        padding:
            1.6rem 1.5rem 1.5rem 1.6rem;
    }

    .frame-629236-QLR1 {
        align-items:
            center;
        border:
            solid 0.1rem #d0d4da;
        border-radius:
            1rem;
        box-sizing:
            border-box;
        display:
            flex;
        flex-shrink:
            0;
        /* height:
            100%; */
        /* padding:
            3.5rem 10.6rem 3.4rem 1.6rem; */
        padding: -0.5rem 2rem 1.4rem 2.6rem;
    }

    .group-84-Ljs1 {
        background-color:
            rgba(42, 85, 119, 0.1000000015);
        border-radius:
            2.75rem;
        box-sizing:
            border-box;
        flex-shrink:
            0;
        margin:
            0rem 2.4rem 0.1rem 0rem;
        padding:
            1.6rem 1.5rem 1.5rem 1.6rem;
    }

    .fi-mail-EKT {
        height:
            2.4rem;
        object-fit:
            contain;
        position:
            relative;
        vertical-align:
            top;
        width:
            2.4rem;
    }

    .frame-629234-wjf {
        display:
            flex;
        flex-direction:
            column;
        flex-shrink:
            0;
        height:
            100%;
    }

    .frame-629234-wjf1 {
        display:
            flex;
        flex-direction:
            column;
        flex-shrink:
            0;
        height:
            100%;
    }

    .email-address-hyj {
        color:
            #1a1a1a;
        flex-shrink:
            0;
        font-family:
            Inter, 'Source Sans Pro';
        font-size:
            1.0rem;
        font-weight:
            500;
        line-height:
            1.2125;
        margin-bottom:
            1.1rem;
        text-transform:
            capitalize;
        white-space:
            nowrap;
    }

    .officepreethaminfo-RPw {
        color:
            #676767;
        flex-shrink:
            0;
        font-family:
            Inter, 'Source Sans Pro';
        font-size:
            1.0rem;
        font-weight:
            500;
        line-height:
            1.2125;
        white-space:
            nowrap;
    }

    .frame-629237-YDf {
        align-items:
            center;
        border:
            solid 0.1rem #d0d4da;
        border-radius:
            1rem;
        box-sizing:
            border-box;
        display:
            flex;
        flex-shrink:
            2;
        /* height:
            100%;
        padding:
            1.6rem 4.8rem 1.4rem 1.6rem; */
        padding: 0.5rem 1rem 0.4rem 2.6rem;
    }

    .group-86-5jP {
        flex-shrink:
            0;
        height:
            calc(100% - 4rem);
        margin: -4.1rem 4.4rem 2.1rem 0rem;
        position: relative;
        width: 3rem;
    }

    .fi-map-pin-X5b {
        height:
            2.4rem;
        left:
            1.6rem;
        object-fit:
            contain;
        position:
            absolute;
        top:
            1.6rem;
        vertical-align:
            top;
        width:
            2.4rem;
    }

    .ellipse-31-csj {
        background-color:
            rgba(42, 85, 119, 0.1000000015);
        border-radius:
            2.75rem;
        height:
            5.5rem;
        left:
            0;
        position:
            absolute;
        top:
            0;
        width:
            5.5rem;
    }

    .frame-629234-8r5 {
        display:
            flex;
        flex-direction:
            column;
        flex-shrink:
            0;
        height:
            100%;
    }

    .address-uM3 {
        color:
            #1a1a1a;
        flex-shrink:
            0;
        font-family:
            Inter, 'Source Sans Pro';
        font-size:
            1.0rem;
        font-weight:
            500;
        line-height:
            1.2125;
        margin-bottom:
            1.1rem;
        text-transform:
            capitalize;
        white-space:
            nowrap;
    }

    .telangana-pradesh-congress-committee-1st-floor-gandhi-bhavan-nampally-hyderabad-pU1 {
        color:
            #676767;
        flex-shrink:
            0;
        font-family:
            Inter, 'Source Sans Pro';
        font-size:
            1.0rem;
        font-weight:
            500;
        line-height:
            1.2125;
        max-width:
            14.5rem;
    }

    /* .contact-card {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .contact-item {
        background-color: #f0f0f0;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        width: 300px;
    }

    .contact-item i {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .contact-item p {
        margin: 0;
    } */
    .news-wrapper-headings-csss {
        color: #2a5577;
        flex-shrink: 0;
        font-family: DM Serif Display, 'Source Sans Pro';
        font-size: 2.3rem;
        font-weight: 400;
        line-height: 0.37;
        margin-bottom: 1.3rem;
        text-transform: capitalize;
    }
</style>