<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Backend\Contact\StoreRequest;
use App\Repos\AgeRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\ContactRepo;
use Support\Http\Controllers\BaseController;

class ContactController extends BaseController
{
    private $contact;

    public function __construct(ContactRepo $contact)
    {
        parent::__construct();

        $this->contact = $contact;
    }

    public function Contact()
    {
        return view('frontend.contact.contact');
    }

    public function SendContact(StoreRequest $request)
    {
        try {
            $this->contact->create($request->data());
            return view('frontend.contact.thankyou');
        } catch (\Exception $ex) {
            return abort(500);
        }

    }
}
