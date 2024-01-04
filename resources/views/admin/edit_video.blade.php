{!!Form::model($video,array('url' => secure_base_url("admin/editvideosave"), 'id'=>"edit_video_form" ,'method' => 'post'))!!}
    <div class="form-group">
        <label class="col-md-6 control-label"> Title<strong class="requird">*</strong></label>
        <div class="col-md-6">
         {!! Form::text('title',null, array('id' => 'title','class' => 'form-control','rows' => 4)) !!}
       
         {!! Form::hidden('video_id',$video->id, array('id' => 'video_id','class' => 'form-control','required')) !!}
       
         <p class="requird" id="screen11"></p>
         
        </div>
    </div>
    
   <div class="form-group">
        <label class="col-md-6 control-label"> Video URL<strong class="requird">*</strong></label>
        <div class="col-md-6">
         {!! Form::text('videourl',null, array('id' => 'videourl','class' => 'form-control','rows' => 4,'required')) !!}

         <p class="requird" id="screen11"></p>
         
        </div>
    </div>
     <button type="submit" class="btn btn-primary" id="create-video" style=" margin-left: 54% ! important;">Save</button>
{!! Form::close() !!}
