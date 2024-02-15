@extends(config('ACEBlog-Config.layout'))
@section('title',"Payment Request")
@section('content')
<script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>

<form method="post" action="{{url('ACE-Blog/images/upload-image')}}" enctype="multipart/form-data">

@csrf
<div class="form-group">
    <label for="blog_title">Image Title</label>
    <input type="text" class="form-control" required id="blog_title" aria-describedby="blog_title_help" name='title'
           value=""                    oninput="populate_slug_field();"
    >
    <small id="blog_title_help" class="form-text text-muted">The title of the blog post</small>
</div>


    <div class='bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border'>
        <style>
           
        </style>
        <h4>Featured Images</h4>

        <div class="form-group mb-4 p-2
        image_upload_other_sizes
            ">

                <label for="blog_image_thumbnail">Image - Thumbnail (required)</label>
                <small id="blog_image_thumbnail_help" class="form-text text-muted">Upload Thumbnail image -
                <code>150&times;150px</code> - it will
                get automatically resized if larger
                </small>
                <input class="form-control" type="file" required name="image_thumbnail" id="blog_image_thumbnail"
                aria-describedby="blog_image_thumbnail_help">

                        </div>
                    <div class="form-group mb-4 p-2
                            ">
                
                <label for="blog_image_large">Image - Large (optional)</label>
                <small id="blog_image_large_help" class="form-text text-muted">Upload Large image -
                    <code>1000&times;700px</code> - it will
                    get automatically resized if larger
                </small>
                <input class="form-control" type="file" name="image_large" id="blog_image_large"
                       aria-describedby="blog_image_large_help">

                            </div>
                    <div class="form-group mb-4 p-2
                            image_upload_other_sizes
                                ">
                
                <label for="blog_image_medium">Image - Medium (optional)</label>
                <small id="blog_image_medium_help" class="form-text text-muted">Upload Medium image -
                    <code>600&times;400px</code> - it will
                    get automatically resized if larger
                </small>
                <input class="form-control" type="file" name="image_medium" id="blog_image_medium"
                       aria-describedby="blog_image_medium_help">

                            </div>
                
       

    </div>



<button type="submit" class="btn btn-primary"  style="float: right">Upload</button>

<br>
<br>
<br>
<br>
</form>
              <script>
                if( typeof(CKEDITOR) !== "undefined" ) {
                    CKEDITOR.replace('post_body');
                }
            </script>
@stop
@section('script')

@stop
