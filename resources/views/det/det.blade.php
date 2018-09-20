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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DET Table</h3>

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
                  <th>Action</th>
                </tr>
                @foreach($dets as $det)
                    <tr><td>{{$det->id}}</td>
                    <td>{{$det->name}}</td>
                    <td>{{$det->remark}}</td>
                    <td><a href="{{route('det.edit',$det['id'])}}" class="btn btn-primary btn-sm ad-click-event">Edit</a>
                    <a href="{{route('det.delete',$det['id'])}}" class="btn btn-danger btn-sm ad-click-event">Delete</a></td></tr>
                @endforeach
                
              </tbody></table>
            </div>
            <div class="box-footer clearfix">
              <a href="{{route('det.create')}}" class="btn btn-sm btn-info btn-flat pull-right"><i class="fa fa-plus-square"></i>&nbsp;Add DET</a>
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