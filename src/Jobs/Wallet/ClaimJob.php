<?php
namespace AzPays\Laravel\Jobs\Wallet;

use AzPays\Laravel\Repositories\PaymentRequest;

class ClaimJob extends PaymentRequest
{
    public $currency, $amount, $payment;

    public function __construct(int $currency, string $amount, string $payment)
    {
        $this->currency = $currency;
        $this->amount = $amount;
        $this->payment = $payment;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('azpays.api.endpoints.wallets.claim'));
            $data = [
                'currency' => $this->currency,
                'amount' => $this->amount,
                'payment' => $this->payment,
            ];
            $req = $this->post($endpoint, $data);
            if ($req->status() === 200 or $req->status() === 201) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('azpays.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Wallet claim failed');
        }
    }

}