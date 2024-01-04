@foreach($pastEvents as $row)
<div class="col-xs-12 col-sm-6 col-md-4 event-div" data-id="{{ $row->id }}">
	<div class="news-inner-block">
		<!-- <div id="socialBox"> 
			<ul>
				<li>
					<a target="_blank" href="{{ 'https://www.facebook.com/sharer/sharer.php?u=http://preetham.info/event_schedule/' . $row->id }}"><img src="{{ URL::to('/') . '/images/facebook2.png' }}"></a>
				</li>
				<li>
					<a target="_blank" href="{{ 'https://twitter.com/intent/tweet?url=http://preetham.info/event_schedule/' . $row->id }}"><img src="{{ URL::to('/') . '/images/twitter2.png' }}"></a>
				</li>
			</ul>
		</div> -->
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
<div style='display:none;' class='next-url'>{{ isset($nextPage)?$nextPage:'' }}</div>