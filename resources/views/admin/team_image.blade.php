            {!!Form::model($team,array('url' => "admin/teamimagesave", 'id'=>"edit_video_form" ,'method' => 'post','enctype'=>'multipart/form-data','multiple'=>true))!!}
                <div class="form-group">
                    <label class="col-md-6 control-label"> Image<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                      <input required type="file" id="team_image" name="team_image" size="5" >
                   
                     {!! Form::hidden('team_id',$team->id, array('id' => 'team_id','class' => 'form-control','required')) !!}
                   
                     <p class="requird" id="screen11"></p>
                     
                    </div>
                </div>
                
                 <button type="submit" class="btn btn-primary" id="create-video" style=" margin-left: 54% ! important;">Save</button>
                {!! Form::close() !!}
