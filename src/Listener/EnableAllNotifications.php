<?php 

namespace Flarum\FaradayMotion\Notification\Listener;

use Flarum\Event\UserWillBeSaved;
use Illuminate\Contracts\Events\Dispatcher;

class EnableAllNotifications
{
	/**
	 * @param  Dispatcher $events
	 */
	
	public function subscribe(Dispatcher $events)
	{
	  $events->listen(UserWillBeSaved::class, [$this, 'enableAllNotifications']);
	
	}

	/**
	 * @param  Event $event
	 */
	public function enableAllNotifications(UserWillBeSaved $event)
	{
	    if (!$event->user->exists) {
	    	$event->user->setPreference('followAfterReply', true);
	    	$event->user->setPreference('notify_postMentioned_email', true);
	    	$event->user->setPreference('notify_userMentioned_email', true);
	    }
	}
}