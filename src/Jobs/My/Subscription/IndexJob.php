<?php

namespace AzPays\Laravel\Jobs\My\Subscription;

use AzPays\Laravel\Repositories\PaymentRequest;

class IndexJob extends PaymentRequest
{
    public mixed $token;

    public function __construct(mixed $token)
    {
        $this->token = $token;
    }

    public function handle()
    {
        try {
            $endpoint = $this->generateApiUrl(config('azpays.api.endpoints.my.subscriptions.index'));
            $req = $this->get($endpoint, $this->token);
            if ($req->status() === 200) {
                return $req->json();
            }
            throw new \Exception($req->json()['message']);
        } catch (\Exception $e) {
            if (config('azpays.debug')) {
                throw new \Exception($e->getMessage());
            }
            throw new \Exception('Subscriptions list failed');
        }
    }
}
