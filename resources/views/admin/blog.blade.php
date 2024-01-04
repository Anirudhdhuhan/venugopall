@extends('includes.admin_layout') @section('page_content')

<style type="text/css">
    .work-butn {
        height: 35px;
        width: 100px;
        font-size: 16px !important;
        font-weight: 500;
        margin-left: 15px;
    }
    
    .add-work {
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
    
    .title {
        font-size: 17px;
        font-weight: 500;
        color: #323232;
        opacity: 0.7;
        letter-spacing: 1px;
        margin-top: 12px;
    }
    
    button,
    input,
    select,
    textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        margin-top: 15px !important;
    }
    
    .f-deco {
        height: 40px;
        border: solid 1px #cce;
        border-radius: 6px;
        padding: 8px;
        font-size: 15px !important;
    }
    
    .create {
        height: 40px;
        width: 200px;
        font-size: 20px !important;
        font-weight: 500;
        color: #fff;
        text-align: center;
        margin-bottom: 20px;
    }
    
   /* @media only screen and (max-width: 1440px) {
        .create {
            margin-left: 0px !important;
        }
    }
    */
    .wid {
        width: 330px;
    }
</style>

<div class="container" style="width:100%">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body  yn-tile">
                    <h3 class="yn-tile-heading">Blog List</h3>
                    <button class='btn btn-success work-butn' id="add">Add</button>
                    <button class='btn btn-success work-butn' id="edit_work">Edit</button>
                    <button class='btn btn-success work-butn' id="add_image">Edit Image</button>
                    <button class='btn btn-danger work-butn' id="delete_work">Remove</button>
                     <button class='btn btn-success work-butn' id="view_press">View</button>
                    <!-- <button class='btn btn-default  pull-right reset-filter'>Reset Filters</button> -->
                    <div style='margin-top: 20px;' id="success_msg" style="color:green;"></div>
                    <div style='margin-top: 20px;' id="jqxgrid"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="modal fade" id="add_work_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-content-block">
            <div class="modal-header no-btm-bdr">
                <h4 class="modal-hedaing add-work">Add Blog</h4>
                <button type="button" class="close btn-large add-cross" data-dismiss="modal">&times;</button>
            </div>
                <div class="row">
                    <div class="modal-body each-modal-pding">
                        <form id="add_work_form" name="add_work_form" action="{{ URL::to('/') . '/admin/add-blog' }}" method="POST" enctype="multipart/form-data">
                            <div class="col-md-3 title">Title :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="work_title" name="work_title">
                            </div>
                            <div class="col-md-3 title">Description :</div>
                            <div class="col-md-9">
                                <textarea required class="create-work-form f-deco" rows="4" cols="42" id="work_dscription" name="work_description"></textarea>
                            </div>

                            <div class="col-md-3 title">Images :</div>
                            <div class="col-md-9">
                                <input required type="file" id="work_image" name="work_image[]" size="5" multiple>
                            </div>
                            <div class="col-md-12">
                               <center><button type="submit" class="btn btn-success create" id="create-work">Create</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="work_delete_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width:300px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Blog</h4>
            </div>
            <div class=" modal-body row" style="text-align:center;">
                Are you sure delete this Blog?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="delete_work_details" class="btn btn-danger">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->

<div id="edit_image_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Image</h4>
            </div>
            <div class=" modal-body row" id="edit_image_details">
                Loding.......
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="view_press_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width:1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Blog</h4>
            </div>
            <div class=" modal-body row" id="view_press_details">
                Loding.......
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- @endsection

@section('page_script') -->
<script type="text/javascript" src="https://malsup.github.io/jquery.form.js"></script>

<script type="text/javascript">
    admincontroller.bloglist_grid();
    var base_url = "{{ URL::to('/') }}";
    $('#add').click(function() {
        // $('#add_work_modal').modal('show');
         window.location.href = base_url + "/admin/addblog";
    });

    $('#delete_work').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a Blog');
            return;
        }

        $('#work_delete_modal').modal('show');
    });

    $('#delete_work_details').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a Blog');
            return;
        }
        $.ajax({
            method: "post",
            url: base_url + '/admin/deleteblog',
            data: {
                'id': datarow.id
            },
            success: function(data) {
                $('#work_delete_modal').modal('hide');
                $('#jqxgrid').jqxGrid('updatebounddata');
            }
        });
    });

    $('#edit_work').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if (!datarow) {
            alert('Please select a Blog');
            return;
        }
        window.location.href = base_url + "/admin/editviewblog?blog_id=" + datarow.id;
        // $.ajax({
        //     method: 'get',
        //     url: base_url + '/admin/editviewblog',
        //     data: {
        //         'blog_id': datarow.id
        //     },
        //     success: function(data) {
        //         $('#edit_work_modal').modal('show');
        //         $('#edit_work_details').html(data);
        //     }
        // });
    });

    $('#add_image').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if (!datarow) {
            alert('Please select a Blog');
            return;
        }

        $.ajax({
            method: 'get',
            url: base_url + '/admin/editblogimage',
            data: {
                'blog_id': datarow.id
            },
            success: function(data) {
                $('#edit_image_modal').modal('show');
                $('#edit_image_details').html(data);
            }
        });
    });


    $('#view_press').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if (!datarow) {
            alert('Please select a title');
            return;
        }

        $.ajax({
            method: 'post',
            url: base_url + '/admin/viewblog',
            data: {
                'blog_id': datarow.id
            },
            success: function(data) {
                $('#view_press_modal').modal('show');
                $('#view_press_details').html(data);
            }
        });
    });
</script>
@endsection