<?php

namespace Support\Services;

use Response\Response;
use Support\Traits\Helpers;

class BaseService
{
    use Helpers;

    protected $response;

    public function __construct()
    {
        $this->response = app(Response::class);
    }
}
