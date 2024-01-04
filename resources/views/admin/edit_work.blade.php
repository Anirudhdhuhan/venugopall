{!!Form::model($work,array('url' => "/order/createorder", 'id'=>"edit_work_form" ,'method' => 'post'))!!}
                <div class="form-group">
                    <label class="col-md-6 control-label"> Title<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::text('title',null, array('id' => 'title2','class' => 'form-control','rows' => 4)) !!}
                   
                     {!! Form::hidden('work_id',$work->id, array('id' => 'work_id','class' => 'form-control')) !!}
                   
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
                 
                <div class="form-group">
                    <label class="col-md-6 control-label">खासदार निधी<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     @if($work->mp_fund == 1)
                     {!! Form::checkbox('mp_fund',1, true,null,array('id' => 'mp_fund','class' => 'form-control')) !!}
                     @else
                     {!! Form::checkbox('mp_fund',1, false,null,array('id' => 'mp_fund','class' => 'form-control')) !!}
                     @endif
                   
                     <p class="requird" id="position11"></p>
                     
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-6 control-label">Work Area<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::select('work_area',$work_area_list,null, array('id' => 'work_area2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="position11"></p>
                     
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Work Division<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::select('work_devision',$work_division_list,null, array('id' => 'work_division2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="position11"></p>
                     
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Work Type<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::select('work_type',$work_type_list,null, array('id' => 'work_type2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="position11"></p>
                     
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-6 control-label">Position<strong class="requird">*</strong></label>
                    <div class="col-md-6">
                     {!! Form::select('position',$position_list,null, array('id' => 'position','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="position11"></p>
                     
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-6 control-label">Date</label>
                    <div class="col-md-6">
                     {!! Form::date('date',$work->date, array('id' => 'date2','class' => 'form-control','rows' => 4)) !!}
                   
                     <p class="requird" id="link11"></p>
                     
                    </div>
                </div>
               
                 
                {!! Form::close() !!}
