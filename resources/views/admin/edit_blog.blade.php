{!!Form::model($blog,array('url' => "/order/createorder", 'id'=>"edit_work_form" ,'method' => 'post'))!!}
<div class="form-group">
    <label class="col-md-6 control-label"> Title<strong class="requird">*</strong></label>
    <div class="col-md-6">
     {!! Form::text('title',null, array('id' => 'title2','class' => 'form-control','rows' => 4)) !!}
   
     {!! Form::hidden('blog_id',$blog->id, array('id' => 'blog_id','class' => 'form-control')) !!}
   
     <p class="requird" id="screen11"></p>
     
    </div>
</div>
<div class="form-group">
    <label class="col-md-6 control-label">Description</label>
    <div class="col-md-6">
     {!! Form::textarea('description',null, array('id' => 'description2','class' => 'form-control','rows' => 4)) !!}
   
     <p class="requird" id="link11"></p>
     
    </div>
</div>         
{!! Form::close() !!}
