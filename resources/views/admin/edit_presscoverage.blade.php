            {!!Form::model($press,array('url' => "admin/editpresscoveragesave", 'id'=>"edit_video_form" ,'method' => 'post','enctype'=>'multipart/form-data','multiple'=>true))!!}
                <div class="form-group">
                   
                    <label class="col-md-6 control-label">Title<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::text('title',$press->title, array('id' => 'title2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="link11"></p>
                     
                    </div>
                </div>
                 <label class="col-md-6 control-label"> Image</label>
                    <div class="form-group">
                    <div class="col-md-6">
                      <input type="file" id="press_image" name="press_image[]" size="5" multiple>
                   
                     {!! Form::hidden('press_id',$press->id, array('id' => 'press_id','class' => 'form-control')) !!}
                   
                     <p class="requird" id="screen11"></p>
                     
                    </div>
                </div>
                
                 <button type="submit" class="btn btn-primary" id="create-video" style=" margin-left: 54% ! important;">Save</button>
                {!! Form::close() !!}
