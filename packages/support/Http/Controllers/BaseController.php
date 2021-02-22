<?php

namespace Support\Http\Controllers;

use Response\Response;
use Support\Traits\Helpers;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use Helpers;

    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }
}
