<?php
namespace AzPays\Laravel\Jobs\Payment;
use Repositories\PaymentRequest;

class CreateJob extends PaymentRequest
{
    public $amount, $merchant, $tags;

    public function __construct(string $fiat_amount, string $merchant_key, string $tags = null)
    {
        $this->amount = $fiat_amount;
        $this->merchant = $merchant_key;
        $this->tags = $tags;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('azpays.api.endpoints.payments.create'));
            $data = [
                'amount' => $this->amount,
                'merchant' => $this->merchant,
                'tags' => $this->tags,
            ];
            $req = $this->post($endpoint, $data);
            if ($req->status() === 200 or $req->status() === 201) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('azpays.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Payment creation failed');
        }
    }

}