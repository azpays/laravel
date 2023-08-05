<?php
namespace AzPays\Laravel\Http\Controllers;

use AzPays\Laravel\Http\Requests\Payment\ClaimRequest;
use AzPays\Laravel\Http\Resources\Payment\ClaimResource;
use AzPays\Laravel\Jobs\Payment\ClaimJob;
use Briofy\RestLaravel\Http\Controllers\RestController;
use Illuminate\Http\Request;

class WalletController extends RestController
{

    public function claim(ClaimRequest $r){
        try{
            return $this->respond(ClaimResource::make(dispatch_sync(new ClaimJob($r->currency, $r->amount, $r->payment))));
        }catch (\Exception $e){
            if (config('azpays.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Wallet claim failed')->respondWithError();
        }
    }

}