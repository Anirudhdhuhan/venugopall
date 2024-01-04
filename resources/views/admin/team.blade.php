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
                    <h3 class="yn-tile-heading">Team List</h3>
                    <button class='btn btn-success work-butn' id="add">Add</button>
                    <button class='btn btn-success work-butn' id="edit_team">Edit</button>
                    <button class='btn btn-success work-butn' id="add_image">Add Image</button>
                    <button class='btn btn-danger work-butn' id="delete_team">Remove</button>
                    <button class='btn btn-success work-butn' id="view_team">View Detail</button>
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
                <h4 class="modal-hedaing add-work">Add Team Member</h4>
                <button type="button" class="close btn-large add-cross" data-dismiss="modal">&times;</button>
            </div>
                <div class="row">
                    <div class="modal-body each-modal-pding">
                        <form id="add_team_form" name="add_team_form" action="{{ URL::to('/') . '/admin/add-team' }}" method="POST" enctype="multipart/form-data">
                            <div class="col-md-3 title">Name :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="name" name="name">
                            </div>
                            <div class="col-md-3 title">Mobile :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="mobile" name="mobile">
                            </div>
                            <div class="col-md-3 title">Position :</div>
                            <div class="col-md-9">
                                <select required class="create-work-form f-deco wid" id="position" name="position">
                                    <option value="0">Select Position</option>
                                    @foreach($position as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-md-3 title">Address :</div>
                            <div class="col-md-9">
                                <input required type="text" class="create-work-form f-deco wid" id="address" name="address" class="f-deco">
                            </div>

                            <div class="col-md-3 title">Facebook :</div>
                            <div class="col-md-9">
                                <input required type="text" class="create-work-form f-deco wid" id="facebook" name="facebook" class="f-deco">
                            </div>

                            <div class="col-md-3 title">Twitter :</div>
                            <div class="col-md-9">
                                <input type="text" class="create-work-form f-deco wid" id="twitter" name="twitter" class="f-deco">
                            </div>

                            <div class="col-md-3 title">Images :</div>
                            <div class="col-md-9">
                                <input required type="file" id="team_image" name="team_image" size="5">
                            </div>
                            <div class="col-md-12">
                               <center><button type="submit" class="btn btn-success create" id="create-team">Create</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="team_delete_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width:300px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete team</h4>
            </div>
            <div class=" modal-body row" style="text-align:center;">
                Are you sure delete this team?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="delete_team_details" class="btn btn-danger">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="edit_team_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit team</h4>
            </div>
            <div class=" modal-body row" id="edit_team_details">
                Loding.......
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="edit_team_save" class="btn btn-primary">Edit</button>
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
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="edit_image_save" class="btn btn-primary">Edit</button>
            </div> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="view_team_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Team</h4>
            </div>
            <div class=" modal-body row" id="view_team_details">
                Loding.......
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- @endsection

@section('page_script') -->
<script type="text/javascript" src="https://malsup.github.io/jquery.form.js"></script>

<script type="text/javascript">
    admincontroller.teamlist_grid();
    var base_url = "{{ URL::to('/') }}";
    $('#add').click(function() {
        $('#add_work_modal').modal('show');
    });

    $('#delete_team').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a team');
            return;
        }

        $('#team_delete_modal').modal('show');
    });

    $('#delete_team_details').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a team');
            return;
        }
        $.ajax({
            method: "post",
            url: base_url + '/admin/deleteteam',
            data: {
                'id': datarow.id
            },
            success: function(data) {
                $('#team_delete_modal').modal('hide');
                $('#jqxgrid').jqxGrid('updatebounddata');
            }
        });
    });

    $('#edit_team').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if (!datarow) {
            alert('Please select a team');
            return;
        }

        $.ajax({
            method: 'get',
            url: base_url + '/admin/editviewteam',
            data: {
                'team_id': datarow.id
            },
            success: function(data) {
                $('#edit_team_modal').modal('show');
                $('#edit_team_details').html(data);
            }
        });
    });

    $('#add_image').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if (!datarow) {
            alert('Please select a team');
            return;
        }

        $.ajax({
            method: 'get',
            url: base_url + '/admin/editteamimage',
            data: {
                'team_id': datarow.id
            },
            success: function(data) {
                $('#edit_image_modal').modal('show');
                $('#edit_image_details').html(data);
            }
        });
    });

    $('#edit_team_save').on('click', function() {

        var name = $('#name2').val();
        var mobile = $('#mobile2').val();
        var position = $('#position2').val();
        var address = $('#address2').val();
        var facebook = $('#facebook2').val();
        var twitter = $('#twitter2').val();
        var team_id = $('#team_id').val();

        if (name == '') {
            alert('please flll name');
            return;
        }
        if (mobile == '') {
            alert('please flll mobile');
            return;
        }
        if (position == '') {
            alert('please select position');
            return;
        }
        if (address == '') {
            alert('please fill address');
            return;
        }
        if (facebook == '') {
            alert('please flll facebook');
            return;
        }
        if (twitter == '') {
            alert('please flll twitter');
            return;
        }

        $.ajax({
            method: 'post',
            url: base_url + '/admin/editteamsave',
            data: $('#edit_team_form').serialize() + "&team_id=" + team_id,
            success: function(data) {

                $('#jqxgrid').jqxGrid('updatebounddata');
                $('#edit_team_modal').modal('hide');
                $("#jqxgrid").jqxGrid('clearselection');

            }
        });

    });

    $('#view_team').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        // alert(datarow);
        if (!datarow) {
            alert('Please select a team');
            return;
        }

        $.ajax({
            method: 'post',
            url: base_url + '/admin/viewteam',
            data: {
                'team_id': datarow.id
            },
            success: function(data) {
                $('#view_team_modal').modal('show');
                $('#view_team_details').html(data);
            }
        });
    });
</script>
@endsection