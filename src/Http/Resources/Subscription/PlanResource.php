<?php

namespace AzPays\Laravel\Http\Resources\Subscription;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'duration' => $this->duration,
            'capacity' => $this->capacity,
            'max_trials_count' => $this->max_trials_count,
            'has_affiliate' => $this->has_affiliate,
            'is_invite_only' => $this->is_invite_only,
            'is_public' => $this->is_public,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
