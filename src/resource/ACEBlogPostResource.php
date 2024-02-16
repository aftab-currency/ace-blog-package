<?php

namespace ACE\ACEBlog\resource;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ACEBlogPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request):array
    {
        return [
            "post_id"=>aceblog_encrypt_number($this->id),
            "posted_at"=>$this->posted_at,
            "slug"=>$this->slug,
            "title"=>$this->translation->title,
            "subtitle"=>$this->translation->subtitle,
            "meta_desc"=>$this->translation->meta_desc,
            "seo_title"=>$this->translation->seo_title,
            "image_url"=>aceblog_get_image_url($this->translation->uploaded_image_id,'image_thumbnail',1),
            "short_description"=>$this->translation->short_description,
            "post_body"=>$this->translation->post_body,
        ];
    }
}
