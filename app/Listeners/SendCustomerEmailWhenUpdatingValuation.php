<?php

namespace App\Listeners;

use App\Events\ValuationStatusUpdatedEvent;
use App\Mail\ValuationStatusUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCustomerEmailWhenUpdatingValuation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ValuationStatusUpdatedEvent $event): void
    {
        Mail::to($event->valuation->customerEmail)->send(new ValuationStatusUpdatedMail($event->valuation));
    }
}
