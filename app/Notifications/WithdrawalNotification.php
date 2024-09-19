<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class WithdrawalNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($withdrawal)
    {
        $this->withdrawal = $withdrawal;
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
        $status_id = $this->withdrawal->status;
        $status = config('constants.transaction_status')[($status_id)];
        $amount = $this->withdrawal->rewards / 100;
        $name = $this->withdrawal->customer->name ?? 'User';
        $color = $status_id == 3 ? 'red' : 'green';
        $html_string = new HtmlString('<b style="color: '.$color.'">Your withdrawal request has been ' . $status . '!</b>');
        return (new MailMessage)
                    ->greeting('Hello ' . $name . ',')
                    ->subject('Withdrawal ' . $status . ' - Rewards')
                    ->line('This is a notification email from Rewards Converter Global to inform you about your withdrawal request.')
                    ->line($html_string)
                    ->line('Your total withdrawal amount was: $' . $amount)
                    ->line('Thank you for using Rewards Converter Global!');
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
