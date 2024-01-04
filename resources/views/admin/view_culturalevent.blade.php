
	<div class="col-lg-8">
	    
	    <h3>{{$culturalevent->title}}</h3></br></br>
	</div>

	<div class="col-lg-12">
	    
	    <p>{{$culturalevent->description}}</p></br></br>
	</div>

	
	<div class="col-lg-12">
	   
	    @foreach($images as $row)
	    <div class="col-md-4">
	    	<img src="{{$row}}" style="height:200px;width:300px;margin-left:10px">
	    </br></br>
	    </div>
	    @endforeach	
	</div>
	</br></br>
