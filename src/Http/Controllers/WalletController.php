<?php

namespace AzPays\Laravel\Http\Controllers;

use AzPays\Laravel\Http\Requests\Wallet\ClaimRequest;
use AzPays\Laravel\Http\Resources\Wallet\ClaimResource;
use AzPays\Laravel\Jobs\Wallet\ClaimJob;
use Briofy\RestLaravel\Http\Controllers\RestController;

class WalletController extends RestController
{
    public function claim(ClaimRequest $r)
    {
        try {
            return $this->respond(ClaimResource::make(dispatch_sync(new ClaimJob($r->currency, $r->amount, $r->payment))));
        } catch (\Exception $e) {
            if (config('azpays.debug')) {
                return $this->setErrorMessage($e->getMessage())->respondWithError();
            }

            return $this->setErrorMessage('Wallet claim failed')->respondWithError();
        }
    }
}
