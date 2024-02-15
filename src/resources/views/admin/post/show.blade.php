@extends('ACEBlog::layout.app')
@section('title',"Payment Request")
@section('content')
<div class="container-fluid">
<br>
<br>
<br>
<div class="row">
  <div class="col-md-4">
    <div >
      <img  style="object-fit: cover;width:100%;height:100%" src="{{aceblog_get_image_url($post->translation->uploaded_image_id,'image_thumbnail',1)}}">
    </div>
  </div>
  <div class="col-md-8">
    <h2>{{$post->translation->title}}</h2>
    <br>
    <div>
      {!! $post->translation->post_body !!}
    </div>
  </div>
</div>

</div>
<script>

    function delete_post(url)
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
 $(document).ready(function() {

  $('#dataTable').DataTable();
});

</script>
@stop
@section('script')

@stop
