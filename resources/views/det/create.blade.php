@extends('layouts.main')


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
            <h3 class="box-title">Create DET</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('det.create.post') }}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input name="name" type="name" class="form-control" placeholder="Enter Name">
              </div>
              

              <!-- textarea -->
              <div class="form-group">
                <label>Remark</label>
                <textarea name="remark" class="form-control" rows="3" placeholder="Enter Remark"></textarea>
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