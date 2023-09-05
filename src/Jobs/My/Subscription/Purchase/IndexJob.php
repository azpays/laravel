<?php

namespace AzPays\Laravel\Jobs\My\Subscription\Purchase;

use AzPays\Laravel\Repositories\PaymentRequest;

class IndexJob extends PaymentRequest
{
    public mixed $token;

    public mixed $id;

    public function __construct(mixed $token, $id)
    {
        $this->token = $token;
        $this->id = $id;
    }

    public function handle()
    {
        try {
            $endpoint = $this->generateApiUrl(config('azpays.api.endpoints.my.subscriptions.purchases'));
            str_replace('{id}', $this->id, $endpoint);
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
