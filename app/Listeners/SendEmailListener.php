<?php

namespace App\Listeners;

use App\Events\NewPostEvent;
use Artisan;
use function dd;
use function dd as ddAlias;

class SendEmailListener
{
    public function __construct()
    {
        //
    }

    public function handle(NewPostEvent $event)
    {

        Artisan::call('inisev:sendemails',[
                'post' => $event->post->id
        ]);
    }
}