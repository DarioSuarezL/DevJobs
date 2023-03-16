<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacancy_id, $vacancy_title, $candidate_id)
    {
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_title = $vacancy_title;
        $this->candidate_id = $candidate_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/candidates/'.$this->candidate_id);

        return (new MailMessage)
                    ->line('You have a new candidate for your vacancy on DevJobs!')
                    ->line('The vacancy that has a new candidate is: '.$this->vacancy_title)
                    ->action('View notifications', $url)
                    ->line('Thank you for using DevJobs!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'vacancy_id' => $this->vacancy_id,
            'vacancy_title' => $this->vacancy_title,
            'candidate_id' => $this->candidate_id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
