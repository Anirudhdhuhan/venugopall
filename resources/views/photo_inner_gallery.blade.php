<!doctype html>
<html>
@include('layout.head')

<body class="photo-inner-gallery-body">
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
        <section class="section-container mrgnBtm20px">
            <div class="container">  
                <div class="trending-content mrgnTtoBtm25">
                    <div class="row">  
                        <div class="col-xs-12 col-sm-12 col-md-12"> 
                            <div class="news-wrapper-heading">{{ $gallery->name }}<span></span></div>  
                        </div> 
                    </div>
                </div>
            </div>
        </section>              
        <div class="container"> 
            <div class="gallery-slider" id="links">
                @foreach($images as $row)
                <a style="background:url('{{ $row->image }}'); background-size:cover; background-position:center center; display: block; position: relative;" href="{{ $row->image }}" title="{{ $row->name }}"><span>{{ $row->name }}</span></a>
                @endforeach
            </div>
        </div>
        @include('includes.footers')
    </div>
</body>
<script type="text/javascript">
    $(window).load(function()
    {
        var tos = $("#links a").tosrus(
                    {
                        slides     : {
                            scale      : "fill"
                        },
                        caption    : {
                            add        : true
                        },
                        pagination : {
                            add        : true,
                            type       : "thumbnails"
                        },
                        buttons    : false
                    });

        $(document).on('keyup',function(evt)
        {
            if (evt.keyCode == 27)
                tos.trigger("close");

            if (evt.keyCode == 37)
                tos.trigger("prev");

            if (evt.keyCode == 39)
                tos.trigger("next");
        });
    });
</script>
</html>