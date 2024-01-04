<head>
    @include('layout.head')
    <title>Dalit Congres</title>
</head>
<main>
    @include('includes.top-menu')
    <div class="container mt-2">
        <div class="row">
            @if(count($news)>0)
            @foreach($news as $row)
            <div class="col-md-3 mt-2 news-div" data-id="{{ $row->id }}">
                <div class="news-list">
                    <a href="@if($row->url) {{ STATIC_BASE_URL . '/news/' . $row->id . '/' . strip_url($row->url)}} @else {{ STATIC_BASE_URL . '/news/' . $row->id . '/' . strip_url($row->heading)}} @endif">
                        <div class="responsive">
                            <div class="responsive-video">
                                @if($row->video_link != '')
                                <iframe class="image-responsive" height="145px" width="100%" src="{{ 'https://www.youtube.com/embed/' . $row->video_link }}"></iframe>
                                @elseif($row->image != '')
                                <img src="{{ $row->image }}" class="image-responsive" height="145px" width="100%" alt="{{ $row->heading }}" onerror="this.onerror=null;this.src='{{DUMMY_NEWS_PIC}}';">
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
                    </a>
                </div>
            </div>
            @endforeach
            <center><?php //echo e($news->links());  ?></center>
            <div class="loading-img"></div>
            @else
            <h4 style="margin-bottom: 187px;">No News available</h4>
            @endif
        </div>
    </div>
    @include('includes.footers')
</main>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function ()
    {
        var base_url = "{{ STATIC_BASE_URL }}";
        var ajaxRunning = 0;
        $('.next-url').remove();
        $('body').on('click', ".news-div", function ()
        {
            var newsId = $(this).data("id");
            $.ajax({
                url: base_url + '/news-details/' + newsId,
                type: "get",
                data:
                        {},
                success: function (data)
                {
                    $('#news-detail-modal').html(data);
                    $('#newsModal').modal('show');
                }
            });
        })

        $(window).scroll(function ()
        {
            if ($(window).scrollTop() + $(window).height() == $(document).height())
            {
                if (ajaxRunning)
                    return;
                else
                    loadNews();
            }
        });

        function loadNews()
        {
            var nextUrl = $('#next-url').html();
            if (nextUrl.trim().length)
            {
                ajaxRunning = 1;
                $('.loading-img').show();
                $.ajax({
                    url: nextUrl + '&referrer=pagination',
                    type: "get",
                    success: function (data)
                    {
                        $('.all-news').append(data);
                        $('.loading-img').hide();
                        $('#next-url').html($('.next-url').html());
                        $('.next-url').remove();
                        ajaxRunning = 0;
                    }
                });
            }
        }
    });
</script>
@endsection