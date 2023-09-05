<?php

namespace AzPays\Laravel\Http\Controllers;

use AzPays\Laravel\Http\Resources\Subscription\PurchaseResource;
use AzPays\Laravel\Jobs\Subscription\IndexJob;
use Briofy\RestLaravel\Http\Controllers\RestController;

class SubscriptionController extends RestController
{
    public function index()
    {
        try {
            return $this->respond(PurchaseResource::make(dispatch_sync(new IndexJob(auth()->id()))));
        } catch (\Exception $e) {
            if (config('azpays.debug')) {
                return $this->setErrorMessage($e->getMessage())->respondWithError();
            }

            return $this->setErrorMessage('Subscriptions list failed')->respondWithError();
        }
    }
}
