            {!!Form::model($work,array('url' => "admin/imagesave", 'id'=>"edit_video_form" ,'method' => 'post','enctype'=>'multipart/form-data','multiple'=>true))!!}
                <div class="form-group">
                    <label class="col-md-6 control-label"> Image<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                      <input required type="file" id="work_image" name="work_image[]" size="5" multiple>
                   
                     {!! Form::hidden('work_id',$work->id, array('id' => 'work_id','class' => 'form-control','required')) !!}
                   
                     <p class="requird" id="screen11"></p>
                     
                    </div>
                </div>
                
                 <button type="submit" class="btn btn-primary" id="create-video" style=" margin-left: 54% ! important;">Save</button>
                {!! Form::close() !!}
