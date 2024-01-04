
<style>

    .cover-pic{
       vertical-align: middle;
       height: 248px !important;
       width: 100% !important;
       margin-top: -21px !important;
    }
    .gal-images{
        height: 250px;
        width: 100%;
        background-color: #f9f9f9;
        border: solid 1px #cecece;
    }
    .crosses{
        padding-right: 25px;
        z-index: 20;
    }
    .star-wrapper-filled {
    position: absolute;
    background: url(/images/star_bc.png) no-repeat;
    background-size: cover;
    top: 25px;
    left: 20px;
    width: 22px !important;
    height: 22px !important;
    z-index: 20;
}

.star-wrapper {
    position: absolute;
    background: url(/images/star.png) no-repeat;
    background-size: cover;
    top: 25px;
    left: 20px;
    width: 22px !important;
    height: 22px !important;
    z-index: 20;
}
.add{
    height: 40px;
    width: 250px;
    background-color: #f7f7f7;
    color: #ff9933;
    border: solid 2px #ff9933;
    font-size: 20px;
}

</style>

@extends('includes.admin_layout')
@section('page_content')
    <div class="row" style="height:auto;">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><button id="create-gallery" class="add">Add Photo</button></div>
                <div class="panel-body">
                    <div>
                        @foreach($images as $row)
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="gal-images">
                                    <div class="admin-gallery-inner" data-id="{{ $row->id }}">                       
                                        <button type="button" class="close admin-close-btn pic-delete" aria-label="Close" data-id="{{ $row->id }}">
                                            <span aria-hidden="true" class="crosses">×</span>
                                        </button>
                                        <span class="star-wrapper cover-pic-span" data-id="{{ $row->id }}"></span>
                                    </div>
                                    <img src="{{ $row->image }}" class="cover-pic">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageUploadModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-content-block">
                <div class="modal-header no-btm-bdr"> 
                    <h4 class="modal-hedaing">Upload Photos</h4>
                    <button type="button" class="close btn-large" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body each-modal-pding">
                    {!! Form::open(array('url'=>secure_base_url('/admin/images/' . $id),'method'=>'POST', 'files'=>true)) !!}
                    {!! Form::file('images[]', array('multiple'=>true)) !!}
                    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="current-gallery" value="{{ $id }}">
@endsection
@section('page_script')
    <script src="/scripts/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#create-gallery').click(function()
        {
            $('#imageUploadModal').modal('show')
        });

        $('.cover-pic-span').click(function()
        {
            $('.cover-pic-span').removeClass('star-wrapper-filled');
            $('.cover-pic-span').addClass('star-wrapper');
            
            $(this).addClass('star-wrapper-filled');
            $(this).removeClass('star-wrapper');

            var image = $(this).data('id');
            var gallery = $('#current-gallery').val();

            $.ajax(
            {
                url: '/admin/make-cover',
                type: 'post',
                data: 
                {
                    'image'     : image,
                    'gallery'   : gallery,
                },
                success:function(data)
                {
                    alert('Cover Pic Changed');
                }
            });
        });

        $('.pic-delete').click(function()
        {
            var image = $(this).data('id');
            var html = $(this).parents().eq(1);
            $.ajax({
                    url: '/admin/delete-image',
                    type: 'post',
                    data: 
                    {
                        'image'     : image,
                    },
                    success:function(data)
                    {
                        html.empty();
                    }
                });
        });
    </script>
@endsection