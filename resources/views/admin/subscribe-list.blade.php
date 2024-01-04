@extends('includes.admin_layout')
@section('page_content')
<div class="container" style="width:100%">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body  yn-tile">
                    <h3 class="yn-tile-heading">Subscriber List</h3>
                    <div style='margin-top: 20px;' id="jqxgrid"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    admincontroller.subscribelist_grid();
</script>
@endsection