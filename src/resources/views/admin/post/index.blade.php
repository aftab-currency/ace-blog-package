@extends(config('ACEBlog-Config.layout'))
@section('title',"Payment Request")
@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
     @include('ACEBlog::admin.includes.posts-list')

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
