<?php

namespace App\Listeners;

use App\Events\InquiryCreatedEvent;
use App\Mail\LaravelContactMail;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    /**
     * Handle the event.
     *
     * @param  InquiryCreatedEvent  $event
     * @return void
     */
    public function handle(InquiryCreatedEvent $event)
    {
        $mailData = [
            'title' => __('email.notification.mail.subject'),
            'body' => __('email.notification.mail.body', ['name' => $event->name, 'email' => $event->email])
        ];

        Mail::to('mail@example.com')->send(new LaravelContactMail($mailData));
    }
}
