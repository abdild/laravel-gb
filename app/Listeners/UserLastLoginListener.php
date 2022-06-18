<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLastLoginListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Проверка того, что в поступившем объекте существует свойство user и то, что это свойство user принадлежит классу User
        if (isset($event->user) && $event->user instanceof User) {
            $event->user->last_login_at = now('Europe/Moscow');
            $event->user->save();
        }
    }
}
