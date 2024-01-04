@extends('includes.admin_layout')
@section('page_content')
<div class="row" style="height:auto;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body  yn-tile">
                <h3 class="yn-tile-heading">Data Widget</h3>
                <div class="row" >
                    <!-- <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $gallery_count }}</h3>
                                <p>Photo Galleries</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{!! STATIC_BASE_URL . '/admin/gallery' !!}" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $images_count }}</h3>
                                <p>Total Photos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div> -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $video_count }}</h3>
                                <p>Total Videos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{!! STATIC_BASE_URL . '/admin/video' !!}" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>4</h3>
                                <p>Team Members</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{!! STATIC_BASE_URL . '/admin/team' !!}" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection