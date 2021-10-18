<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Website */
class WebsiteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
                'id'         => $this->id,
                'url'        => $this->url,
                'name'       => $this->name,
        ];
    }
}
