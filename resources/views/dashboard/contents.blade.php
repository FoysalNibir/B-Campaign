@extends('layouts.dashboard')
@section('extralink')
<style type="text/css">
    .battery:after {
      top: 30px;
      right: -7px;
      height: 20px;
      width: 7px;
      position: absolute;
      background: #FFF;
    }

    .bar {
      cursor: pointer;
      display: inline-block;
      width: 0;
      border: solid thin rgba(255, 255, 255, .1);
      padding: 5px;
      height: 1px;
      background: transparent;
      transition: background 1s;
    }

    .bar.active {
      background: limegreen;
    }
</style>
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-8">
    </div>
    <div class="col-md-4" style="margin-top: 10px;">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Threats</h3>
        </div>
        @foreach($threats as $threat)
        <div class="box-body table-responsive">
          <table class="table table-hover">
            <tbody>                
              <tr><td>{{$threat->title}}</td></tr>
              <tr><td>{{$threat->date}} &nbsp; {{$threat->time}}</td></tr>
              <tr><td><a href="{{$threat->link}}" target="_blank"><span class="pull-left-container"><small class="label pull-left bg-green">Go to link</small></span></a><div class='battery label pull-right' style="overflow: hidden;">
                    <div class='bar' data-power='1'></div>
                    <div class='bar' data-power='2'></div>
                    <div class='bar' data-power='3'></div>
                    <div class='bar' data-power='4'></div>
                    <div class='bar' data-power='5'></div>
                    <div class='bar' data-power='6'></div>
                  </div><script>
                          function battery(charge) {
                      var index = 0;
                      $(".battery .bar").each(function() {
                        var power = Math.round(charge);
                        if (index != power) {
                          $(this).addClass("active");
                          index++;
                        } else {
                          $(this).removeClass("active");
                        }
                        if (charge > 2 && charge < 5) {
                          $('.bar.active').css("background", "yellow");
                        }
                        if (charge > 4) {
                          $('.bar.active').css("background", "red");
                        }
                      });
                    }
                       battery({{$threat->level}});
                    </script></td></tr>

            </tbody></table>
          </div>
          @endforeach
        </div>
      </div>
    </div>    
  </div>
  <!-- /.content-wrapper -->

  @stop