<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactService
{
    protected $contactModel;

    public function __construct(Contact $contactModel)
    {
        $this->contactModel = $contactModel;
    }


    public function create(Request $request)
    {
        $this->contactModel->create($request->all());
    }

}