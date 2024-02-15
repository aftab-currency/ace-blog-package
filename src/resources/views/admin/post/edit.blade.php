@extends(config('ACEBlog-Config.layout'))
@section('title',"Payment Request")
@section('content')
<script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>

<form method="post" action="{{url('ACE-Blog/posts/edit',$post->id)}}" enctype="multipart/form-data">

@csrf
<div class="form-group">
    <label for="blog_title">Blog Post Title</label>
    <input type="text" class="form-control" required id="blog_title" aria-describedby="blog_title_help" value="{{$post->translation->title}}" name='title'
           value=""                    oninput="populate_slug_field();"
    >
    <small id="blog_title_help" class="form-text text-muted">The title of the blog post</small>
</div>

<div class="form-group">
    <label for="blog_subtitle">Subtitle</label>
    <input type="text" class="form-control" id="blog_subtitle" aria-describedby="blog_subtitle_help" value="{{$post->translation->subtitle}}" name='subtitle'
           value=''>
    <small id="blog_subtitle_help" class="form-text text-muted">The subtitle of the blog post (optional)</small>
</div>


<div class='row'>


    <div class='col-sm-12 col-md-4'>


        <div class="form-group">
            <label for="blog_slug">Blog Post Slug</label>
            <input type="text" class="form-control" id="blog_slug" aria-describedby="blog_slug_help" value="{{$post->translation->slug}}" name='slug'
                   value="">
            <small id="blog_slug_help" class="form-text text-muted">The slug (leave blank to auto generate) - i.e.http://aubo1.ace4news.com/en/blog/your-slug</small>
        </div>

    </div>
    <div class='col-sm-6 col-md-4'>


        <div class="form-group">
            <label for="blog_is_published">Published?</label>

            <select name='is_published' class='form-control' id='blog_is_published'
                    aria-describedby='blog_is_published_help'>

                <option  selected='selected'  value='1'>
                    Published
                </option>
                <option  value='0'>Not
                    Published
                </option>

            </select>
            <small id="blog_is_published_help" class="form-text text-muted">Should this be published? If not, then it
                won't be
                publicly viewable.
            </small>
        </div>

    </div>
    <div class='col-sm-6 col-md-4'>

        <div class="form-group">
            <label for="blog_posted_at">Posted at</label>
            <input type="text" class="form-control" id="blog_posted_at" aria-describedby="blog_posted_at_help"
                   name='posted_at' value="{{$post->posted_at}}"
                   value="2024-02-13 15:28:41">
            <small id="blog_posted_at_help" class="form-text text-muted">When this should be published. If this value is
                greater
                than now (2024-02-13 15:28:41) then it will not (yet) appear on your blog. Should be in the <code>YYYY-MM-DD
                    HH:MM:SS</code> format.
            </small>
        </div>


    </div>
</div>


<div class="form-group">
    <label for="blog_post_body">Post Body
                    (HTML)
        
    </label>
    <textarea style='min-height:600px;' class="form-control" id="blog_post_body" aria-describedby="blog_post_body_help"
              name='post_body'>{!!$post->translation->post_body !!}</textarea>


  
</div>





<div class="form-group">
    <label for="blog_seo_title">SEO: &lt;title&gt; tag (optional)</label>
    <input class="form-control" id="blog_seo_title" aria-describedby="blog_seo_title_help"
           name='seo_title' value="{{$post->translation->seo_title}}" tyoe='text'  >
    <small id="blog_seo_title_help" class="form-text text-muted">Enter a value for the &lt;title&gt; tag. If nothing is provided here we will just use the normal post title from above (optional)</small>
</div>

<div class="form-group">
    <label for="blog_meta_desc">Meta Desc (optional)</label>
    <textarea class="form-control" id="blog_meta_desc" aria-describedby="blog_meta_desc_help"
              name='meta_desc'>{{$post->translation->meta_desc}}</textarea>
    <small id="blog_meta_desc_help" class="form-text text-muted">Meta description (optional)</small>
</div>

<div class="form-group">
    <label for="blog_short_description">Short Desc (optional)</label>
    <textarea class="form-control" id="blog_short_description" aria-describedby="blog_short_description_help"
              name='short_description'>{{$post->translation->short_description}}</textarea>
    <small id="blog_short_description_help" class="form-text text-muted">Short description (optional - only useful if you use in your template views)</small>
</div>


    <div class='bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border'>
       
        <h4>Featured Images</h4>


        <div class="form-group mb-4 p-2
        image_upload_other_sizes
            ">

            <label for="blog_image_thumbnail">Image - Thumbnail (required)</label>
            <small id="blog_image_thumbnail_help" class="form-text text-muted">Upload Thumbnail image -
            <code>150&times;150px</code> - it will
            get automatically resized if larger
            </small>
            <input class="form-control" type="file" name="image_thumbnail"  id="blog_image_thumbnail"
            aria-describedby="blog_image_thumbnail_help">

                    </div>
                    {{-- <div class="form-group mb-4 p-2
                            image_upload_other_sizes
                                ">
                
                <label for="blog_image_medium">Image - Medium (optional)</label>
                <small id="blog_image_medium_help" class="form-text text-muted">Upload Medium image -
                    <code>600&times;400px</code> - it will
                    get automatically resized if larger
                </small>
                <input class="form-control" type="file" name="image_medium" id="blog_image_medium"
                       aria-describedby="blog_image_medium_help">

                            </div> --}}
                    {{-- <div class="form-group mb-4 p-2
                            image_upload_other_sizes
                                ">
                
                <label for="blog_image_thumbnail">Image - Thumbnail (optional)</label>
                <small id="blog_image_thumbnail_help" class="form-text text-muted">Upload Thumbnail image -
                    <code>150&times;150px</code> - it will
                    get automatically resized if larger
                </small>
                <input class="form-control" type="file" name="image_thumbnail" id="blog_image_thumbnail"
                       aria-describedby="blog_image_thumbnail_help">

                            </div> --}}
       

    </div>


<div class='bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border'>
    <h4>Categories:</h4>
    <div class='row'>

        
        @php
             $ids = $post->categories->pluck('id')->toArray();
        @endphp
      
  
  
        <div class='col-md-12 my-3 text-center'>
            <select class="form-control mySelect" name="categories[]" multiple>
                @foreach (aceblog_categories() as $cate)
                <option value="{{$cate->id}}" {{in_array($cate->id,$post->ids())?'selected':''}}>{{$cate->translation->category_name}}</option>
            @endforeach
            
            </select>
            <em><a class="a-link-cart-color" target='_blank' href="https://aubo1.ace4news.com/blog_admin/categories/add_category"><i class="fa fa-external-link" aria-hidden="true"></i>
                    Add new categories
                    here</a></em>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary"  style="float: right">Update Post</button>

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
