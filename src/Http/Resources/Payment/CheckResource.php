<?php
namespace AzPays\Laravel\Http\Resources\Payment;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'confirmed' => $this->confirmed,
        ];
    }
}