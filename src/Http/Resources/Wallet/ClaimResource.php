<?php
namespace AzPays\Laravel\Http\Resources\Wallet;

use AzPays\Laravel\Http\Resources\Merchant\SummaryResource as MerchantSummaryResource;
use AzPays\Laravel\Http\Resources\Payment\SummaryResource as PaymentSummaryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClaimResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'payment' => $this->whenLoaded('payment', fn() => PaymentSummaryResource::make($this->payment)),
            'merchant' => $this->whenLoaded('merchant', fn() => MerchantSummaryResource::make($this->merchant)),
        ];
    }
}