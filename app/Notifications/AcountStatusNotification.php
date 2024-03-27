<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcountStatusNotification extends Notification
{
    use Queueable;

    private $user;
    private $message;
    private $ac_status;
    private $line;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;

        if ($user->ac_status == 0) {
            $this->ac_status = ' in progress';
            $this->message = 'Dear ' . $this->user->name . ', Your request has been received ';
            $this->line = 'You will be notified when approved or rejected';
        } else if ($user->ac_status == 1) {
            $this->ac_status = ' has been approved';
            $this->message = 'Dear ' . $this->user->name . ', Your request has been approved , you can now access to your account.';
        } else {
            $this->ac_status = ' has been rejected';
            $this->message = 'Dear ' . $this->user->name . ', your request has been rejected, because some information was incorrect or unclear';
            $this->line = 'you can send an other request but make sure from your information this time';
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mail = new MailMessage;


        $mail->subject('Register Request')
        ->greeting('Your Request' . $this->ac_status)
        ->line($this->message)
        ->line($this->line);
        if ($this->user->ac_status == 1) {
            $mail
            ->action('Go to check', url('/'));
        }else if($this->user->ac_status == 2){
            $mail
            ->action('Register', route('register'));
        }


        return $mail;
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
