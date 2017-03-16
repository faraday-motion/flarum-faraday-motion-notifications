<?php

use Flarum\FaradayMotion\Notification\Listener; 
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events)
{
	$events->subscribe(Listener\EnableAllNotifications::class);
};