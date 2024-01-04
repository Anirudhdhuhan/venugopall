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
                    <h3 class="yn-tile-heading">Work List</h3>
                    <button class='btn btn-success work-butn' id="add">Add</button>
                    <button class='btn btn-success work-butn' id="edit_work">Edit</button>
                    <button class='btn btn-success work-butn' id="add_image">Add Image</button>
                    <button class='btn btn-danger work-butn' id="delete_work">Remove</button>
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
                <h4 class="modal-hedaing add-work">Add Work</h4>
                <button type="button" class="close btn-large add-cross" data-dismiss="modal">&times;</button>
            </div>
                <div class="row">
                    <div class="modal-body each-modal-pding">
                        <form id="add_work_form" name="add_work_form" action="{{ URL::to('/') . '/admin/add-work' }}" method="POST" enctype="multipart/form-data">
                            <div class="col-md-3 title">Title :</div>
                            <div class="col-md-9">
                                <input type="text" required class="create-work-form f-deco wid" id="work_title" name="work_title">
                            </div>
                            <div class="col-md-3 title">Description :</div>
                            <div class="col-md-9">
                                <textarea required class="create-work-form f-deco" rows="4" cols="42" id="work_dscription" name="work_description"></textarea>
                            </div>
                            <div class="col-md-3 title">खासदार निधी :</div>
                            <div class="col-md-9">
                             <input type="checkbox" class ="f-deco" name="mp_fund"  />
                               
                            </div>
                            <div class="col-md-3 title">Work Area :</div>
                            <div class="col-md-9">
                                <select required class="create-work-form f-deco" id="work_area" name="work_area">
                                    <option value="0">Select Work Area</option>
                                    @foreach($area as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-md-3 title">Work Type :</div>
                            <div class="col-md-9">
                                <select required class="create-work-form f-deco" id="work_type" name="work_type">
                                    <option value="0">Select Work Type</option>
                                    @foreach($type as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 title">Work Division :</div>
                            <div class="col-md-9">
                                <select required class="create-work-form f-deco" id="work_division" name="work_division">
                                    <option value="0">Select Work Division</option>
                                    @foreach($division as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 title">Work Date :</div>
                            <div class="col-md-9">
                                <input required type="date" id="work_date" name="work_date" class="f-deco">
                            </div>

                            <div class="col-md-3 title">Position :</div>
                            <div class="col-md-9">
                               {!! Form::select('position',$position,null, array('id' => 'position','class' => 'f-deco')) !!}
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
                <h4 class="modal-title">Delete work</h4>
            </div>
            <div class=" modal-body row" style="text-align:center;">
                Are you sure delete this work?

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
                <h4 class="modal-title">Edit work</h4>
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
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="edit_image_save" class="btn btn-primary">Edit</button>
            </div> -->
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
    admincontroller.worklist_grid();
    var base_url = "{{ URL::to('/') }}";
    $('#add').click(function() {
        $('#add_work_modal').modal('show');
    });

    // $("#add_work_form").submit(function(e)
    // {
    //  e.preventDefault();
    //  if($('#create-work').hasClass('loading'))
    //  {
    //      return;
    //  }

    //  $('#create-work').addClass('loading');
    //  var data = $("#add_work_form").serialize();
    //  $.ajax(
    //  {
    //      method : "post",
    //      url : base_url + '/admin/add-work',
    //      data: data,
    //      success:function(data)
    //      {
    //          $('#add_work_modal').modal('hide');
    //      }
    //  });
    // });

    $('#delete_work').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a work');
            return;
        }

        $('#work_delete_modal').modal('show');
    });

    $('#delete_work_details').on('click', function() {
        var selectedrowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
        var datarow = $('#jqxgrid').jqxGrid('getrowdata', selectedrowindex);
        if (!datarow) {
            alert('Please select a work');
            return;
        }
        $.ajax({
            method: "post",
            url: base_url + '/admin/deletework',
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
            alert('Please select a work');
            return;
        }

        $.ajax({
            method: 'get',
            url: base_url + '/admin/editviewwork',
            data: {
                'work_id': datarow.id
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
            alert('Please select a work');
            return;
        }

        $.ajax({
            method: 'get',
            url: base_url + '/admin/editworkimage',
            data: {
                'work_id': datarow.id
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
        var date = $('#date2').val();
        var work_area = $('#work_area2').val();
        var work_division = $('#work_division2').val();
        var work_type = $('#work_type2').val();
        var work_id = $('#work_id').val();

        if (title == '') {
            alert('please flll title');
            return;
        }
        if (description == '') {
            alert('please flll description');
            return;
        }

        if (work_area == '') {
            alert('please select work_area');
            return;
        }
        if (work_division == '') {
            alert('please select work_division');
            return;
        }
        if (work_type == '') {
            alert('please select work_type');
            return;
        }
        if (date == '') {
            alert('please flll date');
            return;
        }

        $.ajax({
            method: 'post',
            url: base_url + '/admin/editworksave',
            data: $('#edit_work_form').serialize() + "&work_id=" + work_id,
            success: function(data) {

                $('#jqxgrid').jqxGrid('updatebounddata');
                $('#edit_work_modal').modal('hide');
                $("#jqxgrid").jqxGrid('clearselection');

            }
        });

    });
</script>
@endsection