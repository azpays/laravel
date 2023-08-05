<?php
namespace AzPays\Laravel\Http\Resources\Payment;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'payment' => $this->whenLoaded('payment', fn() => SummaryResource::make($this->payment)),
            'merchant' => $this->whenLoaded('merchant', fn() => SummaryResource::make($this->merchant)),
        ];
    }
}