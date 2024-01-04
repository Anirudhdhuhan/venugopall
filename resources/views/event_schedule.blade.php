<head>
	@include('layout.head')
	<title>Dalit Congres</title>
</head>
<main>
	@include('includes.top-menu') 
	<!-- <div class="banner1 hidden-xs" style="background-image: url({{ STATIC_BASE_URL . '/images/jagjivan.png' }});">
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
	<div class="banner-mission hidden-lg hidden-md hidden-sm" style="background-image: url({{ STATIC_BASE_URL . '/images/yug.jpeg' }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="key-people">
						<center>
							<div class="key-people-text mt-2">
								Direct Connect
							</div>
						</center>
					</h3>
				</div>
			</div>
		</div>
	</div> -->
	<section class="section-container">
		<div class="container">
			<div class="trending-content mrgnTtoBtm50">
				<div class="row">  
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="news-wrapper-heading events-wrapper-heading">Upcoming Events<span></span></div>
					</div> 
				</div>
				<div class="news-content">
					<div class="row">
						@foreach($upcomingEvents as $row)
						<div class="col-xs-12 col-sm-6 col-md-4 event-div" data-id="{{ $row->id }}">
							<div class="news-inner-block">
								<button type="button" class="btn btn-lg news-modal" data-toggle="modal">
								    <div class="events-inner-block padding25px">
								    	<p class="events-address boder-btm pdingbtm20px">{{ $row->date }}, {{ $row->time }}</p>
										<p class="events-text events-inner-text"> 
											{{ $row->name }}
										</p>
										<p class="events-place-heading">{{ $row->location1 }}<span>{{ $row->location2 }}</span></p>
										@if(isset($row->contact_name))
											<p class="events-contact">Contact,<br><span>{{ $row->contact_name }},  {{ $row->contact_number }} </span></p>
										@endif
									</div> 
								</button>  
							</div>
						</div>
						@endforeach
					</div>
					@if(count($pastEvents))		
					<div class="row">  
						<div class="col-xs-12 col-sm-12 col-md-12"> 
							<div class="news-wrapper-heading mrgnTop25px">Past Events<span></span></div>
						</div>
					</div>
					<div class="row all-events">
						@include('partials.event')
					</div>
					@endif
				</div>
			</div>
		</div>
	</section>
	@include('includes.footers')
	<div id="event-detail-modal"></div>
</main>
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function()
		{
			var base_url = "{{ STATIC_BASE_URL }}";
			var ajaxRunning = 0;
			$('.next-url').remove();
			$('body').on('click',".event-div", function()
			{
				var eventId = $(this).data("id");
				$.ajax({
					url: base_url + '/event-details/' + eventId,
					type: "get",
					data:
					{},
					success:function(data)
					{
						$('#event-detail-modal').html(data);
						$('#eventModal').modal('show');
					}
				});
			});

			$(window).scroll(function()
			{
				if($(window).scrollTop() + $(window).height() == $(document).height())
				{
					if(ajaxRunning)
						return;
					else
						loadEvents();
				}
			});

			function loadEvents()
			{
				var nextUrl = $('#next-url').html();
				if(nextUrl.trim().length)
				{
					ajaxRunning = 1;
					$('.loading-img').show();
					$.ajax({
						url: nextUrl + '&referrer=pagination',
						type: "get",
						success:function(data)
						{
							$('.all-events').append(data);
							$('.loading-img').hide();
							$('#next-url').html($('.next-url').html());
							$('.next-url').remove();
							ajaxRunning = 1;
						}
					});
				}
			}
		});
	</script>
@endsection