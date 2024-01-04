@foreach($news as $row)
<div class="col-xs-12 col-sm-6 col-md-3 news-div" data-id="{{ $row->id }}">
	<div class="news-inner-block">
		<button type="button" class="btn btn-lg news-modal" data-toggle="modal" data-target="#myModal">    
			<div class="news-block-img">  
				<img src="{{ $row->image }}" class="img-responsive">
			</div> 
			<h4 class="news-block-hding news-inner-padding"> 
				{{ $row->heading }}
			</h4> 
			<div class="news-date news-inner-padding">{{ $row->approved_at }}</div>
		</button> 
	</div>
</div>
@endforeach
<div style='display:none;' class='next-url'>{{ $nextPage }}</div>