<head>
    @include('layout.head')
    <title> {{@$issue['title']}} </title>

    <meta name="title" content=" {{@$issue['title']}}" />
    <meta name="description" content="Atrocities against Dalits | Leadership Development in Dalits | Strengthen the voice of Dalits" />
    <meta name="application-name" content="Preetham Nagarigari" />
    <meta name="image" content="{{ STATIC_BASE_URL . @$issue['image']}}" />
    <!-- for Google End -->

    <!-- for Facebook Start -->
    <meta property="og:title" content="{{@$issue['title']}}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ STATIC_BASE_URL . @$issue['image']}}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="300" />
    <meta property="og:url" content="/{{ Request::path() }}" />
    <meta property="og:description" content="Atrocities against Dalits | Leadership Development in Dalits | Strengthen the voice of Dalits" />
    <meta property="fb:app_id" content="122730538374481" />
    <!-- for Facebook End -->

    <!-- for Twitter Start -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@NitinRaut_INC">
    <meta name="twitter:title" content="{{@$issue['title']}}">
    <meta name="twitter:description" content="Atrocities against Dalits | Leadership Development in Dalits | Strengthen the voice of Dalits">
    <meta name="twitter:image" content="{{ STATIC_BASE_URL . @$issue['image']}}">
    <meta name="twitter:url" content="/{{ Request::path() }}">
    <meta content="@NitinRaut_INC" name="twitter:creator">
    <meta content="http://www.preetham.info/" name="twitter:domain">
    <!-- for Twitter End -->

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
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-2">
                <div class="survey-view pull-right" style=" font-size:14px;">
                    <div id="wrapper">
                        <!-- <span class="copy_link" data-url="{{url('/key-issue/'.$key)}}">Copy Link</span> -->
                        <div class="social">
                            <ul>
                                <li class="entypo-twitter share" role="button" title="Twitter" data-type="twitter" data-url="">
                                    <a href="https://twitter.com/share?url={{url('/key-issue/'.$key)}}"><i class="fa fa-twitter" style="transform: rotate(-90deg);" aria-hidden="true"></i></a>
                                </li>
                                <li class="entypo-facebook share" role="button" title="Facebook" data-type="facebook" data-url="">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url('/key-issue/'.$key)}}"><i class="fa fa-facebook" style="transform: rotate(-90deg);" aria-hidden="true"></i></a>
                                </li>
                                <li class="entypo-pintrest share" data-type="pinterest" data-url=''>
                                    <a href="https://in.pinterest.com/pin/create/button/?url={{url('/key-issue/'.$key)}}"><i class="fa fa-pinterest" style="transform: rotate(-90deg);" aria-hidden="true"></i></a>
                                </li>
                                <li class="entypo-pintrest share copy_link" data-url="{{url('/key-issue/'.$key)}}">
                                    <i class="fa fa-link" style="transform: rotate(-90deg);" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                @if($key == '1')
                <div class="upcoming-event">
                    <div class="responsive">
                        <div class="responsive-video">
                            <img src="/images/Dalit-atrocities.png" class="image-responsive key-detail-img">
                        </div>
                    </div>
                    <p class="videos-captions">
                        Atrocities against Dalits -
                    </p>
                    <div class="key-description">
                        There has been an alarming increase in atrocities against Dalits, as evidenced by Una,
                        Shirdi, Faridabad, Chickmangalur, something which the 38th session of the United
                        Nations Human Rights Council noted. <br><br>
                        There was a 22% increase in atrocities against Dalits in the first three years of the NDA.
                        Four of the top five states (Madhya Pradesh,Rajasthan, Goa, Gujarat) that recorded the highest
                        crime rate in the category of "crime/atrocities against scheduled castes" during 2014-’16 were
                        all ruled by the BJP directly or in alliance with other parties.<br><br>
                        Gau Rakshaks are burning Dalits alive. These Gau Rakshaks know that they will not be penalised
                        since they espouse a certain ideology. Given this, it is imperative to evolve comprehensive ways
                        to enforce the SC/ST (Prevention of Atrocity) Act as per the 1995 and 2015 Regulations, and to
                        address the observed gaps and loopholes, since these are routinely misused by regressive forces.
                    </div>
                </div>
                @elseif($key == '2')
                <div class="upcoming-event">
                    <div class="responsive">
                        <div class="responsive-video">
                            <img src="{{ STATIC_BASE_URL . '/images/issueone.jpg' }}" class="image-responsive key-detail-img">
                        </div>
                    </div>
                    <p class="videos-captions">
                        Leadership Development in Dalits -
                    </p>
                    <div class="key-description">
                        The main reason for the atrocities against Dalits is the lack of leadership in this community. In the recent times, people from marginalized societies are not getting significant representation at the top level of the politics.<br> This is the prime reason why the community is facing social injustice and political ignorance. Though it was given constitutional right by Babasaheb Bhimrao Ambedkar, yet they have not got the position in the society as expected. They are being used as mere vote banks. And most of the political parties manage them accordingly.<br>So it is the need of the hour to promote leadership in Dalits so that they can voice their opinions and they can be a part of policy making. This leadership development will ensure the progress and development of this community.
                    </div>
                </div>
                @elseif($key == '3')
                <div class="upcoming-event">
                    <div class="responsive">
                        <div class="responsive-video">
                            <img src="{{ STATIC_BASE_URL . '/images/desktop.jpg' }}" class="image-responsive key-detail-img">
                        </div>
                    </div>
                    <p class="videos-captions">
                        Strengthen the voice of Dalits -
                    </p>
                    <div class="key-description">
                        The voice of Dalit community needs to be strengthened to a level where policy makers cannot ignore it. This strength is not only needful but essential for the growth and development of the people from Marginalized societies.<br> Dalits face a number of problems like less recruitment, social and political ignorance, double standards of the society etc. All these problems is because their representation in the entire political scenario is less. Their voices are rarely put in strongly.<br><br> To strengthen this group of society, Leadership development and strengthening the voices should be the utmost priority
                    </div>
                </div>
                @elseif($key == '4')
                <div class="upcoming-event">
                    <div class="responsive">
                        <div class="responsive-video">
                            <img src="{{ STATIC_BASE_URL . '/images/pinc2.jpg' }}" class="image-responsive key-detail-img">
                        </div>
                    </div>
                    <p class="videos-captions">
                        Political Awareness -
                    </p>
                    <div class="key-description">
                        Instead of the fact that Mannual Scavenging has been banned in India, it is prevalent even now. BJP ruled states of UP, Maharashtra, Rajasthan and Madhya Pradesh reported the most number of manual scavengers in the recent survey. Since the beginning for 2017 at least one Indian worker has died while cleaning sewers or septic tanks every five days.<br><br> Apart from this, Babasaheb Ambedkar gave each and every person living in India constitutional rights which guarantees everyone a respectful and dignified life but due to the lack of awareness amongst communities, political exploitation and social injustice is visible.<br><br>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-4 mt-2">
                <div class="upcoming-event">
                    <div class="bot-line">
                        <span class="survey-text">More Key Issues</span>
                    </div>
                    <div class="row">
                        <a href="{{ STATIC_BASE_URL . '/key-issue/1' }}">
                            <div class="col-md-12 mt-1" id="key-{{$key}}" style="border-bottom: solid 2px #0144; @if($key == '1') display: none;  @endif  ">
                                <div class="news">
                                    <div class="responsive">
                                        <div class="responsive-video">
                                            <img src="{{ STATIC_BASE_URL . '/images/Dalit-atrocities.png' }}" class="image-responsive" height="165px" width="100%">
                                        </div>
                                    </div>
                                    <p class="news-list-captions">
                                        Atrocities against Dalits -
                                    </p>
                                    <!-- <p class="calender-time ml-1 pading9">
                                            <img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
                                            &nbsp;3 hours ago
                                    </p> -->
                                </div>
                            </div>
                        </a>
                        <a href="{{ STATIC_BASE_URL . '/key-issue/2' }}">
                            <div class="col-md-12 mt-1" id="key-{{$key}}" style="border-bottom: solid 2px #0144; @if($key == '2') display: none;  @endif">
                                <div class="news">
                                    <div class="responsive">
                                        <div class="responsive-video">
                                            <img src="{{ STATIC_BASE_URL . '/images/issueone.jpg' }}" class="image-responsive" height="165px" width="100%">
                                        </div>
                                    </div>
                                    <p class="news-list-captions">
                                        Leadership Development in Dalits -
                                    </p>
                                    <!-- <p class="calender-time ml-1 pading9">
                                            <img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
                                            &nbsp;3 hours ago
                                    </p -->
                                </div>
                            </div>
                        </a>
                        <a href="{{ STATIC_BASE_URL . '/key-issue/3' }}">
                            <div class="col-md-12 mt-1" id="key-{{$key}}" style="border-bottom: solid 2px #0144; @if($key == '3') display: none;  @endif">
                                <div class="news">
                                    <div class="responsive">
                                        <div class="responsive-video">
                                            <img src="{{ STATIC_BASE_URL . '/images/desktop.jpg' }}" class="image-responsive" height="165px" width="100%">
                                        </div>
                                    </div>
                                    <p class="news-list-captions">
                                        Strengthen the voice of Dalits -
                                    </p>
                                    <!-- <p class="calender-time ml-1 pading9">
                                            <img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
                                            &nbsp;3 hours ago
                                    </p> -->
                                </div>
                            </div>
                        </a>
                        <a href="{{ STATIC_BASE_URL . '/key-issue/4' }}">
                            <div class="col-md-12 mt-1" id="key-{{$key}}" style="border-bottom: solid 2px #0144; @if($key == '4') display: none;  @endif">
                                <div class="news">
                                    <div class="responsive">
                                        <div class="responsive-video">
                                            <img src="{{ STATIC_BASE_URL . '/images/pinc2.jpg' }}" class="image-responsive" height="165px" width="100%">
                                        </div>
                                    </div>
                                    <p class="news-list-captions">
                                        Political Awareness -
                                    </p>
                                    <!-- <p class="calender-time ml-1 pading9">
                                            <img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
                                            &nbsp;3 hours ago
                                    </p> -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" name="myInput" value="" id="myInput" style="border:none;color:#fff;">
    @include('includes.footers')
