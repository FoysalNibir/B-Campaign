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
            <h3 class="box-title">Insert Image</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('images.create.post') }}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label>Date</label>
                <input name="date" type="date" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Time</label>
                <input name="time" type="time" class="form-control" required>
              </div>
              

              <!-- textarea -->
              <div class="form-group">
                <label>Caption</label>
                <textarea name="caption" class="form-control" rows="3" placeholder="Enter Caption" required></textarea>
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="image" id="imageFile" aria-describedby="fileHelp" required>
                  <p class="help-block">Select between .jpg, .jpeg, .png file types</p>
              </div>
              <div class="form-group">
                  <label>Constituency</label>
                  <select class="form-control select2" name="constituency">
                    @foreach($constituencies as $constituency)
                      <option value="{{$constituency['id']}}">{{$constituency->name}}</option>
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