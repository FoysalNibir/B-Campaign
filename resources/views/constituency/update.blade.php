@extends('layouts.main')
@section('extrascript')
<script type="text/javascript">
     document.getElementById("name").value = '<?php echo ($constituency['name']);?>';
     document.getElementById("remark").value = '<?php echo ($constituency['remark']);?>';
     document.getElementById("rp_name").value = '<?php echo ($constituency['rp_name']);?>';
     document.getElementById("op_name").value = '<?php echo ($constituency['op_name']);?>';
</script>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

  </section>

  <!-- Main content -->
  <section class="content container-fluid">


    <div class="row">

      <div class="col-xs-8">
        @if ( count( $errors ) > 0 )
        @foreach ($errors->all() as $error)
        <div class="callout callout-danger">
          <h4>{{ $error }}</h4>
        </div>
        @endforeach
        @endif
        @if(Session::has('error'))
        <div class="callout callout-danger">
          <h4>{{Session::get('error')}}</h4>
        </div>
        @endif
        @if(Session::has('status'))
        <div class="callout callout-success">
          <h4>{{Session::get('status')}}</h4>
        </div>
        @endif


        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Update DET</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('constituency.edit.post',$constituency['id']) }}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input id="name" name="name" type="text" class="form-control" >
              </div>
              <div class="form-group">
                <label>Remark</label>
                <textarea id="remark" name="remark" class="form-control" rows="3" ></textarea>
              </div>
              <div class="form-group">
                <label>RP Name</label>
                <input id="rp_name" name="rp_name" type="text" class="form-control" >
              </div>
              <div class="form-group">
                <label>OP Name</label>
                <input id="op_name" name="op_name" type="text" class="form-control" >
              </div>
              <div class="form-group">
                  <label>DET</label>
                  <select class="form-control select2" name="det">
                    @foreach($dets as $det)
                      <option value="{{$det['id']}}">{{$det->name}}</option>
                    @endforeach
                  </select>
               </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>           
            </form>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

      <!-- /.box -->
    </div>



  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop