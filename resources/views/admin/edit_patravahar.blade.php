            {!!Form::model($patra,array('url' => "admin/editpatravaharsave", 'id'=>"edit_video_form" ,'method' => 'post','enctype'=>'multipart/form-data','multiple'=>true))!!}
                <div class="form-group">
                   
                    <label class="col-md-6 control-label">Title<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::text('title',$patra->title, array('id' => 'title2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="link11"></p>
                     
                    </div>
                </div>
                 <label class="col-md-6 control-label"> Image</label>
                    <div class="form-group">
                    <div class="col-md-6">
                      <input  type="file" id="patra_image" name="patra_image[]" size="5" multiple>
                   
                     {!! Form::hidden('patra_id',$patra->id, array('id' => 'patra_id','class' => 'form-control')) !!}
                   
                     <p class="requird" id="screen11"></p>
                     
                    </div>
                </div>
                
                 <button type="submit" class="btn btn-primary" id="create-video" style=" margin-left: 54% ! important;">Save</button>
                {!! Form::close() !!}
