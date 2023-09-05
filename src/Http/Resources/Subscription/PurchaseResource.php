<?php

namespace AzPays\Laravel\Http\Resources\Subscription;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->subscription->name.' - '.$this->plan->name.'('.$this->plan->duration.' Days)',
            'subscription' => new SubscriptionResource($this->subscription),
            'subscription_plan' => new PlanResource($this->plan),
            'is_trial' => $this->is_trial,
            'is_auto_renew' => $this->is_auto_renew,
            'is_renewed' => $this->is_renewed,
            'is_refundable' => $this->is_refundable,
            'cancelled_at' => $this->cancelled_at,
            'expired_at' => $this->expired_at,
            'purchased_at' => $this->purchased_at,
            'started_at' => $this->started_at,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
