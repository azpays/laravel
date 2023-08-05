<?php
namespace AzPays\Laravel\Http\Controllers;

use AzPays\Laravel\Http\Requests\Payment\CheckoutRequest;
use AzPays\Laravel\Http\Requests\Payment\CheckRequest;
use AzPays\Laravel\Http\Requests\Payment\CreateRequest;
use AzPays\Laravel\Http\Resources\Payment\CheckoutResource;
use AzPays\Laravel\Http\Resources\Payment\CreateResource;
use AzPays\Laravel\Jobs\Payment\CheckJob;
use AzPays\Laravel\Jobs\Payment\CheckoutJob;
use AzPays\Laravel\Jobs\Payment\CreateJob;
use Briofy\RestLaravel\Http\Controllers\RestController;
use Illuminate\Http\Request;

class PaymentController extends RestController
{

    public function create(CreateRequest $r){
        try{
            return $this->respond(CreateResource::make(dispatch_sync(new CreateJob($r->fiat_amount, $r->merchant, $r->tags))));
        }catch (\Exception $e){
            if (config('azpays.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Payment creation failed')->respondWithError();
        }
    }

    public function checkout(CheckoutRequest $r){
        try{
            return $this->respond(CheckoutResource::make(dispatch_sync(new CheckoutJob($r->token))));
        }catch (\Exception $e){
            if (config('azpays.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Payment checkout failed')->respondWithError();
        }
    }

    public function check(CheckRequest $r){
        try{
            return $this->respond(CheckoutResource::make(dispatch_sync(new CheckJob($r->token))));
        }catch (\Exception $e){
            if (config('azpays.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Payment check failed')->respondWithError();
        }
    }

}