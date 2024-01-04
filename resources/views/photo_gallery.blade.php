<!doctype html>
<html>
    @include('layout.head')
    <body class="photo-gallery-body">
        <div class="main">
            @include('includes.top-menu')
            <!-- <div class="banner hidden-xs" style="background-image: url({{ STATIC_BASE_URL . '/images/dalvi5.JPG' }});">
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
            </div>
            <div class="banner-mission hidden-lg hidden-md hidden-sm" style="background-image: url({{ STATIC_BASE_URL . '/images/AS2.jpg' }});">
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
            <section class="section-container">
                <div class="news-wrapper">
                    <div class="container">  
                        <div class="trending-content mrgnTtoBtm50">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12"> 
                                    <div class="news-wrapper-heading">Recent Activities<span></span></div>
                                </div> 
                            </div> 
                            <div class="news-content">  
                                <div class="row"> 
                                    @if(count($allGalleries))
                                    @foreach($allGalleries as $row)
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="news-inner-block photo-inner-block">
                                            <!-- <div id="socialBox"> 
                                                <ul>
                                                    <li>
                                                        <a target="_blank" href="{{ 'https://www.facebook.com/sharer/sharer.php?u=http://mahipaldhanda.com/images/' . $row->id }}"><img src="images/facebook2.png"></a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" href="{{ 'https://twitter.com/intent/tweet?url=http://mahipaldhanda.com/images/' . $row->id }}"><img src="images/twitter2.png"></a>
                                                    </li>
                                                </ul>
                                            </div> -->
                                            <a href="/images/{{ $row->id }}">
                                                <div class="gallery-block-img" style="background:url({{ $row->cover }}) no-repeat; background-position:top; background-size:cover;"></div> 
                                                <h4 class="news-block-hding news-inner-padding"> 
                                                    {{ $row->name }}
                                                </h4>
                                                <div class="news-date news-inner-padding">{{ $row->date }}</div>
                                            </a> 
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="photo-inner-block">
                                            <p> No Active Gallery Found...</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </section>
            @include('includes.footers')
        </div>
    </body>
</html>