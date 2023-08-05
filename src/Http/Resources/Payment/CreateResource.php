<?php
namespace AzPays\Laravel\Http\Resources\Payment;

use Illuminate\Http\Resources\Json\JsonResource;

class CreateResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'token' => $this->token,
            'fiat_amount' => $this->fiat_amount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}