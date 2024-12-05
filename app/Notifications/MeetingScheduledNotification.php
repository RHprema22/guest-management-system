<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MeetingScheduledNotification extends Notification
{
    use Queueable;

    public $meeting;

    /**
     * Create a new notification instance.
     */
    public function __construct($meeting)
    {
        $this->meeting = $meeting;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail']; // Email delivery
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Meeting Scheduled')
            ->greeting('Hello ' . $this->meeting->employee->name . ',')
            ->line('A new meeting has been scheduled.')
            ->line('Visitor: ' . $this->meeting->visitor->name)
            ->line('Scheduled Time: ' . $this->meeting->scheduled_time)
            ->line('Type: ' . $this->meeting->type)
            ->action('View Meeting', url('/meetings/' . $this->meeting->id))
            ->line('Thank you for using our system!');
    }
}

