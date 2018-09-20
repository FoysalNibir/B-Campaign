@extends('layouts.main')
@section('extrascript')
<script type="text/javascript">
 var modal = document.getElementById('myModal');
 var search = document.getElementById('search');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
      search.style.display = "none";
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
      search.style.display = "block";
    }
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
            <h3 class="box-title">Image Table</h3>

            <div class="box-tools" id="search">
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
                <th>Date</th>
                <th>Time</th>
                <th>Caption</th>
                <th>Image</th>
                <th>Constituency</th>
                <th>Action</th>
              </tr>
              @foreach($images as $image)
              <tr><td>{{$image->id}}</td>
                <td>{{$image->date}}</td>
                <td>{{$image->time}}</td>
                <td>{{$image->caption}}</td>
                <td><img id="myImg" src="{{$image->image}}" alt="Snow" style="width:100%;max-width:150px"></td>                    
                <td>{{$image->constituency->name}}</td>
                <td><a href="{{route('images.edit',$image['id'])}}" class="btn btn-primary btn-sm ad-click-event">Edit</a>
                  <a href="{{route('images.delete',$image['id'])}}" class="btn btn-danger btn-sm ad-click-event">Delete</a></td></tr>
                  @endforeach

                </tbody></table>
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img01">
                  <div id="caption"></div>
                </div>
              </div>
              <div class="box-footer clearfix">
                <a href="{{route('images.create')}}" class="btn btn-sm btn-info btn-flat pull-right"><i class="fa fa-plus-square"></i>&nbsp;Add Image</a>
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