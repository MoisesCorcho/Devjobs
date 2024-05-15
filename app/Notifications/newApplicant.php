<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newApplicant extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public int $vacancyId,
        public string $vacancyName,
        public int $userId)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications/' . $this->userId);

        return (new MailMessage)
                    ->line( __('You have received a new application.') )
                    ->line( __('The vacancy is') . ": " .$this->vacancyName)
                    ->action( __('View Vacancy'), $url)
                    ->line( __('Thank you for using DevJobs!') );
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'vacancyId' => $this->vacancyId,
            'vacancyName' => $this->vacancyName,
            'userId' => $this->userId,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
