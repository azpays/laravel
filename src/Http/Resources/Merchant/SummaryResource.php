<?php
namespace AzPays\Laravel\Http\Resources\Merchant;

use Illuminate\Http\Resources\Json\JsonResource;

class SummaryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'status' => $this->status,
            'domain' => $this->domain,
            'description' => $this->description,
        ];
    }
}