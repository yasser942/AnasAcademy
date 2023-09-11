<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MyResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $token, public string $email)
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('عملية إعادة تعيين كلمة المرور') // Set the subject here

            ->line('تستلم هذا البريد الإلكتروني لأننا تلقينا طلبًا لإعادة تعيين كلمة المرور الخاصة بحسابك.
                    ')
                    ->action('إعادة تعيين كلمة المرور', url('/reset-password/'.$this->token.'?email='.$this->email))
                    ->line('سينتهي صلاحية رابط إعادة تعيين كلمة المرور هذا في غضون 60 دقيقة')
            ->line('إذا لم تطلب إعادة تعيين كلمة المرور ، فلا داعي لاتخاذ أي إجراء آخر.');

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
