@extends(config('ACEBlog-Config.layout'))
@section('title',"Payment Request")
@section('content')
<div class="container-fluid">

<div class="row">
  @foreach ($images as $image )
  <div class="col-md-3">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div style="float: left">
          <h6 class="m-0 font-weight-bold ">{{$image->image_title}}</h6>
         </div>
          <div style="float: right">
            <div class="dropdown">
              <a href="javascript:none" style="color:gray" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="javascript:void" onclick="delete_post('{{url('ACE-Blog/category-delete',1)}}')"> <i class="fas fa-fw fa-trash"></i> Delete</a>
                <a class="dropdown-item" href="javascript:void" onclick="delete_post('{{url('ACE-Blog/category-delete',1)}}')"> <i class="fas fa-fw fa-link"></i> Copy</a>

              </div>
            </div>
          </div>
      </div>
      <div class="card-body">
  <div>
    <img src="{{aceblog_get_image_url($image->id,'image_thumbnail')}}" style="width: 100%">
  </div>

      </div>
    </div>
  </div>
  @endforeach
</div>

</div>

@stop
@section('script')

@stop
