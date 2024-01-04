<head>
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
    <!-- <div class="banner hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   
                </div>
            </div>
        </div>
    </div> -->
    <div class="banner-mission hidden-lg hidden-md hidden-sm" style="background-image: url({{ STATIC_BASE_URL . '/images/nagri6.jpeg' }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <h3 class="key-people">
                            <center>
                                    <div class="key-people-text mt-2">
                                            Latest Videos
                                    </div>
                            </center>
                    </h3> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($video as $row)
            <div class="col-md-4 mt-2">
                <div class="news-list">
                    <div class="responsive-video">
                        <iframe class="" height="185px" width="100%" src="https://www.youtube.com/embed/{{$row->videourl}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <p class="news-list-captions">
                        {{ $row->title }}
                    </p>
                </div>
            </div>
            @endforeach
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