<style type="text/css">

    .create-butn{
        height: 40px;
        width: 250px;
        background-color: #f7f7f7;
        color: #ff9933;
        font-size: 20px;
        border: solid 2px #ff9933;
    }
    .edit{
        padding-left: 20px !important;
        color: #323232 !important;
        z-index: 20;
        margin-top: -200px;
        font-size: 20px;
        cursor: pointer;
    }
    .cross{
       font-size: 30px !important;
       z-index: 50;
       color: black !important;
       padding-right: 10px !important;
       margin-top: -205px !important;
    }
    .cover{
        height: 200px !important;
        width: 100% !important;
        color: #323232 !important;
        border: solid 1px #cce;
        margin-bottom: 20px;
    }
    .demo{
       background-color: #cce;
       color: #323232;
       font-weight: 500;
       font-size:16px !important;
       padding-left: 10px;
    }
    .demo:hover{
        color: #323232 !important;
    }
   
   .demo:hover:focus{
        color: #323232 !important;
    }

</style>

@extends('includes.admin_layout')
@section('page_content')
<div class="row" style="height:auto;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body  yn-tile">
                <h3 class="yn-tile-heading">Photo Gallery</h3>
                <div class="row" >
                    <div class="panel-heading"><button id="create-gallery" class="create-butn">Create Gallery</button></div>
                    <div class="panel-body">
                        <div class="admin-gallery">
                            @foreach($allGalleries as $row)
                                <div class="col-xm-4 col-sm-4 col-md-4">
                                    <a href="/admin/gallery/{{ $row->id }}">
                                        <div class="admin-gallery-inner" data-id="{{ $row->id }}">
                                            <div class="admin-gallery-img">
                                            <div class="admin-img-content demo">{{ $row->name }}</div>
                                                <img src="{{ $row->cover }}" class="cover">
                                            </div>
                                        </div> 
                                    </a>
                                    <button type="button" class="close admin-close-btn1 pic-delete" aria-label="Close" data-id="{{ $row->id }}">
                                        <button type="button" class="close btn-large add-cross cross pic-delete" data-dismiss="modal" data-id="{{ $row->id }}">&times;</button>                                       
                                        <p aria-hidden="true" class="edit pic-edit" data-id="{{ $row->id }}">Edit</p>
                                    </button>
                                </div>
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="imageUploadModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-content-block" id="admin-modal">
            <div class="modal-header no-btm-bdr">
                <h4 class="modal-hedaing pull-left">
                    Create Gallary
                </h4>
                <button type="button" class="btn-large pull-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body each-modal-pding">
                <form class="form-horizontal" role="form" method="POST" action="">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Gallery Name"><br>
                    <button type="button" class="btn btn-primary save-btn" id="create-save">
                        <i class="fa fa-btn fa-user"></i>Create
                    </button>
                    <label class="checkbox-inline pull-right" id="checkbox-wrapper">
                        <input type="checkbox" class="admin-checkbox" name="enable" id="enable">Show On Website
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modal-div"></div>
@endsection

@section('page_script')
    <script src="/scripts/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#create-gallery').click(function()
        {
            $('#imageUploadModal').modal('show')
        });

        $('.pic-edit').click(function()
        {   
                var gallery_id = $(this).data('id');
                $.ajax(
                {
                    url: base_url + '/admin/edit-gallery',
                    type: "post",  
                    data: 
                    {
                        'gallery_id'     : gallery_id,
                    },
                    success:function(data)
                    {
                        $('#modal-div').html(data);
                        $('#galleryeditModal').modal('show');
                    }
                });
        });

        var base_url = "{{ STATIC_BASE_URL }}";
        $('#create-save').click(function()
        {
            var name = $('#name').val();
            var enable = $('#enable').val();
             if($('#enable').is(":checked"))
                var published = 1;
            else
                var published = 0;

            if(name=='')
            {
                alert('please fill gallary name');
            }
            $.ajax({
                    url: base_url + '/admin/gallary',
                    type: "post",
                    data:{
                            'name'           : name,
                            'published'      : published,              
                    },
                    success:function(data)
                    {
                        $('#imageUploadModal').modal('hide');
                        window.location.reload();
                    }
                });
        });

        $('.pic-delete').click(function()
        {
            var image = $(this).data('id');
            $.ajax({
                    url: '/admin/delete-gallery',
                    type: 'post',
                    data: 
                    {
                        'image'     : image,
                    },
                    success:function(data)
                    {
                        window.location.reload();
                    }
                });
        });

        $('body').on('click','#edit-save',function()
        {
            var name = $('#edit_name').val();
            var enable = $('#edit_enable').val();
            if($('#edit_enable').is(":checked"))
                var published = 1;

            else
                var published = 0;
           
            if(name=='')
            {
                alert('please fill gallary name');
            }

            var gallery_id = $('#gallery_id').val();
            $.ajax(
            {
                url: base_url + '/admin/gallary/'+gallery_id,
                type: "post",
                data:{
                        'name'       : name,
                        'published'  : published,  
                        'gallery_id' : gallery_id,
                },
                success:function(data)
                {
                    $('#galleryeditModal').modal('hide');
                    window.location.reload();
                }
            });
        });
    </script>
@endsection