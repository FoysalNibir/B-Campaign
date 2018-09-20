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
              <h3 class="box-title">Users Table</h3>

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
                  <th>Email</th>
                  <th>Role</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->display_name}}</td>
                    <td><img src="{{$user->avatar}}" alt="User Image" class="users-list clearfix" height="60" width="60"></td>
                    <td><a href="{{route('user.delete',$user['id'])}}" class="btn btn-danger btn-sm ad-click-event">Delete</a></td>
                @endforeach
                
              </tbody></table>
            </div>
            <div class="box-footer clearfix">
              <a href="{{route('user.create')}}" class="btn btn-sm btn-info btn-flat pull-right"><i class="fa fa-user-plus"></i>&nbsp;Add User</a>
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