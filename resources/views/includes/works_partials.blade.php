@foreach($works as $row)
	<div class="col-md-4">
		<div class="work-detail-img">
			<a href="{{ URL::to('/') . '/work/details/' . $row->id }}" class="work-c-l">
				<img src="{{ $row->images }}" class="work-detail-images img-responsive">
				<p class="work-caption">{{ $row->title }}</p>
			</a>
			<p class="work-by">Posted By: {{ $row->posted_by }} <span class="work-time"><i class="far fa-clock"></i>{{ $row->date }}</span></p>
		</div>
	</div>
@endforeach