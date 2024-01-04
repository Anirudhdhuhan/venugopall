<div class="modal fade" id="newsModal" role="dialog"> 
	<div class="modal-dialog">
		<div class="modal-content modal-content-block">
			<div class="modal-header no-btm-bdr"> 
				<h4 class="modal-hedaing"> 
					{{ $news->heading }}
				</h4>
				<button type="button" class="close btn-large" data-dismiss="modal">&times;</button> 
			</div>
			<div class="modal-body each-modal-pding"> 
				<div class="news-block-img">  
			       <img src="{{ $news->image }}" class="img-responsive">
			    </div> 
			    <div class="news-date">
					{{ $news->approved_at }}
				</div>
			    <div class="newsblocktext">
			       {!! $news->content !!}
			    </div> 
			</div>
		</div>
	</div>
</div>