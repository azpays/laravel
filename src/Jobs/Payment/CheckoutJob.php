<?php

namespace AzPays\Laravel\Jobs\Payment;

use AzPays\Laravel\Repositories\PaymentRequest;

class CheckoutJob extends PaymentRequest
{
    public $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function handle()
    {
        try {
            $endpoint = $this->generateApiUrl(config('azpays.api.endpoints.payments.checkout'));
            str_replace('{token}', $this->token, $endpoint);
            $req = $this->post($endpoint);
            if ($req->status() === 200) {
                return $req->json();
            }
            throw new \Exception($req->json()['message']);
        } catch (\Exception $e) {
            if (config('azpays.debug')) {
                throw new \Exception($e->getMessage());
            }
            throw new \Exception('Payment checkout failed');
        }
    }
}
