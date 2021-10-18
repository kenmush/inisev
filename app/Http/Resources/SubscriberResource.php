<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Subscriber */
class SubscriberResource extends JsonResource
{
    public function toArray( $request)
    {
        return [
                'id'         => $this->id,
                'email'      => $this->email,
        ];
    }
}
