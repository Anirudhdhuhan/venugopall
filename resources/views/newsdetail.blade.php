<head>
    @include('layout.head')
    <title> {{ $news->heading }} </title>

    <meta name="title" content="{{ $news->heading }}" />
    <meta name="description" content="{{ $news->heading }}" />  
    <meta name="application-name" content="Preetham Nagarigari" /> 
    <meta name="image" content="{{ $news->image }}" />
    <!-- for Google End -->

    <!-- for Facebook Start -->
    <meta property="og:title" content="{{ $news->heading }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ $news->image }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="300" />
    <meta property="og:url" content="/{{ Request::path() }}" />
    <meta property="og:description" content="{{ $news->heading }}" />
    <meta property="fb:app_id" content="122730538374481"/>
    <!-- for Facebook End -->

    <!-- for Twitter Start -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@NitinRaut_INC">
    <meta name="twitter:title" content="{{ $news->heading }}">
    <meta name="twitter:description" content="{{ $news->heading }}">
    <meta name="twitter:image" content="{{ $news->image }}">
    <meta name="twitter:url" content="/{{ Request::path() }}">
    <meta content="@NitinRaut_INC" name="twitter:creator">
    <meta content="https://www.preetham.info/" name="twitter:domain"> 
    <!-- for Twitter End -->
</head>
<main>
    @include('includes.top-menu')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-2">
                <div class="survey-view pull-right" style="color:blue; font-size:14px;">
                    <div id="wrapper">
                        <div class="social">
                            <ul>
                                <li class="entypo-twitter share" role="button" title="Twitter"   data-type="twitter" data-url="">
                                    <a href ="https://twitter.com/share?url={{url('/news/'.$news->id.'/'.strip_url($news->url?$news->url:$news->heading))}}"><i class="fa fa-twitter" style="transform: rotate(-90deg);"  aria-hidden="true"></i></a>
                                </li>
                                <li class="entypo-facebook share" role="button" title="Facebook"   data-type="facebook"  data-url="">
                                    <a href ="https://www.facebook.com/sharer/sharer.php?u={{url('/news/'.$news->id.'/'.strip_url($news->url?$news->url:$news->heading))}}"><i class="fa fa-facebook" style="transform: rotate(-90deg);" aria-hidden="true"></i></a>
                                </li>    
                                <li class="entypo-pintrest share" data-type="pinterest" data-url=''>
                                    <a href ="https://in.pinterest.com/pin/create/button/?url={{url('/news/'.$news->id.'/'.strip_url($news->url?$news->url:$news->heading))}}"><i class="fa fa-pinterest" style="transform: rotate(-90deg);" aria-hidden="true"></i></a>
                                </li>
                                <li class="entypo-pintrest share copy_link" data-url="{{url('/news/'.$news->id.'/'.strip_url($news->url?$news->url:$news->heading))}}">
                                    <i class="fa fa-link" style="transform: rotate(-90deg);" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="upcoming-event">
                    <p class="videos-captions">
                        {{ $news->heading }}
                    </p>
                    <p class="calender-time">
                        <img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
                        &nbsp;{{ $news->approved_at }}
                    </p>
                    <div class="responsive">
                        <div class="responsive-video">
                            @if($news->video_link != '')
                            <iframe src="{{ 'https://www.youtube.com/embed/' . $news->video_link }}" allowfullscreen="0" class="image-responsive" height="370px" width="100%"></iframe>    
                            @elseif($news->image != '')
                            <img src="{{ $news->image }}" alt="{{ $news->heading }}" onerror="this.onerror=null;this.src='{{DUMMY_NEWS_PIC}}';" class="image-responsive" height="370px" width="100%">
                            @endif
                        </div>					
                    </div>
                    <div class="news-description">
                        {!! $news->content !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="upcoming-event">
                    <div class="bot-line">
                        <img src="{{ STATIC_BASE_URL . '/images/note.svg' }}" class="margeen-4">
                        <span class="survey-text">Latest News</span>
                        <!-- <a href="{{ STATIC_BASE_URL . '/article/list' }}">
                                <div class="survey-view">See more&nbsp;
                                        <img src="{{ STATIC_BASE_URL . '/images/arrow.svg' }}">
                                </div>
                        </a> -->
                    </div>
                    <div class="row">
                        @foreach($latest_news as $row)
                        <div class="col-md-12 mt-1" style="border-bottom: solid 2px #0144;">
                            <a href="@if($row->url) {{ STATIC_BASE_URL . '/news/' . $row->id . '/' . strip_url($row->url)}} @else {{ STATIC_BASE_URL . '/news/' . $row->id . '/' . strip_url($row->heading)}} @endif">
                                <div class="news">
                                    <div class="responsive">
                                        <div class="responsive-video">
                                            @if($row->video_link != '')
                                            <iframe src="{{ 'https://www.youtube.com/embed/' . $row->video_link }}" allowfullscreen="0" class="image-responsive" height="165px" width="100%"></iframe>    
                                            @elseif($row->image != '')
                                            <img src="{{ $row->image }}" alt="{{ $row->heading }}" onerror="this.onerror=null;this.src='{{DUMMY_NEWS_PIC}}';" class="image-responsive" height="165px" width="100%">
                                            @endif

                                        </div>
                                    </div>
                                    <p class="news-list-captions">
                                        {{ $row->heading }}
                                    </p>
                                    <p class="calender-time ml-1 pading9">
                                        <img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
                                        &nbsp;{{ $row->approved_at }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endforeach

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
  height:28px;
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
@section('scripts')
<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
        },
    });
</script>
@endsection