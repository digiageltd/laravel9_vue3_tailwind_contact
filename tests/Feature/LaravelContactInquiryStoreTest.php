<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class LaravelContactInquiryStoreTest extends TestCase
{

    use RefreshDatabase;

    public function test_contact_form_details_stored_successfully(): void
    {
        $data = [
            'name' => Str::random(10),
            'email' => time() . '@abv.bg',
            'phone' => Str::random(9),
            'message' => Str::random(65),
        ];

        $inquiryModel = new Inquiry();
        $inquiry = $inquiryModel->create($data);

        $this->assertInstanceOf(Inquiry::class, $inquiryModel);
        $this->assertEquals($data['name'], $inquiry->name);
        $this->assertEquals($data['email'], $inquiry->email);
        $this->assertEquals($data['phone'], $inquiry->phone);
        $this->assertEquals($data['message'], $inquiry->message);
    }

}
