<div class="modal fade" id="eventModal" role="dialog">  
	<div class="modal-dialog">
		<div class="modal-content modal-content-block">
			<div class="modal-header no-btm-bdr"> 
				<h4 class="modal-hedaing"> 
					{{ $event->name }}
				</h4>
				<button type="button" class="close btn-large" data-dismiss="modal">&times;</button> 
			</div>
			<div class="modal-body each-modal-pding">
				<div class="news-block-img">  
					<img src="{{ $event->image }}" class="img-responsive">
				</div> 
				<p class="events-address mrgnTop20px">
					{{ $event->date }}, {{ $event->time }}
				</p>
				<p class="events-contact no-mrgn-btm">
					Venue
				</p>
				<p class="events-contact">
					<span class="events-place-heading">{{ $event->location1 }}<span>{{ $event->location2 }}</span></span>
				</p>
				<p class="events-contact mrgnTop20px">
					About The event
				</p>
				<div class="newsblocktext">
					{{ $event->description }}
				</div>
				<br>
				@if(isset($event->contact_name))
					<p class="events-contact">
						Contact,<br><span>{{ $event->contact_name }}, {{ $event->contact_number }} </span>
					</p>
				@endif
			</div>
		</div>
	</div>
</div>