</main>
<style type="text/css">
    #wrapper {
        text-align: center;
        position: absolute;
        /*left:0;*/
        right: 0;
        margin: 22px 0px;
        /*margin: 100px auto;*/
        width: 160px;
    }

    input[type="checkbox"] {
        display: none;
    }

    .checkbox:checked+.label {
        background: #0b446a;
        color: #fff;
        border-radius: 50%;
    }

    .checkbox:checked~.social {
        opacity: 0;
        /*transform:scale(1) translateY(-90px);*/
        transform: rotate(90deg);
    }

    .label {
        background: #0b446a;
        font-size: 16px;
        cursor: pointer;
        margin: 0;
        padding: 10px 12px;
        border-radius: 50%;
        color: #fff;
    }

    .social {
        transform-origin: 58% 235%;
        /*transform:scale(0) translateY(-190px);*/
        transform: rotate(90deg);
        opacity: 1 !important;
        transition: .5s;
    }

    .social ul {
        position: relative;
        left: 0;
        right: 0;
        margin: -5px auto 0;
        color: #fff;
        height: 28px;
        width: 160px;
        /*width: 80px;*/
        background: #0b446a;
        padding: 0;
        list-style: none;
        border-radius: 4px;
    }

    .social ul li {
        font-size: 20px;
        cursor: pointer;
        width: 40px;
        margin: 0;
        padding: 4px 0;
        text-align: center;
        float: left;
        display: block;
        height: 22px;
    }

    .social ul li:hover {
        color: rgba(0, 0, 0, .5);
    }

    .social ul:after {
        content: '';
        display: block;
        position: absolute;
        left: 0;
        right: 0;
        /*margin:35px auto;*/
        margin: 25px 5px;
        height: 0;
        width: 0;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        border-top: 20px solid #0b446a;
    }
</style>
@section('scripts')
<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
        },
    });
</script>
@endsection