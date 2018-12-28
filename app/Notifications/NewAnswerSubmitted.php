<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class NewAnswerSubmitted extends Notification
{
    use Queueable;

    public $name;
    public $answer;
    public $question;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($answer, $question, $name)
    {
        $this->answer = $answer;
        $this->name = $name;
        $this->question = $question;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'nexmo'];
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
                    ->line('A new answer was submitted to your question: '. $this->question->title.'.')
                    ->action('View all answers', route('question.show', $this->question->id))
                    ->line('Thank you for using Rusty Knows Everything!');
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content('Your question'. $this->question->title. 'was just answered by'. $this->name.'. Check it out at Rusty Knows Everything!');
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
