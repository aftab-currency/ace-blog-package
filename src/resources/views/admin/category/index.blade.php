@extends(config('ACEBlog-Config.layout'))
@section('title',"Payment Request")
@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          
                            <th>Name</th>
                            <th style="max-width: 40px">Actions</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                       @foreach ($posts as $post)
                       <tr>
                        
                        <td>{{$post->translation->category_name}}</td>
                    
                        <td>
                            <div class="dropdown">
                                <a href="javascript:none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Actions
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="javascript:void" onclick="delete_post('{{url('ACE-Blog/category-delete',$post->id)}}')"> <i class="fas fa-fw fa-trash"></i> Delete</a>
                                  <a class="dropdown-item" href="{{url('ACE-Blog/category-edit',$post->id)}}"><i class="fas fa-fw fa-edit"></i> Edit</a>
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
