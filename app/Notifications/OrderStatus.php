<?php

namespace App\Notifications;

use App\General\Config;
use App\General\OrderConfig;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatus extends Notification
{
    use Queueable;

    private $order;
    private $customer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order, $customer)
    {
        //
        $this->order = $order;
        $this->customer = $customer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Chào '.$this->customer->name.' !')
            ->line('Đơn hàng số ' . $this->order->id . ' đang được ' . getNameStatusEmail($this->order->status))
            ->action('Bấm vào để xem đơn hàng', url(route('order-show', $this->order->id)))
            ->line('Cám ơn bạn đã mua sản phẩm của shop')
            ->line('Combine Shop!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
