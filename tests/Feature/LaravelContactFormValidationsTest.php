<?php

namespace Tests\Feature;

use Illuminate\Support\Str;
use Tests\TestCase;

class LaravelContactFormValidationsTest extends TestCase
{

    public function test_contact_form_validation_name_field_empty(): void
    {
        //Name field is required | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => '',
            'email' => time() . 'test@example.com',
            'phone' => '123456789',
            'message' => Str::random(65)
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_name_field_max_length(): void
    {
        //Name filed max length = 50 | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(51),
            'email' => time() . 'test@example.com',
            'phone' => '123456789',
            'message' => Str::random(65)
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_email_field_empty(): void
    {
        //Email filed is required | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(10),
            'email' => '',
            'phone' => '123456789',
            'message' => Str::random(65)
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_email_field_invalid_email(): void
    {
        //Email filed should be a valid email address | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(10),
            'email' => Str::random(10),
            'phone' => '123456789',
            'message' => Str::random(65)
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_email_field_max_length(): void
    {
        //Email filed max length = 50 | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(10),
            'email' => Str::random(50).'@abv.bg',
            'phone' => '123456789',
            'message' => Str::random(65)
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_phone_field_empty(): void
    {
        //Phone filed is required | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(10),
            'email' => time() . 'test@example.com',
            'phone' => '',
            'message' => Str::random(65)
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_phone_max_lenght(): void
    {
        //Phone filed max length = 20 | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(10),
            'email' => time() . 'test@example.com',
            'phone' => Str::random(21),
            'message' => Str::random(65)
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_message_empty(): void
    {
        //Message filed is required | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(10),
            'email' => time() . 'test@example.com',
            'phone' => Str::random(21),
            'message' => ''
        ]);

        $response->assertStatus(422);
    }

    public function test_contact_form_validation_message_max_length(): void
    {
        //Message filed max length = 500 | by InquiryRequest
        $response = $this->json('POST', '/api/contact', [
            'name' => Str::random(10),
            'email' => time() . 'test@example.com',
            'phone' => Str::random(21),
            'message' => Str::random(501)
        ]);

        $response->assertStatus(422);
    }
}
