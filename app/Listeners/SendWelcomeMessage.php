<?php

namespace App\Listeners;

use App\Events\UserEmailVerified;
use App\Jobs\ProcessUserWelcomeMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserEmailVerified  $event
     * @return void
     */
    public function handle(UserEmailVerified $event)
    {
        ProcessUserWelcomeMessage::dispatch($event);
    }
}
