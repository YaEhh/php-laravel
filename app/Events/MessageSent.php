<?php namespace App\Events;

use App\Events\Event;
use App\ContactMessage;

use Illuminate\Queue\SerializesModels;

class MessageSent extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(ContactMessage $message)
	{
		$this->message = $message; 
	}

}
