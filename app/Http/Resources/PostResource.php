<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Post */
class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
                'id'          => $this->id,
                'title'       => $this->title,
                'description' => $this->description,
                'website' => new WebsiteResource($this->whenLoaded('website')),
        ];
    }
}
