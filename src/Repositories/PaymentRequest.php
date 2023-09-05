<?php

namespace AzPays\Laravel\Repositories;

use AzPays\Laravel\Repositories\Contracts\BaseRequest;
use AzPays\Laravel\Repositories\Contracts\RequestInterface;

abstract class PaymentRequest extends BaseRequest implements RequestInterface
{
    public function generateApiUrl(string $path): string
    {
        $baseUrl = config('azpays.sandbox', false) ? config('azpays.api.sandbox_url') : config('azpays.api.url');

        return $baseUrl.'/'.config('azpays.api.version').'/'.$path;

    }

    public function getHeaders($token = null): array
    {
        $headers =
            [
                'accept' => 'application/json',
                'content-type' => 'application/json',
                'X-AzPays-API' => config('azpays.api.key'),
            ];
        if ($token) {
            $headers['Authorization'] = 'Bearer '.$token;
        }

        return $headers;
    }
}
