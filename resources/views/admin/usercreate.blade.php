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


      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create User</h3>
          </div>

          <!-- /.box-header -->
          <form role="form" action="{{ route('user.create.post') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="avatar" id="avatarFile" aria-describedby="fileHelp">

                  <p class="help-block">Select between .jpg, .jpeg, .png file types</p>
              </div>

              <div class="form-group">
                  <label>Role</label>
                  <select class="form-control select2" name="role">
                    @foreach($roles as $role)
                      <option value="{{$role['id']}}">{{$role->display_name}}</option>
                    @endforeach
                  </select>
               </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>
</div>

<!-- /.box -->
</div>



</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop