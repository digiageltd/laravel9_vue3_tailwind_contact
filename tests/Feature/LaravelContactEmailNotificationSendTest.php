<?php

namespace Tests\Feature;

use App\Events\InquiryCreatedEvent;
use App\Mail\LaravelContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class LaravelContactEmailNotificationSendTest extends TestCase
{
    public function test_contact_form_sending_email()
    {
        Mail::fake();

        $name = Str::random(10);
        $email = time() . 'test@example.com';

        event(new InquiryCreatedEvent($name, $email));

        Mail::assertSent(LaravelContactMail::class);
    }
}
