<!doctype html>
<html>
@include('layout.head')
<body>
	<div class="main">
		@include('layout.header')
		<div class="pages-top-img">
			<img src="/images/pages-img.jpg" class="img-responsive"> 
			<p class="pages-img-heading">VIDEO</p>    
		</div>
		<section class="section-container">
            <div class="news-wrapper">
            	<div class="container">  
            		<div class="trending-content mrgnTtoBtm50">
            			<div class="row">  
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="news-wrapper-heading">Gallery<span></span></div>
							</div> 
						</div>
						<div class="news-content"> 
							<ul>
								<li class="mrgnTtoBtm25">   
									<div class="row"> 
										<div class="col-xs-12 col-sm-3 col-md-3">
											<div class="news-inner-block">
												<button type="button" class="btn btn-lg news-modal" data-toggle="modal" data-target="#myModal">    
												    <div class="news-block-img">  
												       <img src="/images/gallery/gallery-img.jpg" class="img-responsive">
												    </div> 
												    <h4 class="news-block-hding news-inner-padding"> 
												    	Lorem ipsum dolor sit amet, consectet elit.
												    </h4>
													<div class="news-date news-inner-padding">23rd October 2017</div>
												</button> 
											</div>
											<div class="modal fade" id="myModal" role="dialog"> 
												<div class="modal-dialog">
													<div class="modal-content modal-content-block">
														<div class="modal-header no-btm-bdr"> 
												          <button type="button" class="close btn-large" data-dismiss="modal">&times;</button> 
												        </div>
														<div class="modal-body pding50px pdingtop10px"> 
															<div class="news-block-img">  
														       <img src="/images/news-page-big-img.jpg" class="img-responsive">
														    </div> 
														    <div class="news-date pdingtop20px">
																23rd October 2017
															</div>
														    <h4 class="news-block-hding pdingtop20px"> 
														    	Lorem ipsum dolor sit amet, consectet elit. Quisque bibendum pulvinar. 
														    </h4> 
														    <div class="newsblocktext pdingtop20px">
														       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque bibendum pulvinar dui vel aliquet. Phasellus lobortis rhoncus tortor nec dictum. Pellentesque ut vestibulum lacus. Etiam dolor dolor, fringilla et feugiat a, varius id dui. Integer cursus sagittis velit in consectetur. Praesent vehicula nisl sit amet dui elementum lobortis.
														    </div> 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>	
								</li>
							</ul>
						</div>
            		</div>
            	</div>
            </div> 
		</section>
		@include('layout.footer')
	</div>
</body>
</html>