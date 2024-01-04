@extends('includes.admin_layout')
@section('page_content')

<style type="text/css">

    .work-butn{
       height: 35px;
       width: 100px;
       font-size: 16px !important;
       font-weight: 500;
       margin-left: 15px;
    }
    .add-work{
        font-size: 24px;
        color: #323232;
        opacity: 0.9;
        letter-spacing: 1px;
        word-spacing: 2px;
        text-align: center;
    }
    .modal-header .close {
    margin-top: -40px !important;
    height: 20px;
    width: 20px;
    font-size: 34px;
}
.title{
    font-size: 18px;
    font-weight: 500;
    color: #323232;
    opacity: 0.7;
    letter-spacing: 1px;
    margin-top: 10px;
}
button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin-top: 15px !important;
}
.f-deco{
    height: 40px;
    border: solid 1px #cce;
    border-radius: 6px;
    padding: 8px;
    font-size: 15px !important;
}
.create{
    height: 40px;
    width: 200px;
    font-size: 20px !important;
    font-weight: 500;
    color: #fff;
    margin-left: 200px;
}
@media only screen and (max-width: 1440px) {
    .create {
       margin-left: 0px !important;
    }
}
.wid{
    width:330px;
}
input[type=text].jqx-input, input[type=password].jqx-input{
        margin-top: 0px !important;
    }
</style>

    <div class="container" style="width:100%">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body  yn-tile">
                        <h3 class="yn-tile-heading">Video List</h3>
                        <button class='btn btn-success work-butn' id="add">Add</button>
                        <button class='btn btn-success work-butn' id="edit_video">Edit</button>
                        <button class='btn btn-danger work-butn' id="delete_video">Remove</button>
                        <button class='btn btn-success work-butn' id="view_video">View</button>
                        <!-- <button class='btn btn-default  pull-right reset-filter'>Reset Filters</button> -->
                        <div style='margin-top: 20px;' id="success_msg" style="color:green;"></div> 
                        <div style='margin-top: 20px;' id="jqxgrid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_video_modal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content modal-content-block">
                <div class="modal-header no-btm-bdr"> 
                    <h4 class="modal-hedaing add-work">Add Video</h4>
                    <button type="button" class="close btn-large add-cross" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body each-modal-pding">
                    <div class="container">
                    <form id="add_work_form" name="add_work_form" action="add-videourl" method="post" enctype="multipart/form-data">
                            <div class="row">
                        <div class="col-md-2 title">Title :</div>
                        <div class="col-md-10">
                            <input type="text" required class="create-work-form f-deco wid" id="title" name="title"> 
                        </div>
                        <br>
                        <div class="col-md-2 title">URL :</div>
                        <div class="col-md-10">
                            <input type="text" required class="create-work-form f-deco wid" id="videourl" name="videourl">
                        </div>
                         
                        <button type="submit" class="btn btn-success create" id="create-work" style=" margin-left: 20% ! important;">Create</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div id="video_delete_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width:300px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Video</h4>
            </div>
            <div class=" modal-body row" style="text-align:center;" >
             Are you sure that you want to delete this Video?
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="delete_video_details" class="btn btn-danger">Delete</button>
            </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="edit_video_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Edit Video</h4>
            </div>
            <div class=" modal-body row" id="edit_video_details">
                Loding.......
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="edit_video_save" class="btn btn-primary">Edit</button>
            </div> -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="view_Video_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Video Details</h4>
            </div>
            <div class=" modal-body row" id="view_Video_details_cmt">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               
            </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--    <script type="text/javascript" src="https://malsup.github.io/jquery.form.js"></script>-->

    <script type="text/javascript">
    admincontroller.videolist_grid();
        var base_url = "{{ STATIC_BASE_URL }}";
        $('#add').click(function()
        {
            $('#add_video_modal').modal('show');
        });

    $('#delete_video').on('click',function()
    {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if(!datarow)
        {
            alert('Please select a video');
            return;
        }
        
        $('#video_delete_modal').modal('show');
    });

    $('#delete_video_details').on('click',function()
    {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if(!datarow)
        {
            alert('Are you sure that you want to delete this Video ?');
            return;
        }
        $.ajax({
            method:"post",
            url:base_url+'/admin/deletevideo',
            data:{'id': datarow.id},
            success:function(data)
            {
                $('#video_delete_modal').modal('hide');
                $('#jqxgrid').jqxGrid('updatebounddata');
            }
        });
    });

    $('#edit_video').on('click',function(){
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if(!datarow){
            alert('Please select a video');
            return;
        }

        $.ajax({
            method:'get',
            url:base_url+'/admin/editviewvideo',
            data:{
                'video_id' : datarow.id
            },
            success:function(data)
            {
                $('#edit_video_modal').modal('show');
                $('#edit_video_details').html(data);
            }
        });
     });

    $('#view_video').on('click',function(){
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if(!datarow){
            alert('Please select a video');
            return;
        }

        $.ajax({
            method:'post',
            url:base_url+'/admin/viewvideo',
            data:{
                'video_id' : datarow.id
            },
            success:function(data)
            {
                $('#view_Video_modal').modal('show');
                $('#view_Video_details_cmt').html(data);
            }
        });
     });


    </script>
@endsection