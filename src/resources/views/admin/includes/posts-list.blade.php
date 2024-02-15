<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="max-width: 40px">Thumbnail</th>
                        <th>Title</th>
                        <th style="max-width: 70px">Created At</th>
                        <th style="max-width: 40px">Actions</th>
                    </tr>
                </thead>
               
                <tbody>
                   @foreach ($posts as $post)
                   <tr>
                    <td > <img src="{{aceblog_get_image_url($post->translation->uploaded_image_id,'image_thumbnail',1)}}" style="width:100px"></td>
                    <td>{{$post->translation->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="javascript:none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="javascript:void" onclick="delete_post('{{url('ACE-Blog/post-delete',$post->id)}}')"> <i class="fas fa-fw fa-trash"></i> Delete</a>
                              <a class="dropdown-item" href="{{url('ACE-Blog/post-edit',$post->id)}}"><i class="fas fa-fw fa-edit"></i> Edit</a>
                              <a class="dropdown-item" target="_blank" href="{{url(config('ACEBlog-Config.blog_prefix').'/Post',aceblog_encrypt_number($post->id))}}"><i class="fas fa-fw fa-eye"></i> Show</a>
                            </div>
                          </div>
                    </td>
                </tr>
                   @endforeach
                   
                    
                </tbody>
            </table>
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