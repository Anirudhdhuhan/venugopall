<head>
    @include('layout.head')
    <title>Dalit Congres</title>


</head>
<main>
    @include('includes.top-menu')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="slider-image">
                            <div class="carousel-caption">
                                <h1>This Is Heading This Is Heading</h1>
                                <p>LA is always so much fun We love the Big Apple We love the Big Apple We love the Big Apple!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="slider-image">
                            <div class="carousel-caption">
                                <h1>This Is Heading This Is Heading</h1>
                                <p>Thank you, Chicago We love the Big Apple We love the Big Apple We love the Big Apple!</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="slider-image">
                            <div class="carousel-caption">
                                <h1>This Is Heading This Is Heading</h1>
                                <p>We love the Big Apple We love the Big Apple We love the Big Apple We love the Big Apple!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="leader-status">
                    <div class="leader-name-img">
                        <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="ld-img">&nbsp;&nbsp;
                        Chairman's Message - Dr Nitin Raut
                    </div>
                    <div>
                        <p class="status-text">
                            The Congress-led UPA has always considered the safety and security of each and every citizen of the country with paramount importance. <br><br>
                            The ten years of UPA rule saw a considerable increase in expenditure on national security and defence, with an increase from 77,000 crore .<br><br>
                            The ten years of UPA rule saw a considerable increase in expenditure on national security and defence, with an increase from 77,000 crore.
                        </p>
                    </div>
                </div>
                <div class="two-button">
                    <button class="hand-sake">
                        <img src="{{ URL::to('/') . '/images/hand-shake.svg' }}"><br><br>Join Us
                    </button>
                    <button class="issue">
                        <img src="{{ URL::to('/') . '/images/issue.svg' }}"><br><br>Enter Your Issue
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="row">
                <div class="col-md-8">
                    <div class="articles-section">
                        <div class="bot-line">
                            <img src="{{ URL::to('/') . '/images/play-button.svg' }}" class="margeen-4">
                            <span class="survey-text">Latest Videos</span>
                            <!-- <a href="{{ URL::to('/') . '/article/list' }}">
                                    <div class="survey-view">See more&nbsp;
                                            <img src="{{ URL::to('/') . '/images/arrow.svg' }}">
                                    </div>
                            </a> -->
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 mt-1">
                                <a href="">
                                    <div class="responsive">
                                        <div class="responsive-video">
                                            <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="image-responsive" width="100%">
                                        </div>
                                    </div>
                                    <p class="videos-captions">
                                        Mind power The Ultimate Success Formula mind the ultimate power because of new tower.
                                    </p>
                                    <p class="calender-time">
                                        <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="margeen-4">
                                        &nbsp;3 hours ago
                                    </p>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 pading9">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 articles mt-2">
                                        <a href="">
                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="responsive-video">
                                                    <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="img-responsive" height="100" width="100%">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-7 col-xs-7">
                                                <p class="small-video-caption"> 
                                                    Mind power The Ultimate Success Formula mind power because of new tower.
                                                </p>
                                                <p class="calender-time mb-2">
                                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">
                                                    &nbsp;2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 articles mt-2">
                                        <a href="">
                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="responsive-video">
                                                    <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="img-responsive" height="100" width="100%">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-7 col-xs-7">
                                                <p class="small-video-caption"> 
                                                    Mind power The Ultimate Success Formula mind power because of new tower.
                                                </p>
                                                <p class="calender-time mb-2">
                                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">
                                                    &nbsp;2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 articles mt-2">
                                        <a href="">
                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="responsive-video">
                                                    <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="img-responsive" height="100" width="100%">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-7 col-xs-7">
                                                <p class="small-video-caption"> 
                                                    Mind power The Ultimate Success Formula mind power because of new tower.
                                                </p>
                                                <p class="calender-time mb-2">
                                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">
                                                    &nbsp;2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="upcoming-event">
                        <div class="bot-line">
                            <img src="{{ URL::to('/') . '/images/cal.svg' }}" class="margeen-4">
                            <span class="survey-text">Upcoming Event</span>
                            <!-- <a href="{{ URL::to('/') . '/article/list' }}">
                                    <div class="survey-view">See more&nbsp;
                                            <img src="{{ URL::to('/') . '/images/arrow.svg' }}">
                                    </div>
                            </a> -->
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="border-bottom: solid 2px #0144;">
                                <p class="head-text mt-1">Statue of Unity Innaugration</p>
                                <p class="calenders-time mt-1">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                                <p class="calender-time mb-2">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                            </div>
                            <div class="col-md-12" style="border-bottom: solid 2px #0144;">
                                <p class="head-text mt-1">Statue of Unity Innaugration</p>
                                <p class="calenders-time mt-1">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                                <p class="calender-time mb-2">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                            </div>
                            <div class="col-md-12" style="border-bottom: solid 2px #0144;">
                                <p class="head-text mt-1">Statue of Unity Innaugration</p>
                                <p class="calenders-time mt-1">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                                <p class="calender-time mb-2">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p class="head-text mt-1">Statue of Unity Innaugration</p>
                                <p class="calenders-time mt-1">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                                <p class="calender-time mb-2">
                                    <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="">&nbsp;2 hours ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="upcoming-event mt-2">
                <div class="bot-line">
                    <img src="{{ URL::to('/') . '/images/note.svg' }}" class="margeen-4">
                    <span class="survey-text">Latest News</span>
                    <!-- <a href="{{ URL::to('/') . '/article/list' }}">
                            <div class="survey-view">See more&nbsp;
                                    <img src="{{ URL::to('/') . '/images/arrow.svg' }}">
                            </div>
                    </a> -->
                </div>
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <a href="">
                            <div class="responsive">
                                <div class="responsive-video">
                                    <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="image-responsive" width="100%">
                                </div>
                            </div>
                            <p class="videos-captions">
                                Mind power The Ultimate Success Formula mind the ultimate power because of new tower.
                            </p>
                            <p class="calender-time">
                                <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="margeen-4">
                                &nbsp;3 hours ago
                            </p>
                        </a>
                    </div>
                    <div class="col-md-4 mt-1">
                        <a href="">
                            <div class="responsive">
                                <div class="responsive-video">
                                    <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="image-responsive" width="100%">
                                </div>
                            </div>
                            <p class="videos-captions">
                                Mind power The Ultimate Success Formula mind the ultimate power because of new tower.
                            </p>
                            <p class="calender-time">
                                <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="margeen-4">
                                &nbsp;3 hours ago
                            </p>
                        </a>
                    </div>
                    <div class="col-md-4 mt-1">
                        <a href="">
                            <div class="responsive">
                                <div class="responsive-video">
                                    <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="image-responsive" width="100%">
                                </div>
                            </div>
                            <p class="videos-captions">
                                Mind power The Ultimate Success Formula mind the ultimate power because of new tower.
                            </p>
                            <p class="calender-time">
                                <img src="{{ URL::to('/') . '/images/calendar.svg' }}" class="margeen-4">
                                &nbsp;3 hours ago
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-image: url({{ URL::to('/') . '/images/xyz.jpg' }});" class="background-image">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="key-people">
                        <center>
                            <div class="key-people-text">
                                <img src="{{ URL::to('/') . '/images/people.svg' }}">&nbsp;&nbsp;Key People
                            </div>
                        </center>
                    </h3>
                    <div class="col-md-4 mt-10">
                        <div class="key-people-box">
                            <center>
                                <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="key-image center-block">
                            </center>
                            <p class="leader-name">Shri Lal Bhadur Shastri</p>
                            <p class="leader-msg">Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power.</p>
                            <button class="know-more center-block">Know More</button>
                        </div>
                    </div>
                    <div class="col-md-4 mt-10">
                        <div class="key-people-box">
                            <center>
                                <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="key-image center-block">
                            </center>
                            <p class="leader-name">Shri Lal Bhadur Shastri</p>
                            <p class="leader-msg">Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power.</p>
                            <button class="know-more center-block">Know More</button>
                        </div>
                    </div>
                    <div class="col-md-4 mt-10">
                        <div class="key-people-box">
                            <center>
                                <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="key-image center-block">
                            </center>
                            <p class="leader-name">Shri Lal Bhadur Shastri</p>
                            <p class="leader-msg">Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power.</p>
                            <button class="know-more center-block">Know More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="connect-to">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="connect-people">
                        <center>
                            <div class="connect-people-text">
                                Connect With Dr Nitin Raut
                            </div>
                        </center>
                    </h3>
                    <div class="col-md-3">
                        <img src="{{ URL::to('/') . '/images/demo.jpg' }}" class="center-block connect-img">
                        <p class="img-name">Dr. Nitin Raut</p>
                        <p class="img-position">Chairman INC</p>
                    </div>
                    <div class="col-md-9">
                        <p class="connect-text">
                            Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power The Ultimate Success Formula mind the ultimate power because. Mind power The Ultimate Success Formula mind the ultimate power because of new tower Mind power The Ultimate Success.<br><br>
                            Formula mind the ultimate power because of new tower Mind power The Ultimate Success Formula mind the ultimate power because. Mind power The Ultimate Success Formula mind the ultimate.
                        </p>
                        <button class="suggestion">Issue/Suggestions</button>
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