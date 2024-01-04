{!!Form::model($team,array('url' => "/order/createorder", 'id'=>"edit_team_form" ,'method' => 'post'))!!}
                <div class="form-group">
                    <label class="col-md-6 control-label"> Name<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::text('name',null, array('id' => 'name2','class' => 'form-control','rows' => 4)) !!}
                   
                     {!! Form::hidden('team_id',$team->id, array('id' => 'team_id','class' => 'form-control')) !!}
                   
                     <p class="requird" id="screen11"></p>
                     
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-6 control-label">Mobile</label>
                    <div class="col-md-6">
                     {!! Form::text('mobile',$team->date, array('id' => 'mobile2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="link11"></p>
                     
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-6 control-label">Position<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::select('position',$position_list,null, array('id' => 'position2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="position11"></p>
                     
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-6 control-label">Address</label>
                    <div class="col-md-6">
                     {!! Form::text('address',$team->address, array('id' => 'address2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="link11"></p>
                     
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label">Facebook</label>
                    <div class="col-md-6">
                     {!! Form::text('facebook',$team->facebook, array('id' => 'facebook2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="link11"></p>
                     
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label">Twitter</label>
                    <div class="col-md-6">
                     {!! Form::text('twitter',$team->twitter, array('id' => 'twitter2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="link11"></p>
                     
                    </div>
                </div>
               
                 
                {!! Form::close() !!}
