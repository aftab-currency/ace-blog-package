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
                <a class="dropdown-item" href="javascript:void" onclick="delete_image('{{url('ACE-Blog/images/delete-image',$image->id)}}')"> <i class="fas fa-fw fa-trash"></i> Delete</a>
                <a class="dropdown-item" href="javascript:void" onclick="copyToClipboard('{{aceblog_get_image_url($image->id,'image_thumbnail')}}')" > <i class="fas fa-fw fa-link"></i> Copy</a>

              </div>
            </div>
          </div>
      </div>
      <div class="card-body">
  <div>
    <img src="{{aceblog_get_image_url($image->id,'image_thumbnail',1)}}" style="width: 100%">
  </div>

      </div>
    </div>
  </div>
  @endforeach
</div>

</div>
<script>
   function delete_image(url)
    {
        Swal.fire({
  title: 'Are you sure?',
  text: 'You won\'t be able to delete this!',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href=url;
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    
  }
})
    }
    function copyToClipboard(text) {
  var textarea = document.createElement("textarea");
  textarea.value = text;

  // Make the textarea non-editable to avoid focus and activation
  textarea.setAttribute("readonly", "");
  textarea.style.position = "absolute";
  textarea.style.left = "-9999px"; // Move outside the screen to make it invisible

  document.body.appendChild(textarea);

  // Select and copy the text
  textarea.select();
  document.execCommand("copy");

  // Clean up
  document.body.removeChild(textarea);
}
</script>
@stop
@section('script')

@stop
