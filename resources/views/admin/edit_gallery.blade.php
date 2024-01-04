<div class="modal fade" id="galleryeditModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-content-block" id="admin-modal">
            <div class="modal-header no-btm-bdr"> 
                <h4 class="modal-hedaing pull-left"> 
                    Edit Gallary
                </h4>
                <button type="button" class="btn-large pull-right" data-dismiss="modal">&times;</button> 
            </div>
            <div class="modal-body each-modal-pding">
            {!!Form::model($gallery,array('url' => secure_base_url("creategallery"), 'id'=>"edit_gallery" ,'method' => 'post','enctype'=>'multipart/form-data'))!!}

                {!! Form::hidden('gallery_id',$gallery->id, array('id' => 'gallery_id','class' => 'form-control')) !!}

                 {!! Form::text('name',$gallery->name, array('id' => 'edit_name','class' => 'form-control')) !!}
                <button type="button" class="btn btn-primary save-btn" id="edit-save">
                     <i class="fa fa-btn fa-user"></i>Save 
                </button>
                <label class="checkbox-inline pull-right" id="checkbox-wrapper">
                @if($gallery->published==1)
                    {!! Form::checkbox('enable',false,null,array('id' => 'edit_enable','class' => 'admin-checkbox','checked'=>'checked')) !!}Enable
                 @else
                    {!! Form::checkbox('enable',false,null,array('id' => 'edit_enable','class' => 'admin-checkbox')) !!}Enable
                @endif                  
                </label>
               
            </div>
        </div>
    </div>
</div>