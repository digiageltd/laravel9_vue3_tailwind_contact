<?php

namespace App\Http\Controllers\Api;

use App\Events\InquiryCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Inquiry;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest $request
     * @return ContactResource
     */
    public function store(ContactRequest $request)
    {
        $inquiry = Inquiry::create($request->validated());

        event(new InquiryCreatedEvent($inquiry->name, $inquiry->email));

        return new ContactResource($inquiry);
    }

}
