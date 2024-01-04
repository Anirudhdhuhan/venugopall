	<head>
		@include('layout.head')
		<title>Dalit Congres</title>
		

	</head>
<main>
	@include('includes.top-menu')
	<div class="banner" style="background-image: url({{ STATIC_BASE_URL . '/images/slider/banner.jpg' }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="key-people">
						<center>
							<div class="key-people-text mt-2">
								Latest News
							</div>
						</center>
					</h3>
				</div>
			</div>
		</div>
	</div>
    <div class="container">
    	<div class="row">
    		<div class="col-md-3 mt-2">
    			<a href="">
					<div class="news-list">
						<div class="responsive">
							<div class="responsive-video">
								<img src="{{ STATIC_BASE_URL . '/images/demo.jpg' }}" class="image-responsive" height="145px" width="100%">
							</div>
						</div>
						<p class="news-list-captions">
							Mind power The Ultimate Success Formula mind the ultimate power because of new tower.
						</p>
						<p class="calender-time ml-1 pading9">
							<img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
							&nbsp;3 hours ago
						</p>
					</div>
			    </a>
    		</div>
    		<div class="col-md-3 mt-2">
    			<a href="">
					<div class="news-list">
						<div class="responsive">
							<div class="responsive-video">
								<img src="{{ STATIC_BASE_URL . '/images/about1.jpg' }}" class="image-responsive" height="145px" width="100%">
							</div>
						</div>
						<p class="news-list-captions">
							Mind power The Ultimate Success Formula mind the ultimate power because of new tower.
						</p>
						<p class="calender-time ml-1 pading9">
							<img src="{{ STATIC_BASE_URL . '/images/calendar.svg' }}" class="margeen-4">
							&nbsp;3 hours ago
						</p>
					</div>
			    </a>
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