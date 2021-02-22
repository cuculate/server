<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCancel extends Notification
{
    use Queueable;

    private $orders;
    private $customer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orders, $customer)
    {
        //
        $this->orders = $orders;
        $this->customer = $customer;
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
            ->greeting('Chào '.$this->customer->name.' !')
            ->line('Đơn hàng của bạn đã đc hủy ')
            ->line('Mong bạn vẫn tiếp tục mua hàng và ủng hộ shop')
            ->line('Combine Shop!');
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
