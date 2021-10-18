<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Subscriptions */
class SubscriptionsResource extends JsonResource
{
    public function toArray( $request)
    {
        return [
                'id'            => $this->id,
                'website_id'    => $this->website_id,
                'subscriber_id' => $this->subscriber_id,
        ];
    }
}
