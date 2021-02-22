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
    private $brand;
    private $age;
    private $category;

    public function __construct(ContactRepo $contact,
                                BrandRepo $brand,
                                AgeRepo $age,
                                CategoryRepo $category)
    {
        parent::__construct();

        $this->contact = $contact;
        $this->brand = $brand;
        $this->category = $category;
         $this->age = $age;
    }

    public function Contact(StoreRequest $request)
    {
        try {
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            $this->contact->create($request->data());
            return view('frontend.contact.contact', compact('categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }

    }
}
