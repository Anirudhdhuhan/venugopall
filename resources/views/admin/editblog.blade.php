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
<script src="{{ STATIC_BASE_URL.'/ckeditor/ckeditor.js' }}"></script>
<script src="{{ STATIC_BASE_URL.'/ckeditor/samples/js/sample.js' }}"></script>
<link rel="stylesheet" href="{{ STATIC_BASE_URL.'/ckeditor/samples/css/samples.css' }}">

<div class="container" style="width:100%">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                 <div class="modal-content modal-content-block">
            <div class="modal-header no-btm-bdr">
                <h4 class="modal-hedaing add-work">Edit Blog</h4>
                
            </div>
                <div class="row">
                    {!!Form::model($blog,array('url' => "/admin/editblogsave", 'id'=>"edit_work_form" ,'method' => 'post'))!!}
                        <div class="form-group">
                            <label class="col-md-6 control-label"> Title<strong class="requird">*</strong></label>
                            <div class="col-md-6">
                             {!! Form::text('title',null, array('id' => 'title','class' => 'form-control','rows' => 4)) !!}
                           
                             {!! Form::hidden('blog_id',$blog->id, array('id' => 'blog_id','class' => 'form-control')) !!}
                           
                             <p class="requird" id="screen11"></p>
                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Description</label>
                            <div class="col-md-6">
                             {!! Form::textarea('description',null, array('id' => 'editor','class' => 'form-control','rows' => 4)) !!}
                           
                             <p class="requird" id="link11"></p>
                             
                            </div>
                         </div>
                        <div class="col-md-12">
                               <center><button type="button" class="btn btn-success create" id="create-work">Save</button></center>
                        </div>
                 
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


<!-- @endsection

@section('page_script') -->
<script type="text/javascript" src="https://malsup.github.io/jquery.form.js"></script>
<script>
    initSample();
</script>
<script type="text/javascript">
   
    var base_url = "{{ URL::to('/') }}";
    $('#create-work').on('click',function () {
        var title = $('#title').val();
        

        var description = CKEDITOR.instances.editor.getData();
        if(title=='')
        {
            alert('fill title');
            return;
        }
        if(description=='')
        {
            alert('fill description');
            return;
        }
    
        $('input[name=work_description]').val(description);

        $('#edit_work_form').submit();
    })
    
    
</script>
@endsection