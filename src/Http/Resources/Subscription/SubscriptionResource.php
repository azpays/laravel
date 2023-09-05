<?php

namespace AzPays\Laravel\Http\Resources\Subscription;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'subscribable_id' => $this->subscribable_id,
            'subscribable_type' => $this->subscribable_type,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'content' => $this->content,
            'capacity' => $this->capacity,
            'is_invite_only' => $this->is_invite_only,
            'is_public' => $this->is_public,
            'status' => $this->status,
        ];
    }
}
