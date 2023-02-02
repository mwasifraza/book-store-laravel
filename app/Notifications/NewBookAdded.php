<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookAdded extends Notification
{
    use Queueable;
    public $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'content' => "New book <b>".$this->book->title."</b> has been added, Check it out!",
        ];
    }
}
