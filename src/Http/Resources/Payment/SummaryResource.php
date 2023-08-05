<?php
namespace AzPays\Laravel\Http\Resources\Payment;

use Illuminate\Http\Resources\Json\JsonResource;

class SummaryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'token' => $this->token,
            'fiat_amount' => $this->fiat_amount,
            'factor' => $this->factor,
            'description' => $this->description,
            'started_at' => $this->started_at,
            'verified_at' => $this->verified_at,
            'status' => $this->status,
        ];
    }
}