<?php

namespace App\Observers;

use App\Models\Withdrawal;
use App\Notifications\WithdrawalNotification;

class WithdrawalObserver
{
    /**
     * Handle the Withdrawal "created" event.
     */
    public function created(Withdrawal $withdrawal): void
    {
        //
    }

    /**
     * Handle the Withdrawal "updated" event.
     */
    public function updated(Withdrawal $withdrawal): void
    {
        if ($withdrawal->status > 2) {
            $withdrawal->customer->notify(new WithdrawalNotification($withdrawal));
        }
    }

    /**
     * Handle the Withdrawal "deleted" event.
     */
    public function deleted(Withdrawal $withdrawal): void
    {
        //
    }

    /**
     * Handle the Withdrawal "restored" event.
     */
    public function restored(Withdrawal $withdrawal): void
    {
        //
    }

    /**
     * Handle the Withdrawal "force deleted" event.
     */
    public function forceDeleted(Withdrawal $withdrawal): void
    {
        //
    }
}
