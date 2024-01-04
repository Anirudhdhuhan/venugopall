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
   input[type=text].jqx-input, input[type=password].jqx-input{
        margin-top: 0px !important;
    }
 
</style>

<div class="container" style="width:100%">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body  yn-tile">
                    <h3 class="yn-tile-heading">Organization List</h3>
                    <button class='btn btn-success work-butn' id="add">Add</button>
                    <button class='btn btn-success work-butn' id="edit_work">Edit</button>
                    <button class='btn btn-success work-butn' id="add_image">Add Image</button>
                    <button class='btn btn-danger work-butn' id="delete_work">Remove</button>
                     <button class='btn btn-success work-butn' id="view_organization">View</button>
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
                <h4 class="modal-hedaing add-work">Add Organization Leader</h4>
                <button type="button" class="close btn-large add-cross" data-dismiss="modal">&times;</button>
            </div>
                <div class="row">
                    <div class="modal-body each-modal-pding">
                        <form id="add_work_form" name="add_work_form" action="{{ URL::to('/') . '/admin/add-organization_leader' }}" method="POST" enctype="multipart/form-data">
                            <div class="col-md-3 title">Name :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="name" name="name">
                            </div>
                            <div class="col-md-3 title">Address :</div>
                            <div class="col-md-9">
                                <textarea required class="create-work-form f-deco" rows="4" cols="42" id="address" name="address"></textarea>
                            </div>
                            <div class="col-md-3 title">Position :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="position" name="position">
                            </div>
                            <div class="col-md-3 title">Email :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="email" name="email">
                            </div>
                            <div class="col-md-3 title">Phone No :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="phone_no" name="phone_no">
                            </div>

                            <div class="col-md-3 title">Images :</div>
                            <div class="col-md-9">
                                <input required type="file" id="work_image" name="work_image" size="5" multiple>
                            </div>

                            <div class="col-md-3 title">State :</div>
                            <div class="col-md-9">
                                <select class="form-control" name="state" id="state">
                                    <option value="Andhra-Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal-Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal-Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu-Kashmir">Jammu &amp; Kashmir</option>
                                    <option value="Jharkand">Jharkand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya-Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil-Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttarakhand" >Uttarakhand</option>
                                    <option value="Uttar-Pradesh">Uttar Pradesh</option>
                                    <option value="West-Bengal">West Bengal</option>
                                </select>
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
                <h4 class="modal-title">Delete Organization Leader</h4>
            </div>
            <div class=" modal-body row" style="text-align:center;">
                Are you sure delete this organization leader?

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

<div id="edit_work_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Organization Leader</h4>
            </div>
            <div class=" modal-body row" id="edit_work_details">
                Loding.......
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="edit_work_save" class="btn btn-primary">Edit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
                <h4 class="modal-title">View Organization Leader</h4>
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
    admincontroller.organizationlist_grid();
    var base_url = "{{ URL::to('/') }}";
    $('#add').click(function() {
        $('#add_work_modal').modal('show');
    });


    $('#delete_work').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a leader');
            return;
        }

        $('#work_delete_modal').modal('show');
    });

    $('#delete_work_details').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a leader');
            return;
        }
        $.ajax({
            method: "post",
            url: base_url + '/admin/deletepress_notes',
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
            alert('Please select a leader');
            return;
        }

        $.ajax({
            method: 'get',
            url: base_url + '/admin/editviewpress_notes',
            data: {
                'notes_id': datarow.id
            },
            success: function(data) {
                $('#edit_work_modal').modal('show');
                $('#edit_work_details').html(data);
            }
        });
    });

    $('#add_image').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if (!datarow) {
            alert('Please select a leader');
            return;
        }

        $.ajax({
            method: 'get',
            url: base_url + '/admin/editpress_notesimage',
            data: {
                'notes_id': datarow.id
            },
            success: function(data) {
                $('#edit_image_modal').modal('show');
                $('#edit_image_details').html(data);
            }
        });
    });

    $('#edit_work_save').on('click', function() {

        var title = $('#title2').val();
        var description = $('#description2').val();
        var notes_id = $('#notes_id').val();

        if (title == '') {
            alert('please flll title');
            return;
        }
        if (description == '') {
            alert('please flll description');
            return;
        }


        $.ajax({
            method: 'post',
            url: base_url + '/admin/editpress_notessave',
            data: $('#edit_work_form').serialize() + "&notes_id=" + notes_id,
            success: function(data) {

                $('#jqxgrid').jqxGrid('updatebounddata');
                $('#edit_work_modal').modal('hide');
                $("#jqxgrid").jqxGrid('clearselection');

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
            url: base_url + '/admin/viewpress_notes',
            data: {
                'notes_id': datarow.id
            },
            success: function(data) {
                $('#view_press_modal').modal('show');
                $('#view_press_details').html(data);
            }
        });
    });
</script>
@endsection