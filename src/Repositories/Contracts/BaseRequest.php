<?php
namespace AzPays\Laravel\Repositories\Contracts;

use Illuminate\Support\Facades\Http;

abstract class BaseRequest
{
    public function post($path, $payload = null, $token = null)
    {
        if ($payload === null) return Http::withHeaders($this->getHeaders($token))->post($path);
        return Http::withHeaders($this->getHeaders($token))->post($path, $payload);
    }

    public function get($path, $token = null)
    {
        return Http::withHeaders($this->getHeaders($token))->get($path);
    }
}