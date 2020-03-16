<?php

namespace App\Notifications;

use App\SessionStudent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Coderello\RelevanceEnsurer\Contracts\ShouldBeRelevantNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class FirstInstallment extends Notification implements ShouldQueue, ShouldBeRelevantNotification
{
    use SerializesModels, Queueable;

    private $session_student;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(SessionStudent $session_student)
    {
        //
        $this->session_student = $session_student;
    }

    public function isRelevant($notifiable): bool
    {
        return (string) $this->session_student->status === 'preregistration';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
            'session_student_id' => $this->session_student->id
        ];
    }
}
