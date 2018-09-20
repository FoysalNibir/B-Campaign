@extends('layouts.main')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

  </section>

  <!-- Main content -->
  <section class="content container-fluid">


    <div class="col-xs-12">
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Constituency Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Remark</th>
                  <th>RP</th>
                  <th>OP</th>
                  <th>DET</th>
                  <th>Action</th>
                </tr>
                @foreach($constituencies as $constituency)
                    <tr><td>{{$constituency->id}}</td>
                    <td>{{$constituency->name}}</td>
                    <td>{{$constituency->remark}}</td>
                    <td>{{$constituency->rp_name}}</td>
                    <td>{{$constituency->op_name}}</td>
                    <td>{{$constituency->det->name}}</td>
                    <td><a href="{{route('constituency.edit',$constituency['id'])}}" class="btn btn-primary btn-sm ad-click-event">Edit</a>
                    <a href="{{route('constituency.delete',$constituency['id'])}}" class="btn btn-danger btn-sm ad-click-event">Delete</a></td></tr>
                @endforeach
                
              </tbody></table>
            </div>
            <div class="box-footer clearfix">
              <a href="{{route('constituency.create')}}" class="btn btn-sm btn-info btn-flat pull-right"><i class="fa fa-plus-square"></i>&nbsp;Add Image</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>

<!-- /.box -->
</div>



</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop